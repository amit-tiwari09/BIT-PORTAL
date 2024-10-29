<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.3rdwavemedia.com/college-green/bs5/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Oct 2024 07:57:53 GMT -->

<head>
    <title>College Green - Responsive Website Template for Education</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel='stylesheet' type='text/css'>

    <!-- FontAwesome JS -->
    <script defer src="{{ asset('assets/fontawesome/js/all.js') }}"></script>

    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/theme-1.css') }}">



    <style>
        .carousel-controls {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
        display: flex;
    }

    .carousel-control-prev-promo,
    .carousel-control-next-promo {
        position: relative;
        width: 25px;
        height: 25px;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        border-radius: 0;
        opacity: 2;
        top:17px;
    }

    .carousel-control-prev-promo {
        margin-right: 5px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 10px;
        height: 10px;
        background-size: 100% 100%;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3e%3c/svg%3e");
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3e%3c/svg%3e");
    }

    .carousel-item {
        position: relative;
    }
    </style>
</head>

<body class="home-page">
    <div class="wrapper">
        <!-- ******HEADER****** -->
        <header class="header">
            <div class="top-bar d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <ul class="social-icons col-md-6 col-12">
                            <ul style="display: flex; list-style: none; padding: 0; height:50px;">
                                @foreach($socialMediaLinks as $link)
                                <li style="margin-right: 10px;">
                                    <a href="{{ $link->url }}">
                                        <img src="{{ asset('pictures/' . $link->image) }}" alt="{{ $link->name }}" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                                    </a>
                                </li>
                                @endforeach
                            </ul>


                        </ul><!--//social-icons-->
                        @if (!auth()->guard('staff')->check() && !auth()->guard('student')->check())
                        <form class="col-md-6 col-12 search-form" action="{{route('login')}}" method="GET">
                            <button type="submit" class="btn btn-theme">LOGIN</button>
                        </form>


                        @endif

                    </div><!--//row-->
                </div>
            </div><!--//to-bar-->
            <div class="header-main container">
                <div class="row justify-content-center justify-content-lg-between">
                    <h1 class="logo mb-0 col-auto text-center text-lg-start">
                        <a href="{{route('home')}}"><img src="{{ asset('pictures/' . $settings['logo']) }}" alt="Logo" style="width: 50px; height: 50px;"></a>
                    </h1>
                    <div class="info d-none d-lg-flex col-auto flex-column align-items-end">

                        <ul class="menu-top d-none d-lg-block">
                            @foreach($navLinks as $link)
                            <li><a href="{{ $link->value }}">{{ $link->key }}</a></li>
                            @endforeach
                        </ul><!--//menu-top-->

                        <div class="contact d-none d-lg-block">
                            <p class="phone">
                                <i class="fas fa-phone"></i>
                                <a href="tel:{{ $settings['contact'] ?? '' }}">Call us today {{ $settings['contact'] ?? '' }}</a>
                            </p>

                            <p class="email">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $settings['email'] ?? '' }}">{{ $settings['email'] ?? '' }}</a>
                            </p>

                        </div><!--//contact-->
                    </div><!--//info-->
                </div><!--//row-->
            </div><!--//header-main-->
        </header><!--//header-->

        <!-- ******NAV****** -->
        <div class="main-nav-wrapper">
            <div class="container">
                <nav class="main-nav navbar navbar-expand-lg" role="navigation">
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                    <div class="navbar-toggler-label d-lg-none">MENU</div>

                    <div class="navbar-collapse collapse" id="navbar-collapse">

                        <ul class="nav navbar-nav">
                            @foreach($navLinks as $link)
                            <!-- If the link is a dropdown, handle it differently -->
                            @if($link->dropdown_items && is_array($link->dropdown_items))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $link->key }} <i class="fas fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($link->dropdown_items as $dropdownItem)
                                    <a class="dropdown-item" href="{{ $dropdownItem['value'] }}">{{ $dropdownItem['key'] }}</a>
                                    @endforeach
                                </div><!--//dropdown-menu-->
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $link->value }}">{{ $link->key }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul><!--//nav-->

                        <form class="mobile-search-form d-lg-none mb-3" role="search">
                            <div class="row gx-0">
                                <div class="col-10">
                                    <input type="text" class="form-control" placeholder="Search the site...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-theme">Go on</button>
                                </div>
                            </div>
                        </form><!--//mobile-search-form-->
                    </div><!--//navabr-collapse-->

                </nav><!--//main-nav-->
            </div><!--//container-->
        </div><!--//main-nav-container-->



        <!-- ******CONTENT****** -->
        <div class="content container">
            <div id="homepage-carousel" class="promo-carousel carousel slide" data-bs-ride="carousel">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    @foreach($slides as $index => $slide)
                    <button
                        type="button"
                        data-bs-target="#homepage-carousel"
                        data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}">
                    </button>
                    @endforeach
                </div>

                <!-- Carousel Inner Slides -->
                <div class="carousel-inner slides">
                    @foreach($slides as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }} slide-{{ $index + 1 }}">
                        <div class="carousel-caption text-start">
                            <span class="main">{{ $slide->main_text }}</span>
                            <br />
                            <span class="secondary">{{ $slide->secondary_text }}</span>
                        </div>
                        @if($slide->image)
                        <img src="{{ asset('carousel_images/' . $slide->image) }}" class="d-block w-100 centered-image" alt="{{ $slide->main_text }}">
                        @endif
                    </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <button
                    class="carousel-control-prev homepage-carousel-prev d-inline-block"
                    type="button"
                    data-bs-target="#homepage-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button
                    class="carousel-control-next homepage-carousel-next d-inline-block"
                    type="button"
                    data-bs-target="#homepage-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="content container">
            <div id="promo-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-controls">
                    <button class="carousel-control-prev-promo" type="button" data-bs-target="#promo-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next-promo" type="button" data-bs-target="#promo-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="carousel-inner">
                    @foreach($promos as $index => $promo)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <section class="promo box box-dark">
                            <div class="row gx-5 justify-content-between align-content-center">
                                <div class="col-lg-9 col-12 mb-2 mb-lg-0">
                                    <h1 class="section-heading">{{ $promo->title }}</h1>
                                    <p>{{ $promo->description }}</p>
                                </div>
                                <div class="col-lg-3 col-12 mb-2">
                                    <a class="btn btn-cta" href="{{ $promo->button_link }}"><i class="fas fa-play-circle"></i>{{ $promo->button_text }}</a>
                                </div>
                            </div>
                        </section>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



    </div>
    </div>





    <section class="news">
        <h1 class="section-heading text-highlight"><span class="line">Latest News</span></h1>
        <div class="carousel-controls">
            <a class="prev" href="#news-carousel" data-bs-slide="prev"><i class="fas fa-caret-left"></i></a>
            <a class="next" href="#news-carousel" data-bs-slide="next"><i class="fas fa-caret-right"></i></a>
        </div><!--//carousel-controls-->
        <div class="section-content ">
            <div id="news-carousel" class="news-carousel carousel slide">
                <div class="carousel-inner">
                    <div class="item carousel-item active">
                        <div class="row">
                            <div class="col-lg-4 col-12 news-item">
                                <h2 class="title"><a href="news-single.html">Phasellus scelerisque metus</a></h2>
                                <img class="thumb" src="assets/images/news/news-thumb-1.jpg" alt="" />
                                <p>Suspendisse purus felis, porttitor quis sollicitudin sit amet, elementum et tortor. Praesent lacinia magna in malesuada vestibulum. Pellentesque urna libero.</p>
                                <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>
                            </div><!--//news-item-->
                            <div class="col-lg-4 col-12 news-item">
                                <h2 class="title"><a href="news-single.html">Morbi at vestibulum turpis</a></h2>
                                <p>Nam feugiat erat vel neque mollis, non vulputate erat aliquet. Maecenas ac leo porttitor, semper risus condimentum, cursus elit. Vivamus vitae libero tellus.</p>
                                <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>
                                <img class="thumb" src="assets/images/news/news-thumb-2.jpg" alt="" />
                            </div><!--//news-item-->
                            <div class="col-lg-4 col-12 news-item">
                                <h2 class="title"><a href="news-single.html">Aliquam id iaculis urna</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam bibendum mauris eget sapien consectetur pellentesque. Proin elementum tristique euismod. </p>
                                <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>
                                <img class="thumb" src="assets/images/news/news-thumb-3.jpg" alt="" />
                            </div><!--//news-item-->
                        </div><!--//row-->
                    </div><!--//item-->
                    <div class="item carousel-item">
                        <div class="row">
                            <div class="col-lg-4 col-12 news-item">
                                <h2 class="title"><a href="news-single.html">Phasellus scelerisque metus</a></h2>
                                <img class="thumb" src="assets/images/news/news-thumb-4.jpg" alt="" />
                                <p>Suspendisse purus felis, porttitor quis sollicitudin sit amet, elementum et tortor. Praesent lacinia magna in malesuada vestibulum. Pellentesque urna libero.</p>
                                <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>
                            </div><!--//news-item-->
                            <div class="col-lg-4 col-12 news-item">
                                <h2 class="title"><a href="news-single.html">Morbi at vestibulum turpis</a></h2>
                                <p>Nam feugiat erat vel neque mollis, non vulputate erat aliquet. Maecenas ac leo porttitor, semper risus condimentum, cursus elit. Vivamus vitae libero tellus.</p>
                                <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>
                                <img class="thumb" src="assets/images/news/news-thumb-5.jpg" alt="" />
                            </div><!--//news-item-->
                            <div class="col-lg-4 col-12 news-item">
                                <h2 class="title"><a href="news-single.html">Aliquam id iaculis urna</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam bibendum mauris eget sapien consectetur pellentesque. Proin elementum tristique euismod. </p>
                                <a class="read-more" href="news-single.html">Read more<i class="fas fa-chevron-right"></i></a>
                                <img class="thumb" src="assets/images/news/news-thumb-6.jpg" alt="" />
                            </div><!--//news-item-->
                        </div><!--//row-->
                    </div><!--//item-->
                </div><!--//carousel-inner-->
            </div><!--//news-carousel-->
        </div><!--//section-content-->
    </section><!--//news-->
    <div class="row cols-wrapper">
        <div class="col-12 col-lg-6 col-xl-3">
            <section class="events">
                <h1 class="section-heading text-highlight"><span class="line">Events</span></h1>
                <div class="section-content">
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">FEB</span>
                            <span class="date-number">18</span>
                        </p>
                        <div class="details">
                            <h2 class="title">Open Day</h2>
                            <p class="time"><i class="far fa-clock"></i>10:00am - 18:00pm</p>
                            <p class="location"><i class="fas fa-map-marker-alt"></i>East Campus</p>
                        </div><!--//details-->
                    </div><!--event-item-->
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">SEP</span>
                            <span class="date-number">06</span>
                        </p>
                        <div class="details">
                            <h2 class="title">E-learning at College Green</h2>
                            <p class="time"><i class="far fa-clock"></i>10:00am - 16:00pm</p>
                            <p class="location"><i class="fas fa-map-marker-alt"></i>Learning Center</p>
                        </div><!--//details-->
                    </div><!--event-item-->
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">JUN</span>
                            <span class="date-number">23</span>
                        </p>
                        <div class="details">
                            <h2 class="title">Career Fair</h2>
                            <p class="time"><i class="far fa-clock"></i>09:45am - 16:00pm</p>
                            <p class="location"><i class="fas fa-map-marker-alt"></i>Library</p>
                        </div><!--//details-->
                    </div><!--event-item-->
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">May</span>
                            <span class="date-number">17</span>
                        </p>
                        <div class="details">
                            <h2 class="title">Science Seminar</h2>
                            <p class="time"><i class="far fa-clock"></i>14:00pm - 18:00pm</p>
                            <p class="location"><i class="fas fa-map-marker-alt"></i>Library</p>
                        </div><!--//details-->
                    </div><!--event-item-->
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">Apr</span>
                            <span class="date-number">26</span>
                        </p>
                        <div class="details">
                            <h2 class="title">PTA Meeting</h2>
                            <p class="time"><i class="far fa-clock"></i>15:30pm - 16:30pm</p>
                            <p class="location"><i class="fas fa-map-marker-alt"></i>Library</p>
                        </div><!--//details-->
                    </div><!--event-item-->
                    <a class="read-more" href="events.html">All events<i class="fas fa-chevron-right"></i></a>
                </div><!--//section-content-->
            </section><!--//events-->
        </div><!--//col-->
        <div class="col-12 col-lg-6 col-xl-6">
            <section class="course-finder">
                <h1 class="section-heading text-highlight"><span class="line">Course Finder</span></h1>
                <div class="section-content">
                    <form class="course-finder-form" action="#" method="get">
                        <div class="row gx-0 gx-lg-2">
                            <div class="col-12 col-xl-auto col-subject mb-3">
                                <select class="form-select subject">
                                    <option>Choose a subject area</option>
                                    <option>Accounting & Finance</option>
                                    <option>Biological Sciences</option>
                                    <option>Business Studies</option>
                                    <option>Computer Science</option>
                                    <option>Creative Arts & Media</option>
                                    <option>Drama</option>
                                    <option>Education</option>
                                    <option>Engineering</option>
                                    <option>Film Studies</option>
                                    <option>Fitness Training</option>
                                    <option>Hospitality</option>
                                    <option>History</option>
                                    <option>International Relations</option>
                                    <option>Law</option>
                                    <option>Mathematics</option>
                                    <option>Music</option>
                                    <option>Physics</option>
                                    <option>Religion</option>
                                    <option>Social Science</option>
                                </select>
                            </div>
                            <div class="col-10 col-xl-auto col-keywords mb-3">
                                <input class="form-control" type="text" placeholder="Search keywords" />
                            </div>
                            <div class="col-auto col-submit-btn mb-3">
                                <button type="submit" class="btn btn-theme"><i class="fas fa-search m-0"></i></button>
                            </div>
                        </div>
                    </form><!--//course-finder-form-->
                    <a class="read-more" href="courses.html">View all our courses<i class="fas fa-chevron-right"></i></a>
                </div><!--//section-content-->
            </section><!--//course-finder-->
            <section class="video">
                <h1 class="section-heading text-highlight"><span class="line">Video Tour</span></h1>
                <div class="carousel-controls">
                    <a class="prev" href="#videos-carousel" data-bs-slide="prev"><i class="fas fa-caret-left"></i></a>
                    <a class="next" href="#videos-carousel" data-bs-slide="next"><i class="fas fa-caret-right"></i></a>
                </div><!--//carousel-controls-->
                <div class="section-content">
                    <div id="videos-carousel" class="videos-carousel carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item item active">
                                <div class="ratio ratio-16x9 mb-3">
                                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/r9LelXa3U_I?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div><!--//item-->
                            <div class="carousel-item item">
                                <div class="ratio ratio-16x9 mb-3">
                                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/RcGyVTAoXEU?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div><!--//item-->
                            <div class="carousel-item item">
                                <div class="ratio ratio-16x9 mb-3">
                                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/Ks-_Mh1QhMc?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div><!--//item-->
                        </div><!--//carousel-inner-->
                    </div><!--//videos-carousel-->
                    <p class="description">Video desc goes here aenean feugiat a diam tempus sodales. Quisque lorem nulla, ultrices imperdiet malesuada at, suscipit vel lorem.</p>
                </div><!--//section-content-->
            </section><!--//video-->
        </div><!--//col-->
        <div class="col-12 col-xl-3">
            <section class="links">
                <h1 class="section-heading text-highlight"><span class="line">Quick Links</span></h1>
                <div class="section-content">
                    <ul class="custom-list-style ps-0 mb-0">
                        <li><a href="#"><i class="fas fa-caret-right"></i>E-learning Portal</a></li>
                        <li><a href="#"><i class="fas fa-caret-right"></i>Gallery</a></li>
                        <li><a href="#"><i class="fas fa-caret-right"></i>Job Vacancies</a></li>
                        <li class="mb-0"><a href="#"><i class="fas fa-caret-right"></i>Contact</a></li>
                    </ul>
                </div><!--//section-content-->
            </section><!--//links-->
            <section class="testimonials">
                <h1 class="section-heading text-highlight"><span class="line"> Testimonials</span></h1>
                <div class="carousel-controls">
                    <a class="prev" href="#testimonials-carousel" data-bs-slide="prev"><i class="fas fa-caret-left"></i></a>
                    <a class="next" href="#testimonials-carousel" data-bs-slide="next"><i class="fas fa-caret-right"></i></a>
                </div><!--//carousel-controls-->
                <div class="section-content">
                    <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item item active">
                                <blockquote class="quote">
                                    <p><i class="fas fa-quote-left"></i>I’m very happy interdum eget ipsum. Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst. Integer mattis varius ipsum, posuere posuere est porta vel. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.</p>
                                </blockquote>
                                <div class="source">
                                    <p class="people"><span class="name">Marissa Spencer</span><br /><span class="title">Curabitur commodo</span></p>
                                    <img class="profile" src="assets/images/testimonials/profile-1.png" alt="" />
                                </div>
                            </div><!--//item-->
                            <div class="carousel-item item">
                                <blockquote class="quote">
                                    <p><i class="fas fa-quote-left"></i>
                                        I'm very pleased commodo gravida ultrices. Sed massa leo, aliquet non velit eu, volutpat vulputate odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor metus eros, ut fringilla nulla auctor a.</p>
                                </blockquote>
                                <div class="source">
                                    <p class="people"><span class="name">Marco Antonio</span><br /><span class="title"> Gravida ultrices</span></p>
                                    <img class="profile" src="assets/images/testimonials/profile-2.png" alt="" />
                                </div>
                            </div><!--//item-->
                            <div class="carousel-item item">
                                <blockquote class="quote">
                                    <p><i class="fas fa-quote-left"></i>
                                        I'm delighted commodo gravida ultrices. Sed massa leo, aliquet non velit eu, volutpat vulputate odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor metus eros, ut fringilla nulla auctor a.</p>
                                </blockquote>
                                <div class="source">
                                    <p class="people"><span class="name">Kate White</span><br /><span class="title"> Gravida ultrices</span></p>
                                    <img class="profile" src="assets/images/testimonials/profile-3.png" alt="" />
                                </div>
                            </div><!--//item-->

                        </div><!--//carousel-inner-->
                    </div><!--//testimonials-carousel-->
                </div><!--//section-content-->
            </section><!--//testimonials-->
        </div><!--//col-->
    </div><!--//cols-wrapper-->
    <section class="awards">
        <div id="awards-carousel" class="awards-carousel carousel slide" data-bs-ride="carousel" data-bs-interval="10000">

            <div class="carousel-inner my-5">
                <div class="carousel-item item active">
                    <ul class="logos row">

                        <li class="col-md-2 col-4">
                            <a href="#"><img src="assets/images/awards/award1.png" alt="" /></a>
                        </li>
                        <li class="col-md-2 col-4">
                            <a href="#"><img src="assets/images/awards/award2.png" alt="" /></a>
                        </li>
                        <li class="col-md-2 col-4">
                            <a href="#"><img src="assets/images/awards/award3.png" alt="" /></a>
                        </li>
                        <li class="col-md-2 col-4">
                            <a href="#"><img src="assets/images/awards/award4.png" alt="" /></a>
                        </li>
                        <li class="col-md-2 col-4">
                            <a href="#"><img src="assets/images/awards/award5.png" alt="" /></a>
                        </li>
                        <li class="col-md-2 col-4">
                            <a href="#"><img src="assets/images/awards/award6.png" alt="" /></a>
                        </li>
                    </ul><!--//slides-->
                </div><!--//item-->

                <div class="carousel-item item">
                    <ul class="logos row">
                        <li class="col-md-2 col-4">
                            <img src="assets/images/awards/award7.png" alt="" />
                        </li>
                        <li class="col-md-2 col-4">
                            <img src="assets/images/awards/award6.png" alt="" />
                        </li>
                        <li class="col-md-2 col-4">
                            <img src="assets/images/awards/award5.png" alt="" />
                        </li>
                        <li class="col-md-2 col-4">
                            <img src="assets/images/awards/award4.png" alt="" />
                        </li>
                        <li class="col-md-2 col-4">
                            <img src="assets/images/awards/award3.png" alt="" />
                        </li>
                        <li class="col-md-2 col-4">
                            <img src="assets/images/awards/award2.png" alt="" />
                        </li>
                    </ul><!--//slides-->
                </div><!--//item-->
            </div><!--//carousel-inner-->

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#awards-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#awards-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>

            </div><!--//carousel-indicators-->

        </div>
    </section>
    </div>
    </div>

    <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-lg-3 col-12 about">
                        <div class="footer-col-inner">
                            <h3>About</h3>
                            <ul>
                                <li><a href="about.html"><i class="fas fa-caret-right"></i>About us</a></li>
                                <li><a href="contact.html"><i class="fas fa-caret-right"></i>Contact us</a></li>
                                <li><a href="privacy.html"><i class="fas fa-caret-right"></i>Privacy policy</a></li>
                                <li><a href="terms-and-conditions.html"><i class="fas fa-caret-right"></i>Terms & Conditions</a></li>
                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col col-lg-6 col-12 mt-4 mt-lg-0 newsletter">
                        <div class="footer-col-inner">
                            <h3>Join our mailing list</h3>
                            <p>Subscribe to get our weekly newsletter delivered directly to your inbox</p>
                            <form class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter your email" />
                                </div>
                                <input class="btn btn-theme btn-subscribe" type="submit" value="Subscribe">
                            </form>

                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col col-lg-3 col-12 mt-4 mt-lg-0 contact">
                        <div class="footer-col-inner">
                            <h3>Contact us</h3>
                            <div class="row">
                                <p class="adr  col-lg-12 col-md-4 col-12">
                                    <i class="fas fa-map-marker-alt float-start"></i>
                                    <span class="adr-group float-start">
                                        <span class="street-address">College Green</span><br>
                                        <span class="region">56 College Green Road</span><br>
                                        <span class="postal-code">12345-1234</span><br>
                                        <span class="country-name">USA</span>
                                    </span>
                                </p>
                                <p class="tel col-lg-12 col-md-4 col-12"><i class="fas fa-phone"></i>0800 123 4567</p>
                                <p class="email col-lg-12 col-md-4 col-12"><i class="fas fa-envelope"></i><a href="#">enquires@website.com</a></p>
                            </div>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                </div>
            </div>
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <small class="copyright col-lg-6 col-12">Copyright @ <a href="#">yourwebsite.com</a></small>
                    <ul class="social float-end col-lg-6 col-12">
                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li class="row-end"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul><!--//social-->
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->


    <!-- *****CONFIGURE STYLE (REMOVE ON YOUR PRODUCTION SITE)****** -->
    <div id="config-panel" class="config-panel config-panel-hide d-none d-lg-block">
        <div class="panel-inner">
            <a id="config-trigger" class="config-trigger" href="#"><i class="fas fa-cog mx-auto"></i></a>
            <h5 class="panel-title">Choose Color</h5>
            <ul id="color-options" class="list-unstyled list-inline">
                <li class="theme-1 active list-inline-item"><a data-style="assets/css/theme-1.css" data-logo="assets/images/logo.png" href="#"></a></li>
                <li class="theme-2 list-inline-item"><a data-style="assets/css/theme-2.css" data-logo="assets/images/logo-green.png" href="#"></a></li>
                <li class="theme-3 list-inline-item"><a data-style="assets/css/theme-3.css" data-logo="assets/images/logo-purple.png" href="#"></a></li>
                <li class="theme-4 list-inline-item"><a data-style="assets/css/theme-4.css" data-logo="assets/images/logo-red.png" href="#"></a></li>
            </ul><!--//color-options-->
            <a id="config-close" class="close" href="#"><i class="fas fa-times-circle"></i></a>
        </div><!--//panel-inner-->
    </div><!--//configure-panel-->

    <!-- Javascript -->
    <!-- Popper.js -->
    <script type="text/javascript" src="{{ asset('assets/plugins/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Vanilla Back To Top -->
    <script src="{{ asset('assets/plugins/vanilla-back-to-top.min.js') }}"></script>

    <!-- Main JS -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Theme Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script type="text/javascript" src="{{ asset('assets/js/demo/theme-switcher.js') }}"></script>


</body>

<!-- Mirrored from themes.3rdwavemedia.com/college-green/bs5/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Oct 2024 07:58:11 GMT -->

</html>