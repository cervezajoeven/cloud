<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            
            <?php echo $general_class->ben_open_form("sms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Student Attendance</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">

                    </ul>
                </div>
                <div class="body">
                    <?php echo $general_class->ben_link('sms/attendance/log_ajax') ?>
          			<table id="example" class="display responsive" style="width:100%">
	                    <thead>
	                        <tr>
                                <th>Student Name</th>
	                            <th>Passage</th>
	                            <th>Section</th>
                                <th>Grade</th>
                                <th>Timestamp</th>
	                        </tr>
	                    </thead>
	                   

	                    <tfoot>
	                        <tr>
                                <th>Student Name</th>
                                <th>Passage</th>
                                <th>Section</th>
                                <th>Grade</th>
                                <th>Timestamp</th>

	                        </tr>
	                    </tfoot>
	                </table>          
                    

                </div>
            </form>
        </div>
    </div>
</div>


<?php $general_class->datatable_clear() ?>

<script type="text/javascript">

    var data = "";
    var table = $('#example').DataTable({
      "ajax": {
        "url": "<?php echo $general_class->ben_link('sms/attendance/log_ajax') ?>",
        "type": "POST"
      }
    });
    

</script>