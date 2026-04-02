<section class="skills-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 no-padding">
                <div class="skills-info">
                    <div class="section-heading mb-40">
                        <h4 class="sub-heading">{{ $subHeading ?? 'we make difference' }}</h4>
                        <h2>{!! $title ?? '' !!}</h2>
                        <p>{{ $description ?? '' }}</p>
                    </div><!-- /.section-heading -->
                    <ul class="skills-items">
                        @foreach($skills ?? [] as $index => $skill)
                        <li class="skills-item">
                            <h5>{{ $skill['name'] ?? '' }}</h5>
                            <div class="progress">
                                <div class="progress-bar wow slideInLeft" data-wow-delay="{{ $index * 100 }}ms" data-wow-duration="2000ms" style="width: {{ $skill['percentage'] ?? 85 }}%;">
                                    <span>{{ $skill['percentage'] ?? 85 }}%</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @if(isset($videoUrl))
                    <a href="{{ $videoUrl }}" class="play-btn popup-youtube">
                        <svg enable-background="new 0 0 41.999 41.999" version="1.1" viewBox="0 0 41.999 41.999" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M36.068,20.176l-29-20C6.761-0.035,6.363-0.057,6.035,0.114C5.706,0.287,5.5,0.627,5.5,0.999v40 c0,0.372,0.206,0.713,0.535,0.886c0.146,0.076,0.306,0.114,0.465,0.114c0.199,0,0.397-0.06,0.568-0.177l29-20 c0.271-0.187,0.432-0.494,0.432-0.823S36.338,20.363,36.068,20.176z M7.5,39.095V2.904l26.239,18.096L7.5,39.095z"></path>
                        </svg>
                        <div class="ripple"></div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- ./skills-section -->
