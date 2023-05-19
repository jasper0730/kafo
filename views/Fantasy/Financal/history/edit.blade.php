@extends('Fantasy.template')

@section('title',"歷年財務管理修改 "."-".$ProjectName)
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
			歷年財務管理 <small>History Report</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">歷年財務管理</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					歷年財務管理修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 歷年財務管理 </span>
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
														'inputName' => 'history[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '排序',
                                                        'inputName' => 'history[rank]',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否顯示',
														'inputName' => 'history[is_visible]',
														'helpText' =>'是否顯示於前台。',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}

													{{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'history[title]',
                                                        'value' => ( !empty($data['title']) )? $data['title'] : ''
                                                    ])}}

													{{ItemMaker::textInput([
                                                        'labelText' => '年份',
                                                        'inputName' => 'history[year]',
                                                        'value' => ( !empty($data['year']) )? $data['year'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第一季母公司財報',
                                                        'inputName' => 'history[season_1]',
                                                        'value' => ( !empty($data['season_1']) )? $data['season_1'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第二季母公司財報',
                                                        'inputName' => 'history[season_2]',
                                                        'value' => ( !empty($data['season_2']) )? $data['season_2'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第三季母公司財報',
                                                        'inputName' => 'history[season_3]',
                                                        'value' => ( !empty($data['season_3']) )? $data['season_3'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第四季母公司財報',
                                                        'inputName' => 'history[season_4]',
                                                        'value' => ( !empty($data['season_4']) )? $data['season_4'] : ''
                                                    ])}}

                                                    <hr><hr>

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第一季子公司財報',
                                                        'inputName' => 'history[season_1_2]',
                                                        'value' => ( !empty($data['season_1_2']) )? $data['season_1_2'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第二季子公司財報',
                                                        'inputName' => 'history[season_2_2]',
                                                        'value' => ( !empty($data['season_2_2']) )? $data['season_2_2'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第三季子公司財報',
                                                        'inputName' => 'history[season_3_2]',
                                                        'value' => ( !empty($data['season_3_2']) )? $data['season_3_2'] : ''
                                                    ])}}

                                                    {{ItemMaker::filepicker([
                                                        'labelText' => '第四季子公司財報',
                                                        'inputName' => 'history[season_4_2]',
                                                        'value' => ( !empty($data['season_4_2']) )? $data['season_4_2'] : ''
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

