<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Status;
use App\Models\Permission;
use Carbon\Carbon;
use App\Services\PermissionService;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Cache;

class PermissionsController extends Controller
{
    public $name = 'Permissões'; //  singular
    public $folder = 'admin.pages.permissions';

    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $getRoutes = Route::getRoutes();

        $formattedRoutes = collect($getRoutes)->map(function ($route) {
            return [
                'method' => implode('|', $route->methods()),
                'uri' => str_replace('/', '.', $route->uri()),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
            ];
        });

        $routes = $formattedRoutes->filter(function ($route) {
            return str_starts_with($route['uri'], 'admin');
        })->reverse();

        return view($this->folder . '.index', compact('routes'));
    }

    public function load(Request $request)
    {
        $query = [];
        $filters = $request->only(['name', 'status', 'date_range']);

        if (!empty($filters['name'])) {
            $query['name'] = $filters['name'];
        }

        if (!empty($filters['status'])) {
            $query['status'] = $filters['status'];
        }

        if (!empty($filters['date_range'])) {
            [$startDate, $endDate] = explode(' até ', $filters['date_range']);
            $query['start_date'] = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $query['end_date'] = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        }

        $results = $this->permissionService->getAllPermissions($filters);

        return view($this->folder . '.index_load', compact('results'));
    }

    public function create()
    {
        $statuses = Status::default();
        $getRoutes = Route::getRoutes();

        $formattedRoutes = collect($getRoutes)->map(function ($route) {
            return [
                'method' => implode('|', $route->methods()),
                'uri' => str_replace('/', '.', $route->uri()),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
            ];
        });

        $routes = $formattedRoutes->filter(function ($route) {
            return str_starts_with($route['uri'], 'admin');
        })->reverse();

        return view($this->folder . '.form', compact('statuses', 'routes'));
    }

    public function store(Request $request)
    {
        $routes = $request->input('routes');
        $errors = [];
        $created = 0;
        $updated = 0;

        if (!is_array($routes) || count($routes) === 0) {
            return response()->json('Selecione e adicione pelo menos uma permissão antes de salvar.', 422);
        }

        foreach ($routes as $route) {
            $key = trim($route);
            $parts = explode('.', $key);
            $type = isset($parts[1]) ? $parts[1] : null;
            if (!$type) {
                $errors[] = "$key: Não foi possível identificar o tipo (segundo segmento).";
                continue;
            }
            $title = collect(explode('.', $key))
                ->map(fn($word) => ucfirst($word))
                ->implode(' ');
            $data = [
                'title' => $title,
                'key' => $key,
                'type' => $type,
            ];
            $validator = Validator::make($data, [
                'title' => 'required',
                'key' => 'required',
                'type' => 'required',
            ], [
                'title.required' => 'Título é obrigatório',
                'key.required' => 'Rota é obrigatória',
                'type.required' => 'Tipo é obrigatório',
            ]);
            if ($validator->fails()) {
                $errors[] = "$key: " . $validator->errors()->first();
                continue;
            }
            $permission = \App\Models\Permission::where('key', $data['key'])->first();
            if ($permission) {
                $permission->update(['title' => $data['title'], 'type' => $data['type']]);
                $updated++;
            } else {
                $this->permissionService->createPermission($data);
                $created++;
            }
        }

        // Limpa o cache de permissões de todos os usuários de todos os grupos
        $groups = UserGroup::with('users')->get();
        foreach ($groups as $group) {
            foreach ($group->users as $user) {
                Cache::forget("user_permissions_{$user->id}");
            }
        }

        if ($created > 0 || $updated > 0) {
            $msg = "{$created} permissões criadas, {$updated} atualizadas.";
            if (count($errors)) {
                $msg .= ' Alguns itens não foram processados: ' . implode(' | ', $errors);
            }
            return response()->json($msg, 200);
        } else {
            return response()->json('Nenhuma permissão foi criada ou atualizada. ' . implode(' | ', $errors), 422);
        }
    }

    public function delete($id)
    {
        $this->permissionService->deletePermission($id);

        // Limpa o cache de permissões de todos os usuários de todos os grupos
        $groups = UserGroup::with('users')->get();
        foreach ($groups as $group) {
            foreach ($group->users as $user) {
                Cache::forget("user_permissions_{$user->id}");
            }
        }

        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}
