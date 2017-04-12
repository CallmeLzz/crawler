
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('crawler::crawler_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_crawler','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('crawler_name', trans('crawler::crawler_admin.crawler_name_label')) !!}
            {!! Form::text('crawler_name', @$params['crawler_name'], ['class' => 'form-control', 'placeholder' => trans('crawler::crawler_admin.crawler_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('crawler::crawler_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


