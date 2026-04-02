<section class="team-section padding">
    <div class="container">
        <div class="section-heading mb-40 text-center wow fadeInUp" data-wow-delay="200ms">
            <h4 class="sub-heading">{{ $subHeading ?? 'Leadership team' }}</h4>
            <h2>{{ $title ?? 'Expert Dedicated' }} <span>{{ $highlight ?? 'Team' }}</span></h2>
            <p>{{ $description ?? '' }}</p>
        </div><!-- /.section-heading -->
        <div class="row">
            @foreach($members ?? [] as $index => $member)
            <div class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="{{ 200 + ($index * 100) }}ms">
                <div class="team-box">
                    <div class="team-thumb">
                        <img src="{{ asset($member['image'] ?? 'assets/img/team-1.jpg') }}" alt="team">
                        <div class="shape-1"></div>
                        <div class="shape-2"></div>
                        <div class="team-content">
                            <h3>{{ $member['name'] ?? '' }} <span>{{ $member['position'] ?? '' }}</span></h3>
                        </div>
                        <ul class="team-social">
                            @foreach($member['socials'] ?? [] as $social)
                            <li><a href="{{ $social['link'] ?? '#' }}"><i class="{{ $social['icon'] ?? 'fab fa-facebook-f' }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- ./ team-section -->
