@extends('layouts.dashboard_master')


@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Name Update
            </div>
            <div class="card-body">
                <form action="{{ route('profile.name.update') }}" method="POST">
                    @csrf
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                <button type="submit" class="btn btn-primary mt-3">submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Password Update
            </div>
            <div class="card-body">
                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                <label for="exampleInputEmail1" class="form-label">Current Password</label>
                <input type="password" class="form-control @error('current_password') is-invalid  @enderror" name="current_password">
                @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="exampleInputEmail1" class="form-label">New Password</label>
                <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid  @enderror" name="password_confirmation">
                <button type="submit" class="btn btn-primary mt-3">submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Image Update
            </div>
            <div class="card-body">
                <form action="{{ route('profile.image.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <img src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" style="width: 120px; height:120px; border-radius:50%;">
                <br>
                <label for="exampleInputEmail1" class="form-label mt-5">Image</label>
                <input type="file" class="form-control" name="image" >
                <button type="submit" class="btn btn-primary mt-3">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section('footer_content')

@if (session('password_updated'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('password_updated') }}",
})
</script>

@endif
@if (session('name_updated'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('name_updated') }}",
})
</script>

@endif
@if (session('image_updated'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{ session('image_updated') }}",
})
</script>

@endif
@if (session('password_updated_error'))

<script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: "{{ session('password_updated_error') }}",
})
</script>

@endif

@endsection
