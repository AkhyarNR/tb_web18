            <footer class="footer">
                <div class="container">
                    <nav>
                        <p class="copyright text-center">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">Polije MIF16</a>, Pengajuan Judul Tugas Akhir
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/core/jquery.3.2.1.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js')?>" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-switch.js')?>"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="<?php echo base_url('assets/js/plugins/chartist.min.js')?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url('assets/js/light-bootstrap-dashboard.js?v=2.0.1')?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script type="text/javascript">
$('.dataTables').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
});

 $('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
}); 
</script>
</body>
</html>