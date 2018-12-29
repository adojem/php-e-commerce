<div>

   @if(count($errors) || App\Classes\Session::has('error'))
      <div class="callout alert grid-x align-justify align-middle" data-closable>
         <div>
            @if(App\Classes\Session::has('error'))
               {{ App\Classes\Session::flash('error') }}
            @else
               @foreach($errors as $error_array)
                  @foreach($error_array as $error_item)
                     {{ $error_item }}<br>
                  @endforeach
               @endforeach
            @endif
         </div>

         <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
            <span arial-hidden="true">&times;</span>
         </button>
      </div>
   @endif

   @if(isset($success) || \App\Classes\Session::has('success'))
      <div class="callout success" data-closable>
         @if(isset($success))
            {{ $success }}
         @elseif(\App\Classes\Session::has('success'))
            {{ \App\Classes\Session::flash('success') }}
         @endif
         <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
            <span arial-hidden="true">&times;</span>
         </button>
      </div>
   @endif

</div>