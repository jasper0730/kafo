@if( !empty($data['id']) )
    <a target="_blank" href=" {{ ItemMaker::url('Fantasy/'.$routePreFix.'/copy/'.$data['id']) }}" type="button" class="btn default btn-secondary-outline btn-circle tooltips copyBtn" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="複製"> 複製
    </a>
@endif

	<a href=" {{ ItemMaker::url('Fantasy/'.$routePreFix) }}" type="button" name="back" class="btn default btn-secondary-outline btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="返回"> <i class="fa fa-mail-reply"></i> 返回
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