<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.min.css') }}">
    @yield('style')
</head>

<body>
    <div class="wrapper">
        {{-- start sidebar --}}
        @include('admin.partials.aside')
        {{-- end sidebar --}}

        {{-- start main --}}
        <main class="main">
            <div class="main__header">
                <a class="main__header__brand" href="/">Laravel Blog</a>
            </div>
            <div class="main__content">
                @yield('content-inner')
            </div>
        </main>
        {{-- end main --}}
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    @include('sweet::alert')
</body>

</html>
