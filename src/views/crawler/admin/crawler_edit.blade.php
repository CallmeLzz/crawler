@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('crawler::crawler_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($crawler->crawler_id) ? '<i class="fa fa-pencil"></i>'.trans('crawler::crawler_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('crawler::crawler_admin.form_add') !!}
                    </h3>
                </div>

                {{-- model general errors from the form --}}
                @if($errors->has('crawler_name') )
                    <div class="alert alert-danger">{!! $errors->first('crawler_name') !!}</div>
                @endif

                @if($errors->has('name_unvalid_length') )
                    <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4>{!! trans('crawler::crawler_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_crawler.post', 'id' => @$crawler->crawler_id],  'files'=>true, 'method' => 'post'])  !!}


                            <!-- crawler NAME TEXT-->
                            @include('crawler::crawler.elements.text', ['name' => 'crawler_name'])
                            <!-- /END crawler NAME TEXT -->
                            {!! Form::hidden('id',@$crawler->crawler_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_crawler.delete',['id' => @$crawler->id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            @include('crawler::crawler.admin.crawler_search')
        </div>

    </div>
</div>
@stop