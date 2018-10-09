<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecordRequest;
use App\Http\Requests\UpdateRecordRequest;
use App\Repositories\RecordRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Record;

class RecordController extends AppBaseController
{
    /** @var  RecordRepository */
    private $recordRepository;

    public function __construct(RecordRepository $recordRepo)
    {
        $this->recordRepository = $recordRepo;
    }

    /**
     * Display a listing of the Record.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->recordRepository->pushCriteria(new RequestCriteria($request));
        $records = $this->recordRepository->all();

        return view('records.index')
            ->with('records', $records);
    }

    /**
     * Show the form for creating a new Record.
     *
     * @return Response
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * Store a newly created Record in storage.
     *
     * @param CreateRecordRequest $request
     *
     * @return Response
     */
    public function store(CreateRecordRequest $request)
    {
        $this->validate($request,[
            'fullname'=>'required',
            'address'=>'required',
            'telephone'=>'required|numeric',
            'mobile'=>'required|min:10|numeric',
            'email'=>'required|email',
            'purpose_of_visit'=>'required',
            'visit_duration'=>'required',
            'remarks'=>'required'
        ]);


        $input = $request->all();

        if (Record::where('mobile', '=', $request->input('mobile'))
                    ->where('fullname', '=', $request->input('fullname'))
                    ->exists()) {

            Flash::error('Already visited');
        }
        else{
             $record = $this->recordRepository->create($input);
             Flash::success('Record saved successfully.');
        }
           
        return redirect(route('records.index'));
    }

    /**
     * Display the specified Record.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $record = $this->recordRepository->findWithoutFail($id);

        if (empty($record)) {
            Flash::error('Record not found');

            return redirect(route('records.index'));
        }

        return view('records.show')->with('record', $record);
    }

    /**
     * Show the form for editing the specified Record.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $record = $this->recordRepository->findWithoutFail($id);

        if (empty($record)) {
            Flash::error('Record not found');

            return redirect(route('records.index'));
        }

        return view('records.edit')->with('record', $record);
    }

    /**
     * Update the specified Record in storage.
     *
     * @param  int              $id
     * @param UpdateRecordRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecordRequest $request)
    {
        $this->validate($request,[
            'fullname'=>'required',
            'address'=>'required',
            'telephone'=>'required|numeric',
            'mobile'=>'required|min:10|numeric', 
            'email'=>'required|email',
            'purpose_of_visit'=>'required',
            'visit_duration'=>'required',
            'remarks'=>'required'
        ]);

        $record = $this->recordRepository->findWithoutFail($id);

        if (empty($record)) {
            Flash::error('Record not found');

            return redirect(route('records.index'));
        }

        $record = $this->recordRepository->update($request->all(), $id);

        Flash::success('Record updated successfully.');

        return redirect(route('records.index'));
    }

    /**
     * Remove the specified Record from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {

        $record = $this->recordRepository->findWithoutFail($id);


        if (empty($record)) {
            Flash::error('Record not found');

            return redirect(route('records.index'));
        }

        $this->recordRepository->delete($id);

        Flash::success('Record deleted successfully.');

        return redirect(route('records.index'));
    }

}
