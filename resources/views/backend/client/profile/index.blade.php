@extends('layouts.master')
@section('title', 'Users')
@push('styles')
<style>
  .table td, .table th{
    vertical-align: middle !important;
  }
</style>
@endpush
@section('sidenavbar')
@parent
@endsection
@section('content')
<section class="admin_orders">

    <div class="bg-light p-4 mt-2" style="border-bottom:4px solid #ddd;">
        <div class="row">
            <h3 class="m-0">Profile</h3>
        </div>
    </div>

    <div class="bg-light p-4 mt-2" style="border-bottom:4px solid #ddd;">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <div>
                            @if (Auth::user()->user_type == 1)
                                <span class="badge badge-success font-weight-normal">Admin</span>
                            @endif
                        </div>

                        <div class="text-center mb-3">

                            @if (Auth::user()->photo == NULL)
                                <img src="{{ asset('public/assets/images/profile/default-user.png') }}" class="rounded-cricle" width="120px" alt="">
                            @else
                                <img src="{{ asset('public/assets/images/profile/'.Auth::user()->photo) }}" class="rounded-cricle" width="120px" alt="">
                            @endif
                        </div>
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td>Name</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ Auth::user()->phone == NULL ? 'Undefind':Auth::user()->phone }}</td>
                            </tr>
                            <tr>
                                <td>Birth</td>
                                <td>{{ Auth::user()->dob == NULL ? 'Undefind':Auth::user()->dob }}</td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <a href="{{ route('client.profile.edit',Auth::user()->id) }}" class="btn btn-sm btn-primary rounded-0">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



@endsection
