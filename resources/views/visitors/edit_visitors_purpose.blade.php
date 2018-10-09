@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Edit Status Appointment Date and Time
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <form action="{{url('/update-visitors-purpose/'.$visitors->visitorDetails[0]['visitors_id'])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="POST">
                    
                    <div class="form-group col-sm-6 ">
                        {!! Form::label('status', 'Status:') !!}

                        <select name="status" id="status" class="form-control">
                            <option disabled selected="" id="select">--Select One--</option>
                            <option value="yes" {{($visitors->visitorDetails[0]['status'] == 'yes')?'selected':''}}>Satisfied</option>
                            <option value="no" {{($visitors->visitorDetails[0]['status'] =='no')?'selected':''}}>Unsatisfied</option>
                        </select>
                    </div>

                    
                    <!-- Visiting Date Field -->
                    <div class="form-group col-sm-6" id="visiting_date" style="display: none">
                        {!! Form::label('visiting_date', 'Visiting Date:') !!}
                        <input type="date" name="visiting_date" class="form-control" value="{{$visitors->visitorDetails[0]['visiting_date']}}">
                    </div>

                    <!-- Visiting Time Field -->
                    <div class="form-group col-sm-6" id="visiting_time" style="display: none">
                        {!! Form::label('visiting_time', 'Visiting Time:') !!}

                        <input type="time" name="visiting_time" class="form-control" value="{{$visitors->visitorDetails[0]['visiting_time']}}">
                    </div>

                    <!-- Satisfied reason Field -->
                    <div class="form-group col-sm-6" id="satisfied_reason" style="display: none">
                        {!! Form::label('satisfied_reason', 'Satisfied Reason:') !!} <br>
                        <textarea name="satisfied_reason" id="satisfied_reason" cols="30" rows="5" class="form-control">{{$visitors->visitorDetails[0]['satisfied_reason']}}</textarea>
                    </div>

                    <div class="clearfix"></div>
                    <!-- Visiting Time Field -->
                    <div class="form-group col-sm-6" id="reason" style="display: none">
                        {!! Form::label('unsatisfied_reason', 'Unsatisfied Reason:') !!}
                        <textarea name="unsatisfied_reason" id="unsatisfied_reason" cols="30" rows="5" class="form-control">{{$visitors->visitorDetails[0]['unsatisfied_reason']}}</textarea>
                    </div>

                    


                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                        <a href="" class="btn btn-default">Cancel</a>
                    </div>

                    @section('scripts')
                    <script>
    // $(document).on('change', '#status', function () {
    //     var status_type = $('#status').val();
    //     if(status_type == 'yes'){
    //         $('#visiting_date').show();
    //         $('#visiting_time').show();
    //         $('#satisfied_reason').show();
    //         $('#reason').hide();

    //     }else if(status_type =='no'){
    //         $('#visiting_date').hide();
    //         $('#visiting_time').hide();
    //         $('#satisfied_reason').hide();
    //         $('#reason').show();
    //     }
    // });

    $(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="yes"){
                    $('#visiting_date').show();
                    $('#visiting_time').show();
                    $('#satisfied_reason').show();
                    $('#reason').hide();
                } else {
                    $('#visiting_date').hide();
                    $('#visiting_time').hide();
                    $('#satisfied_reason').hide();
                    $('#reason').show();                 
                }
            });
        }).change();
    });



</script>
@endsection



{!! Form::close() !!}
</div>
</div>
</div>
</div>
@endsection
