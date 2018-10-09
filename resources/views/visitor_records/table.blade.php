<table class="table table-responsive" id="visitorRecords-table">
    <thead>
        <tr>
            <th>Visitor Id</th>
        <th>Visitor Details Id</th>
        <th>From Time</th>
        <th>To Time</th>
        <th>Is Fullfilled</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($visitorRecords as $visitorRecord)
        <tr>
            <td>{!! $visitorRecord->visitor_id !!}</td>
            <td>{!! $visitorRecord->visitor_details_id !!}</td>
            <td>{!! $visitorRecord->from_time !!}</td>
            <td>{!! $visitorRecord->to_time !!}</td>
            <td>{!! $visitorRecord->is_fullfilled !!}</td>
            <td>
                {!! Form::open(['route' => ['visitorRecords.destroy', $visitorRecord->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('visitorRecords.show', [$visitorRecord->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('visitorRecords.edit', [$visitorRecord->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>