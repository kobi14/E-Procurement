$(document).ready(function(){
	$.ajax({
		url:" http://localhost/E-Procurement/Final/Bidder_Module/Bidder%20UI/examples/bardata.php",
		method: "GET",
    dataType: "json",
		success: function(data) {
			console.log(data);
		var bidder= [];
		var tenders = [];

			for(var i in data) {
				bidder.push( data[i].BidderID);
				tenders.push(data[i].TCount);
			}

			var chartdata = {
				labels: bidder,
				datasets : [
					{
						label: 'Number of Tenders',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: tenders
					}
				]
			};

			var ctx = $("#mycanvas2");

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
