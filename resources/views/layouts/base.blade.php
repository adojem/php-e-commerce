<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Acme Store - @yield('title')</title>
   <link rel="stylesheet" href="<?php echo getenv('URL_ROOT'); ?>/css/all.css">
</head>

<body data-page-id="@yield('data-page-id')">


   @yield('body')


   <script src="<?php echo getenv('URL_ROOT'); ?>/js/all.js"></script>
</body>

</html>