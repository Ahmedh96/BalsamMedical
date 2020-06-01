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
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="fa fa-edit"></i> @lang('lang.Update Post')</h3>
            </div>
            <form action="{{route('posts.update' , $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @foreach (Config::get('translatable.locales') as $locale)
                        <div class="form-group">
                            <input type="text" name="{{ $locale }}[title]" class="form-control" placeholder="@lang('lang.' . $locale . '.title')"   value="{{ $post->translate($locale)->title }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="{{ $locale }}[description]" class="form-control"  cols="30" rows="10" placeholder="@lang('lang.' . $locale . '.description')">{{ $post->translate($locale)->description }}</textarea>
                        </div>
                        <br><br>
                    @endforeach
                    <div class="form-group">
                        <select class="form-control" name="category_id">
                            <option>@lang('lang.Select Parent Category')</option>
                            @foreach ($categories as $category)
                                <optgroup  label="{{ $category->name }}"></optgroup>

                                @foreach ($category->children as $child)
                                    <option value="{{ $child->id }}" {{$post->category_id == $child->id ? 'selected' : ''}}>{{ $child->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Image')</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->image}}" height="100" width="100">
                    </div>
                    <br>
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Meta Keywords')</label>
                        <input type="text" name="meta_keywords" class="form-control"  value="{{$post->meta_keywords }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Meta Description')</label>
                        <input type="text" name="meta_description" class="form-control"  value="{{$post->meta_description }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('lang.Save')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
