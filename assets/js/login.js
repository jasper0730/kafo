(function() {

	var handleLogin = function(){
		var _this = this;
			// _this._token = document.querySelector("input[name='_token']").value;
			_this.send = document.querySelector("input[class='btn-gray03 loginSend']");
			_this._input = document.querySelectorAll("input[class='fontM box-login-input']");
			_this._verify = document.querySelector("input[class='box-login-code']");
			_this.form = document.getElementById("Login");

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
	                        notFilled.push( input.getAttribute("name") );
	                    }
	                });

	            if( _this._verify.value == '' ) 
	            {
	            	notFilled.push( _this._verify.getAttribute("data-info") );
	            }
	           
	            if( notFilled.length != 0 )
	            {	/*回傳訊息 或 顯示未填選的項目提示字*/
	            	alert( notFilled+" is empty");
	            }
	            else
	            {	/*送出表單*/
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

					// 20230103 justin
					console.log(data.fileRoute);
					if(typeof(data.fileRoute) != "undefined" && data.fileRoute !== null){
						window.location.href = $('base').attr('href') + '/support/manual/' +  data.fileRoute;
					}
					else{
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
							document.querySelector('.box-code').click();
							_this.send.classList.remove('clicked');
							_this.send.textContent = btnOriginText;
							inputCapcha = document.querySelector('input[name="captcha"]');
							inputCapcha.value = '';
							inputCapcha.focus();
						}
					}

				}
			}
			xhttp.open("POST", ajaxUrl);
			xhttp.send( new FormData(formWithData) );
		};

		/*驗證碼點擊更換*/
		_this.changeCaptcha = function() {

			var cap = document.querySelector('.box-code');
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
