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
                    @if(isset($slide['big_caption_1']))
                    <div class="slider-caption big"><div class="inner-layer"><div data-animation="reveal-text" data-delay="1s">{{ $slide['big_caption_1'] }}</div></div></div>
                    @endif
                    @if(isset($slide['big_caption_2']))
                    <div class="slider-caption big"><div class="inner-layer"><div data-animation="reveal-text" data-delay="1.5s">{{ $slide['big_caption_2'] }}</div></div></div>
                    @endif
                    @if(isset($slide['small_caption']))
                    <div class="slider-caption small"><div class="inner-layer"><div data-animation="fade-in-bottom" data-delay="2s">{!! $slide['small_caption'] !!}</div></div></div>
                    @endif
                    @if(isset($slide['btn_text']) && isset($slide['btn_link']))
                    <div class="slider-btn-group justify-content-left">
                        <div class="inner-layer">
                            <a href="{{ url($slide['btn_link']) }}" class="slider-btn" data-animation="fade-in-bottom" data-delay="2.5s">{{ $slide['btn_text'] }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div><!-- slider-section -->
