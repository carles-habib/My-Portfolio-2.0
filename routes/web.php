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

Route::get('/',[MainController::class, 'index'])->name('home');
Route::get('/courses',[MainController::class, 'courses'])->name('courses');
Route::resource('images', ImageController::class)->only(['create', 'store', 'show', 'destroy']);

//Contact Routing

Route::get('contacts',[ContactController::class, 'contacts'])->name('contacts');
Route::get('contactInfo',[ContactController::class, 'ShowContact'])->name('ShowContact');

Route::post('submitmessage',[ContactController::class, 'submitmessage'])->name('submitmessage');




//Header Route
Route::get('menu',[HomeController::class, 'menu'])->name('menu');


Route::group(['prefix' => 'menu-style'], function() {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});

//Hero Section Route
Route::get('hero', [HomeController::class, 'hero'])->name('hero');
Route::post('images.store', [ImageController::class, 'store'])->name('images.store');
Route::put('/hero', [HomeController::class, 'update'])->name('hero.update');
Route::get('/quicklinks/{quicklinks}', [HomeController::class, 'quicklinks'])->name('quicklinks.edit');
Route::put('/quicklinks', [HomeController::class, 'quicklinksupdate'])->name('quicklinks.update');
Route::get('/funfacts/create', [FunfactsController::class, 'create'])->name('funfacts.create');
Route::post('/funfacts', [FunfactsController::class, 'store'])->name('funfacts.store');
Route::get('/funfacts/{funfact}/edit', [FunfactsController::class, 'edit'])->name('funfacts.edit');
Route::put('/funfacts/{funfact}', [FunfactsController::class, 'update'])->name('funfacts.update');
Route::delete('/funfacts/{funfact}', [FunfactsController::class, 'destroy'])->name('funfacts.destroy');
Route::post('/portfolio/filter', [PortfolioController::class, 'filter'])->name('portfolio.filter');

//service section Routes
Route::get('service.list', [HomeController::class, 'service'])->name('service.list');
Route::get('service.add', [HomeController::class, 'addservice'])->name('service.add');
Route::post('servicestore', [ServiceController::class, 'servicestore'])->name('servicestore');
Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');


//Projects section Route
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
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



//Blog Routes (public listing/detail + dashboard create/edit, backed by the Post model)
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/', [BlogController::class, 'store'])->name('store');
    Route::get('/category/{category:slug}', [BlogController::class, 'category'])->name('category');
    Route::get('/tag/{tag:slug}', [BlogController::class, 'tag'])->name('tag');
    Route::get('/{post:slug}/edit', [BlogController::class, 'edit'])->name('edit');
    Route::put('/{post:slug}', [BlogController::class, 'update'])->name('update');
    Route::delete('/{post:slug}', [BlogController::class, 'destroy'])->name('destroy');
    Route::get('/{post:slug}', [BlogController::class, 'show'])->name('show');
});



//Skills Section Routes
Route::get('skill', [SkillsController::class, 'skills'])->name('skill');
Route::get('create-skill', [SkillsController::class, 'create'])->name('create-skill');
Route::post('skillstore', [SkillsController::class, 'skillstore'])->name('skillstore');
Route::get('/skills/{skills}/edit', [SkillsController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{skills}', [SkillsController::class, 'update'])->name('skills.update');
Route::delete('/skills/{id}', [SkillsController::class, 'destroy'])->name('skills.destroy');





//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('inbox', [HomeController::class, 'inbox'])->name('inbox.table');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});




//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});

Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission',[RolePermission::class, 'index'])->name('role.permission.list');
    Route::post('/role-permission',[RolePermission::class, 'store'])->name('role.permission.store');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Users Module
    Route::resource('users', UserController::class);
});


Route::get('services', [HomeController::class, 'services'])->name('services');


//Route::get('services-section',[ServicesController::class,'service']);
//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function() {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});
//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function() {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function() {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');



