<?php $data = $general_class->data['all_data']; ?>
<form action="<?php echo $general_class->ben_link('general/'.$general_class->current_page['controller'].'/update_save')?>" method="post">
	<div class="brainee-page_container col-lg-12">
		<div class="brainee-page_titlebar">
			<div class="brainee-page_titlebar_title">
				<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
			</div>
			<div class="brainee-page_titlebar_controls_container">
				<a><button type="submit" class="btn btn-success" id="action_add">Done</button></a>
				<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
			</div>
		</div>

		<div class="brainee-page">
			<div class="container">
				<?php $update_data = $general_class->data['update_data']?>
				<input type="hidden" name="id" value="<?php echo $update_data['id'] ?>">
				<div class="form-group">
					<label for="account_type_name">Account Type Name</label>
					<input type="text" value="<?php echo $update_data['account_type_name'] ?>" name="account_type_name" class="form-control" required="" placeholder="Module" />
				</div>
				<div class="form-group">
					<label for="company_id">Company</label>
					<select name="company_id" class="form-control" required="" placeholder="Select">
						<option value="">Select Company</option>
						<?php foreach($general_class->data['all_data']['company'] as $all_data_key=>$all_data_value): ?>
							<option <?php echo ($all_data_value['id'] == $update_data['company_id']) ? "selected" : "" ?> value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['company_name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="account_type_id">Status</label>
					<select name="status" class="form-control" required="" placeholder="Select">
						<option <?php echo ($general_class->data['update_data']['status'] == 1) ? "selected" : "" ?> value="1">Active</option>
						<option <?php echo ($general_class->data['update_data']['status'] == 0) ? "selected" : "" ?> value="0">Inactive</option>
					</select>
				</div>
			</div>
		</div>

	</div>
</form>