
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
                <a href="{{$portfolio->live_urll}}" class="btn tj-btn-primary">live preview <i class="fal fa-arrow-right"></i></a>
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

        <div class="portfolio_gallery owl-carousel">
            <div class="gallery_item">
                <img src="{{ asset('storage/'.$portfolio->thumbnail1) }}" alt="">
            </div>
            @if($portfolio->thumbnail2)

            <div class="gallery_item">
                <img src="{{ asset('storage/'.$portfolio->thumbnail2) }}" alt="">
            </div>
            @endif
            @if($portfolio->thumbnail3)

                <div class="gallery_item">
                    <img src="{{ asset('storage/'.$portfolio->thumbnail3) }}" alt="">
                </div>
            @endif
        </div>


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
        </div>
    </div>
</div>
