<?php

use Illuminate\Support\Facades\Route;
use App\Models\Rabota;

use App\Models\Skill;




Route::get('/', function () {
    return view('welcome');
});

route::get('/test', function () {
    return 123;
});

Route::get('/skills/{category}', function($category) {
    $title = "Навыки в категории $category";

    $skills = skill::where('category', $category)->get();

   

  
    return view('skills')
        ->with('title', $title)
        ->with('skills', $skills);


});


Route::get('/skills', function(){
    $title = 'Навыки';

    $skills = skill::all();

  
    return view('skills')
        ->with('title', $title)
        ->with('skills', $skills);


});



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
