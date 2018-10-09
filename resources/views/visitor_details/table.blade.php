<table class="table table-responsive" id="visitorDetails-table">
    <thead>
        <tr>
            <th>Visitor Id</th>
        <th>Purpose</th>
        <th>Visiting Date</th>
        <th>Visiting Time</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($visitorDetails as $visitorDetails)
        <tr>
            <td>{!! $visitorDetails->visitor_id !!}</td>
            <td>{!! $visitorDetails->purpose !!}</td>
            <td>{!! $visitorDetails->visiting_date !!}</td>
            <td>{!! $visitorDetails->visiting_time !!}</td>
            <td>{!! $visitorDetails->status !!}</td>
            <td>
                {!! Form::open(['route' => ['visitorDetails.destroy', $visitorDetails->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('visitorDetails.show', [$visitorDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('visitorDetails.edit', [$visitorDetails->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>