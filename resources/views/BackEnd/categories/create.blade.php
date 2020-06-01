@extends('BackEnd.layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-header card-header-primary @if(app()->getLocale() == 'ar') text-right @endif" style="background-color:#373a6c;">  <i class="material-icons">folder</i> @lang('lang.Create Category')</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    @foreach (Config::get('translatable.locales') as $locale)
                        <div class="form-group">
                            <input type="text" name="{{ $locale }}[name]" class="form-control" placeholder="@lang('lang.' . $locale . '.name')"   value="{{ old($locale . '.name') }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="{{ $locale }}[description]" class="form-control"  cols="30" rows="10" placeholder="@lang('lang.' . $locale . '.description')">{{ old($locale . '.description') }}</textarea>
                        </div>
                        <br><br>
                    @endforeach

                    <div class="form-group">
                        <input type="text" name="meta_keywords" class="form-control" placeholder="@lang('lang.Type Meta Keywords')" value="{{old('meta_keywords')}}">
                    </div>

                    <div class="form-group">
                        <input type="text" name="meta_description" class="form-control" placeholder="@lang('lang.Type Meta Description')" value="{{old('meta_description')}}">
                    </div>
                    <br>
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                        <button type="submit" class="btn btn-primary">@lang('lang.Create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
