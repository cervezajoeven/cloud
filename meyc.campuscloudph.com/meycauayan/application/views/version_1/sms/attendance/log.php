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
                        <div class="js-sweetalert">
                            <button class="btn btn-danger waves-effect" type="button" id="delete">Delete</button>
                            <button class="btn btn-info waves-effect" type="button" id="unshare">Unshare</button>
                            <button class="btn btn-default waves-effect" type="button" id="share">Share</button>
                            <button class="btn btn-primary waves-effect" type="button" id="assign">Assign</button>
                            <button class="btn btn-warning waves-effect" type="button" id="update">Update</button>
                            <a href="<?php echo $general_class->ben_link('lms/lesson/create');?>"><button class="btn btn-success waves-effect" type="button">Create</button></a>
                        </div>


                    </ul>
                </div>
                <div class="body">

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
	                    <tbody>
	                        <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
                                <tr>
                                    <td><?php echo $data_value['first_name']; ?></td>
                                    <td><?php echo $data_value['entry']; ?></td>
                                    <td><?php echo $data_value['section_name']; ?></td>
                                    <td><?php echo $data_value['grade_name']; ?></td>
                                    <td><?php echo $data_value['date_created']; ?></td>
                                </tr>
                                
	                        <?php endforeach?>
	                    </tbody>

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

    $("#update").hide();
    $("#assign").hide();
    $("#share").hide();
    $("#unshare").hide();
    $("#delete").hide();

    var data = "";
    var table = $('#example').DataTable({
        select: {
            style: 'single'
        },
        "order": [[ 4, "desc" ]],
        "columnDefs": [
            {
                "visible": false,
                "searchable": false
            }
        ]
    }).on( 'select', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            data = table.rows( indexes ).data().eq(0).eq(0).join("");
            var share = table.rows( indexes ).data().eq(0)[4];

            $("#update").show();
            $("#assign").show();
            $("#delete").show();
            if(share=="Yes"){
                $("#share").hide();
                $("#unshare").show();
                
            }else{
                $("#share").show();
                $("#unshare").hide();
                
            }
            
        }
    }).on( 'deselect', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            
            $("#update").hide();
            $("#assign").hide();
            $("#share").hide();
            $("#delete").hide();
            $("#unshare").hide();
        }
    });
    $("#assign").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson_assign/create/');?>"+data);
    });

    $("#update").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/slideshow/');?>"+data);
    });

    $("#share").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/share/');?>"+data+"/1");
    });

    $("#unshare").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/share/');?>"+data+"/0");
    });

    $("#delete").click(function(){
        if(confirm("Are you sure you want to delete this lesson?")){
            window.location.replace("<?php echo $general_class->ben_link('lms/lesson/delete/');?>"+data);
        }
        
    });

</script>