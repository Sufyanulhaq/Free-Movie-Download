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
        
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h2><i>{{$user->name}}</i></h2>
                               
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <div class="side-bar">
                    <ul>
                        <li><a href="{{route('user.home')}}">Home</a></li>
                        <li><a href="{{route('user.orders')}}">My Orders</a></li>
                        <li><a href="{{ route('user.profile', ['id' => $id]) }}">My Profile</a></li>
                        
                    </ul>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <!-- Add any additional list items if needed -->
                    </ul>
                </div>
            </div>
            
            <div class="col-md-8">
                
                <form action="{{ route('user.profile.update', ['id' => $user->id]) }}" method="post">
                    @csrf
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="number" name="phone" placeholder="Phone" value="{{ $user->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>

                    <div class="form-group text-center my-5">
                        <button class="btn  btn-success" type="submit">Update</button>
                    </div>
                </form>

               



            </div>
        </div>

    </div>
</div>
@endsection
