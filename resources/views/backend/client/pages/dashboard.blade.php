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
    <div class="title_welcome card p-4">
        <div class="row ">
            <div class="col-md-12">
                <h1>Welcome Tachhab</h1>
            </div>
        </div>
    </div>
    <div class="descript p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center p-4 card" style="border:1px solid #ddd">
                    <h3>Requires? (Bulk Images)</h3>
                    <p style="font-size:12px">If you need help or have any questions feel free to contact us. Make Sure
                        to contact us for a custom price settings, you are planning to upload large volumes.</p>
                    <div class="client_btn_sec">
                        <a href="" class="client_contact-us">View Help Page</a>
                        <a class="client_contact-us" href=""> Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 free_trial p-4" style="background-color:#19AAF8;height: 264px;">
                <div class="text-center">
                    <h3 class="text-light">Free Trial</h3>
                    <p style="color:#fff;margin-bottom: 85px;">You have 20 free trial images left! (Cannot be used on
                        pets, selfies or landscapes)</p>
                    <a href="" class="order_now_btn"> Order Now</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center card p-4">
                    <h3>Feedback</h3>
                    <p>You have 20 free trial images left! (Cannot be used on pets, selfies or landscapes)</p>
                    <a class="feedback-btn" href="{{ route('client.order.feedback') }}"> Order Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="chart_show card p-4">
        <div class="row ">
            <div class="col-md-9" style="">
                <div class="">
                    Chart Display here...
                </div>
            </div>
            <div class="col-md-3">
                <div class="ads_from">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="table_order card p-4 mt-3">
        <div class="row">
            <div class="all_card_title"><h3 class="m-0">Recent Orders</h3></div>
            <div class="table-responsive pt-4 ">
                <table class="table table-bordered w-100">
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
                        @foreach ($RecentOrder as $recentOrders)
                            <tr>
                                <td>{{ $RecentOrder->firstItem()+$loop->index }}</td>
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



