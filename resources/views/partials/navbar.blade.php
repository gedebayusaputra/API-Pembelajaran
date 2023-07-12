<nav class="navbar border-bottom  navbar-expand-lg navbar-right d-flex flex-row fixed-top-sm shadow" style="background-color: #58D1CA">
    <div class="navbar-icon">
            <a href="/">
                <img src="/img/logo.png" alt="Kabupaten Bekasi" width="160" height="100" class="float-" >
            </a>
            <span class="icon-text">
                <b>RT/RW 005/014</b>
            </span>
    </div>
    <div class="navbar offcanvas-collapse ">
        <div class="navbar-menu-wrapper d-flex align-items-stretch w-100 ">
            
            <ul class="nav nav-underline justify-content-lg-center {{ ($title !== "Login" && $title !== "Register")? 'pe-5' : '' }}">

                <li class="nav-item "  >
                    <a class="nav-link {{ ($title === "Home") ? 'active' : '' }} " href="/"><b>Home</b></a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link {{ ($title === "About Us") ? 'active' : '' }} " href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "All Informations" || $title === "Single Post" ) ? 'active' : '' }}" href="/information">Information</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ ($title === "Program") ? 'active' : '' }}" href="/program">Program </a>
                </li>
            </ul>        

        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill-check pe-2"></i>
                    Welcome, {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse pe-2"></i>Dashboard</a></li>
                    <li><a class="dropdown-item" href="/dashboard/informations"><i class="bi bi-pencil-square pe-2"></i>Edit Website</a></li>
                    @can('admin')
                    <li><a class="dropdown-item" href="/dashboard/database-warga"><i class="bi bi-database-fill-gear pe-2"></i>Database Warga</a></li>
                    @endcan
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-person-fill-exclamation pe-2"></i>Log Out</button>
                        </form>
                    </li>
                    </ul>
                </li>
            @else     
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($title === "Login") ? 'active' : '' }}"><i class="bi bi-person-fill-lock pe-2"></i>Login</a>
                </li>
            @endauth
        </ul>

        </div>
    </div>
    
    
</nav>