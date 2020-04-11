@extends('BackEnd.layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card text-right">
            <div class="card-header card-header-primary" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">{{$title}}</h4>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    {{-- <a href="{{ route('contacts.create') }}">
                        <div class="btn btn-info" style="
                            color: white;
                            background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-user-plus"></i> اضافة اتصل بنا
                        </div>
                    </a> --}}
                </div>
                <div class="material-datatables">
                    {!! Form::open(['id'=>'form_data','url'=>aurl('user/destroy/all'),'method'=>'delete']) !!}
                        {!! $dataTable->table(['class'=>'dataTable table table-responsive table-striped table-hover  table-bordered'],true) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div id="multiDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('contacts.delete')}}</h4>
      </div>
      <div class="modal-body">
        <div class="empty_record hidden">
          <p>{{ trans('admin.please_check_some_record')}}</p>
        </div>
        <div class="not_empty_record hidden">
          <p>{{ trans('admin.ask_delete_item')}} <span class="record_count"></span> ?</p>
        </div>
      </div>
      <div class="modal-footer">
        <div class="empty_record hidden">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close')}}</button>
        </div>
        <div class="not_empty_record hidden">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no')}}</button>
          <input type="submit" name="delete_all" value="{{ trans('admin.yes')}}" class="btn btn-danger del_all">
        </div>
      </div>
    </div>

  </div>
</div>

@push('js')
{{-- <script>
delete_all();
</script> --}}
{{ $dataTable->scripts() }}
@endpush

@endsection
