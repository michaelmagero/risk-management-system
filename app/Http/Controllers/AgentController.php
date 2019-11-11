<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Coupon;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Carbon;

class AgentController extends Controller
{
    public function all_itemcodes()
    {
        return View('dev.itemcodes.show')->with('coupons', Coupon::orderBy('created_at', 'asc')->get());
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
}
