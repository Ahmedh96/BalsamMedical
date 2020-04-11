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
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="fa fa-plus"></i> @lang('lang.Create Page')</h3>
            </div>
            <form action="{{route('pages.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Name')</label>
                        <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                    </div>
                    <br>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Description')</label>
                        <textarea name="description" class="form-control" id="summernote" cols="30" rows="10"></textarea>
                    </div>
                    <br>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Meta Keywords')</label>
                        <input type="text" name="meta_keywords" class="form-control"  value="{{ old('meta_keywords') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Meta Description')</label>
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
