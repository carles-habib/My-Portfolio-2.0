@foreach ($portfolios as $portfolio)
    <div class="portfolio-item {{ $portfolio->category }}">
        <div class="image-box">
            <img src="{{ asset('storage/'.$portfolio->image_path) }}" alt="{{ $portfolio->title }}">
        </div>
        <div class="content-box">
            <h3 class="portfolio-title">{{ $portfolio->title }}</h3>
            <p>{{ $portfolio->description }}</p>
            <i class="flaticon-up-right-arrow"></i>
            <button data-mfp-src="#portfolio-modal-{{ $portfolio->id }}" class="portfolio-link modal-popup"></button>
        </div>
    </div>
@endforeach
