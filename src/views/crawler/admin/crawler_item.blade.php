<!--ADD crawler CATEGORY ITEM-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_crawler_getdata') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('crawler::crawler_admin.crawler_getData')}}
        </a>
    </div>
</div>
<!--/END ADD crawler CATEGORY ITEM-->

@if( ! $crawlers->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('crawler::crawler_admin.order') }}</td>
            <th style='width:10%'>
                {{ trans('crawler::crawler_admin.crawler_id') }}
            </th>
            <th style='width:30%'>
                {{ trans('crawler::crawler_admin.crawler_subject') }}
            </th>
            <th style='width:50%'>
                {{ trans('crawler::crawler_admin.crawler_content') }}
            </th>
            <th style='width:20%'>{{ trans('crawler::crawler_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $crawlers->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($crawlers as $crawler)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $crawler->crawler_id !!}</td>
            <td>{!! $crawler->crawler_subject !!}</td>
            <td>{{ substr($crawler->crawler_content, 0, 80) }}</td>
            <td>
                <a href="{!! URL::route('admin_crawler.edit', ['id' => $crawler->crawler_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_crawler.delete',['id' =>  $crawler->crawler_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('crawler::crawler_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $crawlers->appends($request->except(['page']) )->render() !!}
</div>