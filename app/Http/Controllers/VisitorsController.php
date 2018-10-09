<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitorsRequest;
use App\Http\Requests\UpdateVisitorsRequest;
use App\Repositories\VisitorsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\VisitorDetails;
use App\Models\Visitors;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Dompdf\Dompdf;
use PDF;
use App\Events\StatusSend;


class VisitorsController extends AppBaseController
{
    /** @var  VisitorsRepository */
    private $visitorsRepository;

    public function __construct(VisitorsRepository $visitorsRepo)
    {
        $this->visitorsRepository = $visitorsRepo;
    }

    /**
     * Display a listing of the Visitors.
     *
     * @param Request $request
     * @return Response
     */


    public function index(Request $request)
    {
        $this->visitorsRepository->pushCriteria(new RequestCriteria($request));
        $visitors = $this->visitorsRepository->with('visitorDetails')->orderBy('created_at','desc')->all();
        //dd($visitors->toArray());
        

       if($visitors){
        foreach($visitors as $visitor){
            $status = 'no';
            $satisfied_reason='';
            $unsatisfied_reason ='';

            $details = $visitor->visitorDetails;
             $visitorDetails = $details->toArray();
             $detailId = 0;
             if($visitorDetails && $visitorDetails != '[]'){ 
          
               $status = $visitorDetails[0]['status'];
                $detailId = $visitorDetails[0]['id'];
               $satisfied_reason = $visitorDetails[0]['satisfied_reason'];
               $unsatisfied_reason = $visitorDetails[0]['unsatisfied_reason'];
            }

            $visitor->status = $status;
            $visitor->detailsId = $detailId;
            $visitor->satisfied_reason = $satisfied_reason;
            $visitor->unsatisfied_reason = $unsatisfied_reason;
        }
       }
       
        return view('visitors.index',compact('visitors'));
        
        
    }

    
    /**
     * Show the form for creating a new Visitors.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('visitors.create');
    }

    /**
     * Store a newly created Visitors in storage.
     *
     * @param CreateVisitorsRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitorsRequest $request)
    {
        $input = $request->all();   
        // $visitors = $this->visitorsRepository->create($input);
        // Flash::success('Visitors saved successfully.');

         if (Visitors::where('mobile', '=', $request->input('mobile'))->exists()) {

            $searches = Visitors::where('mobile', '=', $request->input('mobile'))->orderBy('created_at','desc')->get();
            $check = Visitors::where('mobile', '=', $request->input('mobile'))->orderBy('created_at','desc')->first();

            Flash::error('Already visited');
            return view('visitors.search',compact('searches','check'));
        }
        else{
            $visitors = $this->visitorsRepository->create($input);
            Flash::success('Visitors saved successfully.');
        }

       return redirect(route('visitors.index'));

      
    }

    /**
     * Display the specified Visitors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visDetails = VisitorDetails::where('visitors_id',$id)->first();

        $visitors = $this->visitorsRepository->findWithoutFail($id);

        if (empty($visitors)) {
            Flash::error('Visitors not found');

            return redirect(route('visitors.index'));
        }

        return view('visitors.show')->with('visitors', $visitors)->with('visDetails', $visDetails);
    }

    /**
     * Show the form for editing the specified Visitors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visitors = $this->visitorsRepository->with('visitorDetails')->findWithoutFail($id);
       

        if (empty($visitors)) {
            Flash::error('Visitors not found');

            return redirect(route('visitors.index'));
        }

        // $visitorDetails = $visitors->visitorDetails->toArray();
        //  if($visitorDetails && $visitorDetails != '[]'){ 
        //        $status = $visitorDetails[0]['status'];
        //        $satisfied_reason = $visitorDetails[0]['satisfied_reason'];
        //        $unsatisfied_reason = $visitorDetails[0]['unsatisfied_reason'];
        //        $visiting_date = $visitorDetails[0]['visiting_date'];
        //        $visiting_time = $visitorDetails[0]['visiting_time'];
        //     }   
        

        return view('visitors.edit')->with('visitors', $visitors);
    }

    /**
     * Update the specified Visitors in storage.
     *
     * @param  int              $id
     * @param UpdateVisitorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitorsRequest $request)
    {
        $visitors = $this->visitorsRepository->findWithoutFail($id);

        if (empty($visitors)) {
            Flash::error('Visitors not found');

            return redirect(route('visitors.index'));
        }

        $visitors = $this->visitorsRepository->update($request->all(), $id);

        Flash::success('Visitors updated successfully.');

        return redirect(route('visitors.index'));
    }

    /**
     * Remove the specified Visitors from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visitors = $this->visitorsRepository->findWithoutFail($id);

        if (empty($visitors)) {
            Flash::error('Visitors not found');

            return redirect(route('visitors.index'));
        }

        $this->visitorsRepository->delete($id);

        Flash::success('Visitors deleted successfully.');

        return redirect(route('visitors.index'));
    }

    
    /**
     * addvisitorpurpose the form for editing the specified VisitorDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function addVisitorsPurpose($visitorId)
    {
        $visitorDetails = Visitors::where('id',$visitorId)->first();    

        if (empty($visitorDetails)) {
            Flash::error('Visitor Details not found');

            return view('visitors.createVisitorDetails')->with('visitorDetails', $visitorDetails);
        }

        
        return view('visitors.visitorDetails')->with('visitorDetails', $visitorDetails);
    }

    public function add_more_visitors($id){
        $adds = Visitors::find($id);
        return view('visitors.add_more_visitors',compact('adds'));
    }

    public function visitorStore(CreateVisitorsRequest $request){
        $input = $request->all();
        $visitors = $this->visitorsRepository->create($input);
            Flash::success('Visitors saved successfully.');
        return redirect(route('visitors.index'));
    }

    public function editVisitorsPurpose($id){
         $visitors = $this->visitorsRepository->with('visitorDetails')->findWithoutFail($id); 

            return view('visitors.edit_visitors_purpose')->with('visitors', $visitors);
        

    }

    public function updateVisitorsPurpose(Request $request,$visitors_id){
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $data = $request->all();
        VisitorDetails::where('visitors_id',$visitors_id)->update($data);
        Flash::success('Status Update Successful.');
          return redirect('/visitors');
    }

    public function getSatisfactionReason($id){
        //get satisfaction reson from either visitorDetails id or vistors id
         if($id) { 
            $visitorsDetails = VisitorDetails::find($id);
            $data = $visitorsDetails->toArray();
            if($data){
               
                $value =  !empty($visitorsDetails['satisfied_reason'])?$visitorsDetails['satisfied_reason']:$visitorsDetails['unsatisfied_reason'];
                            echo $value;
                        }else{
                            echo  '';
                        }
                    }
                    echo '';  
        }



    public function search(Request $request){
         
        if(Visitors::where('mobile', '=', $request->input('search'))->exists()){
            $searches = Visitors::where('mobile', '=', $request->input('search'))->orderBy('created_at','desc')->get();

            $check = Visitors::where('mobile', '=', $request->input('search'))->orderBy('created_at','desc')->first();

            Flash::error('Already visited');
            return view('visitors.search',compact('searches','check'));
        }else{
            Flash::error('Not Visited Yet');
            return view('visitors.create')->with('error','Not Visited Yet');
        }
    }

  

    public function getVisitorReport(){
      $data = Visitors::get()->toArray();
       return PDF::create('itsolutionstuff_example', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
        {
            $sheet->fromArray($data);
        });
       })->download("pdf");
    }


    public function daterange(Request $request){
            $start = $request->from_date;
            $end = $request->to_date;

            $visitors = Visitors::whereBetween('visit_date', array($start, $end))
            ->orderBy('created_at','desc')->get();

            if($visitors){
                foreach($visitors as $visitor){
                    $status = 'no';
                    $details = $visitor->visitorDetails;
                     $visitorDetails = $details->toArray();
                     $detailId = 0;
                     if($visitorDetails && $visitorDetails != '[]'){ 
                       $status = $visitorDetails[0]['status'];
                        $detailId = $visitorDetails[0]['id'];
                       
                    }

                    $visitor->status = $status;
                    $visitor->detailsId = $detailId;
                }
               }

            return view('visitors.index',compact('visitors'));
    }

    

    




}
