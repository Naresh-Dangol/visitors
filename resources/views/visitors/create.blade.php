@extends('layouts.app')
@section('css')
<style>
    #imaginary_container{
    margin-top:1%; /* Don't copy this */
    width: 50%;
    
}
.stylish-input-group .input-group-addon{
    background: white !important; 
}
.stylish-input-group .form-control{
    border-right:0; 
    box-shadow:0 0 0; 
    border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
</style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Create New Appointment
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                     @include('flash::message')
                     <div class="col-sm-12">
                   <form action="{{route('visitor.search')}}" method="post" class="inline-form">
                    {{csrf_field()}}
                    <div id="imaginary_container"> 
                        <div class="input-group stylish-input-group">
                            <input type="text" name="search" class="form-control"  placeholder="Please Provide Your Mobile to Check Your Previous Record" >
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </form>
              </div>
              <div class="clearfix"></div>
                <br>

                    {!! Form::open(['route' => 'visitors.store']) !!}
                        
                        @include('visitors.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
