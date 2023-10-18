@extends('layouts.frontend_master')


@section('content')


<!--post-single-->
<section class="post-single">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-12">
                <!--post-single-image-->
                    <div class="post-single-image">
                        <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="" style="width: 1280px; height:720px;">
                    </div>

                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">
                            <h2>{{ $blog->title }}</h2>
                            <ul class="entry-meta">
                                <li class="post-author-img"><img src="{{ asset('uploads/profile') }}/{{ $blog->Relationwithuser->image }}" alt=""></li>
                                <li class="post-author"> <a href="author.html">{{ $blog->Relationwithuser->name }}</a></li>
                                <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span> {{ $blog->Relationwithcategory->category_name }}</a></li>
                                <li class="post-date"> <span class="line"></span>{{ \Carbon\Carbon::parse($blog->submit_date)->format('M,d-Y') }}</li>
                            </ul>

                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">
                            <p>
                                @php
                                    echo $blog->description;
                                @endphp
                            </p>


                        </div>

                        <!--post-single-bottom-->
                        <div class="post-single-bottom">
                            <div class="tags">
                                <p>Tags:</p>
                                <ul class="list-inline">
                                    @foreach ($blog->RelationshipwithTags as $tag)
                                        <li >
                                            <a href="blog-layout-2.html">{{ $tag->tag_name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li >
                                        <a href="blog-layout-2.html">{{ $blog->RelationshipwithTags}}</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="social-media">
                                <p>Share on :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    <a href="author.html" class="image">
                                        <img src="{{ asset('uploads/profile') }}/{{ $blog->Relationwithuser->image }}" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>{{ $blog->Relationwithuser->name }}</h4>
                                    <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                                        Quis sem justo nisi varius.
                                    </p>
                                    <div class="social-media">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--post-single-comments-->
                        <div class="post-single-comments">
                            <!--Comments-->
                            <h4 >{{ $comments->count() }} Comments</h4>
                            <ul class="comments">
                                <!--comment1-->
                               @forelse ($comments as $comment)
                                 <li class="comment-item pt-0">
                                     <img src="assets/img/other/user1.jpg" alt="">
                                     <div class="content">
                                         <div class="meta">
                                             <ul class="list-inline">
                                                 <li><a href="#">Nirmaine Nicole</a> </li>
                                                 <li class="slash"></li>
                                                 <li>3 Months Ago</li>
                                             </ul>
                                         </div>
                                         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                             quod non fugiat aliquid sit similique!
                                         </p>
                                         <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                     </div>

                                 </li>
                                 @empty
                                 <li class="comment-item pt-0">
                                    <img src="assets/img/other/user1.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">No User Found</a> </li>
                                                <li class="slash"></li>
                                                {{-- <li>3 Months Ago</li> --}}
                                            </ul>
                                        </div>
                                        <p>
                                            Sorry, no comment for this post yet!!
                                        </p>
                                        <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                    </div>

                                </li>

                               @endforelse

                            </ul>
                            <!--Leave-comments-->
                            <div class="comments-form">
                                <h4 >Leave a Reply</h4>
                                <!--form-->
                                <form class="form" action="{{ route('comment.post',$blog->id) }}" method="POST">
                                    @csrf
                                    <p>Your email adress will not be published ,Requied fileds are marked*.</p>
                                    <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                        Your message was sent successfully.
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name"  class="form-control" placeholder="Name*" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email"   class="form-control" placeholder="Email*">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*"></textarea>
                                            </div>
                                        </div>

                                            <button type="submit" class="btn-custom">
                                                Send Comment
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--/-->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer_content')


@if (session('comment_done'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{ session('comment_done') }}",
        showConfirmButton: false,
        timer: 10000
        })
    </script>
@endif
@if (session('comment_error'))
    <script>
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: "{{ session('comment_error') }}",
        showConfirmButton: false,
        timer: 10000
        })
    </script>
@endif

@endsection
