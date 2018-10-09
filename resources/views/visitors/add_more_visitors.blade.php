@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Again Create Visitor
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">                   

                        <form action="{{route('visitors.add')}}" method="post">
                        {{csrf_field()}}    
                        <!-- Fullname Field -->
                        <div class="form-group col-sm-6">
                            <label for="fullname">Fullname</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter Fullname" value="{{$adds->fullname}}" required>
                        </div>

                        <!-- Address Field -->
                        <div class="form-group col-sm-6">
                             <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{$adds->address}}" required>
                        </div>

                        <!-- Telephone Field -->
                        <div class="form-group col-sm-6">
                             <label for="telephone">Telephone</label>
                            <input type="text" name="telephone" class="form-control" placeholder="Enter Telephone" value="{{$adds->telephone}}" required>
                        </div>

                        <!-- Mobile Field -->
                        <div class="form-group col-sm-6">
                             <label for="mobile">Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" value="{{$adds->mobile}}" required>
                        </div>

                        <!-- Email Address Field -->
                        <div class="form-group col-sm-6">
                              <label for="email_address">Email</label>
                            <input type="email" name="email_address" class="form-control" placeholder="Enter Email Address" value="{{$adds->email_address}}" required>
                        </div>

                        <!--  Visited Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('visited_date', 'Visit Date:') !!}
                            {!! Form::date('visited_date',  old('visited_date', 
                                Carbon\Carbon::today()->format('Y-m-d')),
                            ['class'=>'form-control date-picker','required']) !!}

                        </div>

                        <!-- Visited Time Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('visited_time', 'Visit Time:') !!}
                            {!! Form::time('visited_time',  old('visited_time', 
                                Carbon\Carbon::now()->format('H:i')),
                            ['class'=>'form-control','required']) !!}
                        </div>

                        <!-- Visited Time Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('visited_duration', 'Visited Duration:') !!}
                            {!! Form::time('visited_duration', old('visited_duration'), ['class' => 'form-control','required']) !!}
                        </div>

                        <!-- Visited Time Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('purpose', 'Purpose of Visit:') !!}
                            {!! Form::text('purpose', old('purpose'), ['class' => 'form-control','placeholder'=>'Enter Purpose','required']) !!}
                        </div>

                        <!-- Remarks Field -->
                        <div class="form-group col-sm-6" >
                            {!! Form::label('remarks', 'Remarks:') !!}
                            {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control','placeholder'=>'Enter Remarks','rows'=>5,'required']) !!}
                        </div>


                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('visitors.index') !!}" class="btn btn-default">Cancel</a>
                        </div>


                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection
