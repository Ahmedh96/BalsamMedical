<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Posts\Store;
use App\Http\Requests\BackEnd\Posts\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
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
                $posts = Post::orderBy($explode[0] , $explode[1])->paginate(10);
            } else {
                $posts = Post::where('status' , $status)->paginate(10);
            }

        } else {
            $posts = Post::paginate(10);

        }

        return view('BackEnd.posts.index')->with([
          'posts'  => $posts,
          'title'  => trans('lang.Posts Management')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id' , null)->get();
        return view('BackEnd.posts.create' , compact('categories'))->with('title' , trans('lang.Create Post'));;
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

        //upload Image
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Posts') , $fileName);
            $data['image'] = $fileName;
        }
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::user()->id;
        $post = Post::create($data);
        Alert::success(trans('lang.record_update'));
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('BackEnd.posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('BackEnd.posts.edit' , compact('post'))->with('title' , trans('lang.Edit Post'));;
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

        $post = Post::findOrfail($id);

        //upload Logo
        if($request->hasFile('image')) {
            if($post->image)
            {
                @unlink('uploads/Posts/'.$post->image);
            }
            $file = $request->file('image');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Posts') , $fileName);
            $data['image'] = $fileName;
        }


        $post->update($data);


        Alert::success(trans('lang.record_update'));
		return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //upload Image
        if(!empty($post->image)) {
            if($post->image)
            {
                @unlink('uploads/Posts/'.$post->image);
            }
        }
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function search(Request $request) {
        $search = strip_tags($request->search);
        $posts = Post::where('title' , 'like' , '%' .$search . '%')->orWhere('id' , 'like' , '%' . $search . '%')->orderBy('id' , 'desc')->paginate(10);
        return view('BackEnd.posts.index' , compact('posts'));
    }
}
