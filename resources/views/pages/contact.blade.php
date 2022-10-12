@extends('layouts.frontend')

@section('content')

<section class="page-banner" style="background: linear-gradient( rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) ), url(images/blog-7.jpg);background-repeat: no-repeat;  background-position: center;background-size:cover">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">Contact</h1>
                    <ul>
                        <li><a href="/" class="page-name">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact ptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="headding-part text-center">
                    <p class="headding-sub">Get in touch</p>
                    <h2 class="headding-title text-uppercase font-weight-bold">contact us</h2>
                </div>
            </div>
        </div>
        <div class="contact-in">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="contact-detail">
                        <h3 class="contact-head">Contact Details</h3>
                        <p class="contact-desc">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                        <ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:void(0)">01243 Gießen/Langgöns</a></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+49 123 123 123 12">+49 123 123 123 12, +49 123 123 123 12</a></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:me@pizza-plaza.com">me@pizza-plaza.com</a></li>
                            <li>
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <a href="javascript:void(0)">
                                    <span>Monday – Saturday: 10 am – 10pm</span>
                                    <span>Sunday: Closed</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="leave">
                        <form>
                            <div class="form-group">
                                <input type="text" name="Email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="Subject" class="form-control" placeholder="Subject" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="Phone" class="form-control" placeholder="Phone" required="">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                            <input type="submit" name="submit" value="Send Message" class="post-com">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d98012.50821908786!2d8.599979588700084!3d50.48488799376925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bc56f56cf7254f%3A0x422435029b0a4d0!2s35428%20Langg%C3%B6ns%2C%20Almanya!5e0!3m2!1str!2str!4v1665496463676!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection