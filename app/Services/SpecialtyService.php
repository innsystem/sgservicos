<?php

namespace App\Services;

use App\Models\Specialty;

class SpecialtyService
{
	public function getAllSpecialties($filters = []) 
	{
		$query = Specialty::query();

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

	public function getSpecialtyById($id) 
	{
		return Specialty::findOrFail($id);
	}

	public function getAllActiveSpecialties() 
	{
		$statusEnabled = \App\Models\Status::where('name', 'Habilitado')->where('type', 'default')->first();
		if (!$statusEnabled) {
			$statusEnabled = \App\Models\Status::where('type', 'default')->first();
		}
		return Specialty::where('status', $statusEnabled->id)->orderBy('sort_order')->get();
	}

	public function createSpecialty($data) 
	{
		return Specialty::create($data);
	}

	public function updateSpecialty($id, $data) 
	{
		$model = Specialty::findOrFail($id);
		$model->update($data);
		return $model;
	}

	public function deleteSpecialty($id) 
	{
		$model = Specialty::findOrFail($id);
		return $model->delete();
	}
}

