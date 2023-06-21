@extends('layouts.main')
@section('content')
<?php
// Assuming the user is authenticated and the 'name' attribute exists
$user = auth()->user();
$name = $user->name;
$id = $user->id;
?>
<div class="container">
    <div class="row">
        <div class="col-3 side-bar-col">
            <div class="side-bar">
                <ul>
                    <li><a href="{{route('user.home')}}">Home</a></li>
                    <li><a href="{{route('user.orders')}}">My Orders</a></li>
                    <li><a href="{{ route('user.profile', ['id' => $id]) }}">My Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="container my-5">
                <h4>Your Orders</h4>
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Order#</th>
                            <th>Name</th>
                            <th>Payment</th>
                            <th>Cost</th>
                            <th>Download</th>
                            <th>Ticket</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                           <td>here's nothing here yet</td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="mt-5">REQUESTS TO THE SELLER</h4>
                <h6>Last 10 tickets you created</h6>
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Request#</th>
                            <th>Subject	</th>
                            <th>Last message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>here's nothing here yet</td>
                         </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection