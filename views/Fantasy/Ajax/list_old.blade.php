@include("Fantasy/include/plugin")

<!-- BEGIN CONTENT -->
	<div class="page-content" id="ajax_list_div">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">批次修改列表 <small>Batch Edit List</small></h3>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					
					<div class="portlet">
						<div class="portlet-body">

						<!--<a href="#ajax_list_div" id="toColorbox"></a>-->

							<div class="table-container" >

								{{FormMaker::ajaxEditFrom($modal, $ajaxEditList, $datas, $update_link)}}

							</div>
						</div>
					</div>

				</div>
			</div>
		<!-- END FORM-->
	</div>

@include("Fantasy/include/plugin-end")

<script src="vendor/Fantasy/global/plugins/datatables/media/js/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript" src="vendor/Fantasy/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript" src="vendor/main/datatable.js"></script>
