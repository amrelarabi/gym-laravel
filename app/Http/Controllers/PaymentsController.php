<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentsController extends Controller
{
    public function index(){
        $payments = Payment::orderBy('created_at', 'desc')->paginate(50);
        return view('payments.index',['payments'=>$payments]);
    }
    public function destory($id){
        $payment = Payment::find($id);
        $payment->delete();
        return back()->with('success', 'تم حذف المدفوع بنجاح');
    }
}
