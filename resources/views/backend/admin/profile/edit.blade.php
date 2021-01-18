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
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <div>
                            @if ($Edit->user_type == 1)
                                <span class="badge badge-success font-weight-normal">Admin</span>
                            @endif
                        </div>

                        <div class="text-center mb-3">

                            @if ($Edit->photo == NULL)
                                <img src="{{ asset('public/assets/images/profile/default-user.png') }}" class="rounded-cricle" width="120px" alt="">
                            @else
                                <img src="{{ asset('public/assets/images/profile/'.$Edit->photo) }}" class="rounded-cricle" width="120px" alt="">
                            @endif
                        </div>

                        <div class="mb-3">
                            <form action="{{ route('admin.profile.update',$Edit->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $Edit->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $Edit->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Your Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $Edit->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="date" class="form-control" name="date_of_birth">
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-primary float-right">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



@endsection
