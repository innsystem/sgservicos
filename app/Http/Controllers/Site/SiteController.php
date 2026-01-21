<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Team;
use App\Models\Hero;
use App\Models\About;
use App\Models\Specialty;
use App\Models\Exam;
use App\Models\Faq;
use App\Models\Status;

class SiteController extends Controller
{
    public function index()
    {
        // Novos recursos usando Models diretamente
        $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
        if (!$statusEnabled) {
            $statusEnabled = Status::where('type', 'default')->first();
        }
        
        $statusId = $statusEnabled ? $statusEnabled->id : null;
        
        $pages = Page::where('status', 1)->get();
        $services = Service::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        $teams = Team::where('status', 1)->orderBy('position', 'ASC')->get();
        $testimonials = Testimonial::when($statusId, function($query) use ($statusId) {
            return $query->where('status', $statusId);
        })->orderBy('sort_order', 'ASC')->get();
        $portfolios = Portfolio::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        
        $hero = Hero::when($statusId, function($query) use ($statusId) {
            return $query->where('status', $statusId);
        })->orderBy('sort_order', 'ASC')->first();
        
        $about = About::when($statusId, function($query) use ($statusId) {
            return $query->where('status', $statusId);
        })->orderBy('sort_order', 'ASC')->first();
        
        $specialties = Specialty::when($statusId, function($query) use ($statusId) {
            return $query->where('status', $statusId);
        })->orderBy('sort_order', 'ASC')->get();
        
        $exams = Exam::when($statusId, function($query) use ($statusId) {
            return $query->where('status', $statusId);
        })->orderBy('sort_order', 'ASC')->get();
        
        $faqs = Faq::when($statusId, function($query) use ($statusId) {
            return $query->where('status', $statusId);
        })->orderBy('category')->orderBy('sort_order', 'ASC')->get();

        return view('site.pages.home', compact('pages', 'services', 'teams', 'testimonials', 'portfolios', 'hero', 'about', 'specialties', 'exams', 'faqs'));
    }

    public function pageShow($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            return redirect()->route('site.index');
        }

        if ($page->slug == 'a-clinica') {
            $teams = Team::where('status', 1)->orderBy('position', 'ASC')->get();
            return view('site.pages.about', compact('page', 'teams'));
        }

        return view('site.pages.pages_show', compact('page'));
    }

    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)->first();

        if (!$service) {
            return redirect()->route('site.index');
        }

        return view('site.pages.services_show', compact('service'));
    }

    public function portfolioShow($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->first();

        if (!$portfolio) {
            return redirect()->route('site.index');
        }

        return view('site.pages.portfolios_show', compact('portfolio'));
    }


    public function contact()
    {
        return view('site.pages.contact');
    }
    public function sendContact(Request $request)
    {
        $result = $request->all();

        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        );

        $messages = array(
            'name.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'subject.required' => 'Assunto é obrigatório',
            'message.required' => 'Mensagem é obrigatório',
        );

        $validator = Validator::make($result, $rules, $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 422);
        }

        $data = $request->only(['name', 'email', 'phone', 'subject', 'message']);

        Mail::to('leozinnn.ecko@gmail.com')->send(new ContactMail($data));

        return response()->json('E-mail enviado com sucesso!', 200);
    }

    public function conceptClinic()
    {
        return view('site.conceptClinic');
    }
}
