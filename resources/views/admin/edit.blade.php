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
                    <li><a href="{{route('users')}}">User</a></li>
                    <li><a href="{{route('index')}}">Content</a></li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="container my-5">
                <h2>User Edit Form </h2>
                <!-- Update Form -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('user.edit.form', ['id' => $data->id]) }}" method="post">
                    @csrf
                    <small>If you Edit Role of User as Admin you cannot edit edit it again you have delete that  user</small>
                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ $data->name }}" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" placeholder="Email" value="{{ $data->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="number" name="phone" placeholder="Phone" value="{{ $data->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                @if ($data->role_id == 1)
                                    <input type="number" name="role_id" placeholder="Role: User" class="form-control">
                                    <small style="color: gray;" class="small">if you want to make {{$data->name}} as Admin just write "2"</small>
                                @elseif ($data->role_id == 2)
                                    <input type="number" name="role_id" disabled placeholder="Role: Admin" class="form-control">
                                @endif
                            </div>                            
                        </div>
                        <div class="col-6">
                        </div>
                    </div>

                    <div class="form-group text-center my-5">
                        <button class="btn w-50 btn-success" type="submit">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



@endsection