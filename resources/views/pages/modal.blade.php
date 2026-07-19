
<div id="portfolio-modal-{{$portfolio->id }}" class="popup_content_area zoom-anim-dialog mfp-hide">
    <div class="popup_modal_img">
        <img src="{{ asset('storage/'.$portfolio->image_path) }}" alt="{{ $portfolio->title }}">
    </div>

    <div class="popup_modal_content">
        <div class="portfolio_info">
            <div class="portfolio_info_text">
                <h2 class="title">{{ $portfolio->title }}</h2>
                <div class="desc">
                    <p>{{$portfolio->portfolio_description}}</p>
                </div>
                <a href="{{$portfolio->live_url}}" class="btn tj-btn-primary">live preview <i class="fal fa-arrow-right"></i></a>
            </div>
            <div class="portfolio_info_items">
                <div class="info_item">
                    <div class="key">Category</div>
                    <div class="value">{{ $portfolio->category }}</div>
                </div>
                <div class="info_item">
                    <div class="key">Client</div>
                    <div class="value">{{ $portfolio->client }}</div>
                </div>
                <div class="info_item">
                    <div class="key">Start Date</div>
                    <div class="value">{{ $portfolio->start_date }}</div>
                </div>
                <div class="info_item">
                    <div class="key">Designer</div>
                    <div class="value"><a href="#">{{ $portfolio->designer }}</a></div>
                </div>
            </div>
        </div>

        @if($portfolio->gallery->count() > 0)
            <div class="portfolio_gallery owl-carousel">
                @foreach($portfolio->gallery as $galleryItem)
                    <div class="gallery_item">
                        <img src="{{ asset('storage/'.$galleryItem->image_path) }}" alt="{{ $portfolio->title }} - Gallery Image {{ $loop->iteration }}">
                    </div>
                @endforeach
            </div>
        @endif


        <div class="portfolio_description">
            <h2 class="title">Project Description</h2>
            <div class="desc">
                <p>{{ $portfolio->description }}</p>
            </div>
        </div>

        <div class="portfolio_story_approach">
            <div class="portfolio_story">
                <div class="story_title"><h4 class="title">The story</h4></div>
                <div class="story_content"><p>{{ $portfolio->story }}</p></div>
            </div>
            <div class="portfolio_approach">
                <div class="approach_title"><h4 class="title">OUR APPROACH</h4></div>
                <div class="approach_content"><p>{{ $portfolio->approach }}</p></div>
            </div>
        </div>

        <div class="portfolio_navigation">
            @php
                $currentIndex = isset($portfolios) ? $portfolios->search(fn ($p) => $p->id === $portfolio->id) : false;
                $previousProject = $currentIndex !== false && $currentIndex > 0 ? $portfolios[$currentIndex - 1] : null;
                $nextProject = $currentIndex !== false && $currentIndex < $portfolios->count() - 1 ? $portfolios[$currentIndex + 1] : null;
            @endphp

            <div class="navigation_item prev-project">
                @if($previousProject)
                    <a href="#portfolio-modal-{{ $previousProject->id }}" class="project modal-popup" data-mfp-src="#portfolio-modal-{{ $previousProject->id }}">
                        <i class="fal fa-arrow-left"></i>
                        <div class="nav_project">
                            <div class="label">Previous Project</div>
                            <h3 class="title">{{ $previousProject->title }}</h3>
                        </div>
                    </a>
                @endif
            </div>

            <div class="navigation_item next-project">
                @if($nextProject)
                    <a href="#portfolio-modal-{{ $nextProject->id }}" class="project modal-popup" data-mfp-src="#portfolio-modal-{{ $nextProject->id }}">
                        <div class="nav_project">
                            <div class="label">Next Project</div>
                            <h3 class="title">{{ $nextProject->title }}</h3>
                        </div>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
