@extends('layouts.frontend')

@section('content')

<section class="page-banner" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(images/blog-3.jpg);background-repeat: no-repeat;  background-position: center;background-size:cover">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1 class="page-headding">Admin</h1>
                    <ul>
                        <li><a href="/" class="page-name">Home</a></li>
                        <li>Admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<admin-view/>
@endsection