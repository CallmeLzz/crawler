
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('crawler::crawler_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_crawler_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('crawler_category_name',trans('crawler::crawler_admin.crawler_category_name_label')) !!}
            {!! Form::text('crawler_category_name', @$params['crawler_category_name'], ['class' => 'form-control', 'placeholder' => trans('crawler::crawler_admin.crawler_category_name')]) !!}
        </div>

        {!! Form::submit(trans('crawler::crawler_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




