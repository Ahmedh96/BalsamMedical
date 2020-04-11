<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Pages\Store;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
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
    public function index($status = null)
    {
        $array = [
            'id-desc' , 'id-asc' , 'created_at-desc' , 'created_at-asc'
        ];

        if($status != null) {

            $explode = explode('-' , $status );
            if(in_array($status , $array) ){
                $pages = Page::orderBy($explode[0] , $explode[1])->paginate(10);
            }

        } else {
            $pages = Page::paginate(10);

        }

        return view('BackEnd.pages.index')->with([
          'pages'  => $pages,
          'title'  => trans('lang.Pages Management')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.pages.create')->with('title' , trans('lang.Create Page'));;
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
        $data['slug'] = Str::slug($request->name);

        $page = Page::create($data);
        Alert::success(trans('lang.record_update'));
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('BackEnd.pages.edit' , compact('page'))->with('title' , trans('lang.Edit Page'));;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, $id)
    {
        $data = $request->all();

        $page = Page::findOrfail($id);

        $page->update($data);


        Alert::success(trans('lang.record_update'));
		return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->route('pages.index');
    }

    public function search(Request $request) {
        $search = strip_tags($request->search);
        $pages = Page::where('name' , 'like' , '%' .$search . '%')->orWhere('id' , 'like' , '%' . $search . '%')->orderBy('id' , 'desc')->paginate(10);
        return view('BackEnd.pages.index' , compact('pages'));
    }
}
