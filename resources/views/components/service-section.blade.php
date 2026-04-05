<section class="service-section padding bd-bottom bg-grey">
    <div class="container">
       <div class="section-heading mb-40 text-center wow fadeInUp" data-wow-delay="200ms">
            <h4 class="sub-heading">{{ $subHeading ?? 'Our Service' }}</h4>
            <h2>{!! $title ?? '' !!}</h2>
            <p>{{ $description ?? '' }}</p>
        </div><!-- /.section-heading -->
        <div class="row">
            @foreach($services ?? [] as $index => $service)
            <div class="col-lg-4 col-md-6 sm-padding wow fadeInUp" data-wow-delay="{{ 200 + ($index * 100) }}ms">
                <div class="service-box">
                    <div class="service-image">
                        <img src="{{ asset($service['image'] ?? 'assets/img/post-4-768x512.jpg') }}" alt="post">
                    </div>
                    <div class="service-icon">
                        <i class="{{ $service['icon'] ?? 'dl dl-factory-1' }}"></i>
                    </div>
                    <div class="service-content">
                        <a href="{{ url($service['link'] ?? '#') }}"><h3>{{ $service['title'] ?? '' }}</h3></a>
                        <p>{{ $service['description'] ?? '' }}</p>
                        <a href="{{ url($service['link'] ?? '#') }}" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /. service-section -->
