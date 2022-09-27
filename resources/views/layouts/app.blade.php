<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')

        @stack('before-style')
        @include('includes.styles')
        @stack('after-style')

        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
    <body>
        <div class="w-80">
            <header>
            </header>
            
            @yield('header')

            <div class="content">
                @yield('content')
            </div>
           
        </div>

        @stack('before-script')
        @include('includes.script')
        @stack('after-script')

    </body>
</html>