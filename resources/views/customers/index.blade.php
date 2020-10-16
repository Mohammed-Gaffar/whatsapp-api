@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
                @if(auth()->user()->rank == 1)
                <div class="card-header">كـل العمـلاء</div>
                @elseif(auth()->user()->rank == 2)
                <div class="card-header">عمـلاء من طرفي</div>
                @endif

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
                            <th >الهاتف</th>
                            <th >المسـوق</th>
                              </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $index=>$customer)
                            <tr>
                            <th scope="row">{{$index+=1}}</th>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->marketer->name}}</td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                      {{ $customers->appends(request()->query())->links() }}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
