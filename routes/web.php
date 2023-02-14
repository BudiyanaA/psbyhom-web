<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowOrderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TermConditionController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterCostumerController;
use App\Http\Controllers\LoginCostumerController;
use App\Http\Controllers\PreOrderController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\ProcesOrderController;
use App\Http\Controllers\PaymentCostumerController;
use App\Http\Controllers\ConfirmPaymentController;

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
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

// Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
Route::resource('admin_management', AdminManagementController::class);
Route::resource('page_management', PageManagementController::class);
Route::resource('slideshow_management', SlideManagementController::class);
Route::resource('costumer_management', CostumerManagementController::class);
Route::get('pre_orders', [OrderController::class, 'index'])->name('preorder.index');
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
});

Route::post('login_c', [LoginCostumerController::class, 'loginaction'])->name('loginaction');
Route::get('logoutaction', [LoginCostumerController::class, 'logoutaction'])->name('logoutaction');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('how_order', [HowOrderController::class, 'index'])->name('how_order');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('term_condition', [TermConditionController::class, 'index'])->name('term_condition');
Route::get('about_us', [AboutController::class, 'index'])->name('about_us');
Route::resource('contact_us', ContactController::class);
Route::get('register_c', [RegisterCostumerController::class, 'index'])->name('register_c');
Route::post('register_c/store', [RegisterCostumerController::class, 'store'])->name('register_c.store');
Route::post('register_c/action', [RegisterController::class, 'registeraction'])->name('registeraction');
Route::get('login_c', [LoginCostumerController::class, 'index']);
Route::resource('pre_order', PreOrderController::class);
Route::get('list_of_request_order', [OrderListController::class, 'index'])->name('orderlist.index');
Route::resource('process_order', ProcesOrderController::class);
Route::get('process_order', [ProcesOrderController::class, 'index'])->name('process_order');
Route::post('process_order/create', [ProcesOrderController::class, 'store'])->name('process_order.store');
Route::get('notification', [ProcesOrderController::class, 'notification'])->name('process_order.notification');
Route::get('payment_c', [PaymentCostumerController::class, 'index'])->name('payment_c.index');
Route::post('payment_c/store', [PaymentCostumerController::class, 'store'])->name('payment_c.store');
Route::get('payment_c/create', [PaymentCostumerController::class, 'create'])->name('payment_c.create');
Route::get('payment_c/notification', [PaymentCostumerController::class, 'notification'])->name('payment_c.notification');
Route::get('confirm_payment', [ConfirmPaymentController::class, 'index'])->name('confirm.index');
Route::post('confirm_payment/store', [ConfirmPaymentController::class, 'store'])->name('confirm_payment.store');
Route::get('confirm_payment/notification', [ConfirmPaymentController::class, 'notification'])->name('confirm_payment.notification');
// TODO:
// /request_order_controller/search_filter_request_transaction
// /po_invoice_controller/search_filter_invoice
// /incoming_item_controller/incoming_item_filter
// /po_invoice_controller/search_filter_invoice