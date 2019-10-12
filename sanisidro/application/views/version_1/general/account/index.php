<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php $datatable = array(
			"th"=>array(
				"Username",
				"Full Name",
				"Section",
				"Grade",
				"Account Type",
			),
			"td"=>array(
				"username",
				"full_name",
				"section_name",
				"grade_name",
				"account_type_name",
			),
			"data"=>$data,
		);
	?>
	<?php $general_class->ben_datatable($datatable);?>
</div>