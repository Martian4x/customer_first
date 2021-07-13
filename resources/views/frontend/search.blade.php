@extends('layouts.main')

@section('content')
    <!--=== Search Block Version 2 ===-->
    <div class="search-block">
            {!! Form::open( array('route' =>'search','method'=>'GET')) !!}
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h2>Search again</h2>
                <div class="input-group">
                    <input type="text" name="q" value="{{ $vars['q'] }}" class="form-control" placeholder="Search again ...">
                    <span class="input-group-btn">
                        <button class="btn-u" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div>
            {!! Form::close() !!} 
    </div><!--/container-->
    <!--=== End Search Block Version 2 ===-->

    <!--=== Content Part ===-->
    <div class="container content">

        <div class="container content-sm">
            <!-- Begin Table Search v1 -->
            <div class="table-search-v1 margin-bottom-30">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th class="hidden-sm">Artist/Band</th>
                                <th>Album</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['lyrics'] as $lyric)
                            <tr>
                                <td class="td-width">
                                    <a href="/lyric/{{ $lyric->slug }}">{{ $lyric->title }}</a>
                                </td>
                                <td class="td-width"><a href="/lyric/{{ $lyric->slug }}">{{ $lyric->artist->name }}</a></td>
                                <td>{{ $lyric->album }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Search v1 -->
        </div>
    </div>
@endsection