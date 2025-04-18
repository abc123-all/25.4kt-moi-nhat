<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Users;
use App\Models\Voucher;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminController extends Controller
{
    public function indexadmin()
    {
        return view('DoAN_nhomF.admin.index');
    }
    public function itemadmin()
    {
        $products = Product::paginate(4);
        return view('DoAN_nhomF.admin.items', compact('products'));
    }
    public function resultadmin()
    {

        return view('DoAN_nhomF.admin.result');
    }
    public function revenuetadmin()
    {

        return view('DoAN_nhomF.admin.revenue');
    }
    // voucher
    public function voucheradmin()
    {
        $vouchers = Voucher::all();
        $vouchers = Voucher::paginate(1);
        return view('DoAn_NhomF.admin.Voucher', compact('vouchers'));
    }

    public function sidebaradmin()
    {
        return view('DoAN_nhomF.admin.sidebar');
    }
    public function usersadmin(Request $request)
    {
        // $users = Users::all();
        // $users = Users::paginate(2);
        // return view('DoAN_nhomF.admin.users',compact('users'));
        $keyword = $request->input('keyword');
        // Nếu không có query, cho danh sách rỗng
        if ($keyword) {
            $users = Users::where('name', 'LIKE', "%$keyword%")
                ->paginate(3)
                ->appends(['keyword' => $keyword]);
        } else {
            $users = Users::all();
            $users = Users::paginate(2);
        }
        return view('DoAN_nhomF.admin.users', compact('users', 'keyword'));
    }

    public function footeradmin()
    {
        return view('DoAN_nhomF.admin.footer');
    }
    public function headeradmin()
    {
        return view('DoAN_nhomF.admin.header');
    }
    public function categoriesadmin()
    {

        return view('DoAN_nhomF.admin.categories');
    }
    public function from_add_user()
    {

        return view('DoAN_nhomF.admin.from_add_user');
    }
    // them voucher
    public function from_add_voucher()
    {

        return view('DoAN_nhomF.admin.from_add_voucher');
    }
    public function post_from_add_voucher(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code',
            'description' => 'required',
            'discount_type' => 'required|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
            'min_order_value' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:0,1',
        ]);
        $data = $request->all();
        $check = Voucher::create([
            'code' => $data['code'],
            'description' => $data['description'],
            'discount_type' => $data['discount_type'],
            'discount_value' => $data['discount_value'],
            'max_discount' => $data['max_discount'],
            'min_order_value' => $data['min_order_value'],
            'quantity' => $data['quantity'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'status' => $data['status'],
        ]);
        return redirect("voucheradmin");
    }

    // voucher
    public function from_update_voucher(Request $request)
    {
        $voucher_id = $request->get('voucher_id');
        $voucher = Voucher::find($voucher_id);

        return view('DoAN_nhomF.admin.from_update_voucher', ['voucher' => $voucher]);
    }

    public function post_from_update_voucher(Request $request)
    {
        $input = $request->all();

        // Validate dữ liệu đầu vào
        $request->validate([
            'code' => 'required|unique:vouchers,code',
            'description' => 'required',
            'discount_type' => 'required|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
            'max_discount' => 'nullable|numeric|min:0',
            'min_order_value' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:0,1',
        ]);

        // Tìm voucher theo ID
        $voucher = Voucher::find($input['voucher_id']);
        // Cập nhật dữ liệu
        $voucher->code = $input['code'];
        $voucher->description = $input['description'];
        $voucher->discount_type = $input['discount_type'];
        $voucher->discount_value = $input['discount_value'];
        $voucher->max_discount = $input['max_discount'];
        $voucher->min_order_value = $input['min_order_value'];
        $voucher->quantity = $input['quantity'];
        $voucher->start_date = $input['start_date'];
        $voucher->end_date = $input['end_date'];
        $voucher->status = $input['status'];

        $voucher->save();

        return redirect('voucheradmin')->with('success', 'Cập nhật người dùng thành công.');
    }

    public function deleteVoucher(Request $request)
    {
        $voucher_id = $request->get('voucher_id');
        $voucher = Voucher::destroy($voucher_id);

        return redirect("voucheradmin")->withSuccess('You have delete susscess');
    }

    // user
    public function from_update_user(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = Users::find($user_id);

        return view('DoAN_nhomF.admin.from_update_user', ['user' => $user]);
    }
    public function post_from_update_user(Request $request)
    {
        $input = $request->all();

        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:user,email,' . $input['user_id'] . ',user_id', // chú ý đổi lại đúng cột ID
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:6',
            'role' => 'required|in:0,1', // 0 = admin, 1 = customer
        ]);

        // Tìm user theo ID
        $user = Users::find($input['user_id']);
        // Cập nhật dữ liệu
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'] ?? null;
        $user->address = $input['address'] ?? null;
        $user->role = $input['role'];

        if (!empty($input['password'])) {
            $user->password = bcrypt($input['password']);
        }

        $user->save();

        return redirect('usersadmin')->with('success', 'Cập nhật người dùng thành công.');
    }
    public function post_from_add_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:user',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:6',
            'role' => 'required|in:0,1', // 0 = admin, 1 = customer
        ]);
        $data = $request->all();
        $check = Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => FacadesHash::make($data['password']),
            'role' => $data['role'],
        ]);
        return redirect("usersadmin");
    }
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = Users::destroy($user_id);

        return redirect("usersadmin")->withSuccess('You have signed-in');
    }
}
