@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
                <div class="card-header">الرئيسية</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@php
 use App\user;
 use App\customer;
 $marketers=user::all()->count()-1; //this one is you :)
 if(auth()->user()->rank == 1) {
 $customers=customer::all()->count();}
 else if(auth()->user()->rank == 2) {
$customers=customer::where('user_id','=',auth()->user()->id)->count();;
 } 

@endphp
                    <div class="row">
                        <div class="col-md-6">
                            @if(auth()->user()->rank == 1)
                            <div class="card" style="width: 18rem; text-align: center">
                                <img class="card-img-top"  style="width:100%;height:150px" src="{{asset('images/marketers.png')}}" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title"><h4><b>المسوقيـن </b> <h4></h5><hr>
                                  <a href="{{route('marketers')}}" class="btn btn-primary"><h4>&nbsp;{{$marketers}} &nbsp;</h4></a>
                                </div>
                              </div>
                              @endif
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem; text-align: center">
                                <img class="card-img-top"  style="width:100%;height:150px" src="{{asset('images/customers.png')}}" alt="Card image cap">
                                <div class="card-body">
                                    @if(auth()->user()->rank == 1)
                                    <h5 class="card-title"><h4><b>العمـلاء </b> <h4></h5><hr>
                                      @elseif(auth()->user()->rank == 2)
                                      <h5 class="card-title"><h4><b>عمـلاء من طرفي </b> <h4></h5><hr>
                                     @endif
                                     <a href="{{route('customers')}}" class="btn btn-primary"><h4>&nbsp;{{$customers}} &nbsp;</h4></a>
                                    </div>
                              </div>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
