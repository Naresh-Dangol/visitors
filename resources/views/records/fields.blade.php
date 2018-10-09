<!-- Fullname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fullname', 'Fullname:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control','placeholder'=>'Enter Name / Surname','required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','placeholder'=>'Enter Address','required']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone No:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','placeholder'=>'Enter Telephone Number','required']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile No:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control','placeholder'=>'Enter Mobile Number','required']) !!}
</div>

<!-- Email  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','placeholder'=>'Enter Email','required']) !!}
</div>

<!-- Purpose of Visit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purpose_of_visit', 'Purpost of Visit:') !!}
    {!! Form::text('purpose_of_visit', null, ['class' => 'form-control','placeholder'=>'Enter Purpose to Visit','required']) !!}
</div>


<!-- Visit Duration Field-->
<div class="form-group col-sm-6">
    {!! Form::label('visit_duration', 'Visit Duration:') !!}
    {!! Form::time('visit_duration', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', null, ['class' => 'form-control','placeholder'=>'Enter your Remarks','required'])!!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('records.index') !!}" class="btn btn-default">Cancel</a>
</div>
