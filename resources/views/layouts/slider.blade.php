<section class="home-slider owl-carousel">
    @if ($LatestPosts)
        @foreach ($LatestPosts as $LatestPost)
            <div class="slider-item" style="background-image:url({{url('uploads/Posts/' . $LatestPost->image)}});" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-6 text ftco-animate">
                    <h1 class="mb-4">{{$LatestPost->title}}</h1>
                    <h3 class="subheading">{!! Str::limit($LatestPost->description , 30 )  !!}</h3>
                    <p><a href="{{route('front.post' , $LatestPost->slug)}}" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
                </div>
                </div>
                </div>
            </div>
        @endforeach
    @endif
</section>
