// aOverrides is called from aUI()
// This helps for things like Cufon that need to be setup again after an AJAX call
function aOverrides()
{

}

$(document).ready(function() {
	$(".a-nav-main .a-nav-item").hover(function(e){
		e.preventDefault();
		$(this).stop().animate({ 
	    backgroundColor: "#ccc"
	  }, 125 );
	},function(e){
		e.preventDefault();
		$(this).stop().animate({ 
	    backgroundColor: "#efefef"
	  }, 250 );		
	});
});
