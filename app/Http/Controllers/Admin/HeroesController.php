<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Status;
use Carbon\Carbon;
use App\Services\HeroService;

class HeroesController extends Controller
{
    public $name = 'Hero'; //  singular
    public $folder = 'admin.pages.heroes';

    protected $heroService;

    public function __construct(HeroService $heroService)
    {
        $this->heroService = $heroService;
    }

    public function index()
    {
        return view($this->folder . '.index');
    }

    public function load(Request $request)
    {
        // Como só existe um hero, buscamos o primeiro disponível
        $results = $this->heroService->getAllHeroes([]);
        $statuses = Status::default();
        
        return view($this->folder . '.index_load', compact('results', 'statuses'));
    }

    public function create()
    {
        $statuses = Status::default();

        return view($this->folder . '.form', compact('statuses'));
    }

    public function store(Request $request)
    {
        $result = $request->all();

        $rules = array(
            'title' => 'required',
            'status' => 'required',
        );
        $messages = array(
            'title.required' => 'title é obrigatório',
            'status.required' => 'status é obrigatório',
        );

        $validator = Validator::make($result, $rules, $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }        

        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $imagePath = $image->store('heroes', 'public');
            $result['background_image'] = $imagePath;
        }

        // Processar estatísticas
        $statistics = [];
        $titles = $request->input('statistics_title', []);
        $values = $request->input('statistics_value', []);
        $descriptions = $request->input('statistics_description', []);
        
        for ($i = 0; $i < count($titles); $i++) {
            if (!empty($titles[$i])) {
                $statistics[] = [
                    'title' => $titles[$i],
                    'value' => $values[$i] ?? '',
                    'description' => $descriptions[$i] ?? '',
                ];
            }
        }
        $result['statistics'] = $statistics;
        
        // Sort order sempre 0 para único registro
        $result['sort_order'] = 0;

        $hero = $this->heroService->createHero($result);

        return response()->json($this->name . ' adicionado com sucesso', 200);
    }

    public function edit($id)
    {
        $result = $this->heroService->getHeroById($id);
        $statuses = Status::default();

        return view($this->folder . '.form', compact('result', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $result = $request->all();

        $rules = array(
            'title' => 'required',
            'status' => 'required',
        );
        $messages = array(
            'title.required' => 'title é obrigatório',
            'status.required' => 'status é obrigatório',
        );

        $validator = Validator::make($result, $rules, $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }

        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $imagePath = $image->store('heroes', 'public');
            $result['background_image'] = $imagePath;
        }

        // Processar estatísticas
        $statistics = [];
        $titles = $request->input('statistics_title', []);
        $values = $request->input('statistics_value', []);
        $descriptions = $request->input('statistics_description', []);
        
        for ($i = 0; $i < count($titles); $i++) {
            if (!empty($titles[$i])) {
                $statistics[] = [
                    'title' => $titles[$i],
                    'value' => $values[$i] ?? '',
                    'description' => $descriptions[$i] ?? '',
                ];
            }
        }
        $result['statistics'] = $statistics;
        
        // Sort order sempre 0 para único registro
        $result['sort_order'] = 0;

        $hero = $this->heroService->updateHero($id, $result);

        return response()->json($this->name . ' atualizado com sucesso', 200);
    }

    public function delete($id)
    {
        $this->heroService->deleteHero($id);

        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}

