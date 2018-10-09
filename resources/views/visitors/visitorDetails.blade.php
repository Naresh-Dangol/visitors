@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Visitor Details
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($visitorDetails, ['route' => ['visitorDetails.update', $visitorDetails->id], 'method' => 'patch']) !!}

                        @include('visitors.add_visitor_field')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection