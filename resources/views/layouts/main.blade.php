<!DOCTYPE html>
<html lang="en">
     <head>
       @include('layouts.partials.head')
     </head>
 <body>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 	<div class="container">

    <header class="row">
        @include('layouts.partials.nav')
    </header>

    <div id="main" class="row">

           @yield('content')

    </div>

    <footer class="row">
    </footer>

    </div>
     @include('layouts.partials.footer-scripts')
 </body>
</html>