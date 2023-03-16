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
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfilCostumer;
use App\Http\Controllers\PasswordCostumerController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\EwalletController;
use App\Http\Controllers\PreOrderSgController;
use App\Http\Controllers\OrderSgController;
use App\Http\Controllers\PaymentSgController;
use App\Http\Controllers\OverallSgController;
use App\Http\Controllers\WaitingGoodSgController;
use App\Http\Controllers\ApprovalSgController;

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

// CUSTOMER
Route::get('/', [HomeController::class, 'index']);

Route::get('register', [RegisterCostumerController::class, 'index'])->name('register_c');
Route::post('register/store', [RegisterCostumerController::class, 'store'])->name('register_c.store');
Route::get('register/activation', [RegisterCostumerController::class, 'activation'])->name('register.activation');
Route::get('register/activation/success', [RegisterCostumerController::class, 'activationSuccess'])->name('register.activation.success');
Route::get('register/activation/failed', [RegisterCostumerController::class, 'activationFailed'])->name('register.activation.failed');

Route::get('login', [LoginCostumerController::class, 'index']);
Route::post('login', [LoginCostumerController::class, 'loginaction'])->name('loginaction');

Route::get('preorder/create', [PreOrderController::class, 'create'])->name('preorder.create');
Route::post('preorder/create', [PreOrderController::class, 'store'])->name('preorder.store');
Route::get('preorder/notification', [PreOrderController::class, 'index'])->name('preorder.notification');

Route::get('preorder_sg/create', [PreOrderSgController::class, 'create'])->name('preorder_sg.create');
Route::post('preorder_sg/create', [PreOrderSgController::class, 'store'])->name('preorder_sg.store');

Route::get('request/view/{uuid}', [ProcesOrderController::class, 'edit'])->name('process_order');
// https://psbyhom.com/view_request/TY23020170 (redirect)
Route::post('process_order/create', [ProcesOrderController::class, 'store'])->name('process_order.store');
Route::get('notification', [ProcesOrderController::class, 'notification'])->name('process_order.notification');
Route::get('payment/confirm', [PaymentCostumerController::class, 'create'])->name('payment.confirm');
Route::post('payment/store', [PaymentCostumerController::class, 'store'])->name('payment.store');
Route::get('payment_c/notification', [PaymentCostumerController::class, 'notification'])->name('payment_c.notification');

Route::get('ewallet', [WalletController::class, 'index'])->name('ewallet');

// ADMIN
Route::get('admin/login', [LoginController::class, 'login'])->name('login');
Route::post('admin/login', [LoginController::class, 'actionlogin'])->name('login');

Route::get('logout', [LoginController::class, 'actionlogout'])->name('actionlogout');

Route::get('admin/register', [RegisterController::class, 'register'])->name('register');
Route::post('admin/register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [DashboardController::class, 'index'])->name('dashboard');


Route::get('admin/preorder/request_order', [OrderController::class, 'index'])->name('preorder.index');
Route::get('admin/preorder/request_order/view/{id}', [ApprovalController::class, 'edit'])->name('preorder.detail');
Route::put('admin/preorder/request_order/{id}/update', [ApprovalController::class, 'update'])->name('preorder.update');
Route::get('admin/preorder/request_order/notification', [ApprovalController::class, 'notification'])->name('order.notification');
Route::get('admin/customer/view/{id}', [ApprovalController::class, 'show'])->name('customer.detail');
Route::get('admin/customer/update/{id}', [ApprovalController::class, 'show'])->name('customer.update'); //TODO: Customer Controller

Route::get('admin/preorder_sg/request_order', [OrderSgController::class, 'index'])->name('preorder_sg.index');
Route::get('admin/preorder_sg/request_order/view/{id}', [ApprovalSgController::class, 'edit'])->name('preorder_sg.detail');
Route::put('admin/preorder_sg/request_order/{id}/update', [ApprovalSgController::class, 'update'])->name('preorder_sg.update');
Route::get('admin/preorder_sg/request_order/notification', [ApprovalController::class, 'notification'])->name('preorder_sg.notification');

Route::get('admin/po_invoice/view/{id}', [WaitingGoodController::class, 'edit'])->name('waitinggoods.detail');
Route::put('admin/po_invoice/validate/{id}', [WaitingGoodController::class, 'update'])->name('waitinggoods.update');
Route::get('admin/po_invoice/success/{id}', [WaitingGoodController::class, 'notification'])->name('waitinggood.notification');
Route::get('admin/preorder/incoming', [WaitingGoodController::class, 'index'])->name('Waitinggood.index');
Route::get('admin/preorder/invoice', [PaymentController::class, 'index'])->name('payment.index');

Route::get('admin/preorder_sg/incoming', [WaitingGoodSgController::class, 'index'])->name('Waitinggood_sg.index');

Route::get('admin/preorder_sg/invoice', [PaymentSgController::class, 'index'])->name('payment_sg.index');



Route::get('forgot_password', [LoginController::class, 'forgot'])->name('forgot_password');

// Route::get('/', [DashboardController::class, 'index'])->name('home');
// Route::group(['middleware' => 'auth:admin'], function () {
// Route::resource('admin_management', AdminManagementController::class);
Route::get('admin/user', [AdminManagementController::class, 'index'])->name('user.index');
Route::get('admin/user/create', [AdminManagementController::class, 'create'])->name('user.create');
Route::get('admin/user/edit{id}', [AdminManagementController::class, 'edit'])->name('user.edit');
Route::post('admin/user/create', [AdminManagementController::class, 'store'])->name('admin_management.store');
Route::put('admin/user/edit{id}', [AdminManagementController::class, 'update'])->name('user.update');


// Route::resource('page_management', PageManagementController::class);
Route::get('admin/cms/page', [PageManagementController::class, 'index'])->name('page_management.index');
Route::get('admin/cms/edit/{id}', [PageManagementController::class, 'edit'])->name('page_management.edit');
Route::put('admin/cms/edit/{id}', [PageManagementController::class, 'update'])->name('page_management.update');

// Route::resource('slideshow_management', SlideManagementController::class);
Route::get('admin/cms/slideshow', [SlideManagementController::class, 'index'])->name('slideshow_management.index');
Route::get('admin/cms/slideshow/create', [SlideManagementController::class, 'create'])->name('slideshow_management.create');
Route::get('admin/user/edit/{id}', [SlideManagementController::class, 'edit'])->name('slideshow_management.edit');
Route::post('admin/user/create', [SlideManagementController::class, 'store'])->name('slideshow_management.store');
Route::put('admin/user/edit/{id}', [SlideManagementController::class, 'update'])->name('slideshow_management.update');

// Route::resource('costumer_management', CostumerManagementController::class);
Route::get('admin/customer', [CostumerManagementController::class, 'index'])->name('costumer_management.index');

Route::get('ewallet/list', [EwalletController::class, 'index'])->name('ewallet.index');
Route::get('withdrawal/list', [EwalletController::class, 'withdrawal'])->name('withdrawal.index');

// Route::get('admin/waiting_approval', [ApprovalController::class, 'index'])->name('approval.index');
Route::post('noresi', [PaymentController::class, 'updateResi'])->name('resi.update');
Route::get('admin/dp_confirmation', [DpConfirmationController::class, 'index'])->name('dpconfirmation.index');
Route::put('/update-batch', [WaitingGoodController::class, 'updateBatch'])->name('update-batch');
Route::put('/update-status', [WaitingGoodController::class, 'updateStatus'])->name('update-status');

Route::get('admin/lp_confirmation', [LpConfirmationController::class, 'index'])->name('lpconfirmation.index');
Route::get('admin/ready_to_ship', [ReadyController::class, 'index'])->name('ready.index');
Route::get('admin/overal_order_report', [OverallController::class, 'index'])->name('overall.index');

Route::get('admin/preorder_sg/overal_order_report', [OverallSgController::class, 'index'])->name('overall_sg.index');

// Route::resource('bank_management', BankManagementController::class);
Route::get('admin/ecommerce/bank', [BankManagementController::class, 'index'])->name('bank_management.index');
Route::get('admin/ecommerce/bank/create', [BankManagementController::class, 'create'])->name('bank_management.create');
Route::get('admin/ecommerce/bank/edit/{id}', [BankManagementController::class, 'edit'])->name('bank_management.edit');
Route::post('admin/ecommerce/bank/create', [BankManagementController::class, 'store'])->name('bank_management.store');
Route::put('admin/ecommerce/bank/edit/{id}', [BankManagementController::class, 'update'])->name('bank_management.update');

Route::get('admin/ecommerce/email', [EmailContentManagementController::class, 'index'])->name('email.index');
Route::get('admin/ecommerce//view/{id}', [EmailContentManagementController::class, 'edit'])->name('email.detail');
Route::put('admin/ecommerce/{id}/update', [EmailContentManagementController::class, 'update'])->name('email.update');

// Route::resource('voucher_management', VoucherManagementController::class);
Route::get('admin/voucher/email', [VoucherManagementController::class, 'index'])->name('voucher_management.index');
Route::get('admin/voucher/email/create', [VoucherManagementController::class, 'create'])->name('voucher_management.create');
Route::get('admin/voucher/email/edit/{id}', [VoucherManagementController::class, 'edit'])->name('voucher_management.edit');
Route::post('admin/voucher/email/create', [VoucherManagementController::class, 'store'])->name('voucher_management.store');
Route::put('admin/voucher/email/edit/{id}', [VoucherManagementController::class, 'update'])->name('voucher_management.update');

// Route::post('system_params', [SystemController::class, 'store'])->name('system.create'); 
// Route::resource('admin/system/config', SystemController::class);
Route::get('admin/system/config', [SystemController::class, 'index'])->name('system_params');
Route::post('admin/system/config', [SystemController::class, 'store'])->name('system_params');
});
Route::get('my_profil', [ProfilController::class, 'index'])->name('my_profil');
Route::post('my_profil', [ProfilController::class, 'store'])->name('profil.store');
Route::get('change_password', [PasswordController::class, 'edit'])->name('change_password');
Route::patch('password', [PasswordController::class, 'update'])->name('change_password.update');
// });

Route::get('logoutaction', [LoginCostumerController::class, 'logoutaction'])->name('logoutaction');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('password/change', [PasswordCostumerController::class, 'edit'])->name('changepassword');
Route::patch('password', [PasswordCostumerController::class, 'update'])->name('changepassword.update');
Route::get('profil', [ProfilCostumer::class, 'index'])->name('profile');
Route::get('how_order', [HowOrderController::class, 'index'])->name('how_order');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('terms', [TermConditionController::class, 'index'])->name('term_condition');
Route::get('about', [AboutController::class, 'index'])->name('about_us');
// Route::get('contact_us', ContactController::class);
Route::get('contact', [ContactController::class, 'index'])->name('contact_us.index');
Route::post('contact', [ContactController::class, 'store'])->name('contac.store');
Route::post('admin/register/action', [RegisterController::class, 'registeraction'])->name('registeraction');


// Route::resource('preorder', PreOrderController::class);
Route::get('preorder/list', [PreOrderController::class, 'list'])->name('preorderlist');

Route::get('list_of_request_order', [OrderListController::class, 'index'])->name('orderlist.index');
// Route::resource('process_order', ProcesOrderController::class);

Route::get('payment_c', [PaymentCostumerController::class, 'index'])->name('payment_c.index');
Route::get('confirm_payment', [ConfirmPaymentController::class, 'index'])->name('confirm.index');
Route::post('confirm_payment/store', [ConfirmPaymentController::class, 'store'])->name('confirm_payment.store');
Route::get('confirm_payment/notification', [ConfirmPaymentController::class, 'notification'])->name('confirm_payment.notification');

Route::post('withdrawal/create', [WalletController::class, 'store'])->name('withdrawal.store');

// TODO:
// /request_order_controller/search_filter_request_transaction
// /po_invoice_controller/search_filter_invoice
// /incoming_item_controller/incoming_item_filter
// /po_invoice_controller/search_filter_invoice