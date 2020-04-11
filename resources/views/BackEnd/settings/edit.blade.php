@extends('BackEnd.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="fa fa-edit"></i> @lang('lang.Edit Setting')</h3>
            </div>
            <form action="{{route('settings.update' , $setting->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.SiteName')</label>
                        <input type="text" name="sitename" class="form-control"  value="{{ $setting->sitename }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Email')</label>
                        <input type="text" name="email" class="form-control"  value="{{ $setting->email }}">
                    </div>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Logo')</label>
                        <input type="file" name="logo" class="form-control"  value="{{ $setting->logo }}">
                    </div>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Icon')</label>
                        <input type="file" name="icon" class="form-control"  value="{{ $setting->icon }}" >
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('lang.Status')</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option value="open"  {{isset($setting->status) && $setting->status == "open" ? 'selected' : ''}}>@lang('lang.Open')</option>
                            <option value="close" {{isset($setting->status) && $setting->status == "close" ? 'selected' : ''}}>@lang('lang.Close')</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('lang.Main Lang')</label>
                        <select class="form-control" name="main_lang" id="exampleFormControlSelect1">
                            <option value="en" {{isset($setting->main_lang) && $setting->main_lang == "en" ? 'selected' : ''}}>@lang('lang.English')</option>
                            <option value="tr" {{isset($setting->main_lang) && $setting->main_lang == "tr" ? 'selected' : ''}}>@lang('lang.Turkey')</option>
                            <option value="ar" {{isset($setting->main_lang) && $setting->main_lang == "ar" ? 'selected' : ''}}>@lang('lang.Arabic')</option>
                        </select>
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Message Maintenance')</label>
                        <textarea name="message_maintenance" cols="30" rows="10" class="form-control">{{  $setting->message_maintenance }}</textarea>
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Keywords')</label>
                        <input type="text" name="keywords" class="form-control"  value="{{  $setting->keywords }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Description')</label>
                        <textarea name="description" cols="30" rows="10" class="form-control">{{  $setting->description }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> @lang('lang.Save')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection