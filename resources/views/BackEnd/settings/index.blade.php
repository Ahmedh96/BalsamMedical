@extends('BackEnd.layouts.master')

@push('js')
<script>

$('button#deleteButton').on('click', function(e){
var name = $(this).data('name');
e.preventDefault();
swal({
    title: "Careful!",
    text: "Are you sure you want to delete "+name+"?",
    icon: "warning",
    dangerMode: true,
    buttons: {
      cancel: "Exit",
      confirm: "Confirm",
    },
})
.then ((willDelete) => {
    if (willDelete) {
       $(this).closest("form").submit();
    }
});
});

</script>
@endpush


@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-lg-2">
            @if ($settings)
                <a href="{{ route('settings.create') }}">
                    <div class="btn btn-info" style="
                        color: white;
                        background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-plus"></i> اضافة اعدادات
                    </div>
                </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-primary text-right" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
                    <div class="card-icon">
                    <i class="material-icons">settings</i>
                    </div>
                    <h4 class="card-title">{{$title}}</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>@lang('lang.ID')</th>
                                    <th>@lang('lang.SiteName')</th>
                                    <th>@lang('lang.Logo')</th>
                                    <th>@lang('lang.Icon')</th>
                                    <th>@lang('lang.Email')</th>
                                    <th>@lang('lang.Status')</th>
                                    <th>@lang('lang.Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{$setting->id}}</td>
                                        <td>{{$setting->sitename}}</td>
                                        <td>
                                            <img src="{{url('uploads/Settings/Logo/'.$setting->logo)}}" alt="{{$setting->logo}}" width="100" height="100">
                                        </td>
                                        <td>
                                            <img src="{{url('uploads/Settings/Icon/'.$setting->icon)}}" alt="{{$setting->icon}}" width="100" height="100">
                                        </td>
                                        <td>{{$setting->email}}</td>
                                        <td>
                                            @if ($setting->status == 'open')
                                                <span class="label label-success">مفتوح</span>
                                            @else
                                                <span class="label label-inverse">مغلق</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('settings.edit' , $setting->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                            {{-- <div class=""></div> --}}
                                            <form action="{{route('settings.destroy' , $setting->id)}}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" id="deleteButton" data-name="{{ $setting->name }}"><i class="material-icons">close</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
