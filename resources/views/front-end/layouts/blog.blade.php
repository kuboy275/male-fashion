@extends('front-end.master')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('frontend/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    
               
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset($blog->image_path) }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('frontend/img/icon/calendar.png') }}" alt=""> 16 February 2020</span>
                            {{-- Str::of limit => using for display text limit max --}}
                            <h5> {{ Str::of($blog->title)->limit(40) }} </h5> 
                            <a href="{{ route('blog.detail', $blog->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="product__pagination">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Blog Section End -->
    
@endsection