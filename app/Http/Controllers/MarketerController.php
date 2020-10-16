<?php

namespace App\Http\Controllers;

use App\marketer;
use Illuminate\Http\Request;
use Exception;
class MarketerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mymarketer=marketer::where('user_id','=',auth()->user()->id)->latest()->paginate(10);
   return view('marketers.index',compact('mymarketer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketers.create');

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
            $marketer= new marketer;
            $marketer->user_id=auth()->user()->id;
            $marketer->name=$request->name;
            $marketer->slug=str_replace(' ','_',$request->name).time(); //
            $marketer->phone=$request->phone;
            $marketer->address=$request->address;
            $marketer->gender=$request->gender;
            if($marketer->save()){
             return  redirect()->route('marketers')->with('success', 'تم حفظ البيانات بنجاح');
            }
        }
        catch(Exception $e) {
            return  redirect()->back()->with('error', 'فشل اضافة البيانات');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\marketer  $marketer
     * @return \Illuminate\Http\Response
     */
    public function show(marketer $marketer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\marketer  $marketer
     * @return \Illuminate\Http\Response
     */
    public function edit(marketer $marketer)
    {
        return view('marketers.edit',compact('marketer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\marketer  $marketer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marketer $marketer)
    {
        try {
            $marketer->name=$request->name;
            $marketer->slug=str_replace(' ','_',$request->name).time(); //
            $marketer->phone=$request->phone;
            $marketer->address=$request->address;
            $marketer->gender=$request->gender;
            if($marketer->save()){
             return  redirect()->route('marketers')->with('success', 'تم تعديل البيانات بنجاح');
            }
        }
        catch(Exception $e) {
            return  redirect()->back()->with('error', 'فشل تعديل البيانات');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\marketer  $marketer
     * @return \Illuminate\Http\Response
     */
    public function destroy(marketer $marketer)
    {
        try {
              if($marketer->delete()){
             return  redirect()->route('marketers')->with('success', 'تم حـذف البيانات بنجاح');
            }
        }
        catch(Exception $e) {
            return  redirect()->back()->with('error', 'فشل حـذف البيانات');

        }
    }

    public  function advertisement($slug)
    {
        $marketer=marketer::where('slug','=',$slug)->first();
    return view('advertisement',compact('marketer'));
    }
}
