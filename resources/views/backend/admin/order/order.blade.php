@extends('layouts.master')
@section('title', 'Order')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')
<section class="admin_orders">
    <div class="card p-4">
        <div class=" all_card_title" style="padding: 10px 15px;width: 100%"><b>Orders</b></div>
        <div class="table-responsive ">
            <table class="table table-bordered w-100" id="DataTable">
                <thead>
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Deadline</th>
                    <th>Image</th>
                    <th>Specification</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Acts</th>
                </thead>
                <tbody>

                    @foreach ($AllOrder as $key => $Orders)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ date('d M y', strtotime($Orders['order_date'])) }}</td>
                            <td>{{ date('d M y', strtotime($Orders['delivery_date'])) }}</td>
                            <td>check</td>
                            <td>{{ $Orders->specification->name }}</td>
                            <td>
                                @if ($Orders->status == 1)
                                    <span class="active_btn shadow-sm">Active</span>
                                @elseif($Orders->status == 2)
                                    <span class="active_btn shadow-sm" style="background: #E9B0F0;">Pending</span>
                                @elseif($Orders->status == 3)
                                    <span class="active_btn shadow-sm" style="background: #F0EFB0;">Redo</span>
                                @elseif($Orders->status == 4)
                                    <span class="active_btn shadow-sm" style="background: #B0DAF0;">Completed</span>
                                @elseif($Orders->status == 5)
                                    <span class="active_btn shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                @endif
                            </td>
                            <td>{{ $Orders->price }}</td>
                            <td><a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;" href="">Track Order</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
