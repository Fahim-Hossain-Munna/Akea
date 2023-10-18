@extends('layouts.frontend_master')

@section('content')

    <!--Login-->
    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login-content">
                        <h4>Sign up</h4>
                        <!--form-->
                        <form  class="sign-form widget-form" method="POST" action="{{ route('author.registration.post') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username*" name="name" value="">
                            </div>
                            @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address*" name="email" value="">
                            </div>
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" name="password" value="">
                            </div>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password Confirmation*" name="password_confirmation" value="">
                            </div>
                            {{-- <div class="sign-controls form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label" for="rememberMe">Agree to our <a href="#" class="btn-link">terms & conditions</a> </label>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn-custom">Sign Up</button>
                            </div>
                            <p class="form-group text-center">Already have an account? <a href="login.html" class="btn-link">Login</a> </p>
                        </form>
                           <!--/-->
                    </div>
                </div>
             </div>
        </div>
    </section>


@endsection


@section('footer_content')

@if (session('author_registration'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('author_registration') }}",
})
</script>

@endif

@endsection
