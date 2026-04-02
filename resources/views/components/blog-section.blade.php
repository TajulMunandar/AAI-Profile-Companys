<section class="blog-section bd-bottom padding">
    <div class="container">
       <div class="section-heading mb-40 text-center wow fadeInUp" data-wow-delay="200ms">
            <h4 class="sub-heading">{{ $subHeading ?? 'From Blog' }}</h4>
            <h2>{{ $title ?? 'Get The Latest' }} <span>{{ $highlight ?? 'Updates Daily!' }}</span></h2>
            <p>{{ $description ?? '' }}</p>
        </div><!-- /.section-heading -->
        <div class="blog-wrap row">
            @foreach($posts ?? [] as $index => $post)
            <div class="col-lg-4 col-md-6 padding-15 wow fadeInUp" data-wow-delay="{{ 200 + ($index * 100) }}ms">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset($post['image'] ?? 'assets/img/post-1-768x512.jpg') }}" alt="post">
                        <span class="category"><a href="{{ url($post['category_link'] ?? '#') }}">{{ $post['category'] ?? '' }}</a></span>
                    </div>
                    <div class="blog-content">
                        <h3><a href="{{ url($post['link'] ?? '#') }}">{{ $post['title'] ?? '' }}</a></h3>
                        <p>{{ $post['excerpt'] ?? '' }}</p>
                        <a href="{{ url($post['link'] ?? '#') }}" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- ./ blog-section -->
