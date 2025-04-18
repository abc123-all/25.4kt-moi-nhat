<?php
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ExeController;
use App\Http\Controllers\DoAnNhomController;
use App\Http\Controllers\AdminController;


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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('indexadmin', [AdminController::class, 'indexadmin'])->name('indexadmin');

    Route::get('categoriesadmin', [AdminController::class, 'categoriesadmin'])->name('categoriesadmin');

    Route::get('usersadmin', [AdminController::class, 'usersadmin'])->name('usersadmin');


    Route::get('itemadmin', [AdminController::class, 'itemadmin'])->name('itemadmin');

    Route::get('from_add_user', [AdminController::class, 'from_add_user'])->name('from_add_user');
    Route::post('from_add_user', [AdminController::class, 'post_from_add_user'])->name('post_from_add_user');

    Route::get('from_update_user', [AdminController::class, 'from_update_user'])->name('from_update_user');
    Route::post('from_update_user', [AdminController::class, 'post_from_update_user'])->name('post_from_update_user');

    Route::get('deleteUser', [AdminController::class, 'deleteUser'])->name('deleteUser');

    Route::get('revenuetadmin', [AdminController::class, 'revenuetadmin'])->name('revenuetadmin');

    Route::get('resultadmin', [AdminController::class, 'resultadmin'])->name('resultadmin');

Route::get('voucheradmin', [AdminController::class, 'voucheradmin'])->name('voucheradmin');

Route::get('from_add_voucher', [AdminController::class, 'from_add_voucher'])->name('from_add_voucher');
Route::post('from_add_voucher', [AdminController::class, 'post_from_add_voucher'])->name('post_from_add_voucher');

Route::get('from_update_voucher', [AdminController::class, 'from_update_voucher'])->name('from_update_voucher');
Route::post('from_update_voucher', [AdminController::class, 'post_from_update_voucher'])->name('post_from_update_voucher');

Route::get('deleteVoucher', [AdminController::class, 'deleteVoucher'])->name('deleteVoucher');


});
// Admin
Route::get('indexadmin', [AdminController::class, 'indexadmin'])->name('indexadmin');

Route::get('itemadmin', [AdminController::class, 'itemadmin'])->name('itemadmin');

Route::get('resultadmin', [AdminController::class, 'resultadmin'])->name('resultadmin');

Route::get('sidebaradmin', [AdminController::class, 'sidebaradmin'])->name('sidebaradmin');

Route::get('usersadmin', [AdminController::class, 'usersadmin'])->name('usersadmin');

Route::get('footeradmin', [AdminController::class, 'footeradmin'])->name('footeradmin');

Route::get('headeradmin', [AdminController::class, 'headeradmin'])->name('headeradmin');

Route::get('categoriesadmin', [AdminController::class, 'categoriesadmin'])->name('categoriesadmin');

Route::get('from_add_user', [AdminController::class, 'from_add_user'])->name('from_add_user');
Route::post('from_add_user', [AdminController::class, 'post_from_add_user'])->name('post_from_add_user');

Route::get('from_update_user', [AdminController::class, 'from_update_user'])->name('from_update_user');
Route::post('from_update_user', [AdminController::class, 'post_from_update_user'])->name('post_from_update_user');

Route::get('deleteUser', [AdminController::class, 'deleteUser'])->name('deleteUser');

Route::get('revenuetadmin', [AdminController::class, 'revenuetadmin'])->name('revenuetadmin');

// voucheradmin
Route::get('voucheradmin', [AdminController::class, 'voucheradmin'])->name('voucheradmin');
Route::get('from_add_voucher', [AdminController::class, 'from_add_voucher'])->name('from_add_voucher');
Route::post('from_add_voucher', [AdminController::class, 'post_from_add_voucher'])->name('post_from_add_voucher');

Route::get('from_update_voucher', [AdminController::class, 'from_update_voucher'])->name('from_update_voucher');
Route::post('from_update_voucher', [AdminController::class, 'post_from_update_voucher'])->name('post_from_update_voucher');

Route::get('deleteVoucher', [AdminController::class, 'deleteVoucher'])->name('deleteVoucher');


//
Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

//role
Route::get('role', [RoleController::class, 'role'])->name('user.role');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

// DoANNHOMF
Route::get('index', [DoAnNhomController::class, 'index'])->name('index');

Route::get('shop', [DoAnNhomController::class, 'shop'])->name('shop');

Route::get('detail', [DoAnNhomController::class, 'detail'])->name('detail');

Route::get('cart', [DoAnNhomController::class, 'cart'])->name('cart');

Route::get('checkout', [DoAnNhomController::class, 'checkout'])->name('checkout');

Route::get('contact', [DoAnNhomController::class, 'contact'])->name('contact');

Route::get('search', [DoAnNhomController::class, 'search'])->name('search');

Route::get('detailsearch', [DoAnNhomController::class, 'detailsearch'])->name('detailsearch');

// EXE1
Route::get('indexexe', [ExeController::class, 'indexexe'])->name('indexexe');

Route::get('loginexe', [ExeController::class, 'loginexe'])->name('loginexe');

Route::get('listexe', [ExeController::class, 'listexe'])->name('listexe');

Route::get('registerexe', [ExeController::class, 'registerexe'])->name('registerexe');

Route::get('updateexe', [ExeController::class, 'updateexe'])->name('updateexe');

Route::get('viewexe', [ExeController::class, 'viewexe'])->name('viewexe');





Route::get('/', function () {
    return view('welcome');
});
