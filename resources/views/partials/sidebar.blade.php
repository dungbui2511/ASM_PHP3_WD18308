<aside class="col-lg-4 sidebar-home">
  <!-- Search -->
  <div class="widget">
    <h4 class="widget-title"><span>Tìm kiếm</span></h4>
    <form action="{{route('search')}}" method="GET" class="widget-search">
      <input class="mb-3" id="search-query" name="query" type="search" placeholder="Type &amp; Hit Enter...">
      <i class="ti-search"></i>
      <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
    </form>
  </div>
  <div class="widget widget-categories">
    <h4 class="widget-title"><span>Danh mục</span></h4>
    <ul class="list-unstyled widget-list">
    @foreach ($categories as $category)
    <li>
        <a href="" class="d-flex">
            {{ $category->name }}
            <small class="ml-auto">({{ count($category->posts) }})</small>
        </a>
    </li>
   @endforeach
    </ul>
  </div><!-- tags -->
 <!-- recent post -->
  <div class="widget">
    <h4 class="widget-title">Tin gần đây</h4>

    <!-- post-item -->
   @foreach($trendingPosts as $t_post)
   <article class="widget-card">
      <div class="d-flex">
        <img class="card-img-sm" src="{{asset('uploads/'.$t_post->image)}}">
        <div class="ml-3">
          <h5><a class="post-title" href="{{ route('post.show', ['id' => $t_post->id]) }}">{{$t_post->title}}</a></h5>
          <ul class="card-meta list-inline mb-0">
            <li class="list-inline-item mb-0">
              <i class="ti-calendar"></i>{{ $t_post->updated_at->format('d M, Y') }}
            </li>
          </ul>
        </div>
      </div>
    </article>
   @endforeach
  </div>
  <!-- Social -->
  <div class="widget">
    <h4 class="widget-title"><span>Social Links</span></h4>
    <ul class="list-inline widget-social">
      <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
      <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
    </ul>
  </div>
</aside>
