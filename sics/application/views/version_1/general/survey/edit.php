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
		<link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/survey.css')?>">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class = "container-fluid">
	      	<div class = "row row-height">
		        <div class = "col-sm-7 left">
		        	
	            	<iframe style="height: 100%;width: 100%;" id="optical_pdf" class="embed-responsive-item" src="<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/optical/'.$general_class->data['optical'][0]['quiz_id'].'/'.$general_class->data['optical'][0]['file_name'])); ?>"></iframe>
		            	
		        </div>

		        <div class="col-sm-5 right">
		        	<div class="info col-sm-5">
		        		<div class="info-row">
		        			<div class="info-tab info-title col-sm-2">Name :</div>
		        			<div class="info-tab col-sm-4">Joeven Cerveza</div>
		        			<div class="info-tab info-title col-sm-2">Section :</div>
			        		<div class="info-tab col-sm-4">Apolinario</div>
		        		</div>

		        		<div class="info-row">
			        		<div class="info-tab info-title col-sm-2">Level :</div>
			        		<div class="info-tab col-sm-4">Grade 12</div>
			        		<div class="info-tab info-title col-sm-2">Date :</div>
			        		<div class="info-tab col-sm-4">February 21, 2020</div>
		        		</div>

		        		<div class="info-row">
			        		<div class="info-tab info-title col-sm-3">Title :</div>
			        		<div class="info-tab col-sm-9">This is Survey!!!</div>
		        		</div>
		        		<div class="info-row">
			        		<div class="info-tab info-key col-sm-3">Multiple Choice</div>
			        		<div class="info-tab info-key col-sm-3">Short Answer</div>
			        		<div class="info-tab info-key col-sm-3">Long Answer</div>
			        		<div class="info-tab info-key col-sm-3">Multiple Answer</div>
		        		</div>
		        		<div class="info-row">
			        		<div class="info-tab col-sm-12">
			        			<center>Save</center>
			        		</div>
		        		</div>
		        	</div>
		        	<div class="clearfix"></div>
		        	<ul class="sortable ui-sortable">
		        		<li class="option-container">
		        			<div class="numbering_option">1.</div>
		        			<div class="remove_option float-right">X</div>
		        			<div class="option">
		        				<div class="option_type">
		        					<input type="radio" name="" class="form-control">
		        				</div>
		        				<div class="option_label_container">
		        					<div class="option_label">A</div>
		        					<div class="option_label_input">
		        						<input type="text" name="" value="A" class="form-control">
		        					</div>
		        				</div>		        				

		        			</div>
		        			<div class="option">
		        				<div class="option_type">
		        					<input type="radio" name="" class="form-control">
		        				</div>
		        				<div class="option_label_container">
		        					<div class="option_label">B</div>
		        					<div class="option_label_input">
		        						<input type="text" name="" value="B" class="form-control">
		        					</div>
		        				</div>
		        			</div>

		        			<div class="option">
		        				<div class="option_type">
		        					
		        				</div>
		        				<div class="option_label_container">
		        					
		        					<div class="option_label_input">
		        						<center>
		        							<input type="button" name="" class="form-control btn btn-success" value="Add Option">
		        						</center>
		        						
		        					</div>
		        				</div>		        				

		        			</div>
		        		</li>
		        		<li class="option-container">
		        			<div class="numbering">1.</div>
		        			<div class="remove">X</div>
		        			<div class="option">

		        				<div class="option_label_container">
		        					<div class="option_label">A</div>
		        					<div class="option_label_input">
		        						<input type="text" name="" value="A">
		        					</div>
		        				</div>
		        				<div class="option_type">
		        					<input type="radio" name="">
		        				</div>

		        			</div>
		        			<div class="option">

		        				<div class="option_label_container">
		        					<div class="option_label">B</div>
		        					<div class="option_label_input">
		        						<input type="text" name="" value="B">
		        					</div>
		        				</div>
		        				<div class="option_type">
		        					<input type="radio" name="">
		        				</div>

		        			</div>
		        		</li>
		        	</ul>
		            
		        </div>
	      	</div>
	    </div>
	</body>
</html>
<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms/jquery-1.12.4.js')?>"></script>
<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms/jquery-ui.js')?>"></script>
<script type="text/javascript">
	$(".sortable").sortable();
</script>