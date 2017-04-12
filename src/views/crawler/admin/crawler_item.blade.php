
@if( ! $crawlers->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('crawler::crawler_admin.order') }}</td>
            <th style='width:10%'>crawler ID</th>
            <th style='width:50%'>crawler title</th>
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
            <td>{!! $crawler->crawler_name !!}</td>
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