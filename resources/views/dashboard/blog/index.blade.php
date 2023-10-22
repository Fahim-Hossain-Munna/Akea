@extends('layouts.dashboard_master')

@section('content')

<div class="row">

    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Blogs</h1>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Blog List
            </div>
            <div class="card-body">

                    <form action="{{ route('blog.delete.all') }}" method="POST">
                        @csrf

                  <table class="table responsive">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                <input type="checkbox" id="checked-all" > Checked All
                                </th>
                                <th scope="col">SL No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="ids[]" value="{{ $blog->id }}">
                                </th>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>
                                    <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" style="width: 80px; height:80px;">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if ($blog->status == 'deactive')
                                    <a href="{{ route('blog.status',$blog->id) }}" class="btn btn-danger">{{ $blog->status }}</a>
                                    @else
                                    <a href="{{ route('blog.status',$blog->id) }}" class="btn btn-success">{{ $blog->status }}</a>
                                    @endif

                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#info{{ $blog->id }}">Info</button>
                                    <a href="{{ route('blog.edit' , $blog->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('blog.delete' , $blog->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="info{{ $blog->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                  <h5 class="card-title">Blog Update by - <span class="text-info">{{ $blog->Relationwithuser->name }}</span></h5>
                                                  <h5 class="card-title">Blog title - <span class="text-info">{{ $blog->title }}</span></h5>
                                                  <h5 class="card-title">Blog Category - <span class="text-info">{{ $blog->Relationwithcategory->category_name }}</span></h5>
                                                  <br>
                                                  <h5 class="card-title">Blog Tags - @foreach ($blog->RelationshipwithTags as $tag) <span class="badge bg-success" style="float:right !important;">{{ $tag->tag_name }}</span> @endforeach </h5>
                                                  <br>
                                                  <h5 class="card-title">Blog Update Date - <span class="text-info">{{ \Carbon\Carbon::parse($blog->submit_date)->format('M,d,Y') }}</span></h5>
                                                  <p class="card-title">Blog Description -<span class="text-info">@php echo $blog->description ; @endphp</span>.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-danger btn-xs">Delete All</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer_content')


@if (session('blog_success'))

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
  title: "{{ session('blog_success') }}",
})
</script>

@endif


@if (session('change_status'))

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
  title: "{{ session('change_status') }}",
})
</script>

@endif

@if (session('blog_error'))

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
  title: "{{ session('blog_error') }}",
})
</script>

@endif

<script>
$('#checked-all').click(function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});
</script>



@endsection
