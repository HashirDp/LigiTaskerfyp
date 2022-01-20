<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BookingDetail;
use App\Models\ServiceBooking;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;
class ServiceBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->utype=="CST"){
            $serviceBookings=ServiceBooking::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
            if($serviceBookings){
                foreach($serviceBookings as $serviceBooking){
                    $bookingDetail=BookingDetail::where('order_id',$serviceBooking->id)->first();
                    $serviceBooking->bookingDetail = $bookingDetail;
                }
                return view('livewire.orders-component', compact("serviceBookings"));

            }else{
                $message = "No Orders(s) Found!";
                return redirect()->back()->with('message',$message);     
            }
        }elseif(Auth::user()->utype=="SVP"){
            $serviceBookings=ServiceBooking::where('job_assign_to',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
            if($serviceBookings){
                foreach($serviceBookings as $serviceBooking){
                    $bookingDetail=BookingDetail::where('order_id',$serviceBooking->id)->first();
                    $serviceBooking->bookingDetail = $bookingDetail;
                }
                return view('livewire.orders-component', compact("serviceBookings"));

            }else{
                $message = "No Orders(s) Found!";
                return redirect()->back()->with('message',$message);     
            }
        }else{
            $message = "Access Denied!";
            return redirect()->back()->with('message',$message); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()){
            $service=Service::find($request->service_id);

            $provider_name=User::where('id',$service->user_id)->first();
            $user_id=Auth::user()->id;
            if($service){
               $serviceBooking =ServiceBooking::create([
                    "order_no"=>'lts-'.date('Ymd').'-'.date('His'),
                    "order_status"=>'Pending',
                    "amount_payble"=>$request->s_total,
                    "job_assign_to"=>$service->user_id,
                    "job_assigned_at"=>date('Y-m-d H:i:s'),
                    "service_id"=>$service->id,
                    "user_id"=>$user_id,
                ]);
    
                //details
                $bookingDetails =BookingDetail::create([
                    "service_name"=>$service->name,
                    "service_qty"=>$request->s_qty,
                    "price"=>$service->price,
                    "dicount"=>$service->discount,
                    "g_total"=>$request->s_total,
                    "provider_id"=>$service->user_id,
                    "provider_name"=>$provider_name->name,
                    "user_name"=>$request->user_name,
                    "house_no"=>$request->house_no,
                    "block"=>$request->block,
                    "area"=>$request->area,
                    "city"=>$request->city,
                    "order_id"=>$serviceBooking->id,
        
                ]);
    
                if($bookingDetails){
                    $message = "Order has been created successfully!";
                    return redirect()->route('customer.orders')->with('message',$message); 

                }
    
        
            }
        }else{
            $message = "Please Login First";
            return redirect()->route('login')->with('message',$message); 

        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        if(Auth::user()->utype=="CST"){
            $serviceBooking=ServiceBooking::where('user_id',Auth::user()->id)->where('id',$id)->first();
            if($serviceBooking){
                    $bookingDetail=BookingDetail::where('order_id',$serviceBooking->id)->first();
                    $serviceBooking->bookingDetail = $bookingDetail;
                return view('livewire.orders-view-component', compact("serviceBooking"));

            }else{
                $message = "No Orders(s) Found!";
                return redirect()->back()->with('message',$message);     
            }
        }elseif(Auth::user()->utype=="SVP"){
            $serviceBooking=ServiceBooking::where('job_assign_to',Auth::user()->id)->where('id',$id)->first();
            if($serviceBooking){
                    $bookingDetail=BookingDetail::where('order_id',$serviceBooking->id)->first();
                    $serviceBooking->bookingDetail = $bookingDetail;
                return view('livewire.orders-view-component', compact("serviceBooking"));

            }else{
                $message = "No Orders(s) Found!";
                return redirect()->back()->with('message',$message);     
            }
        }else{
            $message = "Access Denied!";
            return redirect()->back()->with('message',$message); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $serviceBooking=ServiceBooking::where('job_assign_to',Auth::user()->id)->where('id',$id)->first();
        if($serviceBooking){
                $bookingDetail=BookingDetail::where('order_id',$serviceBooking->order_id)->first();
                $serviceBooking->bookingDetail = $bookingDetail;
            return view('livewire.orders-view-component', compact("serviceBooking"));

        }else{
            $message = "No Orders(s) Found!";
            return redirect()->back()->with('message',$message);     
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        

        $serviceBooking=ServiceBooking::where('job_assign_to',Auth::user()->id)->where('id',$request->order_id)->first();
        if($request->order_status==1){
            $request->order_status='Pending';
            $job_started_at =null; 
            $job_completed_at =null; 
            $amount_receivced =null; 

        }elseif($request->order_status==2){
            $request->order_status='Approved';
            $job_started_at =null; 
            $job_completed_at =null; 
            $amount_receivced =null; 
        }elseif($request->order_status==3){
            $request->order_status='Inprogress';
            $job_started_at =date('Y-m-d H:i:s'); 
            $job_completed_at =null; 
            $amount_receivced =null; 

        }elseif($request->order_status==4){
            $request->order_status='Completed';
            $job_started_at =$serviceBooking->job_started_at; 
            $job_completed_at =date('Y-m-d H:i:s'); 
            $amount_receivced =$request->amount_receivced; 

        }elseif($request->order_status==5){
            $request->order_status='Rejected';
            $job_started_at =$serviceBooking->job_started_at; 
            $job_completed_at =$serviceBooking->job_completed_at; 
            $amount_receivced =$serviceBooking->amount_receivced; 


        }
        $serviceBooking->order_status=$request->order_status;
        $serviceBooking->job_started_at=$job_started_at;
        $serviceBooking->job_completed_at=$job_completed_at;
        $serviceBooking->amount_receivced=$amount_receivced?$amount_receivced:null;
        $serviceBooking->save();
        $message = "Order status been updated successfully!";

        // $details = [
        //     'title' => 'Order Enquery',
        //     'body' => 'Dear User, your order status has been updated to '.$serviceBooking->order_status.' and worker will contact you soon ',
        // ];
       
        // \Mail::to('Zeeshanhabib21@gmail.com')->send(new \App\Mail\OrderMailer($details));

        return redirect()->route('sprovider.orders')->with('message',$message); 

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
