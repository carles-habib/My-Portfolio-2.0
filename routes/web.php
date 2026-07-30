<?php


use App\Http\Controllers\BlogController;
use App\Http\Controllers\expeduController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FunfactsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PortfolioCategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\MainController;


require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
| The only endpoints an anonymous visitor should reach. Everything that
| reads or writes CMS content lives in the auth group further down.
*/

Route::get('/',[MainController::class, 'index'])->name('home');
Route::get('contacts',[ContactController::class, 'contacts'])->name('contacts');
// Throttled: this is the one public write endpoint with a side effect —
// it stores an Inbox row and dispatches mail to the site owner.
Route::post('submitmessage',[ContactController::class, 'submitmessage'])
    ->middleware('throttle:5,1')
    ->name('submitmessage');

// AJAX fragments for the portfolio grid + lightbox on the home page
Route::post('/portfolio/filter', [PortfolioController::class, 'filter'])->name('portfolio.filter');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');


/*
|--------------------------------------------------------------------------
| Blog — public reads, authenticated writes
|--------------------------------------------------------------------------
| Declaration order matters: the literal '/create' and '/category/...'
| segments must be registered before the catch-all '/{post:slug}', or the
| show route would swallow them. Keep the nested auth groups in place
| rather than hoisting the write routes to the bottom.
*/

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');

    Route::middleware('auth')->group(function () {
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/', [BlogController::class, 'store'])->name('store');
    });

    Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/tag/{tag:slug}', [BlogController::class, 'tag'])->name('tag');

    Route::middleware('auth')->group(function () {
        Route::get('/{post:slug}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{post:slug}', [BlogController::class, 'update'])->name('update');
        Route::delete('/{post:slug}', [BlogController::class, 'destroy'])->name('destroy');
    });

    Route::get('/{post:slug}', [BlogController::class, 'show'])->name('show');
});


/*
|--------------------------------------------------------------------------
| Authenticated — CMS, dashboard and admin template pages
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    //Contact Routing
    Route::get('contactInfo',[ContactController::class, 'ShowContact'])->name('ShowContact');

    //Header Route
    Route::get('menu',[HomeController::class, 'menu'])->name('menu');

    //Hero Section Route
    Route::get('hero', [HomeController::class, 'hero'])->name('hero');
    Route::resource('images', ImageController::class)->only(['create', 'store', 'show', 'destroy']);
    Route::put('/hero', [HomeController::class, 'update'])->name('hero.update');
    Route::get('/quicklinks/{quicklinks}', [HomeController::class, 'quicklinks'])->name('quicklinks.edit');
    Route::put('/quicklinks', [HomeController::class, 'quicklinksupdate'])->name('quicklinks.update');
    Route::get('/funfacts/create', [FunfactsController::class, 'create'])->name('funfacts.create');
    Route::post('/funfacts', [FunfactsController::class, 'store'])->name('funfacts.store');
    Route::get('/funfacts/{funfact}/edit', [FunfactsController::class, 'edit'])->name('funfacts.edit');
    Route::put('/funfacts/{funfact}', [FunfactsController::class, 'update'])->name('funfacts.update');
    Route::delete('/funfacts/{funfact}', [FunfactsController::class, 'destroy'])->name('funfacts.destroy');

    //service section Routes
    Route::get('service.list', [HomeController::class, 'service'])->name('service.list');
    Route::get('service.add', [HomeController::class, 'addservice'])->name('service.add');
    Route::post('servicestore', [ServiceController::class, 'servicestore'])->name('servicestore');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::get('services', [HomeController::class, 'services'])->name('services');

    //Projects section Route
    Route::get('projects.create', [PortfolioController::class, 'create'])->name('project.create');
    Route::post('storeproject', [PortfolioController::class, 'storeportfolio'])->name('storeportfolio');
    Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::get('portfolios.list', [PortfolioController::class, 'list'])->name('portfolios');
    Route::resource('portfolio-categories', PortfolioCategoryController::class)->except(['show']);

    //Experience and Education section Routes
    Route::get('exp-edu.list', [HomeController::class, 'expedu'])->name('exp-edu.list');
    Route::get('exp-edu.create', [HomeController::class, 'addexpedu'])->name('exp-edu.create');
    Route::post('expstore',[expeduController::class, 'expstore'])->name('expstore');
    Route::post('edustore',[expeduController::class, 'edustore'])->name('edustore');
    Route::delete('/exp/{id}', [expeduController::class, 'expdestroy'])->name('experience.destroy');
    Route::delete('/edu/{id}', [expeduController::class, 'edudestroy'])->name('education.destroy');

    //Stories Section Routes
    Route::get('stories', [HomeController::class, 'stories'])->name('stories');
    Route::get('addstory', [HomeController::class, 'addstory'])->name('addstory');
    Route::post('storestory', [StoriesController::class, 'storestory'])->name('storestory');
    Route::delete('/stories/{id}', [StoriesController::class, 'destroy'])->name('story.destroy');

    //Skills Section Routes
    Route::get('skill', [SkillsController::class, 'skills'])->name('skill');
    Route::get('create-skill', [SkillsController::class, 'create'])->name('create-skill');
    Route::post('skillstore', [SkillsController::class, 'skillstore'])->name('skillstore');
    Route::get('/skills/{skills}/edit', [SkillsController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skills}', [SkillsController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{id}', [SkillsController::class, 'destroy'])->name('skills.destroy');

    // Permission Module
    Route::get('/role-permission',[RolePermission::class, 'index'])->name('role.permission.list');
    Route::post('/role-permission',[RolePermission::class, 'store'])->name('role.permission.store');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Users Module
    Route::resource('users', UserController::class);

    // Contact inbox — the messages submitted through the public contact form.
    Route::get('inbox', [HomeController::class, 'inbox'])->name('inbox.table');

    //Extra Page Routs
    Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
    Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');
});
