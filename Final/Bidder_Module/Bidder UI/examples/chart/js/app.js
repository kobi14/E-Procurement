$(document).ready(function(){
	$.ajax({
		url: 'http://localhost/E-Procurement/Final/Bidder_Module/Bidder%20UI/examples/data.php',
		method: "GET",
    dataType: "json",
		success: function(data) {
			console.log(data);
		var owner = [];
			var tender = [];

			for(var i in data) {
				owner.push( data[i].TOwner);
				tender.push(data[i].TCount);
			}

			var chartdata = {
				labels: owner,
				datasets : [
					{
						label: 'Number of Tenders',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: tender
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: "bar",
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
