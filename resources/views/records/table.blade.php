
<table class="table table-responsive datatable" id="records">
    <thead>
        <tr>
            <th>SN</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Purpose Of Visit</th>
            <th>Visit Date / Time</th>
            <th>Remarks</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($records as $index=>$record)
        <tr>
            <td>{!! $index+1 !!}</td>
            <td>{!! $record->fullname !!}</td>
            <td>{!! $record->address !!}</td>
            <td>{!! $record->telephone !!}</td>
            <td>{!! $record->mobile !!}</td>
            <td>{!! $record->email !!}</td>
            <td>{!! substr($record->purpose_of_visit,0,20).'...' !!}</td>
            <td>{!! $record->created_at !!}</td>
            <td>{!! substr($record->remarks,0,20).'...' !!}</td>
            <td>
                {!! Form::open(['route' => ['records.destroy', $record->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('records.show', [$record->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('records.edit', [$record->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection


