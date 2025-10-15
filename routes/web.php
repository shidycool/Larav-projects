<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CrudController;

// Route::get('/', function () {
//     return Inertia::render('welcome');
// })->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

// require __DIR__.'/settings.php';
// require __DIR__.'/auth.php';


Route::get('/', function(){
return 'Hello Rash';
});

Route::get('about', function(){
return 'About Us Page here';
});

Route::prefix('details')->group(function(){
Route::get('students',function(){
return 'this is my student';
})->name('details info');

Route::get('teacher',function(){
return 'this is my my teacher';
})->name('Teachers info');

});
// passing parameters in the route
Route::get('student/{id}/{reg}/{name}', function($id,$reg,$name){
return 'Your Student ID is'.$id. '<br>'.' Your Registration number is '.$reg. '<br>'.' and finally your name is '.$name;
});

//fallback function Error message
Route::fallback(function(){
    return 'You have enter wrong URL, please try again';
});

Route::get('hello', function(){
    return view('hello',['greeting' => 'Hello Rahid ']);
});




Route::get('/cruds', [CrudController::class, 'index'])->name('cruds.index');
Route::get('/cruds/create', [CrudController::class, 'create'])->name('cruds.create');
Route::post('/cruds/create', [CrudController::class, 'store'])->name('cruds.store');
Route::get('/cruds/{product}/edit', [CrudController::class, 'edit'])->name('cruds.edit');
Route::put('/cruds/{product}/update', [CrudController::class, 'update'])->name('cruds.update');
Route::delete('/cruds/{product}/destroy', [CrudController::class, 'destroy'])->name('cruds.destroy');
    
