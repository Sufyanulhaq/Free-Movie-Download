@extends('layouts.main')
@section('content')
<style>
    .payment-eeror{
        background:#ffffff;
        border:1px solid red;
        border-radius:8px;
        padding:40px;
    }
</style>
<div class="d-flex flex-wrap align-content-center payment-eeror">
    <div>
        <h1>Try again Later {{auth()->user()->name}}</h1>
        <p>Sorry But your payment has not been approved</p>
        <a href="{{route('user.home')}}" class="btn btn-danger">Back to home</a>
    </div>
</div>

@endsection
