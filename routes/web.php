<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::resource('article', ArticleController::class)->middleware('auth:sanctum');

// Route::group(['prefix'=>'/article', 'middleware'=>'auth'], function(){
//     Route::get('', [ArticleController::class, 'index']);
//     Route::get('/create', [ArticleController::class, 'create']);
//     Route::get('/store', [ArticleController::class, 'store']);
// });


// главная
Route::get('/', [MainController::class, 'index']);

Route::get('/galery/{full_image}', [MainController::class, 'show']);

Route::get('/auth/signup', [AuthController::class, 'create'])->name('signup');
Route::post('/auth/signup', [AuthController::class, 'signup']);

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/signin', [AuthController::class, 'customLogin']);
Route::get('/auth/logout', [AuthController::class, 'logout']);




Route::post('/article/{article}/comment', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comment.store');

Route::put('/comment/{comment}', [CommentController::class, 'update'])
    ->middleware('auth')
    ->name('comment.update');

Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])
    ->middleware('auth')
    ->name('comment.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/comments/moderation', [CommentController::class, 'moderation'])
        ->name('comment.moderation');

    Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])
        ->name('comment.approve');

    Route::delete('/comments/{comment}/reject', [CommentController::class, 'reject'])
        ->name('comment.reject');
});
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
