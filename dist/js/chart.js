$(document).ready(function(){
    $.ajax({
      url: "http://127.0.0.1/adrp/files/chart-data.php";
      method: "GET",
      success: function(data1) {
        console.log(data1);
      },
      error: function(data1) {
        console.log(data);
      }
    });
  });