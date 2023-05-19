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
                                            <li >
                                                <a href="#tab_seo" data-toggle="tab"> 單元SEO設定 </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::idInput([
														'inputName' => 'Banner[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否顯示',
														'inputName' => 'Banner[is_visible]',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}
                                                    
                                                    @if(isset($data['title']))
                                                        @if($data['title'] != 'Home' && $data['title'] != 'HOME')
                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示於選單',
                                                        'inputName' => 'Banner[is_show_on_menu]',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_show_on_menu']) )? $data['is_show_on_menu'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示於首頁頁首',
                                                        'inputName' => 'Banner[is_show_on_head]',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_show_on_head']) )? $data['is_show_on_head'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示於首頁頁尾',
                                                        'inputName' => 'Banner[is_show_on_foot]',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_show_on_foot']) )? $data['is_show_on_foot'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '排序',
                                                        'inputName' => 'Banner[rank]',
                                                        'helpText' =>'前台列表顯示之排序',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}

                                                         @endif
                                                    @endif


                                                    

                                                    {{ItemMaker::textInput([
  														'labelText' => '標題',
  														'inputName' => 'Banner[title]',
  														'value' => ( !empty($data['title']) )? $data['title'] : ''
  													])}}

                                                    @if(isset($data['title']))
                                                        @if($data['title'] == 'Home' or $data['title'] == 'HOME')
                                                            {{ItemMaker::colorPicker([
                                                                'labelText' => '首頁產品背景顏色',
                                                                'inputName' => 'Banner[backcolor]',
                                                                'value' => ( !empty($data['backcolor']) )? $data['backcolor'] : ''
                                                            ])}}
                                                        @endif
                                                    @endif

                                                   {{--  {{ItemMaker::textInput([
                                                        'labelText' => '副標題',
                                                        'inputName' => 'Banner[subtitle]',
                                                        'value' => ( !empty($data['subtitle']) )? $data['subtitle'] : ''
                                                    ])}} --}}

                                                    {{ ItemMaker::select([
                                                        'labelText' => '選擇連結',
                                                        'inputName' => 'Banner[link]',
                                                        'options'   => $otherOptions,
                                                        'value' => ( !empty($data['link']) )? $data['link'] : ''
                                                    ]) }}

                                                    {{-- {{ ItemMaker::select([
                                                        'labelText' => '選擇連結',
                                                        'inputName' => 'Banner[link]',
                                                        'options'   => $otherOptions,
                                                        'value' => ( !empty($data['link']) )? $data['link'] : ''
                                                    ]) }} --}}   

                                                </div>
                                            </div>
                                            <div class="tab-pane form-row-seperated" id="tab_seo">
                                                <div class="form-body form_news_pad">
                                                    {{
                                                        ItemMaker::textInput([
                                                            'labelText' => 'SEO網頁標題',
                                                            'inputName' => 'Banner[meta_title]',
                                                            'value' => ( !empty($data['meta_title']) )? $data['meta_title'] : '' 
                                                        ])
                                                    }}

                                                    {{
                                                        ItemMaker::textarea([
                                                            'labelText' => 'SEO關鍵字',
                                                            'inputName' => 'Banner[meta_keyword]',
                                                            'value' => ( !empty($data['meta_keyword']) )? $data['meta_keyword'] : '' 
                                                        ])
                                                    }}

                                                    {{
                                                        ItemMaker::textarea([
                                                            'labelText' => 'SEO描述',
                                                            'inputName' => 'Banner[meta_description]',
                                                            'value' => ( !empty($data['meta_description']) )? $data['meta_description'] : '' 
                                                        ])
                                                    }}

                                                    {{
                                                        ItemMaker::photo([
                                                            'labelText' => '連結分享圖片',
                                                            'inputName' => 'Banner[meta_image]',
                                                            'value' => ( !empty($data['meta_image']) )? $data['meta_image'] : '' 
                                                        ])
                                                    }}

                                                    {{
                                                        ItemMaker::textInput([
                                                            'labelText' => 'GA碼',
                                                            'inputName' => 'Banner[meta_ga]',
                                                            'value' => ( !empty($data['meta_ga']) )? $data['meta_ga'] : '' 
                                                        ])
                                                    }}

                                                    {{
                                                        ItemMaker::textInput([
                                                            'labelText' => 'GTM碼',
                                                            'inputName' => 'Banner[meta_gtm]',
                                                            'value' => ( !empty($data['meta_gtm']) )? $data['meta_gtm'] : '' 
                                                        ])
                                                    }}
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
