<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\VisitorsRepository;
use App\User;
use App\Models\Visitors;
use App\Models\VisitorDetails;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct(VisitorsRepository $visitorsRepo)
    {
        $this->middleware('auth');
        $this->visitorsRepository = $visitorsRepo;
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $totalVisitors = Visitors::orderBy('created_at','desc')->get();
        //Todays Visitor Appointment
        //$todayVisitors = Visitors::whereRaw('date(created_at) =?',[Carbon::today()])->get();

         //Todays Visitors on waiting
        $visitorswaiting = $this->visitorsRepository->with('visitorDetails')->orderBy('created_at','desc')->all();
        $noVisitorDetails = array();
        if($visitorswaiting){
        foreach($visitorswaiting as $visitor){
            $status = 'no';
            $details = $visitor->visitorDetails;
            $visitorDetails = $details->toArray();
            if($visitorDetails && $visitorDetails != '[]'){ 
                $status = $visitorDetails[0]['status'];
                
            }else{
                $noVisitorDetails[] = $visitor;
            }
            $visitor->status = $status;
            }
        }
        // dd($noVisitorDetails);

         // Appointment for next visit
        $appForNextVisit = VisitorDetails::orderBy('created_at','desc')->get();
            

         
        return view('home',compact('users','totalVisitors','visitorswaiting','noVisitorDetails','appForNextVisit'));
    
    }

    public function todayVisitorsList(){
         
         $visitors = Visitors::whereRaw('date(created_at) =?',[Carbon::today()])->get();
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

    public function visitorsOnWaiting(){
         $visitorswaiting = $this->visitorsRepository->with('visitorDetails')->orderBy('created_at','desc')->all();
         $visitors = array();
         if($visitorswaiting){
            foreach($visitorswaiting as $visitor){
                $details = $visitor->visitorDetails;
                    $visitorDetails = $details->toArray();
                    if($visitorDetails && $visitorDetails != '[]'){ 
                        $status = $visitorDetails[0]['status']; 
                    }else{
                        $visitors[] = $visitor;
                    }
            }
         }

         return view('visitors.index',compact('visitors'));
    }

    public function visitorsForNextAppointment(){
         $visitors = $this->visitorsRepository->with('visitorDetails')->orderBy('created_at','desc')->all();

        if($visitors){
        foreach($visitors as $visitor){
            $status = 'yes';
            $visiting_date = '';
            $details = $visitor->visitorDetails;
            $visitorDetails = $details->toArray();
            
            if($visitorDetails && $visitorDetails != '[]'){   
                $status = $visitorDetails[0]['status']; 
                $visiting_date = $visitorDetails[0]['visiting_date'];       
            }
            $visitor->status = $status;
                $visitor->visiting_date = $visiting_date;
            }
        }

         return view('visitors.index',compact('visitors'));
    }
}
