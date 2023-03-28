<script src="../../assets/js/jquery-3.5.1.js"></script>

<script src="../../assets/js/datatables.min.js"></script>

<!-- Library Bundle Script -->
<script src="../../assets/js/core/libs.min.js"></script>

<!-- External Library Bundle Script -->
<script src="../../assets/js/core/external.min.js"></script>

<!-- Widgetchart Script -->
<script src="../../assets/js/charts/widgetcharts.js"></script>

<!-- mapchart Script -->
<script src="../../assets/js/charts/vectore-chart.js"></script>
<script src="../../assets/js/charts/dashboard.js"></script>

<!-- fslightbox Script -->
<script src="../../assets/js/plugins/fslightbox.js"></script>

<!-- Settings Script -->
<script src="../../assets/js/plugins/setting.js"></script>

<!-- Slider-tab Script -->
<script src="../../assets/js/plugins/slider-tabs.js"></script>

<!-- Form Wizard Script -->
<script src="../../assets/js/plugins/form-wizard.js"></script>

<!-- AOS Animation Plugin-->
<script src="../../assets/vendor/aos/dist/aos.js"></script>

<!-- App Script -->
<script src="../../assets/js/hope-ui.js" defer></script>

<!-- DataTables Script -->

<script src="../../assets/js/jquery.dataTables.min.js"></script>

<script src="../../assets/js/dataTables.bootstrap.min.js"></script>

<script src="../../assets/js/dataTables.responsive.min.js"></script>

<script src="../../assets/js/responsive.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>