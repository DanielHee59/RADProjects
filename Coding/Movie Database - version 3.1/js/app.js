$(document).ready(function(){
	$.ajax({
		url:"http://localhost/Project/top10.php",
		method: "GET",
		success: function(data){
			console.log(data);
			var title = [];
			var numofsearch =[];
			
			for(var i in data){
				title.push(data[i].title);
				numofsearch.push(data[i].numofsearch);
			}		
			var graph = {
				labels: title,
				datasets :[
					{
						label: "Top Searched",
						backgroundColor : 'rgba(193, 66, 66, 0.2)',
						borderColor : 'rgba(64, 1, 1, 0.97)',
						hoverBackgroundColor : 'rgba(251, 135, 3, 0.61)',
						data : numofsearch
					}
				]
			};
		
		var c = $("#canvas");
		
		var bar = new Chart(c,{
				type : 'bar',
				data: graph
		});
	},
		error : function(data){
			console.log(data);
		}
	});
 });