@extends('layouts.frontend_master')


@section('content')

   <!--section-heading-->
   <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>{{ $blog->category_name }}</h1>
                         <p class="links"><a href="index.html">Home <i class="las la-angle-right"></i></a> Blog</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<section class="blog-layout-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

               @forelse ($blogs as $blog)
                 <!--post 1-->
                 <div class="post-list post-list-style2">
                     <div class="post-list-image">
                         <a href="post-single.html">
                             <img src="assets/img/blog/30.jpg" alt="">
                         </a>
                     </div>
                     <div class="post-list-content">
                         <h3 class="entry-title">
                             <a href="post-single.html">{{ $blog->title }}</a>
                         </h3>
                         <ul class="entry-meta">
                             <li class="post-author-img"><img src="assets/img/author/1.jpg" alt=""></li>
                             <li class="post-author"> <a href="author.html">{{ $blog->Relationwithuser->name }}</a></li>
                             <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span> {{ $blog->Relationwithuser->role }}</a></li>
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
                                <a href='{{ url('/') }}' class='text-info fw-bold'>Read More</a>

                             </p>
                         </div>
                         <div class="post-btn">
                             <a href="post-single.html" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                         </div>
                     </div>
                 </div>
               @empty

               <!--post 1-->
               <div class="post-list post-list-style2">
                <div class="post-list-image">
                    <a href="post-single.html">
                        <div class="d-flex justify-content-center">

                            <img src="{{ Avatar::create('Error')->toBase64() }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="post-list-content">
                    <h3 class="entry-title">
                        <a href="post-single.html">NO Blog Title Found</a>
                    </h3>
                    <ul class="entry-meta">
                        <li class="post-author-img"><img src="{{ Avatar::create('Hero Alam')->toBase64() }}" alt=""></li>
                        <li class="post-author"> <a href="author.html">Hero Alam</a></li>
                        <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span> \-----/</a></li>
                        <li class="post-date"> <span class="line"></span>\-----/</li>
                    </ul>
                    <div class="post-exerpt">
                        <p>NO Blog Description Found</p>
                    </div>
                    <div class="post-btn">
                        <a href="#" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>

               @endforelse

            </div>
        </div>
    </div>
</section>


<!--pagination-->
<div class="pagination">
    <div class="container-fluid">
        <div class="pagination-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-list">
                        <ul class="list-inline">
                            <li><a href="#" ><i class="las la-arrow-left"></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#" ><i class="las la-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


