@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>New Blog Update Page</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Blog Update</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.edit.post', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <label for="exampleInputEmail1" class="form-label">Blog Image</label>
                <input type="file" class="form-control" name="image">
                <br>
                <label for="exampleInputEmail1 mt-3" class="form-label">Blog Title</label>
                <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                <br>
                <label for="exampleInputEmail1 mt-3" class="form-label">Blog Category</label>
                <select name="blog_category" class="form-control">
                    <option selected disabled>select option</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($blog->category_id == $category->id ) ? "selected" : "" }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="exampleInputEmail1 mt-3" class="form-label">Blog Tag</label>
                <div class="row">
                    @foreach ($tags as $tag)
                    <div class="col-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $tag->id }}"
                            @foreach ($blog->RelationshipwithTags as $t)
                                @if ($tag->id == $t->id)
                                checked
                                @endif
                            @endforeach
                            >
                            <label class="form-check-label" for="gridCheck1">
                                {{ $tag->tag_name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <label for="exampleInputEmail1 mt-3" class="form-label">Date of Submit</label>
                <input class="form-control" type="date" name="submit_date" value="{{ $blog->submit_date }}">
                <br>
                <label for="exampleInputEmail1 mt-3" class="form-label">Blog Description</label>
                <textarea id="summernote" name="description">{{ $blog->description }}</textarea>
                <button type="submit" class="btn btn-primary mt-3">submit</button>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection


@section('footer_content')

<script>
    $(document).ready(function() {
    $('#summernote').summernote();
});
</script>

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

@endsection
