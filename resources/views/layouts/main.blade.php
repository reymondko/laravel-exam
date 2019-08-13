<!DOCTYPE html>
<html lang="en">
     <head>
       @include('layouts.partials.head')
     </head>
 <body>
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