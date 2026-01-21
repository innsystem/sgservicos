<?php

namespace App\Services;

use App\Models\Hero;

class HeroService
{
	public function getAllHeroes($filters = []) 
	{
		$query = Hero::query();

		if (!empty($filters['name'])) {
			$query->where('title', 'LIKE', '%' . $filters['name'] . '%');
		}

		if (!empty($filters['status'])) {
			$query->where('status', $filters['status']);
		}

		if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
			$query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
		}

		return $query->orderBy('sort_order')->get(); 
	}

	public function getHeroById($id) 
	{
		return Hero::findOrFail($id);
	}

	public function getActiveHero() 
	{
		// Tenta encontrar o status "Habilitado"
		$statusEnabled = \App\Models\Status::where('name', 'Habilitado')->where('type', 'default')->first();
		
		// Se não encontrar, tenta qualquer status do tipo default
		if (!$statusEnabled) {
			$statusEnabled = \App\Models\Status::where('type', 'default')->first();
		}
		
		// Se encontrou um status, busca hero com esse status
		if ($statusEnabled) {
			$hero = Hero::where('status', $statusEnabled->id)
				->orderBy('sort_order')
				->first();
			
			if ($hero) {
				return $hero;
			}
		}
		
		// Fallback: retorna o primeiro hero disponível (independente do status)
		return Hero::orderBy('sort_order')->first();
	}

	public function createHero($data) 
	{
		return Hero::create($data);
	}

	public function updateHero($id, $data) 
	{
		$model = Hero::findOrFail($id);
		$model->update($data);
		return $model;
	}

	public function deleteHero($id) 
	{
		$model = Hero::findOrFail($id);
		return $model->delete();
	}
}

