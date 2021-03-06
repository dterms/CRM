@extends('layouts.master')
@section('title', 'Dashboard')
@push('styles')
<style>
    .client_btn_sec {
        display: flex;
    }

    .client_contact-us {
        width: 142px;
        margin-left: 10px;
        height: 41px;
        margin: 0 auto;
        text-align: center;
        padding: 10px 7px;
        font-size: 14px;
        text-decoration: none;
        color: #fff;
        background-color: #19AAF8;
    }

    .order_now_btn {
        padding: 10px 50px;
        background: #fff;
    }

    .track-btn {
        color: #fff;
        padding: 4px 35px;
        background: #19aaf8;
    }

    .feedback-btn {
        margin: 0 auto;
        width: 186px;
        text-align: center;
        padding: 10px 7px;
        font-size: 14px;
        text-decoration: none;
        color: #fff;
        background-color: #19AAF8;
        height: 44px;
    }

    .table td, .table th {
        vertical-align: middle !important;
    }
    .page-item.active .page-link {
        color: #ffffff;
        z-index: 1;
        background-color: #19AAF8 !important;
        border-color: #19AAF8 !important;
    }
    .pagination{
        margin: 0;
    }
    @media screen and (max-width: 767px) {
        .client_btn_sec {
            /* display:flex; */
            flex-direction: column;
        }

        .client_contact-us {
            margin-bottom: 10px
        }

        .free_trial {
            height: auto !important;
            margin: 10px auto !important;
        }

        .track-btn {
            padding: 4px 9px;
        }
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
<section class="client_dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="py-3 bg-white">
                <h1 class="m-0 pl-3">Welcome {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="bg-white shadow-sm p-4">
                <div class="text-center">
                    <h3 class="text-left">Requires? (Bulk Images)</h3>
                    <p class="mt-3 font-weight-600 text-left" style="color: #000000; font-weight: 500; font-size: 16px;">If you need help or have any questions, feel free to contact us! Make sure to contact us for a custom price setting when you are planning  to upload large volumes.</p>
                    <div class="d-flex justify-content-center mt-4 mb-4">
                        <a class="btn btn-md shadow-sm rounded-0 text-light px-4 mr-3" style="background: #19AAF8;" href=""> Contact Us</a>
                        <a href="" class="btn btn-md shadow-sm rounded-0 text-light px-4" style="background: #19AAF8;">View Help Page</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="shadow-sm p-4" style="background: #19AAF8; height: 270px;">
                <div class="text-left">
                    <h3 class="text-light">Free Trial</h3>
                    <p style="color:#fff;">You have 20 free trial images left! (Cannot be used on
                        pets, selfies or landscapes)</p>
                    <div class="text-center mt-5">
                        <a href="" class="btn btn-md shadow-sm rounded-0 px-5" style="background: #fff;"> Order Now</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="bg-white shadow-sm p-4">
                <div class="text-center " >
                    <h3 class="text-left">Feedback</h3>
                    <p class="m-0 font-weight-600 text-left" style="color: #000000; font-weight: 500; font-size: 16px;">You have 20 free trial images left! (Cannot be used on pets, selfies or landscapes)</p>
                    <div class="d-flex justify-content-center mb-4" style="margin-top: 50px;">
                        <a href="{{ route('client.order.feedback') }}" class="btn btn-md shadow-sm rounded-0 text-light px-4 mr-3" style="background: #19AAF8;"> Give feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8" style="">
            <div>
                <canvas id="myChart" width="100" height="40"></canvas>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <div class="ads_from">
                <h1 class="m-0">image hobe</h1>
            </div>
        </div>
    </div>
    <div class="table_order card p-4 mt-3">
        <div class="row">
            <div class="all_card_title"><h3 class="m-0">Recent Orders</h3></div>
            <div class="table-responsive pt-4 ">
                <table class="table table-bordered shadow-sm w-100">
                    <thead>
                        <th>Client ID</th>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Deadline</th>
                        <th>Image</th>
                        <th>Specification</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($RecentOrder as $recentOrders)
                            <tr>
                                <td>{{ $recentOrders->client->user_id }}</td>
                                <td>{{ $recentOrders->order_id }}</td>
                                <td>{{ date('d-M-Y', strtotime($recentOrders['order_date'])) }}</td>
                                <td>{{ date('d-M-Y', strtotime($recentOrders['delivery_date'])) }}</td>

                                {{-- @foreach ($recentOrders->orderImage as $images)
                                    <td>{{ count($images->image) }}</td>
                                @endforeach --}}

                                <td>Check</td>
                                <td>{{ $recentOrders->specification->name }}</td>
                                <td>${{ $recentOrders->price }}</td>
                                <td>
                                    @if ($recentOrders->status == 1)
                                        <span class="active_btn shadow-sm">Active</span>
                                    @elseif($recentOrders->status == 2)
                                        <span class="active_btn shadow-sm" style="background: #E9B0F0;">Pending</span>
                                    @elseif($recentOrders->status == 3)
                                        <span class="active_btn shadow-sm" style="background: #F0EFB0;">Redo</span>
                                    @elseif($recentOrders->status == 4)
                                        <span class="active_btn shadow-sm" style="background: #B0DAF0;">Completed</span>
                                    @elseif($recentOrders->status == 5)
                                        <span class="active_btn shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                    @endif
                                </td>

                                <td><a class="btn btn-sm rounded-0 shadow-sm px-3 text-light" style="background: #19AAF8;" href="{{ route('client.order.show',$recentOrders->id) }}">Track Order</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <div class="d-flex justify-content-end">
            {{ $RecentOrder->links() }}
        </div>
    </div>
</section>
@endsection



