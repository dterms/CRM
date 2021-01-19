@extends('layouts.master')
@section('title', 'Content')
@push('styles')
<style>
    .all-order {
        max-width: 1525px;
        width: 1525px;
        background: #fff;
        margin: 35px;
        padding: 20px;
    }

    .order-btn {
        display: flex;
        width: 185px;
        height: 42px;
        background: #19aaf8;
        color: #fff;
        margin-left: 86px;
        margin-top: 9px;
        cursor: pointer;
        border: none;
        justify-content: center;
        align-items: center;
    }

    .order-btn:hover {
        color: #fff;
    }

    .in_progress {
        height: 40px;
        background-color: #fff;
    }

    .in_progress_bar {
        width: 70%;
        height: 100px;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .form-control-underlined {
        border-width: 0;
        border-bottom-width: 1px;
        border-radius: 0;
        padding-left: 0;
    }

    .form-control::placeholder {
        font-size: 0.95rem;
        color: #aaa;
        font-style: italic;
    }

    .track_order {
        color: #fff;
    }

    .all_card_title {
        font-size: 25px;
        margin-right: 36px;
    }

    .invoice_btn {
        background-color: #19AAF8;
        color: #fff;
    }

    .list_image {
        list-style-image:url('{{asset('public/assets/images/list_background_bullet.png')}}');
        text-align: left;
        line-height: 50px;
        cursor: pointer;
    }

    .take_it_btn {
        color: #fff;
        background-color: #19AAF8;
    }

    #order_details_spec li {
        list-style-image:url('{{asset('public/assets/images/list_background_bullet.png')}}');
        float: left;
        padding: 5px 10px;
    }

    #order_details_spec li span {
        padding-right: 50px;
    }

    .product_image_complete img {
        width: 100%;
    }

    .justify div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-crm {
        background-color: #19AAF8;
        padding: 2px 5px;
        color: #fff;

    }

    .hide_opacity {
        opacity: 0;
    }

    .simple_btn {
        border: 1px solid #ddd;
        padding: 4px 6px;
    }

    .price_bold {
        font-size: 40px;
        font-weight: 900;
        color: #000;
    }

    .track-btn {
        color: #fff;
        padding: 4px 35px;
        background: #19aaf8;
    }

    .upload_img_ {
        padding: 10px 20px;
        border: 1px solid #ddd;
        background-color: #19AAF8;
        color: #fff;
        cursor: pointer;
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
<section class="">

    <div class="row all-order">
        <div class="col-lg-12">

            <div class="d-flex justify-content-start">
                <h2 class="m-0 d-flex justify-content-start py-4">Feedback
                    <a href="{{ route('client.order.create') }}" class="btn btn-md text-light rounded-0 px-4 ml-5 shadow-sm" style="background-color: #19AAF8">Create New Orders</a>
                </h2>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
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

                    @foreach ($Order as $Orders)
                        <tr>
                            <td>{{ $Order->firstItem()+$loop->index }}</td>
                            <td>{{ $Orders->order_id }}</td>
                            <td>{{ date('d M Y', strtotime($Orders['order_date'])) }}</td>
                            <td>{{ date('d M Y', strtotime($Orders['delivery_date'])) }}</td>
                            {{-- @foreach ($Orders->orderImage as $images) --}}
                                <td>check</td>
                            {{-- @endforeach --}}
                            <td>{{ $Orders->specification->name }}</td>
                            <td>

                                @if ($Orders->status == 4)
                                    <span class="active_btn shadow-sm" style="background: #B0DAF0;">Completed</span>
                                @endif

                            </td>
                            <td>${{ $Orders->price }}</td>
                            <td>
                                <a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background-color: #19AAF8" href="{{ route('client.order.wise.feedback',$Orders->id) }}" data-toggle="tooltip" data-placement="top" title="Order Feedback">Give a feedback</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $Order->links() }}
            </div>
        </div>
    </div>

</section>

@endsection
