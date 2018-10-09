@extends('layouts.app')



@section('content')
    <section class="content-header">
        <h1 class="pull-left">Visitor Details</h1>
        <h1 class="pull-right">
            @if(Auth::user()->user_role == 'admin')
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('visitors.create') !!}">Add New</a>
           @endif
        </h1>
    </section>
   

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <nav class="navbar navbar-nav">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mail-forward"></i>Export <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a class="excel" id="excel" href="javascript:void(0)"><i class="fa fa-file-excel-o"></i>To Excel</a></li>
                        <li><a class="csv" id="csv" href="javascript:void(0)"><i class="fa fa-file-excel-o"></i>To CSV</a></li>
                        <li><a class="pdf" id="pdf" href="javascript:void(0)"><i class="fa fa-file-pdf-o"></i>To PDF</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        </div>
        <div class="col-sm-6">
            <form class="form-inline" method="post" action="{{url('/visitors/daterange')}}" >
                {{csrf_field()}}
                 {!! Form::label('from_date', 'From:') !!}
                    {!! Form::date('from_date',  old('from_date', 
                        Carbon\Carbon::today()->format('Y-m-d')),
                    ['class'=>'form-control date-picker','id'=>'start_date']) !!}

                 {!! Form::label('to_date', 'To:') !!}
                    {!! Form::date('to_date',  old('to_date'),
                    ['class'=>'form-control date-picker','id'=>'end_date']) !!}
                
                {!! Form::submit('Filter', ['class' => 'btn btn-default']) !!}


            </form>
          </div>
    </div>
</div>

    <div class="content" >

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" id="content">
                    @include('visitors.table')
            </div>
        </div>
        
    </div>
@endsection



