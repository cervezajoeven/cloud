<div class="card card-default">
    <form action="<?php echo base_url('loaner/save'); ?>" method="POST" >

        <div class="card-header">
            <h3 class="card-title">Add Loaner</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required="" name="name">
                    </div>
               
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">

                        <input type="submit" value="Add Loaner" class="form-control btn btn-success" name="">
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Adding a new Loaner
        </div>
    </form>
</div>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Loaners List</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach($data as $data_key=>$data_value): ?>
                        <tr>
                            <td><?php echo $data_value['name'] ?></td>
                            <td>
                                <button onclick="edit_data(<?php echo $data_value['id'] ?>)" class="btn btn-info form-control"><i class="fas fa-pen"></i>Edit</button>
                            </td>
                            <td>
                                <button onclick="delete_data(<?php echo $data_value['id'] ?>)" class="btn btn-danger form-control"><i class="fas fa-trash"></i>Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
           
            </div>
            
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Loaners are listed here
    </div>
</div>

<?php $this->load->view('parts/footer'); ?>
<script type="text/javascript">
    function delete_data(id){
        if(confirm("Are you sure to delete this data?")){
            window.location.href = "<?php echo base_url('loaner/delete/') ?>"+id;
        }else{

        }
    }
    function edit_data(id){
        window.location.href = "<?php echo base_url('loaner/edit/') ?>"+id;
    }
</script>