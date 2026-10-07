<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::resource('article', ArticleController::class);

// Route::group(['prefix'=>'/article', 'middleware'=>'auth'], function(){
//     Route::get('', [ArticleController::class, 'index']);
//     Route::get('/create', [ArticleController::class, 'create']);
//     Route::get('/store', [ArticleController::class, 'store']);
// });


// главная
Route::get('/', [MainController::class, 'index']);

Route::get('/galery/{full_image}', [MainController::class, 'show']);

Route::get('/auth/signup', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'signup']);

// Route::get('articles/show', [ArticleController::class, 'index']);
// о нас
Route::get('/about', function () {
    return view('about');
})-> name('about');

// контакты
Route::get('/contacts', function () {

    $contacts = [
        [
            'name' => 'Иванов Иван Иванович',
            'phone' => '+7 (900) 123-45-67',
            'email' => 'ivanov@example.com'
        ],
        [
            'name' => 'Петров Петр Петрович',
            'phone' => '+7 (900) 234-56-78',
            'email' => 'petrov@example.com'
        ],
        [
            'name' => 'Фантазия Закончилась УМеня',
            'phone' => '8 (800) 555-35-35',
            'email' => 'fantacy@example.com'
        ]
    ];

    return view('contacts', [
        'contacts' => $contacts
    ]);

})-> name('contacts');





// для тестов
Route::get('/nes-test',function(){
    return view('nes-test');
});
