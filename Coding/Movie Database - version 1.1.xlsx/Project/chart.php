<!DOCTYPE html>
<html>
<head>
<title>Top 10 Frequent Search Movie Title</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("top10.php",
                function (data)
                {
                    console.log(data);
                     var title = [];
                    var numberofsearch = [];

                    for (var i in data) {
                        title.push(data[i].title);
                        numberofsearch.push(data[i].numberofsearch;
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Number of Search',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>