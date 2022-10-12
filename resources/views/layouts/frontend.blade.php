<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Pizza Plaza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat&display=swap" rel="stylesheet">
    <link type="image/x-icon" href="images/fav-icon.png" rel="icon">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body>
    <!-- preloader -->
    <div id="preloader">
    </div>
    <!-- preloader -->
    <div id='app'>
    <header id="header">
        <div class="container">
            <div class="row m-0">
                <div class="col-xl-2 col-lg-2 col-md-2 col-3 p-0">
                    <div class="navbar-header">
                        <a class="navbar-brand page-scroll" href="/">
                            <img alt="pizza plaza" src="images/logo.svg">
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-9 p-0 text-right">
                    <div id="menu" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="level">
                                <a href="/" class="page-scroll">{{__("main.home")}}</a>
                            </li>
                            <li class="level">
                                <a href="/about" class="page-scroll">{{__("main.about")}}</a>
                            </li>
                            <li class="level">
                                <a href="/contact" class="page-scroll">{{__("main.contact")}}</a>
                            </li>                                                     
                            @auth
                            <li class="level dropdown set"> 
                                <a href="#" class="page-scroll">{{__("main.user")}}</a>
                                   <span class="opener plus"></span> 
                                <div class="megamenu mobile-sub-menu content">
                                    <div class="megamenu-inner-top">
                                        <ul class="sub-menu-level1">
                                              <li class="level2">
                                                <ul class="sub-menu-level2 ">
                                                    <li  class="leve3"><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><span>■</span> {{__("main.logout")}}</a></li>
                                                      <li  class="leve3"><a href="{{ route('my-orders') }}"><span>■</span> {{__("main.orders")}}</a></li>                                                    
                                                      <cart-link />
                                                    </ul>
                                              </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li class="level dropdown set"> 
				                <a href="/" class="page-scroll">{{__("main.login")}}</a>
				               	<span class="opener plus"></span> 
				                <div class="megamenu mobile-sub-menu content">
				                    <div class="megamenu-inner-top">
				                        <ul class="sub-menu-level1">
				                          	<li class="level2">
				                            	<ul class="sub-menu-level2 ">
                                                    @if (Route::has('login'))                                                    
				                              		<li class="level3"><a href="{{ route('login') }}"><span>■</span>{{__("main.login")}}</a></li>
                                                      @endif
                                                      @if (Route::has('register'))
				                              		 <li class="level3"><a href="{{ route('register') }}"><span>■</span>{{__("main.register")}}</a></li>
                                                      @endif
				                            	</ul>
				                          	</li>
				                        </ul>
				                    </div>
				                </div>
				            </li>
                    @endauth
                    @auth
                    @if(auth()->user()->is_admin===1)                
                    <li class="level"> <a class="page-scroll" href="{{route('admin.view')}}">{{__("main.admin")}}</a></li>
                    @endif
                    @endauth
                    <li class="level dropdown set"> 
                        <a href="/" class="page-scroll"><i class="fa fa-globe lang" aria-hidden="true"></i></a>
                           <span class="opener plus"></span> 
                        <div class="megamenu mobile-sub-menu content">
                            <div class="megamenu-inner-top">
                                <ul class="sub-menu-level1">
                                      <li class="level2">
                                        <ul class="sub-menu-level2 ">
                                              <li class="level3"><a @if(session()->get("lang_code")==='en') class='l-active' @endif href="{{url("change-language/en")}}"><span>■</span>EN</a></li>
                                              <li class="level3"><a @if(session()->get("lang_code")==='de') class='l-active' @endif  href="{{url("change-language/de")}}"><span>■</span>DE</a></li>
                                        </ul>
                                      </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                        </ul>
                    </div>
                    <div class=" header-right-link">
                        <ul>
                            <li class="call-icon">
                                <a href="tel:+49 123 123 123 12">
                                    <span class="icon"></span>
                                    <div class="link-text">{{__("main.call")}}</div>
                                </a>
                            </li>
                            <li class="side-toggle">
                                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><span></span></button>
                            </li>
                            <nav-cart/>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    </div>
    <footer>
        <div class="container">
            <div class="footer">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                        <div class="footer-logo">
                            <img src="images/logo.svg" alt="foorter-logo" width="300px">
                            
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                        <div class="opening-hours">
                            <h2>{{__("main.opening_hours")}}</h2>
                            <ul>
                                <li>Mon - Sat : <span>6.00 am - 10.00 pm</span></li>
                                <li>Sunday : Closed</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 footer-box">
                        <div>
                            <h2>{{__("main.contact")}}</h2>
                            <div>
                                <p class="footer-des">Max Mustermann/
                                    Pizzastraße 1b<br>
                                    01243 Gießen/Langgöns</p>
                                <ul>
                                    <li>{{__("main.phone")}} - <a href="tel:+49 123 123 123 12">+49 123 123 123 12</a></li>
                                    <li>{{__("main.email")}} - <a href="mailto:me@pizza-plaza.com">me@pizza-plaza.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                        <p class="copy-text">© {{__("main.copyright")}}</p>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 copyright-box">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="privacy" id="privacy">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-12">
					{{__("main.cookie")}} 
				</div>
				<div class="col-md-3 col-12">
					<button id="privacyaccept" class="btn btn-warning btn-sm">{{__("main.accept")}} </button>
				</div>
			</div>
		</div>
	</div>
    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
		$("#privacy").hide();
		if($.cookie("privacy") !== "1"){
			$("#privacy").fadeIn();
		}
		
		$("#privacyaccept").click(function(){
			$.cookie("privacy","1");
			$("#privacy").fadeOut();
		});
	</script>
</body>

</html>