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

  <table class="table table-striped">
  <thead style="background-color: #e64a19; color: white">
    <tr>
      <th scope="col" width="10%">No.</th>
      <th scope="col" width="10%">Flag</th>
      <th scope="col" width="15%">Country Code</th>
      <th scope="col" width="15%">Count</th>
    </tr>
  </thead>
  <tbody>
  <?php $number = 1; ?>
  @if ($country_count->count())
    @foreach ($country_count as $index => $country)
      <tr> 
        <td> {{$number++}} </td>
        <td>
        @if (strtolower($country->country_code) != 'unknown' && $country->country_code != null)
          <img src="{{asset('images/flags/'.$country->country_code.'.png')}}"/> 
        @endif
        </td>
        <td> {{$country->country_code}} </td>
        <td> {{$country->count_visitor}} </td>
      </tr>
    @endforeach
  @endif
  </tbody>
  <table>

  <script>
    $(document).ready(function() {
      var today = new Date();
      var date = 'Today: ' + today.getDate() + ' ' + getMonthName(today.getMonth()) + ' ' + today.getFullYear();
      document.getElementById('cur-date').innerHTML = date;
      // Daily Chart
      var chart = {
        type: 'area'
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
      var json_data = {!! json_encode($dailyVisitors) !!};
      var data = []
      for (var i in json_data) {
        data.push(json_data[i]);
      }
      var series =  [{
            name: 'Visitor',
            data: data,
            color: 'rgb(230,74,25)',
            fillColor : {
              linearGradient : [0, 0, 0, 250],
              stops : [
                [0, 'rgb(250,200,211)'],
                [1, 'rgb(255,255,255)']
              ]
            },
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
        type: 'area',
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
      var json_data = {!! json_encode($monthlyVisitors) !!};
      var data = []
      for (var i in json_data) {
        data.push(json_data[i]);
      }
      var series =  [{
            name: 'Visitor',
            data: data,
            color: 'rgb(230,74,25)',
            fillColor : {
              linearGradient : [0, 0, 0, 250],
              stops : [
                [0, 'rgb(250,200,211)'],
                [1, 'rgb(255,255,255)']
              ]
            },
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
        type: 'area'
      };
      var title = {
          text: 'Yearly Visitor'   
      };
      var json_data = {!! json_encode($years) !!};
      var years = []
      for (var i in json_data) {
        years.push(json_data[i]);
      }
      var xAxis = {
        title: {
          text: 'Year'
        },
        categories: years
      };
      var yAxis = {
          title: {
            text: 'Visitor'
          },
      };
      var json_data = {!! json_encode($yearlyVisitors) !!};
      var data = []
      for (var i in json_data) {
        data.push(json_data[i]);
      }
      var series =  [{
            name: 'Visitor',
            data: data,
            color: 'rgb(230,74,25)',
            fillColor : {
              linearGradient : [0, 0, 0, 250],
              stops : [
                [0, 'rgb(250,200,211)'],
                [1, 'rgb(255,255,255)']
              ]
            },
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