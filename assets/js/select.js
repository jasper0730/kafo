$(document).ready(function(){
    /*從網址抓現在的系列 並設定selected選項*/
    var selectedValue = location.href.substr(location.href.length-1);
    /*設定selected 的title顯示*/
    var seletedTile = $('#'+selectedValue).html()
    $('.product-selected').html(seletedTile)
});