<table class="table table-responsive datatables" id="visitors-table">
    <thead>
    <tr>
        <th class="noExl">S.N</th>
        <th>Fullname</th>
        <th>Mobile</th>
        <th>Visit Date</th>
        <th>Visit Time</th>
        <th>Purpose</th>
        @if(Auth::user()->user_role != 'admin')
            <th>Sent</th>
        @endif
        <th>status</th>
         <th>Action</th>
       <!--  @if(Auth::user()->user_role != 'admin')
            <th>Action</th>
        @endif -->
    </tr>
    </thead>
    <tbody>
    @foreach($visitors as $index=>$visitor)
        <tr>
            <td class="noExl">{!! $index+1 !!}</td>
            <td>{!! $visitor->fullname !!}</td>

            <td>{!! $visitor->mobile !!}</td>
            <td>{!! $visitor->visit_date !!}</td>
            <td>{!! date('g:i a',strtotime($visitor->visit_time)) !!}</td>
            <td>{!! substr($visitor->purpose,0,15),'...' !!}</td>
            @if(Auth::user()->user_role != 'admin')
                <td><button type="button" class="btn btn-success notification-send"
                       data-id="{!! $visitor->id !!}">Send</button></td>
            @endif
            <td>
                <button data-visitor-detail-id="{!! $visitor->detailsId !!}" id="status" class="btn btn-primary"
                        style="width: 80%">
                    {!! ($visitor->status == "yes")?'Satisfied':'Unsatisfied' !!} </button>
                @if(Auth::user()->user_role != 'admin')
                    <a href="{{route('visitors.edit_purpose',$visitor->id)}}" title="change status"><i
                                class="fa fa-plus"></i></a>
                @endif
            </td>
           
                <td>

                    {!! Form::open(['route' => ['visitors.destroy', $visitor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('visitors.show', [$visitor->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                      @if(Auth::user()->user_role != 'admin')
                        <a href="{!! route('visitors.edit', [$visitor->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        <a href="{!! route('visitors.add_purpose', [$visitor->id]) !!}" class='btn btn-default btn-xs'
                           title="Add Status"><i class="glyphicon glyphicon-plus"></i></a>
                           @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            
        </tr>

        <!-- Modal -->
        <div class="modal fade satisfaction_modal" id="satisfaction_modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Visitors Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    </tbody>
</table>



@section('scripts')
    <script>
        $(document).ready(function () {
            $('.datatables').dataTable();
        });
    </script>

    <script>
        $(document).on('click', '#status', function () {
            var detailsId = $(this).attr('data-visitor-detail-id');
            $("#satisfaction_modal").find('.modal-body').html('')

            $.ajax({
                type: 'GET',
                url: 'http://localhost/first_app/public/visitors/getSatisfaction/' + detailsId,
                data: {},
                dataType: 'html',
                success: function (response) {
                    if (response) {
                        $("#satisfaction_modal").find('.modal-body').html(response);

                    } else {
                        $("#satisfaction_modal").find('.modal-body').html('No satisfaction reason available');
                    }
                    $("#satisfaction_modal").modal('show');
                    return false;
                }
            });

        });
    </script>

    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

    <script type="text/javascript">

        //...export to excel..//
        $(document).ready(function (e) {
            $('#excel').on('click', function (e) {
                $('#visitors-table').table2excel({
                    exclude: ".noExl",
                    name: "Data",
                    fileext: ".xls",
                    filename: "visitors.xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true

                });
            });

            //...export to word..//
            $('#word').click(function () {
                $('#visitors-table').wordExport(currentDate());
            });


            //...export to pdf..//
            // $('#pdf').on('click',function(e){
            //     var doc = new jsPDF('p','pt');
            //     doc.setFontSize(12);
            //     doc.text("From HTML",40,50);
            //     var res = doc.autoTableHtmlToJson(document.getElementById('visitors-table'));
            //     doc.autoTable(res.columns, res.data,{
            //         theme: 'grid',
            //         startY: 60,
            //     });

            //     doc.save('visitors.pdf');
            // });

            var doc = new jsPDF();
            var specialElementHandlers = {
                '#visitors-table': function (element, renderer) {
                    return true;
                }
            };

            $('#pdf').click(function () {

                doc.fromHTML($('#visitors-table').html(), 15, 15, {
                    'width': 170,
                    'elementHandlers': specialElementHandlers
                });
                doc.save('visitors.pdf');
            });
        });

        //send notification

        var pos_url = "{{ url('visitor-notification','xxx') }}";
        $(document).on('click', ".notification-send", function (e) {

            /*$(this).attr('disabled',true);*/

            var pos_id = $(this).attr('data-id');
            var url = pos_url.replace('xxx', pos_id);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (statusText, response, jqxhr) {
                    if (jqxhr.status === 200) {
                        console.log(response);
                    }
                },
                error: function (status, res, jqxhr) {
                    //handle error
                }
            });
            e.preventDefault();
        });


    </script>
@endsection

