<form action="<?php echo base_url('loan/save'); ?>" method="POST" >
    <div class="card card-default">
        

            <div class="card-header">
                <h3 class="card-title">Loan Details</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date Range</label>
                            <input type="text" class="form-control float-right" id="reservationtime">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Capital</label>
                            <select class="form-control">
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        

                       <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>C</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    <td>Other browsers</td>
                                    <td>All others</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>U</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </tfoot>
                      </table>
                        
                        
                    </div>
                    

                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <input type="submit" value="Add Loan" class="form-control btn btn-success" name="">
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                For borrowers to loan
            </div>
    </div>
</form>


<?php $this->load->view('parts/footer'); ?>

<script src="<?php echo library_link(); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo library_link(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
    $("#example1").DataTable();
    $('#reservationtime').daterangepicker({
        timePickerIncrement: 30,
        locale: {
            format: 'YYYY-MM-DD'
        }
    })
    function delete_data(id){
        if(confirm("Are you sure to delete this data?")){
            window.location.href = "<?php echo base_url('loan/delete/') ?>"+id;
        }else{

        }
    }
    function edit_data(id){
        window.location.href = "<?php echo base_url('loan/edit/') ?>"+id;
    }

    function detail_data(id){
        window.location.href = "<?php echo base_url('loan/detail/') ?>"+id;
    }

    function calculate_gives(){
        var term = parseInt($(".term").val());
        var gives_per_month = parseInt($(".gives_per_month").val());
        var gives = term*gives_per_month;
        $(".gives").val(gives);
    }

    function calculate_deadline(){
        var x = $(".term").val(); //or whatever offset
        var CurrentDate = new Date();
        CurrentDate.setMonth(CurrentDate.getMonth() + x);
        var day = ("0" + CurrentDate.getDate()).slice(-2);
        var month = ("0" + (CurrentDate.getMonth() + 1)).slice(-2);

        var today = CurrentDate.getFullYear()+"-"+(month)+"-"+(day) ;
        $(".deadline").val(today);
    }

    function calculate_gives_payable(){
        var amount = parseInt($(".amount").val());
        var percentage = parseInt($(".percentage").val())/100;
        var term = parseInt($(".term").val());
        var gives = parseInt($(".gives").val());
        var gives_payable = Math.ceil((amount+((amount*percentage)*term))/gives);
        var interest = Math.ceil((amount*percentage));
        $(".gives_payable").val(gives_payable);
        $(".interest").val(interest);
    }

    function calculate_expected_receivable(){
        var gives_payable = parseInt($(".gives_payable").val());
        var gives = parseInt($(".gives").val());
        var expected_receivable = gives_payable*gives;
        $(".expected_receivable").val(expected_receivable);
    }
    $(document).ready(function(){
        calculate_gives();
        calculate_deadline();
        calculate_gives_payable();
        calculate_expected_receivable();
    });

</script>