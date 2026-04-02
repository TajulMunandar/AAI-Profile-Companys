<section class="testimonials-section bg-grey padding bd-bottom">
    <div class="container">
        <div class="section-heading mb-40 text-center wow fadeInUp" data-wow-delay="200ms">
            <h4 class="sub-heading">{{ $subHeading ?? 'Tesimonials' }}</h4>
            <h2>{{ $title ?? 'Words From' }} <span>{{ $highlight ?? 'Clients!' }}</span></h2>
            <p>{{ $description ?? '' }}</p>
        </div><!-- /.section-heading -->
        <div class="slider testimonials-carousel nav-style carousel-dots">
            @foreach($testimonials ?? [] as $testimonial)
            <div class="testi-item">
               <div class="testi-thumb">
                   <img src="{{ asset($testimonial['image'] ?? 'assets/img/testimonial-1.jpg') }}" alt="img">
               </div>
                <div class="testi-content">
                    <p>{!! $testimonial['quote'] ?? '' !!}</p>
                    <h3>{{ $testimonial['name'] ?? '' }} <span>{{ $testimonial['position'] ?? '' }}</span></h3>
                    <ul class="ratings">
                        @for($i = 0; $i < ($testimonial['rating'] ?? 5); $i++)
                        <li><i class="fas fa-star"></i></li>
                        @endfor
                    </ul>
                    <i class="fa fa-quote-right quote-icon"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- ./testimonial-section -->
