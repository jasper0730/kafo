@extends('Fantasy.template')

@section('title',"網站基本設定修改 "."-".$ProjectName)

@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/plugins/colorbox/colorbox.css" />
@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			網站基本設定管理 <small>Setting Manager</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/網站基本設定')}}">網站基本設定管理</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					網站基本設定修改
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->


			<div class="row">
				<div class="col-md-12">

                    <!--注意事項-->
                    {{-- <div class="note note-danger">
                        <p> 注意事項: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>
                    </div> --}}
                    <!--注意事項END-->

					<!--<form action="{{ ItemMaker::url('Fantasy/網站基本設定/Update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" target="hidFrame">-->
					{!! Form::open( ["url" => ItemMaker::url('Fantasy/網站基本設定/update'), 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
											網站基本設定管理
										</span>
                                    </div>
                                    <div class="actions btn-set">
 										<a href=" {{ ItemMaker::url('Fantasy/網站基本設定/') }}" type="button" name="back" class="btn default btn-secondary-outline btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="返回">
                                            <i class="fa fa-mail-reply"></i> 返回
                                        </a>

                                        <button type="submit"  class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="儲存">
                                            <i class="fa fa-check"></i> 儲存
                                        </button>
                                        {{-- <a href="#" class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="刪除">
                                            <i class="fa fa-external-link"></i> 刪除
                                        </a> --}}

                                        {{-- <div class="btn-group">
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
                                                <a href="#tab_index" data-toggle="tab"> 首頁 </a>
                                            </li> --}}

                                            <li>
                                                <a href="#tab_product" data-toggle="tab"> 產品主題Overview </a>
                                            </li>


                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::textInput([
														'labelText' => '公司名稱',
														'inputName' => 'Setting[company_title]',
														'helpText' =>'如果這一個欄位有填寫時，前台將會以這邊顯示於網頁title',
														'value' => ( !empty($data['company_title']) )? $data['company_title'] : ''
													])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司地址',
                                                        'inputName' => 'Setting[company_address]',
                                                        'value' => ( !empty($data['company_address']) )? $data['company_address'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司信箱',
                                                        'inputName' => 'Setting[company_email]',
                                                        'value' => ( !empty($data['company_email']) )? $data['company_email'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司傳真',
                                                        'inputName' => 'Setting[company_fax]',
                                                        'value' => ( !empty($data['company_fax']) )? $data['company_fax'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司電話',
                                                        'inputName' => 'Setting[company_phone]',
                                                        'value' => ( !empty($data['company_phone']) )? $data['company_phone'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司Facebook',
                                                        'inputName' => 'Setting[company_fb]',
                                                        'value' => ( !empty($data['company_fb']) )? $data['company_fb'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司Line',
                                                        'inputName' => 'Setting[company_line]',
                                                        'helpText' => '請貼QR碼網址',
                                                        'value' => ( !empty($data['company_line']) )? $data['company_line'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司Instagram',
                                                        'inputName' => 'Setting[company_instagram]',
                                                        'value' => ( !empty($data['company_instagram']) )? $data['company_instagram'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '公司Twitter',
                                                        'inputName' => 'Setting[company_twitter]',
                                                        'value' => ( !empty($data['company_twitter']) )? $data['company_twitter'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '聯絡我們收件信箱',
                                                        'inputName' => 'Setting[contact_emails]',
                                                        'helpText' => '前台的聯絡我們表單送出之後，通知信的收件信箱設定。',
                                                        'value' => ( !empty($data['contact_emails']) )? $data['contact_emails'] : ''
                                                    ])}}




                                                </div>
                                            </div>



                                        <!--首頁細節設定-->
                                           {{-- <div class="tab-pane form_news_pad form-row-seperated" id="tab_index">
                                                <div class="form-body form_news_pad">


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '產品專區短述',
                                                        'inputName' => 'Setting[index_gallery_summary]',
                                                        'value' => ( !empty($data['index_gallery_summary']) )? $data['index_gallery_summary'] : ''
                                                    ])}}



                                                </div>
                                            </div> --}}





                                    <!--產品主題Overview設定-->
                                           <div class="tab-pane form_news_pad form-row-seperated" id="tab_product">
                                                <div class="form-body form_news_pad">


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'Setting[pdThemeOv_title]',
                                                        'value' => ( !empty($data['pdThemeOv_title']) )? $data['pdThemeOv_title'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '短述',
                                                        'inputName' => 'Setting[pdThemeOv_summary]',
                                                        'value' => ( !empty($data['pdThemeOv_summary']) )? $data['pdThemeOv_summary'] : ''
                                                    ])}}


                                                    {{ItemMaker::photo([
                                                        'labelText' => '廣告圖片',
                                                        'inputName' => 'Setting[pdThemeOv_ad_img]',
                                                        'value' => ( !empty($data['pdThemeOv_ad_img']) )? $data['pdThemeOv_ad_img'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '廣告標題',
                                                        'inputName' => 'Setting[pdThemeOv_ad_title]',
                                                        'value' => ( !empty($data['pdThemeOv_ad_title']) )? $data['pdThemeOv_ad_title'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '廣告副標題',
                                                        'inputName' => 'Setting[pdThemeOv_ad_subTitle]',
                                                        'value' => ( !empty($data['pdThemeOv_ad_subTitle']) )? $data['pdThemeOv_ad_subTitle'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '廣告短述',
                                                        'inputName' => 'Setting[pdThemeOv_ad_summary]',
                                                        'value' => ( !empty($data['pdThemeOv_ad_summary']) )? $data['pdThemeOv_ad_summary'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '廣告按鈕標題',
                                                        'inputName' => 'Setting[pdThemeOv_ad_btnTitle]',
                                                        'value' => ( !empty($data['pdThemeOv_ad_btnTitle']) )? $data['pdThemeOv_ad_btnTitle'] : ''
                                                    ])}}



                                                    {{ItemMaker::textInput([
                                                        'labelText' => '廣告連結',
                                                        'inputName' => 'Setting[pdThemeOv_ad_link]',
                                                        'value' => ( !empty($data['pdThemeOv_ad_link']) )? $data['pdThemeOv_ad_link'] : ''
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

<script src="vendor/Fantasy/plugins/colorbox/jquery.colorbox.js" type="text/javascript"></script>


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
