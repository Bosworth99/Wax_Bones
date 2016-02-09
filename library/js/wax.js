var Wax = window.Wax || {};

jQuery(document).ready(function() {
	Wax.Core.init();
});

Wax.Core = (function($){
	var nav;
	var srvmsg;

	function init($){
		//console.log('Wax.Core::init');
	
		ubiquitous();
		bits();
		responsive();
	}

	function ubiquitous(){
		nav = new Wax.Navigation($);
		nav.init();

		srvmsg = new Wax.ServerMessage($);
	}

	function bits(){
		if (Modernizr.input.placeholder) {
			$('.modern-label').hide();
		}

		$('#lifter').on({
			click : function(){
				$('html, body').animate({
				    scrollTop: $("#page-wrapper").offset().top
				}, 2000);
			}
		});
	}

	function responsive(){
		var responsive_viewport = $(window).width();

		if (responsive_viewport < 481) {}
		if (responsive_viewport > 481) {}
		if (responsive_viewport < 768) {} 
		if (responsive_viewport >= 768) {
		
			/* load gravatars */
			$('.comment img[data-gravatar]').each(function(){
				$(this).attr('src',$(this).attr('data-gravatar'));
			});
			
		}
		
		if (responsive_viewport > 1040) {}
	}

	return {
		init:init
	}

})(jQuery);

/*
*	Control navigation ui between states
*/
Wax.Navigation = function($){

	var ROOT;
	var _win;
	var _body;
	var _header;
	var _brand;
	var _logo;
	var _nav;
	var _click;
	var _actions;

	var _isTop;
	var _isTopNavActive;
	var _isMobile;
	var _isMobileNavActive;

	/* INIT +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	function init(){
		//console.log('Wax.Navigation::init');
		_win 			= $(window);
		_body			= $('body');
		_header 		= $('#inner-header');
		_brand		 	= $('#header-branding');
		_logo		 	= $('#header-branding img.desktop');
		_nav 			= $('#header-nav');
		_actions  		= $('#header-actions');
		_click 			= _actions.find('.reveal');

		_isTop				= false;
		_isTopNavActive		= false;
		_isMobile 			= false;
		_isMobileNavActive	= false;

		initCSS();
		addEventHandlers();

		checkDimensions();
	}

	function initCSS(){
		_actions.hide();
	}

	/* EVENTS +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	function addEventHandlers(){
		_win.on({
			'resize' : function(){
				checkDimensions();
			},
			'scroll' : function(){
				checkDimensions();
			},
			'orientationchange' : function(){
				checkDimensions();
			}
		});

		_click.on({
			'click' : function(){
				if(!_isMobileNavActive){
					activateMobileNav();
					_isMobileNavActive = true;
				} else {
					deactivateMobileNav();
					_isMobileNavActive = false;
				}				
			}
		});
	}

	/* BEHAVIORS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	function checkDimensions(){
		checkForMobile();
		if(!_isMobile){
			checkForTop();
		}
	}

	function checkForMobile(){
		var w 	= _win.width();
		if (w < 748){
			if(!_isMobile){
				_isMobile 			= true;
				_isMobileNavActive 	= false;
				doMobileState();
			}
			if( _isMobileNavActive){
				setMobileNavHeight();
			}			
		} else {
			if(_isMobile){
				_isMobile 			= false;
				_isMobileNavActive 	= false;
				doDesktopState();
			}
		}
	}

	function checkForTop(){
		var st 	= _win.scrollTop();
		if (st < 40){
			if(!_isTop){
				_isTop = true;
				doFullHeader(st);
			}
		} else {
			if(_isTop){
				_isTop = false;
				doNarrowHeader();
			}
		}
	}

	/* DESKTOP ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	// set state to desktop
	function doDesktopState(){
		_actions.hide();
		_nav.css({'left':'0','height':''}).addClass('desktop').removeClass('mobile');

		if(_isMobileNavActive){
			_body.removeClass('modal');	
			_click.find('i').removeClass('iconic-x').addClass('icon-align-justify');
		}

		if (_win.scrollTop() < 40){
			_isTop = true;
			_isTopNavActive = false;
			doFullHeader();
		} else {
			_isTop = false;
			_isTopNavActive = true;
			doNarrowHeader();
		}
	}

	// if we're at the top, reveal the full header
	function doFullHeader(st){
		if (!_isTopNavActive){
			_isTopNavActive = true;
			_header.stop().animate({'top':'0'},50);
			_brand.stop().animate({'top':'12px'},50);
			_logo.stop().animate({'width':'300px'},50);
			//_header.css({'top':'0'});
			//_brand.css({'top':'-12px'});
		}
	}

	// if we're not, show the narrow header
	function doNarrowHeader(){
		if (_isTopNavActive){
			_isTopNavActive = false;
			_header.stop().animate({'top':'-30px'},350);
			_brand.stop().animate({'top':'30px'},350);
			_logo.stop().animate({'width':'250px'},350);
			//_header.css({'top':'-30px'});
			//_brand.css({'top':'0'});
		}
	}

	/* MOBILE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	// set state to mobile
	function doMobileState(){
		_actions.show();
		_header.css('top',0);
		_nav.css('left','-100%').addClass('mobile').removeClass('desktop');
	}

	// match the offset from the _base.lss sheet
	function setMobileNavHeight(){
		_nav.height(_win.height()-52);
	}

	// open the mobile nav
	function activateMobileNav(){
		setMobileNavHeight();
		_nav.stop().animate({'left':'0'},750);
		_body.addClass('modal');
		_click.find('i').addClass('iconic-x').removeClass('icon-align-justify');
	}

	// close the mobile nav
	function deactivateMobileNav(){
		_nav.stop().animate({'left':'-100%'},250);
		_body.removeClass('modal');
		_click.find('i').removeClass('iconic-x').addClass('icon-align-justify');	
	}

	/* EXPORTS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	return {
		init:init
	}
};

/*
*	Detail popup activation and control
*/
Wax.Portfolio = function($){


	function init(){
		//console.log('Wax.Portfolio::init');
	}

	init();
	return true;
};

/*
*	Detail popup activation and control
*/
Wax.Features = function($, data){

	var _data;
	var _hovers;
	var _fixed;
	var _detail;

	function init(){
		//console.log('Wax.Features::init');

		_data 		= data;
		_fixed 		= $('#page-content');
		_hovers 	= $('.info-hover');

		assembleElements();
		addEventHandlers();
		initCSS();
	}

	function assembleElements(){
		_detail 	= $( makeDetail() );
		_fixed.before(_detail);
	}

	function addEventHandlers(){
		_hovers.on({
			'mouseenter' : function(){
				var item = $(this);
				//console.log( 'title : ', item.data('title') );

				updateDetail({
					'title' : item.data('title')
				});
			},
			'mouseleave' : function(){
				hideDetail();
			}
		});

		_detail.on({
			'click' : function(){
				hideDetail();
			}
		});
	}

	function initCSS(){
		_detail.hide();
	}

	function hideDetail(){
		_detail.fadeOut('fast');
	}

	function updateDetail(obj){

		var el 		= _fixed.find('[data-title="'+obj.title+'"]');
		var text 	= filterData(obj.title);
		var offset 	= el.offset();

		//console.log(obj,text,offset);

		_detail.find('.title').text(text.title);
		_detail.find('.content').text(text.content);

		_detail.css({
			'top' 	: offset.top - 20,
			'left' 	: offset.left - _detail.width() - 60
		});

		_detail.show()
	}

	function filterData(term){
		//console.log(term, data);

		for (var key in _data){
			if (key == term){
				//console.log('found term', key, _data[key]);
				return _data[key];
			}
		}
		return _data.nodata;
	}

	// templates
	function makeDetail(){
		var str = '';
		str += 	'<div id="feature-detail" class="feature-detail">';
		str += 		'<h4 class="title">Default Title</h4>';
		str += 		'<p class="content">Default Content</p>';
		str += 		'<span class="triangle"></span>';
		//str += 		'<span class="close"></span>';
		str +=  '</div>';
		return str;
	}

	init();
	return true;
};

/*
*	Handle server messages
*/
Wax.ServerMessage = function($){ 

	var _srvmsg;
	var _formtype;
	var _formsuccess;

	function init(){
		console.log('ServerMessage::init()');

		_srvmsg 		= $('#server-message');
		_formtype 		= getURLParameter('formtype');
		_formsuccess 	= getURLParameter('formsuccess');

		//console.log('_formtype: %s, _formsuccess : %s',_formtype, _formsuccess);

		if ( _formtype != "null" && _formtype != null ){

			_srvmsg.css('height','0').delay(500).animate({'height':'40px'},500);
			_srvmsg.find('.wrap').empty().append( makeMessage(_formtype, _formsuccess) );
			
			addEventHandlers();
		} else{
			_srvmsg.remove();
		}
	}

	function addEventHandlers(){
		_srvmsg.on({
			'click' : function(){
				_srvmsg.animate({'height':0},500,function(){
					_srvmsg.remove(); 
				});
			}
		});

		if ( _formsuccess ){
			startTimer();
		}

	}

	function startTimer(){
		window.setTimeout(function(){
			_srvmsg.trigger('click');
		},8000);
	}

	var _messages = {
		'email_subscribe' : {
			's' : 'Thank you for your interest.',
			'e' : 'Unfortunately, something has gone wrong. Please check the form for errors, or give us a call at 855-780-1081.'
		},
		'lead_generation' : {
			's' : 'Thank you for your interest. We\'ll be in touch shortly.',
			'e' : 'Unfortunately, something has gone wrong. Please check the form for errors, or give us a call at 855-780-1081.'
		},
		'general_inquiry' : {
			's' : 'Thank you for your interest, we\'ll be in touch shortly',
			'e' : 'Unfortunately, something has gone wrong. Please check the form for errors, or give us a call at 855-780-1081.'
		},
		'sales_support' : {
			's' : 'Thank you for your interest in our services. We\'ll be in touch shortly to get you started.',
			'e' : 'Unfortunately, something has gone wrong. Please check the form for errors, or give us a call at 855-780-1081.'
		},
		'tech_support' : {
			's' : 'Your request has been received. Please check your email for confirmation. Thank you!',
			'e' : 'Unfortunately, something has gone wrong. Please check the form for errors, or give us a call at 855-780-1081.'
		},
		'billing_support' : {
			's' : 'Your request has been received. Please check your email for confirmation. Thank you!',
			'e' : 'Unfortunately, something has gone wrong. Please check the form for errors, or give us a call at 855-780-1081.'
		}
	}

	function makeMessage(type, success){
		var css = (success == 'true')?'success':'error';
		var str = '';
		str += 	'<div class="message '+css+'">';
		str +=  	_messages[type][(success == 'true')?'s':'e'];
		str += 		'<span class="close iconic-x">&nbsp;</span>';
		str += 	'</div>';
		return str;
	}

	function getURLParameter(name) {
		return decodeURI(
		    (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
		);
	}

	init();
	return true;

};


/*
*	validation controller
*/
Wax.Validate = function($, type){

	var _window;
	var _type;
	var _wrapper;
	var _form;
	var _submit;
	var _actions;
	var _human;
	var _sticky;
	var _token;
	var _captcha;

	var _messages = {
		'minLength'       	: 'Too few characters!',
		'maxLength'       	: 'Too many characters!',
		'email'           	: 'you@domain.com',
		'phone'           	: '(555)-555-5555',
		'url'				: 'http://www.somedomain.com',
		'letterswithbasicpunc' : 'May contain only letters and punctuation.',
		'streetAddress'   	: 'Street address, please.',
		'malicious'       	: 'No special characters!',
		'cb_selectone'    	: 'Please select at least one option',
		'human'				: 'Gotta be a human!'
	};

	var _rules = {

		// /consultation-request - #request-consultation
		'request-consultation' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				phone 	: {
					required 	: false,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},			
				message : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 1000,
					laxmalicious: true
				},
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				phone 	: {
					required 	: 'Phone is required!',
					malicious 	: _messages.malicious
				},	
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},
				message : {
					required	: 'A message is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				human : {
					required  	: _messages.human
				}
			}
		}, 

		// /home - #home-request-consultation
		'home-request-consultation' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				phone 	: {
					required 	: true,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},
				domain 	: {
					required 	: false,
					maxlength 	: 90
				},				
				message : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 1000,
					laxmalicious: true
				},
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				phone 	: {
					required 	: 'Phone is required!',
					malicious 	: _messages.malicious
				},	
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},
				domain	:{
					maxlength 	: _messages.maxLength,
				},
				message : {
					required	: 'A message is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				human : {
					required  	: _messages.human
				}
			}
		}, 

		// /contact-us - #contact-us-form
		'contact-us-form' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},				
				phone 	: {
					required 	: false,
					malicious 	: true
				},
				domain 	: {
					required 	: false,
					laxmalicious: true
				},	
				subject : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},							
				message : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 1000,
					laxmalicious: true
				},
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},				
				phone 	: {
					malicious 	: _messages.malicious
				},			
				domain	:{
					laxmalicious: _messages.malicious
				},
				subject : {
					required 	: 'Subject is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},				
				message : {
					required 	: 'Message is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				human : {
					required  	: _messages.human
				}
			}
		},

		// /support - #support-form
		'support-form' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},				
				phone 	: {
					required 	: false,
					malicious 	: true
				},
				domain 	: {
					required 	: true,
					laxmalicious: true
				},	
				subject : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},							
				message : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 1000,
					malicious 	: true
				},
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},				
				phone 	: {
					malicious 	: _messages.malicious
				},			
				domain	:{
					required  	: 'Domain is required!',					
					laxmalicious: _messages.malicious
				},
				subject : {
					required 	: 'Subject is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},				
				message : {
					required 	: 'Message is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				human : {
					required  	: _messages.human
				}
			}
		},

		// /getting-started - #getting-started-form
		'getting-started-form' : {
			rules 	: {
				firstname 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				lastname 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				primaryemail 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},

				domain 	: {
					required 	: false,
					laxmalicious: true
				},	

				practicename 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 150,
					laxmalicious: true
				},
				phone 	: {
					required 	: false,
					malicious 	: true
				},
				billingemail 	: {
					required 	: false,
					email 	 	: true,
					maxlength 	: 90
				},
				address1 	: {
					required 	: false,
					maxlength 	: 90,
					laxmalicious: true
				},
				address2 	: {
					required 	: false,
					maxlength 	: 90,
					laxmalicious: true
				},
				city 	: {
					required 	: false,
					maxlength 	: 90,
					laxmalicious: true
				},
				postalcode 	: {
					required 	: false,
					laxmalicious: true
				},
				country 	: {
					required 	: false,
					laxmalicious: true
				},
				message : {
					required 	: false,
					minlength 	: 2,
					maxlength 	: 1000,
					laxmalicious: true
				},

				human : {
					required 	: false
				}
			},
			messages : {
				firstname 	: {
					required 	: 'First Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				lastname 	: {
					required 	: 'Last Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				primaryemail 	: {
					required  	: 'Email Address is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},	

				domain	:{				
					laxmalicious: _messages.malicious
				},

				practicename 	: {
					required 	: 'Firm Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				phone 	: {
					malicious 	: _messages.malicious
				},	
				billingemail 	: {
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},	
				address1	: {				
					laxmalicious: _messages.malicious
				},
				address2	: {				
					laxmalicious: _messages.malicious
				},
				city 	: {
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				postalcode 	: {
					laxmalicious: _messages.malicious
				},
				country 	: {
					laxmalicious: _messages.malicious
				},
				message : {
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},

				human : {
					required  	: _messages.human
				}
			}
		},

		// /SEO analysis - #seo-request-consultation
		'seo-request-consultation' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				phone 	: {
					required 	: true,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},
				domain 	: {
					required 	: false,
					url			: true,
					maxlength 	: 90
				},				
				message : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 1000,
					laxmalicious: true
				},
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				phone 	: {
					required 	: 'Phone is required!',
					malicious 	: _messages.malicious
				},	
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},
				domain	:{
					maxlength 	: _messages.maxLength,
					url			: _messages.url
				},
				message : {
					required	: 'A message is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				human : {
					required  	: _messages.human
				}
			}
		},  

		// /wax-cta-simple
		'wax-cta-simple' : {
			rules 	: {
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},			
				human : {
					required 	: false
				}
			},
			messages : {
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},
				human : {
					required  	: _messages.human
				}
			}
		},

		// /wax-cta-basic
		'wax-cta-basic' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				phone 	: {
					required 	: false,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},	
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				phone 	: {
					required 	: 'Phone is required!',
					malicious 	: _messages.malicious
				},	
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},
				human : {
					required  	: _messages.human
				}
			}
		},

		// /wax-cta-complex
		'wax-cta-complex' : {
			rules 	: {
				name 	: {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},
				phone 	: {
					required 	: false,
					malicious 	: true
				},
				email 	: {
					required 	: true,
					email 	 	: true,
					maxlength 	: 90
				},				
				domain 	: {
					required 	: false,
					url			: true,
					maxlength 	: 90
				},
				subject : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 90,
					malicious 	: true
				},				
				message : {
					required 	: true,
					minlength 	: 2,
					maxlength 	: 1000,
					laxmalicious: true
				},
				human : {
					required 	: false
				}
			},
			messages : {
				name 	: {
					required 	: 'Name is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},
				phone 	: {
					required 	: 'Phone is required!',
					malicious 	: _messages.malicious
				},	
				email 	: {
					required  	: 'Email is required!',
					email 		: _messages.email,
					maxlength 	: _messages.maxLength
				},
				domain	:{
					maxlength 	: _messages.maxLength,
					url			: _messages.url
				},
				subject : {
					required 	: 'Subject is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					malicious 	: _messages.malicious
				},	
				message : {
					required	: 'A message is required!',
					minlength 	: _messages.minLength,
					maxlength 	: _messages.maxLength,
					laxmalicious: _messages.malicious
				},
				human : {
					required  	: _messages.human
				}
			}
		}

	}

	// INIT ///////////////////////////////////////////////////////////////////

	function init(){
		//console.log('Wax.Validate::init %s', type);

		_window		= $(window);
		_type 		= type;
		_wrapper 	= $('#'+_type);
		_form 		= _wrapper.find('form.validate');
		_actions	= _wrapper.find('.actions');
		_submit		= _wrapper.find('.submit');

		_captcha 	= new Wax.Validate.Captcha(jQuery);
		_captcha.init();

		assembleElements();
		validate();
		addEventHandlers();
	}

	function validate(){
		_form.validate({
			rules 		: _rules[_type]['rules'],
			messages 	: _rules[_type]['messages'],
			ignore		: '.ignore',
			onkeyup		: false,
			errorClass	: 'notvalid',
			success		: 'valid',
			focusInvalid : true,
			errorPlacement : function(error, element) {
				element.before(error);
				//console.log(error, element);
				//error.attr('title',error[0]['textContent']);
			}
		});
	}

	function assembleElements(){
		injectSticky();
	}

	function addEventHandlers(){
		_submit.on({
			'click' : function(e){
				e.preventDefault();

				switch(_type){

					case 'request-consultation' :
						doSubmit();
						break;

					case 'home-request-consultation' :
						doSubmit();
						break;

					case 'seo-request-consultation' :
						doSubmit();
						break;

					case 'contact-us-form' :
						doSubmit();
						break;						

					case 'support-form' :
						doSubmit();
						break;

					case 'getting-started-form' :
						doSubmit();
						break;

					case 'wax-cta-basic' : 
						doSubmit();
						break;

					case 'wax-cta-simple' : 
						doSubmit();
						break;

					case 'wax-cta-complex' : 
						doSubmit();
						break;

					default :
						alert('_formType is missing! Alert the Devs!');
						//console.log('_formType is missing! Alert the Devs!', _formtype);
						break;
				}
			}
		});
	}

	// SUBMITS ////////////////////////////////////////////////////////////////

	function doSubmit(){
		if (checkSticky()){
			doValidation();
		} else {
			doCaptcha();
		}
	}

	function doCaptcha(){
		// test captcha state 
		if (_captcha.check()){
			// seems human, proceed with validation
			doValidation();
		} else {
			// if we haven't passed captcha already, activate it
			_captcha.activate();
		}
	}

	function doValidation(){
		var f = _form.validate();

		if ( f.form() ) {
			doSecurity();		
		} else {

			if( _type == "getting-started-form"){
				alert('Please check the form for problems!');
			}
			//console.log('validation failed! %o', f);
		}
	}


	// once we've passed captcha and form validation
	// generate a security token on the server and include it in the form 
	// as a hidden field.

	function doSecurity(){

		_window.on({
			'token-received' : function(e,args){
				_window.off('token-received');

				_token = $( makeToken(args.result) );
				_form.prepend(_token);

				_form.submit();
			}
		});

		$.ajax({
		    url: '/form-token.php',
		    dataType: "json",
		    async: true,
		    success: function(response) {
		        console.log('response %o', response);
		        _window.trigger('token-received', response);
		    },
		    error: function(a,b,c){
		        console.error('Ajax request failed!');
		    } 
		});		
	}

	function checkSticky(){

		var d = new Date().getFullYear();
		var pass = true;
		var sticky_1 = _sticky.find('#sticky_1');
		var sticky_2 = _sticky.find('#sticky_2');
		var sticky_3 = _sticky.find('#sticky_3');

		if ( sticky_1.val() !== "" ){ pass = false;}
		if ( sticky_2.val() !== "http://" ){ pass = false;}
		if ( sticky_3.val() !== String(d) ){ pass = false;}
		
		return pass;
	}


	// TEMPLATES //////////////////////////////////////////////////////////////

	function injectSticky(){

		_sticky	 	= $( makeSticky() );

		switch(_type){

			case 'request-consultation' :
				_form.find('fieldset').append(_sticky);
				break;

			case 'home-request-consultation' :
				_wrapper.find('.inputs').append(_sticky);
				break;

			case 'seo-request-consultation' :
				_form.find('.inputs').append(_sticky);
				break;

			case 'contact-us-form' :
				_form.find('fieldset').append(_sticky);
				break;

			case 'support-form' :
				_form.find('fieldset').append(_sticky);
				break;

			case 'getting-started-form' :
				_form.find('fieldset#human-wrap').append(_sticky);
				break;

			case 'wax-cta-basic' :
				_form.prepend(_sticky);
				break;

			case 'wax-cta-simple' :
				_form.prepend(_sticky);
				break;

			case 'wax-cta-complex' :
				_form.prepend(_sticky);
				break;

			default :
				alert('_formType is missing! Alert the Devs!');
				//console.log('_formType is missing! Alert the Devs!', _formtype);
				break;
		}

	}

	// TEMPLATES //////////////////////////////////////////////////////////////

	function makeSticky(){
		var d = new Date();
		var str = '';
		str += '<div id="sticky" class="visuallyhidden">';
		str +=		'<label for="last_name"><input id="sticky_1" class="ignore" type="text" name="last_name" value="" tabindex="-1"> Last Name</label>';
		str +=		'<label for="cur_domain"><input id="sticky_2" class="ignore" type="text" name="cur_domain" value="http://" tabindex="-1"> Domain</label>';
		str +=		'<label for="cur_year"><input id="sticky_3" class="ignore" type="text" name="cur_year" value="'+d.getFullYear()+'" tabindex="-1"> What year is it?</label>';
		str += '</div>';
		return str;
	}

	function makeToken(token){
		return '<input type="hidden" name="token" value="'+token+'" />';
	}

	/*function makeHumanCheck(clas, style){
		var str = '';
		str +=	'<label id="human" class="'+clas+' humancheck" style="'+style+'"><input class="human" type="checkbox" name="human" style="height:20px; width:20px; position:relative; top:4px; cursor:pointer;"> Are You Human?</div></label>';
		return str;
	}

	function makeHumanControlGroup(){
		var str = '';
		str += 	'<div class="humancheck control-group">';
		str += 		'<label class="control-label col_fourth" for="name">&nbsp;</label>';
		str +=		'<div class="controls col_threefourth">';
		str +=			'<label><input id="human" type="checkbox" name="human" style="height:20px; width:20px; position:relative; top:4px; cursor:pointer;"> Are you Human?</div></label>';
		str +=		'</div>';
		str += 	'</div>';
		return str;
	}*/

	init();
	return true;
};

/*
*	captcha controller
*/
Wax.Validate.Captcha = function($){ 

	var _body;
	var _window;
	var _fixed;

	var _module;
	var _wrap;
	var _image;
	var _recycle;
	var _notice;
	var _input;
	var _submit;
	var _close;

	var _pass;
	var _isActive;

	function init(){
 		//console.log('Wax.Validate.Captcha::init');

 		_window	= $(window);
 		_body 	= $('body');
 		_fixed 	= $('#fixed-wrapper');

 		_pass 	= false;
 		_isActive = false;

 		assembleElements();
 		addEventHandlers();
 		initCSS();

	}

	// reveal
	function activate(){
		_module.fadeIn();
		_isActive = true;

		_body.css('overflow','hidden');
		_window.trigger('resize');
	}

	// hide
	function deactivate(){
		_module.fadeOut();
		_isActive = false;

		_body.css('overflow','visible');

	}

	function assembleElements(){

		_module 	= $( makeModule() );
		_fixed.append(_module);

		_wrap 		= _module.find('.wrap');
		_close 		= _module.find('.close');
		_image		= _module.find('.image');
		_recycle	= _module.find('.recycle');
		_notice		= _module.find('.notice');
		_input		= _module.find('[name="code"]');
		_submit		= _module.find('.submit');

		requestImg();
	}

	function initCSS(){
		_window.trigger('resize');
		_module.hide();
	}

	function addEventHandlers(){

		_recycle.on({
			'click' : function(){
				_input.val('');
				_notice.text('Please verify the security code.').css('color','');
				requestImg();
			}
		});

		_submit.on({
			'click' : function(e){
				e.preventDefault();

				if ( _input.val() !== '' ){
					checkCode();
				} else {
					_input.focus();
				}
			}
		});

		_close.on({
			'click' : function(){
				deactivate();
			}
		});

		_window.on({
			'resize' : function(){
				var top = Math.max(0, ((_window.height() - _wrap.outerHeight()) / 2) );
        		var left = Math.max(0, ((_window.width() - _wrap.outerWidth()) / 2) );
				_wrap.css({'top':top+'px','left':left+'px'});
			}
		});

	}

	// AJAX //////////////////////////////////////////////////////////////

	function requestImg(){
		_pass = false;
		_image.attr('src', '/form-captcha.php?action=requestImg');
	}

	function checkCode(){

		var code = _input.val();

		$.ajax({
		    url: '/form-captcha.php',
		    type: "GET",
		    dataType: "json",
            data: {
               'action'   		: "checkCode",
               'request_code'  	: code
            },
		    async: true,
		    success: function(response) {
		        //console.log('response %o', response);
		        try{
			        if(response.success == 'true'){
			        	_pass = true;
						_notice.text(response.message).css('color','green');

						window.setTimeout(function(){
							deactivate();
						},1000);
			        	
			        } else {
			        	_pass = false;
			        	_notice.text(response.message).css('color','red');
			        }
		        } catch(e) {
		        	alert('Verification Failed!');
		        }
		    },
		    error: function(a,b,c){
		        console.error('Ajax request failed!');
		    } 
		}); 

	}

	// TEMPLATES //////////////////////////////////////////////////////////////

	function makeModule(){
		var str = '';
		str += 	'<div id="captcha">';
		str += 		'<div class="wrap">';
		str += 			'<form action="" method="" accept-charset="utf-8">';
		str += 				'<div class="image-wrap">';
		str += 					'<img class="image" src="" />';
		str += 					'<span class="recycle iconic-reload_alt"></span>';
		str += 				'</div>';
		str +=				'<p class="notice">Please verify the security code.</p>';
		str += 				'<fieldset>';
		str += 					'<input id="code" name="code" value="" />';
		str += 					'<button class="button submit small" type="button">Verify</button>';
		str += 				'</fieldset>';
		str += 			'</form>';
		str += 			'<span class="close iconic-x"></span>';
		str += 		'</div>';
		str += 		'<div class="modal">&nbsp;</div>';
		str += 	'</div>';
		return str;	
	}

	return {
		init:init,
		activate:activate,
		check:function(){return _pass}
	}
}