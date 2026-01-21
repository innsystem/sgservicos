<?php

namespace App\Services;

use App\Models\About;

class AboutService
{
	public function getAllAbouts($filters = []) {
		$query = About::query();
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
	public function getAboutById($id) {
		return About::findOrFail($id);
	}
	public function getActiveAbout() {
		$statusEnabled = \App\Models\Status::where('name', 'Habilitado')->where('type', 'default')->first();
		if (!$statusEnabled) {
			$statusEnabled = \App\Models\Status::where('type', 'default')->first();
		}
		return About::where('status', $statusEnabled->id)->orderBy('sort_order')->first();
	}
	public function createAbout($data) {
		return About::create($data);
	}
	public function updateAbout($id, $data) {
		$model = About::findOrFail($id);
		$model->update($data);
		return $model;
	}
	public function deleteAbout($id) {
		$model = About::findOrFail($id);
		return $model->delete();
	}
}

