<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>{{ $pageTitle ?? 'Free Movies' }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-alpha2/css/all.min.css">

<link rel="icon" type="image/x-icon" href="{{ asset('images/Favicon.png') }}">





 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   

    <style>
        li{
            list-style-type: none;
        }
        .side-bar ul{
            margin: 0px !important;
            padding: 0px !important;
        }
        .side-bar li{
            padding: 10px 30px;
            margin: 10px 0px;
            color: white;
            list-style: none;
        }
        .side-bar a{
            color: black;
            text-decoration: none;
        }
        .col-3.side-bar-col {
    /* background: #cfcbcb; */
    border-radius: 5px;
    padding: 39px 0px;
    height: 100vh;
}

    </style>
</head>
<body>
    
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    
</body>
<script>
    // Automatically fade the alert after 2 seconds
    setTimeout(function() {
        document.querySelector('#success_alert_home').style.opacity = '0';
    }, 3000);
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Enable dropdown menu on mobile devices
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        dropdownToggle.addEventListener('click', function() {
            const dropdownMenu = document.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>