@extends('layouts.admin-navbar')

@section('content')
  <h3 style="color: grey">19 January 2019</h3>
  <h2>DAYS</h2>
  <table>
    <tr>
      <td><img src="{{asset('images/visitors-graph.jpg')}}"></td>
      <td style="text-align: center; padding-left: 3em; font-size: 2.5em">Today <strong>100</strong> visitors</td>
    </tr>
  </table>
  <h2>MONTHS</h2>
  <table>
    <tr>
      <td><img src="{{asset('images/visitors-graph.jpg')}}"></td>
      <td style="text-align: center; padding-left: 3em; font-size: 2.5em">This month <strong>10000</strong> visitors</td>
    </tr>
  </table>
  <h2>YEARS</h2>
  <table>
    <tr>
      <td><img src="{{asset('images/visitors-graph.jpg')}}"></td>
      <td style="text-align: center; padding-left: 3em; font-size: 2.5em">This year <strong>1000000</strong> visitors</td>
    </tr>
  </table>
  <br>
  <h2 style="font-style: italic;">Based on Country (All time)</h2>

  <table class="table">
    <thead style="background-color: #404040; color: white; font-style: italic; font-size: 1.5em">
      <tr>
        <th class="col-lg-10" style="text-align: center">Based on Country (All time)</th>
        <th class="col-lg-2" style="text-align: center">Top ever</th>
      </tr>
    </thead>
    <tbody style="background-color: #B8B8B8">
      <tr>
        <td>
          <div class="row">
            <div class="col-lg-2" style="text-align: center"><i class="fas fa-chevron-left" style="font-size: 4em; padding-top: 0.3em"></i></div>
            <div class="col-lg-2" style="text-align: center; font-size: 1.5em"><img src="{{asset('images/ind.png')}}" width="28" height="21"> Indonesia<br><div style="padding-top: 1em; font-weight: bold">100000</div>visitors</div>
            <div class="col-lg-2" style="text-align: center; font-size: 1.5em"><img src="{{asset('images/malaysia.png')}}" width="28" height="21"> Malaysia<br><div style="padding-top: 1em; font-weight: bold">100000</div>visitors</div>
            <div class="col-lg-2" style="text-align: center; font-size: 1.5em"><img src="{{asset('images/sg.png')}}" width="28" height="21"> Singapore<br><div style="padding-top: 1em; font-weight: bold">100000</div>visitors</div>
            <div class="col-lg-2" style="text-align: center; font-size: 1.5em"><img src="{{asset('images/jpn.png')}}" width="28" height="21"> Japan<br><div style="padding-top: 1em; font-weight: bold">100000</div>visitors</div>
            <div class="col-lg-2" style="text-align: center"><i class="fas fa-chevron-right" style="font-size: 4em; padding-top: 0.3em"></i></div>
        </td>
        <td><div class="col-lg" style="text-align: center; font-size: 1.5em"><img src="{{asset('images/ind.png')}}" width="28" height="21"> Indonesia<br><div style="padding-top: 1em; font-weight: bold">100000</div>visitors</div></td>
      </tr>
    </tbody>
  </table>                 
@endsection