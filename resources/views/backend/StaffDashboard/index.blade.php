<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from owlio.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2024 11:46:40 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="">
	<meta name="keywords" content="bootstrap, courses, education admin template, educational, instructors, learning, learning admin, learning admin theme, learning application, lessons, lms admin template, lms rails, quizzes ui, school admin">
	<meta name="description" content="Owlio is a clean-coded, responsive HTML template that can be easily customised to fit the needs of various instructors and lms admin template, educational, learning application, lessons, and other businesses.">
	<meta property="og:title" content="Owlio - School Admission Admin Dashboard">
	<meta property="og:description" content="Owlio is a clean-coded, responsive HTML template that can be easily customised to fit the needs of various instructors and lms admin template, educational, learning application, lessons, and other businesses.">
	<meta property="og:image" content="{{asset('images/social-image.png')}}">
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons Icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">

	<!-- Page Title Here -->
	<title>
		staffDashboard
	</title>


	<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
	<link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<a href="index.html" class="brand-logo">
				<svg class="logo-abbr" width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect class="svg-logo-rect" width="54" height="54" rx="27" fill="url(#paint0_linear)" />
					<path d="M23.7487 23.6736C23.7487 25.0896 22.5961 26.2416 21.1793 26.2416C19.764 26.2416 18.6124 25.0896 18.6124 23.6736C18.6124 22.2567 19.764 21.1041 21.1793 21.1041C22.5961 21.1041 23.7487 22.2567 23.7487 23.6736ZM32.8168 21.1042C31.4015 21.1042 30.2499 22.2569 30.2499 23.6737C30.2499 25.0897 31.4015 26.2417 32.8168 26.2417C34.2336 26.2417 35.3862 25.0897 35.3862 23.6737C35.3862 22.2569 34.2336 21.1042 32.8168 21.1042ZM26.0079 36.8042L26.0286 42.6348C24.5259 42.6975 23.4593 42.5364 23.4593 42.5364V36.8055C23.4593 36.2557 23.013 35.8094 22.4632 35.8094C21.9133 35.8094 21.4671 36.2557 21.4671 36.8055V42.0574C18.1887 40.9111 15.8626 38.1857 15.852 35.0374V27.7139C14.9984 26.5905 14.491 25.1903 14.491 23.6736C14.491 22.3807 14.8599 21.1726 15.4973 20.1483L15.4931 12.3799C15.6563 11.1516 16.7925 11.3617 16.7925 11.3617L23.1379 13.9239C24.3426 13.4452 25.6554 13.1819 27.0287 13.1819C28.3907 13.1819 29.6932 13.4411 30.8898 13.9127L37.2075 11.3617C37.2075 11.3617 38.3438 11.1516 38.5069 12.3799L38.5028 20.1486C39.1402 21.1729 39.5091 22.3809 39.5091 23.6736C39.5091 25.1893 39.0022 26.5886 38.1495 27.7117V35.1389C38.155 36.9361 37.4102 38.6757 36.0524 40.0375C36.0524 40.0375 34.7582 41.4527 32.533 42.1947V36.8055C32.533 36.2557 32.0874 35.8094 31.5369 35.8094C30.9871 35.8094 30.5408 36.2557 30.5408 36.8055V42.605C29.8565 42.6794 28.0202 42.6348 28.0202 42.6348L28.0001 36.8068C28.0008 36.257 27.5552 35.8101 27.0054 35.8094C27.0053 35.8094 26.1004 35.8061 26.0079 36.8042ZM25.8788 23.6736C25.8788 21.0829 23.7706 18.9752 21.1793 18.9752C18.5898 18.9752 16.4831 21.0829 16.4831 23.6736C16.4831 26.2642 18.5898 28.3719 21.1793 28.3719C23.7706 28.3719 25.8788 26.2642 25.8788 23.6736ZM27.8489 32.902L30.6503 30.0032C29.097 29.4697 27.8002 28.3799 26.999 26.9729C26.207 28.364 24.9304 29.4448 23.4006 29.9846L26.5748 32.9355C26.5748 32.9355 27.1871 33.4418 27.8489 32.902ZM37.5169 23.6736C37.5169 21.0829 35.4097 18.9752 32.8196 18.9752C30.2278 18.9752 28.1192 21.0829 28.1192 23.6736C28.1192 26.2642 30.2278 28.3719 32.8196 28.3719C35.4097 28.3719 37.5169 26.2642 37.5169 23.6736Z" fill="white" />
					<defs>
						<linearGradient id="paint0_linear" x1="27" y1="0" x2="45.6923" y2="64.9038" gradientUnits="userSpaceOnUse">
							<stop offset="0" stop-color="#1E33F2" />
							<stop offset="1" stop-color="#1EE5F2" />
						</linearGradient>
					</defs>
				</svg>
				<svg class="brand-title" width="88" height="26" viewBox="0 0 88 26" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path class="svg-logo-title" d="M8.98401 25.3839C7.29868 25.3839 5.78401 25.0106 4.44001 24.2639C3.09601 23.5173 2.02935 22.4933 1.24001 21.1919C0.472013 19.8906 0.0880127 18.4293 0.0880127 16.8079C0.0880127 15.1653 0.472013 13.7039 1.24001 12.4239C2.02935 11.1226 3.09601 10.0986 4.44001 9.35195C5.78401 8.58395 7.29868 8.19995 8.98401 8.19995C10.6693 8.19995 12.1733 8.58395 13.496 9.35195C14.84 10.0986 15.896 11.1226 16.664 12.4239C17.4533 13.7039 17.848 15.1653 17.848 16.8079C17.848 18.4293 17.4533 19.8906 16.664 21.1919C15.896 22.4933 14.84 23.5173 13.496 24.2639C12.152 25.0106 10.648 25.3839 8.98401 25.3839ZM8.98401 21.0639C9.77335 21.0639 10.456 20.872 11.032 20.4879C11.608 20.1039 12.056 19.5919 12.376 18.9519C12.696 18.3119 12.856 17.5866 12.856 16.7759C12.856 15.9866 12.696 15.2719 12.376 14.6319C12.056 13.9919 11.608 13.4799 11.032 13.0959C10.456 12.7119 9.77335 12.5199 8.98401 12.5199C8.19468 12.5199 7.50135 12.7119 6.90401 13.0959C6.32801 13.4799 5.88001 13.9919 5.56001 14.6319C5.24001 15.2719 5.08001 15.9866 5.08001 16.7759C5.08001 17.5866 5.24001 18.3119 5.56001 18.9519C5.88001 19.5919 6.32801 20.1039 6.90401 20.4879C7.50135 20.872 8.19468 21.0639 8.98401 21.0639Z" fill="#40415C" />
					<path class="svg-logo-title" d="M27.1615 25.3839C26.0308 25.3839 24.9748 25.1599 23.9935 24.7119C23.0335 24.2639 22.2548 23.5813 21.6575 22.6639C21.0815 21.7466 20.7935 20.5946 20.7935 19.2079V8.58395H25.7535V19.8479C25.7535 20.1039 25.8175 20.3386 25.9455 20.5519C26.0735 20.7653 26.2442 20.9359 26.4575 21.0639C26.6708 21.1919 26.9055 21.2559 27.1615 21.2559C27.4175 21.2559 27.6522 21.1919 27.8655 21.0639C28.0788 20.9359 28.2495 20.7653 28.3775 20.5519C28.5055 20.3386 28.5695 20.1039 28.5695 19.8479V14.3759C28.5695 13.0533 28.8468 11.9333 29.4015 11.0159C29.9562 10.0986 30.7135 9.40528 31.6735 8.93595C32.6548 8.44528 33.7535 8.19995 34.9695 8.19995C36.1855 8.19995 37.2735 8.44528 38.2335 8.93595C39.1935 9.40528 39.9508 10.0986 40.5055 11.0159C41.0602 11.9333 41.3375 13.0533 41.3375 14.3759V19.8479C41.3375 20.1039 41.4015 20.3386 41.5295 20.5519C41.6575 20.7653 41.8282 20.9359 42.0415 21.0639C42.2762 21.1919 42.5215 21.2559 42.7775 21.2559C43.0335 21.2559 43.2682 21.1919 43.4815 21.0639C43.6948 20.9359 43.8655 20.7653 43.9935 20.5519C44.1215 20.3386 44.1855 20.1039 44.1855 19.8479V8.58395H49.1455V19.2079C49.1455 20.5946 48.8468 21.7466 48.2495 22.6639C47.6735 23.5813 46.8948 24.2639 45.9135 24.7119C44.9535 25.1599 43.9082 25.3839 42.7775 25.3839C41.6468 25.3839 40.5908 25.1599 39.6095 24.7119C38.6495 24.2639 37.8708 23.5813 37.2735 22.6639C36.6762 21.7466 36.3775 20.5946 36.3775 19.2079V13.7679C36.3775 13.4906 36.3135 13.2453 36.1855 13.0319C36.0575 12.8186 35.8868 12.6479 35.6735 12.5199C35.4602 12.3919 35.2255 12.3279 34.9695 12.3279C34.7135 12.3279 34.4682 12.3919 34.2335 12.5199C34.0202 12.6479 33.8495 12.8186 33.7215 13.0319C33.5935 13.2453 33.5295 13.4906 33.5295 13.7679V19.2079C33.5295 20.5946 33.2308 21.7466 32.6335 22.6639C32.0575 23.5813 31.2788 24.2639 30.2975 24.7119C29.3375 25.1599 28.2922 25.3839 27.1615 25.3839Z" fill="#40415C" />
					<path class="svg-logo-title" d="M52.856 24.9999V1.63995H57.816V24.9999H52.856Z" fill="#40415C" />
					<path class="svg-logo-title" d="M61.481 24.9999V8.58395H66.473V24.9999H61.481ZM63.977 6.72795C63.1877 6.72795 62.505 6.43995 61.929 5.86395C61.353 5.28795 61.065 4.60528 61.065 3.81595C61.065 3.02661 61.353 2.34395 61.929 1.76795C62.505 1.17061 63.1877 0.871948 63.977 0.871948C64.7663 0.871948 65.449 1.17061 66.025 1.76795C66.601 2.34395 66.889 3.02661 66.889 3.81595C66.889 4.60528 66.601 5.28795 66.025 5.86395C65.449 6.43995 64.7663 6.72795 63.977 6.72795Z" fill="#40415C" />
					<path class="svg-logo-title" d="M78.234 25.3839C76.5487 25.3839 75.034 25.0106 73.69 24.2639C72.346 23.5173 71.2794 22.4933 70.49 21.1919C69.722 19.8906 69.338 18.4293 69.338 16.8079C69.338 15.1653 69.722 13.7039 70.49 12.4239C71.2794 11.1226 72.346 10.0986 73.69 9.35195C75.034 8.58395 76.5487 8.19995 78.234 8.19995C79.9193 8.19995 81.4233 8.58395 82.746 9.35195C84.09 10.0986 85.146 11.1226 85.914 12.4239C86.7034 13.7039 87.098 15.1653 87.098 16.8079C87.098 18.4293 86.7034 19.8906 85.914 21.1919C85.146 22.4933 84.09 23.5173 82.746 24.2639C81.402 25.0106 79.898 25.3839 78.234 25.3839ZM78.234 21.0639C79.0233 21.0639 79.706 20.872 80.282 20.4879C80.858 20.1039 81.306 19.5919 81.626 18.9519C81.946 18.3119 82.106 17.5866 82.106 16.7759C82.106 15.9866 81.946 15.2719 81.626 14.6319C81.306 13.9919 80.858 13.4799 80.282 13.0959C79.706 12.7119 79.0233 12.5199 78.234 12.5199C77.4447 12.5199 76.7514 12.7119 76.154 13.0959C75.578 13.4799 75.13 13.9919 74.81 14.6319C74.49 15.2719 74.33 15.9866 74.33 16.7759C74.33 17.5866 74.49 18.3119 74.81 18.9519C75.13 19.5919 75.578 20.1039 76.154 20.4879C76.7514 20.872 77.4447 21.0639 78.234 21.0639Z" fill="#40415C" />
				</svg>
			</a>

			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
											<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<circle fill="#000000" cx="5" cy="12" r="2" />
											<circle fill="#000000" cx="12" cy="12" r="2" />
											<circle fill="#000000" cx="19" cy="12" r="2" />
										</g>
									</svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Archie Parker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('images/avatar/2.jpg')}}" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Alfie Mason</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('images/avatar/3.jpg')}}" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('images/avatar/4.jpg')}}" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">B</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('images/avatar/5.jpg')}}" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Bashid Samim</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="{{asset('images/avatar/1.jpg')}}" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Breddie Ronan</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Ceorge Carson</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">D</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Darry Parker</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Denry Hunter</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">J</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Jack Ronan</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Jacob Tucker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>James Logan</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Joshua Weston</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">O</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oliver Acker</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt="">
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oscar Weston</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="card chat dz-chat-history-box d-none">
							<div class="card-header chat-list-header text-center">
								<a href="#" class="dz-chat-history-back">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" />
											<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
										</g>
									</svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" cx="5" cy="12" r="2" />
												<circle fill="#000000" cx="12" cy="12" r="2" />
												<circle fill="#000000" cx="19" cy="12" r="2" />
											</g>
										</svg></a>
									<ul class="dropdown-menu dropdown-menu-end">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="">
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, today</span>
									</div>
								</div>
							</div>
							<div class="card-footer type_msg">
								<div class="input-group">
									<textarea class="form-control" placeholder="Type your message..."></textarea>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<circle fill="#000000" cx="5" cy="12" r="2" />
											<circle fill="#000000" cx="12" cy="12" r="2" />
											<circle fill="#000000" cx="19" cy="12" r="2" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">SEVER STATUS</li>
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">KK</div>
											<div class="user_info">
												<span>David Nester Birthday</span>
												<p class="text-primary">today</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SOCIAL</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
											<div class="user_info">
												<span>Perfection Simplified</span>
												<p>Jame Smith commented on your status</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SEVER STATUS</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
					<div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
											<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>john just buy your product..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								<div class="input-group search-area d-lg-inline-flex d-none me-5">
									<span class="input-group-text" id="header-search">
										<a href="javascript:void(0);">
											<i class="flaticon-381-search-2"></i>
										</a>
									</span>
									<input type="text" class="form-control" placeholder="Search here" aria-label="Username" aria-describedby="header-search">
								</div>

							</div>
						</div>
						<ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
									<i id="icon-light" class="fas fa-sun"></i>
									<i id="icon-dark" class="fas fa-moon"></i>

								</a>
							</li>
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M25.4707 19.1862L23.3333 15.9802V11.6667C23.3333 9.19135 22.35 6.81738 20.5997 5.06704C18.8493 3.3167 16.4753 2.33337 14 2.33337C11.5246 2.33337 9.15066 3.3167 7.40033 5.06704C5.64999 6.81738 4.66666 9.19135 4.66666 11.6667V15.9802L2.52932 19.1862C2.41256 19.362 2.34562 19.5661 2.33561 19.7769C2.32559 19.9877 2.37288 20.1972 2.47245 20.3833C2.57201 20.5693 2.72013 20.7249 2.90106 20.8335C3.08199 20.9421 3.28897 20.9997 3.49999 21H24.5C24.711 20.9997 24.918 20.9421 25.0989 20.8335C25.2798 20.7249 25.428 20.5693 25.5275 20.3833C25.6271 20.1972 25.6744 19.9877 25.6644 19.7769C25.6544 19.5661 25.5874 19.362 25.4707 19.1862Z" fill="#A5A5A5" />
										<path d="M14 25.6666C15.0344 25.6675 16.0397 25.324 16.8572 24.6903C17.6748 24.0565 18.258 23.1686 18.515 22.1666H9.485C9.74197 23.1686 10.3252 24.0565 11.1428 24.6903C11.9603 25.324 12.9656 25.6675 14 25.6666Z" fill="#A5A5A5" />
									</svg>

									<span class="badge light text-white bg-primary rounded-circle">4</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="dlab_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.33334 23.3333C2.33611 24.2607 2.70575 25.1493 3.36153 25.8051C4.01731 26.4609 4.90594 26.8305 5.83334 26.8333H12.8333V15.1666H2.33334V23.3333Z" fill="#A5A5A5" />
										<path d="M15.1667 26.8333H22.1667C23.0941 26.8305 23.9827 26.4609 24.6385 25.8051C25.2942 25.1493 25.6639 24.2607 25.6667 23.3333V15.1666H15.1667V26.8333Z" fill="#A5A5A5" />
										<path d="M23.3333 5.83329H19.6233C19.7646 5.46066 19.8358 5.06513 19.8333 4.66663C19.8305 3.73922 19.4609 2.85059 18.8051 2.19481C18.1494 1.53903 17.2607 1.1694 16.3333 1.16663C15.4694 1.16888 14.6373 1.49337 14 2.07663C13.3626 1.49337 12.5306 1.16888 11.6667 1.16663C10.7392 1.1694 9.85062 1.53903 9.19484 2.19481C8.53906 2.85059 8.16942 3.73922 8.16665 4.66663C8.16417 5.06513 8.23537 5.46066 8.37665 5.83329H4.66665C3.73925 5.83606 2.85062 6.2057 2.19484 6.86148C1.53906 7.51726 1.16943 8.40589 1.16666 9.33329V11.6666C1.16666 11.976 1.28957 12.2728 1.50837 12.4916C1.72716 12.7104 2.0239 12.8333 2.33332 12.8333H12.8333V5.83329H11.6667C11.4359 5.83329 11.2103 5.76487 11.0185 5.63667C10.8266 5.50848 10.6771 5.32627 10.5888 5.11309C10.5005 4.89991 10.4774 4.66533 10.5224 4.43902C10.5674 4.21271 10.6785 4.00483 10.8417 3.84167C11.0049 3.67851 11.2127 3.56739 11.439 3.52238C11.6654 3.47736 11.8999 3.50046 12.1131 3.58877C12.3263 3.67707 12.5085 3.8266 12.6367 4.01846C12.7649 4.21032 12.8333 4.43588 12.8333 4.66663V5.83329H15.1666V4.66663C15.1666 4.43588 15.2351 4.21032 15.3633 4.01846C15.4915 3.8266 15.6737 3.67707 15.8869 3.58877C16.1 3.50046 16.3346 3.47736 16.5609 3.52238C16.7872 3.56739 16.9951 3.67851 17.1583 3.84167C17.3214 4.00483 17.4325 4.21271 17.4776 4.43902C17.5226 4.66533 17.4995 4.89991 17.4112 5.11309C17.3229 5.32627 17.1733 5.50848 16.9815 5.63667C16.7896 5.76487 16.5641 5.83329 16.3333 5.83329H15.1666V12.8333H25.6666C25.9761 12.8333 26.2728 12.7104 26.4916 12.4916C26.7104 12.2728 26.8333 11.976 26.8333 11.6666V9.33329C26.8305 8.40589 26.4609 7.51726 25.8051 6.86148C25.1493 6.2057 24.2607 5.83606 23.3333 5.83329Z" fill="#A5A5A5" />
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">2</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end rounded">
									<div id="DZ_W_TimeLine11Home" class="widget-timeline dz-scroll style-1 p-3 height370">
										<ul class="timeline">
											<li>
												<div class="timeline-badge primary"></div>
												<a class="timeline-panel text-muted" href="#">
													<span>10 minutes ago</span>
													<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge info">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>20 minutes ago</span>
													<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
													<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
												</a>
											</li>
											<li>
												<div class="timeline-badge danger">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>30 minutes ago</span>
													<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge success">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>15 minutes ago</span>
													<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge warning">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge dark">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link bell bell-link" href="javascript:void(0)">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3334 9.33329V16.3333C23.3313 18.1892 22.5932 19.9685 21.2808 21.2808C19.9685 22.5931 18.1892 23.3313 16.3334 23.3333H9.33335C9.02393 23.3333 8.72719 23.4562 8.5084 23.675C8.2896 23.8938 8.16669 24.1905 8.16669 24.5C8.16669 24.8094 8.2896 25.1061 8.5084 25.3249C8.72719 25.5437 9.02393 25.6666 9.33335 25.6666H16.3334C18.8078 25.6638 21.1802 24.6795 22.9299 22.9298C24.6796 21.1801 25.6638 18.8078 25.6667 16.3333V9.33329C25.6667 9.02387 25.5438 8.72713 25.325 8.50833C25.1062 8.28954 24.8094 8.16663 24.5 8.16663C24.1906 8.16663 23.8939 8.28954 23.6751 8.50833C23.4563 8.72713 23.3334 9.02387 23.3334 9.33329Z" fill="#A5A5A5" />
										<path d="M16.3333 22.1667C17.8799 22.1649 19.3626 21.5497 20.4561 20.4562C21.5497 19.3626 22.1649 17.8799 22.1667 16.3334V8.16671C22.1649 6.62017 21.5497 5.1375 20.4561 4.04393C19.3626 2.95036 17.8799 2.3352 16.3333 2.33337H8.16668C6.62014 2.3352 5.13747 2.95036 4.0439 4.04393C2.95033 5.1375 2.33517 6.62017 2.33334 8.16671V16.3334C2.33517 17.8799 2.95033 19.3626 4.0439 20.4562C5.13747 21.5497 6.62014 22.1649 8.16668 22.1667H16.3333ZM9.11168 10.9832L10.603 13.0454L15.5408 8.47669C15.7681 8.26653 16.0695 8.15525 16.3788 8.16733C16.6881 8.17941 16.9799 8.31385 17.19 8.54109C17.4002 8.76833 17.5115 9.06974 17.4994 9.37903C17.4873 9.68831 17.3529 9.98013 17.1256 10.1903L11.2218 15.652C11.1007 15.7641 10.9571 15.8491 10.8006 15.9016C10.6442 15.954 10.4783 15.9727 10.3141 15.9563C10.1499 15.94 9.99103 15.889 9.84799 15.8067C9.70495 15.7244 9.58099 15.6127 9.48431 15.4789L7.22168 12.3503C7.04949 12.0993 6.98221 11.7909 7.0342 11.491C7.08619 11.1911 7.25333 10.9234 7.49996 10.745C7.74658 10.5666 8.05317 10.4916 8.35428 10.5361C8.65539 10.5806 8.92719 10.7411 9.11168 10.9832Z" fill="#A5A5A5" />
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">6</span>
								</a>
							</li>
							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
									<img src="images/profile/pic1.jpg" width="20" alt="" class="rounded-circle">
									<div class="header-info">
										<span>name</span>
										<small>role</small>
									</div>
									<i class="fa fa-caret-down ms-3 me-2 " aria-hidden="true"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="{{route('app.profile')}}" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="email-inbox.html" class="dropdown-item ai-icon">
										<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
											<polyline points="22,6 12,13 2,6"></polyline>
										</svg>
										<span class="ms-2">Inbox </span>
									</a>
									 <form action="{{ route('logout') }}" method="POST" class="dropdown-item ai-icon">
										@csrf
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
										<button type="submit" class="ms-2">Logout </span>
									</form> 

									
								</div>
							</li>
							<li class="nav-item lenguage-btn">
								<select class="form-control btn-head default-select me-3">
									<option>EN</option>
									<option>SP</option>
									<option>GER</option>
									<option>FREN</option>
								</select>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<div class="deznav">
			<div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="index.html">Dashboard Light</a></li>
							<li><a href="index-2.html">Dashboard Dark</a></li>
							<li><a href="student.html">Students</a></li>
							<li><a href="teachers.html">Teacher</a></li>
							<li><a href="events.html">Events</a></li>
							<li><a href="finance.html">Finance</a></li>
							<li><a href="food.html">Food</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-050-info"></i>
							<span class="nav-text">Apps</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="app-profile.html">Profile</a></li>
							<li><a href="post-details.html">Post Details</a></li>
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
								<ul aria-expanded="false">
									<li><a href="email-compose.html">Compose</a></li>
									<li><a href="email-inbox.html">Inbox</a></li>
									<li><a href="email-read.html">Read</a></li>
								</ul>
							</li>
							<li><a href="app-calender.html">Calendar</a></li>
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
								<ul aria-expanded="false">
									<li><a href="ecom-product-grid.html">Product Grid</a></li>
									<li><a href="ecom-product-list.html">Product List</a></li>
									<li><a href="ecom-product-detail.html">Product Details</a></li>
									<li><a href="ecom-product-order.html">Order</a></li>
									<li><a href="ecom-checkout.html">Checkout</a></li>
									<li><a href="ecom-invoice.html">Invoice</a></li>
									<li><a href="ecom-customers.html">Customers</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text">Charts</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="chart-flot.html">Flot</a></li>
							<li><a href="chart-morris.html">Morris</a></li>
							<li><a href="chart-chartjs.html">Chartjs</a></li>
							<li><a href="chart-chartist.html">Chartist</a></li>
							<li><a href="chart-sparkline.html">Sparkline</a></li>
							<li><a href="chart-peity.html">Peity</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Bootstrap</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="ui-accordion.html">Accordion</a></li>
							<li><a href="ui-alert.html">Alert</a></li>
							<li><a href="ui-badge.html">Badge</a></li>
							<li><a href="ui-button.html">Button</a></li>
							<li><a href="ui-modal.html">Modal</a></li>
							<li><a href="ui-button-group.html">Button Group</a></li>
							<li><a href="ui-list-group.html">List Group</a></li>
							<li><a href="ui-media-object.html">Media Object</a></li>
							<li><a href="ui-card.html">Cards</a></li>
							<li><a href="ui-carousel.html">Carousel</a></li>
							<li><a href="ui-dropdown.html">Dropdown</a></li>
							<li><a href="ui-popover.html">Popover</a></li>
							<li><a href="ui-progressbar.html">Progressbar</a></li>
							<li><a href="ui-tab.html">Tab</a></li>
							<li><a href="ui-typography.html">Typography</a></li>
							<li><a href="ui-pagination.html">Pagination</a></li>
							<li><a href="ui-grid.html">Grid</a></li>

						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-045-heart"></i>
							<span class="nav-text">Plugins</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="uc-select2.html">Select 2</a></li>
							<li><a href="uc-nestable.html">Nestedable</a></li>
							<li><a href="uc-noui-slider.html">Noui Slider</a></li>
							<li><a href="uc-sweetalert.html">Sweet Alert</a></li>
							<li><a href="uc-toastr.html">toastr</a></li>
							<li><a href="map-jqvmap.html">Jqv Map</a></li>
							<li><a href="uc-lightgallery.html">Light Gallery</a></li>
						</ul>
					</li>
					<li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-013-checkmark"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-072-printer"></i>
							<span class="nav-text">Forms</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="form-element.html">Form Elements</a></li>
							<li><a href="form-wizard.html">Wizard</a></li>
							<li><a href="form-editor-summernote.html">Summernote</a></li>
							<li><a href="form-pickers.html">Pickers</a></li>
							<li><a href="form-validation-jquery.html">Jquery Validate</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-043-menu"></i>
							<span class="nav-text">Table</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
							<li><a href="table-datatable-basic.html">Datatable</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Pages</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="page-register.html">Register</a></li>
							<li><a href="page-login.html">Login</a></li>
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
								<ul aria-expanded="false">
									<li><a href="page-error-400.html">Error 400</a></li>
									<li><a href="page-error-403.html">Error 403</a></li>
									<li><a href="page-error-404.html">Error 404</a></li>
									<li><a href="page-error-500.html">Error 500</a></li>
									<li><a href="page-error-503.html">Error 503</a></li>
								</ul>
							</li>
							<li><a href="page-lock-screen.html">Lock Screen</a></li>
						</ul>
					</li>
				</ul>
				<div class="drum-box">
					<img src="images/ellipse5.png" alt="">
					<p class="fs-18 font-w500 mb-4">Auto Generate Admission Report</p>
					<a class="" href="javascript:void(0);"><i class="fa fa-long-arrow-right"></i>
					</a>
				</div>
				<div class="copyright">
					<p><strong>Owlio School Admission Admin </strong> © 2023 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
				</div>
			</div>
		</div>
		<!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">
				<div class="form-head d-flex flex-wrap mb-sm-4 mb-3 align-items-center">
					<div class="me-auto  d-lg-block mb-3">
						<h2 class="text-black mb-0 font-w700">Dashboard</h2>
						<p class="mb-0">Lorem ipsum dolor sit amet </p>
					</div>
					<div class="dropdown custom-dropdown mb-3">
						<div class="btn btn-sm date-ds-btn btn-rounded d-flex align-items-center svg-btn me-3" data-bs-toggle="dropdown">
							<svg class="primary-icon" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.1669 5.83362H21.0003V3.50028C21.0003 3.19087 20.8773 2.89412 20.6585 2.67533C20.4398 2.45653 20.143 2.33362 19.8336 2.33362C19.5242 2.33362 19.2274 2.45653 19.0086 2.67533C18.7898 2.89412 18.6669 3.19087 18.6669 3.50028V5.83362H9.33359V3.50028C9.33359 3.19087 9.21067 2.89412 8.99188 2.67533C8.77309 2.45653 8.47634 2.33362 8.16692 2.33362C7.8575 2.33362 7.56076 2.45653 7.34196 2.67533C7.12317 2.89412 7.00025 3.19087 7.00025 3.50028V5.83362H5.83359C4.90533 5.83362 4.01509 6.20237 3.35871 6.85874C2.70234 7.51512 2.33359 8.40536 2.33359 9.33362V10.5003H25.6669V9.33362C25.6669 8.40536 25.2982 7.51512 24.6418 6.85874C23.9854 6.20237 23.0952 5.83362 22.1669 5.83362Z" fill="#1E33F2" />
								<path d="M2.33359 22.1669C2.33359 23.0952 2.70234 23.9854 3.35871 24.6418C4.01509 25.2982 4.90533 25.6669 5.83359 25.6669H22.1669C23.0952 25.6669 23.9854 25.2982 24.6418 24.6418C25.2982 23.9854 25.6669 23.0952 25.6669 22.1669V12.8336H2.33359V22.1669Z" fill="#1E33F2" />
							</svg>
							<div class="text-start ms-3">
								<span class="d-block font-w700">Change period</span>
								<small class="d-block">August 28th - October 28th, 2021</small>
							</div>
							<i class="fa fa-caret-down scale5 ms-3"></i>
						</div>
						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="#">October 29th - November 29th, 2021</a>
							<a class="dropdown-item" href="#">July 27th - Auguts 27th, 2021</a>
						</div>
					</div>
					<form action="{{route('applicants.details')}}" method="POST">
						@csrf
						<button type="submit" data-bs-toggle="modal"  class="btn btn-primary btn-rounded mb-3"><i class="fa fa-user-plus me-3"></i>New Applicants</button>
					</form>
					<!-- Add Order -->
					<div class="modal fade" id="addOrderModal">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Project</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label class="text-black font-w500">Project Name</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label class="text-black font-w500">Dadeline</label>
											<input type="date" class="form-control">
										</div>
										<div class="form-group">
											<label class="text-black font-w500">Client Name</label>
											<input type="text" class="form-control">
										</div>

									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card card-bx">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body me-3">
										<h2 class="text-black font-w700">no of student </h2>
										<p class="mb-0 text-black font-w600">total Students</p>
										<span><b class="text-success me-1">+0,5%</b>than last month</span>
									</div>
									<div class="d-inline-block">
										<svg class="primary-icon" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M57.4998 47.5001C57.4998 48.1631 57.2364 48.799 56.7676 49.2678C56.2987 49.7367 55.6629 50.0001 54.9998 50.0001H24.9998C24.3368 50.0001 23.7009 49.7367 23.2321 49.2678C22.7632 48.799 22.4998 48.1631 22.4998 47.5001C22.4998 43.5218 24.0802 39.7065 26.8932 36.8935C29.7063 34.0804 33.5216 32.5001 37.4998 32.5001H42.4998C46.4781 32.5001 50.2934 34.0804 53.1064 36.8935C55.9195 39.7065 57.4998 43.5218 57.4998 47.5001ZM39.9998 10.0001C38.022 10.0001 36.0886 10.5866 34.4441 11.6854C32.7996 12.7842 31.5179 14.346 30.761 16.1732C30.0041 18.0005 29.8061 20.0112 30.192 21.951C30.5778 23.8908 31.5302 25.6726 32.9288 27.0711C34.3273 28.4697 36.1091 29.4221 38.0489 29.8079C39.9887 30.1938 41.9994 29.9957 43.8267 29.2389C45.6539 28.482 47.2157 27.2003 48.3145 25.5558C49.4133 23.9113 49.9998 21.9779 49.9998 20.0001C49.9998 17.3479 48.9463 14.8044 47.0709 12.929C45.1955 11.0536 42.652 10.0001 39.9998 10.0001ZM17.4998 10.0001C15.522 10.0001 13.5886 10.5866 11.9441 11.6854C10.2996 12.7842 9.0179 14.346 8.26102 16.1732C7.50415 18.0005 7.30611 20.0112 7.69197 21.951C8.07782 23.8908 9.03022 25.6726 10.4287 27.0711C11.8273 28.4697 13.6091 29.4221 15.5489 29.8079C17.4887 30.1938 19.4994 29.9957 21.3267 29.2389C23.1539 28.482 24.7157 27.2003 25.8145 25.5558C26.9133 23.9113 27.4998 21.9779 27.4998 20.0001C27.4998 17.3479 26.4463 14.8044 24.5709 12.929C22.6955 11.0536 20.152 10.0001 17.4998 10.0001ZM17.4998 47.5001C17.4961 44.8741 18.0135 42.2735 19.0219 39.8489C20.0304 37.4242 21.5099 35.2238 23.3748 33.3751C21.8487 32.7989 20.2311 32.5025 18.5998 32.5001H16.3998C12.7153 32.5067 9.18366 33.9733 6.57833 36.5786C3.97301 39.1839 2.50643 42.7156 2.49982 46.4001V47.5001C2.49982 48.1631 2.76321 48.799 3.23205 49.2678C3.70089 49.7367 4.33678 50.0001 4.99982 50.0001H17.9498C17.6588 49.1984 17.5066 48.3529 17.4998 47.5001Z" fill="#1E33F2" />
										</svg>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card card-bx">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body me-3">


										<h2 class="text-black font-w700">no of staff</h2>
										<p class="mb-0 text-black font-w600">total Teachers</p>
										<span><b class="text-danger me-1">-2%</b>than last month</span>
									</div>
									<div class="d-inline-block">
										<svg class="primary-icon" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M59.0284 17.8807L30.7862 3.81817C30.2918 3.57103 29.7082 3.57103 29.2138 3.81817L0.971602 17.8807C0.375938 18.1794 0 18.787 0 19.4531C0 20.1192 0.375938 20.7268 0.971602 21.0255L29.2138 35.088C29.4609 35.2116 29.7305 35.2734 30 35.2734C30.2695 35.2734 30.5391 35.2116 30.7862 35.088L59.0284 21.0255C59.6241 20.7268 60 20.1192 60 19.4531C60 18.787 59.6241 18.1794 59.0284 17.8807Z" fill="#1E33F2" />
											<path d="M56.4844 46.1441V26.2285L52.9688 27.9863V46.1441C50.9271 46.8722 49.4531 48.805 49.4531 51.0937V54.6093C49.4531 55.5809 50.2393 56.3671 51.2109 56.3671H58.2422C59.2138 56.3671 60 55.5809 60 54.6093V51.0937C60 48.805 58.526 46.8722 56.4844 46.1441Z" fill="#1E33F2" />
											<path d="M32.3586 38.2329C31.6308 38.5967 30.8154 38.789 30 38.789C29.1846 38.789 28.3692 38.5967 27.6414 38.2329L10.5469 29.7441V33.5156C10.5469 40.4147 19.1578 45.8203 30 45.8203C40.8422 45.8203 49.4531 40.4147 49.4531 33.5156V29.7441L32.3586 38.2329Z" fill="#1E33F2" />
										</svg>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="d-inline-block position-relative donut-chart-sale me-4">
										<span class="donut2" data-peity='{ "fill": ["rgb(246, 67, 67, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>5/8</span>
										<small class="text-black">62%</small>
									</div>
									<div class="media-body ">
										<h2 class="fs-36 text-black font-w700">887</h2>
										<p class="fs-18 mb-0 text-black font-w500">Events</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="media align-items-center">
									<div class="d-inline-block position-relative donut-chart-sale me-4">
										<span class="donut2" data-peity='{ "fill": ["rgb(30, 51, 242, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>3/8</span>
										<small class="text-black">38%</small>
									</div>
									<div class="media-body me-3">
										<h2 class="fs-36 text-black font-w700">175</h2>
										<p class="fs-18 mb-0 text-black font-w500">Foods</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-sm-flex d-block pb-0 border-0">
										<div class="me-auto pe-3">
											<h4 class="text-black fs-24 font-w700">School Finance</h4>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<select class="form-control style-1 default-select me-3">
												<option>Daily</option>
												<option>Weekly</option>
												<option>Monthly</option>
											</select>
											<div class="dropdown c-pointer ">
												<div class="btn-link" data-bs-toggle="dropdown">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<circle fill="#000000" cx="12" cy="5" r="2"></circle>
															<circle fill="#000000" cx="12" cy="12" r="2"></circle>
															<circle fill="#000000" cx="12" cy="19" r="2"></circle>
														</g>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-end">
													<a class="dropdown-item" href="javascript:void(0);">View Detail</a>
													<a class="dropdown-item" href="javascript:void(0);">Edit</a>
													<a class="dropdown-item" href="javascript:void(0);">Delete</a>
												</div>
											</div>
										</div>
									</div>

									<div class="card-body pb-0">
										<div class="d-flex flex-wrap">
											<div class="media  align-items-center mb-3">
												<div class="d-inline-block position-relative me-sm-3 me-2">
													<svg class="circle-svg-ico" width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M56 28C56 43.464 43.464 56 28 56C12.536 56 0 43.464 0 28C0 12.536 12.536 0 28 0C43.464 0 56 12.536 56 28ZM8.4 28C8.4 38.8248 17.1752 47.6 28 47.6C38.8248 47.6 47.6 38.8248 47.6 28C47.6 17.1752 38.8248 8.4 28 8.4C17.1752 8.4 8.4 17.1752 8.4 28Z" fill="#F5F5F5" />
														<path class="primary-svg-path" d="M28 0C32.6046 5.49096e-08 37.1382 1.1356 41.1991 3.3062C45.26 5.47681 48.723 8.61542 51.2811 12.444C53.8393 16.2726 55.4138 20.6731 55.8652 25.2555C56.3165 29.838 55.6307 34.461 53.8686 38.7151C52.1065 42.9693 49.3224 46.7231 45.763 49.6443C42.2036 52.5654 37.9787 54.5637 33.4625 55.462C28.9464 56.3603 24.2784 56.131 19.872 54.7943C15.4657 53.4577 11.457 51.055 8.20102 47.799L14.1407 41.8593C16.4199 44.1385 19.226 45.8204 22.3104 46.756C25.3949 47.6917 28.6625 47.8522 31.8238 47.2234C34.9851 46.5946 37.9425 45.1958 40.4341 43.151C42.9257 41.1062 44.8746 38.4785 46.108 35.5006C47.3415 32.5227 47.8216 29.2866 47.5056 26.0789C47.1897 22.8711 46.0875 19.7908 44.2968 17.1108C42.5061 14.4308 40.082 12.2338 37.2394 10.7143C34.3967 9.19492 31.2232 8.4 28 8.4V0Z" fill="#1E33F2" />
													</svg>
												</div>
												<div class="media-body me-sm-4 me-3">
													<h2 class="fs-24 text-black font-w700 mb-0">$23,445</h2>
													<p class="fs-16 mb-0 text-black font-w400">total Income</p>
												</div>
											</div>
											<div class="media align-items-center mb-3">
												<div class="d-inline-block position-relative me-sm-3 me-2">
													<svg class="circle-svg-ico" width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M56 28C56 43.464 43.464 56 28 56C12.536 56 0 43.464 0 28C0 12.536 12.536 0 28 0C43.464 0 56 12.536 56 28ZM8.4 28C8.4 38.8248 17.1752 47.6 28 47.6C38.8248 47.6 47.6 38.8248 47.6 28C47.6 17.1752 38.8248 8.4 28 8.4C17.1752 8.4 8.4 17.1752 8.4 28Z" fill="#F5F5F5" />
														<path d="M28 0C32.6373 5.52994e-08 37.202 1.15177 41.2842 3.35188C45.3664 5.55199 48.8382 8.73155 51.3879 12.605C53.9376 16.4785 55.4853 20.9246 55.8921 25.544C56.2988 30.1635 55.5519 34.8116 53.7183 39.071L46.0028 35.7497C47.2863 32.7681 47.8092 29.5144 47.5245 26.2808C47.2397 23.0472 46.1563 19.9349 44.3715 17.2235C42.5868 14.5121 40.1565 12.2864 37.2989 10.7463C34.4414 9.20624 31.2461 8.4 28 8.4L28 0Z" fill="#FF5045" />
													</svg>

												</div>
												<div class="media-body me-sm-4 me-0">
													<h2 class="fs-24 text-black font-w700 mb-0">$1,564</h2>
													<p class="fs-16 mb-0 text-black font-w400">total Expense</p>
												</div>
											</div>
										</div>
										<div id="chartBarRunning"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header border-0 pb-0 header-cal">
								<div class="me-auto pe-3">
									<h4 class="text-black font-w700">School Performance</h4>
									<p class="mb-0">You have <strong>245</strong> contacts</p>
								</div>
							</div>
							<div class="card-body text-center event-calender pb-2">
								<input type='text' class="form-control d-none" id='datetimepicker1'>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-12 col-xxl-12">
								<div class="card widget-media">
									<div class="card-header border-0 pb-0 ">
										<h4 class="text-black fs-24 font-w700">School Performance</h4>
										<div class="dropdown ms-auto text-end c-pointer">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<circle fill="#000000" cx="12" cy="5" r="2"></circle>
														<circle fill="#000000" cx="12" cy="12" r="2"></circle>
														<circle fill="#000000" cx="12" cy="19" r="2"></circle>
													</g>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">View Detail</a>
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div id="activityLine" class="area-theme"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-xxl-12">
								<div class="card widget-media">
									<div class="card-header border-0 pb-3 ">
										<div class="me-auto pe-3">
											<h4 class="text-black font-w700 fs-24">Unpaid Student Intuition</h4>
											<p class="fs-16 mb-0 ">You have <strong>456</strong> contacts</p>
										</div>
										<div class="dropdown ms-auto text-end">
											<div class="btn-link" data-bs-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<circle fill="#A5A5A5" cx="12" cy="5" r="2"></circle>
														<circle fill="#A5A5A5" cx="12" cy="12" r="2"></circle>
														<circle fill="#A5A5A5" cx="12" cy="19" r="2"></circle>
													</g>
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="javascript:void(0);">View Detail</a>
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body pt-0 p-0">
										<div class="table-responsive intuition-table">
											<table class="table card-table">
												<tbody>
													<tr>
														<td>
															<div class="d-flex align-items-center intuition-profile">
																<div class="me-sm-4 me-2">
																	<img src="images/profile/small/pic1.jpg" class="rounded-circle" alt="" width="64">
																</div>
																<div class="info">
																	<h5 class=" mb-0"><a class="text-black" href="events.html">Dawud Khan</a></h5>
																	<span class="">ID 12314125</span>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-start">
																<svg class="me-1 me-sm-2 mt-2 primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M20 8.00006V14.0001C19.9983 15.5908 19.3656 17.1159 18.2407 18.2408C17.1159 19.3656 15.5908 19.9983 14 20.0001H8.00002C7.7348 20.0001 7.48045 20.1054 7.29291 20.293C7.10537 20.4805 7.00002 20.7348 7.00002 21.0001C7.00002 21.2653 7.10537 21.5196 7.29291 21.7072C7.48045 21.8947 7.7348 22.0001 8.00002 22.0001H14C16.121 21.9976 18.1544 21.154 19.6542 19.6542C21.1539 18.1545 21.9976 16.121 22 14.0001V8.00006C22 7.73484 21.8947 7.48049 21.7071 7.29295C21.5196 7.10542 21.2652 7.00006 21 7.00006C20.7348 7.00006 20.4804 7.10542 20.2929 7.29295C20.1054 7.48049 20 7.73484 20 8.00006Z" fill="#1E33F2" />
																	<path d="M14 18.9999C15.3256 18.9983 16.5965 18.4711 17.5338 17.5337C18.4712 16.5964 18.9984 15.3255 19 13.9999V6.99991C18.9984 5.67431 18.4712 4.40344 17.5338 3.4661C16.5965 2.52876 15.3256 2.00147 14 1.99991H7C5.6744 2.00147 4.40353 2.52876 3.46619 3.4661C2.52885 4.40344 2.00156 5.67431 2 6.99991V13.9999C2.00156 15.3255 2.52885 16.5964 3.46619 17.5337C4.40353 18.4711 5.6744 18.9983 7 18.9999H14ZM7.81 9.41401L9.0883 11.1816L13.3207 7.26561C13.5155 7.08547 13.7738 6.99009 14.0389 7.00044C14.304 7.01079 14.5542 7.12603 14.7343 7.32081C14.9144 7.51558 15.0098 7.77394 14.9995 8.03904C14.9891 8.30414 14.8739 8.55427 14.6791 8.73441L9.6187 13.4159C9.51484 13.5119 9.39179 13.5848 9.25767 13.6298C9.12355 13.6748 8.98142 13.6908 8.84067 13.6767C8.69991 13.6627 8.56373 13.619 8.44112 13.5484C8.31852 13.4779 8.21227 13.3821 8.1294 13.2675L6.19 10.5858C6.04241 10.3707 5.98474 10.1064 6.0293 9.8493C6.07387 9.59223 6.21713 9.36276 6.42853 9.20985C6.63992 9.05694 6.9027 8.9927 7.1608 9.03085C7.4189 9.06899 7.65187 9.20649 7.81 9.41401Z" fill="#1E33F2" />
																</svg>
																<div class="info-2">
																	<h4 class="mb-0 text-primary font-w700 text-nowrap">VII-A</h4>
																	<span class="">Class</span>
																</div>
															</div>
														</td>
														<td class="text-end price">
															<h4 class="font-w700">$15,21</h4>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex align-items-center intuition-profile">
																<div class="me-sm-4 me-2">
																	<img src="images/profile/small/pic2.jpg" class="rounded-circle" alt="" width="64">
																</div>
																<div class="info">
																	<h5 class=" mb-0"><a class="text-black" href="events.html">Helena Khan</a></h5>
																	<span class="">ID 12314125</span>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-start">
																<svg class="me-1 me-sm-2 mt-2 primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M20 8.00006V14.0001C19.9983 15.5908 19.3656 17.1159 18.2407 18.2408C17.1159 19.3656 15.5908 19.9983 14 20.0001H8.00002C7.7348 20.0001 7.48045 20.1054 7.29291 20.293C7.10537 20.4805 7.00002 20.7348 7.00002 21.0001C7.00002 21.2653 7.10537 21.5196 7.29291 21.7072C7.48045 21.8947 7.7348 22.0001 8.00002 22.0001H14C16.121 21.9976 18.1544 21.154 19.6542 19.6542C21.1539 18.1545 21.9976 16.121 22 14.0001V8.00006C22 7.73484 21.8947 7.48049 21.7071 7.29295C21.5196 7.10542 21.2652 7.00006 21 7.00006C20.7348 7.00006 20.4804 7.10542 20.2929 7.29295C20.1054 7.48049 20 7.73484 20 8.00006Z" fill="#1E33F2" />
																	<path d="M14 18.9999C15.3256 18.9983 16.5965 18.4711 17.5338 17.5337C18.4712 16.5964 18.9984 15.3255 19 13.9999V6.99991C18.9984 5.67431 18.4712 4.40344 17.5338 3.4661C16.5965 2.52876 15.3256 2.00147 14 1.99991H7C5.6744 2.00147 4.40353 2.52876 3.46619 3.4661C2.52885 4.40344 2.00156 5.67431 2 6.99991V13.9999C2.00156 15.3255 2.52885 16.5964 3.46619 17.5337C4.40353 18.4711 5.6744 18.9983 7 18.9999H14ZM7.81 9.41401L9.0883 11.1816L13.3207 7.26561C13.5155 7.08547 13.7738 6.99009 14.0389 7.00044C14.304 7.01079 14.5542 7.12603 14.7343 7.32081C14.9144 7.51558 15.0098 7.77394 14.9995 8.03904C14.9891 8.30414 14.8739 8.55427 14.6791 8.73441L9.6187 13.4159C9.51484 13.5119 9.39179 13.5848 9.25767 13.6298C9.12355 13.6748 8.98142 13.6908 8.84067 13.6767C8.69991 13.6627 8.56373 13.619 8.44112 13.5484C8.31852 13.4779 8.21227 13.3821 8.1294 13.2675L6.19 10.5858C6.04241 10.3707 5.98474 10.1064 6.0293 9.8493C6.07387 9.59223 6.21713 9.36276 6.42853 9.20985C6.63992 9.05694 6.9027 8.9927 7.1608 9.03085C7.4189 9.06899 7.65187 9.20649 7.81 9.41401Z" fill="#1E33F2" />
																</svg>
																<div class="info-2">
																	<h4 class="mb-0 text-primary font-w700 text-nowrap">VII-A</h4>
																	<span class="">Class</span>
																</div>
															</div>
														</td>
														<td class="text-end price">
															<h4 class="font-w700">$56,34</h4>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex align-items-center intuition-profile">
																<div class="me-sm-4 me-2">
																	<img src="images/profile/small/pic3.jpg" class="rounded-circle" alt="" width="64">
																</div>
																<div class="info">
																	<h5 class=" mb-0"><a class="text-black" href="events.html">Peter Jim</a></h5>
																	<span class="">ID 12314125</span>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-start">
																<svg class="me-1 me-sm-2 mt-2 primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M20 8.00006V14.0001C19.9983 15.5908 19.3656 17.1159 18.2407 18.2408C17.1159 19.3656 15.5908 19.9983 14 20.0001H8.00002C7.7348 20.0001 7.48045 20.1054 7.29291 20.293C7.10537 20.4805 7.00002 20.7348 7.00002 21.0001C7.00002 21.2653 7.10537 21.5196 7.29291 21.7072C7.48045 21.8947 7.7348 22.0001 8.00002 22.0001H14C16.121 21.9976 18.1544 21.154 19.6542 19.6542C21.1539 18.1545 21.9976 16.121 22 14.0001V8.00006C22 7.73484 21.8947 7.48049 21.7071 7.29295C21.5196 7.10542 21.2652 7.00006 21 7.00006C20.7348 7.00006 20.4804 7.10542 20.2929 7.29295C20.1054 7.48049 20 7.73484 20 8.00006Z" fill="#1E33F2" />
																	<path d="M14 18.9999C15.3256 18.9983 16.5965 18.4711 17.5338 17.5337C18.4712 16.5964 18.9984 15.3255 19 13.9999V6.99991C18.9984 5.67431 18.4712 4.40344 17.5338 3.4661C16.5965 2.52876 15.3256 2.00147 14 1.99991H7C5.6744 2.00147 4.40353 2.52876 3.46619 3.4661C2.52885 4.40344 2.00156 5.67431 2 6.99991V13.9999C2.00156 15.3255 2.52885 16.5964 3.46619 17.5337C4.40353 18.4711 5.6744 18.9983 7 18.9999H14ZM7.81 9.41401L9.0883 11.1816L13.3207 7.26561C13.5155 7.08547 13.7738 6.99009 14.0389 7.00044C14.304 7.01079 14.5542 7.12603 14.7343 7.32081C14.9144 7.51558 15.0098 7.77394 14.9995 8.03904C14.9891 8.30414 14.8739 8.55427 14.6791 8.73441L9.6187 13.4159C9.51484 13.5119 9.39179 13.5848 9.25767 13.6298C9.12355 13.6748 8.98142 13.6908 8.84067 13.6767C8.69991 13.6627 8.56373 13.619 8.44112 13.5484C8.31852 13.4779 8.21227 13.3821 8.1294 13.2675L6.19 10.5858C6.04241 10.3707 5.98474 10.1064 6.0293 9.8493C6.07387 9.59223 6.21713 9.36276 6.42853 9.20985C6.63992 9.05694 6.9027 8.9927 7.1608 9.03085C7.4189 9.06899 7.65187 9.20649 7.81 9.41401Z" fill="#1E33F2" />
																</svg>
																<div class="info-2">
																	<h4 class="mb-0 text-primary font-w700 text-nowrap">VII-A</h4>
																	<span class="">Class</span>
																</div>
															</div>
														</td>
														<td class="text-end price">
															<h4 class="font-w700">$54</h4>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex align-items-center intuition-profile">
																<div class="me-sm-4 me-2">
																	<img src="images/profile/small/pic4.jpg" class="rounded-circle" alt="" width="64">
																</div>
																<div class="info">
																	<h5 class=" mb-0"><a class="text-black" href="events.html">Melinda Truth</a></h5>
																	<span class="">ID 12314125</span>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-start">
																<svg class="me-1 me-sm-2 mt-2 primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M20 8.00006V14.0001C19.9983 15.5908 19.3656 17.1159 18.2407 18.2408C17.1159 19.3656 15.5908 19.9983 14 20.0001H8.00002C7.7348 20.0001 7.48045 20.1054 7.29291 20.293C7.10537 20.4805 7.00002 20.7348 7.00002 21.0001C7.00002 21.2653 7.10537 21.5196 7.29291 21.7072C7.48045 21.8947 7.7348 22.0001 8.00002 22.0001H14C16.121 21.9976 18.1544 21.154 19.6542 19.6542C21.1539 18.1545 21.9976 16.121 22 14.0001V8.00006C22 7.73484 21.8947 7.48049 21.7071 7.29295C21.5196 7.10542 21.2652 7.00006 21 7.00006C20.7348 7.00006 20.4804 7.10542 20.2929 7.29295C20.1054 7.48049 20 7.73484 20 8.00006Z" fill="#1E33F2" />
																	<path d="M14 18.9999C15.3256 18.9983 16.5965 18.4711 17.5338 17.5337C18.4712 16.5964 18.9984 15.3255 19 13.9999V6.99991C18.9984 5.67431 18.4712 4.40344 17.5338 3.4661C16.5965 2.52876 15.3256 2.00147 14 1.99991H7C5.6744 2.00147 4.40353 2.52876 3.46619 3.4661C2.52885 4.40344 2.00156 5.67431 2 6.99991V13.9999C2.00156 15.3255 2.52885 16.5964 3.46619 17.5337C4.40353 18.4711 5.6744 18.9983 7 18.9999H14ZM7.81 9.41401L9.0883 11.1816L13.3207 7.26561C13.5155 7.08547 13.7738 6.99009 14.0389 7.00044C14.304 7.01079 14.5542 7.12603 14.7343 7.32081C14.9144 7.51558 15.0098 7.77394 14.9995 8.03904C14.9891 8.30414 14.8739 8.55427 14.6791 8.73441L9.6187 13.4159C9.51484 13.5119 9.39179 13.5848 9.25767 13.6298C9.12355 13.6748 8.98142 13.6908 8.84067 13.6767C8.69991 13.6627 8.56373 13.619 8.44112 13.5484C8.31852 13.4779 8.21227 13.3821 8.1294 13.2675L6.19 10.5858C6.04241 10.3707 5.98474 10.1064 6.0293 9.8493C6.07387 9.59223 6.21713 9.36276 6.42853 9.20985C6.63992 9.05694 6.9027 8.9927 7.1608 9.03085C7.4189 9.06899 7.65187 9.20649 7.81 9.41401Z" fill="#1E33F2" />
																</svg>
																<div class="info-2">
																	<h4 class="mb-0 text-primary text-nowrap font-w700">VII-A</h4>
																	<span class="">Class</span>
																</div>
															</div>
														</td>
														<td class="text-end price">
															<h4 class="font-w700">$24,78</h4>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex align-items-center intuition-profile">
																<div class="me-sm-4 me-2">
																	<img src="images/profile/small/pic5.jpg" class="rounded-circle" alt="" width="64">
																</div>
																<div class="info">
																	<h5 class=" mb-0"><a class="text-black" href="events.html">Hawkins Jr.</a></h5>
																	<span class="">ID 12314125</span>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-start">
																<svg class="me-1 me-sm-2 mt-2 primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M20 8.00006V14.0001C19.9983 15.5908 19.3656 17.1159 18.2407 18.2408C17.1159 19.3656 15.5908 19.9983 14 20.0001H8.00002C7.7348 20.0001 7.48045 20.1054 7.29291 20.293C7.10537 20.4805 7.00002 20.7348 7.00002 21.0001C7.00002 21.2653 7.10537 21.5196 7.29291 21.7072C7.48045 21.8947 7.7348 22.0001 8.00002 22.0001H14C16.121 21.9976 18.1544 21.154 19.6542 19.6542C21.1539 18.1545 21.9976 16.121 22 14.0001V8.00006C22 7.73484 21.8947 7.48049 21.7071 7.29295C21.5196 7.10542 21.2652 7.00006 21 7.00006C20.7348 7.00006 20.4804 7.10542 20.2929 7.29295C20.1054 7.48049 20 7.73484 20 8.00006Z" fill="#1E33F2" />
																	<path d="M14 18.9999C15.3256 18.9983 16.5965 18.4711 17.5338 17.5337C18.4712 16.5964 18.9984 15.3255 19 13.9999V6.99991C18.9984 5.67431 18.4712 4.40344 17.5338 3.4661C16.5965 2.52876 15.3256 2.00147 14 1.99991H7C5.6744 2.00147 4.40353 2.52876 3.46619 3.4661C2.52885 4.40344 2.00156 5.67431 2 6.99991V13.9999C2.00156 15.3255 2.52885 16.5964 3.46619 17.5337C4.40353 18.4711 5.6744 18.9983 7 18.9999H14ZM7.81 9.41401L9.0883 11.1816L13.3207 7.26561C13.5155 7.08547 13.7738 6.99009 14.0389 7.00044C14.304 7.01079 14.5542 7.12603 14.7343 7.32081C14.9144 7.51558 15.0098 7.77394 14.9995 8.03904C14.9891 8.30414 14.8739 8.55427 14.6791 8.73441L9.6187 13.4159C9.51484 13.5119 9.39179 13.5848 9.25767 13.6298C9.12355 13.6748 8.98142 13.6908 8.84067 13.6767C8.69991 13.6627 8.56373 13.619 8.44112 13.5484C8.31852 13.4779 8.21227 13.3821 8.1294 13.2675L6.19 10.5858C6.04241 10.3707 5.98474 10.1064 6.0293 9.8493C6.07387 9.59223 6.21713 9.36276 6.42853 9.20985C6.63992 9.05694 6.9027 8.9927 7.1608 9.03085C7.4189 9.06899 7.65187 9.20649 7.81 9.41401Z" fill="#1E33F2" />
																</svg>
																<div class="info-2">
																	<h4 class="mb-0 text-primary text-nowrap font-w700">VII-A</h4>
																	<span class="">Class</span>
																</div>
															</div>
														</td>
														<td class="text-end price">
															<h4 class="font-w700">$56,3</h4>
														</td>
													</tr>
													<tr>
														<td>
															<div class="d-flex align-items-center intuition-profile">
																<div class="me-sm-4 me-2">
																	<img src="images/profile/small/pic6.jpg" class="rounded-circle" alt="" width="64">
																</div>
																<div class="info">
																	<h5 class=" mb-0"><a class="text-black" href="events.html">Louis</a></h5>
																	<span class="">ID 12314125</span>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex align-items-start">
																<svg class="me-1 me-sm-2 mt-2 primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M20 8.00006V14.0001C19.9983 15.5908 19.3656 17.1159 18.2407 18.2408C17.1159 19.3656 15.5908 19.9983 14 20.0001H8.00002C7.7348 20.0001 7.48045 20.1054 7.29291 20.293C7.10537 20.4805 7.00002 20.7348 7.00002 21.0001C7.00002 21.2653 7.10537 21.5196 7.29291 21.7072C7.48045 21.8947 7.7348 22.0001 8.00002 22.0001H14C16.121 21.9976 18.1544 21.154 19.6542 19.6542C21.1539 18.1545 21.9976 16.121 22 14.0001V8.00006C22 7.73484 21.8947 7.48049 21.7071 7.29295C21.5196 7.10542 21.2652 7.00006 21 7.00006C20.7348 7.00006 20.4804 7.10542 20.2929 7.29295C20.1054 7.48049 20 7.73484 20 8.00006Z" fill="#1E33F2" />
																	<path d="M14 18.9999C15.3256 18.9983 16.5965 18.4711 17.5338 17.5337C18.4712 16.5964 18.9984 15.3255 19 13.9999V6.99991C18.9984 5.67431 18.4712 4.40344 17.5338 3.4661C16.5965 2.52876 15.3256 2.00147 14 1.99991H7C5.6744 2.00147 4.40353 2.52876 3.46619 3.4661C2.52885 4.40344 2.00156 5.67431 2 6.99991V13.9999C2.00156 15.3255 2.52885 16.5964 3.46619 17.5337C4.40353 18.4711 5.6744 18.9983 7 18.9999H14ZM7.81 9.41401L9.0883 11.1816L13.3207 7.26561C13.5155 7.08547 13.7738 6.99009 14.0389 7.00044C14.304 7.01079 14.5542 7.12603 14.7343 7.32081C14.9144 7.51558 15.0098 7.77394 14.9995 8.03904C14.9891 8.30414 14.8739 8.55427 14.6791 8.73441L9.6187 13.4159C9.51484 13.5119 9.39179 13.5848 9.25767 13.6298C9.12355 13.6748 8.98142 13.6908 8.84067 13.6767C8.69991 13.6627 8.56373 13.619 8.44112 13.5484C8.31852 13.4779 8.21227 13.3821 8.1294 13.2675L6.19 10.5858C6.04241 10.3707 5.98474 10.1064 6.0293 9.8493C6.07387 9.59223 6.21713 9.36276 6.42853 9.20985C6.63992 9.05694 6.9027 8.9927 7.1608 9.03085C7.4189 9.06899 7.65187 9.20649 7.81 9.41401Z" fill="#1E33F2" />
																</svg>
																<div class="info-2">
																	<h4 class="mb-0 text-primary text-nowrap font-w700">VII-A</h4>
																	<span class="">Class</span>
																</div>
															</div>
														</td>
														<td class="text-end price">
															<h4 class="font-w700">$56,3</h4>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<div>
											<h4 class="text-black fs-24 mb-0 font-w700">Curent Food Menu</h4>
											<p class="fs-14 mb-0"> Lorem ipsum dolor</p>
										</div>
									</div>
									<div class="loadmore-content height800 dz-scroll" id="DietMenusContent">
										<div class="card-body border-bottom">
											<div class="media mb-3">
												<img class="rounded" src="images/card/pic11.jpg" style="width:100%;" alt="">
											</div>
											<div class="info">
												<h5 class="text-black mb-3"><a href="ecom-product-detail.html" class="text-black">Spinach with Roasted Crab</a></h5>
												<div class="d-flex justify-content-between align-items-center">
													<h4 class="font-w600 fs-16 mb-0 text-primary text-uppercase">For Breakfast</h4>
													<div class="d-flex align-items-center">
														<svg class="me-2 primary-icon" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="2.95455" height="18" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="5.90918" y="4.90906" width="2.95455" height="13.0909" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="11.8184" y="12.2728" width="2.95455" height="5.72727" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="17.7275" y="2.45459" width="2.95455" height="15.5455" rx="1.47727" fill="#1E33F2"></rect>
														</svg>
														<h6 class="text-black mb-0">6,723</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="card-body border-bottom">
											<div class="media mb-3">
												<img class="rounded" src="images/card/pic12.jpg" style="width:100%;" alt="">
											</div>
											<div class="info">
												<h5 class="text-black mb-3"><a href="ecom-product-detail.html" class="text-black">Chicken Teriyaki Khas Haji Muhidin Malang</a></h5>
												<div class="d-flex justify-content-between align-items-center">
													<h4 class="font-w600 mb-0 fs-16 text-primary text-uppercase">For Breakfast</h4>

													<div class="d-flex align-items-center">
														<svg class="me-2 primary-icon" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="2.95455" height="18" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="5.90918" y="4.90906" width="2.95455" height="13.0909" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="11.8184" y="12.2728" width="2.95455" height="5.72727" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="17.7275" y="2.45459" width="2.95455" height="15.5455" rx="1.47727" fill="#1E33F2"></rect>
														</svg>
														<h6 class="text-black mb-0">6,723</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="card-body border-bottom">
											<div class="media mb-3">
												<img class="rounded" src="images/card/pic11.jpg" style="width:100%;" alt="">
											</div>
											<div class="info">
												<h5 class="text-black mb-3"><a href="ecom-product-detail.html" class="text-black">Fried Chicken Roll Extra Spiciy with Mozarella</a></h5>
												<div class="d-flex justify-content-between align-items-center">
													<h4 class="font-w600 mb-0 fs-16 text-primary text-uppercase">For Breakfast</h4>

													<div class="d-flex align-items-center">
														<svg class="me-2 primary-icon" width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="2.95455" height="18" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="5.90918" y="4.90906" width="2.95455" height="13.0909" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="11.8184" y="12.2728" width="2.95455" height="5.72727" rx="1.47727" fill="#1E33F2"></rect>
															<rect x="17.7275" y="2.45459" width="2.95455" height="15.5455" rx="1.47727" fill="#1E33F2"></rect>
														</svg>
														<h6 class="text-black mb-0">6,723</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer style-1 text-center border-0 pt-0 pb-5">
										<a class="text-primary dz-load-more fa fa-chevron-down" id="DietMenus" href="javascript:void(0);" rel="ajax/food-menu-list.html">
										</a>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="card">
											<div class="card-header d-sm-flex d-block border-0">
												<div class="me-auto pe-3">
													<h4 class="text-black text-black fs-24 font-w700">Recent Students</h4>
													<p class="fs-13 mb-0">You have 245 clients</p>
												</div>
											</div>
											<div class="card-body loadmore-content  dz-scroll height pb-4 pt-0" id="recentActivitiesContent">
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class=" me-3">
														<img src="images/student/pic1.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class=" me-3">
														<img src="images/student/pic2.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class="me-3">
														<img src="images/student/pic3.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class="me-3">
														<img src="images/student/pic4.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class="me-3">
														<img src="images/student/pic5.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class="me-3">
														<img src="images/student/pic3.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
												<div class="d-flex py-sm-3 py-1 align-items-center">
													<span class="me-3">
														<img src="images/student/pic5.jpg" alt="" class="rounded-circle" width="50">
													</span>
													<div>
														<h6 class="font-w600 fs-18 mb-0"><a href="student.html" class="text-black">Melinda Moss</a></h6>
														<span class="fs-14">VII-AB</span>
													</div>
												</div>
											</div>
											<div class="card-footer  border-0 pt-0 text-center">
												<a href="javascript:void(0);" class=" btn-block btn-primary btn ">View 240 More</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->

		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2023</p>
			</div>
		</div>
		<!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

		<!--**********************************
           Support ticket button end
        ***********************************-->

	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
	<script src="{{asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{asset('js/custom.min.js')}}"></script>
	<script src="{{asset('js/deznav-init.js')}}"></script>


</body>

<!-- Mirrored from owlio.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2024 11:47:02 GMT -->

</html>