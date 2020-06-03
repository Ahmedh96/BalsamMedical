@extends('BackEnd.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary @if(app()->getLocale() == 'ar') text-right @endif" style="background-color:#373a6c;">  <i class="fa fa-user-plus"></i> @lang('lang.Create Contact')</h3>
            </div>
            <form action="{{route('contacts.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Name')</label>
                        <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Email')</label>
                        <input type="text" name="email" class="form-control"  value="{{ old('email') }}">
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">نوع الرسالة</label>
                        <select class="form-control" name="type_message" id="exampleFormControlSelect1">
                            <option value="0">لا شيء</option>
                            <option value="1">اقتراح</option>
                            <option value="2">تنبية</option>
                            <option value="3">استفسار</option>
                        </select>
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Subject')</label>
                        <input type="text" name="subject" class="form-control"  value="{{ old('subject') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Message')</label>
                        <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="card-footer @if(app()->getLocale() == 'ar') text-right @endif">
                    <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> @lang('lang.Create')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
