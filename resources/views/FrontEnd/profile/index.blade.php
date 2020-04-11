@extends('layouts.style')


@section('content')
    <!--================Map Area =================-->

    <section class="section bg-secondary">
        <div class="container">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                  <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                      <div class="card-profile-image">
                        <a href="javascript:;">
                          <img src="{{url('uploads/Users/'.$user->image)}}" class="rounded-circle" width="150" height="150">
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-4 order-lg-1">
                      <div class="card-profile-stats d-flex justify-content-center">
                        <div class="mt-5">
                          <span class="heading">{{$user->comments->count()}}</span>
                          <span class="description">Comments</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-5">
                    <h3>@lang('lang.Profile')</h3>
                    <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{$user->name}}</div>
                  </div>
                  <div class="mt-5 py-5 border-top text-center">
                    <div class="row justify-content-center">
                      <div class="col-lg-9">
                        <form action="{{route('front.UpdateProfile' , $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <input type="text" name="admin" hidden value="{{$user->admin}}">
                                <input type="text" name="email_verified_at" hidden value="{{$user->email_verified_at}}">
                                <div class="form-group">
                                    <label for="name">@lang('lang.Name')</label>
                                    <input type="text" name="name" class="form-control" placeholder="@lang('lang.Type Name')" value="{{$user->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="email">@lang('lang.Email')</label>
                                    <input type="text" name="email" class="form-control" placeholder="@lang('lang.Type Email')" value="{{$user->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="password">@lang('lang.Password')</label>
                                    <input type="password" name="password" class="form-control" placeholder="@lang('lang.Type Password')">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">@lang('lang.Password Confirmation')</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('lang.Type Password Confirmation')">
                                </div>

                                <div>
                                    <label class="bmd-label-floating">@lang('lang.Image')</label>
                                    <input type="file" name="image" class="form-control"  value="{{ $user->image }}">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>@lang('lang.Save')</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Map Area =================-->

@endsection
