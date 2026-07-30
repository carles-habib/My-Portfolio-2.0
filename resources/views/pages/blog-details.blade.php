@extends('layouts.default')

@section('title', $post->title)

@section('content')
    <main class="site-content" id="content">

        <!-- START: Breadcrumb Area -->
        <section class="breadcrumb_area" data-bg-image="{{ asset('assets/img/breadcrumb/breadcrumb-bg.jpg') }}" data-bg-color="#140C1C">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb_content d-flex flex-column align-items-center">
                            <h2 class="title wow fadeInUp" data-wow-delay=".3s">{{ $post->title }}</h2>
                            <div class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
                                <span><a href="/">Home</a></span>
                                <i class="far fa-long-arrow-right"></i>
                                <span><a href="{{ route('blog.index') }}">Blog</a></span>
                                <i class="far fa-long-arrow-right"></i>
                                <span class="current-item">{{ $post->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Breadcrumb Area -->

        <!-- START: Blog Section -->
        <section class="full-width tj-post-details__area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tj-post-details__container">
                            <article class="tj-single__post">
                                <div class="tj-post__thumb">
                                    @if($post->type === 'video')
                                        <img src="{{ $post->thumbnail_url ?? asset('assets/img/blog/blog-4.jpg') }}" alt="{{ $post->title }}">
                                        <div class="tj-post__video">
                                            <a href="{{ $post->video_url }}" class="popup_video">
                                                <i class="fa-thin fa-circle-play"></i>
                                            </a>
                                        </div>
                                    @elseif($post->type === 'gallery')
                                        <div class="tj-post__gallery owl-carousel">
                                            @foreach(json_decode($post->gallery_images ?? '[]') as $image)
                                                <div class="tj-post-gallery__img">
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($image) }}" alt="{{ $post->title }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <img src="{{ $post->featured_image_url ?? asset('assets/img/blog/blog-4.jpg') }}" alt="{{ $post->title }}">
                                    @endif

                                    <a href="{{ route('blog.category', $post->category->slug) }}" class="category">{{ $post->category->name }}</a>

                                    @auth
                                        @if(auth()->user()->hasRole('admin'))
                                            <div class="post-actions">
                                                <a href="{{ route('blog.edit', $post) }}" class="btn btn-sm btn-light">
                                                    <i class="fa-light fa-edit"></i>
                                                </a>
                                                <form action="{{ route('blog.destroy', $post) }}" method="POST" class="d-inline">
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
                                        <span><i class="fa-light fa-user"></i> {{ $post->user->full_name }}</span>
                                        <span><i class="fa-light fa-calendar-days"></i> {{ $post->created_at->format('d M, Y') }}</span>
                                        <span><i class="fa-light fa-comments"></i> <a href="#comments">Comments ({{ $post->comments->count() }})</a></span>
                                        <span><i class="fa-light fa-eye"></i> {{ $post->views }} views</span>
                                    </div>
                                    <h3 class="tj-post__title entry-title">{{ $post->title }}</h3>

                                    <div class="tj-post__content">
                                        {!! nl2br(e($post->content)) !!}
                                    </div>
                                </div>
                            </article>

                            <!-- post tags -->
                            <div class="single-post_tag_share">
                                <div class="tj_tag">
                                    <h4 class="tag__title">Tags: </h4>
                                    <div class="tagcloud">
                                        @forelse($post->tags as $tag)
                                            <a href="{{ route('blog.tag', $tag->slug) }}" rel="tag">{{ $tag->name }}</a>
                                        @empty
                                            <span>No tags</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <!-- comments area -->
                            <div class="tj-comments__container" id="comments">
                                <div class="tj-comments__wrap">
                                    <div class="tj-comment__title">
                                        <h3>{{ $post->comments->count() }} Comments</h3>
                                    </div>

                                    <div class="tj-latest__comments">
                                        <ul>
                                            @forelse($post->comments()->approved()->whereNull('parent_id')->with('replies')->get() as $comment)
                                                <li class="tj__comment">
                                                    <div class="tj-comment__wrap">
                                                        <div class="comment__text">
                                                            <div class="avatar__name">
                                                                <h5>{{ $comment->name }}</h5>
                                                                <span>{{ $comment->created_at->format('F j, Y') }}</span>
                                                            </div>
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>No comments yet.</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
@stop
