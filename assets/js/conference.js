(function(){

	var Getconference = function(){
		var _this = this;
		_this.base = $('base').attr('href');
		_this.select_year = $('.revenue-year-select li a');
		_this.table = $('.conference-table tbody');
		_this.getinityear = $('.revenue-year-select li:last-child a').text();
		Getconference.prototype.init = function() {
			_this.getfile();
			// _this.getinit();
		};

		/*get file by year*/
		this.getfile = function( ){
			_this.select_year.click(function( event ){
				$.ajax({
          		  	url: _this.base + '/Activity/getConferFile',
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

		// this.getinit = function( ){
		// 	$(document).ready(function(){

		// 		$.ajax({
  //         		  	url: _this.base + '/Activity/getFile',
  //         		  	data:{year:_this.getinityear},
  //         		  	type: 'get',
  //         		  	error: function (xhr) {
  //         		  	  result = false;
  //         		  	},
  //         		  	success: function (response) {
  //         		  		_this.table.empty();
  //         		  	    _this.table.append(response);
  //         		  	}
  //         		});
		// 	})
		// };

	}

	var handleGetconference = new Getconference();
	handleGetconference.init();

})();