@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center">
                <div class="card-header">الاعلان</div>

                <div class="card-body" >
                  
                        هنا سيتم وضع الاعلان
                    
<br>
<br>
<center>
    <div class="sharethis-inline-share-buttons"></div>
</center>


<hr>
@if (session('success'))
<div class="alert alert-success" role="alert" style="text-align: center">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger" role="alert" style="text-align: center">
{{ session('error') }}
</div>
@endif
{{-- <pre class="hd he hf hg hh if ig ih"><span id="5c7d" class="co ii ij eq ik b cl il im w in" data-selectable-paragraph=""><mark class="vq po kp">javascript:{window.location=’</mark><mark class="vq po kp"><a href="https://wa.me/?text='+encodeURIComponent(window.location.href)}" class="cr ie" rel="noopener nofollow">https://wa.me/?text='+encodeURIComponent(window.location.href)}</a></mark></span></pre> --}}
<br>
{{-- @if (!session('success') && !auth::check()) --}}
@if (!session('success'))
<h5>هل ترغب في الحصول على الخدمه ؟ راسلنا </h5>
<br>
<form action="{{route('customers.store')}}" method="post">
    @csrf
    <input type="text" class="form-control" name="mraketer_slug" value="{{$marketer->slug}}" style="display: none">

    <div class="row" dir="rtl" style="text-align: right">
    <div class="col-md-6">
        <label> الاسـم :  </label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="col-md-6">
        <label> الهاتـف :  </label>
        <input type="text" class="form-control" name="phone">

    </div> 
</div> <br>
   
<center>
<button type="submit" class="btn btn-success"> ارسال</button>
</center>
</form>
@endif
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f89b29cde3a4400125a4bbd&product=inline-share-buttons" async="async"></script>
@endsection
