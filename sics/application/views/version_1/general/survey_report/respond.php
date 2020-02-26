<!DOCTYPE html>
<html>
<head>
	<title>Control</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/boostrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/bootstrap-theme.min.css')?>">

	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/fileinput.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/fileinput.min.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/jquery-ui.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo $general_class->ben_css('general/w3.css')?>">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script> -->
	<script src="<?php echo $general_class->ben_js('general/home/js/jquery.min.js') ?>"></script>
	<script src="<?php echo $general_class->ben_js('general/home/js/Chart.min.js') ?>"></script>
	<script src="<?php echo $general_class->ben_js('general/home/js/utils.js') ?>"></script>
		
    <style type="text/css">

    	li {
		  list-style-type: none;
		}
		.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
		    border: 1px solid #c5c5c5;
		    background: white;
		    font-weight: normal;
		    color: #454545;
		}
		.kv-upload-progress .kv-hidden{
			display: none;
		}

    	.sortable{
    		background-color: none;
    	}

    	/*Set the row height to the viewport*/
		.row-height{
		  height: 100vh;
		}

		/*Set up the columns with a 100% height, body color and overflow scroll*/

		.left{
	  		height: 100%;
	  		overflow-y: scroll;
	  		padding: 0;
		}

		.right{
		  	height: 100%;
		  	overflow-y: scroll;
		  	padding: 0;
		}

		.mid{
		  background-color: green;
		  height: 100%;
		  overflow-y: scroll;
		}

		/*Remove the scrollbar from Chrome, Safari, Edge and IE*/
		::-webkit-scrollbar {
		    width: 0px;
		    background: transparent;
		}

		* {
		  -ms-overflow-style: none !important;
		}

    	.radio-inline{
    		width: 100%;
    	}



    	/*checkbox*/
    	.checkbox label:after, 
		.radio label:after {
		    content: '';
		    display: table;
		    clear: both;
		}

		.checkbox .cr,
		.radio .cr {
		    position: relative;
		    display: inline-block;
		    border: 1px solid #a9a9a9;
		    border-radius: .25em;
		    width: 1.3em;
		    height: 1.3em;
		    float: left;
		    margin-right: .5em;
		}

		.radio .cr {
		    border-radius: 50%;
		}

		.checkbox .cr .cr-icon,
		.radio .cr .cr-icon {
		    position: absolute;
		    font-size: .8em;
		    line-height: 0;
		    top: 50%;
		    left: 20%;
		}

		.radio .cr .cr-icon {
		    margin-left: 0.04em;
		}

		.checkbox label input[type="checkbox"],
		.radio label input[type="radio"] {
		    display: none;
		}

		.checkbox label input[type="checkbox"] + .cr > .cr-icon,
		.radio label input[type="radio"] + .cr > .cr-icon {
		    transform: scale(3) rotateZ(-20deg);
		    opacity: 0;
		    transition: all .3s ease-in;
		}

		.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
		.radio label input[type="radio"]:checked + .cr > .cr-icon {
		    transform: scale(1) rotateZ(0deg);
		    opacity: 1;
		}

		.checkbox label input[type="checkbox"]:disabled + .cr,
		.radio label input[type="radio"]:disabled + .cr {
		    opacity: .5;
		}
    	/*checkbox*/

    	.sortable{
    		padding: 0;
    	}
    	::-webkit-scrollbar {
		  width: 15px;
		}

		/* Track */
		::-webkit-scrollbar-track {
		  background: #f1f1f1; 
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
		  background: #888; 
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
		  background: #555; 
		}

		canvas{
			margin: 0 auto;
		}
    </style>
</head>
<body style="margin: 0">
	<div class = "container-fluid">
      	<div class = "row row-height">
	        <div class = "col-sm-6 left">		        
	        	<iframe style="height: 99.4%;width: 100%;" id="optical_pdf" class="embed-responsive-item" src="<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/survey/'.$data[0]['survey_id'].'/'.$data[0]['survey_pdf_file_name'])); ?>"></iframe>
	        </div>
	        <div class="col-sm-6 right">
	        	<table class="table table-bordered table-striped" style="margin:0">
                    <tr>
                        <a href="<?php echo $general_class->ben_link('general/survey_report/index')?>"><button class="btn btn-success form-control" type="button">Back</button></a>
                    </tr>
	        		<tr>
	        			<td style="width: 24%"><b>Survey Name: </b></td>
	        			<td><?php echo $data[0]['survey_name']?></td>
	        			<td><b>Date Created: </b></td>
	        			<td><?php echo $data[0]['survey_date_created']?></td>
	        		</tr>	        		
	        	</table>

                <div class="w3-container" id="resp-container">
					<?php
						$questions_cnt = count(json_decode($data[0]['respond']));

						for($i=0; $i<$questions_cnt; $i++) {
							print('<div class="w3-panel w3-card-2">');
							print('<div class="radio">');
							printf('<label class="sort_number" style="font-size: 1.5em">%s</label>', $i+1);
							print('</div>');
							printf('<canvas id="myChart_%s" width="600" height="250"></canvas>', $i+1);
							printf('<div id="resp_%s" class="w3-center"></div>', $i+1);
                    		print('</div>');
						}
					?>
                </div>

	        </div>
      	</div>
    </div>
</body>
</html>

<script type="text/javascript">   	
	var resp_data;

	async function showResponses() {
		await getResponses();	
	}

	$(document).ready(function() {
		showResponses();				
	});

	function getResponses() {
		fetch('<?php echo $general_class->ben_link('general/survey_report/get_responses/'.$data[0]['survey_id'])?>') 
		.then((resp) => resp.json())
		.then(function(data) {
			//alert(data);
			console.log(data);
			resp_data = data;

			var display="";
			var chart_ctr = 1;

			//-- Show charts
			$.each(data, function() {
				console.log(data[chart_ctr-1].answer_choices);
				$('#resp_' + chart_ctr).html('<h3>RESPONDENTS: '+data[chart_ctr-1].respondents+'</h3>')

				var config = {
					type: 'pie',
					data: {
						datasets: [{
							data: data[chart_ctr-1].answers_count.map(Number),
							backgroundColor: [
								window.chartColors.green,
								window.chartColors.blue,
								window.chartColors.red,
								window.chartColors.orange,
								window.chartColors.yellow,
								window.chartColors.gray,
							],
							label: 'Dataset ' + chart_ctr
						}],
						labels: data[chart_ctr-1].answer_choices
					},
					options: {
						responsive: false,
						maintainAspectRatio: false,
						layout: {
							padding: {
								left: 0,
								right: 0,
								top: 0,
								bottom: 15
							}
						}
					}
				};
				
				var can_id="canvas"+chart_ctr;
				var ctx = $('#myChart_'+chart_ctr);
				window.can_id = new Chart(ctx, config);

				chart_ctr++;
			});					
		})
		.catch(function(error) {
			// This is where you run code if the server returns any errors
		});
	}

	// window.onload = function() {
	// 	var ctx = $('#myChart');
	// 	window.myPie = new Chart(ctx, config);
	// };

	// var randomScalingFactor = function() {
	// 	return Math.round(Math.random() * 100);
	// };

	// var config = {
	// 	type: 'pie',
	// 	data: {
	// 		datasets: [{
	// 			data: [
	// 				randomScalingFactor(),
	// 				randomScalingFactor(),
	// 			],
	// 			backgroundColor: [
	// 				window.chartColors.green,
	// 				window.chartColors.blue,
	// 				window.chartColors.red,
	// 				window.chartColors.orange,
	// 				window.chartColors.yellow,
	// 			],
	// 			label: 'Dataset 1'
	// 		}],
	// 		labels: [
	// 			'YES',
	// 			'NO',
	// 		]
	// 	},
	// 	options: {
	// 		responsive: false,
	// 		layout: {
	// 			padding: {
	// 				left: 0,
	// 				right: 0,
	// 				top: 0,
	// 				bottom: 10
	// 			}
	// 		}
	// 	}
	// };

	

	// Morris.Donut({
	// 	element: 'donut-example',
	// 	data: [
	// 		{label: "Download Sales", value: 12},
	// 		{label: "In-Store Sales", value: 30},
	// 		{label: "Mail-Order Sales", value: 20}
	// 	]
	// });

	// Morris.Bar({
	// 	element: 'bar-example',
	// 	data: [
	// 		{ y: '2006', a: 100, b: 90 },
	// 		{ y: '2007', a: 75,  b: 65 },
	// 		{ y: '2008', a: 50,  b: 40 },
	// 		{ y: '2009', a: 75,  b: 65 },
	// 		{ y: '2010', a: 50,  b: 40 },
	// 		{ y: '2011', a: 75,  b: 65 },
	// 		{ y: '2012', a: 100, b: 90 }
	// 	],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Series A', 'Series B']
	// });

	// Morris.Donut({
	// 	element: 'donut-example2',
	// 	data: [
	// 		{label: "Download Sales", value: 12},
	// 		{label: "In-Store Sales", value: 30},
	// 		{label: "Mail-Order Sales", value: 20}
	// 	]
	// });

</script>