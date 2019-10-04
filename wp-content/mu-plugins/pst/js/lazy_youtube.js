!function() {
	var w = window;
	var d = document;
	var x = _wexal_pst;
	if ( 'pc' == x.ua ) {
		var p = x.lazy_youtube.pc;
	} else {
		var p = x.lazy_youtube.mobile;	
	}
	var f = function(){
		var y = d.getElementsByClassName( 'youtube' );
		for (var i=0; i< y.length; i++) {
			var f = y[ i ].children;
			f = f[0];
			var url = f.getAttribute('data-src');
			var w = f.getAttribute('width');
			var h = f.getAttribute('height');
			var id = url.match(/[\/?=]([a-zA-Z0-9_-]{11})[&\?]?/)[1];
			var elm = d.createElement('img');
			elm.width = w;
			elm.height = h;
			elm.src = 'https://img.youtube.com/vi/'+id+'/'+p+'default.jpg';
			var pa = y[i];
			pa.insertBefore( elm, f );
			pa.removeChild( f);
			pa.addEventListener('click', function() {
				elm = d.createElement('iframe');
				elm.src = 'https://www.youtube.com/embed/'+id+'?feature=oembed&autoplay=1&muted=1&playlist='+id;
				elm.frameborder = '0';
				elm.allow = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
				elm.setAttribute( 'allowfullscreen', '' );
				var div = d.createElement('div');
				div.setAttribute( 'class', 'youtube' );
				div.appendChild( elm );
//				console.log( url, w, h, id, i, div );
				pa.parentElement.insertBefore( div, pa.nextSibling );
				pa.parentElement.removeChild( pa );
			});
		};
	};

	if ( 'loading' != d.readyState ) {
		f();
	} else {
		addEventListener( 'load', f );
	}

}();

