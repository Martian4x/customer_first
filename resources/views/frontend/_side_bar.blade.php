            <div class="col-md-3 hidden-xs related-search">
                <div class="row">

                @if(isset($vars['lyric']))<div class="col-md-12 col-sm-4">
                        <img src="" alt="">
                        <a class="see-all" href="/song_requests">See all</a>
                        <hr>
                    </div>
                @endif

                    <div class="col-md-12 col-sm-4">
                        <h3>Trending requests</h3>
                        <ul class="list-unstyled">
                            @foreach($trending_requests as $request)
                                <li><a href="/song_requests/{{ $request->id }}">{{ $request->title }}</a></li>
                            @endforeach
                        </ul>
                        <a class="see-all" href="/song_requests">See all</a>
                        <hr>
                    </div>

                    <div class="col-md-12 col-sm-4">
                        <h3>New lyrics</h3>
                        <ul class="list-unstyled">
                            @foreach($new_lyrics as $lyric)
                                <li><a href="/song_lyrics/{{ $lyric->slug }}">{{ $lyric->artist->name }} - {{ $lyric->title }}</a></li>
                            @endforeach
                        </ul>
                        <a class="see-all" href="/browse/new">See all</a>
                        <hr>
                    </div>

                    <div class="col-md-12 col-sm-4">
                        <h3>Popular lyrics</h3
                        <ul class="list-unstyled">
                            @foreach($popular_lyrics as $lyric)
                                <li><a href="/song_lyrics/{{ $lyric->slug }}">{{ $lyric->artist->name }} - {{ $lyric->title }}</a></li>
                            @endforeach
                        </ul>
                        <a class="see-all" href="/browse/popular">See all</a>
                        <hr>
                    </div>

                </div>
            </div><!--/col-md-2-->