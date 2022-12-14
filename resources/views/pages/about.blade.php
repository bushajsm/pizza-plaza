@extends('layouts.frontend')

@section('content')

<section class="page-banner" style="background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url(images/blog-7.jpg);background-repeat: no-repeat;  background-position: center;background-size:cover">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">About</h1>
                    <ul>
                        <li><a href="/" class="page-name">Home</a></li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section pt-100">
    <div class="container">
        <div class="row flex-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about-img"><img src="images/about-1.jpg" alt="about"></div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="about-text">
                    <div class="headding-part">
                        <p class="headding-sub">a smile in every slice</p>
                        <h2 class="headding-title text-uppercase font-weight-bold">about us</h2>
                    </div>
                    <div class="about-desc">
                        <p class="desc-about">Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit. Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero curabitur Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero curabitur dapibus mauris sed leo cursus aliquetcras suscipit. Sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-story pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="headding-part text-center">
                    <p class="headding-sub">Discover</p>
                    <h2 class="headding-title text-uppercase font-weight-bold">OUR STORY</h2>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="story text-center">
                    <p class="story-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful</p>
                    <img src="images/story.png" alt="story">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection