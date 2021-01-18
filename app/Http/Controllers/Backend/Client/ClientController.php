<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboard(){
        $RecentOrder = Order::with('orderImage','specification')->latest()->where('client_id', Auth::user()->id)->paginate(5);
        return view('backend.client.pages.dashboard', compact('RecentOrder'));
    }


}
