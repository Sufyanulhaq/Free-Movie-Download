@extends('layouts.main')
@section('content')

<style>
    .form-container {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        margin: 0 auto;
    }

    .form-container h1 {
        color: #333;
    }

    .form-container .form-group {
        margin-bottom: 15px;
    }
</style>

<div class="d-flex align-items-center justify-content-center vh-100">
    <form class="form-container" action="{{ route('authenticate') }}" method="POST">
        @csrf
        <h1 class="mb-4 text-center">Admin Login</h1>
        @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        <p class="text-center">This login is only for site admin...</p>
        <div class="form-group my-2">
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group my-2">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
    </form>
</div>


@endsection