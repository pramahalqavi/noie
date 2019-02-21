@extends('layouts.admin-navbar')

@section('title', 'Statistics')

@section('content')
  <h3 id="cur-date" style="color: grey"></h3>
  <div class="visitor-chart" id="daily-chart"></div>
  <br>
  <div class="visitor-chart" id="monthly-chart"></div>
  <br>
  <div class="visitor-chart" id="yearly-chart"></div>
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
  <script>
    $(document).ready(function() {
      var today = new Date();
      var date = 'Today: ' + today.getDate() + ' ' + getMonthName(today.getMonth()) + ' ' + today.getFullYear();
      document.getElementById('cur-date').innerHTML = date;
      // Daily Chart
      var chart = {
        type: 'column'
      };
      var title = {
          text: 'Daily Visitor'   
      };
      var month = 'Month: '
      month += getMonthName(new Date().getMonth());
      var subtitle = {
          text: month
      };
      var days = getDaysInMonth(new Date().getMonth(),new Date().getFullYear());
      var xAxis = {
        title: {
          text: 'Date'
        },
        categories: days
      };
      var yAxis = {
          title: {
            text: 'Visitor'
          },
      };
      var series =  [{
            name: 'Visitor',
            data: [1,2,3]
          }
      ];
      var json = {};
      json.chart = chart;
      json.title = title;
      json.subtitle = subtitle;
      json.xAxis = xAxis; 
      json.yAxis = yAxis;
      json.series = series;
      $('#daily-chart').highcharts(json);
      
      // Monthly Chart
      var chart = {
        type: 'column'
      };
      var title = {
          text: 'Monthly Visitor'   
      };
      var year = 'Year: '
      year += new Date().getFullYear();
      var subtitle = {
          text: year
      };
      var xAxis = {
        title: {
          text: 'Month'
        },
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      };
      var yAxis = {
          title: {
            text: 'Visitor'
          },
      };
      var series =  [{
            name: 'Visitor',
            data: [1,2,3]
          }
      ];
      var json = {};
      json.chart = chart;
      json.title = title;
      json.subtitle = subtitle;
      json.xAxis = xAxis; 
      json.yAxis = yAxis;
      json.series = series;
      $('#monthly-chart').highcharts(json);

      // Yearly Chart
    var chart = {
        type: 'column'
      };
      var title = {
          text: 'Yearly Visitor'   
      };
      var xAxis = {
        title: {
          text: 'Year'
        },
        categories: ['2017','2018','2019']
      };
      var yAxis = {
          title: {
            text: 'Visitor'
          },
      };
      var series =  [{
            name: 'Visitor',
            data: [1,2,3]
          }
      ];
      var json = {};
      json.chart = chart;
      json.title = title;
      json.xAxis = xAxis; 
      json.yAxis = yAxis;
      json.series = series;
      $('#yearly-chart').highcharts(json);

    });
  </script>
@endsection