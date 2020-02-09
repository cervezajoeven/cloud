<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Loans List (Total: <b> ₱ <?php echo number_format($total_loan_list) ?></b>)</h3>

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
                        <th>Date Borrowed</th>
                    </tr>
                    <?php foreach($loans as $data_key=>$data_value): ?>
                        <tr>
                            <td><?php echo $data_value['name'] ?></td>
                            <td>₱ <?php echo $data_value['amount'] ?></td>
                            <td><?php echo joeven_date($data_value['date_created']) ?></td>
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
</script>