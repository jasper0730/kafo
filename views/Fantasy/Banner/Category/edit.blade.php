@extends('Fantasy.template')

@section('title',"Banner修改 "."-".$ProjectName)
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
			Banner <small>Banner Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">Banner</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					Banner修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - Banner </span>
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
														'inputName' => 'BannerCategory[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否顯示',
														'inputName' => 'BannerCategory[is_visible]',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}

                                                    {{ItemMaker::textInput([
  														'labelText' => '排序',
  														'inputName' => 'BannerCategory[rank]',
  														'helpText' =>'前台列表顯示之排序',
  														'value' => ( !empty($data['rank']) )? $data['rank'] : ''
  													])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'BannerCategory[title]',
                                                        'value' => ( !empty($data['title']) )? $data['title'] : ''
                                                    ])}}{{ItemMaker::textInput([
                                                        'labelText' => '副標題',
                                                        'inputName' => 'BannerCategory[subtitle]',
                                                        'value' => ( !empty($data['subtitle']) )? $data['subtitle'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '大圖片',
                                                        'inputName' => 'BannerCategory[image_pc]',
                                                        'value' => ( !empty($data['image_pc']) )? $data['image_pc'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '小圖片',
                                                        'inputName' => 'BannerCategory[image_mobile]',
                                                        'value' => ( !empty($data['image_mobile']) )? $data['image_mobile'] : ''
                                                    ])}}

                                                    {{ItemMaker::select([
                                                        'labelText' => '所屬系列',
                                                        'inputName' => 'BannerCategory[banner_id]',
                                                        'required'  => true,
                                                        'options'   => $parent['belong']['Banner'],
                                                        'value' => ( !empty($data['banner_id']) )? $data['banner_id'] : ''
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
