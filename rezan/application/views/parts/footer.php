                    </div><!-- /.container-fluid -->
                </section>

            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Vercowares</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?php echo library_link(); ?>plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo library_link(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo library_link(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo library_link(); ?>plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo library_link(); ?>plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo library_link(); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo library_link(); ?>plugins/jqvmap/maps/jquery.vmap.world.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo library_link(); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo library_link(); ?>plugins/moment/moment.min.js"></script>
        <script src="<?php echo library_link(); ?>plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo library_link(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo library_link(); ?>plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo library_link(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo library_link(); ?>dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo library_link(); ?>dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo library_link(); ?>dist/js/demo.js"></script>
        <script src="<?php echo library_link(); ?>plugins/select2/js/select2.full.min.js"></script>
        
    </body>
</html>

<script type="text/javascript">
    $('.select2').select2({
      theme: 'bootstrap4'
    });
</script>