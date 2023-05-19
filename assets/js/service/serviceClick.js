(function(){
  var service = function(){
    var _this = this;
    service.prototype.init = function() {
        _this.initElement();
        _this.clickBanner();
        _this.clickSelect();
        _this.firstInit();
    };
   
    //初始化元件抓取
    this.initElement = function(){
      _this.pick = $(".service-map-local li a.pick-map");
      _this.map = $(".service-map-box span");
      _this.areaBarClicka = $(".service-map-local li a");
      _this.areaBar = $(".service-map-local .area_box li, .rwd-local-box li");
      _this.locationSelect = $('.jq-selectBox02 li a');
      _this.selectTitle = $(".service-selected.jq-selectBtn02");
      _this.initLocationId = "";
    }

     this.firstInit = function(){
      var category = $(_this.pick).data("info");
      getCountry(category);

    }

    //點選地區
    this.clickBanner = function(){
      _this.areaBar.click(function(){
        var category = $(this).find("a").data("info");
        var now_id = $(this).find("a").attr("id");
        rmClass();
        addClass(now_id);
        getCountry(category);
        $(".rwd-local-box span").text($(this).text())
        $(".rwd-local-box span").click();
      });
    }

    //刪除選擇項目
    function rmClass(){
      $(".service-map-local li a.pick-map").removeClass("pick-map");
      $(".service-map-cover li.pick-map").removeClass("pick-map");
      $(".service-map span.pick-map").removeClass("pick-map");
    }

    //掛上pick-map給項目
    function addClass(now_id){
      $(".service-map-local li #" + now_id).addClass("pick-map");
      $(".service-map #" + now_id).addClass("pick-map");
      $(".service-map-cover #" + now_id).addClass("pick-map")
    }

    //載入select 項目
    function getCountry(category){
      var title ="";
      $.ajax({
              url: $('base').attr('href') + '/service/ajaxCountry',
              data:{area:category},
              type: 'get',
              error: function (xhr) {
                result = false;
              },
              success: function (response) {
                $('.jq-selectBox02').empty();
                $('.jq-selectBox02').append(response);
                _this.initElement();
                _this.clickSelect();
                title = $('.jq-selectBox02 li a').first().text();
                changeSelectTitle(title);
                getLocation( $('.jq-selectBox02 li a').first().attr("class") );
              }
      });
      
    };

    //select box點選後項目
    this.clickSelect = function(){
      $('.jq-selectBox02 li a').click(function(){
        var Country = $(this).attr('class');
        var title = $(this).text();
        getLocation(Country);
        changeSelectTitle(title);
        //關閉selectbox
        $(this).parent().parent().parent().find("span").click()
      });
    }

    //抓地點項目 
    function getLocation(Country){
      $.ajax({
              url: $('base').attr('href') + '/service/ajaxLocate',
              data:{arealocate:Country},
              type: 'get',
              error: function (xhr) {
                result = false;
              },
              success: function (response) {
                $('.regular.slider.hide').empty();
                $('.regular.slider.hide').append(response);
              }
      });
    }

    //換置select 標題
    function changeSelectTitle(title){
      $(_this.selectTitle).text(title);
    }
  };

  var HandleService = new service();
  HandleService.init()
})();