@extends('Fantasy.template')

@section('title',"OverView "."-".$ProjectName)

@section('otherClass' , 'page-content_top0')

@section('body_class' , 'page-sidebar-closed')

@section('css')
	<link href="vendor/Fantasy/assets/pages/css/about.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

                <!-- BEGIN CONTENT HEADER -->
    <div class="row margin-bottom-40 about-header about-header2 ">
        <div class="col-md-12">
            <h1>About Us</h1>
            <h2>Life is either a great adventure or nothing</h2>
            {{-- <a class="btn btn-danger" href="{{ ItemMaker::url('/') }}" target="_blank">GO Home</a> --}}
        </div>
    </div>
    <!-- END CONTENT HEADER -->
    <!-- BEGIN CARDS -->
    <div class="row margin-bottom-20">
    	@if( $MenuList )
    		@foreach( $MenuList as $key => $value )

		        <div class="col-lg-3 col-md-6">
		            <div class="portlet light">
		                <div class="card-icon">
		                	<?php print($value['icon']); ?>
		                </div>
		                <div class="card-title">
		                    <span> {{ $key }} </span>
		                </div>
		                <div class="card-desc">
		                    <span> 
								 <?php  print($value['slogan']) ?>
		                    </span>
		                </div>
		            </div>
		        </div>
    		@endforeach
    	@endif

    </div>

@endsection