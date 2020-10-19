@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
                <div class="card-header">المسوقين</div>

                <div class="card-body" >
                    @if (session('success'))
                        <div class="alert alert-success" role="alert" style="text-align: right">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert" style="text-align: right">
                        {{ session('error') }}
                    </div>
                @endif


                <div class="table-responsive">
                    <table class="table table-striped" dir="rtl" style="text-align: center">
                        <thead>
                          <tr>
                            <th >#</th>
                            <th >الاسم</th>
                            <th >النوع</th>
                            <th >الهاتف</th>
                            <th >العنـوان</th>
                            <th >عدد العملاء</th>
                            <th >اعلان المسوق </th>
                            <th >تعديل</th>
                            <th>حـذف</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($mymarketer as $index=>$marketer)
                            <tr>
                            <th scope="row">{{$index+=1}}</th>
                            <td>{{$marketer->name}}</td>
                            <td>{{($marketer->gender == 1) ?'ذكـر'  : 'أنثـى' }}</td>
                            <td>{{$marketer->phone}}</td>
                            <td>{{$marketer->address}}</td>
                            <td>{{$marketer->customers_count}}</td>
                            <td> <a href="https://wa.me/?text=+http://localhost:8000/advertisement/{{$marketer->slug}}" class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </a> </a>
 
                            {{-- <td >
                                <a href ="{{ route('marketers.advertisement',$marketer->slug) }}" class="btn btn-primary">
                              <b>    <i class="fa fa-link" style=" color:white;"></i>  </b> </a> 
                                  </td> --}}
                                      <td >
                                <a href ="{{ route('marketers.edit',$marketer->id) }}" class="btn btn-info">
                              <b>    <i class="fa fa-edit" style=" color:white;"></i>  </b> </a> 
                                  </td>
                                  <td >
                                    <a href ="{{ route('marketers.delete',$marketer->id) }}" class="btn btn-danger">
                                  <b>    <i class="fa fa-trash"></i>  </b> </a> 
                                      </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                      {{ $mymarketer->appends(request()->query())->links() }}
<center>
    <a href ="{{ route('marketers.create') }}" class="btn btn-success">
        <b>    <i class="fa fa-plus" style=" color:white;"></i>  اضافة مسـوق  </b> </a> 
            </td>
</center>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
