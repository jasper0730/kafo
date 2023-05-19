

$(document).ready(function() {

    // $('.table01 tbody tr:last-child span').addClass('only_one');

    if ( $(window).width() > 1183 ) {

      if ( $('.table01 thead tr th').length >= 10 ) {

        table(400);

        console.log('1');  //欄位10個以上

      }else if ( $('.table01').width() > 1183 && $('.table01 thead tr th').length < 10 && $('.table01 tbody tr').length < 4 ) {

        $('.table01 tbody tr td a').css('min-width','150px');

        $('.table01 tbody tr:last-child span').addClass('only_one');

        var tt = $('.table01 tbody tr').length;

        var tt_height = tt * 105 + 105;

        table(tt_height);

        console.log('2');  //欄位10個以下 資料小於4筆

      }else if ( $('.table01').width() > 1183 && $('.table01 thead tr th').length < 10 ) {

        $('.table01 tbody tr td a').css('min-width','150px');

        table(400);

        console.log('3');  //欄位10個以下

      }else if ( $('.table01').width() < 1183 ) {

        var th_width = $('.table01 tbody tr th').width();

        var tt = $('.table01 tbody tr td').length;

        var tt_width = (1200 - th_width) / tt;

        $('.table01 tbody tr td a').css('min-width', tt_width);

        console.log('4');  //欄位寬度小於1200

      }

    }else {

      if ( $('.table01 thead tr th').length < 10 && $('.table01 tbody tr').length < 4 ) {

        $('.table01 tbody tr:last-child span').addClass('only_one');

        var tt = $('.table01 tbody tr').length;

        var tt_height = tt * 105 + 105;

        table(tt_height);

      }else {

        table(400);

      }

    }




    function table(data){
      $('.table01').DataTable( {
          "scrollY": data,
          "scrollX": true,
          "paging": false,
          "order": [],
          // "bSort": false,
      } );
      // $('.dataTables_scrollBody').css({'overflow':'hidden'});
      // $('.dataTables_scroll').mouseenter(function(){
      //   $('.dataTables_scrollBody').css({'overflow':'auto'});
      // });
      // $('.dataTables_scroll').mouseleave(function(){
      //   $('.dataTables_scrollBody').css({'overflow':'hidden'});
      // });
    }


    /*畫面裝置小於1200*/
    // if ( $(window).width() < 1200 ) {
    //
    //   if ( $('.table01').hasClass('dataTable') == false ) {
    //
    //     $('.table01').DataTable( {
    //         "scrollY": 400,
    //         "scrollX": true,
    //         "bSort": false,
    //     } );
    //     $('.dataTables_scrollBody').css({'overflow':'hidden'});
    //     $('.dataTables_scroll').mouseenter(function(){
    //       $('.dataTables_scrollBody').css({'overflow':'auto'});
    //     });
    //     $('.dataTables_scroll').mouseleave(function(){
    //       $('.dataTables_scrollBody').css({'overflow':'hidden'});
    //     });
    //
    //   }
    //
    // }


} );
