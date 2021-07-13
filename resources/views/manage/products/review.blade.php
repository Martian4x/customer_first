@extends('layouts.main')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Dashboard</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/manage">Dashboard</a></li>
                <li class="active">lyrics</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <!-- Begin Sidebar Menu -->
            @include('layouts.sidebar_nav')
            <!-- End Sidebar Menu -->

            <!-- Begin Content -->
            <div class="col-md-9">
                <!--Basic Table-->
                <div class="panel panel-brown margin-bottom-40">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i class="fa fa-lyrics"></i>{{ $vars['title'] }} | {{ $vars['sub_title'] }}</h5>

                        <span><a href="/manage/lyrics/create" class="pull-right list_plus_btn"><i class="fa fa-plus"></i> Add lyric</a></span>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <div class="container" style="margin-top: 10px;">
                            {!! Form::open( array('route' =>'manage.search','method'=>'GET')) !!}
                                <div class="col-lg-3" style="padding-right: 0">
                                    {!! Form::text('q', null, ['placeholder'=>'Search...', 'class'=>'form-control', 'required', 'id'=>'title']) !!} 
                                </div>
                                <div class="col-lg-1" style="padding-left: 0">
                                    <button type="submit" class="btn-u btn-u-brown">Search</button>
                                </div>
                            {!! Form::close() !!}

                            {!! Form::open( array('route' =>'manage.lyrics.bulk_update')) !!}
                                <div class="col-lg-3" style="padding-right: 0">
                                    <div class="form-group">
                                    {!! Form::select('status', [''=>'Update status','Publish'=>'Publish','Correction'=>'Correction', 'Review'=>'Review', 'Rejected'=>'Rejected'],'', ['class'=>'form-control','id'=>'status', 'required']) !!} 
                                    </div>
                                </div>
                                <div class="col-lg-1" style="margin-top: -15px;padding-left: 0;">
                                    <button type="submit" class="btn-u btn-u-brown">Update</button>
                                </div>
                            </div>
                        </tr>
                            <tr>
                                <th>#</th>
                                <th><i class="fa fa-check-square-o"></i></th>
                                <th>Title</th>
                                <th>Artist/Band</th>
                                <th>Album</th>
                                <th>Status</th>
                                <th>User</th>
                                <th>Published</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vars['lyrics'] as $lyric)
                            <tr>
                                <td>{{ $lyric->id }}</td>
                                <td>
                                    <input name="id[]" value="{{ $lyric->id }}" type="checkbox">
                                </td>
                                <td><a href="/manage/lyrics/{{ $lyric->id }}">{{ $lyric->title }}</a></td>
                                <td>{{ $lyric->artist->name }}</td>
                                <td>{{ $lyric->album }}</td>
                                <td>{{ $lyric->status }}</td>
                                <td>@if(isset($lyric->user))
                                    {{ $lyric->user->username }}
                                    @endif
                                </td>
                                <td>{{ $lyric->created_at->format('d M, Y') }}</td>
                                <td>
                                    <a href="/manage/lyrics/{{ $lyric->id }}" class="green tooltips" data-toggle="tooltip" data-original-title="View lyric"><i class="fa fa-eye"></i></a> |
                                    <a href="/manage/lyrics/{{ $lyric->id }}/edit" class="brown tooltips" data-toggle="tooltip" data-original-title="Edit lyric"><i class="fa fa-edit"></i></a> | 

                                    @if(isset(\Auth::user()->role) && \Auth::user()->role=='Admin' || \Auth::user()->role=='Staff') 

                                    <a href="/manage/lyrics/{{ $lyric->id }}/corrections" class="blue tooltips" data-toggle="tooltip" data-original-title="Lyric Corrections"><i class="fa fa-check-square-o"></i></a> |


                                    <a href="#" class="red deleteTr tooltips" data-address="{{ strtolower($vars['title']) }}" data-id="{{ $lyric->id }}" data-token="{{ csrf_token() }}" data-toggle="tooltip" data-original-title="Delete lyric"><i class="fa fa-trash-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {!! Form::close() !!}
                    <div class="text-center">
                    {!! $vars['lyrics']->render() !!}
                    </div>
                </div>
                <!--End Basic Table-->
            </div>
            <!-- End Content -->

        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection