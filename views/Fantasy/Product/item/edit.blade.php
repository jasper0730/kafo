@extends('Fantasy.template')

@section('title', "產品項目修改"."-".$ProjectName)
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
            產品項目 <small>Product Category Manager</small> </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">產品項目</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    產品項目修改 </li>
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
                                            {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 產品項目 </span>
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
                                                <a href="#tab_spec" data-toggle="tab"> 產品規格 </a>
                                            </li>
                                            <li >
                                                <a href="#tab_photos" data-toggle="tab"> 產品多圖 </a>
                                            </li>
                                       
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">
                                                   
                                                    {{ItemMaker::idInput([
                                                        'inputName' => 'ProductItem[id]',
                                                        'value' => ( !empty($data['id']) )? $data['id'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示',
                                                        'inputName' => 'ProductItem[is_visible]',
                                                        'helpText' =>'是否顯示。',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示首頁',
                                                        'inputName' => 'ProductItem[is_show_in_home]',
                                                        'helpText' =>'是否顯示於首頁。',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_show_in_home']) )? $data['is_show_in_home'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否獲勝',
                                                        'inputName' => 'ProductItem[is_win]',
                                                        'helpText' =>'是否獲勝',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_win']) )? $data['is_win'] : ''
                                                    ])}}

                                                    {{ItemMaker::select([
                                                        'labelText' => '所屬類別',
                                                        'inputName' => 'ProductItem[serial_id]',
                                                        'required'  => true,
                                                        'options'   => $parent['belong']['ProductSeries'],
                                                        'value' => ( !empty($data['serial_id']) )? $data['serial_id'] : ''
                                                    ])}} 

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '排序',
                                                        'inputName' => 'ProductItem[rank]',
                                                        'helpText' =>'前台列表顯示之排序',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'ProductItem[title]',
                                                        'value' => ( !empty($data['title']) )? $data['title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '副標題',
                                                        'inputName' => 'ProductItem[sub_title]',
                                                        'value' => ( !empty($data['sub_title']) )? $data['sub_title'] : ''
                                                    ])}}
    

                                                    {{ItemMaker::editor([
                                                        'labelText' => '短述',
                                                        'inputName' => 'ProductItem[brief]',
                                                        'helpText' => '150字以內',
                                                        'value' => ( !empty($data['brief']) )? $data['brief'] : ''
                                                    ])}}

                                                    {{ItemMaker::editor([
                                                        'labelText' => '系列簡述',
                                                        'inputName' => 'ProductItem[summary]',
                                                        'helpText' => '150字以內',
                                                        'value' => ( !empty($data['summary']) )? $data['summary'] : ''
                                                    ])}}


                                                    {{ItemMaker::photo([
                                                        'labelText' => 'feature 小圖',
                                                        'inputName' => 'ProductItem[icon]',
                                                        'value' => ( !empty($data['icon']) )? $data['icon'] : ''
                                                    ])}}

                                                    {{-- <br><br><br><br> --}}

                                                  

                                                    {{ItemMaker::photo([
                                                        'labelText' => '產品圖(電腦)',
                                                        'inputName' => 'ProductItem[image_pc]',
                                                        'value' => ( !empty($data['image_pc']) )? $data['image_pc'] : ''
                                                    ])}}


                                                    {{ItemMaker::photo([
                                                        'labelText' => '產品圖(手機)',
                                                        'inputName' => 'ProductItem[image_mobile]',
                                                        'value' => ( !empty($data['image_mobile']) )? $data['image_mobile'] : ''
                                                    ])}}


                                                </div>
                                            </div>

                                            {{-- 產品規格 --}}
                                            <div class="tab-pane form_news_pad" id="tab_spec">
                                                
                                                {{ FormMaker::photosTable(
                                                    [
                                                        'nameGroup' => $routePreFix.'-ItemSpec',
                                                        'datas' => ( !empty($parent['has']['ItemSpec']) )? $parent['has']['ItemSpec'] : [],
                                                        'table_set' => $bulidTable['ItemSpec'],
                                                    ]
                                                 ) }}

                                            </div>

                                            {{-- 產品多圖 --}}
                                            <div class="tab-pane form_news_pad" id="tab_photos">
                                                {{ FormMaker::photosTable(
                                                    [
                                                        'nameGroup' => $routePreFix.'-ItemPhoto',
                                                        'datas' => ( !empty($parent['has']['ItemPhoto']) )? $parent['has']['ItemPhoto'] : [],
                                                        'table_set' => $bulidTable['ItemPhoto'],
                                                    ]
                                                ) }}

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

    <script type="text/javascript">
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

            var location = window.location.href;

            var locationArray = location.split('/');

            var ItemId = locationArray.pop();
            var base = $("base").attr('href');
            //var inputs = $('#itemTbody tr td:nth-child(3)');
            var inputs = $('#tab_spec #itemTbody > tr > td:nth-child(3)');
            var inputs_value = $('#tab_spec #itemTbody > tr > td:nth-child(4)');
            var addinputs = $('#tab_spec .table-responsive #itemTbody');
            var initInputs = $('#tab_spec .table-responsive table tbody tr'); //自動產生格子
            var time = 0;
            var inptsLenght = 0;
            var responseLenght = 0;
            var getresponse = [];
            /*產品規格自動帶入*/
            $.ajax({
                    url: base + '/ajax/getItem',
                    data:{Item_id:ItemId},
                    type: 'get',
                    error: function (xhr) {
                        console.log("error");
                    },
                    success: function (response) {
                        inptsLenght = inputs.length;
                        responseLenght = response.length;
                        getresponse = response;
                        // console.log(initInputs,inptsLenght,responseLenght,getresponse);
                        //如果沒有值也沒有標題
                        if(!initInputs.length){
                            console.log(1);
                            addinputs = $('#tab_spec .table-responsive #itemTbody');
                            for (i = 0; i < responseLenght ; i++) {
                                addinputs.append("<tr><td><div class='checker'><span><input type='checkbox' name='ItemSpec["+(i)+"][id]' value=''></span></div><input type='hidden' name='ItemSpec["+(i)+"][id]' value=''></td> <td align='center' id='sortNum'><h1>"+(i+1)+"</h1><input type='hidden' name='ItemSpec["+(i)+"][rank]' value=''></td><td><input class='form-control form-filter input-sm' name='ItemSpec["+(i)+"][attr]' value='"+getresponse[i]+"' readonly='readonly' style='border: 0px;'></td><td><input class='form-control form-filter input-sm' name='ItemSpec["+(i)+"][value]' value=''></td></tr>")
                            }
                        }
                        //如果一切正常都有建立值 但是沒有標題
                        else if(initInputs){
                            console.log(2);
                            let is_remove = [];
                            [].slice.call( inputs ).forEach( function(input,key){
                                if(key+1 > inptsLenght){
                                    console.log(3);
                                    addinputs = $('#tab_spec .table-responsive #itemTbody');
                                        addinputs.append("<tr><td><div class='checker'><span><input type='checkbox' name='ItemSpec["+(key)+"][id]' value=''></span></div><input type='hidden' name='ItemSpec["+(key)+"][id]' value=''></td> <td align='center' id='sortNum'><h1>"+(key+1)+"</h1><input type='hidden' name='ItemSpec["+(key)+"][rank]' value=''></td><td><input class='form-control form-filter input-sm' name='ItemSpec["+(key)+"][attr]' value='"+getresponse[key]+"' readonly='readonly' style='border: 0px;'></td><td><input class='form-control form-filter input-sm' name='ItemSpec["+(key)+"][value]' value=''></td></tr>")
                                }else if(typeof(getresponse[key]) != "undefined"){
                                    console.log(4);
                                    input.querySelector('input').value = getresponse[key];
                                    input.querySelector('input').setAttribute('readonly',"readonly");
                                    input.querySelector('input').style.border = 0;
                                }else{
                                    console.log(5);
                                    is_remove.push(key);
                                    input.querySelector('input').value = '';
                                }
                            });
                            // [].slice.call( inputs_value ).forEach( function(input,key){
                            //     if(typeof(getresponse[key]) != "undefined"){
                            //     }
                            // });
                            is_remove.reverse().forEach(item => {
                                $('#itemTbody > tr')[item].remove();
                            });
                        }
                        //如果最後幾項沒有建立
                        else if(responseLenght - inptsLenght) {
                            console.log(6);
                            var key = inptsLenght - 1;
                            for (i = 0; i < responseLenght - inptsLenght; i++) { 
                                addinputs.append("<tr><td><div class='checker'><span><input type='checkbox' name='ItemSpec["+(key+1)+"][id]' value=''></span></div><input type='hidden' name='ItemSpec["+(key+1)+"][id]' value=''></td> <td align='center' id='sortNum'><h1>"+(key+2)+"</h1><input type='hidden' name='ItemSpec["+(key+1)+"][rank]' value=''></td><td><input class='form-control form-filter input-sm' name='ItemSpec["+(key+1)+"][attr]' value='"+getresponse[key+1]+"' readonly='readonly' style='border: 0px;'></td><td><input class='form-control form-filter input-sm' name='ItemSpec["+(key+1)+"][value]' value=''></td></tr>")
                            }
                        }
                    }
            });
            
        });

    </script>
@stop

