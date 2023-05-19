@extends('Fantasy.template')

@section('title',"每月營收管理修改 "."-".$ProjectName)
@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/global/plugins/colorbox/colorbox.css" />
    <style type="text/css">
    #showPic{ width: auto!important; max-height: 140px;  }
    </style>
@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			每月營收管理 <small>News Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">每月營收管理</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					每月營收管理修改 </li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->


			<div class="row">
				<div class="col-md-12">

                    <!--注意事項-->
                     {{-- <div class="note note-danger">
                     <p> 注意事項: <br>
                        若新聞分類選擇 一頁4筆的版型(橫條)，新聞項目的列表圖尺寸為 730 x 490<br>
                        若新聞分類選擇 一頁8筆的版型(直條)，新聞項目的列表圖尺寸為 280 x 385</p>
                    </div> --}}
                    <!--注意事項END-->

					{!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 每月營收管理 </span>
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
														'inputName' => 'monthincome[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否顯示',
														'inputName' => 'monthincome[is_visible]',
														'helpText' =>'是否顯示於前台。',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '排序',
                                                        'inputName' => 'monthincome[rank]',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}
                                                    

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '年份',
                                                        'inputName' => 'monthincome[year]',
                                                        'value' => ( !empty($data['year']) )? $data['year'] : ''
                                                    ])}}
                                            
                                                    {{ItemMaker::select([
                                                        'labelText' => '月份',
                                                        'inputName' => 'monthincome[month]',
                                                        'options' => $Month,
                                                        'value' => ( !empty($data['month']) )? $data['month'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '每月營收',
                                                        'inputName' => 'monthincome[month_income]',
                                                        'value' => ( !empty($data['month_income']) )? $data['month_income'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '去年同期',
                                                        'inputName' => 'monthincome[month_income2]',
                                                        'value' => ( !empty($data['month_income2']) )? $data['month_income2'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '月增率',
                                                        'inputName' => 'monthincome[addRate]',
                                                        'value' => ( !empty($data['addRate']) )? $data['addRate'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '去年月增率',
                                                        'inputName' => 'monthincome[addRate2]',
                                                        'value' => ( !empty($data['addRate2']) )? $data['addRate2'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '累計營收',
                                                        'inputName' => 'monthincome[total]',
                                                        'value' => ( !empty($data['total']) )? $data['total'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '去年累計營收',
                                                        'inputName' => 'monthincome[total2]',
                                                        'value' => ( !empty($data['total2']) )? $data['total2'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '年增率',
                                                        'inputName' => 'monthincome[yearRate]',
                                                        'value' => ( !empty($data['yearRate']) )? $data['yearRate'] : ''
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

