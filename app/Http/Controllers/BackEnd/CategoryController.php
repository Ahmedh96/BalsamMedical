<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Http\Requests\BackEnd\Categories\Update;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
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
                $categories = Category::orderBy($explode[0] , $explode[1])->paginate(10);

            } else {
                $categories = Category::where('status' , $status)->paginate(10);
            }

        } else {
            $categories = Category::paginate(10);

        }

        //$categories = Category::with('children')->get();

        return view('BackEnd.categories.index')->with([
          'categories'  => $categories,
          'title' => trans('lang.Categories Management')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('BackEnd.categories.create' , compact('categories'))->with('title' , trans('lang.Create Category'));;
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


        //$data = $request->except('_token');
       // dd($data);

        Category::create($data);
        Alert::success(trans('lang.record_update'));
        return redirect()->route('categories.index');
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
        $category = Category::find($id);
        return view('BackEnd.categories.edit' , compact('category'))->with('title' , trans('lang.Edit Category'));;
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
        $data['slug'] = Str::slug($request->name);

        $data = $request->except(['_token', '_method']);

        Category::find($id)->update($data);
        Alert::success( trans('lang.record_update'));
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index');
    }


    public function search(Request $request) {
        $search = strip_tags($request->search);
        $categories = Category::where('name' , 'like' , '%' .$search . '%')->orWhere('id' , 'like' , '%' . $search . '%')->orderBy('id' , 'desc')->paginate(10);
        return view('BackEnd.categories.index' , compact('categories'));
    }
}
