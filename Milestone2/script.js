
function getMonths() {

  var months = [];

  for (var i = 0; i <= 11; i++) {

    var mom = moment();
    var month = mom.month(i).format("MMMM");

    months.push(month)
  }

  return months;
}

function stampChartLine() {

  $.ajax({

    url: "getChartLine.php",
    method: "GET",
    data: {

      labels: getMonths()
    },
    success: function(inData) {

      var chartsData = JSON.parse(inData);

      var ctx = document.getElementById('myChart').getContext('2d');
      new Chart(ctx, chartsData);
    }
  })

}

function stampChartPie() {

  $.ajax({

    url: "getChartPie.php",
    method: "GET",
    success: function(inData) {

      var chartsData = JSON.parse(inData);

      var ctx = document.getElementById('myChart2').getContext('2d');
      new Chart(ctx, chartsData);
    }
  })

}

function init() {

  stampChartLine();
  stampChartPie();
}

$(document).ready(init);
