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
    <div class="card p-4" style="overflow:scroll; height:80vh">
      <div class=" all_card_title" style="padding: 10px 15px;width: 100%"><b>Orders</b></div>
        <div class="table-responsive ">          
      <table class="table table-bordered w-100">
          <tr>
            <th>ID</th>
            <th>Order Date</th>
            <th>Deadline</th>
            <th>Image</th>
            <th>Specification</th>
            <th>Status</th>
            <th>Price</th>
            <th>Acts</th>
          </tr>
        <tbody>
          <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="complete_btn">Completed</span></td>
            <td>$545</td>
            <td><a class="btn" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
       <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="active_btn">Active</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
    
         <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="cancel_btn">Cancelled</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
         <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="redo_btn">Redo</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
    
         <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="pending_btn">Pending</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
         <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="pending_btn">Completed</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
    
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="cancel_btn">Cancelled</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
    
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="redo_btn">Redo</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
    
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="active_btn">Active</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="pending_btn">Pending</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="complete_btn">Completed</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="pending_btn">Pending</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
    
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="cancel_btn">Cancelled</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
    
           <tr>
            <td>1</td>
            <td>Anna</td>
            <td>Pitt</td>
            <td>50</td>
            <td>Name</td>
            <td><span class="redo_btn">Redo</span></td>
            <td>$545</td>
            <td><a class="btn track_order" style="background-color: #19AAF8" href="">Trac Order</a></td>
          </tr>
          
    
        </tbody>
      </table>
      </div>
    </div>
    </section>
@endsection