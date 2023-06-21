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
        <div class="col-12">
            <div class="side-bar">
               <ul class="horizontal-list">
    <li>
        <div class="d-flex flex-column align-items-center text-center">
            <img src="{{url('images/order.png')}}" alt="Order" width="100">
        </div>
    </li>
    <li><a href="{{route('user.home')}}">Home</a></li>
    <li><a href="{{route('user.orders')}}">My Orders</a></li>
    <li><a href="{{ route('user.profile', ['id' => $id]) }}">My Profile</a></li>
</ul>


            </div>
        </div>
        <div class="col-12">
            <div class="container my-5">
                <h4>Your Orders</h4>
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Order No</th>
                            <th>ID</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>About</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data)
                        @foreach ($data as $item)
                            <tr>
                               <td>{{$loop->iteration}}</td>
                                <td>{{$item->order_id}}</td>
                                @if ($item->payment_method == 1)
                                <td><button class="btn btn-small btn-danger" disabled>Perfect Money</button></td>
                                @else
                                <td><button class="btn btn-small btn-danger" disabled>Coin Base</button></td>
                                @endif
                                <td>{{$item->amount}}</td>
                                @if ($item->status==0)
                                @else
                                <td>Unpaid</td>
                                @endif
                                @if ($item->status==0)
                                <td><button class="btn btn-success" disabled>Success</button></td>
                                @else
                                <td><button class="btn btn-warning" disabled>Failed</button></td>
                                @endif
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            </tr>
                            
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">There's nothing here yet</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .horizontal-list {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        list-style: none;
        padding: 0;
    }
    .horizontal-list li {
        margin: 5px;
    }

    .horizontal-list img {
        width: 100px;
    }

    @media (min-width: 767px) {
        .horizontal-list {
            flex-wrap: wrap;
            justify-content: center;
        }

        .horizontal-list li {
            text-align: center;
        }

        .image-item {
            width: 100%;
        }

        .image-item img {
            width: auto;
        }
    }

    hr:not([size]) {
        display: none;
    }

    @media (max-width: 767px) {
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        
        .table td:nth-child(1):before,
        .table td:nth-child(2):before,
        .table td:nth-child(3):before,
        .table td:nth-child(4):before,
        .table td:nth-child(5):before,
        .table td:nth-child(6):before {
            display: inline-block;
            width: 50%;
            text-align: center;
        }

        .table th,
        .table td {
            display: block;
            width: 100%;
            text-align: left;
        }

        .table th {
            font-weight: bold;
        }

        .table td:before {
            content: attr(data-label);
            padding-right: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Default styles for all screen sizes */
        .table td:nth-child(1):before {
            content: 'Order No';
        }

        .table td:nth-child(2):before {
            content: 'ID';
        }

        .table td:nth-child(3):before {
            content: '';
        }

        .table td:nth-child(4):before {
            content: 'Amount';
        }

        .table td:nth-child(5):before {
            content: 'About';
        }

        .table td:nth-child(6):before {
            content: 'Date';
            padding-bottom: 10px;
        }

        thead {
            display: none;
        }
        
        /* Additional Styles for Mobile Devices */
        .side-bar {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .side-bar img {
            width: 80px;
        }
        
        .horizontal-list li:nth-child(2),
        .horizontal-list li:nth-child(3) {
            flex-grow: 1;
            text-align: center;
        }
        
        /* Additional Style for Date and Order No */
        .table td:nth-child(1),
        .table td:nth-child(6) {
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }
    }
</style>

@endsection
