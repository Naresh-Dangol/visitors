@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit-Visitor Records
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($visitors, ['route' => ['visitors.update', $visitors->id], 'method' => 'patch']) !!}

                        @include('visitors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection