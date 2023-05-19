@extends('Fantasy.template')

@section('title', "Historical修改"."-".$ProjectName)
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
            Historical <small>About History Manager</small> </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">Historical</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    Historical修改 </li>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
                                            {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - Historical </span>
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
                                                        'inputName' => 'Historical[id]',
                                                        'value' => ( !empty($data['id']) )? $data['id'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '年度',
                                                        'inputName' => 'Historical[year]',
                                                        'value' => ( !empty($data['year']) )? $data['year'] : ''
                                                    ])}}

                                                    {{ItemMaker::editor([
                                                        'labelText' => '敘述',
                                                        'inputName' => 'Historical[brief]',
                                                        'value' => ( !empty($data['brief']) )? $data['brief'] : ''
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