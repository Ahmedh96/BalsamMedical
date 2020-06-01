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
                        <input type="text" name="meta_keywords" class="form-control"  value="{{ old('meta_keywords') }}">
                    </div>

                    <div class="form-group text-right">
                        <label>@lang('lang.Meta Description')</label>
                        <input type="text" name="meta_description" class="form-control"  value="{{ old('meta_description') }}">
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
