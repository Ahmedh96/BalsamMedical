<?php
if(!function_exists('aurl'))
{
    function aurl($url = null)
    {
        return url('Balsam/'.$url);
    }
}

if (!function_exists('str_replace_me')) {
	function str_replace_me($name) {
		return trim(str_replace(' ' , '_' , $name));
	}
}


if(!function_exists('lang'))
{
    function lang()
    {
        if(session()->has('lang')) {
            return session('lang');
        } else {
            session()->put('lang', setting()->main_lang);
			return setting()->main_lang;
        }
    }
}

if (!function_exists('setting')) {
	function setting() {
		return \App\Setting::orderBy('id', 'desc')->first();
	}
}
if(!function_exists('datatable_lang'))
{
    function datatable_lang()
    {
        return [
            "sProcessing" => trans('admin.sProcessing'),
            "sLengthMenu" => trans('admin.sLengthMenu'),
            "sZeroRecords" => trans('admin.sZeroRecords'),
            "sEmptyTable" => trans('admin.sEmptyTable'),

            "sInfo" => trans('admin.sInfo'),
            "sInfoEmpty" => trans('admin.sInfoEmpty'),
            "sInfoFiltered" => trans('admin.sInfoFiltered'),
            "sInfoPostFix" => trans('admin.sInfoPostFix'),


            "sSearch" => trans('admin.sSearch'),
            "sUrl" => trans('admin.sUrl'),
            "sInfoThousands" => trans('admin.sInfoThousands'),
            "sLoadingRecords" => trans('admin.sLoadingRecords'),

            "oPaginate" => [
                "sFirst" => trans('admin.sFirst'),
                "sLast" => trans('admin.sLast'),
                "sNext" => trans('admin.sNext'),
                "sPrevious" => trans('admin.sPrevious'),
            ],

            "oAria" => [
                "sSortAscending" => trans('admin.sSortAscending'),
                "sSortDescending" => trans('admin.sSortDescending'),
            ],
        ];
    }
}
