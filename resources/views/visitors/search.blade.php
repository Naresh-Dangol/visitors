@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Visitor Details</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{route('visitors.add_more',[$check->id])}}">Do you Add Again</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
        <table class="table table-responsive datatables" id="visitors-table">
    <thead>
        <tr>
            <th>S.N</th>
            <th>Fullname</th>
            <th>Mobile</th>
            <th>Purpose</th>
            <th>Visit Date</th>
            <th>Visit Time</th>
        </tr>
    </thead>
    <tbody>
    @foreach($searches as $index=>$search)
        <tr>
            <td>{!! $index+1 !!}</td>
            <td>{!! $search->fullname !!}</td>
            <td>{!! $search->mobile !!}</td>
            <td>{!! substr($search->purpose,0,20).'...' !!}</td>
            <td>{!! $search->visit_date !!}</td>
            <td>{!! date('g:i a',strtotime($search->visit_time)) !!}</td>   
                
        </tr>
    @endforeach
    </tbody>
</table>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection




@section('scripts')
    <script>
        $(document).ready(function(){
            $('.datatables').dataTable();
        });
    </script>
@endsection