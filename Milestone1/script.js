
function stampChartSales() {

  $.ajax({

    url: "getChartSales.php",
    method: "GET",
    success: function(data) {

      var sales = JSON.parse(data);
      var months = getMonths();
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {

        type: 'line',
        data: {
          labels: months,
          datasets: [{
            label: 'Sales',
            backgroundColor: 'green',
            borderColor: 'rgb(255, 99, 132)',
            data: sales
          }]
        }
      });
    }
  })
}

function getMonths() {

  var months = [];

  for (var i = 0; i <= 11; i++) {

    var mom = moment();
    var month = mom.month(i).format("MMMM");

    months.push(month)
  }

  return months;
}

function init() {

  stampChartSales()
}

$(document).ready(init);
