<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Settings\Store;
use App\Http\Requests\BackEnd\Settings\Update;
use App\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Setting::all();
        return view('BackEnd.settings.index' , compact('settings'))->with('title' , trans('lang.Settings Management'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.settings.create')->with('title' , trans('lang.Create Setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $data = $request->all();

        //upload Logo
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Settings/Logo') , $fileName);
            $data['logo'] = $fileName;
        }

        //upload Icon
        if($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Settings/Icon') , $fileName);
            $data['icon'] = $fileName;
        }

        $setting = Setting::create($data);
        Alert::success(trans('lang.record_update'));
        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrfail($id);
        return view('BackEnd.settings.edit' , compact('setting'))->with('title' , trans('lang.Edit Setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $data = $request->all();

        $setting = Setting::findOrfail($id);

        //upload Logo
        if($request->hasFile('logo')) {
            if($setting->logo)
            {
                @unlink('uploads/Settings/Logo/'.$setting->logo);
            }
            $file = $request->file('logo');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Settings/Logo') , $fileName);
            $data['logo'] = $fileName;
        }

        //upload Icon
        if($request->hasFile('icon')) {
            if($setting->icon)
            {
                @unlink('uploads/Settings/Icon/'.$setting->icon);
            }
            $file = $request->file('icon');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Settings/Icon') , $fileName);
            $data['icon'] = $fileName;
        }


        $setting->update($data);


        Alert::success(trans('lang.record_update'));
		return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrfail($id);
        //upload Logo
        if(!empty($setting->logo)) {
            if($setting->logo)
            {
                @unlink('uploads/Settings/Logo/'.$setting->logo);
            }
        }

        //upload Icon
        if(!empty($setting->icon)) {
            if($setting->icon)
            {
                @unlink('uploads/Settings/Icon/'.$setting->icon);
            }
        }
        $setting->delete();
        return redirect()->route('settings.index');
    }

}
