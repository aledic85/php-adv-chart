
function getMonths() {

  var months = [];

  for (var i = 0; i <= 11; i++) {

    var mom = moment();
    var month = mom.month(i).format("MMMM");

    months.push(month)
  }

  return months;
}

function stampCharts() {

  var urlParams = new URLSearchParams(window.location.search);
  var access = urlParams.get('access');
  $.ajax({

    url: "getChartsData.php",
    method: "GET",
    data: {

      access: access,
      label: getMonths()
    },
    success: function(inData) {

      var data = JSON.parse(inData);

      var ctx = document.getElementById('myChart').getContext('2d');
      new Chart(ctx, data.guest);

      var ctx = document.getElementById('myChart2').getContext('2d');
      new Chart(ctx, data.employee);

      var ctx = document.getElementById('myChart3').getContext('2d');
      new Chart(ctx, data.clevel);

      if (access == null) {

        alert(data);
      }
    }
  })
}

function init() {

  stampCharts();
}

$(document).ready(init);
