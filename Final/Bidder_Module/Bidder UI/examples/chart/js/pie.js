$(document).ready(function(){
	$.ajax({
		url: 'http://localhost/E-Procurement/Final/Bidder_Module/Bidder%20UI/examples/piedata.php',
		method: "GET",
    dataType: "JSON",
		success: function(data) {
			console.log(data);
    /*  var ctx = $("#mycanvas1").get(0).getContext("2d");*/
  				//pie chart data
  				//sum of values = 360
            var goods =data[0].TCount ;
      			var services =data[1].TCount ;
            var works=data[2].TCount ;

            var pieData = {
     labels: ["Goods", "Works", "Services"],
     datasets: [
         {
             data: [parseInt(goods), parseInt(services), parseInt(works)],
             backgroundColor: [
                  "#878BB6",
                  "#4ACAB4",
                  "#FF8153",

             ]
         }]
};

  				/*var data = [
  					{
  						value:200,
  						color: "cornflowerblue",
  						highlight: "lightskyblue",
  						label: "goods"
  					},
  					{
  						value: 100,
  						color: "lightgreen",
  						highlight: "yellowgreen",
  						label: "Services"
  					},
  					{
  						value: 60,
  						color: "orange",
  						highlight: "darkorange",
  						label: "Works"
  					}
  				];*/
  				//draw

      /*    var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
    options: options
});*/var ctx = document.getElementById("mycanvas1").getContext("2d");
    var myPieChart = new Chart(ctx, {
           type: 'pie',
           data: pieData
       });
		},
		error: function(data) {
			console.log(data);
		}
	});
});
