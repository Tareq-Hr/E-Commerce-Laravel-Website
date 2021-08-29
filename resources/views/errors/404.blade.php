@extends('main')

@section('content')
<center>
  
  <div class='pos-a t-0 l-0 bgc-white w-100 h-100 d-f fxd-r fxw-w ai-c jc-c pos-r p-30' style="padding-top: 20px">
    <div class='mR-60'>
      <img alt='404' src="{{asset('front/img/404.jpg')}}"/>
    </div>

    <div class='d-f jc-c fxd-c'>
        <a href="{{route('front_home')}}" type='primary' class='btn btn-primary'>Go to Home</a>
    </div>
  </div>

</center>
@endsection