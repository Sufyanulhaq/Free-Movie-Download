@extends('layouts.main')
@section('content')
<style>
    .home-heading {
        border-radius: 5px;
        padding: 10px;
        font-size: 22px;
        background-color: #333;
        color: #fff;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .table {
        border: none;
        margin-bottom: 20px;
    }

    .table th {
        font-weight: bold;
        color: #333;
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
    }

    .table td {
        color: #333;
        text-align: center;
        vertical-align: middle;
    }

    .table td img {
        max-width: 34px;
        max-height: 28px;
        display: block;
        margin: 0 auto;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .no-content {
        color: #777;
        font-size: 18px;
        text-align: center;
        margin-top: 20px;
    }

    /* Media Queries */
    @media (max-width: 767px) {
        .table-responsive {
            overflow-x: auto;
        }

        .table th,
        .table td {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Display image and description on the first line */
        .table tr th:nth-child(2),
        .table tr td:nth-child(2) {
            order: 1;
        }

        .table tr th:nth-child(2):before,
        .table tr td:nth-child(2):before {
            content: "";
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Display "In Stock" on the second line */
        .table tr th:nth-child(3),
        .table tr td:nth-child(3) {
            order: 2;
        }

        .table tr th:nth-child(3):before,
        .table tr td:nth-child(3):before {
            content: "In Stock";
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Display "Action" on the third line */
        .table tr th:nth-child(6),
        .table tr td:nth-child(6) {
            order: 3;
        }

        .table tr th:nth-child(6):before,
        .table tr td:nth-child(6):before {
            content: "";
            font-weight: bold;
            margin-bottom: 5px;
        }
          thead{
                    display:none;

        }
         .table td, .table th{
            border:none;
        }
        tbody, td, tfoot, th, thead, tr{
    border:1px solid ;
}
  .table td:nth-child(3):before {
            content: 'in Stock';
             font-weight: bold;
            margin-bottom: 5px;
        }

        .table td:nth-child(4):before {
            content: '';
        }

        .table td:nth-child(5):before {
            content: 'Price';
             padding-bottom: 10px;
              font-weight: bold;
            margin-bottom: 5px;
        }

    }
</style>
<div class="container">
    <h4 class="bg-dark home-heading text-white mt-5">Linked In</h4>
    @if ($data)
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Description</th>
                    <th>InStock</th>
                    <th></th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td><img src="{{url('images/linkedin.png')}}" width="34px" height="28px"></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->piece}}</td>
                    <td style="color: gray;font-size:12px;">price per piece</td>
                    <td>${{$item->price}}</td>
                    <td>
                        @if ($item->piece > 0)
                        <a href="{{route('checkout.show',[$item->id])}}" class="btn btn-primary">Buy</a>
                        @else
                        <button class="btn btn-secondary" disabled>Sold</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h6>
            No Content Uploaded Yet
        </h6>
    @endif
</div>
@endsection
