/* jQuery SmoothScroll */ (function(){function c(){var e=false;if(e){N("keydown",y)}if(t.keyboardSupport&&!e){T("keydown",y)}}function h(){if(!document.body)return;var e=document.body;var i=document.documentElement;var a=window.innerHeight;var f=e.scrollHeight;o=document.compatMode.indexOf("CSS")>=0?i:e;u=e;c();s=true;if(top!=self){r=true}else if(f>a&&(e.offsetHeight<=a||i.offsetHeight<=a)){i.style.height="auto";setTimeout(refresh,10);if(o.offsetHeight<=a){var l=document.createElement("div");l.style.clear="both";e.appendChild(l)}}if(!t.fixedBackground&&!n){e.style.backgroundAttachment="scroll";i.style.backgroundAttachment="scroll"}}function m(e,n,r,i){i||(i=1e3);k(n,r);if(t.accelerationMax!=1){var s=+(new Date);var o=s-v;if(o<t.accelerationDelta){var u=(1+30/o)/2;if(u>1){u=Math.min(u,t.accelerationMax);n*=u;r*=u}}v=+(new Date)}p.push({x:n,y:r,lastX:n<0?.99:-.99,lastY:r<0?.99:-.99,start:+(new Date)});if(d){return}var a=e===document.body;var f=function(s){var o=+(new Date);var u=0;var l=0;for(var c=0;c<p.length;c++){var h=p[c];var v=o-h.start;var m=v>=t.animationTime;var g=m?1:v/t.animationTime;if(t.pulseAlgorithm){g=D(g)}var y=h.x*g-h.lastX>>0;var b=h.y*g-h.lastY>>0;u+=y;l+=b;h.lastX+=y;h.lastY+=b;if(m){p.splice(c,1);c--}}if(a){window.scrollBy(u,l)}else{if(u)e.scrollLeft+=u;if(l)e.scrollTop+=l}if(!n&&!r){p=[]}if(p.length){M(f,e,i/t.frameRate+1)}else{d=false}};M(f,e,0);d=true}function g(e){if(!s){h()}var n=e.target;var r=x(n);if(!r||e.defaultPrevented||C(u,"embed")||C(n,"embed")&&/\.pdf/i.test(n.src)){return true}var i=e.wheelDeltaX||0;var o=e.wheelDeltaY||0;if(!i&&!o){o=e.wheelDelta||0}if(!t.touchpadSupport&&A(o)){return true}if(Math.abs(i)>1.2){i*=t.stepSize/120}if(Math.abs(o)>1.2){o*=t.stepSize/120}m(r,-i,-o);e.preventDefault()}function y(e){var n=e.target;var r=e.ctrlKey||e.altKey||e.metaKey||e.shiftKey&&e.keyCode!==l.spacebar;if(/input|textarea|select|embed/i.test(n.nodeName)||n.isContentEditable||e.defaultPrevented||r){return true}if(C(n,"button")&&e.keyCode===l.spacebar){return true}var i,s=0,o=0;var a=x(u);var f=a.clientHeight;if(a==document.body){f=window.innerHeight}switch(e.keyCode){case l.up:o=-t.arrowScroll;break;case l.down:o=t.arrowScroll;break;case l.spacebar:i=e.shiftKey?1:-1;o=-i*f*.9;break;case l.pageup:o=-f*.9;break;case l.pagedown:o=f*.9;break;case l.home:o=-a.scrollTop;break;case l.end:var c=a.scrollHeight-a.scrollTop-f;o=c>0?c+10:0;break;case l.left:s=-t.arrowScroll;break;case l.right:s=t.arrowScroll;break;default:return true}m(a,s,o);e.preventDefault()}function b(e){u=e.target}function S(e,t){for(var n=e.length;n--;)w[E(e[n])]=t;return t}function x(e){var t=[];var n=o.scrollHeight;do{var i=w[E(e)];if(i){return S(t,i)}t.push(e);if(n===e.scrollHeight){if(!r||o.clientHeight+10<n){return S(t,document.body)}}else if(e.clientHeight+10<e.scrollHeight){overflow=getComputedStyle(e,"").getPropertyValue("overflow-y");if(overflow==="scroll"||overflow==="auto"){return S(t,e)}}}while(e=e.parentNode)}function T(e,t,n){window.addEventListener(e,t,n||false)}function N(e,t,n){window.removeEventListener(e,t,n||false)}function C(e,t){return(e.nodeName||"").toLowerCase()===t.toLowerCase()}function k(e,t){e=e>0?1:-1;t=t>0?1:-1;if(i.x!==e||i.y!==t){i.x=e;i.y=t;p=[];v=0}}function A(e){if(!e)return;e=Math.abs(e);f.push(e);f.shift();clearTimeout(L);var t=f[0]==f[1]&&f[1]==f[2];var n=O(f[0],120)&&O(f[1],120)&&O(f[2],120);return!(t||n)}function O(e,t){return Math.floor(e/t)==e/t}function _(e){var n,r,i;e=e*t.pulseScale;if(e<1){n=e-(1-Math.exp(-e))}else{r=Math.exp(-1);e-=1;i=1-Math.exp(-e);n=r+i*(1-r)}return n*t.pulseNormalize}function D(e){if(e>=1)return 1;if(e<=0)return 0;if(t.pulseNormalize==1){t.pulseNormalize/=_(1)}return _(e)}var e={frameRate:150,animationTime:400,stepSize:120,pulseAlgorithm:true,pulseScale:8,pulseNormalize:1,accelerationDelta:20,accelerationMax:1,keyboardSupport:true,arrowScroll:50,touchpadSupport:true,fixedBackground:true,excluded:""};var t=e;var n=false;var r=false;var i={x:0,y:0};var s=false;var o=document.documentElement;var u;var a;var f=[120,120,120];var l={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36};var t=e;var p=[];var d=false;var v=+(new Date);var w={};setInterval(function(){w={}},10*1e3);var E=function(){var e=0;return function(t){return t.uniqueID||(t.uniqueID=e++)}}();var L;var M=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||function(e,t,n){window.setTimeout(e,n||1e3/60)}}();var P=/chrome/i.test(window.navigator.userAgent);var H="onmousewheel"in document;if(H&&P){T("mousedown",b);T("mousewheel",g);T("load",h)}})();

///////////////////////////////////////////////////////////
// Load Google Font ASYNCHRONOUSLY with Web Font Loader //
///////////////////////////////////////////////////////////
WebFontConfig = {
  	google: { families: [ 'Noto+Sans:400,700:latin' ] }
};
(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' === document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();


$(function() {
	///////////
	// MMenu //
	///////////
	jQuery( '#blect-mmenu' ).mmenu({
		offCanvas: {
           	position  : "right",
           	zposition : "front"
        }
	});


	/////////////////////
	// Related Module //
	/////////////////////
	var $related = jQuery('#related.floating');
	var $relatedCloseBtn = jQuery('#related .close');
	var $content = jQuery('#content');
	var $contentOffset = $content.offset();
	//console.log($contentOffset.top);
	if( window.innerWidth < 992 ){
		setRelatedToStatic();
	}
	
	$relatedCloseBtn.on( 'click', closeRelated );
	function setRelatedToStatic(){
		$related.removeClass( 'floating' ).addClass( 'static' );
	}
	function setRelatedToFloating(){
		$related.addClass( 'floating' ).removeClass( 'static' );
	}
	function openRelated(){
		if( ! $related.hasClass('floating')) return;
		//console.log('open now');
		$related.removeClass('away');
	}
	function hideRelated(){
		if( ! $related.hasClass('floating')) return;
		//console.log('hide now');
		$related.addClass('away');
	}
	function closeRelated(){
		if( ! $related.hasClass('floating')) return;
		//console.log('close now');
		$related.fadeOut( 400, function(){ 
			$related.addClass('away static noMoreFloating').removeClass('floating').slideDown();
		});
	}

	//////////////////////////////////
	// Bootstrap 3rd level dropdown //
	//////////////////////////////////
	$(".dropdown-menu > li > a").on("click",function(e){
		var current		=	$(this).next();
		var $parent 		=	$(this).parent()
		var $grandparent =	$(this).parent().parent();

		$parent.toggleClass('open');

		$grandparent.find('.open').not($parent).toggleClass('open')
		e.stopPropagation();
	});
	$("li.dropdown > a").not('li.dropdown li.dropdown > a').on("click",function(){
		var root=$(this).find('.dropdown');
		root.find('.sub-menu:visible').hide();
	});


	//////////////////
	// EventListen //
	//////////////////
	window.addEventListener('scroll', windowScrolling, false);
	function windowScrolling( e ){
		//console.log( window.pageYOffset );
		/**
		 * Related Module
		 */
		if( $related.hasClass('floating')){
			if( window.pageYOffset > $contentOffset.top ){
				//console.log('bingo');
				openRelated();
			}else{
				hideRelated();
			}
		}
	}
	$(window).resize( function(){
		if( window.innerWidth < 992 ){
			setRelatedToStatic();
		}else{
			if( ! $related.hasClass( 'noMoreFloating' ) ){
				setRelatedToFloating();
			}
		}
	});

	////////////////////////////
	// #masthead parallaxing //
	////////////////////////////
	// var $masthead = jQuery( '#masthead' );
	// var $masthead_height = $masthead.outerHeight();


	// window.addEventListener('scroll', parallaxing, false);

	// function parallaxing( e ){
	// 	if ( window.pageYOffset <= $masthead_height ){
	// 		console.log ( (  50 - window.pageYOffset / $masthead_height * 100 ) ) );
	// 		$masthead.css( 'background-position', 'center ' + ( 50 - window.pageYOffset / $masthead_height * 100 ) + '%' );
	// 	}
	// }

});