<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('friends', FriendController::class);

    Route::get('friend/invite', [InvitationController::class, 'inviteForm'])->name('friend.invite');
    Route::post('friend/invite', [InvitationController::class, 'sendInvite'])->name('friend.invite.send');
});
Route::get('friend/accept-invitation/{token}', [InvitationController::class, 'acceptInvitation'])->name('friend.accept_invitation');

require __DIR__ . '/auth.php';

//dev routes
Route::get('/11', [HomeController::class, 'testOne']);
