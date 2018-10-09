<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitorDetailsRequest;
use App\Http\Requests\UpdateVisitorDetailsRequest;
use App\Repositories\VisitorDetailsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\VisitorDetails;
use App\Models\Visitors;

class VisitorDetailsController extends AppBaseController
{
    /** @var  VisitorDetailsRepository */
    private $visitorDetailsRepository;

    public function __construct(VisitorDetailsRepository $visitorDetailsRepo)
    {
        $this->visitorDetailsRepository = $visitorDetailsRepo;
    }

    /**
     * Display a listing of the VisitorDetails.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->visitorDetailsRepository->pushCriteria(new RequestCriteria($request));
        // $visitorDetails = $this->visitorDetailsRepository->all();

        // return view('visitor_details.index')
        //     ->with('visitorDetails', $visitorDetails);
    }

    /**
     * Show the form for creating a new VisitorDetails.
     *
     * @return Response
     */
    public function create()
    {
        $end = Carbon::parse($request->input('visiting_date'));
        
        return view('visitor_details.create');
    }

    /**
     * Store a newly created VisitorDetails in storage.
     *
     * @param CreateVisitorDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitorDetailsRequest $request)
    {      
        //$input = $request->all();
        $this->validate($request,[
            'visitors_id'=>'unique:visitor_details'

        ]);

        $this->visitorDetailsRepository->create([
            'visitors_id'=>$request->visitors_id,
            'visiting_time' =>$request->visiting_time,
            'visiting_date'=>$request->visiting_date,
            'satisfied_reason'=>$request->satisfied_reason,
            'unsatisfied_reason'=>$request->unsatisfied_reason,
            'status'=>$request->status
        ]);

        if($request->unsatisfied_reason){
             Flash::success('Unsatisfied Reason Added');
        }
        Flash::success('Next Appointment Date and Time added to Visitors');
        return redirect('/visitors');
    }

    /**
     * Display the specified VisitorDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visitorDetails = $this->visitorDetailsRepository->findWithoutFail($id)->first;

        if (empty($visitorDetails)) {
            Flash::error('Visitor Details not found');
            return redirect(route('visitorDetails.index'));
        }

        return view('visitor_details.show')->with('visitorDetails', $visitorDetails);
    }

    /**
     * Show the form for editing the specified VisitorDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visitorDetails = $this->visitorDetailsRepository->findWithoutFail($id);

        if (empty($visitorDetails)) {
            Flash::error('Visitor Details not found');

            return redirect(route('visitorDetails.index'));
        }

        return view('visitor_details.edit')->with('visitorDetails', $visitorDetails);
    }

    /**
     * Update the specified VisitorDetails in storage.
     *
     * @param  int              $id
     * @param UpdateVisitorDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitorDetailsRequest $request)
    {
        $visitorDetails = $this->visitorDetailsRepository->findWithoutFail($id);

        if (empty($visitorDetails)) {
            Flash::error('Visitor Details not found');

            return redirect(route('visitorDetails.index'));
        }

        $visitorDetails = $this->visitorDetailsRepository->update($request->all(), $id);

        Flash::success('Visitor Details updated successfully.');

        return redirect(route('visitorDetails.index'));
    }

    /**
     * Remove the specified VisitorDetails from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visitorDetails = $this->visitorDetailsRepository->findWithoutFail($id);

        if (empty($visitorDetails)) {
            Flash::error('Visitor Details not found');

            return redirect(route('visitorDetails.index'));
        }

        $this->visitorDetailsRepository->delete($id);

        Flash::success('Visitor Details deleted successfully.');

        return redirect(route('visitorDetails.index'));
    }

    
}
