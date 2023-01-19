<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{trans('main.international_hospital')}}</title>
  <meta content="international hospital" name="description">
  <meta content="international hospital, international, hospital, clinic" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon-16x16.png')}}">
  <link rel="mask-icon" href="{{asset('assets/img/safari-pinned-tab.svg')}}" color="#5bbad5">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  @if (app()->getLocale() == 'ar')
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
  @else
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  @endif
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/flag-icons.css')}}" rel="stylesheet">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
  <!-- Template Main CSS File -->
  @if (app()->getLocale() == 'ar')
  <link href="{{asset('assets/css/style-rtl.css?v=1.2')}}" rel="stylesheet">
  <link href="{{asset('assets/css/ticker-rtl.css')}}" rel="stylesheet">
  @else
  <link href="{{asset('assets/css/style.css?v=1.2')}}" rel="stylesheet">
  <link href="{{asset('assets/css/ticker.css')}}" rel="stylesheet">
  @endif

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo me-auto">
        <img src="{{asset('images/logo.png')}}" alt="International Hospital">
      </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      {{-- <h1 class="logo me-auto"><a href="index.html">{{ trans('main.site_title') }}</a></h1> --}}

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">{{ trans('main.home') }}</a></li>
          <li><a class="nav-link scrollto" href="#about">{{ trans('main.about') }}</a></li>
          <li><a class="nav-link scrollto" href="#services">{{ trans('main.services') }}</a></li>
          <li><a class="nav-link scrollto" href="#departments">{{ trans('main.departments') }}</a></li>
          <li><a class="nav-link scrollto" href="#doctors">{{ trans('main.doctors') }}</a></li>
          <li><a class="nav-link scrollto" href="#contact">{{ trans('main.contact') }}</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="btn-container">
        <a href="tel:6444" >
          <i class="fa fa-phone"></i>
          6444
        </a>
      </div>

      <a href="#appointment" class="appointment-btn scrollto">{{ trans('main.appointments') }}</a>
      @if (app()->getlocale() == 'ar')
        <a class="btn flag-icon" href="/locale/en">{{__('main.english')}}</a>
        @else
        <a class="btn flag-icon" href="/locale/ar">{{__('main.arabic')}}</a>
        @endif

    </div>
  </header><!-- End Header -->
  <section id="adds" class="adds">
    <div class="ticker-wrapper-h">
      <div class="heading">{{__('main.adds')}}</div>   
      <ul class="news-ticker-h">
        @foreach ($adds as $add)
          <li><a href="#">{!! $add->text !!}</a></li>
        @endforeach
      </ul>
    </div>
</section>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>{{ __('main.vision') }}</h2>
            <p>{{(session()->get('locale') == 'ar' ? $profile->vision : $profile->en_vision)}}</p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>{{ __('main.message') }}</h2>
            <p>{{(session()->get('locale') == 'ar' ? $profile->message : $profile->en_message)}}</p>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>{{ __('main.values') }}</h2>
            <p>{{(session()->get('locale') == 'ar' ? $profile->values : $profile->en_values)}}</p>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{!! __('main.goals') !!}</h2>
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-3 align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">{{(session()->get('locale') == 'ar' ? $profile->goals[0] : $profile->en_goals[0])}}</a></h4>
            </div>
          </div>

          <div class="col-md-4 col-lg-2 align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4 class="title"><a href="">{{(session()->get('locale') == 'ar' ? $profile->goals[1] : $profile->en_goals[1])}}</a></h4>
            </div>
          </div>

          <div class="col-md-4 col-lg-2 align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-thermometer"></i></div>
              <h4 class="title"><a href="">{{(session()->get('locale') == 'ar' ? $profile->goals[2] : $profile->en_goals[2])}}</a></h4>
            </div>
          </div>

          <div class="col-md-4 col-lg-2 align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4 class="title"><a href="">{{(session()->get('locale') == 'ar' ? $profile->goals[3] : $profile->en_goals[3])}}</a></h4>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-ethernet"></i></div>
              <h4 class="title"><a href="">{{(session()->get('locale') == 'ar' ? $profile->goals[4] : $profile->en_goals[3])}}</a></h4>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{!! __('main.about') !!}</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="{{asset('images/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <p>
              {!! (session()->get('locale') == 'ar' ? $profile->about : $profile->en_about) !!}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ trans('main.services') }}</h2>
        </div>

        <div class="testimonials-slider swiper" id="services-slider" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach ($services as $service)
            <div class="swiper-slide">
              <div class="card">
                <img src="{{asset($service->image_full_path)}}" class="card-img-top" alt="{{$service->name}}">
                <div class="card-body">
                  <h5 class="card-title">{{$service->name}}</h5>
                  <p class="card-text">{!!$service->description!!}</p>
                </div>
              </div>
            </div><!-- End service item -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev" href="services-slider"></div>
          <div class="swiper-button-next" href="services-slider"></div>
        </div>

      </div>
    </section><!-- End services Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ trans('main.departments') }}</h2>
        </div>

        <div class="departments-slider swiper" id="departments-slider" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach ($departments as $department)
            <div class="swiper-slide">
              <div class="card">
                <img src="{{asset($department->image_full_path)}}" class="card-img-top" alt="{{$department->name}}">
                <div class="card-body">
                  <h5 class="card-title">{{$department->name}}</h5>
                  <p class="card-text">{!!$department->description!!}</p>
                </div>
              </div>
            </div><!-- End department item -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>

      </div>
    </section><!-- End departments Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{__('main.doctors')}}</h2>
        </div>

        <div class="row">
          @foreach ($doctors as $doctor)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{asset($doctor->image_full_path)}}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>{{$doctor->name}}</h4>
                <span>{{$doctor->department}}</span>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Doctors Section -->
    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{__('main.appointments')}}</h2>
        </div>
        <div class="table-responsive">
          <table class="table appointment table-bordered table-striped">
            <thead>
              <tr>
                <th>{{__('main.clinic')}}</th>
                @foreach ($days as $day)
                  <th>{{__('main.' . $day)}}  
                @endforeach
              </tr>
            </thead>
            <tbody>
              {!! $table !!}
            </tbody>
          </table>
        </div>

      </div>
    </section><!-- End Appointment Section -->
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{__('main.gallery')}}</h2>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach ($images as $image)
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset($image->image_full_path)}}"><img
                  src="{{asset($image->image_full_path)}}" class="img-fluid" alt=""></a></div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>{!! __('main.contact')!!}</h2>
        </div>

      </div>

      <div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7684.13722361794!2d32.52330006878137!3d15.641334400000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x168e8d853fd3210b%3A0x4a46429fe87edafb!2sInternational%20hospital!5e0!3m2!1sen!2s!4v1653421107268!5m2!1sen!2s" style="border:0; width: 100%; height: 350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>{{__('main.address')}}</h3>
                  <p>{{(session()->get('locale') == 'ar' ? $profile->address : $profile->en_address)}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>{{__('main.email')}}</h3>
                  <p>{{$profile->email}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>{{__('main.mobile')}}</h3>
                  <p>{{$profile->mobile}}</p>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-2 col-md-6">
            <div class="footer-info">
              {{-- <h3>{!! __('main.site_title') !!}
              </h3> --}}
              <img src="{{asset('images/logo1.jpeg')}}" style="width: 9.5rem" alt="International Hospital">
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="footer-info">
              <p style="word-wrap:break-word;">
                {{(session()->get('locale') == 'ar' ? $profile->address : $profile->en_address)}}<br/>
                <strong>{!! __('main.phone') !!}:</strong> {!! $profile->mobile !!}<br/>
                <strong>{!! __('main.email') !!}:</strong> {!! $profile->email !!}<br/>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/internationl_94" target="_blanck" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/International-Hospital-%D8%A7%D9%84%D9%85%D8%B3%D8%AA%D8%B4%D9%81%D9%89-%D8%A7%D9%84%D8%AF%D9%88%D9%84%D9%8A-%D8%A8%D8%AD%D8%B1%D9%8A-102721189272715" target="_blanck" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://join.skype.com/invite/KQp3tV1nqB4D" target="_blanck" class="google-plus"><i class="bx bxl-skype"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>{!! __('main.site_map')!!}</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('main.home') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('main.about') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('main.services') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('main.departments') }}</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ trans('main.doctors') }}</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{ trans('main.departments') }}</h4>
            <ul>
              @foreach ($departmentsList as $department)
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{(session()->get('locale') == 'ar' ?
                  $department->name : $department->en_name)}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>{{ trans('main.services') }}</h4>
            <ul>
              @foreach ($servicesList as $service)
              <li><i class="bx bx-chevron-right"></i><a href="#">{{(session()->get('locale') == 'ar' ? $service->name :
                  $service->en_name)}}</a></li>
              @endforeach
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js?v=1.2')}}"></script>

</body>

</html> 