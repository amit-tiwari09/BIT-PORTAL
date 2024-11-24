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
    <script src="https://kit.fontawesome.com/c9cb99f12f.js" crossorigin="anonymous"></script>



    <style>
        .carousel-caption {
            position: absolute;
            bottom: 20px;
            /* Position the caption at the bottom */
            left: 20px;
            /* Add some padding from the left */
            right: 20px;
            /* Add some padding from the right */
            color: white;
            /* Text color */
            background-color: rgba(51, 51, 51, 0.5);
            /* background-color: rgba(0, 0, 0, 0.7); */
            /* Semi-transparent black background */
            padding: 15px;
            /* Padding around the caption */
            border-radius: 10px;
            /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            /* Shadow for depth */
            display: flex;
            /* Use flexbox for alignment */
            justify-content: space-between;
            /* Space between caption and button */
            align-items: center;
            /* Center items vertically */
        }

        .caption {
            flex: 1;
            /* Allow caption to take available space */
            margin-right: 15px;
            /* Space between caption and button */
        }

        .caption p {
            margin: 5px 0;
            /* Space between paragraphs */
            font-size: 1rem;
            color: whitesmoke;
            /* Font size for description */
        }

        strong {
            color: whitesmoke;
        }

        .btn-attractive {
            background-color: #007bff;
            /* Bootstrap primary color */
            border: none;
            /* No border */
            padding: 10px 15px;
            /* Padding for the button */
            border-radius: 25px;
            /* Rounded corners for the button */
            font-size: 1rem;
            /* Font size for the button */
            font-weight: bold;
            /* Bold button text */
            transition: background-color 0.3s, transform 0.3s;
            /* Smooth transition for hover effect */
            display: inline-flex;
            /* Flexbox for icon and text alignment */
            align-items: center;
            /* Center icon and text vertically */
        }

        .btn-attractive i {
            margin-right: 5px;
            /* Space between icon and text */
        }

        .btn-attractive:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            transform: scale(1.05);
            /* Slightly enlarge button on hover */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .carousel-caption {
                flex-direction: column;
                /* Stack items vertically on small screens */
                align-items: flex-start;
                /* Align items to the start */
            }

            .caption {
                margin-right: 0;
                /* Remove right margin on small screens */
                margin-bottom: 10px;
                /* Space below caption */
            }

            .btn-attractive {
                width: 100%;
                /* Full width button on small screens */
                text-align: center;
                /* Center text in button */
            }
        }




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
            top: 17px;
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

        .thumb {
            height: 90px;
            width: 90px;
            border-radius: 50%;
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
        <div class="section-content">
            <div id="news-carousel" class="news-carousel carousel slide">
                <div class="carousel-inner">
                    @foreach ($newsItems->chunk(3) as $chunk)
                    <div class="item carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $newsItem)
                            <div class="col-lg-4 col-12 news-item">
                                <img class="thumb" src="{{ asset($newsItem->image_path) }}" alt="" />
                                <div class="news-content">
                                    <h2 class="title"><a href="{{ route('blog.show', $newsItem->id) }}">{{ $newsItem->title }}</a></h2>
                                    <p class="author">By {{ $newsItem->Author }}</p>
                                    <p class="excerpt">{{ $newsItem->excerpt }}</p>
                                    <a class="btn btn-primary read-more" style="color: #98ABBB; " href="{{ route('blog.show', $newsItem->id) }}">Read<i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div><!--//news-item-->
                            @endforeach
                        </div><!--//row-->
                    </div><!--//item-->
                    @endforeach
                </div><!--//carousel-inner-->>
            </div><!--//news-carousel-->
        </div><!--//section-content-->
    </section><!--//news-->



    <div class="row cols-wrapper">
        <div class="col-12 col-lg-6 col-xl-3">
            <section class="events">

                <h1 class="section-heading text-highlight"><span class="line">Events</span></h1>
                <div class="section-content">

                    @foreach($events as $event)
                    <div class="event-item">
                        <p class="date-label">
                            <span class="month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                            <span class="date-number">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                        </p>
                        <div class="details">
                            <h2 class="title">{{ $event->title }}</h2>
                            <p class="time">
                                <i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i>{{ $event->location }}
                            </p>

                        </div><!--//details-->
                    </div>
                    @endforeach


                    <a class="read-more" href="{{route('events.index2')}}">All events<i class="fas fa-chevron-right"></i></a>
                </div><!--//section-content-->
            </section><!--//events-->
        </div><!--//col-->



        <div class="col-12 col-lg-6 col-xl-6">

            <section class="video">
                <h1 class="section-heading text-highlight"><span class="line">Gallery</span></h1>
                <div class="carousel-controls">
                    <a class="prev" href="#videos-carousel" data-bs-slide="prev"><i class="fas fa-caret-left"></i></a>
                    <a class="next" href="#videos-carousel" data-bs-slide="next"><i class="fas fa-caret-right"></i></a>
                </div><!--//carousel-controls-->
                <div class="section-content">
                    <div id="videos-carousel" class="videos-carousel carousel slide">
                        <div class="carousel-inner">
                            @foreach($galleries as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="ratio ratio-16x9 mb-3 galleryimg">
                                    <img src="{{ asset($image->image_path) }}" class="embed-responsive-item galleryimg" alt="Image">
                                </div>
                                <div class="carousel-caption">
                                    <div class="caption">
                                        <p><strong>Category:</strong> {{ $image->category ? $image->category->name : 'Uncategorized' }}</p>
                                        <p>{{ $image->description }}</p>
                                        <p>Uploaded by: <strong>{{ $image->uploader_name ?: 'Unknown' }}</strong></p>
                                        <p>Uploaded on: <strong>{{ $image->created_at->format('Y-m-d H:i') }}</strong></p>
                                    </div>
                                    <a href="{{ route('frontgallery')}}" class="btn btn-attractive">
                                        <i class="fas fa-eye"></i> Visit Gallery
                                    </a>
                                </div>
                            </div><!--//item-->
                            @endforeach
                        </div><!--//carousel-inner-->

                    </div><!--//carousel-inner-->
                </div><!--//videos-carousel-->

        </div><!--//section-content-->
        </section><!--//video-->


        <div class="col-12 col-xl-3">
            <section class="links">
                <h1 class="section-heading text-highlight"><span class="line">Quick Links</span></h1>
                <div class="section-content">
                    <ul class="custom-list-style ps-0 mb-0">
                        <li><a href="{{route('videos.index')}}"><i class="fas fa-caret-right"></i>E-learning Portal</a></li>
                        <li><a href="{{route('frontgallery')}}"><i class="fas fa-caret-right"></i>Gallery</a></li>
                        <li><a href="{{route('job-vacancies.index')}}"><i class="fas fa-caret-right"></i>Job Vacancies</a></li>
                        
                    </ul>
                </div><!--//section-content-->
            </section><!--//links-->
            <section class="testimonials">
                <h1 class="section-heading text-highlight"><span class="line">Testimonials</span></h1>
                <div class="carousel-controls">
                    <a class="prev" href="#testimonials-carousel" data-bs-slide="prev"><i class="fas fa-caret-left"></i></a>
                    <a class="next" href="#testimonials-carousel" data-bs-slide="next"><i class="fas fa-caret-right"></i></a>
                </div><!--//carousel-controls-->
                <div class="section-content">
                    <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                        <div class="carousel-inner">
                            @foreach ($testimonials as $index => $testimonial)
                            <div class="carousel-item item {{ $index === 0 ? 'active' : '' }}">
                                <blockquote class="quote">
                                    <p><i class="fas fa-quote-left"></i>{{ $testimonial->content }}</p>
                                </blockquote>
                                <div class="source">
                                    <p class="people">
                                        <span class="name">{{ $testimonial->name }}</span><br />
                                        <span class="title">{{ $testimonial->title }}</span>
                                    </p>
                                    <img class="profile" src="{{ asset('pictures/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" />
                                </div>
                            </div><!--//item-->
                            @endforeach
                        </div><!--//carousel-inner-->
                    </div><!--//testimonials-carousel-->
                </div><!--//section-content-->
            </section><!--//testimonials-->

        </div><!--//col-->



    </div><!--//col-->



    </div><!--//cols-wrapper-->

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
                                @foreach($navLinks as $link)
                                <li><a href="{{ $link->value }}">{{ $link->key }}</a></li>
                                @endforeach

                            </ul>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                    <div class="footer-col col-lg-6 col-12 mt-4 mt-lg-0 newsletter">
                        <div class="footer-col-inner">
                            <h3>Ready to Take the Next Step?</h3>
                            <p>Click the button below to submit your application and start your journey with us.</p>
                            <form class="subscribe-form">

                                <a href="{{route('Applicantsform')}}" class="btn btn-theme btn-subscribe">Apply Now</a>
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
                                        <span class="street-address">{{ $settings['address'] ?? '' }}</span><br>

                                    </span>
                                </p>
                                <p class="tel col-lg-12 col-md-4 col-12"><i class="fas fa-phone"></i>{{ $settings['contact'] ?? '' }}</p>
                                <p class="email col-lg-12 col-md-4 col-12"><i class="fas fa-envelope"></i><a href="#">{{ $settings['email'] ?? '' }}</a></p>
                            </div>
                        </div><!--//footer-col-inner-->
                    </div><!--//foooter-col-->
                </div>
            </div>
        </div><!--//footer-content-->
        <div class="bottom-bar">
            <div class="container">
                <div class="row">

                    <ul class="social float-end col-lg-6 col-12">
                        @foreach($socialMediaLinks as $link)
                        <li style="margin-right: 10px;">
                            <a href="{{ $link->url }}">
                                <img src="{{ asset('pictures/' . $link->image) }}" alt="{{ $link->name }}" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                            </a>
                        </li>
                        @endforeach
                    </ul><!--//social-->
                </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer><!--//footer-->


    <!-- *****CONFIGURE STYLE (REMOVE ON YOUR PRODUCTION SITE)****** -->

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