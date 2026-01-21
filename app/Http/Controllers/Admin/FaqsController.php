<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Status;
use Carbon\Carbon;
use App\Services\FaqService;

class FaqsController extends Controller
{
    public $name = 'FAQ';
    public $folder = 'admin.pages.faqs';
    protected $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index()
    {
        return view($this->folder . '.index');
    }

    public function load(Request $request)
    {
        $filters = $request->only(['name', 'status', 'date_range']);
        if (!empty($filters['date_range'])) {
            [$startDate, $endDate] = explode(' até ', $filters['date_range']);
            $filters['start_date'] = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $filters['end_date'] = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        }
        $results = $this->faqService->getAllFaqs($filters);
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
        
        // Se category for __custom__, usar category_custom
        if (isset($result['category']) && $result['category'] === '__custom__') {
            if (empty($result['category_custom'])) {
                return response()->json('A categoria customizada é obrigatória', 422);
            }
            $result['category'] = $result['category_custom'];
        }
        unset($result['category_custom']);
        
        $rules = ['category' => 'required', 'question' => 'required', 'answer' => 'required', 'status' => 'required', 'sort_order' => 'required'];
        $validator = Validator::make($result, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $this->faqService->createFaq($result);
        return response()->json($this->name . ' adicionado com sucesso', 200);
    }

    public function edit($id)
    {
        $result = $this->faqService->getFaqById($id);
        $statuses = Status::default();
        return view($this->folder . '.form', compact('result', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $result = $request->all();
        
        // Se category for __custom__, usar category_custom
        if (isset($result['category']) && $result['category'] === '__custom__') {
            if (empty($result['category_custom'])) {
                return response()->json('A categoria customizada é obrigatória', 422);
            }
            $result['category'] = $result['category_custom'];
        }
        unset($result['category_custom']);
        
        $rules = ['category' => 'required', 'question' => 'required', 'answer' => 'required', 'status' => 'required', 'sort_order' => 'required'];
        $validator = Validator::make($result, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }
        $this->faqService->updateFaq($id, $result);
        return response()->json($this->name . ' atualizado com sucesso', 200);
    }

    public function delete($id)
    {
        $this->faqService->deleteFaq($id);
        return response()->json($this->name . ' excluído com sucesso', 200);
    }
}

