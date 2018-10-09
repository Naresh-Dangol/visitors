@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Visitor Records
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($record, ['route' => ['records.update', $record->id], 'method' => 'patch']) !!}

                        @include('records.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection