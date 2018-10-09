<!-- Visitor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visitor_id', 'Visitor Id:') !!}
    {!! Form::number('visitor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Visitor Details Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visitor_details_id', 'Visitor Details Id:') !!}
    {!! Form::text('visitor_details_id', null, ['class' => 'form-control']) !!}
</div>

<!-- From Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from_time', 'From Time:') !!}
    {!! Form::text('from_time', null, ['class' => 'form-control']) !!}
</div>

<!-- To Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('to_time', 'To Time:') !!}
    {!! Form::text('to_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Fullfilled Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_fullfilled', 'Is Fullfilled:') !!}
    {!! Form::text('is_fullfilled', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('visitors.saveVisitorDetails') !!}" class="btn btn-default">Cancel</a>
</div>
