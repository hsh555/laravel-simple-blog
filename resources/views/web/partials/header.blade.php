@php
$currentUri = Route::current()->uri;
@endphp

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar custom-navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand custom-navbar__navbar-brand text-danger" href="{{ route('index') }}">
                        <h2>Laravel Blog</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li
                                class="nav-item custom-navbar__nav-item {{ $currentUri === '/' ? 'active' : null }}">
                                <a class="nav-link" href="{{ route('index') }}">Home<span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item custom-navbar__nav-item dropdown custom-navbar__dropdown">
                                <a class="nav-link dropdown-toggle custom-navbar__dropdown-toggle" href="#"
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu custom-navbar__dropdown-menu"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Windows Programing</a>
                                    <a class="dropdown-item" href="#">Mobile Probraming</a>
                                    <a class="dropdown-item" href="#">Web Programing</a>
                                </div>
                            </li>
                            <li class="nav-item custom-navbar__nav-item">
                                <a class="nav-link" href="#">About US</a>
                            </li>

                            <li class="nav-item custom-navbar__nav-item ml-5">
                                <a class="nav-link" href="{{ route('register') }}">Login</a>
                            </li>
                        </ul>

                        <form class="form-inline custom-navbar__form my-2 my-lg-0" action="{{ route('search') }}">
                            <input class="form-control custom-navbar__form__input" name="s" type="text"
                                placeholder="Search">
                            <button class="btn btn-danger custom-navbar__form__btn" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
