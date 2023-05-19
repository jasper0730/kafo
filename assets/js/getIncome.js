(function(){

	var GetIncome = function(){
		var _this = this;
		_this.base = $('base').attr('href');
		_this.select = $('.revenue-year-select li a');
		_this.table = $('.Income-year-month');
		_this.inityear = $('.get-year li:first-child').text();

		GetIncome.prototype.init = function() {
				_this.getIncome();
				_this.getinit();
		};

		/*剛進入頁面時 還未點任何年度*/
		this.getinit = function( ){
			_this.select.ready(function( ){
				$.ajax({
          		  	url: _this.base + '/financal/getIncome',
          		  	data:{year:_this.inityear},
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

		this.getIncome = function( ){
			_this.select.click(function( event ){
				$.ajax({
          		  	url: _this.base + '/financal/getIncome',
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
	}

	var handleGetIncome = new GetIncome();
	handleGetIncome.init();

})();