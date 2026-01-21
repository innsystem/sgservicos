<?php

namespace App\Services;

use App\Models\Team;

class TeamService
{
	public function getAllTeams($filters = []) 
	{
		$query = Team::query();

		if (!empty($filters['name'])) {
			$query->where('title', 'LIKE', '%' . $filters['name'] . '%');
		}

		if (!empty($filters['status'])) {
			$query->where('status', $filters['status']);
		}

		if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
			$query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
		}

		return $query->orderBy('position', 'ASC')->get(); 
	}

	public function getTeamById($id) 
	{
		return Team::findOrFail($id);
	}

	public function createTeam($data) 
	{
		return Team::create($data);
	}

	public function updateTeam($id, $data) 
	{
		$model = Team::findOrFail($id);
		$model->update($data);
		return $model;
	}

	public function deleteTeam($id) 
	{
		$model = Team::findOrFail($id);
		return $model->delete();
	}

}
