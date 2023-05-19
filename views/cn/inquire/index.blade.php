@extends('template')

@section('bodySetting', '')

@section('content')

        <div class="body_box">
            <div class="body_box_padding index">
                <!--header start !!!-->
               @include($locale.'.headerbanner')


                <div class="inner_padding">
                    <!--
                    
                    page_head start !!!
                    
                    -->
                    <div class="page_head">
                        <div class="top_box">
                            <h2>CONTACT US</h2>
                            <ul class="page_loca">
                                <li><a href="/home/index.html">Home</a></li>
                                <li><a href="/home/contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--
                    
                    banner_inner start !!!
                    
                    -->
                    <div class="banner_inner news">
                        <img src="/assets/img/contact_head.jpg" alt="Contact Us"/>
                    </div>

                </div>



            </div>

            <!--
            
            inner_ctrl_bar start !!!
            
            -->
            <div class="inner_ctrl_bar contact_bar">
                <ul class="">
                    <li class="active"><a>CONTACT US</a></li>
                    <li><a class="policy_lightbox" href="javascript:void(0)" title="policy">PRIVACY POLICY</a></li>
                </ul>
            </div>

            <div class="body_box_padding">
                <div class="inner_padding">
                    <!--
                    
                    contact_detail_list start !!!
                    
                    -->
                    <div class="contact_detail_list">
                        <div class="float_box">
                            <div class="list">
                                <div class="img"><div class="icon"></div></div>
                                <div class="txt">
                                    <h4>Mail To Us</h4>
                                    <p><span>General：</span>Info@superior-elec.com</p>
                                    <p><span>Saled：</span>sales@superior-elec.com</p>
                                </div>
                            </div>
                            <div class="list">
                                <div class="img"><div class="icon"></div></div>
                                <div class="txt">
                                    <h4>Please Call</h4>
                                    <p><span>Tel:</span>886-2-2378-6161</p>
                                    <p><span>Fax:</span>886-2-2378-6163</p>
                                </div>
                            </div>
                        </div>
                        <div class="float_box">
                            <div class="list">
                                <div class="img"><div class="icon"></div></div>
                                <div class="txt">
                                    <h4>Company Address / PO Box</h4>
                                    <p><span>PO Box：</span>P.O. Box 57-81, Taipei 106, Taiwan, R.O.C.</p>
                                    <p><span>Company Address：</span>#10, Lane 31 Chung-Te Street, Taipei 110, Taiwan, R.O.C. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    
                    contact_tb_box start !!!
                    
                    -->
                    <div class="contact_tb_box">
                        <div class="left">
                            <div class="tit">
                                <h1><font>Online</font> Submissions</h1>
                                <span>"<font>+</font>" required</span>
                            </div>
            {!! Form::open( array('url' => ItemMaker::url('ContactUs/mail') , 'method'=>'POST', 'id'=>'contactUsForm' )) !!}

                      
                            <table class="table_style" >
                                <tr>
                                    <td><h3 class="must">Company Name：</h3></td>
                                    <td colspan="2"><input name="CompanyName" type="text" class="required" /></td>
                                </tr>
                                <tr>
                                    <td><h3 class="must">Gender：</h3></td>
                                    <td colspan="2">
                                        <input type="radio" name="sex" value="Male" class="required"/ ><label for="sex_male">Male</label>
                                        <input type="radio" name="sex"  value="Female" class="required"/><label for="sex_female">Female</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h3 class="must">Contact Name：</h3></td>
                                    <td colspan="2"><input type="text" name="ContactName" class="required" /></td>
                                </tr>
                                <tr>
                                    <td><h3 class="must">Country：</h3></td>
                                    <td colspan="2"><input type="text" name="Country" class="required" /></td>
                                </tr>
                                <tr>
                                    <td><h3 class="must">Phone：</h3></td>
                                    <td colspan="2"><input type="text" name="Phone" class="required" /></td>
                                </tr>
                                <tr>
                                    <td><h3 class="must">Email：</h3></td>
                                    <td colspan="2"><input type="text" name="Email" class="required" /></td>
                                </tr>
                                <tr>
                                    <td><h3>Website：</h3></td>
                                    <td colspan="2"><input type="text" name="Website" /></td>
                                </tr>
                                <tr>
                                    <td><h3 class="must" >Type</h3></td>
                                    <td colspan="2">
                                        <select data-info="問題類型">
                                        <option value="">Please Choose</option>
                                            @foreach($category as $row)
                                            <option name="selectItem" value="{{ $row->title }}" id="selectItem">{{ $row->title }}</option>
                                            @endforeach
                                        </select> 
                                    </td>
                                </tr>
                                <tr>
                                    <td><h3 class="must" name="Comments" >Comments：</h3></td>
                                    <td colspan="2"><textarea  id="textComment" data-info="內容" class="required"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="check_outer" >
                                            <input type="checkbox" id="contact_check" class="required">
                                            <label for="contact_check">
                                                I agree to receive free email newsletter from Superior 
                                                Electronics on product updates, company news,events and 
                                                trade shows.
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><h3 class="must"> Verification：</h3></td>
                                    <td width="40%">
                                        
                                            <input type="text" class="required" />
                                            <div id="changeCap">{!! Captcha::img() !!}</div>
                                        
                                    
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <div class="btn_box">
                                            <input class="clearBtn" type="reset" value="CLEAR" />
                                            <div class="submitBtn">SEND</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                 
            {!! Form::close() !!}


                        </div>
                        <div class="right">
                            <p>
                                Here you can also fill simple information and 
                                content, we will contact you as soon as possible.
                            </p>
                            <iframe src="
                                https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d3615.268866705378!2d121.5540704!3d25.0249481!
                                3m2!1i1024!2i768!4f13.1!2m1!1zMTEw5Y-w5YyX5biC5L-h576p5Y2A5bSH5b636KGXMzHlt7cxMOiZnw!5e0!3m2!1szh-
                                TW!2stw!4v1426055117443
                                "  frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
             <!--foot start !!!-->
            @include($locale.'.index_footer')


            <!--top_icon-->
            <a class="to_top" href="javascript:void(0)"><span>TOP</span></a>
        </div>

        <input type="hidden" class="alertMessage" value="請填入您的">

        {{--非共用js區塊--}}
        @section('script')
        <script src="/assets/js/email/handleContact.js"></script>
        @stop

@stop
