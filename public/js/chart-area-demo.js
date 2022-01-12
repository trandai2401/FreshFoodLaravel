var dataphp01;

$.ajax({
  method: "GET",
  url: "http://localhost/backend-chart-thuhoa/api-getdatachart.php",
  
  // data: { name: "John", location: "Boston" }
})
  .done(function( msg ) {
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Dai 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgb(255,186,87, 0.3)",
      borderColor: "rgb(242,111,28)",
      pointRadius: 5,
      pointBackgroundColor: "rgb(242,111,28)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgb(242,111,28)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: JSON.parse(msg),
      // [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451]
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 40000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
   
   
    
  });

  

// Set new default font family and font color to mimic Bootstrap's default styling


// Area Chart Example

