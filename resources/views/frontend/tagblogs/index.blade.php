@extends('layouts.frontend_master')


@section('content')

   <!--section-heading-->
   <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>{{ $tag_name->tag_name }}</h1>
                         <p class="links"><a href="index.html">Home <i class="las la-angle-right"></i></a> Blog</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>


 <!-- Blog Layout-2-->
 <section class="blog-layout-2">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <!--post 1-->
                 @foreach ($blogs as $blog)
                    <div class="post-list post-list-style2">
                        <div class="post-list-image">
                            <a href="post-single.html">
                                <img src="{{ asset('uploads/blog') }}/{{ $blog->image }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <h3 class="entry-title">
                                <a href="post-single.html">{{ $blog->title }}</a>
                            </h3>
                            <ul class="entry-meta">
                                <li class="post-author-img"><img src="{{ asset('uploads/profile') }}/{{  $blog->Relationwithuser->image  }}" alt=""></li>
                                <li class="post-author"> <a href="author.html">{{  $blog->Relationwithuser->name }}</a></li>
                                <li class="entry-cat"> <a href="{{ route('blogs.category',$blog->Relationwithcategory->id) }}" class="category-style-1 "> <span class="line"></span> {{ $blog->Relationwithcategory->cateory_name }}</a></li>
                                <li class="post-date"> <span class="line"></span> {{ \Carbon\Carbon::parse($blog->submit_date)->format('M,d-Y') }}</li>
                            </ul>
                            <div class="post-exerpt">
                                <p>
                                    <?php
                                    $blog_des = strip_tags($blog->description);
                                    $blog_id = $blog->id;
                                    if(strlen($blog_des > 250)):
                                        $blog_cut = substr($blog_des,0,250);
                                        $endpoint = strrpos($blog_cut, " ");
                                        $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                                        $blog_des .="..... ";
                                    endif;
                                    echo $blog_des;
                                    ?>

                                    <a href='{{ route('single.blogs',$blog->id) }}' class='text-info fw-bold'>Read More</a>
                                </p>
                            </div>
                            <div class="post-btn">
                                <a href="{{  route('single.blogs',$blog->id) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                 @endforeach

             </div>
         </div>
     </div>
 </section>

@endsection
