@extends('Fantasy.template')

@section('title',"SEO管理修改 "."-".$ProjectName)

@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/global/plugins/colorbox/colorbox.css" />

@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			SEO管理 <small>Seo Manager</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/SEO管理')}}">SEO管理</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					SEO管理修改
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->

		
			<div class="row">
				<div class="col-md-12">

                    <!--注意事項-->
                    <div class="note note-danger">
                        <p> 注意事項: 頁面如有設定SEO，將會覆蓋全域SEO的設定。<b>各單元首頁</b>SEO在這裡設定即可。<br><br>

                        <b>各單元的內頁SEO</b>則在各項管理裡編輯：<br>
                            客房資訊管理 ->可編輯____客房SEO<br>
                            餐廳資訊管理 ->可編輯____餐廳SEO<br>
                            ...依此類推。
                        </p>
                    </div>
                    <!--注意事項END-->

					@if($Message)
						<div class="alert alert-success margin-bottom-10">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<i class="fa fa-warning fa-lg"></i> {{$Message}}
						</div>
					@endif
					<!--<form action="{{ ItemMaker::url('Fantasy/維修分類/Update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" target="hidFrame">-->
					{!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - SEO管理 
										</span>
                                    </div>
                                    <div class="actions btn-set">
 										<a href=" {{ ItemMaker::url('Fantasy/SEO管理/') }}" type="button" name="back" class="btn default btn-secondary-outline btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="返回">
                                            <i class="fa fa-mail-reply"></i> 返回
                                        </a>

                                        <button type="submit"  class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="儲存">
                                            <i class="fa fa-check"></i> 儲存
                                        </button>
                                        {{-- <a href="#" class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="刪除">
                                            <i class="fa fa-external-link"></i> 刪除
                                        </a>

                                        <div class="btn-group">
                                            <a class="btn dark btn-outline btn-circle tooltips" href="javascript:;" data-toggle="dropdown" aria-expanded="false" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="進階功能">
                                                <i class="fa fa-cog"></i>
                                                <span class="hidden-xs"> 進階功能 </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to CSV </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to XML </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Print Invoices </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <!-- <button class="btn btn-success">
                                            <i class="fa fa-check-circle"></i> Save & Continue Edit</button> -->
                                        <!-- <div class="btn-group">
                                            <a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i> More
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Duplicate </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Delete </a>
                                                </li>
                                                <li class="dropdown-divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Print </a>
                                                </li>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav_news">
                                            <li class="active">
                                                <a href="#tab_general" data-toggle="tab"> Information </a>
                                            </li>
                                            {{-- <li>
                                                <a href="#tab_meta" data-toggle="tab"> 系列圖片 </a>
                                            </li> --}}
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::idInput([
														'inputName' => 'Seo[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否顯示',
														'inputName' => 'Seo[is_visible]',
														'helpText' =>'是否顯示於前台的「列表」中，預設值為「是」一般會將「被組合的產品」設為「否」，意味此產品不會獨立存在。',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}

													{{ItemMaker::textInput([
														'labelText' => '排序',
														'inputName' => 'Seo[rank]',
														'helpText' =>'後台列表顯示之排序',
														'value' => ( !empty($data['rank']) )? $data['rank'] : ''
													])}}

													{{ItemMaker::textInput([
														'labelText' => '標題',
														'inputName' => 'Seo[title]',
														'value' => ( !empty($data['title']) )? $data['title'] : '',
                                                        'disabled' => 'disabled'
													])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '網頁標題',
                                                        'inputName' => 'Seo[web_title]',
                                                        'helpText' => '10~70字以內',
                                                        'value' => ( !empty($data['web_title']) )? $data['web_title'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'Meta關鍵字',
                                                        'inputName' => 'Seo[meta_keyword]',
                                                        'helpText' => '100字以內',
                                                        'value' => ( !empty($data['meta_keyword']) )? $data['meta_keyword'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'Meta描述',
                                                        'inputName' => 'Seo[meta_description]',
                                                        'helpText' => '300字以內',
                                                        'value' => ( !empty($data['meta_description']) )? $data['meta_description'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'GA碼',
                                                        'inputName' => 'Seo[ga_code]',
                                                        'helpText' => '輸入編號即可，不需要整段程式碼。',
                                                        'value' => ( !empty($data['ga_code']) )? $data['ga_code'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'GTM碼',
                                                        'inputName' => 'Seo[gtm_code]',
                                                        'helpText' => '輸入編號即可，不需要整段程式碼。',
                                                        'value' => ( !empty($data['gtm_code']) )? $data['gtm_code'] : ''
                                                    ])}}


                                                </div>
                                            </div>
                                            {{-- div class="tab-pane form_news_pad" id="tab_meta">

                                            	{{ FormMaker::photosTable( 
                                            		[
                                            			'nameGroup' => '維修分類-Photo',
                                            			'datas' => ( !empty($Photo) )? $Photo : [],
                                            			'table_set' => $photoTable
                                            		]
                                            	 ) }}

                                            </div>
 --}}                                            
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

            $('.b-lazy').bttrlazyloading();

		});

	</script>
@stop

