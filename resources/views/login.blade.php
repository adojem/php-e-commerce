@extends('layouts.app')
@section('title', 'Login to Your Account')
@section('data-page-id', 'auth')

@section('content')

   <div class="auth" id="auth">

      <section class="login_form wrapper grid-container">
      
         <div class="grid-x align-center">

            <div class="small-12 medium-7">

               <h2 class="text-center">Login</h2>
               @include('includes.message')
               <form action="/login" method="post">
                  <input type="text" name="username" placeholder="Your Username" value="{{ App\Classes\Request::old('post', 'username') }}">
                  <input type="password" name="password" placeholder="Your Password">
                  <input type="hidden" name="token" value="{{ App\Classes\CSRFToken::_token() }}">
                  <div class="grid-x align-spaced align-middle small-flex-dir-column">
                     <p class="cell medium-8">Not yet a member? <a href="/register">Register Here</a></p>
                     <button type="submit" class="button cell medium-4">Login</button>
                  </div>
               </form>
               

            </div>

         </div>
      
      </section>

   </div>

@stop