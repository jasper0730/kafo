@extends('Fantasy.template')

@section('title',"客詢列表修改 "."-".$ProjectName)
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
			客詢列表 <small>Inquiry Manage</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">客詢列表</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					客詢列表修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }}  客詢列表 </span>
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
														'inputName' => 'Inquiry[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

                                                    {{ItemMaker::select([
                                                        'labelText' => '所屬分類',
                                                        'inputName' => 'Inquiry[category_id]',
                                                        'options'   => $parent['belong']['InquiryCategory'],
                                                        'value' => ( !empty($data['category_id']) )? $data['category_id'] : ''
                                                    ])}}

                                                    {{ItemMaker::select([
                                                        'labelText' => '處理狀態',
                                                        'inputName' => 'Inquiry[status]',
                                                        'options'   => $StatusOptions,
                                                        'value' => ( !empty($data['status']) )? $data['status'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
  														'labelText' => '公司名稱',
  														'inputName' => 'Inquiry[company_name]',
  														'helpText' =>'公司名稱',
  														'value' => ( !empty($data['company_name']) )? $data['company_name'] : ''
  													])}}

                                                    {{ItemMaker::textInput([
  														'labelText' => '國家',
  														'inputName' => 'Inquiry[country]',
  														'value' => ( !empty($data['country']) )? $data['country'] : ''
  													])}}

                                                    {{ItemMaker::textInput([
  														'labelText' => '聯絡人姓名',
  														'inputName' => 'Inquiry[gender]',
  														'value' => ( !empty($data['gender']) )? $data['gender'] : ''
  													])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '電子郵件',
                                                        'inputName' => 'Inquiry[email]',
                                                        'value' => ( !empty($data['email']) )? $data['email'] : ''
                                                    ])}}

                                                    {{ItemMaker::select([
                                                        'labelText' => '性別',
                                                        'inputName' => 'Inquiry[gender]',
                                                        'options'   => $GenderOptions,
                                                        'value' => ( !empty($data['gender']) )? $data['gender'] : ''
                                                    ])}}

                                                    {{ItemMaker::textarea([
                                                        'labelText' => '詢問內容',
                                                        'inputName' => 'Inquiry[comments]',
                                                        'value' => ( !empty($data['comments']) )? $data['comments'] : ''
                                                    ])}}

                                                    {{ItemMaker::textarea([
                                                        'labelText' => '比較商品',
                                                        'inputName' => 'Inquiry[items]',
                                                        'value' => ( !empty($data['items']) )? $data['items'] : ''
                                                    ])}}

                                                    {{ItemMaker::datePicker([
                                                        'labelText' => '詢問時間',
                                                        'inputName' => 'Inquiry[release_at]',
                                                        'helpText' =>'新聞發佈時間',
                                                        'value' => ( !empty($data['release_at']) )? $data['release_at'] : ''
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
