@extends('BackEnd.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary @if(app()->getLocale() == 'ar')  text-right @endif" style="background-color:#373a6c;">  <i class="fa fa-plus"></i> @lang('lang.Create Setting')</h3>
            </div>
            <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @foreach (Config::get('translatable.locales') as $locale)
                        <div class="form-group">
                            <input type="text" name="{{ $locale }}[sitename]" class="form-control" placeholder="@lang('lang.' . $locale . '.sitename')"   value="{{ old($locale . '.sitename') }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="{{ $locale }}[description]" class="form-control"  cols="30" rows="10" placeholder="@lang('lang.' . $locale . '.description')">{{ old($locale . '.description') }}</textarea>
                        </div>
                        <br><br>
                    @endforeach

                    <div class="form-group text-right">
                        <label>@lang('lang.Email')</label>
                        <input type="text" name="email" class="form-control"  value="{{ old('email') }}">
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Address')</label>
                        <input type="text" name="address" class="form-control"  value="{{ old('address') }}">
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Phone')</label>
                        <input type="text" name="phone" class="form-control"  value="{{ old('phone') }}">
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Facebook')</label>
                        <input type="text" name="facebook" class="form-control"  value="{{ old('facebook') }}">
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Instagram')</label>
                        <input type="text" name="instagram" class="form-control"  value="{{ old('instagram') }}">
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Twitter')</label>
                        <input type="text" name="twitter" class="form-control"  value="{{ old('twitter') }}">
                    </div>

                    <div>
                        <label>@lang('lang.Logo')</label>
                        <input type="file" name="logo" class="form-control">
                    </div>

                    <div>
                        <label>@lang('lang.Icon')</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                    <br>

                    <div>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option value="open">@lang('lang.Open')</option>
                            <option value="close">@lang('lang.Close')</option>
                        </select>
                    </div>

                    <div>
                        <select class="form-control" name="main_lang" id="exampleFormControlSelect1">
                            <option value="en">@lang('lang.English')</option>
                            <option value="ar">@lang('lang.Turkey')</option>
                            <option value="tr">@lang('lang.Arabic')</option>
                        </select>
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Message Maintenance')</label>
                        <textarea name="message_maintenance" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Keywords')</label>
                        <input type="text" name="keywords" class="form-control"  value="{{ old('subject') }}">
                    </div>
                </div>
                <div class="card-footer @if(app()->getLocale() == 'ar')  text-right @endif">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('lang.Create')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
