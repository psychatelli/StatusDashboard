

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

                "#737ef1",
                "#4b58ea",
                            
                ]);


var chart = new CanvasJS.Chart("rep1Div", {
    theme: "dark1",
    colorSet: "myShades",
    animationEnabled: true,
    backgroundColor: "rgba(250, 247, 247, 0)",

	title:{
        text: "Rep1 Billed Daily",
        fontFamily: Variables.fontFamily,
        fontSize: Variables.title.fontSize
	},
	subtitles: [{
        text: "Billed vs. Unbilled",
        fontFamily: Variables.fontFamily,
		fontSize: Variables.subTitle.fontSize
	}],
	data: [{
		type: "pie",
		indexLabel: "{y}",
		// yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($rep1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 



}







</script>
