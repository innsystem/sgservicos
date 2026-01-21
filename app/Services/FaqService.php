<?php

namespace App\Services;

use App\Models\Faq;

class FaqService
{
	public function getAllFaqs($filters = []) {
		$query = Faq::query();
		if (!empty($filters['name'])) {
			$query->where('question', 'LIKE', '%' . $filters['name'] . '%');
		}
		if (!empty($filters['status'])) {
			$query->where('status', $filters['status']);
		}
		if (!empty($filters['start_date']) && !empty($filters['end_date'])) {
			$query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
		}
		return $query->orderBy('category')->orderBy('sort_order')->get(); 
	}
	public function getFaqById($id) {
		return Faq::findOrFail($id);
	}
	public function getAllActiveFaqs() {
		$statusEnabled = \App\Models\Status::where('name', 'Habilitado')->where('type', 'default')->first();
		if (!$statusEnabled) {
			$statusEnabled = \App\Models\Status::where('type', 'default')->first();
		}
		return Faq::where('status', $statusEnabled->id)->orderBy('category')->orderBy('sort_order')->get();
	}
	public function createFaq($data) {
		return Faq::create($data);
	}
	public function updateFaq($id, $data) {
		$model = Faq::findOrFail($id);
		$model->update($data);
		return $model;
	}
	public function deleteFaq($id) {
		$model = Faq::findOrFail($id);
		return $model->delete();
	}
}

