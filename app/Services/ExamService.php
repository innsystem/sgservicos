<?php

namespace App\Services;

use App\Models\Exam;

class ExamService
{
	public function getAllExams($filters = []) {
		$query = Exam::query();
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
	public function getExamById($id) {
		return Exam::findOrFail($id);
	}
	public function getAllActiveExams() {
		$statusEnabled = \App\Models\Status::where('name', 'Habilitado')->where('type', 'default')->first();
		if (!$statusEnabled) {
			$statusEnabled = \App\Models\Status::where('type', 'default')->first();
		}
		return Exam::where('status', $statusEnabled->id)->orderBy('sort_order')->get();
	}
	public function createExam($data) {
		return Exam::create($data);
	}
	public function updateExam($id, $data) {
		$model = Exam::findOrFail($id);
		$model->update($data);
		return $model;
	}
	public function deleteExam($id) {
		$model = Exam::findOrFail($id);
		return $model->delete();
	}
}

