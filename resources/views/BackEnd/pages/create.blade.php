@extends('BackEnd.layouts.master')

@push('js')
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary @if(app()->getLocale() == 'ar')  text-right @endif" style="background-color:#373a6c;">  <i class="fa fa-plus"></i> @lang('lang.Create Page')</h3>
            </div>
            <form action="{{route('pages.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    @foreach (Config::get('translatable.locales') as $locale)
                        <div class="form-group">
                            <input type="text" name="{{ $locale }}[name]" class="form-control" placeholder="@lang('lang.' . $locale . '.name')"   value="{{ old($locale . '.name') }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="{{ $locale }}[description]" class="form-control"  cols="30" rows="10" placeholder="@lang('lang.' . $locale . '.description')" id="summernote" cols="30" rows="10">{{ old($locale . '.description') }}</textarea>
                        </div>
                        <br><br>
                    @endforeach

                    <div class="form-group text-right">
                        <label>@lang('lang.Meta Keywords')</label>
                        <textarea name="meta_keywords" class="form-control" id="" cols="30" rows="10">{{ old('meta_keywords') }}</textarea>
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Meta Description')</label>
                        <textarea name="meta_description" class="form-control" id="" cols="30" rows="10">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
                <div class="card-footer @if(app()->getLocale() == 'ar') text-right @endif">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('lang.Create')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
