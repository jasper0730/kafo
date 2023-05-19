(function(){
  var getSearch = function(){
    var _this = this;
    _this.searchClick = $(".btn-search");
    _this.searchInput = $(".search-input");
    getSearch.prototype.init = function() {
        _this.search();
    };
   
    //初始化元件抓取
    this.search = function(){
      _this.searchInput.keypress(function(event){
        if ( event.which == 13 ) {
          var key = _this.searchInput.val();
          _this.searchInput.val("");
          location.assign( $('base').attr('href') + '/Product/searchData/' + key );
        }
      });
    }
  }

  var HandleSearch = new getSearch();
  HandleSearch.init();
})();