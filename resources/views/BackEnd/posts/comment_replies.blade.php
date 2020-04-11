
 @foreach($comments as $comment)
 <div class="display-comment">
     <div class="row">
         <div class="card">
            <div class="card-header card-header-info text-right">
                 {{ $comment->user->name }}
                 <div class="pull-left">
                    <form action="{{route('comments.destroy' , $comment->id)}}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-white"></i></button>
                    </form>
                </div>
            </div>
             {{-- <div class="card-body">{{ $comment->comment }}</div> --}}
             <div class="card-footer">{{ $comment->comment }} <br>
                 {{$comment->created_at}}</div>
         </div>
     </div>

     <a href="" id="reply"></a>
     <form method="post" action="{{ route('replies.store') }}">
         @csrf
         <div class="form-group">
             <input type="text" name="comment" class="form-control" />
             <input type="hidden" name="post_id" value="{{ $post_id }}" />
             <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
         </div>
         <div class="form-group">
             <input type="submit" class="btn btn-primary" value="Reply" />
         </div>
     </form>
     @include('BackEnd.posts.comment_replies', ['comments' => $comment->replies])
 </div>
@endforeach




