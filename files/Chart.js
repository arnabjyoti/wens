$(document).ready(function(){
    $.ajax({
      url: "http://127.0.0.1/adrp/files/chart-data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var month = [];
        var total = [];

        for(var i in data){
          month.push("month " + data[i].monthid);
          total.push(data[i].total);
        }
        var chartdata = {
          labels: month,
          datasets : [
          {
            label : 'month Total',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 0.75)',
            hoverBorderColor: 'rgba(200, 200, 200, 0.75)',
            data: total
          }]
        };
      var ctx = $("#mycanvas");
      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
      error: function(data) {
        console.log(data);
      }
    });
  });