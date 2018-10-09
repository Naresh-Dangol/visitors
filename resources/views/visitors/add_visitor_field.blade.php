@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Add Appointment Date and Time for Next Visit
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'visitorDetails.store']) !!}

                        <!-- Visiting Date Field -->
<div class="form-group col-sm-6" id="visitors_id">
    <input type="hidden" name="visitors_id" value="{{$visitorDetails->id}}" class="form-control">
</div>


<div class="clearfix"></div>
<!-- Purpose Field -->
<div class="form-group col-sm-6 ">
    {!! Form::label('status', 'Status:') !!}
    <select name="status" id="status" class="form-control">
        <option disabled selected="" id="select">--Select One--</option>
        <option value="yes">Satisfied</option>
        <option value="no">Unsatisfied</option>
    </select>
</div>


<!-- Visiting Date Field -->
<div class="form-group col-sm-6" id="visiting_date" style="display: none">
    {!! Form::label('visiting_date', 'Visiting Date:') !!}
    {!! Form::date('visiting_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Visiting Time Field -->
<div class="form-group col-sm-6" id="visiting_time" style="display: none">
    {!! Form::label('visiting_time', 'Visiting Time:') !!}
    {!! Form::time('visiting_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Satisfied reason Field -->
<div class="form-group col-sm-6" id="satisfied_reason" style="display: none">
    {!! Form::label('satisfied_reason', 'Satisfied Reason:') !!}
    {!! Form::textarea('satisfied_reason', null, ['class' => 'form-control','placeholder'=>'Reason to satisfied..','rows'=>5]) !!}
</div>

<div class="clearfix"></div>
<!-- Visiting Time Field -->
<div class="form-group col-sm-6" id="reason" style="display: none">
    {!! Form::label('unsatisfied_reason', 'Unsatisfied Reason:') !!}
    {!! Form::textarea('unsatisfied_reason', null, ['class' => 'form-control','placeholder'=>'Reason to Unsatisfied..']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    
    <a href="" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    $('#status').on('change',function(){
        var status_type = $('#status').val();
        if(status_type == 'yes'){
            $('#visiting_date').show();
            $('#visiting_time').show();
            $('#satisfied_reason').show();
            $('#reason').hide();

        }else if(status_type =='no'){
            $('#visiting_date').hide();
            $('#visiting_time').hide();
            $('#satisfied_reason').hide();
            $('#reason').show();
        }
    });
</script>
@endsection



                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
