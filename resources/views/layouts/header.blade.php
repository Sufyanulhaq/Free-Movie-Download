<style>
    /* Custom CSS */
    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
    }

    .navbar-nav .nav-link {
        font-size: 18px;
        color: #333;
    }

    .navbar-nav .nav-link:hover {
        color: #ff6600;
    }

    .dropdown-menu {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        color: #333;
    }

    .dropdown-item:hover {
        background-color: #e9ecef;
        color: #333;
    }

    .btn-outline-danger {
        border-color: #ff6600;
        color: #ff6600;
    }

    .btn-outline-danger:hover {
        background-color: #ff6600;
        color: #fff;
    }

    .btn-outline-success {
        border-color: #28a745;
        color: #28a745;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: #fff;
    }
    
</style>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('user.home') }}">Access Market</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Gmail
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="{{ route('gmail') }}">Gmail</a></li>
                            <li><a class="dropdown-item" href="{{ route('aged') }}">Aged Gmail</a></li>
                            <li><a class="dropdown-item" href="{{ route('newgmail') }}">New Gmail</a></li>
                        </ul>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('linkedin') }}">LinkedIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('social') }}">Other Social Media</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('otheremail') }}">Other Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact us</a>
                    </li>
                </ul>

                <?php if(auth()->check()): ?>
                <!-- User is logged in -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            // Assuming the user is authenticated and the 'name' attribute exists
                            $user = auth()->user();
                            $name = $user->name;
                            $id = $user->id;
                            ?>
                            {{ $name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.profile', ['id' => $id]) }}">Profile</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn mx-2 btn-outline-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <?php else: ?>
                <!-- User is not logged in -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn mx-2 btn-outline-danger" href="{{ route('user.register') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="{{ route('user.register') }}">Sign Up</a>
                    </li>
                </ul>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</header>
