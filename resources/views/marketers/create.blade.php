@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
                <div class="card-header" dir="rtl">اضافة مسوق</div>

                <div class="card-body" >
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert" style="text-align: right">
                        {{ session('error') }}
                    </div>
                @endif

                        <form action="{{route('marketers.store')}}" method="post">
                            @csrf
                            <div class="row" dir="rtl" style="text-align: right">
                            <div class="col-md-6">
                                <label> الاسـم :  </label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-6">
                                <label> النـوع :  </label>
                                <select name="gender" class="form-control">
                                    <option value="1">ذكر</option>
                                    <option value="0">أنثـى</option>
                                </select>
                            </div>
                        </div> <br>
                            <div class="row" dir="rtl" style="text-align: right">
                                <div class="col-md-6">
                                    <label> العنـوان :  </label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="col-md-6">
                                    <label> الهاتـف :  </label>
                                    <input type="text" class="form-control" name="phone">

                                </div>
                            </div>
                            <br>
                            <div class="row" dir="rtl" style="text-align: right">
                                <div class="col-md-6">
                                    <label> البريد الالكتروني :  </label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label> كلمة المرور :  </label>
                                    <input type="password" class="form-control" name="password">

                                </div>
                            </div>
                        <br>
                        <center>
                        <button type="submit" class="btn btn-success"> حفـظ</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
