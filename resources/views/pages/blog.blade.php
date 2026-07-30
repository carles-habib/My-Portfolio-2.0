@extends('layouts.default')

@section('title', 'Blog')

@section('content')
    <main class="site-content" id="content">

        <!-- START: Breadcrumb Area -->
        <section class="breadcrumb_area" data-bg-image="{{ asset('assets/img/breadcrumb/breadcrumb-bg.jpg') }}" data-bg-color="#140C1C">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb_content d-flex flex-column align-items-center">
                            <h2 class="title wow fadeInUp" data-wow-delay=".3s">Blog</h2>
                            <div class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
                                <span><a href="/">Home</a></span>
                                <i class="far fa-long-arrow-right"></i>
                                <span class="current-item">Blog</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Breadcrumb Area -->

        <!-- START: Blog Section -->
        <section class="full-width tj-posts__area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tj-post__container">
                            @auth
                                @if(auth()->user()->hasRole('admin'))
                                    <div class="mb-4 text-end">
                                        <a href="{{ route('blog.create') }}" class="tj-btn-primary">
                                            <i class="fa-light fa-plus me-2"></i> Create New Post
                                        </a>
                                    </div>
                                @endif
                            @endauth

                            @forelse($posts as $post)
                                <article class="tj-post wow fadeInUp" data-wow-delay=".3s">
                                    <div class="tj-post__thumb">
                                        @if($post->type == 'video')
                                            <img src="{{ Storage::url($post->thumbnail) ?? asset('assets/img/blog/blog-3.jpg') }}" alt="{{ $post->title }}">
                                            <div class="tj-post__video">
                                                <a href="{{ $post->video_url }}" class="popup_video">
                                                    <i class="fa-thin fa-circle-play"></i>
                                                </a>
                                            </div>
                                        @elseif($post->type == 'gallery')
                                            <div class="tj-post__gallery owl-carousel">
                                                @foreach(json_decode($post->gallery_images) as $image)
                                                    <div class="tj-post-gallery__img">
                                                        <img src="{{ Storage::url($image) }}" alt="{{ $post->title }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                <img src="{{ Storage::url($post->featured_image) ?? asset('assets/img/blog/blog-4.jpg') }}" alt="{{ $post->title }}">
                                            </a>
                                        @endif

                                        <a href="{{ route('blog.category', $post->category->slug) }}" class="category">{{ $post->category->name }}</a>

                                        @auth
                                            @if(auth()->user()->hasRole('admin'))
                                                <div class="post-actions">
                                                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-sm btn-light">
                                                        <i class="fa-light fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                            <i class="fa-light fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                    <div class="tj-post__content">
                                        <div class="tj-post__meta entry-meta">
                                        <span><i class="fa-light fa-user"></i>
                                            {{ $post->user->full_name }}
                                        </span>
                                            <span><i class="fa-light fa-calendar-days"></i>
                                            {{ $post->created_at->format('d M, Y') }}
                                        </span>
                                            <span><i class="fa-light fa-comments"></i>
                                            <a href="{{ route('blog.show', $post->slug) }}#comments">
                                                Comments ({{ $post->comments_count }})
                                            </a>
                                        </span>
                                            <span><i class="fa-light fa-eye"></i>
                                            {{ $post->views }} views
                                        </span>
                                        </div>
                                        <h3 class="tj-post__title entry-title">
                                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <div class="tj-post__excerpt">
                                            <p>{{ Str::limit($post->excerpt, 200) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="tj-post__btn">
                                                <a href="{{ route('blog.show', $post->slug) }}" class="tj-btn-primary">Read more</a>
                                            </div>
                                            <div class="post-tags">
                                                @foreach($post->tags as $tag)
                                                    <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-secondary">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <div class="text-center py-5">
                                    <h3>No blog posts yet</h3>
                                    <p>Check back later for updates!</p>
                                </div>
                            @endforelse

                            {{ $posts->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @include('partials.blog-sidebar')
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Blog Section -->
    </main>
@endsection

@section('scripts')
    <script>
        // Initialize video popup
        $(document).ready(function() {
            $('.popup_video').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 300,
                preloader: false,
                fixedContentPos: true,
                callbacks: {
                    close: function() {
                        // Cleanup on close
                        $('.mfp-iframe, .mfp-content, .mfp-container, .mfp-bg, .mfp-wrap').remove();
                        $('body').removeClass('mfp-open');
                    }
                }
            });
        });
    </script>
@endsection
