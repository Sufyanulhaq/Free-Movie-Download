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
        .table th:nth-child(1),
        .table td:nth-child(1) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .table th:nth-child(2),
        .table td:nth-child(2) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .table th:nth-child(3),
        .table td:nth-child(3) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .table th:nth-child(4),
        .table td:nth-child(4) {
            display: none;
        }

        .table th:nth-child(5),
        .table td:nth-child(5) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            content: 'Email';
             font-weight: bold;
            margin-bottom: 5px;
        }
          .table td:nth-child(2):before {
            content: 'Name';
            padding-bottom: 10px;
              font-weight: bold;
            margin-bottom: 5px;
        }

        .table td:nth-child(4):before {
            content: '';
        }

        .table td:nth-child(5):before {
            content: 'Action';
             padding-bottom: 10px;
              font-weight: bold;
            margin-bottom: 5px;
        }
        @media (max-width: 767px) {
        .table td:nth-child(5) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .table td:nth-child(5) a {
            /*margin-bottom: 10px;*/
        }

        .table td:nth-child(5) a:last-child {
            margin-bottom: 0;
        }
        
    }
</style>
<div class="container">
    <h4 class="home-heading mt-5">Aged Gmail</h4>
    @if ($data)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td class="hidden-xs">
                        @if($item->role_id == 2)
                            <Button disabled class="btn btn-danger">Admin</Button>
                        @else
                            <Button disabled class="btn btn-warning">User</Button>
                        @endif
                    </td>
                    <td>
                      <div class="action-buttons">
                            <a href="{{route('user.edit',[$item->id])}}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{route('user.delete',[$item->id])}}" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-content">No users found.</p>
    @endif
</div>
@endsection
