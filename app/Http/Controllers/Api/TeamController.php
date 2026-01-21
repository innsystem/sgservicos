<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'status', 'start_date', 'end_date']);
        return response()->json($this->teamService->getAllTeams($filters));
    }

    public function show($id)
    {
        return response()->json($this->teamService->getTeamById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate(array (
  'name' => 'required|string',
  'role' => 'string',
  'thumb' => 'required|string',
  'status' => 'required|string',
));
        return response()->json($this->teamService->createTeam($data), 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(array (
  'name' => 'required|string',
  'role' => 'string',
  'thumb' => 'required|string',
  'status' => 'required|string',
));
        return response()->json($this->teamService->updateTeam($id, $data));
    }

    public function destroy($id)
    {
        $this->teamService->deleteTeam($id);
        return response()->json(['message' => 'Team deleted']);
    }
}
