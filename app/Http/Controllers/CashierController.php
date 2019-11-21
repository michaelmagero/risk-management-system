<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Carbon;

class CashierController extends Controller
{
    public function checkout()
    {
        return view('dev.itemcodes.confirm_code');
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
        }
        Alert::error('Invalid Item', 'Error')->autoclose(2500);
        return back();
    }
}
