@extends('Fantasy.template')

@section('title',"客詢服務 - 客詢分類修改 "."-".$ProjectName)
@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/global/plugins/colorbox/colorbox.css" />
    <style type="text/css">
    #showPic{ width: auto!important; max-height: 140px;  }
    #showPic.anchorImg{ width: auto!important; max-height: 250px;  }
    </style>

@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			 客詢分類 <small>Inquiry Category</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}"> 客詢分類</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					客詢分類修改 </li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->


			<div class="row">
				<div class="col-md-12">

                    <!--注意事項-->
                    {{-- <div class="note note-danger">
                        <p> 注意事項: 婚宴會議單元，才需要填入短述。<br>
                            交通訊息、集團介紹、問與答、館內活動、歡樂設施 非輪播單元，所以只需要上傳一組圖片。
                        </p>
                    </div> --}}
                    <!--注意事項END-->

					<!--<form action="{{ ItemMaker::url('Fantasy/工程分類/Update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" target="hidFrame">-->
					{!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
											{{-- {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} --}}   客詢分類 </span>
                                    </div>
                                    <div class="actions btn-set">

                                    @include('Fantasy.include.editActionBtns')

                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav_news">
                                            <li class="active">
                                                <a href="#tab_general" data-toggle="tab"> Information </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::idInput([
														'inputName' => 'InquiryCategory[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

                                                     {{ItemMaker::textInput([
                                                        'labelText' => '顯示排序',
                                                        'inputName' => 'InquiryCategory[rank]',
                                                        'helpText' =>'前台列表顯示之排序',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否顯示',
														'inputName' => 'InquiryCategory[is_visible]',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}

                                                    {{ItemMaker::textInput([
  														'labelText' => '分類名稱',
  														'inputName' => 'InquiryCategory[title]',
  														'value' => ( !empty($data['title']) )? $data['title'] : ''
  													])}}
                                                   
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
						<iframe name="hidFrame" id="hidFrame" style="display:none;"></iframe>
					<!--</form>
					 END FORM-->
					 {!! Form::close() !!}
				</div>
			</div>

@stop

@section("script")

<script src="vendor/Fantasy/global/plugins/colorbox/jquery.colorbox.js" type="text/javascript"></script>


<script src="vendor/main/colorpick.js" type="text/javascript"></script>
<script src="vendor/main/datatable.js" type="text/javascript" ></script>
<script src="vendor/main/rank.js" type="text/javascript" ></script>

	<script>
		$(document).ready(function() {

			FilePicke();
			Rank();
			//資料刪除
			dataDelete();

			colorPicker();

            changeStatic();

            @if($Message)
                toastrAlert('success', '{{$Message}}');
            @endif

		});

	</script>
@stop
