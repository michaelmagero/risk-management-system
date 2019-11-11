<?php

namespace App\Http\Controllers;

use Alert;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Redirect;
use Carbon;
use Illuminate\Support\Str;

class DevController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->user()->role;
        switch ($user) {
            case 'dev':
                return view('dev.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
                break;
            case 'admin':
                return view('dev.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
                break;
            case 'retex-admin':
                return view('dev.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
                break;
            case 'client-admin':
                return view('dev.index')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
                break;
            case 'agent':
                return view('dev.itemcodes.confirm')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
                break;
            case 'cashier':
                return view('dev.itemcodes.confirm_code')
                    ->with('users', User::orderBy('created_at', 'desc')->get())
                    ->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
                break;
            default:
                Alert::error('User Does Not exist!', 'Error')->autoclose(2500);
                return back();
                break;
        }
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    //USER METHODS
    public function users()
    {
        return View('dev.users.show')
            ->with('users', User::orderBy('created_at', 'desc')->get())
            ->with('users', User::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('dev.users.create');
    }

    public function create_user(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('new-user-dev/')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user = new User();
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->role = $request->get('role');
                $user->password = bcrypt($request->get('password'));
                $user->created_by = Auth::user()->name . " " . Auth::user()->lastname;
                $user->save();
                Alert::success('User Registered Successfully!', 'Success')->autoclose(3000);
                return back();
            } else {
                Alert::error('Add user fail!, Duplicate email or Invalid credentials', 'Error')->autoclose(3000);
                return back();
            }
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            return view('dev.users.read')->with('users', User::where('id', $user->id)->orderBy('created_at', 'desc'));
        } else {
            return view('dev.users.read');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dev.users.edit')->with('users', User::where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('edit-user-dev/' . $id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $user = User::findOrFail($id);
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->role = $request->get('role');
                $password = $request->get('password');
                $confirm_password = $request->get('password_confirmation');
                if ($password != $confirm_password) {
                    Alert::error('Passwords Dont Match! Check passwords and try again', 'Error')->autoclose(2500);
                    return back();
                } else {
                    $user->password = bcrypt($request->get('password'));
                }
                $user->updated_by = Auth::user()->name . "  " . Auth::user()->lastname;
                $user->save();
                Alert::success('Update Successful!', 'Success')->autoclose(2500);
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        Alert::success('User Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function all_itemcodes()
    {
        return View('dev.itemcodes.show')->with('coupons', Coupon::orderBy('created_at', 'desc')->get());
    }

    public function create_itemcode()
    {
        return view('dev.itemcodes.create');
    }

    public function insert_itemcode(Request $request)
    {
        $array = $request->get('arrayName');
        $item_name = $request->get('item');
        $id = 0;
        ini_set('max_execution_time', 300);
        foreach ($array as $key => $value) {
            $count = $value['no_of_items'];
            $col = collect($array);
            $total_items = $col->sum('no_of_items');
            for ($i = 0; $i < $count; $i++) {
                $itemcodes[] = [
                    'id' => $id++,
                    'item' => $value['item'],
                    'crypt_text' => bcrypt(Str::random(10)),
                    'item_status' => 'tagged',
                    'received_by' => '',
                    'received_on' => '',
                    'returned_by' => '',
                    'returned_on' => '',
                    'checkedout_by' => '',
                    'checkedout_on' => '',
                ];
            }
        }
        $code = new Coupon();
        $code->order_code = mt_rand(100000, 999999);
        $code->item = $value['item'];
        $code->no_of_items = $total_items;
        $code->items_code = $itemcodes;
        $code->created_by = Auth::user()->name . " " . Auth::user()->lastname;
        $code->save();
        Alert::success('ItemCodes Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function check_ordercode()
    {
        return view('dev.itemcodes.confirm');
    }

    public function confirm_code(Request $request)
    {
        $icode = $request->get('codes');
        $codes = DB::select('select order_code,items_code from codes');
        foreach ($codes as $ke => $va) {
            $jdecode = json_decode($va->items_code);
            foreach ($jdecode as $k => $v) {
                $crypt = $v->crypt_text;
                $status = $v->item_status;

                if ($crypt == $icode &&  $status == "tagged") {
                    $v->item_status = 'in store';
                    $v->received_by = Auth::user()->name . " " . Auth::user()->lastname;
                    $v->received_on = Carbon\Carbon::parse()->format('Y-m-d h:i:s');
                    $jencode = json_encode($jdecode);
                    DB::update("update codes set items_code = '$jencode' where order_code = ?", [$va->order_code]);
                    Alert::success('Received Successfully!', 'Success')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "in store") {
                    Alert::error(' Item already in store', 'Error')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "sold") {
                    Alert::error(' Item is sold', 'Error')->autoclose(2500);
                    return back();
                }
            }
            Alert::error('Invalid Item', 'Error')->autoclose(2500);
            return back();
        }
    }

    public function checkout()
    {
        return view('dev.itemcodes.confirm_code');
    }

    public function confirm_code_cashier(Request $request)
    {
        $icode = $request->get('codes');
        $codes = DB::select('select order_code,items_code from codes');
        foreach ($codes as $ke => $va) {
            $jdecode = json_decode($va->items_code);
            foreach ($jdecode as $k => $v) {
                //dump($v);
                $crypt = $v->crypt_text;
                $status = $v->item_status;
                if ($crypt == $icode &&  $status == "in store") {
                    $v->item_status = 'sold';
                    $v->checkedout_by = Auth::user()->name . " " . Auth::user()->lastname;
                    $v->checkedout_on = Carbon\Carbon::parse()->format('Y-m-d h:i:s');
                    $jencode = json_encode($jdecode);
                    DB::update("update codes set items_code = '$jencode' where order_code = ?", [$va->order_code]);
                    Alert::success('Sale Successful!', 'Success')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "tagged") {
                    Alert::error('Invalid not Received', 'Error')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "sold") {
                    Alert::error(' Item is sold', 'Error')->autoclose(2500);
                    return back();
                }
            }
            Alert::error('Invalid Item', 'Error')->autoclose(2500);
            return back();
        }
    }

    public function return()
    {
        return view('dev.itemcodes.return');
    }

    public function return_item(Request $request)
    {
        $icode = $request->get('codes');
        $codes = DB::select('select order_code,items_code from codes');
        foreach ($codes as $ke => $va) {
            $jdecode = json_decode($va->items_code);
            foreach ($jdecode as $k => $v) {
                $crypt = $v->crypt_text;
                $status = $v->item_status;
                if ($crypt == $icode &&  $status == "sold") {
                    $v->item_status = 'in store';
                    $v->returned_by = Auth::user()->name . " " . Auth::user()->lastname;
                    $v->returned_on = Carbon\Carbon::parse()->format('Y-m-d h:i:s');
                    $jencode = json_encode($jdecode);
                    DB::update("update codes set items_code = '$jencode' where order_code = ?", [$va->order_code]);
                    Alert::success('Return Successful!', 'Success')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "tagged") {
                    Alert::error('Invalid Item not Received', 'Error')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "in store") {
                    Alert::error(' Item is already in store', 'Error')->autoclose(2500);
                    return back();
                }
            }
            Alert::error('Invalid Item', 'Error')->autoclose(2500);
            return back();
        }
    }

    public function export($id)
    {
        Excel::create('ItemCodes', function ($excel) use ($id) {
            $excel->sheet('Itemcodes', function ($sheet) use ($id) {
                $data = Coupon::where('id', $id)->get(['items_code']);
                $col = collect($data);
                foreach ($col as $cl) {
                    $icode = $cl->items_code;
                    $collection = collect($icode);
                    $sheet->fromArray($collection);
                }
            });
        })
            ->setFilename('Itemcodes_' . $id)
            ->download('xlsx');
    }

    public function makeqr($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        return view('dev.itemcodes.qr')->with('coupons', Coupon::where('id', $coupon->id)->orderBy('created_at', 'desc')->get());
    }

    public function show_itemcode($id)
    {
        $codes = Coupon::where('id', $id)->get();
        foreach ($codes as $code) {
            $cod = $code->items_code;
            $a = $cod;
            $col1 = collect($a);
            $status = $col1->pluck('item_status');
            $sold = $status->filter(function ($value, $key) {
                return $value == 'sold';
            });
            $store = $status->filter(function ($value, $key) {
                return $value == 'in store';
            });
            $sold_items = $sold->count();
            $instore_items = $store->count();
        }
        $coupon = Coupon::where('id', $id)->first();
        if ($coupon) {
            return view('dev.itemcodes.read')
                ->with('coupons', Coupon::where('id', $coupon->id)->orderBy('created_at', 'desc')->get())
                ->with('sold_items', $sold_items)
                ->with('instore_items', $instore_items);
        } else {
            return view('dev.itemcodes.read');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit_itemcode($id)
    {
        $coupon = Coupon::find($id);
        return view('dev.itemcodes.edit')->with('coupons', Coupon::where('id', $id)->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_itemcode($id)
    {
        $coup = Coupon::find($id)->delete();
        Alert::success('ItemCodes Deleted Successfully', 'Success')->autoclose(2500);
        return back();
    }

    public function reset_itemcode($id)
    {
        $coup = Coupon::find($id);
        $query = DB::select('select items_code from codes where id = ?', [$id]);
        foreach ($query as $key => $value) {
            $arr = json_decode($value->items_code);
            foreach ($arr as $k => $v) {
                $v->item_status = 'tagged';
                $v->returned_by = '';
                $v->returned_on = '';
                $v->checkedout_by = '';
                $v->checkedout_on = '';
                $v->received_by = '';
                $v->received_on = '';
                $jencode = json_encode($arr);
                DB::update("update codes set items_code = '$jencode' where id = ?", [$id]);
            }
            Alert::success('Reset Successful', 'Success')->autoclose(2500);
            return back();
        }
    }
}
