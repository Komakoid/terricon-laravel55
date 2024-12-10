<?php

use Illuminate\Support\Facades\Route;
use App\Models\Rabota;

use App\Models\Skill;

use App\Http\Controllers\Testcontroller;

use App\Http\Controllers\SkillController;


Route::get('/', function() {
    return view("welcome");
});


route::get('/test/{id}', [Testcontroller::class, 'show']); 

Route::get('/skills/{category}' , [Testcontroller::class, 'getAllSkillsCategory']);

Route::get('/news1' , function() {
    $title2 = 'Новости terricon';

    return view('news', [
        'title2' => $title2
    ]); 
});



Route::get('/skills', [Testcontroller::class, 'SkillsBe'] );

route::get('/skills-json', [Testcontroller::class, 'getAllskills']); 


Route::get('/create-skill',[SkillController::class, 'renderCreatePage'])
    ->middleware('auth')
    ->name('skillCreate');



Route::get('/delete-skill/{id}',[SkillController::class, 'deleteSkill'])
    ->middleware('auth')
    ->name('skillDelete');



Route::post('/create-skill', [SkillController::class, 'createSkill'])
    ->middleware('auth')
    ->name('skillCreate.post');



route::get('/rabotas/{category}' , function($category) {
    $title = 'Портфолио категории $category';

    $rabotas = Rabota::where('category', $category)->get();
        
    

    return view('rabotas')
        ->with('title',$title)
        ->with('rabotas', $rabotas);
    
    
});




route::get('/rabotas' , function() {
    $title = 'Портфолио Terricon';

    $rabotas = Rabota::all();
        
    

    return view('rabotas')
        ->with('title',$title)
        ->with('rabotas', $rabotas);
    
    
});





Route::get('/news' , function() {
    $title2 = 'Новости terricon';

    return view('news', [
        'title2' => $title2
    ]); 
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        

        return view('dashboard');


    })->name('dashboard');
});
