<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\WebhookController;

// Group Site
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('site.index');

    Route::get('/pagina/{slug}', 'pageShow')->name('site.pages.show');
    Route::get('/tratamentos/{slug}', 'serviceShow')->name('site.services.show');
    Route::get('/portfolios/{slug}', 'portfolioShow')->name('site.portfolios.show');
    Route::get('/diferenciais', 'diferenciais')->name('site.diferenciais');
    Route::get('/contato', 'contact')->name('site.contact');
    Route::post('/contato/send-email', 'sendContact')->name('site.contact.send');



    Route::get('/concept-clinic', 'conceptClinic')->name('site.conceptClinic');
});

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/post', 'post')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/recuperar-senha', 'passwordRecovery')->name('auth.passwordRecovery');
    Route::post('/recuperar-senha/post', 'passwordRecoveryPost')->name('auth.passwordRecovery.post');

    Route::get('/redefinir-senha', 'passwordReset')->name('auth.passwordReset');
    Route::post('/redefinir-senha/post', 'passwordResetPost')->name('auth.passwordReset.post');
});

Route::controller(WebhookController::class)->prefix('webhook')->group(function () {
    Route::get('/invoices/{invoice_id}/check-payment-status', 'checkPaymentStatus')->name('webhook.invoices.checkPaymentStatus');
});

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Admin\CommanderAdminController;
use App\Http\Controllers\Admin\StatusesController;
use App\Http\Controllers\Admin\UserGroupsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\HeroesController;
use App\Http\Controllers\Admin\AboutsController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\Admin\ExamsController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\PortfoliosController;
use App\Http\Controllers\Admin\IntegrationsController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\TeamsController;

// Group Admin
Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::controller(BaseAdminController::class)->group(function () {
            Route::get('/', 'index')->name('admin.index')->middleware('permission:admin.index');
            Route::get('/settings', 'settings')->name('admin.settings')->middleware('permission:admin.settings');
            Route::post('/settings/update', 'settingsUpdate')->name('admin.settings.update')->middleware('permission:admin.settings.update');
            Route::post('/settings/update-images', 'updateImages')->name('admin.settings.updateImages')->middleware('permission:admin.settings.updateImages');
        });

        Route::controller(CommanderAdminController::class)->group(function () {
            Route::get('/commander', 'index')->name('admin.commander')->middleware('permission:admin.commander');
            Route::post('/commander/create', 'create')->name('admin.commander.create')->middleware('permission:admin.commander.create');
            Route::post('/commander/migrate', 'migrate')->name('admin.commander.migrate')->middleware('permission:admin.commander.migrate');
        });

        Route::prefix('statuses')->controller(StatusesController::class)->group(function () {
            Route::get('/', 'index')->name('admin.statuses.index')->middleware('permission:admin.statuses.index');
            Route::get('/load', 'load')->name('admin.statuses.load')->middleware('permission:admin.statuses.load');
            Route::get('/create', 'create')->name('admin.statuses.create')->middleware('permission:admin.statuses.create');
            Route::post('/store', 'store')->name('admin.statuses.store')->middleware('permission:admin.statuses.store');
            Route::get('/{id}/edit', 'edit')->name('admin.statuses.edit')->middleware('permission:admin.statuses.edit');
            Route::post('/{id}/update', 'update')->name('admin.statuses.update')->middleware('permission:admin.statuses.update');
            Route::post('/{id}/delete', 'delete')->name('admin.statuses.delete')->middleware('permission:admin.statuses.delete');
        });

        Route::prefix('user_groups')->controller(UserGroupsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.user_groups.index')->middleware('permission:admin.user_groups.index');
            Route::get('/load', 'load')->name('admin.user_groups.load')->middleware('permission:admin.user_groups.load');
            Route::get('/create', 'create')->name('admin.user_groups.create')->middleware('permission:admin.user_groups.create');
            Route::post('/store', 'store')->name('admin.user_groups.store')->middleware('permission:admin.user_groups.store');
            Route::get('/{id}/edit', 'edit')->name('admin.user_groups.edit')->middleware('permission:admin.user_groups.edit');
            Route::post('/{id}/update', 'update')->name('admin.user_groups.update')->middleware('permission:admin.user_groups.update');
            Route::post('/{id}/delete', 'delete')->name('admin.user_groups.delete')->middleware('permission:admin.user_groups.delete');
        });

        Route::prefix('permissions')->controller(PermissionsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.permissions.index')->middleware('permission:admin.permissions.index');
            Route::get('/load', 'load')->name('admin.permissions.load')->middleware('permission:admin.permissions.load');
            Route::get('/create', 'create')->name('admin.permissions.create')->middleware('permission:admin.permissions.create');
            Route::post('/store', 'store')->name('admin.permissions.store')->middleware('permission:admin.permissions.store');
            Route::post('/{id}/delete', 'delete')->name('admin.permissions.delete')->middleware('permission:admin.permissions.delete');
        });

        Route::prefix('users')->controller(UsersController::class)->group(function () {
            Route::get('/', 'index')->name('admin.users.index')->middleware('permission:admin.users.index');
            Route::get('/load', 'load')->name('admin.users.load')->middleware('permission:admin.users.load');
            Route::get('/create', 'create')->name('admin.users.create')->middleware('permission:admin.users.create');
            Route::post('/store', 'store')->name('admin.users.store')->middleware('permission:admin.users.store');
            Route::get('/{id}/edit', 'edit')->name('admin.users.edit')->middleware('permission:admin.users.edit');
            Route::post('/{id}/update', 'update')->name('admin.users.update')->middleware('permission:admin.users.update');
            Route::post('/{id}/delete', 'delete')->name('admin.users.delete')->middleware('permission:admin.users.delete');
        });

        Route::prefix('customers')->controller(CustomersController::class)->group(function () {
            Route::get('/', 'index')->name('admin.customers.index')->middleware('permission:admin.customers.index');
            Route::get('/load', 'load')->name('admin.customers.load')->middleware('permission:admin.customers.load');
            Route::get('/create', 'create')->name('admin.customers.create')->middleware('permission:admin.customers.create');
            Route::post('/store', 'store')->name('admin.customers.store')->middleware('permission:admin.customers.store');
            Route::get('/{id}/show', 'show')->name('admin.customers.show')->middleware('permission:admin.customers.show');
            Route::get('/{id}/edit', 'edit')->name('admin.customers.edit')->middleware('permission:admin.customers.edit');
            Route::post('/{id}/update', 'update')->name('admin.customers.update')->middleware('permission:admin.customers.update');
            Route::post('/{id}/delete', 'delete')->name('admin.customers.delete')->middleware('permission:admin.customers.delete');
        });

        Route::prefix('pages')->controller(PagesController::class)->group(function () {
            Route::get('/', 'index')->name('admin.pages.index')->middleware('permission:admin.pages.index');
            Route::get('/load', 'load')->name('admin.pages.load')->middleware('permission:admin.pages.load');
            Route::get('/create', 'create')->name('admin.pages.create')->middleware('permission:admin.pages.create');
            Route::post('/store', 'store')->name('admin.pages.store')->middleware('permission:admin.pages.store');
            Route::get('/{id}/edit', 'edit')->name('admin.pages.edit')->middleware('permission:admin.pages.edit');
            Route::post('/{id}/update', 'update')->name('admin.pages.update')->middleware('permission:admin.pages.update');
            Route::post('/{id}/delete', 'delete')->name('admin.pages.delete')->middleware('permission:admin.pages.delete');
        });

        Route::prefix('heroes')->controller(HeroesController::class)->group(function () {
            Route::get('/', 'index')->name('admin.heroes.index')->middleware('permission:admin.heroes.index');
            Route::get('/load', 'load')->name('admin.heroes.load')->middleware('permission:admin.heroes.load');
            Route::get('/create', 'create')->name('admin.heroes.create')->middleware('permission:admin.heroes.create');
            Route::post('/store', 'store')->name('admin.heroes.store')->middleware('permission:admin.heroes.store');
            Route::get('/{id}/edit', 'edit')->name('admin.heroes.edit')->middleware('permission:admin.heroes.edit');
            Route::post('/{id}/update', 'update')->name('admin.heroes.update')->middleware('permission:admin.heroes.update');
            Route::post('/{id}/delete', 'delete')->name('admin.heroes.delete')->middleware('permission:admin.heroes.delete');
        });

        Route::prefix('abouts')->controller(AboutsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.abouts.index')->middleware('permission:admin.abouts.index');
            Route::get('/load', 'load')->name('admin.abouts.load')->middleware('permission:admin.abouts.load');
            Route::get('/create', 'create')->name('admin.abouts.create')->middleware('permission:admin.abouts.create');
            Route::post('/store', 'store')->name('admin.abouts.store')->middleware('permission:admin.abouts.store');
            Route::get('/{id}/edit', 'edit')->name('admin.abouts.edit')->middleware('permission:admin.abouts.edit');
            Route::post('/{id}/update', 'update')->name('admin.abouts.update')->middleware('permission:admin.abouts.update');
            Route::post('/{id}/delete', 'delete')->name('admin.abouts.delete')->middleware('permission:admin.abouts.delete');
        });

        Route::prefix('specialties')->controller(SpecialtiesController::class)->group(function () {
            Route::get('/', 'index')->name('admin.specialties.index')->middleware('permission:admin.specialties.index');
            Route::get('/load', 'load')->name('admin.specialties.load')->middleware('permission:admin.specialties.load');
            Route::get('/create', 'create')->name('admin.specialties.create')->middleware('permission:admin.specialties.create');
            Route::post('/store', 'store')->name('admin.specialties.store')->middleware('permission:admin.specialties.store');
            Route::get('/{id}/edit', 'edit')->name('admin.specialties.edit')->middleware('permission:admin.specialties.edit');
            Route::post('/{id}/update', 'update')->name('admin.specialties.update')->middleware('permission:admin.specialties.update');
            Route::post('/{id}/delete', 'delete')->name('admin.specialties.delete')->middleware('permission:admin.specialties.delete');
        });

        Route::prefix('exams')->controller(ExamsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.exams.index')->middleware('permission:admin.exams.index');
            Route::get('/load', 'load')->name('admin.exams.load')->middleware('permission:admin.exams.load');
            Route::get('/create', 'create')->name('admin.exams.create')->middleware('permission:admin.exams.create');
            Route::post('/store', 'store')->name('admin.exams.store')->middleware('permission:admin.exams.store');
            Route::get('/{id}/edit', 'edit')->name('admin.exams.edit')->middleware('permission:admin.exams.edit');
            Route::post('/{id}/update', 'update')->name('admin.exams.update')->middleware('permission:admin.exams.update');
            Route::post('/{id}/delete', 'delete')->name('admin.exams.delete')->middleware('permission:admin.exams.delete');
        });

        Route::prefix('faqs')->controller(FaqsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.faqs.index')->middleware('permission:admin.faqs.index');
            Route::get('/load', 'load')->name('admin.faqs.load')->middleware('permission:admin.faqs.load');
            Route::get('/create', 'create')->name('admin.faqs.create')->middleware('permission:admin.faqs.create');
            Route::post('/store', 'store')->name('admin.faqs.store')->middleware('permission:admin.faqs.store');
            Route::get('/{id}/edit', 'edit')->name('admin.faqs.edit')->middleware('permission:admin.faqs.edit');
            Route::post('/{id}/update', 'update')->name('admin.faqs.update')->middleware('permission:admin.faqs.update');
            Route::post('/{id}/delete', 'delete')->name('admin.faqs.delete')->middleware('permission:admin.faqs.delete');
        });

        Route::prefix('services')->controller(ServicesController::class)->group(function () {
            Route::get('/', 'index')->name('admin.services.index')->middleware('permission:admin.services.index');
            Route::get('/load', 'load')->name('admin.services.load')->middleware('permission:admin.services.load');
            Route::get('/create', 'create')->name('admin.services.create')->middleware('permission:admin.services.create');
            Route::post('/store', 'store')->name('admin.services.store')->middleware('permission:admin.services.store');
            Route::get('/{id}/edit', 'edit')->name('admin.services.edit')->middleware('permission:admin.services.edit');
            Route::post('/{id}/update', 'update')->name('admin.services.update')->middleware('permission:admin.services.update');
            Route::post('/{id}/delete', 'delete')->name('admin.services.delete')->middleware('permission:admin.services.delete');
        });

        Route::prefix('portfolios')->controller(PortfoliosController::class)->group(function () {
            Route::get('/', 'index')->name('admin.portfolios.index')->middleware('permission:admin.portfolios.index');
            Route::get('/load', 'load')->name('admin.portfolios.load')->middleware('permission:admin.portfolios.load');
            Route::get('/create', 'create')->name('admin.portfolios.create')->middleware('permission:admin.portfolios.create');
            Route::post('/store', 'store')->name('admin.portfolios.store')->middleware('permission:admin.portfolios.store');
            Route::get('/{id}/edit', 'edit')->name('admin.portfolios.edit')->middleware('permission:admin.portfolios.edit');
            Route::post('/{id}/update', 'update')->name('admin.portfolios.update')->middleware('permission:admin.portfolios.update');
            Route::post('/{id}/delete', 'delete')->name('admin.portfolios.delete')->middleware('permission:admin.portfolios.delete');
            Route::post('/{id}/delete-image', 'deleteImage')->name('admin.portfolios.delete.image')->middleware('permission:admin.portfolios.delete.image');
            Route::post('/{id}/define-image-thumb', 'defineImageThumb')->name('admin.portfolios.define.image')->middleware('permission:admin.portfolios.define.image');
        });

        Route::prefix('integrations')->controller(IntegrationsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.integrations.index')->middleware('permission:admin.integrations.index');
            Route::get('/load', 'load')->name('admin.integrations.load')->middleware('permission:admin.integrations.load');
            Route::get('/create', 'create')->name('admin.integrations.create')->middleware('permission:admin.integrations.create');
            Route::post('/store', 'store')->name('admin.integrations.store')->middleware('permission:admin.integrations.store');
            Route::get('/{id}/edit', 'edit')->name('admin.integrations.edit')->middleware('permission:admin.integrations.edit');
            Route::post('/{id}/update', 'update')->name('admin.integrations.update')->middleware('permission:admin.integrations.update');
            Route::post('/{id}/delete', 'delete')->name('admin.integrations.delete')->middleware('permission:admin.integrations.delete');
        });

        Route::prefix('testimonials')->controller(TestimonialsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.testimonials.index')->middleware('permission:admin.testimonials.index');
            Route::get('/load', 'load')->name('admin.testimonials.load')->middleware('permission:admin.testimonials.load');
            Route::get('/create', 'create')->name('admin.testimonials.create')->middleware('permission:admin.testimonials.create');
            Route::post('/store', 'store')->name('admin.testimonials.store')->middleware('permission:admin.testimonials.store');
            Route::get('/{id}/edit', 'edit')->name('admin.testimonials.edit')->middleware('permission:admin.testimonials.edit');
            Route::post('/{id}/update', 'update')->name('admin.testimonials.update')->middleware('permission:admin.testimonials.update');
            Route::post('/{id}/delete', 'delete')->name('admin.testimonials.delete')->middleware('permission:admin.testimonials.delete');
        });

        Route::prefix('sliders')->controller(SlidersController::class)->group(function () {
            Route::get('/', 'index')->name('admin.sliders.index')->middleware('permission:admin.sliders.index');
            Route::get('/load', 'load')->name('admin.sliders.load')->middleware('permission:admin.sliders.load');
            Route::get('/create', 'create')->name('admin.sliders.create')->middleware('permission:admin.sliders.create');
            Route::post('/store', 'store')->name('admin.sliders.store')->middleware('permission:admin.sliders.store');
            Route::get('/{id}/edit', 'edit')->name('admin.sliders.edit')->middleware('permission:admin.sliders.edit');
            Route::post('/{id}/update', 'update')->name('admin.sliders.update')->middleware('permission:admin.sliders.update');
            Route::post('/{id}/delete', 'delete')->name('admin.sliders.delete')->middleware('permission:admin.sliders.delete');
        });

        Route::prefix('invoices')->controller(InvoicesController::class)->group(function () {
            Route::get('/', 'index')->name('admin.invoices.index')->middleware('permission:admin.invoices.index');
            Route::get('/load', 'load')->name('admin.invoices.load')->middleware('permission:admin.invoices.load');
            Route::get('/create', 'create')->name('admin.invoices.create')->middleware('permission:admin.invoices.create');
            Route::post('/store', 'store')->name('admin.invoices.store')->middleware('permission:admin.invoices.store');
            Route::get('/{id}/show', 'show')->name('admin.invoices.show')->middleware('permission:admin.invoices.show');
            Route::get('/{id}/edit', 'edit')->name('admin.invoices.edit')->middleware('permission:admin.invoices.edit');
            Route::post('/{id}/update', 'update')->name('admin.invoices.update')->middleware('permission:admin.invoices.update');
            Route::post('/{id}/delete', 'delete')->name('admin.invoices.delete')->middleware('permission:admin.invoices.delete');
            Route::post('/{id}/cancel', 'cancel')->name('admin.invoices.cancel')->middleware('permission:admin.invoices.cancel');
            Route::post('/{id}/confirm-payment', 'confirmPayment')->name('admin.invoices.confirmPayment')->middleware('permission:admin.invoices.confirmPayment');
            Route::post('/{id}/send-reminder', 'sendReminder')->name('admin.invoices.sendReminder')->middleware('permission:admin.invoices.sendReminder');
            Route::post('/{id}/generate-payment', 'generatePayment')->name('admin.invoices.generatePayment')->middleware('permission:admin.invoices.generatePayment');
            Route::get('/{id}/load-installments', 'loadInstallments')->name('admin.invoices.loadInstallments')->middleware('permission:admin.invoices.loadInstallments');
        });

        Route::prefix('transactions')->controller(TransactionsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.transactions.index')->middleware('permission:admin.transactions.index');
            Route::get('/load', 'load')->name('admin.transactions.load')->middleware('permission:admin.transactions.load');
            Route::get('/create', 'create')->name('admin.transactions.create')->middleware('permission:admin.transactions.create');
            Route::post('/store', 'store')->name('admin.transactions.store')->middleware('permission:admin.transactions.store');
            Route::get('/{id}/edit', 'edit')->name('admin.transactions.edit')->middleware('permission:admin.transactions.edit');
            Route::post('/{id}/update', 'update')->name('admin.transactions.update')->middleware('permission:admin.transactions.update');
            Route::post('/{id}/delete', 'delete')->name('admin.transactions.delete')->middleware('permission:admin.transactions.delete');
        });

        Route::prefix('teams')->controller(TeamsController::class)->group(function () {
            Route::get('/', 'index')->name('admin.teams.index')->middleware('permission:admin.teams.index');
            Route::get('/load', 'load')->name('admin.teams.load')->middleware('permission:admin.teams.load');
            Route::get('/create', 'create')->name('admin.teams.create')->middleware('permission:admin.teams.create');
            Route::post('/store', 'store')->name('admin.teams.store')->middleware('permission:admin.teams.store');
            Route::get('/{id}/edit', 'edit')->name('admin.teams.edit')->middleware('permission:admin.teams.edit');
            Route::post('/{id}/update', 'update')->name('admin.teams.update')->middleware('permission:admin.teams.update');
            Route::post('/{id}/delete', 'delete')->name('admin.teams.delete')->middleware('permission:admin.teams.delete');
        });
    });
});
