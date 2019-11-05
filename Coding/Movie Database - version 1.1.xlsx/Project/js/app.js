$(document).ready(function(){
    $.ajax({
      url: "http://localhost/project/top10.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var title = [];
        var numberofsearch = [];
  
        for(var i in data) {
          title.push( data[i].title); //get Title data
          numberofsearch.push(data[i].numberofsearch); //get NumberofSearch data
        }
  
        var chartdata = {
          labels: title, //set X-axis as title name
          datasets : [
            {
              label: 'Number of Search', //Title of the graph
              backgroundColor: 'rgba(200, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: numberofsearch //set y-axis as the result
            }
          ]
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