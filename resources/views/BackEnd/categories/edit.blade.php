@extends('BackEnd.layouts.master')

@section('title')
Categories | Edit
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-header card-header-primary @if(app()->getLocale() == 'ar') text-right @endif" style="background-color:#373a6c;">  <i class="material-icons">folder</i> @lang('lang.Edit Category')</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.update' , $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach (Config::get('translatable.locales') as $locale)
                        <div class="form-group">
                            <input type="text" name="{{ $locale }}[name]" class="form-control" placeholder="@lang('lang.' . $locale . '.name')"   value="{{ $category->translate($locale)->name }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="{{ $locale }}[description]" class="form-control"  cols="30" rows="10" placeholder="@lang('lang.' . $locale . '.description')">{{ $category->translate($locale)->description }}</textarea>
                        </div>
                        <br><br>
                    @endforeach

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Meta Keywords')</label>
                        <textarea name="meta_keywords" class="form-control" id="" cols="30" rows="10">{{$category->meta_keywords }}</textarea>
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Meta Description')</label>
                        <textarea name="meta_description" class="form-control" id="" cols="30" rows="10">{{$category->meta_description }}</textarea>
                    </div>
                    <br>
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
