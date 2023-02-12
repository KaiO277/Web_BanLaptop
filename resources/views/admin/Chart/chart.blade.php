@extends('Admin.back.master')
@section('content')
<style type="text/css">
.highcharts-figure,
.highcharts-data-table table {
  min-width: 360px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
<div class="content-wrapper" style="min-height: 1345.6px;">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


@php
$max_date = 30;
  $arr = [];
  $today = date('d');
  if($today < $max_date){
    $get_day_last_month = $max_date - $today;
    $last_month = date('m', strtotime("-1 month"));
    $last_month_date = date('Y-m-d', strtotime("-1 month"));
    $max_day_last_month = (new DateTime($last_month_date))->format('t');
    $start_day_last_month = $max_day_last_month - $get_day_last_month;
    for($i = $start_day_last_month; $i<=$max_day_last_month; $i++){
      $key = $i . '-' . $last_month;
      $arr[$key] = 0;
    }
    $start_date_this_month = 1;
  }else {
    $start_date_this_month = $today - $max_date;
  }
  $this_month = date('m');
  for($i = $start_date_this_month; $i<=$today; $i++){
    $key = $i . '-' . $this_month;
    $arr[$key] = 0;
  }
  $t = 0;
  foreach ($result as $each) {
    $arr[$each->ngay] = (float)$each->doanhthu;
    $t +=  (float)$each->doanhthu;    
  }
  // dd($t);
  $arrX = array_keys($arr);
  $arrY = array_values($arr);
@endphp
<figure class="highcharts-figure">
  <br><br>
  <div id="container"></div>
  <p class="highcharts-description">
    {{-- Basic line chart showing trends in a dataset. This chart includes the
    <code>series-label</code> module, which adds a label to each line for
    enhanced readability. --}}
    Tổng doanh thu trong 30 ngày qua: 
    @php
      echo '<b>'.number_format($t).' VNĐ</b>' ;
    @endphp
  </p>
</figure>
<script>
  Highcharts.chart('container', {

title: {
  text: 'Thống kê Doanh thu trong 30 ngày qua'
},

// subtitle: {
//   text: 'Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>'
// },

yAxis: {
  title: {
    text: 'Tổng tiền'
  }
},

xAxis: {
  categories: 
  <?php 
  echo json_encode($arrX);
  ?> ,
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

plotOptions: {
  series: {
    label: {
      connectorAllowed: false
    },
  }
},

series: [{
  name: 'Doanh thu',
  data: <?php 
  echo json_encode($arrY);
  ?>
}],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
</script>
</div>  
</div>  
@endsection