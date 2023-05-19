@extends('Fantasy.template')

@section('css')

<link rel="stylesheet" href="vendor/Fantasy/plugins/colorbox/colorbox.css" />

@stop

@section('content')

<!-- 內容最上方大標題 -->
<h3 class="page-title"> 權限管理
    <small>News List</small>
</h3>
<!-- 內容最上方大標題END -->
<!--網站導覽-->
<div class="page-bar">
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{ ItemMaker::url('Fantasy/') }}">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>

    <li>
        <span>權限</span>
    </li>
</ul>

</div>
<!--網站導覽END-->
<!-- END PAGE HEADER-->
<div class="row">
<!--內容區開始-->
<div class="col-md-12">
    <!--注意事項-->
    <!-- <div class="note note-danger">
        <p> 注意事項: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>
    </div> -->
    <!--注意事項END-->
    <!--內容區白色區塊-->
    <div class="portlet light portlet-fit portlet-datatable ">
        <!--內容白色區塊標題-->
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">權限列表</span>
            </div>
            <!--actions-->
            <div class="actions">

                <div class="btn-group btn-group-devided" >
						<a href="{{ItemMaker::url("Fantasy/帳號管理/權限/create")}}" class="btn green-sharp btn-circle btn-sm">
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
					'model' => '帳號管理/權限',
                    'modelName' => 'Role',
					'tableSet' => [
						[
							'title' => '標題',
							'columns' => 'title',
						],
						[
                            'title' => '狀態列',
                            'group' => [
                                [
                                    'title' => '是否啟用',
                                    'sub_title' => 'S',
                                    'columns' => 'is_visible',
                                    'helpText' =>'是否啟用',
                                    'color' => 'label-success',
                                    'options' => $StatusOption
                                ]
                            ]

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

	<script src="vendor/Fantasy/plugins/colorbox/jquery.colorbox.js" type="text/javascript"></script>

	<script src="vendor/Fantasy/plugins/datatables/media/js/jquery.dataTables.js" type="text/javascript"></script>
	<script type="text/javascript" src="vendor/Fantasy/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

	<script type="text/javascript" src="vendor/main/datatable.js"></script>
	<script>

		//資料刪除
		activeDataTable();
		dataDelete();
        changeStatic_ajax();
        changeStatic();

	</script>
@stop
