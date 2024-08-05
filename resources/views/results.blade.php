@extends('layouts.main')
@section('title', 'Post By Category')
@section('content')
<section class="section">
  <div class="py-4"></div>
  <div class="container">
    <div class="row">
      <div
        class="col-lg-8  mb-5 mb-lg-0">
        <h1 class="h2 mb-4">Kết quả tìm kiếm cho <mark>{{$query}}</mark></h1>
        @foreach($posts as $post)
        <article class="card mb-4">
          <div class="post-slider">
            <img src="{{asset('uploads/'.$post->image)}}" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="mb-3"><a class="post-title" href="{{route('post.show', ['id' => $post->id]) }}">{{$post->title}}</a></h3>
            <ul class="card-meta list-inline">
              <!-- <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                <img src="images/john-doe.jpg">
                <span>Charls Xaviar</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li> -->
              <li class="list-inline-item">
                <i class="ti-calendar"></i>{{ $post->created_at->format('d M, Y') }}
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                @foreach(explode(',',$post->tag->name) as $tag)
                <li class="list-inline-item"><a href="">{{ $tag }}</a></li>
                @endforeach
                </ul>
              </li>
            </ul>
            <p>
            @if (strlen($post->content) > 200)
            {!! substr($post->content, 0, 200) !!} ...
            @else
                {!! $post->content !!}
            @endif
            </p>
            <a href="{{route('post.by_cate', ['cate_id' => $post->id]) }}" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
        @endforeach
        <!-- <article class="card mb-4">
          <div class="post-slider">
            <img src="images/post/post-8.jpg" class="card-img-top" alt="post-thumb">
            <img src="images/post/post-9.jpg" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes and Cashmere Recipe At Home</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                <img src="images/john-doe.jpg" alt="John Doe">
                <span>John Doe</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">Color</a></li>
                  <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                  <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
        <article class="card mb-4">
          <div class="post-slider">
            <img src="images/post/post-1.jpg" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="mb-3"><a class="post-title" href="post/post-1/">Use apples to give your bakes caramel and a moist texture</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                <img src="images/john-doe.jpg">
                <span>Charls Xaviar</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">Color</a></li>
                  <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                  <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
            <a href="post/post-1/" class="btn btn-outline-primary">Read More</a>
          </div>
        </article> -->
      </div>
      @include('partials.sidebar')
    </div>
  </div>
</section>
@endsection