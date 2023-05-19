@extends('Fantasy.template')

@section('css')

<link rel="stylesheet" href="vendor/Fantasy/global/plugins/colorbox/colorbox.css" />

<style type="text/css">
    .list_table_td_status.sorting{ width: 30px; }
</style>

@stop


@section('content')

<!-- 內容最上方大標題 -->
<h3 class="page-title"> 問與答管理頁面
    <small>News Category List</small>
</h3>
<!-- 內容最上方大標題END -->
<!--網站導覽-->
<div class="page-bar">
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{ ItemMaker::url('Fantasy') }}">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>

    <li>
        <span>問與答管理頁面</span>
    </li>
</ul>

</div>
<!--網站導覽END-->
<!-- END PAGE HEADER-->
<div class="row">
<!--內容區開始-->
<div class="col-md-12">
   
    <!--內容區白色區塊-->
    <div class="portlet light portlet-fit portlet-datatable ">
        <!--內容白色區塊標題-->
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">問與答管理頁面</span>
            </div>
            <!--actions-->
            <div class="actions">

                <div class="btn-group btn-group-devided" >
						<a href="{{ItemMaker::url("Fantasy/".$routePreFix."/create")}}" class="btn green-sharp btn-circle btn-sm">
							<i class="fa fa-plus"></i> 新增
						</a>
                </div>

                @include('Fantasy.include.actionMenu')

            </div>
            <!--actions END-->
        </div>
        <!--內容白色區塊標題END-->

        <!--內容白色區塊表格-->
        <div class="portlet-body">
            <div class="table-container">
                <!--表格↓↓↓↓↓↓↓↓-->
				{{FormMaker::listTable([
					'ajaxEditLink' => ItemMaker::url($ajaxEditLink),
					'Datas' => $Datas,
					'model' => $routePreFix,
                    'modelName' => $modelName,
					'tableSet' => [
						[
							"title" => "排序",
							"columns" => "rank",
							"width" => "40"
						],
						[
							"title" => "狀態列",
							"group" => [
								[
									"title" => "是否顯示",
									"sub_title" => "S",
									"columns" => "is_visible",
									"helpText" =>"是否顯示",
									"color" => "label-success",
									"options" => $StatusOption
									]
								]
						],
						[
							"title" => "標題",
							"columns" => "title",
							"width" => "40"
						],
					]
				])}}
                <!--表格END-->
            </div>
            <!--內容白色區塊表格END-->
        </div>
        <!-- 內容白色區塊END-->
    </div>
    <!--內容區END-->
</div>

@stop
@section('script')

	<script src="vendor/Fantasy/global/plugins/colorbox/jquery.colorbox.js" type="text/javascript"></script>

	<script src="vendor/Fantasy/global/plugins/datatables/media/js/jquery.dataTables.js" type="text/javascript"></script>
	<script type="text/javascript" src="vendor/Fantasy/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

	<script type="text/javascript" src="vendor/main/datatable.js"></script>
	<script>

		//資料刪除
		activeDataTable();
		dataDelete();
        changeStatic_ajax();
        changeStatic();

	</script>	
@stop
