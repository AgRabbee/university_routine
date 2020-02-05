@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }}">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Sign In') }}</div>

                <div class="card-body">
                    <form method="POST" id="login_form" action="{{ url('/signin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile" autofocus>
                                <span id="mobile_error"></span>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sign In') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#login_form').submit(function(e) {
            e.preventDefault();
            var flag = true;

            $("#mobile_error").hide();
            var mobNum = $("#mobile").val();
            var filter = /\+?(88)?0?1[456789][0-9]{8}\b/;
            if (isNaN(mobNum)) {
                $("#mobile_error").show().text("Mobile no should be numeric.").css("color", "#e3342f");
                flag = false;
            }else {
                if (!filter.test(mobNum)) {
                    if(mobNum.substring(0, 2) == "01"){
                        $("#mobile_error").show().text("Number should have 11 digits.").css("color", "#e3342f");
                        flag = false;
                    }else if(mobNum.substring(0, 2) == "88"){
                        $("#mobile_error").show().text("Number should have 13 digits.").css("color", "#e3342f");
                        flag = false;
                    }else if(mobNum.substring(0, 4) == "+880"){
                        $("#mobile_error").show().text("Number should have 14 digits.").css("color", "#e3342f");
                        flag = false;
                    }
                }
            }


            if (flag) this.submit();
        });

    });
</script>
@endsection
