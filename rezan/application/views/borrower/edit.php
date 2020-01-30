<div class="card card-default">
    <form action="<?php echo base_url('borrower/edit_save'); ?>" method="POST" >

        <div class="card-header">
            <h3 class="card-title">Edit Borrower</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <input type="hidden" required="" value="<?php echo $borrower['id']?>" class="form-control" name="id">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" required="" value="<?php echo $borrower['name'] ?>" class="form-control" name="name">
                    </div>
               
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">

                        <input type="submit" value="Add Borrower" class="form-control btn btn-success" name="">
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Edit Borrowers Name
        </div>
    </form>
</div>

<?php $this->load->view('parts/footer'); ?>
<script type="text/javascript">
    function delete_data(id){
        if(confirm("Are you sure to delete this data?")){
            window.location.href = "<?php echo base_url('borrower/delete/') ?>"+id;
        }else{

        }
    }
    function edit_data(id){
        window.location.href = "<?php echo base_url('borrower/edit/') ?>"+id;
    }
</script>