<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NowGo</title>
     
        <link rel="icon" type="image/png" href="/storage/favicons/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/storage/favicons/favicon.svg" />
        <link rel="shortcut icon" href="/storage/favicons/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/storage/favicons/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="NowGo" />
        <link rel="manifest" href="/storage/favicons/site.webmanifest" />

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tesseract.js@v4.0.0/dist/tesseract.min.js"></script>
        <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
        <!-- jQuery UI and jQuery Libraries (CDN) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js"></script>
        <script>
            window.auth_user = {!! json_encode(auth()->user()) !!};
        </script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">


        @vite('resources/js/app.js')
    </head>
    <body class="min-h-screen bg-[#28666e] font-roboto antialiased w-full md:absolute md:w-navbar">

        <div class="flex flex-col">
            @include('components.success')
                @if (session('error'))
                @endif
                @if(session('success'))
                @endif
                @if($errors->any())
                @endif
            <!-- Display navigation only if user is authenticated and not on `enter.code` page -->
            @if(Auth::check() && !request()->routeIs('enter.code'))
                @include('layouts.navigation')


            @elseif (!Auth::check() && request()->is('/') || request()->is('home'))

                @include('components.navbar')
            @endif

            <!-- Display the header only if it's set and not on `enter.code` page -->
            @isset($header)
                @if (!request()->routeIs('enter.code'))
                    <header class="bg-white shadow w-full">
                        <div class="py-6 px-4 sm:px-6">
                            {{ $header }}
                        </div>
                    </header>
                @endif
            @endisset

           @include('components.end-modal')         

            <!-- Page Content -->
             <main class="{{ request()->routeIs('home') ? 'bg-gray-200' : 'bg-[#28666e]' }}">
                @if (!Auth::check())
                {{ $slot }}
                @endif
            </main>
        </div>
    </body>
</html>
<!-- Color Code: #66AAC3 -->
