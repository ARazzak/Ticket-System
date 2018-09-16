
<!doctype html>
<html lang="en">
  @include('layouts.partials.head')

  <body>
    @include('layouts.partials.navigation')

    <div class="container-fluid">
      <div class="row">
      @include('layouts.partials.sidebar')
      @include('layouts.partials.alerts')
      @yield('content')
      </div>
    </div>
 @include('layouts.partials.scripts')
  </body>
</html>
