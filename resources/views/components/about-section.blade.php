<section class="about-section padding bd-bottom">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 sm-padding wow fadeInLeft" data-wow-delay="200ms">
                <div class="section-heading mb-30">
                    <h2>{!! $title ?? '' !!}</h2>
                    <p>{{ $description ?? '' }}</p>
                </div>
                <div class="row d-flex align-items-center">
                    @foreach($lists ?? [] as $list)
                    <div class="col-md-6">
                        <div class="about-list">
                            <div class="about-icon">
                                <i class="{{ $list['icon'] ?? 'dl dl-levels' }}"></i>
                            </div>
                            <div class="about-content">
                                <h3>{{ $list['title'] ?? '' }}</h3>
                                <div>{!! $list['description'] ?? '' !!}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sign">
                    @if(isset($btnText) && isset($btnLink))
                    <a href="{{ url($btnLink) }}" class="default-btn">{{ $btnText }} <span></span></a>
                    @endif
                    {{-- @if(isset($signImage))
                    <img src="{{ asset($signImage) }}" alt="sign">
                    @endif --}}
                </div>
            </div>
            <div class="col-md-6 sm-padding wow fadeInRight" data-wow-delay="200ms">
                <div class="about-img">
                    <img src="{{ asset($image ?? 'assets/img/about-img-03.png') }}" alt="">
                    @if(isset($expText))
                    <div class="exp-box">
                        <h3>{!! $expText !!}</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- /. about-section -->
