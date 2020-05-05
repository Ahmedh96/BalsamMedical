@extends('BackEnd.layouts.master')

@section('title')
Categories | Edit
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="material-icons">policy</i> @lang('lang.Edit Category')</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.update' , $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Category Name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">meta_keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" placeholder="@lang('lang.Type Email')" value="{{$category->meta_keywords}}">
                    </div>

                    <div class="form-group">
                        <label for="email">meta_description</label>
                        <input type="text" name="meta_description" class="form-control" placeholder="@lang('lang.Type Email')" value="{{$category->meta_description}}">
                    </div>
                    <br>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
