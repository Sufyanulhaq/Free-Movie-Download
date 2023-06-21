@extends('layouts.main')
@section('content')

<style>
    .home-heading {
        border-radius: 5px;
        padding: 10px;
        font-size: 22px;
        background-color: #333;
        color: #fff;
    }

    .table-responsive {
        overflow-x: auto;
    }
    tbody{
        background-color: rgba(0,0,0,.05);
    }
   tr{
    background-color: rgba(0, 0, 0, 0.05);
   }
   .table td, .table th{
    width: 0%;
   }
    .alert {
        position: relative;
        padding: 1rem 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 5px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    /* Default styles */
    .table-responsive {
        overflow-x: auto;
    }
    @media (max-width: 767px) {
  .table-responsive {
    width: 100%;
    overflow-x: auto;
  }
}

@media (max-width: 576px) {
  .home-heading {
    font-size: 18px;
  }
.table>thead{
    display: none;
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
    float: left;
    font-weight: bold;
    text-transform: uppercase;
    padding-right: 15px;

  }

  .table td:nth-child(1):before {
    content: 'Image';
  }

  .table td:nth-child(2):before {
    content: 'Description';
  }

  .table td:nth-child(3):before {
    content: 'In Stock';
  }

  .table td:nth-child(4):before {
    content: '';
  }

  .table td:nth-child(5):before {
    content: 'Price';
  }

  .table td:nth-child(6):before {
    content: 'Action';
  }
}


</style>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container">
    <h4 class="home-heading mt-5">Gmail</h4>
    @if ($data)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>In Stock</th>
                    <th></th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @if ($item->category_id==1)
                <tr>
                    <td><img src="{{url('images/gmail.png')}}" width="34px" height="28px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->piece}}</td>
                    <td style="color: gray;font-size:12px;">Price per piece</td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->piece > 0)
                        <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                        @else
                        <button class="btn btn-secondary" disabled>Sold</button>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h6>No Content Uploaded Yet</h6>
    @endif

    <h4 class="home-heading mt-5">Aged Gmail</h4>
    @if ($data)
    
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Description</th>
                <th>In Stock</th>
                <th></th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            @if ($item->category_id == 2)
            <tr>
                <td><img src="{{url('images/gmail.png')}}" width="34px" height="28px"></td>
                <td>{{$item->description}}</td>
                <td>{{$item->piece}}</td>
                <td style="color: gray;font-size:12px;">Price per piece</td>
                <td>${{$item->price}}</td>
                <td>
                    @if ($item->piece > 0)
                    <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                    @else
                    <button class="btn btn-secondary" disabled>Sold</button>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
    @else
    <h6>No Content Uploaded Yet</h6>
    @endif

    <h4 class="home-heading mt-5">New Gmail</h4>
    @if ($data)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>In Stock</th>
                    <th></th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @if ($item->category_id==3)
                <tr>
                    <td><img src="{{url('images/gmail.png')}}" width="34px" height="28px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->piece}}</td>
                    <td style="color: gray;font-size:12px;">Price per piece</td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->piece > 0)
                        <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                        @else
                        <button class="btn btn-secondary" disabled>Sold</button>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h6>No Content Uploaded Yet</h6>
    @endif

    <h4 class="home-heading mt-5">LinkedIn</h4>
    @if ($data)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>In Stock</th>
                    <th></th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @if ($item->category_id==4)
                <tr>
                    <td><img src="{{url('images/linkedin.png')}}" width="34px" height="28px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->piece}}</td>
                    <td style="color: gray;font-size:12px;">Price per piece</td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->piece > 0)
                        <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                        @else
                        <button class="btn btn-secondary" disabled>Sold</button>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h6>No Content Uploaded Yet</h6>
    @endif

    <h4 class="home-heading mt-5">Other Social Media</h4>
    @if ($data)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>In Stock</th>
                    <th></th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @if ($item->category_id==5)
                <tr>
                    <td><img src="{{url('images/other.png')}}" width="34px" height="28px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->piece}}</td>
                    <td style="color: gray;font-size:12px;">Price per piece</td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->piece > 0)
                        <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                        @else
                        <button class="btn btn-secondary" disabled>Sold</button>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h6>No Content Uploaded Yet</h6>
    @endif

    <h4 class="home-heading mt-5">Other Emails</h4>
    @if ($data)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>In Stock</th>
                    <th></th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @if ($item->category_id==6)
                <tr>
                    <td><img src="{{url('images/email.png')}}" width="34px" height="28px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->piece}}</td>
                    <td style="color: gray;font-size:12px;">Price per piece</td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->piece > 0)
                        <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                        @else
                        <button class="btn btn-secondary" disabled>Sold</button>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h6>No Content Uploaded Yet</h6>
    @endif
</div>
@endsection
