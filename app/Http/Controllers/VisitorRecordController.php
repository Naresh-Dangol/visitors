<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitorRecordRequest;
use App\Http\Requests\UpdateVisitorRecordRequest;
use App\Repositories\VisitorRecordRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VisitorRecordController extends AppBaseController
{
    /** @var  VisitorRecordRepository */
    private $visitorRecordRepository;

    public function __construct(VisitorRecordRepository $visitorRecordRepo)
    {
        $this->visitorRecordRepository = $visitorRecordRepo;
    }

    /**
     * Display a listing of the VisitorRecord.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->visitorRecordRepository->pushCriteria(new RequestCriteria($request));
        $visitorRecords = $this->visitorRecordRepository->all();

        return view('visitor_records.index')
            ->with('visitorRecords', $visitorRecords);
    }

    /**
     * Show the form for creating a new VisitorRecord.
     *
     * @return Response
     */
    public function create()
    {
        return view('visitor_records.create');
    }

    /**
     * Store a newly created VisitorRecord in storage.
     *
     * @param CreateVisitorRecordRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitorRecordRequest $request)
    {
        $input = $request->all();

        $visitorRecord = $this->visitorRecordRepository->create($input);

        Flash::success('Visitor Record saved successfully.');

        return redirect(route('visitorRecords.index'));
    }

    /**
     * Display the specified VisitorRecord.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visitorRecord = $this->visitorRecordRepository->findWithoutFail($id);

        if (empty($visitorRecord)) {
            Flash::error('Visitor Record not found');

            return redirect(route('visitorRecords.index'));
        }

        return view('visitor_records.show')->with('visitorRecord', $visitorRecord);
    }

    /**
     * Show the form for editing the specified VisitorRecord.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visitorRecord = $this->visitorRecordRepository->findWithoutFail($id);

        if (empty($visitorRecord)) {
            Flash::error('Visitor Record not found');

            return redirect(route('visitorRecords.index'));
        }

        return view('visitor_records.edit')->with('visitorRecord', $visitorRecord);
    }

    /**
     * Update the specified VisitorRecord in storage.
     *
     * @param  int              $id
     * @param UpdateVisitorRecordRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitorRecordRequest $request)
    {
        $visitorRecord = $this->visitorRecordRepository->findWithoutFail($id);

        if (empty($visitorRecord)) {
            Flash::error('Visitor Record not found');

            return redirect(route('visitorRecords.index'));
        }

        $visitorRecord = $this->visitorRecordRepository->update($request->all(), $id);

        Flash::success('Visitor Record updated successfully.');

        return redirect(route('visitorRecords.index'));
    }

    /**
     * Remove the specified VisitorRecord from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visitorRecord = $this->visitorRecordRepository->findWithoutFail($id);

        if (empty($visitorRecord)) {
            Flash::error('Visitor Record not found');

            return redirect(route('visitorRecords.index'));
        }

        $this->visitorRecordRepository->delete($id);

        Flash::success('Visitor Record deleted successfully.');

        return redirect(route('visitorRecords.index'));
    }
}
