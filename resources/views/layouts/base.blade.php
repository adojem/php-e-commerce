<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Acme Store - @yield('title')</title>
   <link rel="stylesheet" href="/css/all.css">
   <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js" integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ" crossorigin="anonymous"></script>
</head>

<body data-page-id="@yield('data-page-id')">


   @yield('body')


   <script src="/js/all.js"></script>
   @yield('stripe-checkout')
   @yield('paypal-checkout')
</body>

</html>