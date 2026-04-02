<div id="main-slider" class="main-slider">
    @foreach($slides ?? [] as $slide)
    <div class="single-slide">
        <div class="bg-img kenburns-top" style="background-image: url({{ asset($slide['image']) }});"></div>
        <div class="slider-content-wrap d-flex align-items-center">
            <div class="container">
                <div class="slider-content">
                    @if(isset($slide['medium_caption']))
                    <div class="slider-caption medium"><div class="inner-layer"><div data-animation="fade-in-top" data-delay="0.5s">{{ $slide['medium_caption'] }}</div></div></div>
                    @endif
                    @if(isset($slide['big_caption']))
                    <div class="slider-caption big"><div class="inner-layer"><div data-animation="reveal-text" data-delay="1s">{{ $slide['big_caption'] }}</div></div></div>
                    @endif
                    @if(isset($slide['small_caption']))
                    <div class="slider-caption small"><div class="inner-layer"><div data-animation="fade-in-bottom" data-delay="2s">{!! $slide['small_caption'] !!}</div></div></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div><!-- slider-section -->
