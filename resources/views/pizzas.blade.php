@extends('layouts.frontend')

@section('content')

    <section class="banner">
        <div class="banner-carousel owl-carousel">
            <div class="banner-slide">
                <div class="container">
                    <div class="banner-box">
                        <div class="banner-text">
                            <div class="banner-center">
                                <h2 class="banner-headding">pizza for f<span>oo</span>dies</h2>
                                <p class="banner-sub-hed">a smile in every slice</p>
                            </div>
                        </div>
                        <div class="banner-images">
                            <div class="all-img-banner">
                                <img src="images/banner-bg-1.png" alt="banner" class="pizza-img">
                                <img src="images/banner-bg-2.png" alt="banner" class="pizza-it pizza-1">
                                <img src="images/banner-bg-3.png" alt="banner" class="pizza-it pizza-2">
                                <img src="images/banner-bg-4.png" alt="banner" class="pizza-it pizza-3">
                                <img src="images/banner-bg-5.png" alt="banner" class="pizza-it pizza-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slide-2">
                <div class="container">
                    <div class="banner-box">
                        <div class="banner-text">
                            <div class="banner-center">
                                <h2 class="banner-headding">pizza for f<span>oo</span>dies</h2>
                                <p class="banner-sub-hed">a smile in every slice</p>
                            </div>
                        </div>
                        <div class="banner-images">
                            <div class="all-img-banner">
                                <img src="images/pizza-banner-1.png" alt="banner" class="pizza-img">
                                <img src="images/pizza-1.png" alt="banner" class="pizza-it pizza-1">
                                <img src="images/pizza-2.png" alt="banner" class="pizza-it pizza-2">
                                <img src="images/pizza-3.png" alt="banner" class="pizza-it pizza-3">
                                <img src="images/pizza-4.png" alt="banner" class="pizza-it pizza-4">
                                <img src="images/pizza-5.png" alt="banner" class="pizza-it pizza-5">
                                <img src="images/pizza-6.png" alt="banner" class="pizza-it pizza-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slide-3">
                <div class="container">
                    <div class="banner-box">
                        <div class="banner-images">
                            <div class="all-img-banner">
                                <img src="images/pizza-banner-2.png" alt="banner" class="pizza-img">
                                <img src="images/pizza-7.png" alt="banner" class="pizza-it pizza-1">
                                <img src="images/pizza-8.png" alt="banner" class="pizza-it pizza-2">
                                <img src="images/pizza-9.png" alt="banner" class="pizza-it pizza-3">
                                <img src="images/pizza-10.png" alt="banner" class="pizza-it pizza-4">
                                <img src="images/pizza-11.png" alt="banner" class="pizza-it pizza-5">
                                <img src="images/pizza-12.png" alt="banner" class="pizza-it pizza-6">
                            </div>
                        </div>
                        <div class="banner-text">
                            <div class="banner-center">
                                <h2 class="banner-headding">pizza for f<span>oo</span>dies</h2>
                                <p class="banner-sub-hed">a smile in every slice</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div><img src="images/menu-bottom-bg.png" alt="layer" class="top-p"></div>
    <section class="speciality ptb pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="headding-part text-center pb-50">
                        <p class="headding-sub">Fresh From Pizza Plaza</p>
                        <h2 class="headding-title text-uppercase font-weight-bold">our speciality</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(isset($pizzas))
                @php $i = 1; @endphp
                @foreach($pizzas as $pizza)
                @if($pizza->pizza_of_the_day===1)
                @if($i < 4) 
                <div class="col-xl-4 col-lg-4 col-md-4 text-center speciality-box">
                    <div class="speciality-img">
                        <a href="#"><img src="images/pizzas/{{$pizza->image_name}}" alt="{{$pizza->name}}" class="spec-image"></a>
                    </div>
                    <a href="#" class="ser-title text-uppercase font-weight-bold">{{$pizza->name}}</a>
                    <p>{{$pizza->description}}</p>
                </div>
                @endif
                @php $i++; @endphp
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="special-menu ptb pt-140">
        <div class="container">
            <div class="menu-top-bg"><img src="images/menu-top-bg.png" alt="meu-bg"></div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="headding-part text-center pb-50">
                        <p class="headding-sub">Fresh From Pizza Plaza</p>
                        <h2 class="headding-title text-uppercase font-weight-bold">Our Pizzas</h2>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="row pt-50 tab-pane active show">
                    @if(isset($pizzas))
                    @foreach($pizzas as $pizza)
                    <div class="col-xl-4 col-lg-4 col-md-4 text-center pt-20">
                        <div class="menu-img">
                            <a href="#"><img src="images/pizzas/{{$pizza->image_name}}" alt="menu" class="menu-image"></a>
                        </div>
                        <a href="#" class="menu-title text-uppercase">{{$pizza->name}}</a>
                        <p class="menu-des">{{$pizza->description}} {{auth()->user()->id??0}}</p>
                        <div class="menu-price">
                            @if($pizza->pizza_of_the_day===1)
                            <span class="discount" style="color:#fff">{{$pizza->price}}</span>  
                            {{number_format((float)($pizza->price)-($pizza->price*0.33), 2, '.', '')}}
                            @else
                            {{$pizza->price}} 
                            @endif
                            €</div>      
                        <add-to-cart pizza-id="{{$pizza->id}}" user-id="{{auth()->user()->id??0}}"/>
                        <hr>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="menu-bottom-bg"><img src="images/menu-bottom-bg.png" alt="menu-bg"></div>
        </div>
    </section>

    <section class="about-pizzaplaza ptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="max-w-390">
                        <div class="headding-part">
                            <p class="headding-sub">a smile in every slice</p>
                            <h2 class="headding-title text-uppercase font-weight-bold">pizza plaza</h2>
                        </div>
                        <p class="online-des">Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit. Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend
                            libero curabitur Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit. Sit amet, consectetur adipiscing elit quisque eget maximus
                            velit, non eleifend libero curabitur </p>
                        <a href="/about" class="about-more-z com-btn">About</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about-pizzaplaza-img">
                        <img src="images/about-pizzaplaza.png" alt="about" class="pizzaplaza-ab">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="top-scrolling">
        <a href="#header" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </div>
    @endsection