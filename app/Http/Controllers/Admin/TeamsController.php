<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\Status;
use App\Models\Team;
use Carbon\Carbon;
use App\Services\TeamService;

class TeamsController extends Controller
{
    public $name = 'Time'; //  singular
    public $folder = 'admin.pages.teams';

    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        return view($this->folder . '.index');
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

        $results = $this->teamService->getAllTeams($filters);

        return view($this->folder . '.index_load', compact('results'));
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
            'name' => 'required',
            'thumb' => 'required',
            'status' => 'required',
        );
        $messages = array(
            'name.required' => 'name é obrigatório',
            'thumb.required' => 'thumb é obrigatório',
            'status.required' => 'status é obrigatório',
        );

        $validator = Validator::make($result, $rules, $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumbPath = $thumb->store('teams', 'public');
            $result['thumb'] = $thumbPath;
        }

        $team = $this->teamService->createTeam($result);

        return response()->json($this->name . ' adicionado com sucesso', 200);
    }

    public function edit($id)
    {
        $result = $this->teamService->getTeamById($id);
        $statuses = Status::default();

        return view($this->folder . '.form', compact('result', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $result = $request->all();

        // 'email'         => "unique:teams,email,$id,id",
        $rules = array(
            'name' => 'required',
            'status' => 'required',
        );
        $messages = array(
            'name.required' => 'name é obrigatório',
            'status.required' => 'status é obrigatório',
        );

        $validator = Validator::make($result, $rules, $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumbPath = $thumb->store('teams', 'public');
            $result['thumb'] = $thumbPath;
        }

        $team = $this->teamService->updateTeam($id, $result);

        return response()->json($this->name . ' atualizado com sucesso', 200);
    }

    public function delete($id)
    {
        $this->teamService->deleteTeam($id);

        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}
