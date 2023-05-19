<script src="vendor/Fantasy/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src="vendor/Fantasy/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="vendor/Fantasy/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="vendor/Fantasy/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="vendor/Fantasy/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script type="text/javascript" src="vendor/Fantasy/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!--HTML 5  editor-->
{{-- <script type="text/javascript" src="vendor/Fantasy/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="vendor/Fantasy/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script> --}}
<script type="text/javascript" src="vendor/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!--input mask-->

<script type="text/javascript" src="vendor/Fantasy/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>

<!-- elFinder JS (REQUIRED) -->
<script type="text/javascript" src="vendor/elfinder-2.0/js/elfinder.min.js"></script>

<!-- elFinder translation (OPTIONAL) -->
<script type="text/javascript" src="vendor/elfinder-2.0/js/i18n/elfinder.zh_TW.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="vendor/Fantasy/global/scripts/metronic.js" type="text/javascript"></script>
<script src="vendor/Fantasy/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="vendor/Fantasy/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="vendor/Fantasy/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="vendor/Fantasy/admin/pages/scripts/index.js" type="text/javascript"></script>

<!--<script type="text/javascript" src="vendor/Fantasy/global/plugins/select2/select2.min.js"></script>-->
<script src="vendor/Fantasy/global/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN color picker SCRIPTS -->
<script src="vendor/Fantasy/global/plugins/colorpick/evol.colorpicker.min.js" type="text/javascript"></script>
<!-- END color picker SCRIPTS -->

{{-- date picker --}}
<script type="text/javascript" src="vendor/Fantasy/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- BEGIN SPEC-->
<script src="vendor/main/config.js" type="text/javascript"></script>
<script src="vendor/main/app.js" type="text/javascript"></script>
<script src="vendor/main/spec.js" type="text/javascript"></script>
<!-- END SPEC-->

<script>

jQuery(document).ready(function() {   

   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
    jQuery('#tags_2').tagsInput();
    jQuery(".select2").select2();

    if( $('.wysihtml5').size() > 0 )
	{
		$('.wysihtml5').wysihtml5();
	}

    if( $('.date-picker').size() > 0 )
	{
		$('.date-picker').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
        });
	}
});
</script>

