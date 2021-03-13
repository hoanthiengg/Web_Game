{{-- <div id="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
    <div data-auth-required class="unshown" title="Tính năng yêu cầu đăng nhập">
		Để thực hiện tác vụ này, bạn cần
		
		<a href="{{route('login')}}" rel="nofollow">đăng nhập</a>!
    </div>
    <script type="text/javascript" src="//taigame.org/static/v9/js/bogo.js"></script>
    <script>
        $(function() {
        	
        	
        });
        
        // TODO: move this to bundle (temporarily here b/c bundle has unfinished changes)
        (function () {
        	const matchText = function(node, regex, callback, excludeElements) {
        
        		excludeElements || (excludeElements = ['script', 'style', 'iframe', 'canvas']);
        		var child = node.firstChild;
        
        		while (child) {
        			switch (child.nodeType) {
        			case 1:
        				if (excludeElements.indexOf(child.tagName.toLowerCase()) > -1)
        					break;
        				matchText(child, regex, callback, excludeElements);
        				break;
        			case 3:
        				var bk = 0;
        				child.data.replace(regex, function(all) {
        					var args = [].slice.call(arguments),
        						offset = args[args.length - 2],
        						newTextNode = child.splitText(offset+bk), tag;
        					bk -= child.data.length + all.length;
        
        					newTextNode.data = newTextNode.data.substr(all.length);
        					tag = callback.apply(window, [child].concat(args));
        					child.parentNode.insertBefore(tag, newTextNode);
        					child = newTextNode;
        				});
        				regex.lastIndex = 0;
        				break;
        			}
        
        			child = child.nextSibling;
        		}
        
        		return node;
        	};
        
        	const replacementDict = {
        		'dll': 'https://taigame.org/misc/helpPlay#dll',
        		'isdone': 'https://taigame.org/misc/helpPlay#isdone',
        		'volume': 'https://taigame.org/misc/helpPlay#volume-required',
        		'0xc000007b': 'https://taigame.org/misc/helpPlay#0xc000007b',
        		'lag': 'https://taigame.org/misc/helpPlay#lag',
        		'save': 'https://taigame.org/misc/helpPlay#save',
        		'winrar': 'https://static.taigame.org/files/WinRAR.zip',
        		'windows defender': 'https://taigame.org/misc/helpSoftware#windows-defender',
        		'defender': 'https://taigame.org/misc/helpSoftware#windows-defender',
        		'idm': 'https://taigame.org/misc/helpSoftware#idm',
        		'softkit': 'https://taigame.org/misc/helpSoftware#softkit',
        		'vc\\+\\+': 'https://taigame.org/misc/helpSoftware#softkit',
        		'directx': 'https://taigame.org/misc/helpSoftware#softkit',
        		'driver': 'https://taigame.org/misc/helpSoftware#driver',
        		'card': 'https://taigame.org/misc/vgaChart',
        		'tai game': 'https://taigame.org/misc/helpPlay#tai-game',
        		'tải game': 'https://taigame.org/misc/helpPlay#tai-game',
        		'giai nen': 'https://taigame.org/misc/helpPlay#giai-nen',
        		'giải nén': 'https://taigame.org/misc/helpPlay#giai-nen',
        		'cai game': 'https://taigame.org/misc/helpPlay#cai-dat',
        		'cài game': 'https://taigame.org/misc/helpPlay#cai-dat',
        		'cai dat': 'https://taigame.org/misc/helpPlay#cai-dat',
        		'cài đặt': 'https://taigame.org/misc/helpPlay#cai-dat',
        		'choi game': 'https://taigame.org/misc/helpPlay#choi-game',
        		'chơi game': 'https://taigame.org/misc/helpPlay#choi-game',
        		'dia ao': 'https://taigame.org/misc/helpVirtualCd',
        		'đĩa ảo': 'https://taigame.org/misc/helpVirtualCd',
        	};
        	setInterval(function() {
        		$('.chatbox .content').add('.general-comments .content').each(function() {
        			for (let word in replacementDict) {
        				let re = new RegExp(`\\b${word}\\b(?![^<]*?<\\/a>)`, "gi");
        				matchText($(this)[0], re, function(node, match, offset) {
        					const a = document.createElement("a");
        					a.href = replacementDict[word];
        					a.target = "_blank";
        					a.className = "guide-link";
        					a.textContent = match;
        					return a;
        				}, 'a');
        			}
        		});
        	}, 2000);
        }());
    </script>
    
    <script>
        function toSlug (str) {
        	str = str.replace(/^\s+|\s+$/g, ''); // trim
        	str = str.toLowerCase();
        
        	// remove accents, swap ñ for n, etc
        	var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        	var to   = "aaaaeeeeiiiioooouuuunc------";
        	for (var i=0, l=from.length ; i<l ; i++) {
        		str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        	}
        
        	str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        			.replace(/\s+/g, '-') // collapse whitespace and replace by -
        			.replace(/-+/g, '-'); // collapse dashes
        
        	return str;
        }
        
        setTimeout(function () {
        	var ec = new evercookie({
        		asseturi: '//taigame.org/static/v9/evercookie',
        		phpuri: '//taigame.org/static/v9/evercookie'
        	});
        	var cookieName = 'tgcu';
        	ec.get(cookieName, function(value) {
        				});
        }, 1500)
	</script>
		<script src="//taigame.org/static/v9/evercookie/swfobject-2.2.min.js"></script>
		<script src="//taigame.org/static/v9/evercookie/evercookie.js"></script>   	
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-362619-3']);
        _gaq.push(['_setDomainName', 'taigame.org']);
        _gaq.push(['_trackPageview']);
        
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
        
    </script>
    <!-- Facebook >>>-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=469130023193362";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
	<!--<<< Facebook -->
	 --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script>
	$(function() {
		
		module.showPageMessage('Tài khoản bạn có 0đ, và bạn đã hết lượt download miễn phí.<br />\n\
	Để tiếp tục tải game, hãy nạp tiền vào tài khoản <a href="https://taigame.org/settings?tab=money" style="font-weight:bold">ở đây</a>! &nbsp; &nbsp; ');
	});
 </script> --}}
