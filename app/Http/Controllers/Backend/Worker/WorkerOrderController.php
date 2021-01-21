<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use App\Model\Order;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;

class WorkerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = Order::with('specification','client')->where('worker_id', Auth::user()->id)->first();
        $MyOrders = Order::with('specification','client')->where('worker_id', Auth::user()->id)->paginate(5);
        return view('backend.worker.order.order', compact('MyOrders','orderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $OrderDetails = Order::with('specification','client')->findOrFail($id);
        $Order = Order::with('specification','client')->where('worker_id', Auth::user()->id)->paginate(5);
        return view('backend.worker.order.order-details', compact('OrderDetails','Order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param int $id
     * order wise image download all
     */

    public function imageDownload($id){

        $images = Order::with('orderImage')->where(, $id);

        $zip = new ZipArchive();

        $fileName = 'DtermsOrder.zip';

        foreach($images->orderImage as $allImage){
            $path = 'assets/images/order_image/'.$allImage->image;
            if($zip->open(public_path($fileName), ZipArchive::CREATE) === true){
                $files = File::files(public_path($path));
                echo "<pre>";
                print_r($files);
                exit;
                foreach($files as $value){
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }

                $zip->close();

                return response()->download(public_path($fileName));
            }
        }

    }



}
