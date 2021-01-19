<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientOrderFeedbackController extends Controller
{
    public function dashboard(){
        $Order = Order::latest()->where('client_id', Auth::user()->id)->where('status', 4)->paginate(10);
        return view('backend.client.order.feedback.index', compact('Order'));
    }

    // Order Feedback
    public function orderFeedback($id){
        return view('backend.client.order.feedback.feedback');
    }
}
