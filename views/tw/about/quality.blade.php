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
                    <div class="page_head about">
                        <div class="top_box">
                            <h2>ABOUT US</h2>
                            <ul class="page_loca">
                                <li><a href="{{ ItemMaker::url('/') }}">Home</a></li>
                                <li><a href="{{ ItemMaker::url('About') }}">Aboit Us</a></li>
                                <li><a href="{{ ItemMaker::url('About/foundation') }}">foundation</a></li>
                            </ul>
                        </div>
                    </div> 

                </div>
            </div>

            <!--
    
            inner_ctrl_bar start !!!
    
            -->
            <div class="inner_ctrl_bar about_bar">
                <ul class="">
                    <li><a href="{{ ItemMaker::url('About/philosophy') }}">PHILOSOPHY</a></li>
                    <li class="active"><a href="{{ ItemMaker::url('About/quality') }}">Quality</a></li>
                    <li><a href="{{ ItemMaker::url('About/legal') }}">LEAGAL</a></li>
                    <li><a href="{{ ItemMaker::url('About/oemodm') }}">OEM / ODM</a></li>
                    <li><a href="{{ ItemMaker::url('About/career') }}">CAREER</a></li>
                    <li><a href="{{ ItemMaker::url('About/foundation') }}">FOUNDATION</a></li>
                </ul>
            </div>


            <div class="body_box_padding index">
                <div class="inner_padding">

                    <!--

                    banner_inner start !!!

                    -->
                    <div class="banner_inner news">
                        <img src="../../assets/img/quality_top.jpg" alt="title"/>
                    </div>

                    <div class="page_head inner no_boder">
                        <div class="top_box">
                            <h2 class="inner_title" id="access">QUALITY</h2>
                        </div>
                    </div>

                </div>
            </div>




            <div class="about_box">
                <div class="inner">
                    <img class="float_img right" src="../../assets/img/about_img_006.jpg" />
                    <div class="txt">
                        <h3>Quality You Can Count On</h3>
                        <p>
                            Anyone can talk about quality. But can they make sure the products 
                            you source offer consistent quality, order after order?<br />
                            SECO-LARM's quality control management system is compliant with all the 
                            requirements of International Organization for Standardization (ISO), 
                            the accepted measure of quality worldwide.SECO-LARM initially earned 
                            ISO 9002:1994 in 1997 and upgraded its certification to ISO 9001:2008 
                            in May, 2009.
                        </p>
                    </div>
                </div>
            </div>
            <div class="about_box about_control">
                <div class="inner">
                    <div class="txt">
                        <h3>Quality Control</h3>
                        <p>
                            ISO 9001:2008 is not just another quality control theory. Instead, SECO-LARM's 
                            entire manufacturing and design process was probed in great detail by an 
                            independent quality system certification body, and was found compliant with 
                            internationally accepted quality standards.
                        </p>
                        <p>
                            A quality management system certified as ISO 9001:2008 compliant 
                            ensures that SECO-LARM® can deliver products that meet your quality 
                            requirements time and time again.ISO 9001:2008. World-class quality 
                            management from a world-class security manufacturer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="about_box cert">
                <div class="inner">
                    <img class="float_img right" src="../../assets/img/about_img_008.jpg" />
                    <div class="txt">
                        <h3>Certifications</h3>
                        <p>
                            ISO 9001:2008 is not just another quality control theory. Instead, SECO-LARM's 
                            entire manufacturing and design process was probed in great detail by an independent 
                            quality system certification body, and was found compliant with internationally 
                            accepted quality standards.
                        </p>
                        <p>
                            A quality management system certified as ISO 9001:2008 compliant 
                            ensures that SECO-LARM® can deliver products that meet your quality 
                            requirements time and time again.ISO 9001:2008. World-class quality 
                            management from a world-class security manufacturer.
                        </p>
                    </div>
                </div>
            </div>




 <!--foot start !!!-->
            @include($locale.'.index_footer')


            <!--top_icon-->
            <a class="to_top" href="javascript:void(0)"><span>TOP</span></a>
        </div>

        {{--非共用js區塊--}}
        @section('script')

        @stop

@stop
