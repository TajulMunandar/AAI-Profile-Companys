<header class="header">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-inner">
                <div class="top-left">
                    <ul>
                        <li>Phone: <a href="tel:+6264541042">+62 645 41042</a></li>
                        <li>Email: <a href="mailto:info@atlanticalam.com">info@atlanticalam.com</a></li>
                    </ul>
                </div>
                <div class="top-right">
                    <ul class="top-social">
                        <li><a href="#" target="_blank"><i class="las la-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /.top-bar -->
    <div class="mid-header">
        <div class="container">
            <div class="mid-header-inner">
                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/logo website aai.png') }}" alt="Logo" width="110%"/>
                    </a>
                </div>
                <div class="mid-header-right">
                    <ul class="iso-logos">
                        <li>
                            <img src="{{ asset('assets/Logo ISO/iso 23.png') }}" alt="ISO 23 Certification" height="70"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /.mid-header -->
    <div class="primary-header">
        <div class="container">
            <div class="primary-header-inner">
                <div class="header-menu-wrap">
                    <ul class="dl-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">Company</a>
                            <ul>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li><a href="{{ url('/company-service') }}">Company Service</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/project-4-col') }}">Projects</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    </ul>
                </div><!-- /.header-menu-wrap -->
                <div class="header-right">
                    <div class="search-icon dl-search-icon"><i class="fas fa-search"></i></div>
                    <a class="header-btn" href="{{ url('/contact') }}">Request Quote<span></span></a>
                    <!-- Burger menu -->
                    <div class="mobile-menu-icon">
                        <div class="burger-menu">
                            <div class="line-menu line-half first-line"></div>
                            <div class="line-menu"></div>
                            <div class="line-menu line-half last-line"></div>
                        </div>
                    </div>
                </div><!-- /.header-right -->
            </div><!-- /.primary-header-inner -->
        </div>
    </div><!-- /.primary-header-two -->
</header><!-- /.header -->
