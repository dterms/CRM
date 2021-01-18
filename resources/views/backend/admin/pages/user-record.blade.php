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
  <div class="card-header bg-light" style="border: none;">
    <h3 class="d-flex justify-content-between m-0">User List
      <a href="{{ route('admin.users.create') }}" class="btn btn-sm text-light shadow-sm rounded-0" data-toggle="modal" data-target="#userModel" style="background: #19aaf8;;"><i class="fa fa-plus"></i> Add new user</a>
    </h3>
  </div>
  <div class="card p-4">
    <div class="table-responsive ">
      <table class="table table-bordered w-100" id="DataTable">
        <thead>
          <th>ID</th>
          <th>User_Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>User-Type</th>
          <th>Photo</th>
          <th>Status</th>
          <th>is_approved</th>
          <th>Action</th>
        </thead>
        <tbody>

          @foreach ($User as $users)
            <tr>
              <td>{{ $users->id }}</td>
              <td>{{ $users->user_id }}</td>
              <td>{{ $users->name }}</td>
              <td>{{ $users->email }}</td>
              <td>
                @if ($users->user_type == 3)
                    <span class="complete_btn">User</span>
                @elseif($users->user_type == 2)
                  <span class="complete_btn">Worker</span>
                @else
                  <span class="complete_btn">Admin</span>
                @endif
              </td>
              <td>
                @if ($users->photo == NULL)
                    <img style="width: 50px; height: 50px;" class="rounded-circle" src="{{ asset('public/assets/images/profile/default-user.png') }}" alt="">
                @else
                  <img style="width: 50px; height: 50px;" class="rounded-circle" src="{{ asset('public/assets/images/profile/'.$users->photo) }}" alt="">
                @endif
              </td>
              <td>
                @if ($users->status == 1)
                  <span class="active_btn">Active</span>
                @else
                  <span class="cancel_btn">Pending</span>
                @endif
              </td>
              <td>
                @if ($users->is_approved == 1)
                    <span class="active_btn">Approved</span>
                @else
                  <span class="cancel_btn">Unapproved</span>
                @endif
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @if ($users->is_approved == 0)
                    <a href="{{ route('admin.user.actived', $users->id) }}" class="btn btn-sm shadow-sm rounded-0 text-light mr-2" style="background: #19aaf8;" title="Approved">Approved</a>
                  @else
                    <a href="{{ route('admin.user.deactived', $users->id) }}" class="btn btn-sm btn-danger shadow-sm rounded-0 text-light mr-2" title="Unapproved">Unapproved</a>
                  @endif
                    <a href="{{ route('admin.user.view', $users->id) }}" class="btn btn-sm shadow-sm rounded-0 text-light" style="background: #19aaf8;" title="View">View</a>
                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="userModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="userForm">
        @csrf

      <div class="modal-body">

          <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="full name" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="email" id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Mobile</label>
            <input type="number" class="form-control" name="mobile" placeholder="mobile" id="mobile">
            @error('mobile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>User Type</label>
            <select name="user_type" class="form-control" id="user_type">
              <option value="">--Select One--</option>
              <option value="">Worker</option>
              <option value="">Client</option>
            </select>

            @error('user_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button class="btn btn-sm text-light" style="background: #19AAF8;" id="submitBtn">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>


@endsection
