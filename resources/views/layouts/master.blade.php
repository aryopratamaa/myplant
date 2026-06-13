<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('seodash/src/assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('seodash/node_modules/simplebar/dist/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('seodash/src/assets/css/styles.min.css') }}" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('partials.sidebar')

        <div class="body-wrapper d-flex flex-column min-vh-100">
            
            @include('partials.header')

            <div class="container-fluid d-flex flex-column flex-grow-1">
                
                <div class="flex-grow-1">
                    @yield('content')
                </div>

                <div class="py-6 px-6 text-center mt-auto">
                    <p class="mb-0 fs-4">Design and Developed by <a href="#" target="_blank"
                            class="pe-1 text-primary">Mister Goyo</a></p>
                </div>
                
            </div>
        </div>
    </div>

    <script src="{{ asset('seodash/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('seodash/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('seodash/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('seodash/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('seodash/src/assets/js/app.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>