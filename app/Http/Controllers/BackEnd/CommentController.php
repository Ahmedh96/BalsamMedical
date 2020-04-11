<?php

namespace App\Http\Controllers\BackEnd;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Comments\Store;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth','verified']);
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
        $data['user_id'] = Auth::user()->id;

        Comment::create($data);

        return redirect()->back();
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
        $categories = Category::with('children')->get();
        return view('BackEnd.categories.edit' , compact('category' , 'categories'));
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
        $comment = Comment::find($id);
        $comment->delete();

        return back();
    }


    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate(Auth::user()->id);
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }

}
