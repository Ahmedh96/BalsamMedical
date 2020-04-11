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
                    <div class="card bg-white shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h1>@lang('lang.Contact')</h1>
                            </div>
                            <form role="form" action="{{route('front.contactSend')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="@lang('lang.Name')" name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="@lang('lang.Email')" name="email" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="form-group focused">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-send"></i></span>
                                        </div>
                                        <select class="form-control" name="type_message" id="exampleFormControlSelect1">
                                            <optgroup label="نوع الرسالة"></optgroup>
                                            <option value="0">غير ذلك</option>
                                            <option value="1">اقتراح</option>
                                            <option value="2">تنبية</option>
                                            <option value="3">استفسار</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group focused">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hospital-o"></i></span>
                                        </div>
                                        <input type="text" name="subject" placeholder="@lang('lang.Subject')" class="form-control"  value="{{ old('subject') }}">
                                    </div>
                                </div>
                                <div class="form-group focused">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <textarea name="bodyMessage" id="" cols="30" rows="10" class="form-control"></textarea>
                                        {{-- <textarea name="msg" id="" cols="30" rows="10" class="form-control"></textarea> --}}
                                    </div>
                                </div>
                                {{-- <div class="form-group focused">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <textarea name="www" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div> --}}
                                <div class="text-center">
                                <button type="submit" class="btn btn-secondary my-4">@lang('lang.Submit')</button>
                                </div>
                            </form>
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
