<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Specialty;
use App\Models\Exam;
use App\Models\Status;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $getSettings = Setting::pluck('value', 'key')->toArray();
            $view->with('getSettings', $getSettings);
        });

        view()->composer('*', function ($view) {
            $getServices = Service::where('status', 1)->get();
            $view->with('getServices', $getServices);
        });

        view()->composer('*', function ($view) {
            $statusEnabled = Status::where('name', 'Habilitado')->where('type', 'default')->first();
            if (!$statusEnabled) {
                $statusEnabled = Status::where('type', 'default')->first();
            }
            $statusId = $statusEnabled ? $statusEnabled->id : null;
            
            $menuSpecialties = Specialty::when($statusId, function($query) use ($statusId) {
                return $query->where('status', $statusId);
            })->orderBy('sort_order', 'ASC')->take(8)->get();
            
            $menuExams = Exam::when($statusId, function($query) use ($statusId) {
                return $query->where('status', $statusId);
            })->orderBy('sort_order', 'ASC')->take(4)->get();
            
            $view->with('menuSpecialties', $menuSpecialties);
            $view->with('menuExams', $menuExams);
        });
    }
}
