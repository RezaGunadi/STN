<html lang="id" class="js translated-ltr">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-WD5BXL8ZQT&amp;l=dataLayer&amp;cx=c&amp;gtm=457e54u1za200&amp;tag_exp=101509157~103101747~103101749~103116025~103200001~103233427~103251618~103251620">
    </script>
    <script type="text/javascript" async="" src="https://static.whatshelp.io/widget-send-button/js/init.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-54R2ND7"></script>
    <script>
        if(navigator.userAgent.match(/MSIE|Internet Explorer/i)||navigator.userAgent.match(/Trident\/7\..*?rv:11/i)){var href=document.location.href;if(!href.match(/[?&]nowprocket/)){if(href.indexOf("?")==-1){if(href.indexOf("#")==-1){document.location.href=href+"?nowprocket=1"}else{document.location.href=href.replace("#","?nowprocket=1#")}}else{if(href.indexOf("#")==-1){document.location.href=href+"&nowprocket=1"}else{document.location.href=href.replace("#","&nowprocket=1#")}}}}    
    </script>
    <script>
        class RocketLazyLoadScripts{constructor(e){this.triggerEvents=e,this.eventOptions={passive:!0},this.userEventListener=this.triggerListener.bind(this),this.delayedScripts={normal:[],async:[],defer:[]},this.allJQueries=[]}_addUserInteractionListener(e){this.triggerEvents.forEach((t=>window.addEventListener(t,e.userEventListener,e.eventOptions)))}_removeUserInteractionListener(e){this.triggerEvents.forEach((t=>window.removeEventListener(t,e.userEventListener,e.eventOptions)))}triggerListener(){this._removeUserInteractionListener(this),"loading"===document.readyState?document.addEventListener("DOMContentLoaded",this._loadEverythingNow.bind(this)):this._loadEverythingNow()}async _loadEverythingNow(){this._delayEventListeners(),this._delayJQueryReady(this),this._handleDocumentWrite(),this._registerAllDelayedScripts(),this._preloadAllScripts(),await this._loadScriptsFromList(this.delayedScripts.normal),await this._loadScriptsFromList(this.delayedScripts.defer),await this._loadScriptsFromList(this.delayedScripts.async),await this._triggerDOMContentLoaded(),await this._triggerWindowLoad(),window.dispatchEvent(new Event("rocket-allScriptsLoaded"))}_registerAllDelayedScripts(){document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e=>{e.hasAttribute("src")?e.hasAttribute("async")&&!1!==e.async?this.delayedScripts.async.push(e):e.hasAttribute("defer")&&!1!==e.defer||"module"===e.getAttribute("data-rocket-type")?this.delayedScripts.defer.push(e):this.delayedScripts.normal.push(e):this.delayedScripts.normal.push(e)}))}async _transformScript(e){return await this._requestAnimFrame(),new Promise((t=>{const n=document.createElement("script");let r;[...e.attributes].forEach((e=>{let t=e.nodeName;"type"!==t&&("data-rocket-type"===t&&(t="type",r=e.nodeValue),n.setAttribute(t,e.nodeValue))})),e.hasAttribute("src")?(n.addEventListener("load",t),n.addEventListener("error",t)):(n.text=e.text,t()),e.parentNode.replaceChild(n,e)}))}async _loadScriptsFromList(e){const t=e.shift();return t?(await this._transformScript(t),this._loadScriptsFromList(e)):Promise.resolve()}_preloadAllScripts(){var e=document.createDocumentFragment();[...this.delayedScripts.normal,...this.delayedScripts.defer,...this.delayedScripts.async].forEach((t=>{const n=t.getAttribute("src");if(n){const t=document.createElement("link");t.href=n,t.rel="preload",t.as="script",e.appendChild(t)}})),document.head.appendChild(e)}_delayEventListeners(){let e={};function t(t,n){!function(t){function n(n){return e[t].eventsToRewrite.indexOf(n)>=0?"rocket-"+n:n}e[t]||(e[t]={originalFunctions:{add:t.addEventListener,remove:t.removeEventListener},eventsToRewrite:[]},t.addEventListener=function(){arguments[0]=n(arguments[0]),e[t].originalFunctions.add.apply(t,arguments)},t.removeEventListener=function(){arguments[0]=n(arguments[0]),e[t].originalFunctions.remove.apply(t,arguments)})}(t),e[t].eventsToRewrite.push(n)}function n(e,t){let n=e[t];Object.defineProperty(e,t,{get:()=>n||function(){},set(r){e["rocket"+t]=n=r}})}t(document,"DOMContentLoaded"),t(window,"DOMContentLoaded"),t(window,"load"),t(window,"pageshow"),t(document,"readystatechange"),n(document,"onreadystatechange"),n(window,"onload"),n(window,"onpageshow")}_delayJQueryReady(e){let t=window.jQuery;Object.defineProperty(window,"jQuery",{get:()=>t,set(n){if(n&&n.fn&&!e.allJQueries.includes(n)){n.fn.ready=n.fn.init.prototype.ready=function(t){e.domReadyFired?t.bind(document)(n):document.addEventListener("rocket-DOMContentLoaded",(()=>t.bind(document)(n)))};const t=n.fn.on;n.fn.on=n.fn.init.prototype.on=function(){if(this[0]===window){function e(e){return e.split(" ").map((e=>"load"===e||0===e.indexOf("load.")?"rocket-jquery-load":e)).join(" ")}"string"==typeof arguments[0]||arguments[0]instanceof String?arguments[0]=e(arguments[0]):"object"==typeof arguments[0]&&Object.keys(arguments[0]).forEach((t=>{delete Object.assign(arguments[0],{[e(t)]:arguments[0][t]})[t]}))}return t.apply(this,arguments),this},e.allJQueries.push(n)}t=n}})}async _triggerDOMContentLoaded(){this.domReadyFired=!0,await this._requestAnimFrame(),document.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._requestAnimFrame(),window.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._requestAnimFrame(),document.dispatchEvent(new Event("rocket-readystatechange")),await this._requestAnimFrame(),document.rocketonreadystatechange&&document.rocketonreadystatechange()}async _triggerWindowLoad(){await this._requestAnimFrame(),window.dispatchEvent(new Event("rocket-load")),await this._requestAnimFrame(),window.rocketonload&&window.rocketonload(),await this._requestAnimFrame(),this.allJQueries.forEach((e=>e(window).trigger("rocket-jquery-load"))),window.dispatchEvent(new Event("rocket-pageshow")),await this._requestAnimFrame(),window.rocketonpageshow&&window.rocketonpageshow()}_handleDocumentWrite(){const e=new Map;document.write=document.writeln=function(t){const n=document.currentScript,r=document.createRange(),i=n.parentElement;let o=e.get(n);void 0===o&&(o=n.nextSibling,e.set(n,o));const a=document.createDocumentFragment();r.setStart(a,0),a.appendChild(r.createContextualFragment(t)),i.insertBefore(a,o)}}async _requestAnimFrame(){return new Promise((e=>requestAnimationFrame(e)))}static run(){const e=new RocketLazyLoadScripts(["keydown","mousemove","touchmove","touchstart","touchend","wheel"]);e._addUserInteractionListener(e)}}RocketLazyLoadScripts.run();    
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="pingback" href="https://www.stnmultimedia.com/xmlrpc.php">
    <script type="text/javascript">
        document.documentElement.className = 'js';    
    </script>
    <script>
        var et_site_url='https://www.stnmultimedia.com';var et_post_id='5';function et_core_page_resource_fallback(a,b){"undefined"===typeof b&&(b=a.sheet.cssRules&&0===a.sheet.cssRules.length);b&&(a.onerror=null,a.onload=null,a.href?a.href=et_site_url+"/?et_core_page_resource="+a.id+et_post_id:a.src&&(a.src=et_site_url+"/?et_core_page_resource="+a.id+et_post_id))}    
    </script>
    <title>STN Multimedia | ACARA YANG SEBENARNYA ADALAH MILIK ANDA</title>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css?family=Open%20Sans%3A300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800%7CKhand%3A300%2Cregular%2C500%2C600%2C700&amp;subset=latin%2Clatin-ext&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open%20Sans%3A300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800%7CKhand%3A300%2Cregular%2C500%2C600%2C700&amp;subset=latin%2Clatin-ext&amp;display=swap"
        media="all" onload="this.media='all'"><noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Open%20Sans%3A300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800%7CKhand%3A300%2Cregular%2C500%2C600%2C700&#038;subset=latin%2Clatin-ext&#038;display=swap" />
    </noscript>
    <link rel="stylesheet"
        href="https://www.stnmultimedia.com/wp-content/cache/min/1/e0dfa07b4a04780be56768ff98c7fed3.css" media="all"
        data-minify="1">
    <meta name="robots" content="max-image-preview:large">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.gstatic.com" crossorigin="" rel="preconnect">
    <link rel="alternate" type="application/rss+xml" title="STN Multimedia » Umpan"
        href="https://www.stnmultimedia.com/feed/">
    <link rel="alternate" type="application/rss+xml" title="STN Multimedia » Umpan Komentar"
        href="https://www.stnmultimedia.com/comments/feed/">
    <meta content="Divi v.4.5.3" name="generator">
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id="global-styles-inline-css" type="text/css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <!--n2css-->
    <!--n2js-->
    <script type="text/javascript" src="https://www.stnmultimedia.com/wp-includes/js/jquery/jquery.min.js?ver=3.6.1"
        id="jquery-core-js"></script>
    <script type="text/javascript"
        src="https://www.stnmultimedia.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2"
        id="jquery-migrate-js"></script>
    <script type="text/javascript"
        src="https://www.stnmultimedia.com/wp-content/themes/Divi/core/admin/js/es6-promise.auto.min.js?ver=6.1.7"
        id="es6-promise-js"></script>
    <script type="text/javascript" id="et-core-api-spam-recaptcha-js-extra">
        /* <![CDATA[ */var et_core_api_spam_recaptcha = {"site_key":"","page_action":{"action":"www_stnmultimedia_com"}};/* ]]> */    
    </script>
    <script data-minify="1" type="text/javascript"
        src="https://www.stnmultimedia.com/wp-content/cache/min/1/wp-content/themes/Divi/core/admin/js/recaptcha.js?ver=1661870010"
        id="et-core-api-spam-recaptcha-js"></script>
    <link rel="https://api.w.org/" href="https://www.stnmultimedia.com/wp-json/">
    <link rel="alternate" type="application/json" href="https://www.stnmultimedia.com/wp-json/wp/v2/pages/5">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.stnmultimedia.com/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
        href="https://www.stnmultimedia.com/wp-includes/wlwmanifest.xml">
    <meta name="generator" content="WordPress 6.1.7">
    <link rel="canonical" href="https://www.stnmultimedia.com/">
    <link rel="shortlink" href="https://www.stnmultimedia.com/">
    <link rel="alternate" type="application/json+oembed"
        href="https://www.stnmultimedia.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.stnmultimedia.com%2F">
    <link rel="alternate" type="text/xml+oembed"
        href="https://www.stnmultimedia.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.stnmultimedia.com%2F&amp;format=xml">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-162032234-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];  function gtag(){dataLayer.push(arguments);}  gtag('js', new Date());  gtag('config', 'UA-162032234-1');    
    </script> <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-54R2ND7');    
    </script> <!-- End Google Tag Manager -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon"
        href="https://www.stnmultimedia.com/wp-content/uploads/2021/10/cropped-MASTER-LOGO-STN-MULTIMEDIA-32x32.jpg"
        sizes="32x32">
    <link rel="icon"
        href="https://www.stnmultimedia.com/wp-content/uploads/2021/10/cropped-MASTER-LOGO-STN-MULTIMEDIA-192x192.jpg"
        sizes="192x192">
    <link rel="apple-touch-icon"
        href="https://www.stnmultimedia.com/wp-content/uploads/2021/10/cropped-MASTER-LOGO-STN-MULTIMEDIA-180x180.jpg">
    <meta name="msapplication-TileImage"
        content="https://www.stnmultimedia.com/wp-content/uploads/2021/10/cropped-MASTER-LOGO-STN-MULTIMEDIA-270x270.jpg">
    <link rel="stylesheet" id="et-core-unified-5-cached-inline-styles"
        href="https://www.stnmultimedia.com/wp-content/et-cache/5/et-core-unified-5-17460568549323.min.css"
        onerror="et_core_page_resource_fallback(this, true)" onload="et_core_page_resource_fallback(this)"><noscript>
        <style id="rocket-lazyload-nojs-css">
            .rll-youtube-player,
            [data-lazy-src] {
                display: none !important;
            }
        </style>
    </noscript>
    <link href="https://www.stnmultimedia.com/wp-includes/js/jquery/jquery.min.js?ver=3.6.1" rel="preload" as="script">
    <link href="https://www.stnmultimedia.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2" rel="preload"
        as="script">
    <link href="https://www.stnmultimedia.com/wp-content/themes/Divi/core/admin/js/es6-promise.auto.min.js?ver=6.1.7"
        rel="preload" as="script">
    <link
        href="https://www.stnmultimedia.com/wp-content/cache/min/1/wp-content/themes/Divi/core/admin/js/recaptcha.js?ver=1661870010"
        rel="preload" as="script">
    <link
        href="https://www.stnmultimedia.com/wp-content/cache/min/1/wp-content/themes/Divi/js/custom.unified.js?ver=1661870010"
        rel="preload" as="script">
    <link
        href="https://www.stnmultimedia.com/wp-content/cache/min/1/wp-content/themes/Divi/core/admin/js/common.js?ver=1661870010"
        rel="preload" as="script">
    <link href="https://www.googletagmanager.com/gtag/js?id=UA-162032234-1" rel="preload" as="script">
    <link type="text/css" rel="stylesheet" charset="UTF-8"
        href="https://www.gstatic.com/_/translate_http/_/ss/k=translate_http.tr.NJgGN_yGIWM.L.W.O/am=AAY/d=0/rs=AN8SPfrTSMIvWAFISYN4u74dPJrX0HgUsw/m=el_main_css">
    <style>
        [data-columns]::before {
            visibility: hidden;
            position: absolute;
            font-size: 1px;
        }
    </style>
    <style id="fit-vids-style">
        .fluid-width-video-wrapper {
            width: 100%;
            position: relative;
            padding: 0;
        }

        .fluid-width-video-wrapper iframe,
        .fluid-width-video-wrapper object,
        .fluid-width-video-wrapper embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body
    class="home page-template-default page page-id-5 et_pb_button_helper_class et_fullwidth_nav et_fixed_nav et_show_nav et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_pb_footer_columns4 et_cover_background et_pb_gutter et_pb_gutters3 et_pb_pagebuilder_layout et_no_sidebar et_divi_theme et-db et_minified_js et_minified_css chrome"
    style="overflow-x: hidden;">
    <div id="page-container" style="padding-top: 80px; overflow-y: hidden; margin-top: -1px;"
        class="et-animated-content">
        <header id="main-header" data-height-onload="80" data-height-loaded="true" data-fixed-height-onload="80"
            style="top: 0px;" class="">
            <div class="container clearfix et_menu_container">
                <div class="logo_container"> <span class="logo_helper"></span> <a href="https://www.stnmultimedia.com/">
                        <img src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/MASTER-LOGO-STN-MULTIMEDIA-Copy.png"
                            alt="STN Multimedia" id="logo" data-height-percentage="54" data-actual-width="1905"
                            data-actual-height="629.828"> </a> </div>
                <div id="et-top-navigation" data-height="66" data-fixed-height="40" style="padding-left: 160px;">
                    <nav id="top-menu-nav">
                        <ul id="top-menu" class="nav">
                            <li id="menu-item-85"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-85">
                                <a href="https://www.stnmultimedia.com/" aria-current="page">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">RUMAH</font>
                                    </font>
                                </a> </li>
                            <li id="menu-item-82"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a
                                    href="https://www.stnmultimedia.com/about/">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">TENTANG KAMI</font>
                                    </font>
                                </a></li>
                            <li id="menu-item-83"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a
                                    href="https://www.stnmultimedia.com/product/">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">PRODUK</font>
                                    </font>
                                </a></li>
                            <li id="menu-item-81"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a
                                    href="https://www.stnmultimedia.com/layanan/">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">LAYANAN</font>
                                    </font>
                                </a></li>
                            <li id="menu-item-84"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-84"><a
                                    href="https://www.stnmultimedia.com/contact/">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">KONTAK KAMI</font>
                                    </font>
                                </a></li>
                            <li id="menu-item-80"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a
                                    href="https://www.stnmultimedia.com/news/">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">BERITA</font>
                                    </font>
                                </a></li>
                        </ul>
                    </nav>
                    <div id="et_mobile_nav_menu">
                        <div class="mobile_nav closed"> <span class="select_page">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Pilih Halaman</font>
                                </font>
                            </span> <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
                            <ul id="mobile_menu" class="et_mobile_menu">
                                <li id="menu-item-85"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-85 et_first_mobile_item">
                                    <a href="https://www.stnmultimedia.com/" aria-current="page">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">RUMAH</font>
                                        </font>
                                    </a> </li>
                                <li id="menu-item-82"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82"><a
                                        href="https://www.stnmultimedia.com/about/">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">TENTANG KAMI</font>
                                        </font>
                                    </a></li>
                                <li id="menu-item-83"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a
                                        href="https://www.stnmultimedia.com/product/">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">PRODUK</font>
                                        </font>
                                    </a></li>
                                <li id="menu-item-81"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a
                                        href="https://www.stnmultimedia.com/layanan/">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">LAYANAN</font>
                                        </font>
                                    </a></li>
                                <li id="menu-item-84"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-84"><a
                                        href="https://www.stnmultimedia.com/contact/">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">KONTAK KAMI</font>
                                        </font>
                                    </a></li>
                                <li id="menu-item-80"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-80"><a
                                        href="https://www.stnmultimedia.com/news/">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">BERITA</font>
                                        </font>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- #et-top-navigation -->
            </div> <!-- .container -->
            <div class="et_search_outer">
                <div class="container et_search_form_container">
                    <form role="search" method="get" class="et-search-form" action="https://www.stnmultimedia.com/">
                        <input type="search" class="et-search-field" placeholder="Mencari …" value="" name="s"
                            title="Pencarian untuk:"> </form> <span class="et_close_search_field"></span>
                </div>
            </div>
        </header> <!-- #main-header -->
        <div id="et-main-area">
            <div id="main-content">
                <article id="post-5" class="post-5 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="et-boc" class="et-boc">
                            <div class="et-l et-l--post">
                                <div class="et_builder_inner_content et_pb_gutters3">
                                    <div
                                        class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular section_has_divider et_pb_bottom_divider">
                                        <div class="et_pb_row et_pb_row_0">
                                            <div
                                                class="et_pb_column et_pb_column_2_5 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough">
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_0 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <blockquote>
                                                            <h2 style="text-align: justify;"><span
                                                                    style="font-size: xx-large; color: #000000;"><strong>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">STN
                                                                                Multimedia</font>
                                                                        </font>
                                                                    </strong></span></h2>
                                                        </blockquote>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_1 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">STN Multimedia
                                                                    Merupakan penyedia layanan jasa Professional Live
                                                                    Streaming, Sewa Sound System, Sewa Kamera, Jasa
                                                                    Videografi dan Editing, Sewa TV, Sewa Projector,
                                                                    Sewa Drone, Sewa Videotron, Sewa Laptop Gaming dan
                                                                    peralatan multimedia lainnya</font>
                                                            </font>
                                                        </p>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_0_wrapper et_pb_button_alignment_right et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_0 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://wa.me/6285380008900" target="_blank"
                                                        data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Kirim WA (WhatsApp)
                                                                ke Kami</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_3_5 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_module et_pb_image et_pb_image_0 et_pb_section_parallax">
                                                    <span class="et_parallax_bg_wrap"><span
                                                            data-bg="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-1.jpeg"
                                                            class="et_parallax_bg rocket-lazyload entered lazyloaded"
                                                            style="background-image: url(&quot;https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-1.jpeg&quot;); height: 759.934px; transform: translate(0px, 223.5px);"
                                                            data-ll-status="loaded"></span></span> <span
                                                        class="et_pb_image_wrap "><img width="1000" height="849"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59.png"
                                                            alt="STN-Multimedia-1" title="STN-Multimedia-1"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59-980x832.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59-480x408.png 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59.png"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59-980x832.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59-480x408.png 480w"><noscript><img
                                                                width="1000" height="849"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59.png"
                                                                alt="STN-Multimedia-1" title="STN-Multimedia-1"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59-980x832.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-59-480x408.png 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw" /></noscript></span>
                                                </div>
                                                <div class="et_pb_module et_pb_image et_pb_image_1"> <span
                                                        class="et_pb_image_wrap "><img width="798" height="1052"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1.png"
                                                            alt="" title=""
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1.png 798w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1-480x633.png 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 798px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1.png"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 798px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1.png 798w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1-480x633.png 480w"><noscript><img
                                                                width="798" height="1052"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1.png"
                                                                alt="" title=""
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1.png 798w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-57-1-480x633.png 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 798px, 100vw" /></noscript></span>
                                                </div>
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_2 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_1">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_2  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <h2>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">kualitas layanan
                                                                    kami</font>
                                                            </font>
                                                        </h2>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_3 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_3  et_pb_text_align_right et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Kenyamanan dan
                                                                    Kepuasan Klien kami merupakan hal terpenting bagi
                                                                    kami, dengan tenaga kerja berpengalaman kami
                                                                    memastikan semua layanan kami merupakan pelayanan
                                                                    yang Prima &amp; Tepat waktu. Produk berkualitas
                                                                    plus harga yang sangat kompetitif dan mengerti
                                                                    budget Anda.</font>
                                                            </font>
                                                        </p>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_1_wrapper et_pb_button_alignment_right et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_1 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://www.stnmultimedia.com/product/" target="_blank"
                                                        data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Layanan Kami</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_2">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_module et_pb_nextend_smart_slider_3 et_pb_nextend_smart_slider_3_0">
                                                    <div class="et_pb_module_inner"> </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_bottom_inside_divider" style=""></div>
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_1 et_section_regular">
                                        <div class="et_pb_row et_pb_row_3">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_5  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_image et_pb_image_2"> <span
                                                        class="et_pb_image_wrap "><img width="1920" height="1084"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1.jpg"
                                                            alt="STN-Produk-Multimedia" title="Produk Multimedia STN"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-1280x723.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-980x553.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-480x271.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1.jpg"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-1280x723.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-980x553.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-480x271.jpg 480w"><noscript><img
                                                                width="1920" height="1084"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1.jpg"
                                                                alt="STN-Multimedia-Products"
                                                                title="STN Multimedia Products"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-1280x723.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-980x553.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/STN-Multimedia-Products-1-480x271.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw" /></noscript></span>
                                                </div>
                                                <div class="et_pb_module et_pb_image et_pb_image_3"> <span
                                                        class="et_pb_image_wrap "><img width="2528" height="1440"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia.jpg"
                                                            alt="Keunggulan-Alat-STN-Multimedia"
                                                            title="Keunggulan Alat STN Multimedia"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia.jpg 2528w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-1280x729.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-980x558.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-480x273.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 2528px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia.jpg"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 2528px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia.jpg 2528w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-1280x729.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-980x558.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-480x273.jpg 480w"><noscript><img
                                                                width="2528" height="1440"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia.jpg"
                                                                alt="Keunggulan-Alat-STN-Multimedia"
                                                                title="Keunggulan Alat STN Multimedia"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia.jpg 2528w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-1280x729.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-980x558.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2023/11/Keunggulan-Alat-STN-Multimedia-480x273.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 2528px, 100vw" /></noscript></span>
                                                </div>
                                                <div class="et_pb_module et_pb_video et_pb_video_0">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Apa Kata Mereka Tentang STN Multimedia"
                                                                src="https://www.youtube.com/embed/-5tttUQKM8E?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/-5tttUQKM8E?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid0"></iframe></div><noscript><iframe
                                                                title="Apa Kata Mereka Tentang STN Multimedia"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/-5tttUQKM8E?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                                <div class="et_pb_module et_pb_image et_pb_image_4"> <span
                                                        class="et_pb_image_wrap "><img width="1920" height="1084"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1.jpg"
                                                            alt="Kenapa-Harus-STN-Multimedia-Live-Streaming"
                                                            title="Kenapa Harus STN Multimedia"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-1280x723.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-980x553.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-480x271.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1.jpg"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-1280x723.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-980x553.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-480x271.jpg 480w"><noscript><img
                                                                width="1920" height="1084"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1.jpg"
                                                                alt="Kenapa-Harus-STN-Multimedia-Live-Streaming"
                                                                title="Kenapa Harus STN Multimedia"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-1280x723.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-980x553.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/08/Kenapa-Harus-STN-Multimedia-1-480x271.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw" /></noscript></span>
                                                </div>
                                                <div class="et_pb_module et_pb_image et_pb_image_5"> <span
                                                        class="et_pb_image_wrap "><img width="1382" height="778"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia.jpg"
                                                            alt="Kenapa-Harus-STN-Multimedia"
                                                            title="Kenapa Harus STN Multimedia"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia.jpg 1382w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-1280x721.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-980x552.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-480x270.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1382px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia.jpg"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1382px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia.jpg 1382w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-1280x721.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-980x552.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-480x270.jpg 480w"><noscript><img
                                                                width="1382" height="778"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia.jpg"
                                                                alt="Kenapa-Harus-STN-Multimedia"
                                                                title="Kenapa Harus STN Multimedia"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia.jpg 1382w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-1280x721.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-980x552.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/01/Kenapa-Harus-STN-Multimedia-480x270.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1382px, 100vw" /></noscript></span>
                                                </div>
                                                <div class="et_pb_module et_pb_image et_pb_image_6"> <span
                                                        class="et_pb_image_wrap "><img width="1920" height="1080"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1.jpg"
                                                            alt="STN-Topologi-Multimedia-Streaming Langsung"
                                                            title="Topologi Streaming Langsung STN Multimedia"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-1280x720.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-980x551.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-480x270.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1.jpg"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-1280x720.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-980x551.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-480x270.jpg 480w"><noscript><img
                                                                width="1920" height="1080"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1.jpg"
                                                                alt="STN-Multimedia-Topology-Live-Streaming"
                                                                title="Live Streaming Topology STN Multimedia"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1.jpg 1920w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-1280x720.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-980x551.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2022/02/Live-Streaming-Topology-STN-Multimedia-1-480x270.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1920px, 100vw" /></noscript></span>
                                                </div>
                                                <div class="et_pb_module et_pb_image et_pb_image_7"> <span
                                                        class="et_pb_image_wrap "><img width="2240" height="1494"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328931542.jpg"
                                                            alt="Kru STN-Multimedia" title="Kru STN-Multimedia"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328931542.jpg 2240w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-1280x720.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-980x551.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-480x270.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 2240px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328931542.jpg"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 2240px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328931542.jpg 2240w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-1280x720.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-980x551.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-480x270.jpg 480w"><noscript><img
                                                                width="2240" height="1494"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328931542.jpg"
                                                                alt="STN-Multimedia-Crews" title="STN-Multimedia-Crews"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328931542.jpg 2240w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-1280x720.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-980x551.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2023/03/6I7A8658-scaled-e1678328634142-480x270.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 2240px, 100vw" /></noscript></span>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_2 et_section_regular">
                                        <div class="et_pb_row et_pb_row_4">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_6  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_2_wrapper et_pb_button_alignment_right et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_2 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://www.youtube.com/c/STNChannelOfficial"
                                                        target="_blank" data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Kunjungi Youtube kami
                                                                Klik Disini</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_3 et_section_regular">
                                        <div class="et_pb_row et_pb_row_5">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_7  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_1">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Webinar Aplog Logistic Seri ke 2 oleh APLOG &amp; Disiarkan oleh STN Multimedia"
                                                                src="https://www.youtube.com/embed/ZnvEsiN-ljo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/ZnvEsiN-ljo?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid2"></iframe></div><noscript><iframe
                                                                title="Webinar Aplog Logistic Seri ke 2 by APLOG &amp; Broadcasted by STN Multimedia"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/ZnvEsiN-ljo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_8  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_2">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Dihadiri oleh Erick Thohir - Penganugerahan Gelar Alumni Kehormatan | Dies Natalis ILUNI UI Ke 64"
                                                                src="https://www.youtube.com/embed/yowozNpNzx8?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/yowozNpNzx8?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid1"></iframe></div><noscript><iframe
                                                                title="Attended by Erick Thohir - Penganugerahan Gelar Alumni Kehormatan | Dies Natalis ILUNI UI Ke 64"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/yowozNpNzx8?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_6">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_9  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_3">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="KEMENLU - Dihadiri Retno LP Marsudi Dirgahayu Kementerian Luar Negeri 77 Tahun Mengabdi"
                                                                src="https://www.youtube.com/embed/0DL9yCzW7EY?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/0DL9yCzW7EY?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid4"></iframe></div><noscript><iframe
                                                                title="KEMENLU - Attended by Retno L. P. Marsudi Dirgahayu Kementerian Luar Negeri 77 Tahun Mengabdi"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/0DL9yCzW7EY?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_10  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_4">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Universitas Trisakti Pembukaan FORIL XIII Tahun 2022"
                                                                src="https://www.youtube.com/embed/jy02r3N9kGo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/jy02r3N9kGo?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid3"></iframe></div><noscript><iframe
                                                                title="Universitas Trisakti Opening Ceremony FORIL XIII 2022"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/jy02r3N9kGo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_7">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_11  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_5">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Festival Pemuda Wirausaha Asli Bagian 1"
                                                                src="https://www.youtube.com/embed/iP5KMkmrm6w?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/iP5KMkmrm6w?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid6"></iframe></div><noscript><iframe
                                                                title="Native Youthpreneur Festival Part 1" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/iP5KMkmrm6w?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_12  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_6">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="KARTINI MILLENIAL GO EKSPOR 2022 oleh RUMAH BUMN BNI &amp; Disiarkan oleh STN Multimedia"
                                                                src="https://www.youtube.com/embed/NQpRhqZKEeo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/NQpRhqZKEeo?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid5"></iframe></div><noscript><iframe
                                                                title="KARTINI MILLENIAL GO EKSPOR 2022 by RUMAH BUMN BNI &amp; Broadcasted by STN Multimedia"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/NQpRhqZKEeo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_8">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_13  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_7">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Live Streaming Ditjen IKP Kominfo 10 Nov 2021. Didukung Oleh STN Multimedia"
                                                                src="https://www.youtube.com/embed/zgzwd-u5WZo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/zgzwd-u5WZo?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid7"></iframe></div><noscript><iframe
                                                                title="Live Streaming Ditjen IKP Kominfo 10 Nov 2021. Powered By STN Multimedia"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/zgzwd-u5WZo?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_14  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_8">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Kominfo - Meningkatkan Etika &amp; Keterampilan Digital dalam Pemulihan Ekonomi Nasional diMasa Pandemi"
                                                                src="https://www.youtube.com/embed/ZOWgmK2LDWE?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/ZOWgmK2LDWE?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid8"></iframe></div><noscript><iframe
                                                                title="Kominfo - Meningkatkan Etika &amp; Keterampilan Digital dalam Pemulihan Ekonomi Nasional diMasa Pandemi"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/ZOWgmK2LDWE?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_9">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_15  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_9">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Upacara Penutupan Telkom University Virtual Run 2021"
                                                                src="https://www.youtube.com/embed/xrhCoFXYPDg?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/xrhCoFXYPDg?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid10"></iframe></div><noscript><iframe
                                                                title="Closing Ceremony Telkom University Virtual Run 2021"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/xrhCoFXYPDg?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_16  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_10">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Live Streaming PT. STN Multimedia, Siaran Langsung ..."
                                                                src="https://www.youtube.com/embed/KwT9pzaFC2c?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/KwT9pzaFC2c?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid9"></iframe></div><noscript><iframe
                                                                title="Pertamina Live Streaming Via Ms Teams Broadcasted by STN Multimedia"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/KwT9pzaFC2c?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_10">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_17  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_11">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Acara Live Streaming Akad Nikah | Ayu &amp; Fauzan , 12 Desember 2021"
                                                                src="https://www.youtube.com/embed/1eS1ifJIlOY?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/1eS1ifJIlOY?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid12"></iframe></div><noscript><iframe
                                                                title="Live Streaming Acara Akad Nikah | Ayu &amp; Fauzan , 12 Desember 2021"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/1eS1ifJIlOY?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_18  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_12">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Orang Waktu Bisnis Baru, Besar, dan Kebangkitan"
                                                                src="https://www.youtube.com/embed/8sf7RClgfQY?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/8sf7RClgfQY?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid11"></iframe></div><noscript><iframe
                                                                title="People Time New Bussines, Major, and Revival"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/8sf7RClgfQY?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_11">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_19  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_13">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Live Streaming Acara Ngeyeuk Seureuh | Zefanya &amp; Mario"
                                                                src="https://www.youtube.com/embed/l4pjIp7bkX8?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/l4pjIp7bkX8?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid13"></iframe></div><noscript><iframe
                                                                title="Live Streaming Acara Ngeyeuk Seureuh | Zefanya &amp; Mario"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/l4pjIp7bkX8?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_20  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_14">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Live Streaming Acara Siraman &amp; Ngeyeuk Seureuh | Zefanya &amp; Mario"
                                                                src="https://www.youtube.com/embed/j6bgJvt8g5k?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/j6bgJvt8g5k?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid14"></iframe></div><noscript><iframe
                                                                title="Live Streaming Acara Siraman &amp; Ngeyeuk Seureuh | Zefanya &amp; Mario"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/j6bgJvt8g5k?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_12">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_21  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_15">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Dihadiri oleh Anies Baswedan - Wedding Livecam Lamia &amp; Lutfhi 12 Jun 2022"
                                                                src="https://www.youtube.com/embed/jzFCVyBNG1Q?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/jzFCVyBNG1Q?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid15"></iframe></div><noscript><iframe
                                                                title="Attended by Anies Baswedan - Wedding Livecam Lamia &amp; Lutfhi 12 Jun 2022"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/jzFCVyBNG1Q?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_22  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_16">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Siaran Langsung Acara X Moc 10 September 2021"
                                                                src="https://www.youtube.com/embed/D8ug_xOCOJk?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/D8ug_xOCOJk?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid16"></iframe></div><noscript><iframe
                                                                title="X Moc Event Live Streaming 10 Sept 2021"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/D8ug_xOCOJk?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_13">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_23  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_17">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="WEBINAR PENDAMPINGAN PENERAPAN 5R UNTUK IKM KOMPONEN OTOMOTIF DI JAWA BARAT 2021"
                                                                src="https://www.youtube.com/embed/6zA75ntIRLE?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/6zA75ntIRLE?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid17"></iframe></div><noscript><iframe
                                                                title="WEBINAR PENDAMPINGAN PENERAPAN 5R UNTUK IKM KOMPONEN OTOMOTIF DI JAWA BARAT 2021"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/6zA75ntIRLE?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_24  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_18">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Wisuda Virtual SMAN 1 Rengasdengklok"
                                                                src="https://www.youtube.com/embed/W1zoUf35gno?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/W1zoUf35gno?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid18"></iframe></div><noscript><iframe
                                                                title="Graduasi Virtual SMAN 1 Rengasdengklok"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/W1zoUf35gno?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_14">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_25  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_19">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Penandatanganan Perjanjian Kerjasama antara RSUI, ILUNI UI &amp; PT Arogya Mitra Sejati"
                                                                src="https://www.youtube.com/embed/MT2oRtNVW_0?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/MT2oRtNVW_0?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid19"></iframe></div><noscript><iframe
                                                                title="Penandatanganan Perjanjian Kerjasama antara RSUI, ILUNI UI &amp; PT Arogya Mitra Sejati"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/MT2oRtNVW_0?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_26  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_20">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Live Streaming &quot;Pidato Kebangsaan dan Peresmian Gerakan Membangun Kohesi Bangsa ILUNI UI&quot;"
                                                                src="https://www.youtube.com/embed/dqGFxr26g3s?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/dqGFxr26g3s?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid20"></iframe></div><noscript><iframe
                                                                title="Live Streaming &quot;Pidato Kebangsaan dan Peresmian Gerakan Membangun Kohesi Bangsa ILUNI UI&quot;"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/dqGFxr26g3s?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_15">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_27  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_21"> </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_28  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_22">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Acara X Moc Munas 2 12 September 2021"
                                                                src="https://www.youtube.com/embed/bswQFh1y0v0?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/bswQFh1y0v0?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid21"></iframe></div><noscript><iframe
                                                                title="X Moc Munas 2 Event 12 Sept 2021" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/bswQFh1y0v0?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_16">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_29  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_23">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Acara Behind The Scene Kominfo 9 Nov 2021"
                                                                src="https://www.youtube.com/embed/EgGNzyWWNXA?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/EgGNzyWWNXA?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid23"></iframe></div><noscript><iframe
                                                                title="Behind The Scene Event Kominfo 9 Nov 2021"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/EgGNzyWWNXA?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_30  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_24">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Acara Behind The Scene Kominfo 10 Nov 2021"
                                                                src="https://www.youtube.com/embed/O4YHMqsRg0U?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/O4YHMqsRg0U?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid22"></iframe></div><noscript><iframe
                                                                title="Behind The Scene Event Kominfo 10 Nov 2021"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/O4YHMqsRg0U?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_4 et_section_regular">
                                        <div class="et_pb_row et_pb_row_17">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_31  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_3_wrapper et_pb_button_alignment_right et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_3 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://www.youtube.com/c/STNChannelOfficial"
                                                        target="_blank" data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Beberapa Sampel
                                                                Bumper Video</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_5 et_section_regular">
                                        <div class="et_pb_row et_pb_row_18">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_32  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_25">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Contoh Bumper Di Acara Festival #1"
                                                                src="https://www.youtube.com/embed/qDtPwEe-5Dg?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/qDtPwEe-5Dg?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid24"></iframe></div><noscript><iframe
                                                                title="Sample Bumper In Event Festival #1" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/qDtPwEe-5Dg?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_33  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_26">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Logo Bumper STN MULTIMEDIA"
                                                                src="https://www.youtube.com/embed/TC5y05hP-2M?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/TC5y05hP-2M?feature=oembed"
                                                                data-ll-status="loaded" class="entered lazyloaded"
                                                                name="fitvid25"></iframe></div><noscript><iframe
                                                                title="STN MULTIMEDIA Bumper Logo" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/TC5y05hP-2M?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_19">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_34  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_27">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Video Bumper Kominfo, 9 November 2021 | HARI 1"
                                                                src="https://www.youtube.com/embed/7g2ASz_DXh4?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/7g2ASz_DXh4?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid27"></iframe></div><noscript><iframe
                                                                title="Video Bumper Kominfo, 9 November 2021 | DAY 1"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/7g2ASz_DXh4?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_35  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_28">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Video Bumper Kominfo, 10 November 2021 | HARI 2"
                                                                src="https://www.youtube.com/embed/9KG-Y0LOwBs?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/9KG-Y0LOwBs?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid26"></iframe></div><noscript><iframe
                                                                title="Video Bumper Kominfo, 10 November 2021 | DAY 2"
                                                                width="1080" height="608"
                                                                src="https://www.youtube.com/embed/9KG-Y0LOwBs?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_20">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_36  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_29">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Contoh Bumper Di Acara Festival #5"
                                                                src="https://www.youtube.com/embed/JF85PDhztjk?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/JF85PDhztjk?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid29"></iframe></div><noscript><iframe
                                                                title="Sample Bumper In Event Festival #5" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/JF85PDhztjk?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_37  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_30">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Contoh Bumper Di Acara Festival #4"
                                                                src="https://www.youtube.com/embed/_7yLWrf3Rtg?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/_7yLWrf3Rtg?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid28"></iframe></div><noscript><iframe
                                                                title="Sample Bumper In Event Festival #4" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/_7yLWrf3Rtg?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_21">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_38  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_module et_pb_video et_pb_video_31">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Contoh Bumper Di Acara Festival #3"
                                                                src="https://www.youtube.com/embed/8d9m4JqDBOk?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/8d9m4JqDBOk?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid31"></iframe></div><noscript><iframe
                                                                title="Sample Bumper In Event Festival #3" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/8d9m4JqDBOk?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_39  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_video et_pb_video_32">
                                                    <div class="et_pb_video_box">
                                                        <div class="fluid-width-video-wrapper"
                                                            style="padding-top: 56.2963%;"><iframe loading="lazy"
                                                                title="Contoh Bumper Di Acara Festival #2"
                                                                src="https://www.youtube.com/embed/_W54tIWJgVM?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen=""
                                                                data-rocket-lazyload="fitvidscompatible"
                                                                data-lazy-src="https://www.youtube.com/embed/_W54tIWJgVM?feature=oembed"
                                                                data-ll-status="loaded"
                                                                class="entered exited lazyloaded"
                                                                name="fitvid30"></iframe></div><noscript><iframe
                                                                title="Sample Bumper In Event Festival #2" width="1080"
                                                                height="608"
                                                                src="https://www.youtube.com/embed/_W54tIWJgVM?feature=oembed"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                referrerpolicy="strict-origin-when-cross-origin"
                                                                allowfullscreen></iframe></noscript>
                                                    </div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_6 et_section_regular">
                                        <div class="et_pb_row et_pb_row_22">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_40  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_image et_pb_image_8"> <span
                                                        class="et_pb_image_wrap "><img width="1521" height="2560"
                                                            alt="STN-Multimedia-Klien" title="Klien STNM"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-scaled.jpg 1521w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-1280x2154.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-980x1649.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-480x808.jpg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1521px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-scaled.jpg"
                                                            class="entered lazyloaded"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-scaled.jpg"
                                                            data-ll-status="loaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1521px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-scaled.jpg 1521w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-1280x2154.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-980x1649.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-480x808.jpg 480w"><noscript><img
                                                                width="1521" height="2560"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-scaled.jpg"
                                                                alt="STN-Multimedia-Clients" title="STNM Clients"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-scaled.jpg 1521w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-1280x2154.jpg 1280w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-980x1649.jpg 980w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STNM-Clients-480x808.jpg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1521px, 100vw" /></noscript></span>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_7 et_section_regular">
                                        <div class="et_pb_row et_pb_row_23">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_41  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_button_module_wrapper et_pb_button_4_wrapper et_pb_button_alignment_center et_pb_module et_animated fade infinite"
                                                    style="animation-duration: 1000ms; animation-delay: 0ms; opacity: 0; animation-timing-function: ease-in-out;">
                                                    <a class="et_pb_button et_pb_button_4 et_pb_bg_layout_light"
                                                        href="https://wa.me/6285380008900" target="_blank">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Hubungi Kami untuk
                                                                Daftar Harga Live Streaming</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_8 et_section_regular">
                                        <div class="et_pb_row et_pb_row_24">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_42  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_button_module_wrapper et_pb_button_5_wrapper et_pb_button_alignment_center et_pb_module et_animated fade infinite"
                                                    style="animation-duration: 1000ms; animation-delay: 0ms; opacity: 0; animation-timing-function: ease-in-out;">
                                                    <a class="et_pb_button et_pb_button_5 et_pb_bg_layout_light"
                                                        href="https://www.stnmultimedia.com/product/" target="_blank">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Daftar Harga TV LED,
                                                                Sound System, Proyektor, Videotron Dll (Klik Disini!)
                                                            </font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_9 et_pb_with_background et_section_regular">
                                        <div class="et_pb_row et_pb_row_25">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_43  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_4  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4></h4>
                                                        <h4>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Cepat &amp; dapat
                                                                    diandalkan, profesional, dan harga murah.</font>
                                                            </font>
                                                        </h4>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_26">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_44  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_image et_pb_image_9"> <span
                                                        class="et_pb_image_wrap "><img width="960" height="1280"
                                                            alt="STN Multimedia4" title="STN Multimedia4"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4.jpeg 960w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4-480x640.jpeg 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 960px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4.jpeg"
                                                            class="entered lazyloaded"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4.jpeg"
                                                            data-ll-status="loaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 960px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4.jpeg 960w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4-480x640.jpeg 480w"><noscript><img
                                                                width="960" height="1280"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4.jpeg"
                                                                alt="STNMultimedia4" title="STNMultimedia4"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4.jpeg 960w, https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-4-480x640.jpeg 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 960px, 100vw" /></noscript></span>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_27">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_45  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_5  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <h2>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Layanan
                                                                    Multimedia STN</font>
                                                            </font>
                                                        </h2>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_4 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div class="et_pb_section et_pb_section_10 et_section_specialty">
                                        <div class="et_pb_row">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_46 et_pb_css_mix_blend_mode_passthrough et_pb_column_single">
                                                <div
                                                    class="et_pb_module et_pb_image et_pb_image_10 et_pb_section_parallax">
                                                    <span class="et_parallax_bg_wrap"><span
                                                            data-bg="https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-1.jpeg"
                                                            class="et_parallax_bg rocket-lazyload entered lazyloaded"
                                                            style="height: 920.638px; transform: translate(0px, -4188.1px); background-image: url(&quot;https://www.stnmultimedia.com/wp-content/uploads/2021/10/STN-Multimedia-1.jpeg&quot;);"
                                                            data-ll-status="loaded"></span></span> <span
                                                        class="et_pb_image_wrap "><img width="1000" height="1366"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60.png"
                                                            alt="STN-Multimedia-1" title="STN-Multimedia-1"
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60-980x1339.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60-480x656.png 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60.png"
                                                            data-ll-status="loaded" class="entered lazyloaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60-980x1339.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60-480x656.png 480w"><noscript><img
                                                                width="1000" height="1366"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60.png"
                                                                alt="STN-Multimedia-1" title="STN-Multimedia-1"
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60-980x1339.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-60-480x656.png 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw" /></noscript></span>
                                                </div>
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_5 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_47   et_pb_specialty_column  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_row_inner et_pb_row_inner_0 et_pb_row_1-4_1-4">
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_0">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_0  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="3270"
                                                                            height="2070" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png 3270w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-1280x810.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-980x620.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-480x304.png 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 3270px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered et-animated lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png"
                                                                            data-ll-status="loaded"
                                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 3270px, 100vw"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png 3270w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-1280x810.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-980x620.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-480x304.png 480w"><noscript><img
                                                                                width="3270" height="2070"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png 3270w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-1280x810.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-980x620.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-480x304.png 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 3270px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    STREAMING LANGSUNG, DRONE, KAMERA
                                                                                    VIDEO</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_1 et-last-child">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_1  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="910"
                                                                            height="456" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG.png 910w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG-480x241.png 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 910px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered et-animated lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG.png"
                                                                            data-ll-status="loaded"
                                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 910px, 100vw"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG.png 910w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG-480x241.png 480w"><noscript><img
                                                                                width="910" height="456"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG.png 910w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Sound-System-PNG-480x241.png 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 910px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    Sistem suara</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                                <div class="et_pb_row_inner et_pb_row_inner_1 et_pb_row_1-4_1-4">
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_2">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_2  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="920"
                                                                            height="560" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG.jpg 920w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG-480x292.jpg 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 920px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG.jpg"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG.jpg"
                                                                            data-ll-status="loaded"
                                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 920px, 100vw"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG.jpg 920w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG-480x292.jpg 480w"><noscript><img
                                                                                width="920" height="560"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG.jpg"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG.jpg 920w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/TV-PNG-480x292.jpg 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 920px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    TV pintar LED &amp; TV 3D</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_3 et-last-child">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_3  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="1756"
                                                                            height="958" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1.png 1756w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1-1280x698.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1-980x535.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1-480x262.png 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1756px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered exited"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1.png"
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201756%20958'%3E%3C/svg%3E"><noscript><img
                                                                                width="1756" height="958"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1.png 1756w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1-1280x698.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1-980x535.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Projector-PNG-1-480x262.png 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 1756px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    Proyektor</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                                <div class="et_pb_row_inner et_pb_row_inner_2 et_pb_row_1-4_1-4">
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_4">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_4  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="375"
                                                                            height="370" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1.png 375w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1-300x296.png 300w"
                                                                            data-lazy-sizes="(max-width: 375px) 100vw, 375px"
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1.png"
                                                                            data-ll-status="loaded"
                                                                            sizes="(max-width: 375px) 100vw, 375px"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1.png 375w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1-300x296.png 300w"><noscript><img
                                                                                width="375" height="370"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1.png 375w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/kiosk-png-1-300x296.png 300w"
                                                                                sizes="(max-width: 375px) 100vw, 375px"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    Kios &amp; TV layar sentuh</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_5 et-last-child">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_5  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="1000"
                                                                            height="750" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9-980x735.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9-480x360.png 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9.png"
                                                                            data-ll-status="loaded"
                                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9-980x735.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9-480x360.png 480w"><noscript><img
                                                                                width="1000" height="750"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9.png 1000w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9-980x735.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video-wall-png-9-480x360.png 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1000px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    Dinding Video, Konferensi Video
                                                                                    &amp; Videotron</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                                <div class="et_pb_row_inner et_pb_row_inner_3">
                                                    <div
                                                        class="et_pb_column et_pb_column_4_4 et_pb_column_inner et_pb_column_inner_6 et-last-child">
                                                        <div
                                                            class="et_pb_button_module_wrapper et_pb_button_6_wrapper et_pb_button_alignment_center et_pb_module ">
                                                            <a class="et_pb_button et_pb_custom_button_icon et_pb_button_6 et_hover_enabled et_pb_bg_layout_light"
                                                                href="https://www.stnmultimedia.com/product/"
                                                                target="_blank" data-icon="E">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Lihat Semua
                                                                        Layanan</font>
                                                                </font>
                                                            </a> </div>
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div
                                        class="et_pb_section et_pb_section_11 et_pb_with_background et_section_regular">
                                        <div class="et_pb_row et_pb_row_28">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_48  et_pb_css_mix_blend_mode_passthrough et-last-child et_pb_column_empty">
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div
                                        class="et_pb_section et_pb_section_12 et_pb_with_background et_section_specialty">
                                        <div class="et_pb_row">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_49   et_pb_specialty_column  et_pb_css_mix_blend_mode_passthrough">
                                                <div class="et_pb_row_inner et_pb_row_inner_4">
                                                    <div
                                                        class="et_pb_column et_pb_column_4_4 et_pb_column_inner et_pb_column_inner_7 et-last-child">
                                                        <div
                                                            class="et_pb_module et_pb_text et_pb_text_6  et_pb_text_align_left et_pb_bg_layout_dark">
                                                            <div class="et_pb_text_inner">
                                                                <h2>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Mengapa
                                                                            memilih STN Multimedia?</font>
                                                                    </font>
                                                                </h2>
                                                            </div>
                                                        </div> <!-- .et_pb_text -->
                                                        <div
                                                            class="et_pb_module et_pb_divider et_pb_divider_6 et_pb_divider_position_ et_pb_space">
                                                            <div class="et_pb_divider_internal"></div>
                                                        </div>
                                                        <div
                                                            class="et_pb_module et_pb_text et_pb_text_7  et_pb_text_align_left et_pb_bg_layout_dark">
                                                            <div class="et_pb_text_inner">
                                                                <p>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Pelayanan
                                                                            Prima, Produk Berkualitas dan telah lama
                                                                            melayani klien-klien dalam menyampaikan
                                                                            Pesan ataupun Promosi melalui media digital
                                                                            (Multimedia).</font>
                                                                    </font>
                                                                </p>
                                                            </div>
                                                        </div> <!-- .et_pb_text -->
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                                <div class="et_pb_row_inner et_pb_row_inner_5 et_pb_row_1-4_1-4">
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_8">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_6  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_dark">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="820"
                                                                            height="520" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle.jpg 820w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle-480x304.jpg 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 820px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle.jpg"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle.jpg"
                                                                            data-ll-status="loaded"
                                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 820px, 100vw"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle.jpg 820w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle-480x304.jpg 480w"><noscript><img
                                                                                width="820" height="520"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle.jpg"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle.jpg 820w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/211-2111346_professionals-icon-tie-icon-png-circle-480x304.jpg 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) 820px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    PROFESIONAL</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_9 et-last-child">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_7  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_dark">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="3270"
                                                                            height="2070" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png 3270w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-1280x810.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-980x620.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-480x304.png 480w"
                                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 3270px, 100vw"
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png"
                                                                            data-ll-status="loaded"
                                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 3270px, 100vw"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png 3270w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-1280x810.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-980x620.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-480x304.png 480w"><noscript><img
                                                                                width="3270" height="2070"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875.png 3270w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-1280x810.png 1280w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-980x620.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/video_camera_PNG7875-480x304.png 480w"
                                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) and (max-width: 1280px) 1280px, (min-width: 1281px) 3270px, 100vw"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    BERPENGALAMAN</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                                <div class="et_pb_row_inner et_pb_row_inner_6 et_pb_row_1-4_1-4">
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_10">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_8  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_dark">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="42"
                                                                            height="41" alt=""
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/Quality-small.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/Quality-small.png"
                                                                            data-ll-status="loaded"><noscript><img
                                                                                width="42" height="41"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/Quality-small.png"
                                                                                alt=""
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    PRODUK BERKUALITAS</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                    <div
                                                        class="et_pb_column et_pb_column_1_4 et_pb_column_inner et_pb_column_inner_11 et-last-child">
                                                        <div
                                                            class="et_pb_module et_pb_blurb et_pb_blurb_9  et_pb_text_align_center  et_pb_blurb_position_left et_pb_bg_layout_dark">
                                                            <div class="et_pb_blurb_content">
                                                                <div class="et_pb_main_blurb_image"><span
                                                                        class="et_pb_image_wrap"><img width="381"
                                                                            height="216" alt=""
                                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG.png 381w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG-300x170.png 300w"
                                                                            data-lazy-sizes="(max-width: 381px) 100vw, 381px"
                                                                            class="et-waypoint et_pb_animation_off entered lazyloaded"
                                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG.png"
                                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG.png"
                                                                            data-ll-status="loaded"
                                                                            sizes="(max-width: 381px) 100vw, 381px"
                                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG.png 381w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG-300x170.png 300w"><noscript><img
                                                                                width="381" height="216"
                                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG.png"
                                                                                alt=""
                                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG.png 381w, https://www.stnmultimedia.com/wp-content/uploads/2020/05/Discount-Low-Price-Guarantee-PNG-300x170.png 300w"
                                                                                sizes="(max-width: 381px) 100vw, 381px"
                                                                                class="et-waypoint et_pb_animation_off" /></noscript></span>
                                                                </div>
                                                                <div class="et_pb_blurb_container">
                                                                    <h4 class="et_pb_module_header"><span>
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    HARGA MURAH</font>
                                                                            </font>
                                                                        </span></h4>
                                                                </div>
                                                            </div> <!-- .et_pb_blurb_content -->
                                                        </div> <!-- .et_pb_blurb -->
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                                <div class="et_pb_row_inner et_pb_row_inner_7">
                                                    <div
                                                        class="et_pb_column et_pb_column_4_4 et_pb_column_inner et_pb_column_inner_12 et-last-child">
                                                        <div
                                                            class="et_pb_button_module_wrapper et_pb_button_7_wrapper et_pb_button_alignment_left et_pb_module ">
                                                            <a class="et_pb_button et_pb_custom_button_icon et_pb_button_7 et_pb_bg_layout_light"
                                                                href="https://www.stnmultimedia.com/about/"
                                                                target="_blank" data-icon="E">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Lebih Banyak
                                                                        Tentang Kami</font>
                                                                </font>
                                                            </a> </div>
                                                    </div> <!-- .et_pb_column -->
                                                </div> <!-- .et_pb_row_inner -->
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_50 et_pb_css_mix_blend_mode_passthrough et_pb_column_single">
                                                <div class="et_pb_module et_pb_slider et_pb_slider_0 et_pb_slider_fullwidth_off et_pb_slider_no_arrows et_slider_auto et_slider_speed_5500 et_slide_transition_to_next et_pb_bg_layout_dark"
                                                    data-active-slide="et_pb_slide_1">
                                                    <div class="et_pb_slides">
                                                        <div class="et_pb_slide et_pb_slide_0 et_pb_bg_layout_dark et_pb_media_alignment_center et-pb-moved-slide"
                                                            data-slide-id="et_pb_slide_0"
                                                            style="z-index: 2; display: none; opacity: 0;">
                                                            <div class="et_pb_container clearfix"
                                                                style="height: 204.562px;">
                                                                <div class="et_pb_slider_container_inner">
                                                                    <div class="et_pb_slide_description">
                                                                        <div class="et_pb_slide_content">
                                                                            <p>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        "Tenaga kerja Berpengalaman,
                                                                                        Profesional, Tepat Waktu dan
                                                                                        Komitmen"</font>
                                                                                </font>
                                                                            </p>
                                                                        </div>
                                                                    </div> <!-- .et_pb_slide_description -->
                                                                </div>
                                                            </div> <!-- .et_pb_container -->
                                                        </div> <!-- .et_pb_slide -->
                                                        <div class="et_pb_slide et_pb_slide_1 et_pb_bg_layout_dark et_pb_media_alignment_center et-pb-active-slide"
                                                            data-slide-id="et_pb_slide_1"
                                                            style="z-index: 1; display: block; opacity: 1;">
                                                            <div class="et_pb_container clearfix"
                                                                style="height: 204.562px;">
                                                                <div class="et_pb_slider_container_inner">
                                                                    <div class="et_pb_slide_description">
                                                                        <div class="et_pb_slide_content">
                                                                            <p>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        "Produk Berkualitas dan Teruji
                                                                                        dari Brand ternama"</font>
                                                                                </font>
                                                                            </p>
                                                                        </div>
                                                                    </div> <!-- .et_pb_slide_description -->
                                                                </div>
                                                            </div> <!-- .et_pb_container -->
                                                        </div> <!-- .et_pb_slide -->
                                                        <div class="et_pb_slide et_pb_slide_2 et_pb_bg_layout_dark et_pb_media_alignment_center"
                                                            data-slide-id="et_pb_slide_2"
                                                            style="z-index: 1; display: none; opacity: 0;">
                                                            <div class="et_pb_container clearfix"
                                                                style="height: 204.562px;">
                                                                <div class="et_pb_slider_container_inner">
                                                                    <div class="et_pb_slide_description">
                                                                        <div class="et_pb_slide_content">
                                                                            <p>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        "Harga sangat ramah dan
                                                                                        kompetitif"</font>
                                                                                </font>
                                                                            </p>
                                                                        </div>
                                                                    </div> <!-- .et_pb_slide_description -->
                                                                </div>
                                                            </div> <!-- .et_pb_container -->
                                                        </div> <!-- .et_pb_slide -->
                                                    </div> <!-- .et_pb_slides -->
                                                    <div class="et-pb-controllers"><a href="#" class="">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">1</font>
                                                            </font>
                                                        </a><a href="#" class="et-pb-active-control">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">2</font>
                                                            </font>
                                                        </a><a href="#" class="">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">3</font>
                                                            </font>
                                                        </a></div>
                                                </div> <!-- .et_pb_slider -->
                                                <div
                                                    class="et_pb_module et_pb_cta_0 et_hover_enabled et_pb_promo  et_pb_text_align_center et_pb_bg_layout_dark et_pb_no_bg">
                                                    <div class="et_pb_promo_description">
                                                        <div>
                                                            <ul>
                                                                <li>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Streaming
                                                                            Langsung</font>
                                                                    </font>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">SISTEM
                                                                            SUARA</font>
                                                                    </font>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">TV
                                                                            LED/PINTAR/3D/LAYAR SENTUH &amp; KIOS</font>
                                                                    </font>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Drone dan
                                                                            Kamera</font>
                                                                    </font>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            Proyektor, VIDEOTRON Dll</font>
                                                                    </font>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="et_pb_button_wrapper"><a
                                                            class="et_pb_button et_pb_custom_button_icon et_pb_promo_button"
                                                            href="https://www.stnmultimedia.com/contact/"
                                                            target="_blank" data-icon="E">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Dapatkan janji
                                                                    temu</font>
                                                            </font>
                                                        </a></div>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div
                                        class="et_pb_section et_pb_section_13 et_pb_with_background et_section_regular">
                                        <div class="et_pb_row et_pb_row_29">
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_51  et_pb_css_mix_blend_mode_passthrough">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_8  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <h2>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Janji Kami Kepada
                                                                    Anda</font>
                                                            </font>
                                                        </h2>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_module et_pb_divider et_pb_divider_7 et_pb_divider_position_ et_pb_space">
                                                    <div class="et_pb_divider_internal"></div>
                                                </div>
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_9  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">1. KUALITAS
                                                                    PRODUK TINGGI</font>
                                                            </font>
                                                        </p>
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">2. PEMASANGAN
                                                                    TEPAT WAKTU</font>
                                                            </font>
                                                        </p>
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">3. PERAWATAN DAN
                                                                    PEMANTAUAN GRATIS</font>
                                                            </font>
                                                        </p>
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">4.
                                                                    PROFESIONALISME &amp; KUALITAS PELAYANAN YANG TINGGI
                                                                </font>
                                                            </font>
                                                        </p>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_2 et_pb_column_52  et_pb_css_mix_blend_mode_passthrough et-last-child et_pb_column_empty">
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                        <div class="et_pb_row et_pb_row_30">
                                            <div
                                                class="et_pb_column et_pb_column_4_4 et_pb_column_53  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div class="et_pb_module et_pb_image et_pb_image_11"> <span
                                                        class="et_pb_image_wrap "><img width="1068" height="166" alt=""
                                                            title=""
                                                            data-lazy-srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63.png 1068w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63-980x152.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63-480x75.png 480w"
                                                            data-lazy-sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1068px, 100vw"
                                                            data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63.png"
                                                            class="entered lazyloaded"
                                                            src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63.png"
                                                            data-ll-status="loaded"
                                                            sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1068px, 100vw"
                                                            srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63.png 1068w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63-980x152.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63-480x75.png 480w"><noscript><img
                                                                width="1068" height="166"
                                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63.png"
                                                                alt="" title=""
                                                                srcset="https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63.png 1068w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63-980x152.png 980w, https://www.stnmultimedia.com/wp-content/uploads/2020/03/mechanic-63-480x75.png 480w"
                                                                sizes="(min-width: 0px) and (max-width: 480px) 480px, (min-width: 481px) and (max-width: 980px) 980px, (min-width: 981px) 1068px, 100vw" /></noscript></span>
                                                </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                    <div
                                        class="et_pb_section et_pb_section_14 et_pb_with_background et_section_regular">
                                        <div class="et_pb_row et_pb_row_31 et_pb_equal_columns et_pb_gutters1">
                                            <div
                                                class="et_pb_column et_pb_column_1_3 et_pb_column_54  et_pb_css_mix_blend_mode_passthrough">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_10  et_pb_text_align_left et_pb_bg_layout_dark">
                                                    <div class="et_pb_text_inner">
                                                        <h4>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">detail produk
                                                                </font>
                                                            </font>
                                                        </h4>
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Produk lengkap
                                                                    STN Multimedia.</font>
                                                            </font>
                                                        </p>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_8_wrapper et_pb_button_alignment_left et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_8 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://www.stnmultimedia.com/product/" target="_blank"
                                                        data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Rencana &amp; Layanan
                                                            </font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_3 et_pb_column_55  et_pb_css_mix_blend_mode_passthrough">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_11  et_pb_text_align_left et_pb_bg_layout_dark">
                                                    <div class="et_pb_text_inner">
                                                        <h4>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Buat Janji</font>
                                                            </font>
                                                        </h4>
                                                        <p>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Apabila Anda
                                                                    ingin bertemu ataupun datang ke kantor kami.</font>
                                                            </font>
                                                        </p>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_9_wrapper et_pb_button_alignment_center et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_9 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://www.stnmultimedia.com/contact/" target="_blank"
                                                        data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Pesan Online</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                            <div
                                                class="et_pb_column et_pb_column_1_3 et_pb_column_56  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                                <div
                                                    class="et_pb_module et_pb_text et_pb_text_12  et_pb_text_align_left et_pb_bg_layout_light">
                                                    <div class="et_pb_text_inner">
                                                        <h4>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Hubungi kami
                                                                </font>
                                                            </font>
                                                        </h4>
                                                    </div>
                                                </div> <!-- .et_pb_text -->
                                                <div
                                                    class="et_pb_module et_pb_blurb et_pb_blurb_10  et_pb_text_align_left  et_pb_blurb_position_left et_pb_bg_layout_light">
                                                    <div class="et_pb_blurb_content">
                                                        <div class="et_pb_main_blurb_image"><span
                                                                class="et_pb_image_wrap"><span
                                                                    class="et-waypoint et_pb_animation_off et-pb-icon">
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Bahasa
                                                                            Indonesia:</font>
                                                                    </font>
                                                                </span></span></div>
                                                        <div class="et_pb_blurb_container">
                                                            <h4 class="et_pb_module_header"><span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Hubungi
                                                                            kami</font>
                                                                    </font>
                                                                </span></h4>
                                                            <div class="et_pb_blurb_description">
                                                                <p>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Telepon:
                                                                            0853 8000 8900</font>
                                                                    </font>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div> <!-- .et_pb_blurb_content -->
                                                </div> <!-- .et_pb_blurb -->
                                                <div
                                                    class="et_pb_button_module_wrapper et_pb_button_10_wrapper et_pb_button_alignment_center et_pb_module ">
                                                    <a class="et_pb_button et_pb_custom_button_icon et_pb_button_10 et_hover_enabled et_pb_bg_layout_light"
                                                        href="https://wa.me/6285380008900" target="_blank"
                                                        data-icon="E">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Kirimkan Pesan kepada
                                                                Kami</font>
                                                        </font>
                                                    </a> </div>
                                            </div> <!-- .et_pb_column -->
                                        </div> <!-- .et_pb_row -->
                                    </div> <!-- .et_pb_section -->
                                </div><!-- .et_builder_inner_content -->
                            </div><!-- .et-l -->
                        </div><!-- #et-boc -->
                    </div> <!-- .entry-content -->
                </article> <!-- .et_pb_post -->
            </div> <!-- #main-content -->
            <footer id="main-footer">
                <div class="container">
                    <div id="footer-widgets" class="clearfix">
                        <div class="footer-widget">
                            <div id="text-2" class="fwidget et_pb_widget widget_text">
                                <h4 class="title">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">STN Multimedia</font>
                                    </font>
                                </h4>
                                <div class="textwidget">
                                    <p><strong>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Acara Hebat, Vendor Hebat</font>
                                            </font>
                                        </strong></p>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">K-Village Bekasi Blok Aspen No 02
                                            </font>
                                        </font>
                                    </p>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Jl.Raya Merdeka</font>
                                        </font>
                                    </p>
                                    <p>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Kebalen,Bekasi 17610</font>
                                        </font>
                                    </p>
                                </div>
                            </div> <!-- end .fwidget -->
                        </div> <!-- end .footer-widget -->
                        <div class="footer-widget">
                            <div id="text-3" class="fwidget et_pb_widget widget_text">
                                <h4 class="title">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Kontak Kami</font>
                                    </font>
                                </h4>
                                <div class="textwidget">
                                    <p><strong>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Pusat Panggilan</font>
                                            </font>
                                        </strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"> &nbsp; &nbsp;: 0853 8000 8900
                                            </font>
                                        </font><br> <strong>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">SMS&nbsp;</font>
                                            </font>
                                        </strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; : 0853 8000 8900 </font>
                                        </font><br> <strong>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Whatsapp</font>
                                            </font>
                                        </strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"> &nbsp; &nbsp; &nbsp;: 0853 8000 8900
                                            </font>
                                        </font><br> <strong>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Email&nbsp; &nbsp; &nbsp; &nbsp;
                                                    &nbsp; &nbsp; </font>
                                            </font>
                                        </strong>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"> : stnmultimedia@gmail.com</font>
                                        </font>
                                    </p>
                                </div>
                            </div> <!-- end .fwidget -->
                        </div> <!-- end .footer-widget -->
                        <div class="footer-widget">
                            <div id="text-4" class="fwidget et_pb_widget widget_text">
                                <h4 class="title">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Media Sosial</font>
                                    </font>
                                </h4>
                                <div class="textwidget">
                                    <p><a href="#"><img decoding="async"
                                                class="alignnone size-full wp-image-88 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-02_3146790-1.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-02_3146790-1.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-88"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-02_3146790-1.png"
                                                    alt="" width="32" height="32" /></noscript></a>&nbsp; <a
                                            href="#"><img decoding="async"
                                                class="alignnone size-full wp-image-90 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-05_3146787.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-05_3146787.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-90"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-05_3146787.png"
                                                    alt="" width="32" height="32" /></noscript></a>&nbsp; <a
                                            href="#"><img decoding="async"
                                                class="alignnone size-full wp-image-89 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-03_3146786.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-03_3146786.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-89"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-03_3146786.png"
                                                    alt="" width="32" height="32" /></noscript></a>&nbsp; <a
                                            href="#"><img decoding="async"
                                                class="alignnone size-full wp-image-91 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-06_3146788-1.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-06_3146788-1.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-91"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-06_3146788-1.png"
                                                    alt="" width="32" height="32" /></noscript></a><br> <a href="#"><img
                                                decoding="async"
                                                class="alignnone size-full wp-image-86 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social_media_applications_5-line_4102577.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social_media_applications_5-line_4102577.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-86"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social_media_applications_5-line_4102577.png"
                                                    alt="" width="32" height="32" /></noscript></a>&nbsp; <a
                                            href="#"><img decoding="async"
                                                class="alignnone size-full wp-image-92 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_telegram_386727-3.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_telegram_386727-3.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-92"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_telegram_386727-3.png"
                                                    alt="" width="32" height="32" /></noscript></a> &nbsp;<a
                                            href="#"><img decoding="async"
                                                class="alignnone size-full wp-image-87 entered lazyloaded"
                                                src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-01_3146791.png"
                                                alt="" width="32" height="32"
                                                data-lazy-src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-01_3146791.png"
                                                data-ll-status="loaded"><noscript><img decoding="async"
                                                    class="alignnone size-full wp-image-87"
                                                    src="https://www.stnmultimedia.com/wp-content/uploads/2020/03/iconfinder_social-01_3146791.png"
                                                    alt="" width="32" height="32" /></noscript></a> </p>
                                </div>
                            </div> <!-- end .fwidget -->
                        </div> <!-- end .footer-widget -->
                        <div class="footer-widget">
                            <div id="custom_html-2" class="widget_text fwidget et_pb_widget widget_custom_html">
                                <h4 class="title">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Lokasi</font>
                                    </font>
                                </h4>
                                <div class="textwidget custom-html-widget">
                                    <div class="mapouter">
                                        <div class="gmap_canvas"><iframe loading="lazy" width="600" height="500"
                                                id="gmap_canvas"
                                                src="https://maps.google.com/maps?q=sewa%20tv%20nusantara&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                                data-rocket-lazyload="fitvidscompatible"
                                                data-lazy-src="https://maps.google.com/maps?q=sewa%20tv%20nusantara&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                                data-ll-status="loaded"
                                                class="entered exited lazyloaded"></iframe><noscript><iframe width="600"
                                                    height="500" id="gmap_canvas"
                                                    src="https://maps.google.com/maps?q=sewa%20tv%20nusantara&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"></iframe></noscript><a
                                                href="https://123movies-to.org">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">123 film </font>
                                                </font>
                                            </a><br>
                                            <style>
                                                .mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    height: 500px;
                                                    width: 600px;
                                                }
                                            </style><a href="https://www.embedgooglemap.net">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">menyematkan google</font>
                                                </font>
                                            </a>
                                            <style>
                                                .gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    height: 500px;
                                                    width: 600px;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end .fwidget -->
                        </div> <!-- end .footer-widget -->
                    </div> <!-- #footer-widgets -->
                </div> <!-- .container -->
                <div id="footer-bottom">
                    <div class="container clearfix">
                        <div id="footer-info">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Hak Cipta © 2020 stnmultimedia.com - Semua hak
                                    dilindungi undang-undang.</font>
                            </font>
                        </div>
                    </div> <!-- .container -->
                </div>
            </footer> <!-- #main-footer -->
        </div> <!-- #et-main-area -->
    </div> <!-- #page-container -->
    <script type="text/javascript">
        var et_animation_data = [{"class":"et_pb_button_4","style":"fade","repeat":"loop","duration":"1000ms","delay":"0ms","intensity":"50%","starting_opacity":"0%","speed_curve":"ease-in-out"},{"class":"et_pb_button_5","style":"fade","repeat":"loop","duration":"1000ms","delay":"0ms","intensity":"50%","starting_opacity":"0%","speed_curve":"ease-in-out"}];    
    </script> <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () { var options = { whatsapp: "+6285380008900", call: "+6285380008900",  sms: "+6285380008900", line: "",email: "multidigitalrental@gmail.com", greeting_message: "Halo, ada yang bisa dibantu?",  call_to_action: "Contact Us",  button_color: "#E74339",  position: "left",  order: "whatsapp,call, sms, line, email"  }; var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host; var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js'; s.onload = function () { WhWidgetSendButton.init(host, proto, options); }; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); })();    
    </script> <!-- /WhatsHelp.io widget -->
    <script type="text/javascript" id="divi-custom-script-js-extra">
        /* <![CDATA[ */var DIVI = {"item_count":"%d Item","items_count":"%d Items"};var et_shortcodes_strings = {"previous":"Previous","next":"Next"};var et_pb_custom = {"ajaxurl":"https:\/\/www.stnmultimedia.com\/wp-admin\/admin-ajax.php","images_uri":"https:\/\/www.stnmultimedia.com\/wp-content\/themes\/Divi\/images","builder_images_uri":"https:\/\/www.stnmultimedia.com\/wp-content\/themes\/Divi\/includes\/builder\/images","et_frontend_nonce":"96e1ba6209","subscription_failed":"Please, check the fields below to make sure you entered the correct information.","et_ab_log_nonce":"b09c023d1e","fill_message":"Please, fill in the following fields:","contact_error_message":"Please, fix the following errors:","invalid":"Invalid email","captcha":"Captcha","prev":"Prev","previous":"Previous","next":"Next","wrong_captcha":"You entered the wrong number in captcha.","wrong_checkbox":"Checkbox","ignore_waypoints":"no","is_divi_theme_used":"1","widget_search_selector":".widget_search","ab_tests":[],"is_ab_testing_active":"","page_id":"5","unique_test_id":"","ab_bounce_rate":"5","is_cache_plugin_active":"yes","is_shortcode_tracking":"","tinymce_uri":""}; var et_frontend_scripts = {"builderCssContainerPrefix":"#et-boc","builderCssLayoutPrefix":"#et-boc .et-l"};var et_pb_box_shadow_elements = [];var et_pb_motion_elements = {"desktop":[],"tablet":[],"phone":[]};/* ]]> */    
    </script>
    <script data-minify="1" type="text/javascript"
        src="https://www.stnmultimedia.com/wp-content/cache/min/1/wp-content/themes/Divi/js/custom.unified.js?ver=1661870010"
        id="divi-custom-script-js"></script>
    <script data-minify="1" type="text/javascript"
        src="https://www.stnmultimedia.com/wp-content/cache/min/1/wp-content/themes/Divi/core/admin/js/common.js?ver=1661870010"
        id="et-core-common-js"></script>
    <script>
        window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(var i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)    
    </script>
    <script data-no-minify="1" async=""
        src="https://www.stnmultimedia.com/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js">
    </script>
    <div id="goog-gt-tt" class="VIpgJd-yAWNEb-L7lbkb skiptranslate"
        style="border-radius: 12px; margin: 0 0 0 -23px; padding: 0; font-family: 'Google Sans', Arial, sans-serif;"
        data-id="">
        <div id="goog-gt-vt" class="VIpgJd-yAWNEb-hvhgNd">
            <div class=" VIpgJd-yAWNEb-hvhgNd-l4eHX-i3jM8c"><img
                    src="https://fonts.gstatic.com/s/i/productlogos/translate/v14/24px.svg" width="24" height="24"
                    alt=""></div>
            <div class=" VIpgJd-yAWNEb-hvhgNd-k77Iif-i3jM8c">
                <div class="VIpgJd-yAWNEb-hvhgNd-IuizWc" dir="ltr">Teks asli</div>
                <div id="goog-gt-original-text" class="VIpgJd-yAWNEb-nVMfcd-fmcmS VIpgJd-yAWNEb-hvhgNd-axAV1"></div>
            </div>
            <div class="VIpgJd-yAWNEb-hvhgNd-N7Eqid ltr">
                <div class="VIpgJd-yAWNEb-hvhgNd-N7Eqid-B7I4Od ltr" dir="ltr">
                    <div class="VIpgJd-yAWNEb-hvhgNd-UTujCb">Beri rating terjemahan ini</div>
                    <div class="VIpgJd-yAWNEb-hvhgNd-eO9mKe">Masukan Anda akan digunakan untuk membantu meningkatkan
                        kualitas Google Terjemahan</div>
                </div>
                <div class="VIpgJd-yAWNEb-hvhgNd-xgov5 ltr"><button id="goog-gt-thumbUpButton" type="button"
                        class="VIpgJd-yAWNEb-hvhgNd-bgm6sf" title="Terjemahan bagus" aria-label="Terjemahan bagus"
                        aria-pressed="false"><span id="goog-gt-thumbUpIcon"><svg width="24" height="24"
                                viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                                <path
                                    d="M21 7h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 0S7.08 6.85 7 7H2v13h16c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73V9c0-1.1-.9-2-2-2zM7 18H4V9h3v9zm14-7l-3 7H9V8l4.34-4.34L12 9h9v2z">
                                </path>
                            </svg></span><span id="goog-gt-thumbUpIconFilled"><svg width="24" height="24"
                                viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                                <path
                                    d="M21 7h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 0S7.08 6.85 7 7v13h11c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73V9c0-1.1-.9-2-2-2zM5 7H1v13h4V7z">
                                </path>
                            </svg></span></button><button id="goog-gt-thumbDownButton" type="button"
                        class="VIpgJd-yAWNEb-hvhgNd-bgm6sf" title="Terjemahan buruk" aria-label="Terjemahan buruk"
                        aria-pressed="false"><span id="goog-gt-thumbDownIcon"><svg width="24" height="24"
                                viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                                <path
                                    d="M3 17h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 24s7.09-6.85 7.17-7h5V4H6c-.83 0-1.54.5-1.84 1 .22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2zM17 6h3v9h-3V6zM3 13l3-7h9v10l-4.34 4.34L12 15H3v-2z">
                                </path>
                            </svg></span><span id="goog-gt-thumbDownIconFilled"><svg width="24" height="24"
                                viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M">
                                <path
                                    d="M3 17h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 24s7.09-6.85 7.17-7V4H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2zm16 0h4V4h-4v13z">
                                </path>
                            </svg></span></button></div>
            </div>
            <div id="goog-gt-votingHiddenPane" class="VIpgJd-yAWNEb-hvhgNd-aXYTce">
                <form id="goog-gt-votingForm" action="//translate.googleapis.com/translate_voting?client=te_lib"
                    method="post" target="votingFrame" class="VIpgJd-yAWNEb-hvhgNd-aXYTce"><input type="text" name="sl"
                        id="goog-gt-votingInputSrcLang"><input type="text" name="tl"
                        id="goog-gt-votingInputTrgLang"><input type="text" name="query"
                        id="goog-gt-votingInputSrcText"><input type="text" name="gtrans"
                        id="goog-gt-votingInputTrgText"><input type="text" name="vote" id="goog-gt-votingInputVote">
                </form><iframe name="votingFrame" frameborder="0"></iframe>
            </div>
        </div>
    </div><iframe height="0" width="0" style="display: none; visibility: hidden;"></iframe>
</body>

</html>