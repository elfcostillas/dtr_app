@extends('layouts.app')

@section('content')
<script type="text/javascript">
    //document.getElementById("password").focus();
    //alert();

    function focusOnPassword()
    {
        document.getElementById("password").focus();
        console.log('focused.');
       
    }

    function sendAuth(e)
    {
        console.log(e);
    }

    (function() {
        //focusOnPassword();
        // const myTimeout = setTimeout(focusOnPassword, 3000);
        setInterval(function () { focusOnPassword() }, 500);
    })();

    
</script>
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Welcome!  </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                       
                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-6 text-center"><h5>Please scan barcode to proceed.</h5></div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->
                           
                            <div class="col-md-4">
                                <!-- <input id="password" type="password" oninput="this.form.submit()" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="false"> -->
                                <!-- <input id="password" type="password" onkeypress="sendAuth(event)" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="false"> -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="false">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
