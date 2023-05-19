  $(document).ready(function() {



      //動畫

      $('.service-wrap .service-type').waypoint(function() {

          $('.service-wrap .service-type>a,.service-wrap .service-select, .hr01').addClass('animated-slow fadeIn');

          $('.service-wrap .service-type .title').addClass('move animated-slow');

      }, {

          offset: '80%'

      });

      $('.service-map-local').waypoint(function() {

          $('.service-map-local ul:first-child').addClass('animated-slow fadeInUp');

          $('.service-map-local h2,.service-map-local ul:last-child').addClass('move animated-slow fadeInUp delay-05s');

      }, {

          offset: '80%'

      });

      $('.service-map').waypoint(function() {

          $('.service-map').addClass('animated-slow fadeInUp');

      }, {

          offset: '80%'

      });

      $('.container-map .service-type').waypoint(function() {

          $('.container-map .service-type>a,.container-map .service-select, .hr01').addClass('animated-slow fadeIn');

          $('.container-map .service-type .title').addClass('move animated-slow');

      }, {

          offset: '80%'

      });

      $('.service-map-txt').waypoint(function() {

          $('.button-group ,.regular ,.hr02').addClass('animated-slow fadeIn');

      }, {

          offset: '80%'

      });

      $('.service-contact').waypoint(function() {

          $('.service-contact h3 ,.service-contact a').addClass('animated-slow fadeInUp');

      }, {

          offset: '80%'

      });



      // 初始預設文字

      var _strDefaul = $(".jq-selectBox01 li").first().text();

      $(".jq-selectBtn01").html(_strDefaul);

      _strDefaul = $(".jq-selectBox02 li").first().text();

      $(".jq-selectBtn02").html(_strDefaul);



      // select的方框分離2個

      var _theselectbox01 = 1;

      var _theselectbox02 = 1;

      var _selectBtn01 = $(".jq-selectBtn01");

      var _selectBox01 = $(".jq-selectBox01");

      var _selectBtn02 = $(".jq-selectBtn02");

      var _selectBox02 = $(".jq-selectBox02");

      _selectBtn01.on('click', function() {

          if (_theselectbox01 == 1) {

              _selectBox01.fadeIn(300);

              _theselectbox01 = 0;

          } else if (_theselectbox01 != 1) {

              _selectBox01.fadeOut(300);

              _theselectbox01 = 1;

          }

      });

      _selectBtn02.on('click', function() {

          if (_theselectbox02 == 1) {

              _selectBox02.fadeIn(300);

              _theselectbox02 = 0;

          } else if (_theselectbox02 != 1) {

              _selectBox02.fadeOut(300);

              _theselectbox02 = 1;

          }

      });

      // select的方框外也縮入

      $(document).click(function(e) {

          if (!_selectBox01.is(e.target) &&

              !_selectBtn01.is(e.target) &&

              _selectBox01.has(e.target).length === 0 &&

              !_selectBox02.is(e.target) &&

              !_selectBtn02.is(e.target) &&

              _selectBox02.has(e.target).length === 0) {

              _selectBox01.fadeOut(300);

              _selectBox02.fadeOut(300);

              _theselectbox01 = 1;

              _theselectbox02 = 1;

          }

      });

      openslick();

      closeslick();

      var widthScreen = $(window).width();

      $(window).ready(showSliderScreen(widthScreen)).resize(

          function() {

              var widthScreen = $(window).width();

              showSliderScreen(widthScreen);

              center(widthScreen);

          }

      );

  });



  function mapmove() {
   
      var _selectplace = $(".jq-selectBtn01").text().trim();

      var _selectMapBox = $('.service-map-box')

      if (_selectplace == 'asia') {

          _selectMapBox.css('transform', 'translate(-280px,0)');

      } else if (_selectplace == 'america') {

          _selectMapBox.css('transform', 'translate(-527px,0)');

      } else if (_selectplace == 'europe') {

          _selectMapBox.css('transform', 'translate(-70px,0)');

      } else if (_selectplace == 'oceania') {

          _selectMapBox.css('transform', 'translate(-309px,0)');

      } else if (_selectplace == 'africa') {

          _selectMapBox.css('transform', 'translate(-109px,0)');

      } else if (_selectplace == 'middle') {

          _selectMapBox.css('transform', 'translate(-150px,0)');

      } else {};

  };

  var openyn = 'n';

  // 判斷寬度是否用slick

  function showSliderScreen($widthScreen) {

      if ($widthScreen >= "983") {

          if (openyn == 'y') {

              closeslick();

              openyn = 'n';

          } else {

              closeslick();

              openyn = 'n';

          }

      } else {

          if (openyn == 'n') {

              openslick();

              openyn = 'y';

          }

      }

  };

  // RWD地圖歸位

  function center($widthScreen) {

      if ($widthScreen > "751") {

          $('.service-map-box').css('transform', 'translate(-50%,0)');

      } else {

          mapmove();

      }

  };

  // 關掉slick

  function closeslick() {

      $('.regular').slick('unslick');

  };

  // 啟用slick

  function openslick() {

      $('.regular').slick({

          slide: '.slick-plant',

          dots: false,

          arrows: true,

          autoplay: true,

          infinite: true,

          autoplaySpeed: 2500,

          slidesToShow: 2,

          slidesToScroll: 1,

          prevArrow: '<div class="prev-button icon-circle-left"></div>',

          nextArrow: '<div class="next-button icon-circle-right"></div>',

          responsive: [{

                  breakpoint: 2000,

                  settings: "unslick"

              }, {

                  breakpoint: 1000,

                  settings: {

                      slidesToShow: 2

                  }

              },



              {

                  breakpoint: 700,

                  settings: {

                      slidesToShow: 1

                  }

              },

          ]

      });

  };

  //切換全球區域時更換國家
  function getTitle(){
    var title = $('.service-map-cover li.pick-map').text();
    var titleArray = title.split(", ");
    $('span.service-selected.jq-selectBtn02').text(titleArray[0]);
  }

  $('.service-map-local a').click(function() {

          $('.pick-map').removeClass('pick-map');

          var classname = $(this).attr("class");

          $('.' + classname).addClass('pick-map');

          var str = $(this).text();

          $(".jq-selectBtn01").html(str);

          mapmove();

      });

      $('.service-wrap .jq-selectBox01 li').click(function() {

          $('.pick-map').removeClass('pick-map');

          var classname = $(this).find('a').attr("class");

          $(".jq-selectBtn01").html(classname);

          $('.' + classname).addClass('pick-map');

          mapmove();

          $(".jq-selectBox01").fadeOut(300);

      });



