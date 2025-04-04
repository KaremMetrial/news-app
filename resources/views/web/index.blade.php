@extends('layouts.web.app')
@section('body')
    <div class="top-news">
      <div class="container">
        <div class="row">
            @php
                $latest_three_posts = $posts->take(3);
            @endphp
          <div class="col-md-6 tn-left">
            <div class="row tn-slider">
            @foreach($latest_three_posts as $post)
              <div class="col-md-6">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                  <div class="tn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-6 tn-right">
            <div class="row">
            @php
                $four_posts = $posts->take(4);
            @endphp
            @foreach($four_posts as $post)
              <div class="col-md-6">
                <div class="tn-img">
                  <img src="{{ $post->images->first()->path }}" />
                  <div class="tn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top News End-->

    <!-- Category News Start-->
    <div class="cat-news">
      <div class="container">
        <div class="row">
        @foreach($categories_with_posts as $cat)
        <div class="col-md-6">
            <h2>{{ $cat->name }}</h2>
            <div class="row cn-slider">
              @foreach($cat->posts as $cat_posts)
              <div class="col-md-6">
                <div class="cn-img">
                  <img src="{{ $cat_posts->images->first()->path }}" />
                  <div class="cn-title">
                    <a href="">{{ $cat_posts->title }}</a>
                 </div>
                </div>
              </div>
            @endforeach
            </div>
        </div>
        @endforeach
        </div>
      </div>
    </div>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#featured"
                  >Oldest News</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#popular"
                  >Popular News</a
                >
              </li>
            </ul>

            <div class="tab-content">
              <div id="featured" class="container tab-pane active">
              @foreach($oldest_news as $old_new)
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="{{ $old_new->images->first()->path }}" />
                  </div>
                  <div class="tn-title">
                    <a href="">{{ $old_new->title }}</a>
                  </div>
                </div>
              @endforeach
              </div>
              <div id="popular" class="container tab-pane fade">
              @foreach($popular_posts as $popular_post)
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="{{ $popular_post->images->first()->path }}" />
                  </div>
                  <div class="tn-title">
                    <a href="">{{ $popular_post->title }}</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#m-viewed"
                  >Latest News</a
                >
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#m-recent"
                  >Most Read</a
                >
              </li>
            </ul>

            <div class="tab-content">
            {{-- Content Latest News --}}
              <div id="m-viewed" class="container tab-pane active">
              @foreach ($latest_three_posts as $latest)
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="{{ $latest->images->first()->path }}" />
                  </div>
                  <div class="tn-title">
                    <a href="">{{ $latest->title }}</a>
                  </div>
                </div>
              @endforeach
             </div>

              <div id="m-recent" class="container tab-pane fade">
                @foreach($most_view as $view)
                <div class="tn-news">
                  <div class="tn-img">
                    <img src="{{ $view->images->first()->path }}" />
                  </div>
                  <div class="tn-title">
                    <a href="">{{ $view->title }}</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <div class="main-news">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="row">
            @foreach($posts as $post)
              <div class="col-md-4">
                <div class="mn-img">
                  <img src="{{ $post->images->first()->path }}" />
                  <div class="mn-title">
                    <a href="">{{ $post->title }}</a>
                  </div>
                </div>
              </div>
            @endforeach
            {{ $posts->links() }}
          </div>
          </div>

          <div class="col-lg-3">
            <div class="mn-list">
              <h2>Read More</h2>
              <ul>
                @foreach($read_more_posts as $read_more)
                <li><a href="">{{ $read_more->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
