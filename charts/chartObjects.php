

<script> 

const Variables = {
    background: "rgba(250, 247, 247, 0)",
    fontFamily: 'sans-serif',
    title:  {
        fontSize: '20',
    },
    subTitle:  {
        fontSize: '15',
    },
    
   
}

window.onload = function () {



  CanvasJS.addColorSet("myShades",
                [

                "#0157FB",
                "#F5705C",
                "#69f065",
                "#f065bd",
                "#90EE90"                
                ]);



var TransitTotals = new CanvasJS.Chart("TransitTotalDiv", {
    animationEnabled: true,
    theme: "dark1",
    backgroundColor: Variables.background,
    colorSet: "myShades",
	title: {
        text: "Total In Transit",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
    },
    subtitles: [{
        text: "Onboard --> Pickup2",
        fontFamily: Variables.fontFamily,
		fontSize: Variables.subTitle.fontSize
	}],
	// axisY: {
	// 	suffix: "%",
	// 	scaleBreaks: { autoCalculate: true }
	// },
	data: [{
		type: "column",
		// yValueFormatString: "#,##0\"%\"",
		indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($TransitTotalData, JSON_NUMERIC_CHECK); ?>
	}]
});
TransitTotals.render();
 




var ClientShipments = new CanvasJS.Chart("ClientShipmentsDiv", {
	animationEnabled: true,
    exportEnabled: true,
    colorSet: "myShades",
    theme: "dark1", // "light1", "light2", "dark1", "dark2"
    backgroundColor: Variables.background,
	title:{
        text: "Client Shipments Per Week",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
    },
    subtitles: [{
        text: "With ETA of a week",
        fontFamily: Variables.fontFamily,
		fontSize: Variables.subTitle.fontSize
	}],
	axisX:{
		reversed: true
	},
	toolTip:{
		shared: true
	},
	data: [{
        type: "stackedBar",
        showInLegend: true,
		name: "Air Freight",
		dataPoints: <?php echo json_encode($cs1, JSON_NUMERIC_CHECK); ?>
	},{
        type: "stackedBar",
        showInLegend: true,
		name: "Ocean Freight",
		dataPoints: <?php echo json_encode($cs2, JSON_NUMERIC_CHECK); ?>
	},{
        type: "stackedBar",
        showInLegend: true,
		name: "LCL",
		indexLabel: "#total",
		indexLabelPlacement: "outside",
		indexLabelFontSize: 15,
		indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($cs3, JSON_NUMERIC_CHECK); ?>
	}]
});
ClientShipments.render();
 




var FreightSpendingMonthly = new CanvasJS.Chart("FreightSpendingDiv", {
    animationEnabled: true,
    backgroundColor: Variables.background,
    colorSet: "myShades",
	theme: "dark1",
	title:{
        text: "Freight Spent Monthly",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
    },
    subtitles: [{
        text: "Ocean Track",
        fontFamily: Variables.fontFamily,
		fontSize: Variables.subTitle.fontSize
	}],
	legend:{
		cursor: "pointer",
		verticalAlign: "bottom",
		horizontalAlign: "center",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Last Year",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($fsm1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "This year",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($fsm2, JSON_NUMERIC_CHECK); ?>
	}]
});
FreightSpendingMonthly.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	FreightSpendingMonthly.render();
}








var FreightBreakdown = new CanvasJS.Chart("FreightBreakdownDiv", {
    animationEnabled: true,
    backgroundColor: Variables.background,
    colorSet: "myShades",
	theme: "dark1",
	title:{
        text: "Freight Spending Breakdown - This Monthly",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
    },
    subtitles: [{
        text: "Overall",
        fontFamily: Variables.fontFamily,
		fontSize: Variables.subTitle.fontSize
	}],
	legend:{
		cursor: "pointer",
		verticalAlign: "bottom",
		horizontalAlign: "center",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "This year",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		dataPoints: <?php echo json_encode($freightBreakdownData, JSON_NUMERIC_CHECK); ?>
	}]
});
FreightBreakdown.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	FreightBreakdown.render();
}



var chartBilledDaily = new CanvasJS.Chart("BilledDailyData", {
    colorSet: "myShades",
	theme: "dark1",
    animationEnabled: true,
    backgroundColor: "rgba(250, 247, 247, 0)",
	title: {
        text: "World Energy Consumption by Sector - 2012",
        fontFamily: "sans-serif",
        fontSize: Variables.title.fontSize

	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($BilledDailyData, JSON_NUMERIC_CHECK); ?>
	}]
});
chartBilledDaily.render();
 

 




var combined = new CanvasJS.Chart("Combined", {
    colorSet: "myShades",
    theme: "dark1",
    animationEnabled: true,
    backgroundColor: "rgba(250, 247, 247, 0)",

	title:{
        text: "Monthly Billed Performance",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
	},
	subtitles: [{
        text: "GBP & EUR to INR",
        fontFamily: Variables.fontFamily,
		fontSize: Variables.subTitle.fontSize
	}],
	axisY: {
		includeZero: false,
		prefix: "$"
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	toolTip: {
		shared: true
	},
	data: [
	{
		type: "area",
		name: "Expected Billed",
		showInLegend: "true",
		xValueType: "dateTime",
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "₹#,##0.##",
		dataPoints: <?php echo json_encode($dataPoints1); ?>
	},
	{
		type: "column",
		name: "Current",
		showInLegend: "true",
		xValueType: "dateTime",
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "₹#,##0.##",
		dataPoints: <?php echo json_encode($dataPoints2); ?>
    },
    {
		type: "line",
		name: "Average Last Year",
		showInLegend: "true",
		xValueType: "dateTime",
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "₹#,##0.##",
		dataPoints: <?php echo json_encode($dataPoints3); ?>
    },
    
	]
});
 
combined.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	combined.render();
}


}







</script>