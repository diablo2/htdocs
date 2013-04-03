<?php
require_once "common.php";
?>

<html>
  <head><title>MySpaceID Hybrid Example</title></head>

  <link rel="stylesheet" type="text/css" href="static/base.css">

  <!-- YUI Combo CSS + JS files: -->
  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.6.0/build/tabview/assets/skins/sam/tabview.css">
  <script type="text/javascript" src="http://yui.yahooapis.com/combo?2.6.0/build/yahoo-dom-event/yahoo-dom-event.js&2.6.0/build/imageloader/imageloader-min.js&2.6.0/build/element/element-beta-min.js&2.6.0/build/tabview/tabview-min.js"></script>
  <script type="text/javascript" src="static/myspaceid.rev.0.js" ></script>

  <body class="yui-skin-sam">
<h2>home page</h2>
    <div 	class="MySpaceID-loginwith"
			onclick="p2()"
			style="background-color:#abc;text-align:right;">
      <img 	name='MySpaceID'
			alt="Login with MySpaceID"
			src="http://c3.ac-images.myspacecdn.com/images02/42/l_612a201a94ba45a4914076316fd316e6.png"
			style="cursor:pointer;"
			 />
    </div>

    <br>

<script>
function p2(){
	var ms = new MySpaceID(msOptions);
	ms.logIn();
}

	function popup() {
	  var popupWidth = 580;
	  var popupHeight = 410;
	  var xOffset = (screen.width - popupWidth) / 2;
	  var yOffset = (screen.height - popupHeight) / 2;
	  var server = "http://mapdjkruger3.myspace.dev:8089";

	  //alert("popup() called");
	  window.open(	"http://stage-api.myspace.com/openid?" +
					"openid.ns=" 			+ urlencode("http://specs.openid.net/auth/2.0") +
					"&openid.ns.oauth="		+ urlencode("http://specs.openid.net/extensions/oauth/1.0") +
					"&openid.oauth.consumer="+urlencode("f0fecb0c9cf24b63a95bd516b13115e3") +
					"&openid.mode=checkid_setup" +
					"&openid.claimed_id="	+ urlencode("http://specs.openid.net/auth/2.0/identifier_select") +
					"&openid.identity="		+ urlencode("http://specs.openid.net/auth/2.0/identifier_select") +
					"&openid.return_to=" 	+ urlencode(server + "/sdk-popup/finish_auth.php") +
					"&openid.realm=" 		+ urlencode(server + "/sdk-popup/"),
					"mywin",
					"width="+popupWidth+",height="+popupHeight+",left="+xOffset+",top="+yOffset
				);
	}

	function urlencode( str ) {
	    // http://kevin.vanzonneveld.net
	    // +   original by: Philip Peterson
	    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	    // +      input by: AJ
	    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	    // +   improved by: Brett Zamir
	    // %          note: info on what encoding functions to use from: http://xkr.us/articles/javascript/encode-compare/
	    // *     example 1: urlencode('Kevin van Zonneveld!');
	    // *     returns 1: 'Kevin+van+Zonneveld%21'
	    // *     example 2: urlencode('http://kevin.vanzonneveld.net/');
	    // *     returns 2: 'http%3A%2F%2Fkevin.vanzonneveld.net%2F'
	    // *     example 3: urlencode('http://www.google.nl/search?q=php.js&ie=utf-8&oe=utf-8&aq=t&rls=com.ubuntu:en-US:unofficial&client=firefox-a');
	    // *     returns 3: 'http%3A%2F%2Fwww.google.nl%2Fsearch%3Fq%3Dphp.js%26ie%3Dutf-8%26oe%3Dutf-8%26aq%3Dt%26rls%3Dcom.ubuntu%3Aen-US%3Aunofficial%26client%3Dfirefox-a'

	    var histogram = {}, tmp_arr = [];
	    var ret = str.toString();

	    var replacer = function(search, replace, str) {
	        var tmp_arr = [];
	        tmp_arr = str.split(search);
	        return tmp_arr.join(replace);
	    };

	    // The histogram is identical to the one in urldecode.
	    histogram["'"]   = '%27';
	    histogram['(']   = '%28';
	    histogram[')']   = '%29';
	    histogram['*']   = '%2A';
	    histogram['~']   = '%7E';
	    histogram['!']   = '%21';
	    histogram['%20'] = '+';

	    // Begin with encodeURIComponent, which most resembles PHP's encoding functions
	    ret = encodeURIComponent(ret);

	    for (search in histogram) {
	        replace = histogram[search];
	        ret = replacer(search, replace, ret) // Custom replace. No regexing
	    }

	    // Uppercase for full PHP compatibility
	    return ret.replace(/(\%([a-z0-9]{2}))/g, function(full, m1, m2) {
	        return "%"+m2.toUpperCase();
	    });

	    return ret;
	}

	function sayhi(rand) {
	  alert(rand);
	}
</script>

  </body>
</html>
