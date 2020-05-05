@extends('BackEnd.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="fa fa-plus"></i> @lang('lang.Create Setting')</h3>
            </div>
            <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.SiteName')</label>
                        <input type="text" name="sitename" class="form-control"  value="{{ old('sitename') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Email')</label>
                        <input type="text" name="email" class="form-control"  value="{{ old('email') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Address')</label>
                        <input type="text" name="address" class="form-control"  value="{{ old('address') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Phone')</label>
                        <input type="text" name="phone" class="form-control"  value="{{ old('phone') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Facebook')</label>
                        <input type="text" name="facebook" class="form-control"  value="{{ old('facebook') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Instagram')</label>
                        <input type="text" name="instagram" class="form-control"  value="{{ old('instagram') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Twitter')</label>
                        <input type="text" name="twitter" class="form-control"  value="{{ old('twitter') }}">
                    </div>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Logo')</label>
                        <input type="file" name="logo" class="form-control">
                    </div>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Icon')</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('lang.Status')</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option value="open">@lang('lang.Open')</option>
                            <option value="close">@lang('lang.Close')</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('lang.Main Lang')</label>
                        <select class="form-control" name="main_lang" id="exampleFormControlSelect1">
                            <option value="en">@lang('lang.English')</option>
                            <option value="ar">@lang('lang.Turkey')</option>
                            <option value="tr">@lang('lang.Arabic')</option>
                        </select>
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Message Maintenance')</label>
                        <textarea name="message_maintenance" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Keywords')</label>
                        <input type="text" name="keywords" class="form-control"  value="{{ old('subject') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Description')</label>
                        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('lang.Create')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
