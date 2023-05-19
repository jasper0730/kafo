(function(){

	var GetBoard = function(){
		var _this = this;
		_this.base = $('base').attr('href');
		_this.select_year = $('.holder-year-select li a');
		_this.select_category = $('.holder-category-select li a');
		_this.select_category_chosen =  $('.holder-category-select li a.chosen');
		_this.select_year_chosen = $('.holder-year-select li a.chosen');
		_this.table = $('.get-file');
		_this.year = "";
		
		GetBoard.prototype.init = function() {
				_this.getBoardFile();
				_this.getBoardFilebyCategory();
		};

		/*get file by year*/
		this.getBoardFile = function( ){
			_this.select_year.click(function(){
				/*刪除全部chosen*/
				$(_this.select_year).removeClass('chosen');
				/*給選擇項目增加chosen*/
				$(this).addClass('chosen');
					var category_id = $('.holder-category-select li a.chosen').attr('id');

				if( $(this).hasClass('all') ){
					_this.year = "all";
				}else{
					_this.year = event.target.innerText;
				}
				
				$.ajax({
          		  	url: _this.base + '/board/getFile_year',
          		  	data:{
          		  			year:_this.year,
          		  			category:category_id,
          		  		},
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

		/*get file by category*/
		this.getBoardFilebyCategory = function( ){
			_this.select_category.click(function(){
			/*刪除全部chosen*/
			$(_this.select_category).removeClass('chosen');
			/*給選擇項目增加chosen*/
			$(this).addClass('chosen');

			_this.select_year_chosen = $('.holder-year-select li a.chosen');

			if(!$(_this.select_year_chosen).hasClass('all')){
				_this.year = $(_this.select_year_chosen).text();
			}else{
				_this.year = "all";
			}

			console.log($(this).attr("id"));
				$.ajax({
          		  	url: _this.base + '/board/getFile_category',
          		  	data:{
          		  		year : _this.year,
          		  		category : $(this).attr("id")
          		  	},
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

	var handleGetBoard = new GetBoard();
	handleGetBoard.init();

})();