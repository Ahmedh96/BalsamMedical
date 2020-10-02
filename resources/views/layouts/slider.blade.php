<section class="home-slider owl-carousel" style="direction: ltr">
    @if ($LatestPosts)
        @foreach ($LatestPosts as $LatestPost)
            <div class="slider-item img-responsive" style="background-image:url({{url('uploads/Posts/' . $LatestPost->image)}});" data-stellar-background-ratio="0.5">
                {{-- <img src="{{url('uploads/Posts/' . $LatestPost->image)}}" alt="{{$LatestPost->title}}" title="{{$LatestPost->title}}"> --}}
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-12 text ftco-animate">
                        <h1 class="mb-4" style="color:black">{{$LatestPost->title}}</h1>
                        <!-- <h3 class="subheading">{!! Str::limit($LatestPost->description , 30 )  !!}</h3> -->
                        <p><a href="{{route('front.post' , [$LatestPost->id , str_replace_me($LatestPost->title)])}}" title="{{$LatestPost->title}}" class="btn btn-secondary px-4 py-3 mt-3">@lang('lang.Show Details')</a></p>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</section>
