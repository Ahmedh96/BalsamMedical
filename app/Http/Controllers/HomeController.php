<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Contact;
use App\Http\Requests\FrontEnd\Comments\Add;
use App\Http\Requests\FrontEnd\Replays\Replay;
use App\Http\Requests\FrontEnd\Contacts\Store;
use App\Http\Requests\FrontEnd\Users\Update;
use App\Mail\ContactForMail;
use App\Page;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //  public function __construct() {
    //     $this->middleware('verified');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postlatest = Post::orderBy('id', 'desc')->take(3)->get();
        return view('home' , compact('postlatest'));
    }

    public function CategoryPost($slug) {
        $category = Category::where('slug' , $slug)->firstOrfail();
        // $posts = Post::where('category_id' , $category->id)->with('user' , 'category')->orderBy('id' , 'desc')->paginate(20);
        return view('FrontEnd.category.index' , compact('category'));
    }

    public function Post($slug) {
        $post = Post::where('slug' , $slug)->firstOrfail();
        return view('FrontEnd.post.index' , compact('post'));
    }

    public function Page($slug) {
        $page = Page::where('slug' , $slug)->firstOrfail();
        return view('FrontEnd.page.index' , compact('page'));
    }

    public function ContactUS() {
        return view('FrontEnd.contact.index');
    }

    public function ContactSend(Store $request) {
        $data = $request->all();
        $contact = Contact::create($data);
        Mail::send(new ContactForMail($data));
        Alert::success(trans('lang.Title'), trans('lang.record_update'));
        return redirect()->back();
    }

    public function Add_Comment(Add $request) {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        Comment::create($data);

        return redirect()->back();
    }

    public function Replay_Comment(Add $request) {
        $data = $request->all();
        $reply = new Comment();
        $reply->comment = $data['comment'];
        $reply->user()->associate(Auth::user()->id);
        $reply->parent_id = $data['comment_id'];
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);
        return back();
    }

    public function Delete_Comment($id) {
        $comment = Comment::findOrfail($id);
        $comment->delete();
        return back();
    }

    public function Profile($id) {
        $user   = User::findOrfail($id);
        if (Auth::user()->id === $user->id ) {
            return view('FrontEnd.profile.index' , compact('user'));
        } else {
            return back();
        }
    }

    public function UpdateProfile($id , Request $request) {
        $data = $request->all();
        $user = User::findOrfail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(isset($data['password']) && $data['password'] != '' && $data['password'] == $data['password_confirmation']) {
            $user->password = bcrypt(request()->get('password'));
        } else {
            unset($user->password);
        }

        //upload Image
        if($request->hasFile('image')) {
            if($user->image)
            {
                @unlink('uploads/Users/'.$user->image);
            }
            $file = $request->file('image');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Users') , $fileName);
            $data['image'] = $fileName;
            $user->image = $data['image'];
        }
        $user->admin = $data['admin'];
        $user->email_verified_at = isset($data['email_verified_at']) ? $data['email_verified_at'] : NULL;
        $user->save();
        Alert::success(trans('lang.Title'), trans('lang.record_update'));
        return back();
    }

    public function SiteSearch(Request $request) {
        $search = strip_tags($request->search);
        $post = Post::where('title' , 'like' , '%' .$search . '%')->orWhere('id' , 'like' , '%' . $search . '%')->firstOrfail();;
        return view('FrontEnd.post.index' , compact('post'));
    }
}

