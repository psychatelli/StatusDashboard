

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
                "#01f6ff", //Air Freight
                "#0038ff", // Ocean Freight
                "#0129b7", // LCL
                "#ff02d9", // Domestic
                "#e9ff01"  // Break Bulk              
                ]);
	// CanvasJS.addColorSet("myShades",
    //             [
    //             "#02fff6",
    //             "#02c9c2",
    //             "#01a39d",
    //             "#007a75",
    //             "#005955"                
    //             ]);

	CanvasJS.addColorSet("FreightBreakdownColor",
                [
                "#01f6ff", //Air Freight
                "#0038ff", // Ocean Freight
                "#ff02d9", // Domestic
                "#8f00fc"  // Duties              
                ]);

	// CanvasJS.addColorSet("FreightBreakdownColor",
    //             [
    //             "#02fff6",
    //             "#02c9c2",
    //             "#007a75",
    //             "#003532"                
    //             ]);
	
				



var TransitTotals = new CanvasJS.Chart("TransitTotalDiv", {
    animationEnabled: true,
    theme: "dark1",
    backgroundColor: Variables.background,
    colorSet: "myShades",
	title: {
        text: "Total In Transit (1st - End Of Month)",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
    },
    subtitles: [{
        text: "Onboard ---> Pickup2",
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
        text: "Client Shipments Per Week (CAN, USA, MEX)",
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
		// indexLabel: "#total",
		// indexLabelPlacement: "outside",
		// indexLabelFontSize: 15,
		// indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($cs3, JSON_NUMERIC_CHECK); ?>
	},
	{
        type: "stackedBar",
        showInLegend: true,
		name: "Domestic",
		// indexLabel: "#total",
		// indexLabelPlacement: "outside",
		// indexLabelFontSize: 15,
		// indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($cs4, JSON_NUMERIC_CHECK); ?>
	},
	{
        type: "stackedBar",
        showInLegend: true,
		name: "Break Bulk",
		indexLabel: "#total",
		indexLabelPlacement: "outside",
		indexLabelFontSize: 15,
		indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($cs5, JSON_NUMERIC_CHECK); ?>
	}
	
	]
});
ClientShipments.render();
 




var FreightSpendingMonthly = new CanvasJS.Chart("FreightSpendingDiv", {
    animationEnabled: true,
    backgroundColor: Variables.background,
    // colorSet: "myShades",
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
		color: "#fc0000",
		name: "Last Year",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($fsm1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		color: "#6d0101",
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
    colorSet: "FreightBreakdownColor",
	theme: "dark1",
	title:{
        text: "Freight Spending Breakdown - This Monthly",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
    },
    subtitles: [{
        text: "Peter Wittwer & Ocean Track",
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




var combined = new CanvasJS.Chart("Combined", {
    //colorSet: "myShades",
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
		color: '#00fcc5',
		name: "Expected Billed",
		showInLegend: "true",
		xValueType: "dateTime",
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "$#,##0.##",
		dataPoints: <?php echo json_encode($dataPoints1); ?>
	},
	{
		type: "column",
		color: '#272826',
		name: "Current",
		showInLegend: "true",
		xValueType: "dateTime",
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "$#,##0.##",
		dataPoints: <?php echo json_encode($dataPoints2); ?>
    },
    {
		type: "line",
		color: "#f27482",
		name: "Last Year",
		showInLegend: "true",
		xValueType: "dateTime",
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "$#,##0.##",
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
