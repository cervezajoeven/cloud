<div class="card card-default">
    <form action="<?php echo base_url('capital/edit_save'); ?>" method="POST" >

        <div class="card-header">
            <h3 class="card-title">Edit Capital</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo $capital['id'] ?>">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" min="1" required="" value="<?php echo $capital['amount'] ?>" class="form-control" name="amount">
                    </div>
                    <div class="form-group">
                        <label>Loaner</label>
                        <select class="form-control select2 required" name="loaner_id" required="required" style="width: 100%;">
                            <option value="">Please Select</option>
                            <?php foreach ($loaners as $loaner_key => $loaner_value) :?>
                                <option <?php echo ($capital['loaner_id']==$loaner_value['id'])? "selected":false; ?> value="<?php echo $loaner_value['id']; ?>"><?php echo $loaner_value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea required="" class="form-control" name="remarks" placeholder="Remarks lang diri tita"><?php echo $capital['remarks'] ?></textarea>
                    </div>
               
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">

                        <input type="submit" value="Edit Capital" class="form-control btn btn-success" name="">
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Change amount or owner
        </div>
    </form>
</div>


<?php $this->load->view('parts/footer'); ?>
<script type="text/javascript">
    function delete_data(id){
        if(confirm("Are you sure to delete this data?")){
            window.location.href = "<?php echo base_url('capital/delete/') ?>"+id;
        }else{

        }
    }
    function edit_data(id){
        window.location.href = "<?php echo base_url('capital/edit/') ?>"+id;
    }
</script>