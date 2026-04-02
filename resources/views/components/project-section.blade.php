<section class="project-section bd-bottom">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="section-heading mb-40">
                    <h4>{{ $subHeading ?? 'Our Project' }}</h4>
                    <h2>{!! $title ?? '' !!}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-heading mb-40">
                    <p>{{ $description ?? '' }}</p>
                    @if(isset($btnText) && isset($btnLink))
                    <a href="{{ url($btnLink) }}" class="default-btn">{{ $btnText }} <span></span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="slider project-carousel nav-style dl-lb-gallery">
            @foreach($projects ?? [] as $project)
            <div class="project-item">
               <div class="project-thumb">
                   <img src="{{ asset($project['image'] ?? 'assets/img/project-1-420x520.jpg') }}" alt="project">
                    <div class="project-view">
                        <a class="dl-lightbox" href="{{ asset($project['lightbox_image'] ?? 'assets/img/project-1-768x600.jpg') }}"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="project-content">
                    <a href="{{ url($project['link'] ?? '#') }}" class="cat">{{ $project['category'] ?? '' }}</a>
                    <h3><a href="{{ url($project['link'] ?? '#') }}">{{ $project['title'] ?? '' }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
     </div>
    @if(isset($showCounter) && $showCounter)
    <div class="counter-wrapper padding">
       <div class="bg-pattern"></div>
        <div class="container">
            <div class="row d-flex align-items-center mt-50">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="section-heading light">
                    <h4>{{ $counterSubHeading ?? 'Some Facts' }}</h4>
                    <h2>{!! $counterTitle ?? '' !!}</h2>
                </div>
            </div>
            @foreach($counters ?? [] as $index => $counter)
            <div class="col-lg-2 col-md-6 sm-padding wow fadeInUp" data-wow-delay="{{ 300 + ($index * 100) }}ms">
                <div class="counter-item">
                    <div class="counter-content">
                        <h3><span class="odometer" data-count="{{ $counter['count'] ?? '0' }}">00</span></h3>
                        <h4>{{ $counter['label'] ?? '' }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    @endif
</section><!-- ./ project-section -->
