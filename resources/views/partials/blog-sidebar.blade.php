<div class="tj_main_sidebar">
    <div class="sidebar_widget widget_categories wow fadeInUp" data-wow-delay=".3s">
        <div class="widget_title">
            <h3 class="title">Categories</h3>
        </div>

        <ul>
            @forelse($categories as $category)
                <li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a> ({{ $category->posts_count }})</li>
            @empty
                <li>No categories yet</li>
            @endforelse
        </ul>
    </div>

    <div class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s">
        <div class="widget_title">
            <h3 class="title">Recent post</h3>
        </div>

        <ul>
            @forelse($recentPosts as $recentPost)
                <li>
                    <div class="recent-post_thumb">
                        <a href="{{ route('blog.show', $recentPost->slug) }}">
                            <img src="{{ $recentPost->thumbnail_url ?? asset('assets/img/blog/post-thumb-1.jpg') }}" alt="{{ $recentPost->title }}">
                        </a>
                    </div>

                    <div class="recent-post_content">
                        <div class="tj-post__meta entry-meta">
                            <span><i class="fa-light fa-calendar-days"></i>{{ $recentPost->created_at->format('M Y') }}</span>
                        </div>
                        <h4 class="recent-post_title">
                            <a href="{{ route('blog.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                        </h4>
                    </div>
                </li>
            @empty
                <li>No posts yet</li>
            @endforelse
        </ul>
    </div>

    <div class="sidebar_widget widget_tag_cloud wow fadeInUp" data-wow-delay=".3s">
        <div class="widget_title">
            <h3 class="title">Popular tag</h3>
        </div>

        <div class="tagcloud">
            @forelse($tags as $tag)
                <a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
            @empty
                <span>No tags yet</span>
            @endforelse
        </div>
    </div>
</div>
