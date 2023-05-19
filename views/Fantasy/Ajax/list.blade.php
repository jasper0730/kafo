
<!-- BEGIN CONTENT -->
	<div class="page-content" id="ajax_list_div">
        <div class="modal-content modal-content_style">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{ $modal }} - 批次修改</h4>
            </div>
            {{FormMaker::ajaxEditFrom($modal, $ajaxEditList, $datas, $update_link)}}

	</div>
