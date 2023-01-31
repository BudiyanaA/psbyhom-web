<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\PageManagementController;
use App\Http\Controllers\SlideManagementController;
use App\Http\Controllers\CostumerManagementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DpConfirmationController;
use App\Http\Controllers\WaitingGoodController;
use App\Http\Controllers\LpConfirmationController;
use App\Http\Controllers\ReadyController;
use App\Http\Controllers\OverallController;
use App\Http\Controllers\BankManagementController;
use App\Http\Controllers\EmailContentManagementController;
use App\Http\Controllers\VoucherManagementController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

// Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::resource('admin_management', AdminManagementController::class);
Route::resource('page_management', PageManagementController::class);
Route::resource('slideshow_management', SlideManagementController::class);
Route::resource('costumer_management', CostumerManagementController::class);
Route::get('pre-orders', [OrderController::class, 'index'])->name('preorder.index');
Route::get('approval', [ApprovalController::class, 'index'])->name('approval.index');
Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('dp_confirmation', [DpConfirmationController::class, 'index'])->name('dpconfirmation.index');
Route::get('waiting_goods', [WaitingGoodController::class, 'index'])->name('Waitinggood.index');
Route::get('lp_confirmation', [LpConfirmationController::class, 'index'])->name('lpconfirmation.index');
Route::get('ready_to_ship', [ReadyController::class, 'index'])->name('ready.index');
Route::get('overall', [OverallController::class, 'index'])->name('overall.index');
Route::resource('bank_management', BankManagementController::class);
Route::get('email_content_management', [EmailContentManagementController::class, 'index'])->name('email.index');
Route::resource('voucher_management', VoucherManagementController::class);
// Route::post('system_params', [SystemController::class, 'store'])->name('system.create'); 
Route::resource('system_params', SystemController::class);