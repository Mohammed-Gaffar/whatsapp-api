<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Exception;
use App\marketer;
use App\User;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(auth()->user()->rank == 1) { //admin
           $customers=customer::latest()->paginate(10);
           return view('customers.index',compact('customers'));
       }
       else if(auth()->user()->rank == 2) { //marketer
        $customers=customer::where('user_id','=',auth()->user()->id)->latest()->paginate(10);
        return view('customers.index',compact('customers')); 
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
     
        try {    
             $marketer=User::where('slug','=',$request->mraketer_slug)->first();
            $customer= new customer;
            $customer->user_id=$marketer->id;
            $customer->name=$request->name;
            $customer->phone=$request->phone;
            if($customer->save()){
                $marketer->customers_count+=1;
                $marketer->update();
             return  redirect()->route('marketers.advertisement',$marketer->slug)->with('success', 'تم ارسال البيانات بنجاح');
            }
        }
        catch(Exception $e) {
            return  redirect()->back()->with('error', 'فشل ارسال البيانات');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
