<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\marchentController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobilebankingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RiderController;
use Illuminate\Support\Facades\Auth;

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

Route::get('well', function (){
    return view('welcome');
});

Auth::routes();


Route::get('/', [aboutController::class, 'home']);
Route::get('about', [aboutController::class, 'index']);
Route::get('service', [serviceController::class, 'index']);
Route::get('tracking', [serviceController::class, 'tracking']);
Route::post('trackcheck', [serviceController::class, 'trackcheck']);
Route::get('pricing', [galleryController::class, 'index']);
Route::get('genarelcharge', [galleryController::class, 'genarelcharge']);
Route::get('expresscharge', [galleryController::class, 'expresscharge']);
Route::get('bookcharge', [galleryController::class, 'bookcharge']);
Route::get('pickdrop', [galleryController::class, 'pickdrop']);
Route::get('pointcharge', [galleryController::class, 'pointcharge']);
Route::get('contact', [contactController::class, 'index']);
Route::get('branchget', [contactController::class, 'newget']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('addparcel', [marchentController::class, 'addparcel']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('addnewparcel', [ParcelController::class, 'addnewparcel']);
    Route::get('setprofile', [marchentController::class, 'setprofile']);
    Route::get('pickuprequ', [marchentController::class, 'pickuprequ']);
    Route::post('addressadd', [MobilebankingController::class, 'addressadd']);
    Route::post('adbkash', [MobilebankingController::class, 'adbkash']);
    Route::post('adcardno', [MobilebankingController::class, 'adcardno']);
    Route::get('addnote', [marchentController::class, 'addnote']);
    Route::post('noteaction', [marchentController::class, 'noteaction']);
    Route::get('waitingappr', [marchentController::class, 'waitingappr']);
    Route::get('balancedetails', [marchentController::class, 'balancedetails']);
    Route::get('allparceldetails', [marchentController::class, 'allparceldetails']);
    Route::get('payment/request', [TransactionController::class, 'payriqu']);
    Route::post('payment/request/send', [TransactionController::class, 'sendpaymentrequ']);
    Route::get('tnxdetails/{tnx}', [TransactionController::class, 'tnxdetails']);
    Route::get('transactioninfo', [marchentController::class, 'transactioninfo']);
    Route::get('pendingtk', [marchentController::class, 'pendingtk']);
    Route::get('editprofile', [marchentController::class, 'editprofile']);
    Route::post('editproaction', [marchentController::class, 'editproaction']);


});

Route::get('admin', [AdminController::class, 'adminlogin']);
Route::post('admincreate', [AdminController::class, 'admincreate']);

Route::group(['middleware'=>'admin'], function(){
    Route::get('adminpanel', [AdminController::class, 'adminpanel']);
    Route::get('adminlogout', [AdminController::class, 'adminlogout']);
    Route::get('showmanager', [AdminController::class, 'showmanager']);
    Route::post('addmanager', [AdminController::class, 'addmanager']);
    Route::get('newbranch', [AdminController::class, 'newbranch']);

    Route::post('addbranch', [AdminController::class, 'addbranch']);
    Route::get('showmodaretor', [AdminController::class, 'showmodaretor']);
    Route::post('addmodaretor', [AdminController::class, 'addmodaretor']);
    Route::get('approval', [AdminController::class, 'approval']);
    Route::post('balanceadded', [AdminController::class, 'balanceadded']);
    Route::get('profitdetails', [AdminController::class, 'profitdetails']);
    Route::get('showpayriqu', [TransactionController::class, 'showpayriqu']);
    Route::get('paidpayriqu/{tnxid}', [TransactionController::class, 'paidpayriqu']);
    Route::get('allparcel', [AdminController::class, 'allparcel']);
    Route::get('allmanager', [AdminController::class, 'allmanager']);
    Route::get('allrider', [AdminController::class, 'allrider']);
    Route::get('marchentcheck', [AdminController::class, 'marchentcheck']);
    Route::get('mcheck/{id}',[AdminController::class, 'mcheck']);
    Route::get('pendingByAdmin',[AdminController::class, 'pendingByAdmin']);
    Route::get('alldelivery',[AdminController::class, 'alldelivery']);
    

});

Route::get('manager', [ManagerController::class, 'managerlogin']);
Route::post('manageraction', [ManagerController::class, 'manageraction']);

Route::group(['middleware'=>'manager'], function(){

Route::get('managerpanel', [ManagerController::class, 'managerpanel']);
Route::get('managerlogout', [ManagerController::class, 'managerlogout']);
Route::get('viewpickriqu', [ManagerController::class, 'viewpickriqu']);
Route::get('pickupdelete/{id}', [ManagerController::class, 'pickupdelete']);
Route::get('addrider', [ManagerController::class, 'addrider']);
Route::post('createrider', [ManagerController::class, 'createrider']);
Route::get('addparceltom', [ManagerController::class, 'addparceltom']);
Route::get('riderassign/{id}', [ManagerController::class, 'riderassign']);
Route::post('assignaction', [ManagerController::class, 'assignaction']);
Route::post('manageraddparcel', [ManagerController::class, 'manageraddparcel']);
Route::get('allpendingshow', [ManagerController::class, 'allpendingshow']);
Route::get('sendparcel', [ManagerController::class, 'sendparcel']);
Route::get('upcoming', [ManagerController::class, 'upcoming']);
Route::get('moneytransfer', [ManagerController::class, 'moneytransfer']);
Route::get('pendingmarchent', [ManagerController::class, 'pendingmarchent']);
Route::get('marchent/delete/{id}', [ManagerController::class, 'mdelete']);
Route::get('marchent/accept/{id}', [ManagerController::class, 'maccept']);
Route::get('ourdelivery', [ManagerController::class, 'ourdelivery']);

Route::get('parceldelete/{id}', [ParcelController::class, 'parceldelete']);
Route::get('parcelapprove/{id}', [ParcelController::class, 'parcelapprove']);
Route::post('parcelsend', [ParcelController::class, 'parcelsend']);
Route::get('receiving/{id}', [ParcelController::class, 'receiving']);
Route::get('allreceived', [ParcelController::class, 'allreceived']);
Route::get('sendanother/{id}', [ParcelController::class, 'sendanother']);
Route::get('deliveryassign/{id}', [ParcelController::class, 'deliveryassign']);
Route::post('anotherloca', [ParcelController::class, 'anotherloca']);
Route::post('deliriderassign', [ParcelController::class, 'deliriderassign']);
Route::get('editparcel', [ParcelController::class, 'editparcel']);
Route::post('parceledit', [ParcelController::class, 'parceledit']);
Route::post('newedit', [ParcelController::class, 'newedit']);
Route::post('extraedit', [ParcelController::class, 'extraedit'])->name('pl');


});

Route::get('rider', [RiderController::class, 'loginview']);
Route::post('loginaction', [RiderController::class, 'loginaction']);




Route::group(['middleware'=>'rider'], function(){

Route::get('allriqu', [RiderController::class, 'allriqu']);
Route::get('rhome', [RiderController::class, 'rhome']);
Route::get('pickdone/{id}', [RiderController::class, 'pickdone']);
Route::get('allassignshow', [RiderController::class, 'allassignshow']);
Route::get('deliverydone/{id}', [RiderController::class, 'deliverydone']);
Route::get('info', [RiderController::class, 'info']);
Route::get('deliverydetails', [RiderController::class, 'deliverydetails']);

});



//ajax
Route::get('chargecheck/{id}',[galleryController::class, 'chargecheck']);



Route::get('riderlogout', [RiderController::class, 'riderlogout'])->middleware('backDisable');