@extends('layouts.base')

@section('body')

   @include('includes.nav')

   <div class="site_wrapper">

      @yield('content')
      
   </div>

   @yield('footer')

@stop