<!-- resources/views/portfolio/show.blade.php -->
<div class="popup_content_area zoom-anim-dialog">
    <div class="popup_modal_img">
        <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}">
    </div>

    <div class="popup_modal_content">
        <div class="portfolio_info">
            <div class="portfolio_info_text">
                <h2 class="title">{{ $portfolio->title }}</h2>
                <div class="desc">
                    <p>{{ $portfolio->description }}</p>
                </div>
                @if($portfolio->live_url)
                    <a href="{{ $portfolio->live_url }}" class="btn tj-btn-primary" target="_blank">
                        live preview <i class="fal fa-arrow-right"></i>
                    </a>
                @endif
            </div>
            <div class="portfolio_info_items">
                <div class="info_item">
                    <div class="key">Category</div>
                    <div class="value">{{ $portfolio->category }}</div>
                </div>
                <div class="info_item">
                    <div class="key">Client</div>
                    <div class="value">{{ $portfolio->client ?? 'N/A' }}</div>
                </div>
                <div class="info_item">
                    <div class="key">Start Date</div>
                    <div class="value">{{ $portfolio->start_date ? $portfolio->start_date->format('F j, Y') : 'N/A' }}</div>
                </div>
                <div class="info_item">
                    <div class="key">Designer</div>
                    <div class="value">
                        @if($portfolio->designer)
                            <a href="{{ $portfolio->designer }}">{{ $portfolio->designer }}</a>
                        @else
                            {{ $portfolio->designer ?? 'N/A' }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

{{--        @if($portfolio->gallery->count() > 0)--}}
            <div class="portfolio_gallery owl-carousel">
                @foreach($portfolio->gallery as $galleryItem)
                    <div class="gallery_item">
                        <img src="{{ asset('storage/' . $galleryItem->image_path) }}" alt="{{ $portfolio->title }} - Gallery Image {{ $loop->iteration }}">
                    </div>
                @endforeach
            </div>
        @endif

        @if($portfolio->full_description)
            <div class="portfolio_description">
                <h2 class="title">Project Description</h2>
                <div class="desc">
                    {!! nl2br(e($portfolio->full_description)) !!}
                </div>
            </div>
        @endif

        <div class="portfolio_story_approach">
            @if($portfolio->story)
                <div class="portfolio_story">
                    <div class="story_title">
                        <h4 class="title">The story</h4>
                    </div>
                    <div class="story_content">
                        <p>{!! nl2br(e($portfolio->story)) !!}</p>
                    </div>
                </div>
            @endif

            @if($portfolio->approach)
                <div class="portfolio_approach">
                    <div class="approach_title">
                        <h4 class="title">OUR APPROACH</h4>
                    </div>
                    <div class="approach_content">
                        <p>{!! nl2br(e($portfolio->approach)) !!}</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="portfolio_navigation">
            @if($previous)
                <div class="navigation_item prev-project">
                    <a href="{{ route('portfolio.show', $previous->id) }}" class="project">
                        <i class="fal fa-arrow-left"></i>
                        <div class="nav_project">
                            <div class="label">Previous Project</div>
                            <h3 class="title">{{ $previous->title }}</h3>
                        </div>
                    </a>
                </div>
            @endif

            @if($next)
                <div class="navigation_item next-project">
                    <a href="{{ route('portfolio.show', $next->id) }}" class="project">
                        <div class="nav_project">
                            <div class="label">Next Project</div>
                            <h3 class="title">{{ $next->title }}</h3>
                        </div>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize owl carousel for gallery
            $('.portfolio_gallery').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: false
            });
        });
    </script>
@endpush
