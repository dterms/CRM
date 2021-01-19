<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class WorkerController extends Controller
{
    // Worker Dashboard
    public function dashboard() {
        $totalOrder =  Order::where('worker_id', Auth::user()->id)->count();
        $completeOrder =  Order::where('status', 4)->count();
        $Orders = Order::with('specification')->latest()->where('worker_id', NULL)->where('status', 1)->get();
        return view('backend.worker.pages.dashboard', compact('Orders','totalOrder','completeOrder'));
    }

    // Worker Take it
    public function orderTakeIt($orderId){

        $OrderCheck = Order::where('worker_id',  Auth::user()->id)->where('status', 1)->first();

        if($OrderCheck == false){
            $OrderTakeId = Order::findOrFail($orderId)->update([
                'worker_id' =>  Auth::user()->id
            ]);
            if($OrderTakeId){
                $notification = array(
                    'message'   =>  'A new order has been taken',
                    'alert-type'    =>  'success'
                );

                return redirect()->route('worker.order.index')->with($notification);
            }

        }
        else{
            $notification = array(
                'message'   =>  'Before order complete now',
                'alert-type'    =>  'error'
            );

            return redirect()->back()->with($notification);
        }

    }


}










