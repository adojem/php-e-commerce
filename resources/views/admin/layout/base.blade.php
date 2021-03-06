<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Admin Panel - @yield('title')</title>
   <link rel="stylesheet" href="/css/all.css">
   <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
</head>

<body data-page-id="@yield('data-page-id')">

   @include('includes.admin-sidebar')

   <div class="off-canvas-content admin-title-bar" data-off-canvas-content>

      <div class="title-bar">
         <div class="title-bar-left">
            <button class="menu-icon show-for-medium" type="button" data-open="offCanvas"></button>
            <h1 class="title-bar-title h4 hide-for-small">{{ getenv('APP_NAME') }}</h1>
         </div>
         <div class="title-bar-right hide-for-medium">
            <button class="menu-icon" type="button" data-open="offCanvasRight"></button>
         </div>
      </div>

      @yield('content')
   </div>

   <script src="/js/all.js"></script>
</body>

</html>