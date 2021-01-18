@extends('layouts.master')
@section('title', 'Dashboard')
@push('styles')
<style>
.card_head h1{
    font-size: 37px;
    color: #fff;
    margin-bottom: 36px;
}
    .take_it_btn {
        padding: 4px 35px;
        color: #fff;
        background-color: #19AAF8;
    }
    .card-dash {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: none !important;
    }
    .total_card {
        margin-bottom: 0;
        font-size: 21px;
        font-weight: 600;
        color: #000;
    }
    .card-body-dash-dash-dash-dash {
        padding: none !important;
    }
    .count {
        font-size: 37px;
        font-weight: 500;
        color: #19AAF8;
    }
    .page-item.active .page-link {
        background-color: #19AAF8 !important;
        border-color: #19AAF8 !important;
    }
</style>
@endpush
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')
<section class="worker_dashboard">
    <div class="row">
        <div class="col-md-12">
            <h1>Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="padd" style="padding: 20px 40px;">
                <div class="date_1" style="width: 40%;  margin-bottom: 10px;"><input type="date" class="form-control">
                </div>
                <div class="row" style="background-color: #19AAF8; padding: 20px;">
                <div class="col-12 text-center card_head"><h1>Total Order</h1></div>
                    <div class="col-md-4">
                        <div class="card-dash bg-" style="border-radius: none !important;">
                            <div class="card-body-dash text-center">
                                <p class="total_card">Total</p>
                                <p class="count">$100</p>
                            </div>
                            <span style="margin-top: 6px;height: 9px;width: 60%;background-color: #B0F0B2;"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-dash bg-" style="border-radius: none !important;">
                            <div class="card-body-dash text-center">
                                <p class="total_card">Completed</p>
                                <p class="count">$100</p>
                            </div>
                            <span style="margin-top: 6px;height: 9px;width: 60%;background-color: #B0F0B2;"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-dash bg-">
                            <div class="card-body-dash text-center">
                                <p class="total_card">Pending</p>
                                <p class="count">$100</p>
                            </div>
                            <span style="margin-top: 6px;height: 9px;width: 60%;background-color: #B0F0B2;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="padd" style="padding: 20px 40px;">
                <div class="date_1" style="width: 40%; margin-bottom: 10px;"><input type="date" class="form-control">
                </div>
                <div class="row" style="background-color: #19AAF8; padding: 20px;">
                <div class="col-12 text-center card_head"><h1>Total Pyament</h1></div>
                    <div class="col-md-4">
                        <div class="card-dash bg-">
                            <div class="card-body-dash text-center">
                                <p class="total_card">Total</p>
                                <p class="count">$100</p>
                            </div>
                            <span style="margin-top: 6px;height: 9px;width: 60%;background-color: #B0F0B2;"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-dash bg-">
                            <div class="card-body-dash text-center">
                                <p class="total_card">Completed</p>
                                <p class="count">$100</p>
                            </div>
                            <span style="margin-top: 6px;height: 9px;width: 60%;background-color: #B0F0B2;"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-dash bg-">
                            <div class="card-body-dash text-center">
                                <p class="total_card">Pending</p>
                                <p class="count">$100</p>
                            </div>
                            <span style="margin-top: 6px;height: 9px;width: 60%;background-color: #B0F0B2;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4" style="margin-top: 50px;">
        <div class="card-title" style="padding: 10px 15px;width: $100%">
            <h3 class="m-0">Available Orders</h3>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered w-$100" id="DataTable">
                <thead>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Deadline</th>
                    <th>Image</th>
                    <th>Specification</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Acts</th>
                </thead>
                <tbody>

                    @foreach ($Orders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ date('d-m-Y', strtotime($order['order_date'])) }}</td>
                            <td>{{ date('d-m-Y', strtotime($order['delivery_date'])) }}</td>
                            <td>check</td>
                            <td>{{ $order->specification->name }}</td>
                            <td>
                                @if ($order->status == 1)
                                    <span class="active_btn shadow-sm">Active</span>
                                @elseif($order->status == 2)
                                    <span class="active_btn shadow-sm" style="background: #E9B0F0;">Pending</span>
                                @elseif($order->status == 3)
                                    <span class="active_btn shadow-sm" style="background: #F0EFB0;">Redo</span>
                                @elseif($order->status == 4)
                                    <span class="active_btn shadow-sm" style="background: #B0DAF0;">Completed</span>
                                @elseif($order->status == 5)
                                    <span class="active_btn shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                @endif
                            </td>
                            <td>${{ $order->price }}</td>
                            <td>
                                <a href="{{ route('worker.order.take.it',$order->id) }}" class="btn btn-sm shadow-sm rounded-0 px-4 text-light" style="background: #19AAF8;">Take it</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
