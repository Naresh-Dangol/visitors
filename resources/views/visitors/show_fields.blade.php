<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $visitors->id !!}</p>
</div>

<!-- Fullname Field -->
<div class="form-group">
    {!! Form::label('fullname', 'Fullname:') !!}
    <p>{!! $visitors->fullname !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $visitors->address !!}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{!! $visitors->telephone !!}</p>
</div>

<!-- Mobile Field -->
<div class="form-group">
    {!! Form::label('mobile', 'Mobile:') !!}
    <p>{!! $visitors->mobile !!}</p>
</div>

<!-- Email Address Field -->
<div class="form-group">
    {!! Form::label('email_address', 'Email Address:') !!}
    <p>{!! $visitors->email_address !!}</p>
</div>

<!-- Visited Date Field -->
<div class="form-group">
    {!! Form::label('visit_date', 'Visit Date:') !!}
    <p>{!! $visitors->visit_date !!}</p>
</div>

<!-- Visited Time Field -->
<div class="form-group">
    {!! Form::label('visit_time', 'Visit Time:') !!}
    <p>{!! date('g:i a',strtotime($visitors->visit_time)) !!}</p>

    
</div>

<!-- Visited Time Field -->
<div class="form-group">
    {!! Form::label('purpose', 'Purpose of Visit:') !!}
    <p>{!! $visitors->purpose !!}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{!! $visitors->remarks !!}</p>
</div>



    <!-- visiting Date Field -->
    @if($visDetails->status == 'yes')
        <div class="form-group">
            {!! Form::label('visiting_date', 'Visiting Date:') !!}
            <p>{!! $visDetails->visiting_date !!}</p>
        </div>     
           

        <!-- visiting Time Field -->
        <div class="form-group">
            {!! Form::label('visiting_time', 'Visiting Time:') !!}
            <p>{!! date('g:i a',strtotime($visDetails->visiting_time)) !!}</p>
        </div>    

        <!-- Satisfied Field -->
        <div class="form-group">
            {!! Form::label('satisfied_reason', 'Satisfied Reason:') !!}
            <p>{!! $visDetails->satisfied_reason !!}</p>
        </div>  
        @else
         <!-- Unsatisfied Field -->
        <div class="form-group">
            {!! Form::label('unsatisfied_reason', 'Unsatisfied Reason:') !!}
            <p>{!! $visDetails->unsatisfied_reason !!}</p>
        </div>    
    @endif            











