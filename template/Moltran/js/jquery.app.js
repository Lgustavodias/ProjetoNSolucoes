!function(a){var b=function(){this.$body=a("body");this.$openLeftBtn=a(".open-left");this.$menuItem=a("#sidebar-menu a")};b.prototype.openLeftBar=function(){a("#wrapper").toggleClass("enlarged");a("#wrapper").addClass("forced");a("#wrapper").hasClass("enlarged")&&a("body").hasClass("fixed-left")?a("body").removeClass("fixed-left").addClass("fixed-left-void"):!a("#wrapper").hasClass("enlarged")&&a("body").hasClass("fixed-left-void")&&a("body").removeClass("fixed-left-void").addClass("fixed-left");
a("#wrapper").hasClass("enlarged")?a(".left ul").removeAttr("style"):a(".subdrop").siblings("ul:first").show();toggle_slimscroll(".slimscrollleft");a("body").trigger("resize")};b.prototype.menuItemClick=function(b){a("#wrapper").hasClass("enlarged")||((a(this).parent().hasClass("has_sub")&&b.preventDefault(),a(this).hasClass("subdrop"))?a(this).hasClass("subdrop")&&(a(this).removeClass("subdrop"),a(this).next("ul").slideUp(350),a(".pull-right i",a(this).parent()).removeClass("md-remove").addClass("md-add")):
(a("ul",a(this).parents("ul:first")).slideUp(350),a("a",a(this).parents("ul:first")).removeClass("subdrop"),a("#sidebar-menu .pull-right i").removeClass("md-remove").addClass("md-add"),a(this).next("ul").slideDown(350),a(this).addClass("subdrop"),a(".pull-right i",a(this).parents(".has_sub:last")).removeClass("md-add").addClass("md-remove"),a(".pull-right i",a(this).siblings("ul")).removeClass("md-remove").addClass("md-add")))};b.prototype.init=function(){var b=this;a(".open-left").click(function(a){a.stopPropagation();
b.openLeftBar()});b.$menuItem.on("click",b.menuItemClick);a("#sidebar-menu ul li.has_sub a.active").parents("li:last").children("a:first").addClass("active").trigger("click")};a.Sidemenu=new b;a.Sidemenu.Constructor=b}(window.jQuery);
(function(a){var b=function(){this.$body=a("body");this.$fullscreenBtn=a("#btn-fullscreen")};b.prototype.launchFullscreen=function(a){a.requestFullscreen?a.requestFullscreen():a.mozRequestFullScreen?a.mozRequestFullScreen():a.webkitRequestFullscreen?a.webkitRequestFullscreen():a.msRequestFullscreen&&a.msRequestFullscreen()};b.prototype.exitFullscreen=function(){document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen&&
document.webkitExitFullscreen()};b.prototype.toggle_fullscreen=function(){if(document.fullscreenEnabled||document.mozFullScreenEnabled||document.webkitFullscreenEnabled)document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement||document.msFullscreenElement?this.exitFullscreen():this.launchFullscreen(document.documentElement)};b.prototype.init=function(){var a=this;a.$fullscreenBtn.on("click",function(){a.toggle_fullscreen()})};a.FullScreen=new b;a.FullScreen.Constructor=
b})(window.jQuery);
(function(a){var b=function(){this.$body=a("body");this.$portletIdentifier=".portlet";this.$portletCloser='.portlet a[data-toggle="remove"]';this.$portletRefresher='.portlet a[data-toggle="reload"]'};b.prototype.init=function(){var b=this;a(document).on("click",this.$portletCloser,function(c){c.preventDefault();c=a(this).closest(b.$portletIdentifier);var d=c.parent();c.remove();0==d.children().length&&d.remove()});a(document).on("click",this.$portletRefresher,function(c){c.preventDefault();c=a(this).closest(b.$portletIdentifier);
c.append('<div class="panel-disabled"><div class="loader-1"></div></div>');var d=c.find(".panel-disabled");setTimeout(function(){d.fadeOut("fast",function(){d.remove()})},500+1500*Math.random())})};a.Portlet=new b;a.Portlet.Constructor=b})(window.jQuery);
(function(a){var b=function(){this.VERSION="1.0.0";this.AUTHOR="Coderthemes";this.SUPPORT="coderthemes@gmail.com";this.pageScrollElement="html, body";this.$body=a("body")};b.prototype.initTooltipPlugin=function(){a.fn.tooltip&&a('[data-toggle="tooltip"]').tooltip()};b.prototype.initPopoverPlugin=function(){a.fn.popover&&a('[data-toggle="popover"]').popover()};b.prototype.initNiceScrollPlugin=function(){a.fn.niceScroll&&a(".nicescroll").niceScroll({cursorcolor:"#9d9ea5",cursorborderradius:"0px"})};
b.prototype.initKnob=function(){0<a(".knob").length&&a(".knob").knob()};b.prototype.onDocReady=function(b){FastClick.attach(document.body);resizefunc.push("initscrolls");resizefunc.push("changeptype");a(".animate-number").each(function(){a(this).animateNumbers(a(this).attr("data-value"),!0,parseInt(a(this).attr("data-duration")))});a(window).resize(debounce(resizeitems,100));a("body").trigger("resize");a(".right-bar-toggle").on("click",function(b){b.preventDefault();a("#wrapper").toggleClass("right-bar-enabled")})};
b.prototype.init=function(){this.initTooltipPlugin();this.initPopoverPlugin();this.initNiceScrollPlugin();this.initKnob();a(document).ready(this.onDocReady);a.Portlet.init();a.Sidemenu.init();a.FullScreen.init()};a.MoltranApp=new b;a.MoltranApp.Constructor=b})(window.jQuery);(function(a){a.MoltranApp.init()})(window.jQuery);var toggle_fullscreen=function(){};
function executeFunctionByName(a,b){for(var f=[].slice.call(arguments).splice(2),c=a.split("."),d=c.pop(),e=0;e<c.length;e++)b=b[c[e]];return b[d].apply(this,f)}
var w,h,dw,dh,changeptype=function(){w=$(window).width();h=$(window).height();dw=$(document).width();dh=$(document).height();!0===jQuery.browser.mobile&&$("body").addClass("mobile").removeClass("fixed-left");$("#wrapper").hasClass("forced")||(990<w?($("body").removeClass("smallscreen").addClass("widescreen"),$("#wrapper").removeClass("enlarged")):($("body").removeClass("widescreen").addClass("smallscreen"),$("#wrapper").addClass("enlarged"),$(".left ul").removeAttr("style")),$("#wrapper").hasClass("enlarged")&&
$("body").hasClass("fixed-left")?$("body").removeClass("fixed-left").addClass("fixed-left-void"):!$("#wrapper").hasClass("enlarged")&&$("body").hasClass("fixed-left-void")&&$("body").removeClass("fixed-left-void").addClass("fixed-left"));toggle_slimscroll(".slimscrollleft")},debounce=function(a,b,f){var c,d;return function(){var e=this,g=arguments,k=f&&!c;clearTimeout(c);c=setTimeout(function(){c=null;f||(d=a.apply(e,g))},b);k&&(d=a.apply(e,g));return d}};
function resizeitems(){if($.isArray(resizefunc))for(i=0;i<resizefunc.length;i++)window[resizefunc[i]]()}function initscrolls(){!0!==jQuery.browser.mobile&&($(".slimscroller").slimscroll({height:"auto",size:"5px"}),$(".slimscrollleft").slimScroll({height:"auto",position:"right",size:"5px",color:"#7A868F",wheelStep:5}))}
function toggle_slimscroll(a){$("#wrapper").hasClass("enlarged")?($(a).css("overflow","inherit").parent().css("overflow","inherit"),$(a).siblings(".slimScrollBar").css("visibility","hidden")):($(a).css("overflow","hidden").parent().css("overflow","hidden"),$(a).siblings(".slimScrollBar").css("visibility","visible"))}var wow=new WOW({boxClass:"wow",animateClass:"animated",offset:50,mobile:!1});wow.init();