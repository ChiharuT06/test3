<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; //追加
use App\Models\Book; //追加
use App\Http\Controllers\GuestController; //追加   
use App\Http\Controllers\SeatController;
use App\Models\Position;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//本：ダッシュボード表示(books.blade.php)
//Route::get('/', [BookController::class,'index'])->middleware(['auth'])->name('book_index');
//Route::get('/dashboard', [BookController::class,'index'])->middleware(['auth'])->name('dashboard');

//本：追加 
Route::post('/books',[BookController::class,"store"])->name('book_store');
//booksにアクセスした際に、BookControllerにアクセスしてstoreという処理を実行する
//本：削除 
Route::delete('/book/{book}', [BookController::class,"destroy"])->name('book_destroy');

//本：更新画面
Route::post('/booksedit/{book}',[BookController::class,"edit"])->name('book_edit'); //通常
Route::get('/booksedit/{book}', [BookController::class,"edit"])->name('edit');      //Validationエラーありの場合

//本：更新画面
Route::post('/books/update',[BookController::class,"update"])->name('book_update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
Route::get('/', function () {
   $positions = Position::all();
   return view('guests',compact('positions'));//guests.blade.phpを返す
});



// 追加
    Route::get('/hello-world', function () {
        event(new App\Events\MyEvent('hello world'));
    
    });

   
//Route::group(['prefix' => '/pusher'], function () {
    Route::get('/pusher-index', function () {
        return view('pusher-index');
    });
});
  



require __DIR__.'/auth.php';
