@extends('layouts.main')
@section('content')


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" id="success_alert_home"role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-3 side-bar-col">
            <div class="side-bar">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{url('images/Admin.png')}}" alt="Admin"  width="150">
                </div>
                <ul>
                    <li><a href="{{route('users')}}">User</a></li>
                    <li><a href="{{route('index')}}">Content</a></li>
                    
                </ul>
                <hr>
            </div>
        </div>
        <div class="col-9">
            <div class="container my-5">
    <h2>Content Form</h2>
                <form action="{{route('content')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-5">
                        <div class="col-12 mb-3">
                            <select name="category_id" class="form-select" required aria-label="Default select example">
                                <option selected>Select Category</option>
                                @foreach ($category as $item )
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Title" class="form-control">
                            </div>

                        </div>
                        <div class="col-6">
                            <input type="text" name="piece" placeholder="Pieces" class="form-control">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="format" placeholder="Format" class="form-control">
                            </div>

                        </div>
                        <div class="col-6">
                            <input type="text" name="recommendation" placeholder="Recommendations" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control my-2" name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-2">
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-center my-5">
                        <button class="btn w-50 btn-success" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection