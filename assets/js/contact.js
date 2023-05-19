$(document).ready( function(){
  //動畫
  $('.contact-banner').waypoint(function() {
    $('.banner-txt01').addClass('animated-slow fadeInUp');
    $('.banner-txt02').addClass('delay-05s animated-slow fadeInUp');
    }, {
    offset: '80%'
  });
  $('.contact02').waypoint(function() {
    $('.company-box').addClass('animated-slow fadeIn');
    $('.map-join').addClass('delay-10s animated-slow fadeIn');
    $('.contact-us').addClass('delay-20s animated-slow fadeIn');
    }, {
    offset: '80%'
  });

  //畫面準備好時載入
  company_carousel();
  dropdown();

  //畫面更換size時載入
  $(window).resize(function(){
  });

  // 輪播
  function company_carousel(){
    $('.company-inner').slick({
      slide: '.company-info',
      arrows: true,
      autoplay: true,
      infinite: true,
      autoplaySpeed: 1500,
      slidesToShow: 3,
      slidesToScroll: 1,
      prevArrow: '<div class="prev-button icon-circle-left"></div>',
      nextArrow: '<div class="next-button icon-circle-right"></div>',
      responsive: [
      {
        breakpoint: 872,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 656,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
    });
  }

  function dropdown(){
    //下拉選單
    //下拉選單的收與放
    $('.contact-dropdown li').hide();
    /*打開下拉選單*/
    $('.contact-dropdown').click(function(){
      $(this).toggleClass('open');
      $('.contact-dropdown>li').slideToggle();
    });
    /*收起下拉選單*/
    $(document).click(function(e){
      if(!$('.contact-dropdown').is(e.target) && $('.contact-dropdown').has(e.target).length === 0){
        $('.contact-dropdown>li').slideUp();
        $('.contact-dropdown').removeClass('open');
      }
    });
    //下拉選單點擊後的文字更換
    $('.contact-dropdown li a').on('click',function(){
      var tt = $(this).text();
      $('.contact-dropdown span').addClass('clicked');
      $('.contact-dropdown input').val(tt);
      $('.contact-dropdown span').text(tt);
    });
  }


});

(function() {

  var handleLogin = function(){
    var _this = this;
      // _this._token = document.querySelector("input[name='_token']").value;
      _this.send = document.querySelector("input[class='contact-send']");
      _this._input = document.querySelectorAll("input[class='contact-input']");
      _this._comments = document.querySelector(".comments textarea");
      _this._subject = document.querySelector(".subject .for-change");
      _this.form = document.getElementById("formsend");

    handleLogin.prototype.init = function() {

      _this.submitAndCheckInputs();
      _this.changeCaptcha();
      //_this.clearForm();
    };

    this.submitAndCheckInputs = function(){
      _this.send.addEventListener("click",function(){
        /*避免重複一直按*/
              if( this.className.indexOf('clicked') > -1 )
              {
                return false;
              }

              var notFilled = [],//未填寫的項目
                  radioName = '';
              

              [].slice.call( _this._input ).forEach( function(input) {
                      if( input.value == '' ) //input[text]
                      {
                        if(input.getAttribute("name") != "Company" && input.getAttribute("name") != "fax"){

                          notFilled.push( input.getAttribute("name") );
                        }
                       
                      }
                  });
              if(_this._comments.value == "")
              {
                notFilled.push( _this._comments.getAttribute("name") );
              }
              if( !($(".subject .for-change").hasClass('clicked')) )
              { 
                notFilled.push( "Subject" );
              }
             
              if( notFilled.length != 0 )
              { /*回傳訊息 或 顯示未填選的項目提示字*/
                alert( notFilled+" is empty");
              }
              else
              { /*送出表單*/
                _this.submitForm();
              }

      });
    };

    _this.submitForm = function() {

        var btnOriginText = _this.send.textContent;
        

        this.send.classList.add('clicked');//避免重複點擊發送
        this.send.textContent = "LOADING...";
        var formWithData = _this.form;
          var ajaxUrl = formWithData.getAttribute('action');
          //AJAX送出表單
          var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if( xhttp.readyState == 4 && xhttp.status == 200 )
        {
          var data = JSON.parse( xhttp.responseText );

          //回傳訊息
          alert( data.message );

          //表單清除
          if( data.formPass === true )
          {
            //formWithData.reset();
            //_this.send.textContent = btnOriginText;
            location.reload();
          }
          else
          {
            //重填驗證碼
            document.querySelector('.cap').click();
            _this.send.classList.remove('clicked');
            _this.send.textContent = btnOriginText;
            inputCapcha = document.querySelector('.cap');
            inputCapcha.value = '';
            inputCapcha.focus();
          }

        }
      }
      xhttp.open("POST", ajaxUrl);
      xhttp.send( new FormData(formWithData) );
    };

    /*驗證碼點擊更換*/
    _this.changeCaptcha = function() {

      var cap = document.querySelector('.cap');
      cap.addEventListener("click", function () {

          var d = new Date(),
              img = this.childNodes[0];

          img.src = img.src.split('?')[0] + '?t=' + d.getMilliseconds();

      });

    };
  }

  var handleLoginInstance = new handleLogin();
  handleLoginInstance.init();


})();

