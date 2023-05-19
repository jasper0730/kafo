<ul class="page-sidebar-menu  page-header-fixed  page-sidebar-menu-compact" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="100" data-height="731">
	<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
	<li class="sidebar-toggler-wrapper">
		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		<div class="sidebar-toggler">
		</div>
		<!-- END SIDEBAR TOGGLER BUTTON -->
	</li>
	<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
	<!-- END ANGULARJS LINK -->
	<?php 
		//print_r(parent::$FunctionSet);
	?>
	@foreach($MenuList as $key=>$value)
		<?php 
			if(preg_match("/$key/i", $_SERVER['REQUEST_URI'])){
				//echo "path mach";
				$onThis = 'active open';
			}else{
				//echo "path is not mach";
				$onThis = '';
			}
		?>

		@if(is_array($MenuList[$key]))
			<li class="{{ $onThis }}" class="nav-item start">
				<a href="javascript:;">
					<span class="title">{{$key}}</span><span class="arrow "></span>
				</a>
				@if(count($MenuList[$key])!=0)
					<ul class="sub-menu">
						@foreach($MenuList[$key] as $key2 => $value2)
							<li class="">
								<a href="{{url($MenuList[$key][$key2])}}">{{$key2}}</a>
							</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endif

		@if(is_string($MenuList[$key]))
			<li class="{{ $onThis }}">
				<a href="{{url($value)}}">
					<span class="title">{{$key}}</span>
				</a>
			</li>
		@endif
	@endforeach
</ul>