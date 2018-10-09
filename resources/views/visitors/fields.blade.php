
<!-- Fullname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fullname', 'Fullname:') !!}
    {!! Form::text('fullname', old('fullname'), ['class' => 'form-control','placeholder'=>'Enter Fullname','required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', old('address'), ['class' => 'form-control','placeholder'=>'Enter Address','required']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::tel('telephone', old('telephone'), ['class' => 'form-control','placeholder'=>'Enter Telephone','required']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::tel('mobile', old('mobile'), ['class' => 'form-control','id'=>'mobile','placeholder'=>'Enter Mobile','required']) !!}
</div>



<!-- Email Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_address', 'Email Address:') !!}
    {!! Form::text('email_address', old('email_address'), ['class' => 'form-control','placeholder'=>'Enter Email Address']) !!}
</div>

<!--  Visited Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visit_date', 'Visit Date:') !!}
    {!! Form::date('visit_date',  old('visit_date', 
        Carbon\Carbon::today()->format('Y-m-d')),
    ['class'=>'form-control date-picker']) !!}
</div>

<!-- Visited Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visit_time', 'Visit Time:') !!}
    {!! Form::time('visit_time',  old('visit_time', 
        Carbon\Carbon::now()->format('H:i')),
    ['class'=>'form-control date-picker']) !!}
</div>



<!-- Visited Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purpose', 'Purpose of Visit:') !!}
    {!! Form::text('purpose', old('purpose'), ['class' => 'form-control','placeholder'=>'Enter Purpose']) !!}
</div>



<!-- Remarks Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control','placeholder'=>'Enter Remarks','rows'=>5]) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('visitors.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
 <script>
        $(document).ready(function(){
            $('#search').on('keyup',function(){
                var value = $('#search').val();
                $('#mobile').val(value);
                
                $.ajax({
                    type : 'get',
                    url : '{{URL::to('visitors')}}',
                    data : {mobile :mobile},
                    success:function(data){
                        if(data == 0){
                            alert('nothing');
                        }else{
                            alert('the user already exists!');
                        }
                    }

                });
            });
        });
    </script> 
@endsection 