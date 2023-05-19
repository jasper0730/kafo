(function(){

	var Share =  function(){

	var _this = this;
	_this.href = $('base').attr('href');

	_this.icon = $('.community li a');

	Share.prototype.init = function() {
				_this.sharePage();
	};

	this.sharePage = function (){
		
			$(_this.icon).click(function( event ){
				var shareType = event.target.parentNode.className;
				switch(shareType){
					case 'icon-f':
							window.open('http://www.facebook.com/sharer/sharer.php?u='+_this.href);
							break;

					case 'icon-t':
							window.open('http://twitter.com/home/?status='+_this.href);
							break;

					// case 'icon-y':
					// 		window.open('http://www.facebook.com/sharer/sharer.php?u='+_this.href);
					// 		break;
				}
			});
	}


	

	}

	var handleShare = new Share();
	handleShare.init();
	
})();