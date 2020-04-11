@extends('layouts.style')

@section('content')
    <!--================Map Area =================-->
    <section class="section section-lg section-shaped">
        <div class="shape shape-style-1 shape-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container py-md">
            <div class="row row-grid justify-content-between align-items-center">
                <div class="col-lg-5 mb-lg-auto">
                    <div>
                    <div class="card bg-white shadow border-0 text-center">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>{{$page->name}}</small>
                            </div>
                            <div class="card-body">
                                <p>{!! $page->description !!}</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-10 mx-md-auto">
                    <img class="ml-lg-5" src="{{url('design/FrontEnd')}}/assets/img/ill/ill.png" width="100%">
                </div>
            </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <!--================End Map Area =================-->

@endsection
