<!--ADD crawler CATEGORY ITEM-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_crawler_category.edit') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('crawler::crawler_admin.crawler_category_add_button')}}
        </a>
    </div>
</div>
<!--/END ADD crawler CATEGORY ITEM-->

@if( ! $crawlers_categories->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>
                {{ trans('crawler::crawler_admin.order') }}
            </td>

            <th style='width:10%'>
                {{ trans('crawler::crawler_admin.crawler_categoty_id') }}
            </th>

            <th style='width:50%'>
                {{ trans('crawler::crawler_admin.crawler_categoty_name') }}
            </th>

            <th style='width:20%'>
                {{ trans('crawler::crawler_admin.operations') }}
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $crawlers_categories->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($crawlers_categories as $crawler_category)
        <tr>
            <!--COUNTER-->
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <!--/END COUNTER-->

            <!--crawler CATEGORY ID-->
            <td>
                {!! $crawler_category->crawler_category_id !!}
            </td>
            <!--/END crawler CATEGORY ID-->

            <!--crawler CATEGORY NAME-->
            <td>
                {!! $crawler_category->crawler_category_name !!}
            </td>
            <!--/END crawler CATEGORY NAME-->

            <!--OPERATOR-->
            <td>
                <a href="{!! URL::route('admin_crawler_category.edit', ['id' => $crawler_category->crawler_category_id]) !!}">
                    <i class="fa fa-edit fa-2x"></i>
                </a>
                <a href="{!! URL::route('admin_crawler_category.delete',['id' =>  $crawler_category->crawler_category_id, '_token' => csrf_token()]) !!}"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o fa-2x"></i>
                </a>
                <span class="clearfix"></span>
            </td>
            <!--/END OPERATOR-->
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <!-- FIND MESSAGE -->
    <span class="text-warning">
        <h5>
            {{ trans('crawler::crawler_admin.message_find_failed') }}
        </h5>
    </span>
    <!-- /END FIND MESSAGE -->
@endif
<div class="paginator">
    {!! $crawlers_categories->appends($request->except(['page']) )->render() !!}
</div>