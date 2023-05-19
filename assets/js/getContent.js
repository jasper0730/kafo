(function(){

	var GetContent = function(){
		var _this = this;
		_this.base = $('base').attr('href');
		_this.select_year = $('.get-content-year li a');
		_this.table = $('.director-info');
		_this.getinityear = $('.get-content-year li:last-child a').text();
		GetContent.prototype.init = function() {
			_this.getContent();
			_this.getinit();
		};

		/*get file by year*/
		this.getContent = function( ){
			_this.select_year.click(function( event ){
				$.ajax({
          		  	url: _this.base + '/Policy/getContent',
          		  	data:{year:event.target.innerText},
          		  	type: 'get',
          		  	error: function (xhr) {
          		  	  result = false;
          		  	},
          		  	success: function (response) {
          		  		_this.table.empty();
          		  	    _this.table.append(response);
          		  	}
          		});
			});
		};

		this.getinit = function( ){
			$(document).ready(function(){

				$.ajax({
          		  	url: _this.base + '/Policy/getContent',
          		  	data:{year:_this.getinityear},
          		  	type: 'get',
          		  	error: function (xhr) {
          		  	  result = false;
          		  	},
          		  	success: function (response) {
          		  		_this.table.empty();
          		  	    _this.table.append(response);
          		  	}
          		});
			})
		};

	}

	var handleGetContent = new GetContent();
	handleGetContent.init();

})();