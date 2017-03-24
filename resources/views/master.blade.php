<!DOCTYPE html>
<html>
    <head>
        <title>NewsPortal</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/font.css')}}">
        <script type="text/javascript" src="{{URL::to('js/ajax.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/li-scroller.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/jquery.fancybox.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/style.css')}}">
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
        <div class="container">
            <header id="header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header_top">
                            <div class="header_top_left">
                                <ul class="top_nav">
                                    <li><a href="{{URL::to('/')}}">হোম </a></li>                              
                                    <?php foreach ($header_category as $v_header_category) { ?>
                                        <li><a href="{{URL::to('headcategory/')}}">{{$v_header_category->category_name}}</a></li>                                     
                                    <?php } ?>
                                    <li><a href="{{URL::to('contact')}}">যোগাযোগ </a></li>
                                    @if (Auth::guest())
                                    <li><a href="{{URL::to('login')}}">Login</a></li>
                                    <li><a href="{{URL::to('register')}}">Register</a></li>
                                    @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="header_top_right">
                                <p><?php
                                    date_default_timezone_set('Asia/Dhaka');
                                    echo $date = date('D M j G:i:s T Y');
                                    ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="header_bottom">
                            <div class="logo_area"><a href="index.html" class="logo"><img src="images/logo.jpg" alt=""></a></div>
                            <!--<div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>-->
                        </div>
                    </div>
                </div>
            </header>
            <section id="navArea">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav main_nav">
                            <li class="active"><a href="{{URL::to('/')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                            @foreach($category_info as $v_category_info)
                            <li><a href="{{URL::to('single-category/'.$v_category_info->id)}}">{{$v_category_info->category_name}}</a></li>  
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </section>
            <?php if (!(Session::get('slide'))) { ?>
                <section id="newsSection">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="latest_newsarea"> <span>Breaking News</span>
                                <ul id="ticker01" class="news_sticker">

                                    @foreach($breaking_news as $v_breaking_news)
                                    <li><a href="{{URL::to('single-page/'.$v_breaking_news->id)}}"><img src="{{asset($v_breaking_news->news_image)}}" alt="">{{$v_breaking_news->news_title}}</a></li>                                                                                                                                                           
                                    @endforeach
                                </ul>
                                <div class="social_area">
                                    <ul class="social_nav">
                                        <li class="facebook"><a href="#"></a></li>
                                        <li class="twitter"><a href="#"></a></li>
                                        <li class="flickr"><a href="#"></a></li>
                                        <li class="pinterest"><a href="#"></a></li>
                                        <li class="googleplus"><a href="#"></a></li>
                                        <li class="vimeo"><a href="#"></a></li>
                                        <li class="youtube"><a href="#"></a></li>
                                        <li class="mail"><a href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="sliderSection">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="slick_slider"> 
                                @foreach($latest_news as $v_latest_news)
                                <div class="single_iteam"> <a href="{{URL::to('single-page/'.$v_latest_news->id)}}"> <img src="{{asset(URL::to($v_latest_news->news_image))}}" alt=""></a>
                                    <div class="slider_article">
                                        <h2><a class="slider_tittle" href="{{URL::to('single-page/'.$v_latest_news->id)}}">{{$v_latest_news->news_title}}</a></h2>
                                        <p>{{$v_latest_news->news_summery}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="latest_post">
                                <h2><span>Latest News</span></h2>
                                <div class="latest_post_container">
                                    <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                                    <ul class="latest_postnav">
                                        @foreach($latest_news as $v_latest_news)
                                        <li>
                                            <div class="media"> <a href="{{URL::to('single-page/'.$v_latest_news->id)}}" class="media-left"> <img alt="" src="{{asset(URL::to($v_latest_news->news_image))}}"> </a>
                                                <div class="media-body"> <a href="{{URL::to('single-page/'.$v_latest_news->id)}}" class="catg_title"> {{$v_latest_news->news_title}}</a> </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            @yield('content')					    
            <footer id="footer">
                <div class="footer_top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer_widget wow fadeInRightBig">
                                <h2>About</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <address>
                                    Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                                </address>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer_widget wow fadeInDown">
                                <h2>Tag</h2>
                                <ul class="tag_nav">
                                    @foreach($all_tags as $v_tags)
                                    <li><a href="#">{{$v_tags->tag_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer_widget wow fadeInRightBig">
                                <h2>Contact</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <address>
                                    Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <p class="copyright">Copyright &copy; 2045 <a href="index.html">NewsPortal</a></p>
                    <p class="developer">Developed By Wpfreeware</p>
                </div>
            </footer>
        </div>
        <script src="{{URL::to('assets/js/jquery.min.js')}}"></script> 
        <script src="{{URL::to('assets/js/wow.min.js')}}"></script> 
        <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script> 
        <script src="{{URL::to('assets/js/slick.min.js')}}"></script> 
        <script src="{{URL::to('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
        <script src="{{URL::to('assets/js/jquery.newsTicker.min.js')}}"></script> 
        <script src="{{URL::to('assets/js/jquery.fancybox.pack.js')}}"></script> 
        <script src="{{URL::to('assets/js/custom.js')}}"></script>
    </body>
</html>