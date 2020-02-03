<div class="card card-default">
    <form action="<?php echo base_url('loaner/edit_save'); ?>" method="POST" >

        <div class="card-header">
            <h3 class="card-title">Edit Sponsor</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" value="<?php print_r($data['id'])?>" name="id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php print_r($data['name'])?>" required="" name="name">
                    </div>
               
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">

                        <input type="submit" value="Edit Sponsor" class="form-control btn btn-success" name="">
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Editing Sponsor
        </div>
    </form>
</div>


<?php $this->load->view('parts/footer'); ?>
<script type="text/javascript">
    function delete_data(id){
        if(confirm("Are you sure to delete this data?")){
            window.location.href = "<?php echo base_url('sponsor/delete/') ?>"+id;
        }else{

        }
    }
    function edit_data(id){
        window.location.href = "<?php echo base_url('sponsor/edit/') ?>"+id;
    }
</script>