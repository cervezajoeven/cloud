<div class="card card-default">
    <form action="<?php echo base_url('capital/save'); ?>" method="POST" >

        <div class="card-header">
            <h3 class="card-title">Add Capital</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" min="1" required="" class="form-control" name="amount">
                    </div>
                    <div class="form-group">
                        <label>Loaner</label>
                        <select class="form-control select2 required" name="loaner_id" required="required" style="width: 100%;">
                            <option value="">Please Select</option>
                            <?php foreach ($loaners as $loaner_key => $loaner_value) :?>
                                <option value="<?php echo $loaner_value['id']; ?>"><?php echo $loaner_value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea required="" class="form-control" name="remarks" placeholder="Remarks lang diri tita"></textarea>
                    </div>
               
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">

                        <input type="submit" value="Add Capital" class="form-control btn btn-success" name="">
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            If there will be another capital transaction for the loaner
        </div>
    </form>
</div>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Capital List</h3>

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
                        <th>Capital</th>
                        <th>Remarks</th>
                        <th>Report</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach($data as $data_key=>$data_value): ?>
                        <tr>
                            <td><?php echo $data_value['name'] ?></td>
                            <td>₱ <?php echo number_format($data_value['amount']-$data_value['capital_used']) ?>/₱ <?php echo number_format($data_value['amount']) ?></td>
                            <td><?php echo $data_value['remarks'] ?></td>
                            <td>
                                <button onclick="log_data(<?php echo $data_value['id'] ?>)" class="btn btn-warning form-control"><i class="fas fa-tasks"></i>Logs</button>
                            </td>
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
        List of Capitals for Loaners
    </div>
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
    function log_data(id){
        window.location.href = "<?php echo base_url('capital/log/') ?>"+id;
    }
</script>