<!-- crawler NAME -->
<div class="form-group">
    <?php $crawler_name = $request->get('crawler_titlename') ? $request->get('crawler_name') : @$crawler->crawler_name ?>
    {!! Form::label($name, trans('crawler::crawler_admin.name').':') !!}
    {!! Form::text($name, $crawler_name, ['class' => 'form-control', 'placeholder' => trans('crawler::crawler_admin.name').'']) !!}
</div>
<!-- /crawler NAME -->