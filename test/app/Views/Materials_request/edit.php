<!-- DEBUG-VIEW START 2 APPPATH/Views/Materials_request/index.php -->
<!-- DEBUG-VIEW START 1 APPPATH/Views/layout.php -->


<?php

$url1 = base_url();


 require_once 'API/db.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript"  id="debugbar_loader" data-time="1638427877" src="https://intercol.betaholder.com/test/?debugbar"></script><script type="text/javascript"  id="debugbar_dynamic_script"></script><style type="text/css"  id="debugbar_dynamic_style"></style><script class="kint-rich-script">void 0===window.kintShared&&(window.kintShared=function(){"use strict";var e={dedupe:function(e,n){return[].forEach.call(document.querySelectorAll(e),function(e){n&&n.ownerDocument.contains(n)||(n=e),e!==n&&e.parentNode.removeChild(e)}),n},runOnce:function(e){"complete"===document.readyState?e():window.addEventListener("load",e)}};return window.addEventListener("click",function(e){if(e.target.classList.contains("kint-ide-link")){var n=new XMLHttpRequest;n.open("GET",e.target.href),n.send(null),e.preventDefault()}}),e}());
void 0===window.kintRich&&(window.kintRich=function(){"use strict";var n={selectText:function(e){var t=window.getSelection(),a=document.createRange();a.selectNodeContents(e),t.removeAllRanges(),t.addRange(a)},each:function(e,t){Array.prototype.slice.call(document.querySelectorAll(e),0).forEach(t)},hasClass:function(e,t){return!!e.classList&&(void 0===t&&(t="kint-show"),e.classList.contains(t))},addClass:function(e,t){void 0===t&&(t="kint-show"),e.classList.add(t)},removeClass:function(e,t){return void 0===t&&(t="kint-show"),e.classList.remove(t),e},toggle:function(e,t){var a=n.getChildren(e);a&&(void 0===t&&(t=n.hasClass(e)),t?n.removeClass(e):n.addClass(e),1===a.childNodes.length&&(a=a.childNodes[0].childNodes[0])&&n.hasClass(a,"kint-parent")&&n.toggle(a,t))},toggleChildren:function(e,t){var a=n.getChildren(e);if(a){var r=a.getElementsByClassName("kint-parent"),o=r.length;for(void 0===t&&(t=!n.hasClass(e));o--;)n.toggle(r[o],t)}},toggleAll:function(e){for(var t=document.getElementsByClassName("kint-parent"),a=t.length,r=!n.hasClass(e.parentNode);a--;)n.toggle(t[a],r)},switchTab:function(e){var t,a=e.previousSibling,r=0;for(n.removeClass(e.parentNode.getElementsByClassName("kint-active-tab")[0],"kint-active-tab"),n.addClass(e,"kint-active-tab");a;)1===a.nodeType&&r++,a=a.previousSibling;t=e.parentNode.nextSibling.childNodes;for(var o=0;o<t.length;o++)o===r?(t[o].style.display="block",1===t[o].childNodes.length&&(a=t[o].childNodes[0].childNodes[0])&&n.hasClass(a,"kint-parent")&&n.toggle(a,!1)):t[o].style.display="none"},mktag:function(e){return"<"+e+">"},openInNewWindow:function(e){var t=window.open();t&&(t.document.open(),t.document.write(n.mktag("html")+n.mktag("head")+n.mktag("title")+"Kint ("+(new Date).toISOString()+")"+n.mktag("/title")+n.mktag('meta charset="utf-8"')+document.getElementsByClassName("kint-rich-script")[0].outerHTML+document.getElementsByClassName("kint-rich-style")[0].outerHTML+n.mktag("/head")+n.mktag("body")+'<input style="width: 100%" placeholder="Take some notes!"><div class="kint-rich">'+e.parentNode.outerHTML+"</div>"+n.mktag("/body")),t.document.close())},sortTable:function(e,a){var t=e.tBodies[0];[].slice.call(e.tBodies[0].rows).sort(function(e,t){if(e=e.cells[a].textContent.trim().toLocaleLowerCase(),t=t.cells[a].textContent.trim().toLocaleLowerCase(),isNaN(e)||isNaN(t)){if(isNaN(e)&&!isNaN(t))return 1;if(isNaN(t)&&!isNaN(e))return-1}else e=parseFloat(e),t=parseFloat(t);return e<t?-1:t<e?1:0}).forEach(function(e){t.appendChild(e)})},showAccessPath:function(e){for(var t=e.childNodes,a=0;a<t.length;a++)if(n.hasClass(t[a],"access-path"))return void(n.hasClass(t[a],"kint-show")?n.removeClass(t[a]):(n.addClass(t[a]),n.selectText(t[a])))},showSearchBox:function(e){var t=e.querySelector(".kint-search");t&&(n.hasClass(t)?(n.removeClass(t),n.removeClass(e.parentNode,"kint-search-root")):(n.addClass(e),n.addClass(t),t.focus(),t.select(),n.search(t)))},search:function(e){var t=e.parentNode.parentNode;if(e.value.length){var a=n.findMatches(t,e.value);n.highlightMatches(t,a)}else n.removeClass(t,"kint-search-root")},findMatches:function(e,t){for(var a=null,r=0;r<e.children.length;r++)if("DD"===e.children[r].tagName){a=e.children[r];break}if(!a)return[];var o=a.querySelectorAll("dfn"),s=[];return t=t.toLowerCase(),[].forEach.call(o,function(e){-1!=e.innerText.toLowerCase().indexOf(t)&&s.push(e)}),s},highlightMatches:function(e,t){var a=e.querySelectorAll(".kint-search-match");[].forEach.call(a,function(e){n.removeClass(e,"kint-search-match")}),n.addClass(e,"kint-search-root");for(var r=0;r<t.length;r++){for(var o=t[r];o!=e;){if("DL"===o.tagName)n.addClass(o,"kint-search-match");else if("LI"===o.tagName){if(o.parentNode.previousElementSibling.classList.contains("kint-tabs")){var s=[].slice.call(o.parentNode.children).indexOf(o);n.addClass([].slice.call(o.parentNode.previousElementSibling.children)[s],"kint-search-match")}o=o.parentNode}o=o.parentNode}n.addClass(t[r],"kint-search-match")}},getParentByClass:function(e,t){for(void 0===t&&(t="kint-rich");(e=e.parentNode)&&!n.hasClass(e,t););return e},getParentHeader:function(e,t){for(var a=e.nodeName.toLowerCase();"dd"!==a&&"dt"!==a&&n.getParentByClass(e);)a=(e=e.parentNode).nodeName.toLowerCase();return n.getParentByClass(e)?("dd"===a&&t&&(e=e.previousElementSibling),e&&"dt"===e.nodeName.toLowerCase()&&n.hasClass(e,"kint-parent")?e:void 0):null},getChildren:function(e){for(;(e=e.nextElementSibling)&&"dd"!==e.nodeName.toLowerCase(););return e},initLoad:function(){n.style=window.kintShared.dedupe("style.kint-rich-style",n.style),n.script=window.kintShared.dedupe("script.kint-rich-script",n.script),n.folder=window.kintShared.dedupe(".kint-rich.kint-folder",n.folder);var e=document.querySelectorAll("input.kint-search");if([].forEach.call(e,function(a){function e(e){if(window.clearTimeout(r),a.value!==t){var t=a.value;r=window.setTimeout(function(){n.search(a)},500)}}var r=null;a.removeEventListener("keyup",e),a.addEventListener("keyup",e)}),n.folder){var t=n.folder.querySelector("dd");[].forEach.call(document.querySelectorAll(".kint-rich.kint-file"),function(e){e.parentNode!==n.folder&&t.appendChild(e)}),document.body.appendChild(n.folder),n.addClass(n.folder)}},keyboardNav:{targets:[],target:0,active:!1,fetchTargets:function(){n.keyboardNav.targets=[],n.each(".kint-rich nav, .kint-tabs>li:not(.kint-active-tab)",function(e){0===e.offsetWidth&&0===e.offsetHeight||n.keyboardNav.targets.push(e)})},sync:function(e){var t=document.querySelector(".kint-focused");if(t&&n.removeClass(t,"kint-focused"),n.keyboardNav.active){var a=n.keyboardNav.targets[n.keyboardNav.target];n.addClass(a,"kint-focused"),e||n.keyboardNav.scroll(a)}},scroll:function(e){var t=function(e){return e.offsetTop+(e.offsetParent?t(e.offsetParent):0)},a=t(e);if(n.folder){var r=n.folder.querySelector("dd.kint-folder");r.scrollTo(0,a-r.clientHeight/2)}else window.scrollTo(0,a-window.innerHeight/2)},moveCursor:function(e){for(n.keyboardNav.target+=e;n.keyboardNav.target<0;)n.keyboardNav.target+=n.keyboardNav.targets.length;for(;n.keyboardNav.target>=n.keyboardNav.targets.length;)n.keyboardNav.target-=n.keyboardNav.targets.length;n.keyboardNav.sync()},setCursor:function(e){n.keyboardNav.fetchTargets();for(var t=0;t<n.keyboardNav.targets.length;t++)if(e===n.keyboardNav.targets[t])return n.keyboardNav.target=t,!0;return!1}},mouseNav:{lastClickTarget:null,lastClickTimer:null,lastClickCount:0,renewLastClick:function(){window.clearTimeout(n.mouseNav.lastClickTimer),n.mouseNav.lastClickTimer=window.setTimeout(function(){n.mouseNav.lastClickTarget=null,n.mouseNav.lastClickTimer=null,n.mouseNav.lastClickCount=0},250)}},style:null,script:null,folder:null};return window.addEventListener("click",function(e){var t=e.target,a=t.nodeName.toLowerCase();if(n.mouseNav.lastClickTarget&&n.mouseNav.lastClickTimer&&n.mouseNav.lastClickCount)return t=n.mouseNav.lastClickTarget,void(1===n.mouseNav.lastClickCount?(n.toggleChildren(t.parentNode),n.keyboardNav.setCursor(t),n.keyboardNav.sync(!0),n.mouseNav.lastClickCount++,n.mouseNav.renewLastClick()):(n.toggleAll(t),n.keyboardNav.setCursor(t),n.keyboardNav.sync(!0),n.keyboardNav.scroll(t),window.clearTimeout(n.mouseNav.lastClickTimer),n.mouseNav.lastClickTarget=null,n.mouseNav.lastClickTarget=null,n.mouseNav.lastClickCount=0));if(n.getParentByClass(t)){if("dfn"===a)n.selectText(t);else if("th"===a)return void(e.ctrlKey||n.sortTable(t.parentNode.parentNode.parentNode,t.cellIndex));if((t=n.getParentHeader(t))&&(n.keyboardNav.setCursor(t.querySelector("nav")),n.keyboardNav.sync(!0)),t=e.target,"li"===a&&"kint-tabs"===t.parentNode.className)"kint-active-tab"!==t.className&&n.switchTab(t),(t=n.getParentHeader(t,!0))&&(n.keyboardNav.setCursor(t.querySelector("nav")),n.keyboardNav.sync(!0));else if("nav"===a)"footer"===t.parentNode.nodeName.toLowerCase()?(n.keyboardNav.setCursor(t),n.keyboardNav.sync(!0),t=t.parentNode,n.hasClass(t)?n.removeClass(t):n.addClass(t)):(n.toggle(t.parentNode),n.keyboardNav.fetchTargets(),n.mouseNav.lastClickCount=1,n.mouseNav.lastClickTarget=t,n.mouseNav.renewLastClick());else if(n.hasClass(t,"kint-popup-trigger")){var r=t.parentNode;if("footer"===r.nodeName.toLowerCase())r=r.previousSibling;else for(;r&&!n.hasClass(r,"kint-parent");)r=r.parentNode;n.openInNewWindow(r)}else n.hasClass(t,"kint-access-path-trigger")?n.showAccessPath(t.parentNode):n.hasClass(t,"kint-search-trigger")?n.showSearchBox(t.parentNode):n.hasClass(t,"kint-search")||("pre"===a&&3===e.detail?n.selectText(t):n.getParentByClass(t,"kint-source")&&3===e.detail?n.selectText(n.getParentByClass(t,"kint-source")):n.hasClass(t,"access-path")?n.selectText(t):"a"!==a&&(t=n.getParentHeader(t))&&(n.toggle(t),n.keyboardNav.fetchTargets()))}},!0),window.addEventListener("keydown",function(e){if(e.target===document.body&&!e.altKey&&!e.ctrlKey){if(68===e.keyCode){if(n.keyboardNav.active)n.keyboardNav.active=!1;else if(n.keyboardNav.active=!0,n.keyboardNav.fetchTargets(),0===n.keyboardNav.targets.length)return void(n.keyboardNav.active=!1);return n.keyboardNav.sync(),void e.preventDefault()}if(n.keyboardNav.active){if(9===e.keyCode)return n.keyboardNav.moveCursor(e.shiftKey?-1:1),void e.preventDefault();if(38===e.keyCode||75===e.keyCode)return n.keyboardNav.moveCursor(-1),void e.preventDefault();if(40===e.keyCode||74===e.keyCode)return n.keyboardNav.moveCursor(1),void e.preventDefault();var t=n.keyboardNav.targets[n.keyboardNav.target];if("li"===t.nodeName.toLowerCase()){if(32===e.keyCode||13===e.keyCode)return n.switchTab(t),n.keyboardNav.fetchTargets(),n.keyboardNav.sync(),void e.preventDefault();if(39===e.keyCode||76===e.keyCode)return n.keyboardNav.moveCursor(1),void e.preventDefault();if(37===e.keyCode||72===e.keyCode)return n.keyboardNav.moveCursor(-1),void e.preventDefault()}if(t=t.parentNode,65===e.keyCode)return n.showAccessPath(t),void e.preventDefault();if("footer"===t.nodeName.toLowerCase()&&n.hasClass(t.parentNode,"kint-rich"))32===e.keyCode||13===e.keyCode?(n.hasClass(t)?n.removeClass(t):n.addClass(t),e.preventDefault()):37===e.keyCode||72===e.keyCode?(n.removeClass(t),e.preventDefault()):39!==e.keyCode&&76!==e.keyCode||(n.addClass(t),e.preventDefault());else{if(32===e.keyCode||13===e.keyCode)return n.toggle(t),n.keyboardNav.fetchTargets(),void e.preventDefault();if(39===e.keyCode||76===e.keyCode||37===e.keyCode||72===e.keyCode){var a=37===e.keyCode||72===e.keyCode;if(n.hasClass(t))n.toggleChildren(t,a),n.toggle(t,a);else{if(a){var r=n.getParentHeader(t.parentNode.parentNode,!0);r&&(t=r,n.keyboardNav.setCursor(t.querySelector("nav")),n.keyboardNav.sync())}n.toggle(t,a)}return n.keyboardNav.fetchTargets(),void e.preventDefault()}}}}},!0),n}()),window.kintShared.runOnce(window.kintRich.initLoad);
void 0===window.kintMicrotimeInitialized&&(window.kintMicrotimeInitialized=1,window.addEventListener("load",function(){"use strict";var c={},i=Array.prototype.slice.call(document.querySelectorAll("[data-kint-microtime-group]"),0);i.forEach(function(i){if(i.querySelector(".kint-microtime-lap")){var t=i.getAttribute("data-kint-microtime-group"),e=parseFloat(i.querySelector(".kint-microtime-lap").innerHTML),r=parseFloat(i.querySelector(".kint-microtime-avg").innerHTML);void 0===c[t]&&(c[t]={}),(void 0===c[t].min||c[t].min>e)&&(c[t].min=e),(void 0===c[t].max||c[t].max<e)&&(c[t].max=e),c[t].avg=r}}),i.forEach(function(i){var t=i.querySelector(".kint-microtime-lap");if(null!==t){var e=parseFloat(t.textContent),r=i.dataset.kintMicrotimeGroup,o=c[r].avg,n=c[r].max,a=c[r].min;e===(i.querySelector(".kint-microtime-avg").textContent=o)&&e===a&&e===n||(t.style.background=o<e?"hsl("+(40-40*((e-o)/(n-o)))+", 100%, 65%)":"hsl("+(40+80*(o===a?0:(o-e)/(o-a)))+", 100%, 65%)")}})}));
</script><style class="kint-rich-style">.kint-rich{font-size:13px;overflow-x:auto;white-space:nowrap;background:rgba(255,255,255,0.9)}.kint-rich.kint-folder{position:fixed;bottom:0;left:0;right:0;z-index:999999;width:100%;margin:0;display:none}.kint-rich.kint-folder.kint-show{display:block}.kint-rich.kint-folder dd.kint-folder{max-height:calc(100vh - 100px);padding-right:8px;overflow-y:scroll}.kint-rich::selection,.kint-rich::-moz-selection,.kint-rich::-webkit-selection{background:#aaa;color:#1d1e1e}.kint-rich .kint-focused{box-shadow:0 0 3px 2px red}.kint-rich,.kint-rich::before,.kint-rich::after,.kint-rich *,.kint-rich *::before,.kint-rich *::after{box-sizing:border-box;border-radius:0;color:#1d1e1e;float:none !important;font-family:Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;line-height:15px;margin:0;padding:0;text-align:left}.kint-rich{margin:8px 0}.kint-rich dt,.kint-rich dl{width:auto}.kint-rich dt,.kint-rich div.access-path{background:#f8f8f8;border:1px solid #d7d7d7;color:#1d1e1e;display:block;font-weight:bold;list-style:none outside none;overflow:auto;padding:4px}.kint-rich dt:hover,.kint-rich div.access-path:hover{border-color:#aaa}.kint-rich>dl dl{padding:0 0 0 12px}.kint-rich dt.kint-parent>nav,.kint-rich>footer>nav{background:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAxNTAiPjxwYXRoIGQ9Ik02IDdoMThsLTkgMTV6bTAgMzBoMThsLTkgMTV6bTAgNDVoMThsLTktMTV6bTAgMzBoMThsLTktMTV6bTAgMTJsMTggMThtLTE4IDBsMTgtMTgiIGZpbGw9IiM1NTUiLz48cGF0aCBkPSJNNiAxMjZsMTggMThtLTE4IDBsMTgtMTgiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlPSIjNTU1Ii8+PC9zdmc+") no-repeat scroll 0 0/15px 75px transparent;cursor:pointer;display:inline-block;height:15px;width:15px;margin-right:3px;vertical-align:middle}.kint-rich dt.kint-parent:hover>nav,.kint-rich>footer>nav:hover{background-position:0 25%}.kint-rich dt.kint-parent.kint-show>nav,.kint-rich>footer.kint-show>nav{background-position:0 50%}.kint-rich dt.kint-parent.kint-show:hover>nav,.kint-rich>footer.kint-show>nav:hover{background-position:0 75%}.kint-rich dt.kint-parent.kint-locked>nav{background-position:0 100%}.kint-rich dt.kint-parent+dd{display:none;border-left:1px dashed #d7d7d7}.kint-rich dt.kint-parent.kint-show+dd{display:block}.kint-rich var,.kint-rich var a{color:#06f;font-style:normal}.kint-rich dt:hover var,.kint-rich dt:hover var a{color:red}.kint-rich dfn{font-style:normal;font-family:monospace;color:#1d1e1e}.kint-rich pre{color:#1d1e1e;margin:0 0 0 12px;padding:5px;overflow-y:hidden;border-top:0;border:1px solid #d7d7d7;background:#f8f8f8;display:block;word-break:normal}.kint-rich .kint-popup-trigger,.kint-rich .kint-access-path-trigger,.kint-rich .kint-search-trigger{background:rgba(29,30,30,0.8);border-radius:3px;height:16px;font-size:16px;margin-left:5px;font-weight:bold;width:16px;text-align:center;float:right !important;cursor:pointer;color:#f8f8f8;position:relative;overflow:hidden;line-height:17.6px}.kint-rich .kint-popup-trigger:hover,.kint-rich .kint-access-path-trigger:hover,.kint-rich .kint-search-trigger:hover{color:#1d1e1e;background:#f8f8f8}.kint-rich dt.kint-parent>.kint-popup-trigger{line-height:19.2px}.kint-rich .kint-search-trigger{font-size:20px}.kint-rich input.kint-search{display:none;border:1px solid #d7d7d7;border-top-width:0;border-bottom-width:0;padding:4px;float:right !important;margin:-4px 0;color:#1d1e1e;background:#f8f8f8;height:24px;width:160px;position:relative;z-index:100}.kint-rich input.kint-search.kint-show{display:block}.kint-rich .kint-search-root ul.kint-tabs>li:not(.kint-search-match){background:#f8f8f8;opacity:0.5}.kint-rich .kint-search-root dl:not(.kint-search-match){opacity:0.5}.kint-rich .kint-search-root dl:not(.kint-search-match)>dt{background:#f8f8f8}.kint-rich .kint-search-root dl:not(.kint-search-match) dl,.kint-rich .kint-search-root dl:not(.kint-search-match) ul.kint-tabs>li:not(.kint-search-match){opacity:1}.kint-rich div.access-path{background:#f8f8f8;display:none;margin-top:5px;padding:4px;white-space:pre}.kint-rich div.access-path.kint-show{display:block}.kint-rich footer{padding:0 3px 3px;font-size:9px;background:transparent}.kint-rich footer>.kint-popup-trigger{background:transparent;color:#1d1e1e}.kint-rich footer nav{height:10px;width:10px;background-size:10px 50px}.kint-rich footer>ol{display:none;margin-left:32px}.kint-rich footer.kint-show>ol{display:block}.kint-rich a{color:#1d1e1e;text-shadow:none;text-decoration:underline}.kint-rich a:hover{color:#1d1e1e;border-bottom:1px dotted #1d1e1e}.kint-rich ul{list-style:none;padding-left:12px}.kint-rich ul:not(.kint-tabs) li{border-left:1px dashed #d7d7d7}.kint-rich ul:not(.kint-tabs) li>dl{border-left:none}.kint-rich ul.kint-tabs{margin:0 0 0 12px;padding-left:0;background:#f8f8f8;border:1px solid #d7d7d7;border-top:0}.kint-rich ul.kint-tabs>li{background:#f8f8f8;border:1px solid #d7d7d7;cursor:pointer;display:inline-block;height:24px;margin:2px;padding:0 12px;vertical-align:top}.kint-rich ul.kint-tabs>li:hover,.kint-rich ul.kint-tabs>li.kint-active-tab:hover{border-color:#aaa;color:red}.kint-rich ul.kint-tabs>li.kint-active-tab{background:#f8f8f8;border-top:0;margin-top:-1px;height:27px;line-height:24px}.kint-rich ul.kint-tabs>li:not(.kint-active-tab){line-height:20px}.kint-rich ul.kint-tabs li+li{margin-left:0}.kint-rich ul:not(.kint-tabs)>li:not(:first-child){display:none}.kint-rich dt:hover+dd>ul>li.kint-active-tab{border-color:#aaa;color:red}.kint-rich dt>.kint-color-preview{width:16px;height:16px;display:inline-block;vertical-align:middle;margin-left:10px;border:1px solid #d7d7d7;background-color:#ccc;background-image:url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2 2"><path fill="%23FFF" d="M0 0h1v2h1V1H0z"/></svg>');background-size:100%}.kint-rich dt>.kint-color-preview:hover{border-color:#aaa}.kint-rich dt>.kint-color-preview>div{width:100%;height:100%}.kint-rich table{border-collapse:collapse;empty-cells:show;border-spacing:0}.kint-rich table *{font-size:12px}.kint-rich table dt{background:none;padding:2px}.kint-rich table dt .kint-parent{min-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.kint-rich table td,.kint-rich table th{border:1px solid #d7d7d7;padding:2px;vertical-align:center}.kint-rich table th{cursor:alias}.kint-rich table td:first-child,.kint-rich table th{font-weight:bold;background:#f8f8f8;color:#1d1e1e}.kint-rich table td{background:#f8f8f8;white-space:pre}.kint-rich table td>dl{padding:0}.kint-rich table pre{border-top:0;border-right:0}.kint-rich table thead th:first-child{background:none;border:0}.kint-rich table tr:hover>td{box-shadow:0 0 1px 0 #aaa inset}.kint-rich table tr:hover var{color:red}.kint-rich table ul.kint-tabs li.kint-active-tab{height:20px;line-height:17px}.kint-rich pre.kint-source{margin-left:-1px}.kint-rich pre.kint-source[data-kint-filename]:before{display:block;content:attr(data-kint-filename);margin-bottom:4px;padding-bottom:4px;border-bottom:1px solid #f8f8f8}.kint-rich pre.kint-source>div:before{display:inline-block;content:counter(kint-l);counter-increment:kint-l;border-right:1px solid #aaa;padding-right:8px;margin-right:8px}.kint-rich pre.kint-source>div.kint-highlight{background:#f8f8f8}.kint-rich .kint-microtime-lap{text-shadow:-1px 0 #aaa,0 1px #aaa,1px 0 #aaa,0 -1px #aaa;color:#f8f8f8;font-weight:bold}.kint-rich .kint-focused{box-shadow:0 0 3px 2px red}.kint-rich dt{font-weight:normal}.kint-rich dt.kint-parent{margin-top:4px}.kint-rich dl dl{margin-top:4px;padding-left:25px;border-left:none}.kint-rich>dl>dt{background:#f8f8f8}.kint-rich ul{margin:0;padding-left:0}.kint-rich ul:not(.kint-tabs)>li{border-left:0}.kint-rich ul.kint-tabs{background:#f8f8f8;border:1px solid #d7d7d7;border-width:0 1px 1px 1px;padding:4px 0 0 12px;margin-left:-1px;margin-top:-1px}.kint-rich ul.kint-tabs li,.kint-rich ul.kint-tabs li+li{margin:0 0 0 4px}.kint-rich ul.kint-tabs li{border-bottom-width:0;height:25px}.kint-rich ul.kint-tabs li:first-child{margin-left:0}.kint-rich ul.kint-tabs li.kint-active-tab{border-top:1px solid #d7d7d7;background:#fff;font-weight:bold;padding-top:0;border-bottom:1px solid #fff !important;margin-bottom:-1px}.kint-rich ul.kint-tabs li.kint-active-tab:hover{border-bottom:1px solid #fff}.kint-rich ul>li>pre{border:1px solid #d7d7d7}.kint-rich dt:hover+dd>ul{border-color:#aaa}.kint-rich pre{background:#fff;margin-top:4px;margin-left:25px}.kint-rich .kint-source{margin-left:-1px}.kint-rich .kint-source .kint-highlight{background:#cfc}.kint-rich .kint-parent.kint-show>.kint-search{border-bottom-width:1px}.kint-rich table td{background:#fff}.kint-rich table td>dl{padding:0;margin:0}.kint-rich table td>dl>dt.kint-parent{margin:0}.kint-rich table td:first-child,.kint-rich table td,.kint-rich table th{padding:2px 4px}.kint-rich table dd,.kint-rich table dt{background:#fff}.kint-rich table tr:hover>td{box-shadow:none;background:#cfc}
</style>

	<meta charset="UTF-8">
	<title>InterCol Admin Console</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/png" href="https://intercol.betaholder.com/test/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="https://intercol.betaholder.com/test/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="//getbootstrap.com/docs/5.1/examples/sidebars/sidebars.css">
	<meta name="theme-color" content="#7952b3">
	<meta name="X-CSRF-TOKEN" content="b00b057f6d970879d988b9725283f613" />	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<style type="text/css">
	.sidebar-menu button {
		width: 100%;
	}
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">InterCol</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				
					
					
				</ul>
				<ul class="navbar-nav float-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">admin</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="https://intercol.betaholder.com/test/home/logout">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	
<div class="container-fluid">
		<div class="row">
			<div class="col-2">
				<div class="flex-shrink-0 bg-white">
					<p></p>
				    <ul class="list-unstyled ps-0 sidebar-menu">
				      <li class="mb-1">
				      	<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
				          Home
				        </button>
				        <div class="collapse " id="home-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/dashboard" class="text-secondary">Dashboard</a></li>
				          </ul>
				        </div>
				      </li>
				      
						
					
			    
  
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Employees_collapse" aria-expanded="false">
				         Employees
				        </button>
				        <div class="collapse " id="Employees_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/employees" class="text-secondary">Employees</a></li>
				            
				          </ul>
				        </div>
				      </li>  

				      
				      <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#staffs-collapse" aria-expanded="false">
				          Users & Privileges
				        </button>
				        <div class="collapse " id="staffs-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/staffs" class="text-secondary">Users</a></li>
				          <!--  <li><a href="https://intercol.betaholder.com/test/staffs/list/supervisor" class="text-secondary">Supervisors</a></li>-->
				         </ul>
				        </div>
				      </li>
				      
				      
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Category_collapse" aria-expanded="false">
				        Category
				        </button>
				        <div class="collapse " id="Category_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/jobs" class="text-secondary">Category</a></li>
				            
				          </ul>
				        </div>
				      </li>  
				      
				      
				      
				         <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#location-collapse" aria-expanded="false">
				         Location
				        </button>
				        <div class="collapse " id="location-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/Cmpny" class="text-secondary">Company</a></li>
				            <li><a href="https://intercol.betaholder.com/test/Plot" class="text-secondary">Plot</a></li>
				             <li><a href="https://intercol.betaholder.com/test/Site" class="text-secondary">Site Master</a></li>
				          </ul>
				        </div>
				      </li>
				      
				      
				        
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Item-collapse" aria-expanded="false">
				         Item
				        </button>
				        <div class="collapse " id="Item-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/Unit" class="text-secondary">Unit</a></li>
				            <li><a href="https://intercol.betaholder.com/test/Segment" class="text-secondary">Segment</a></li>
				             <li><a href="https://intercol.betaholder.com/test/P_category" class="text-secondary">Product Category</a></li>
				              <li><a href="https://intercol.betaholder.com/test/materials" class="text-secondary">Materials</a></li>
				          </ul>
				        </div>
				      </li>
				      
				      
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Supplier_collapse" aria-expanded="false">
				         Supplier Request
				        </button>
				        <div class="collapse " id="Supplier_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/Supplier" class="text-primary">Supplier Request</a></li>
				            
				          </ul>
				        </div>
				      </li>  
				    
				          <li class="mb-1">
				        <button class="btn btn-toggle align-items-center rounded " data-bs-toggle="collapse" data-bs-target="#material_collapse" aria-expanded="false">
				         Materials Request
				        </button>
				        <div class="collapse show " id="material_collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
				            <li><a href="https://intercol.betaholder.com/test/materials_request" class="text-primary">Materials Request</a></li>
				           
				            
				          </ul>
				        </div>
				      </li>  
				      
				      <li class="border-top my-3"></li>
				    </ul>
				</div>		
					
							
			</div>
			
			
			
			<div class="col-10">
				<p></p>
								<h1 class="display-4 text-capitalize">
 Materials Request
  <!--<button class="btn btn-light text-primary" title="Add" data-toggle="modal" data-target="#material-add-Modal">-->
    <!--<i class="far fa-plus-square"></i> Add-->
  <!--</button>-->
</h1>
<hr>	
	



<?php echo form_open_multipart(base_url('/Materials_request/update/'.$materials_request['id']), [
	'method' => 'post',
	'id' => 'form-materials-edit',
	'onsubmit' => 'materialEdit(event, this);'
])?>
<hr>

	<div class="form-group">
		<label>Material Request ID</label>
		<input type="text" name="name1" id="name" value="<?=$materials_request['met_id']?>" class="form-control required" required>
	</div>
	
	<div class="form-group">
		<label>Status</label>
	
		   <select name="Status" id="Status" class="form-control">
		
                <option value="<?=$materials_request['status']?>"><?=$materials_request['status']?> </option>
                <option value="Approved" <?php if($materials_request['status']=='Approved'):?> selected <?php endif;?>>Approved</option>
                <option value="Cancel" <?php if($materials_request['status']=='Cancel'):?> selected <?php endif;?>>Cancel</option>
                <option value="Pending" <?php if($materials_request['status']=='Pending'):?>  selected <?php endif;?>>Pending</option>
               
              </select>
              
              	</div>
              	
              	
              	<div class="form-group">
            		   	<label>Supplier</label> 
                 <select name="Supplier" id="Status" class="form-control">
              		  	<?php	
	  	$log_in="select * from Supplier where id='".$materials_request['s_id']."' ";

	        $log_in_rs=mysqli_query($conn,$log_in);
	        
	     
			  while($row2 = mysqli_fetch_array($log_in_rs))
  {
    $name=$row2['name'];  
   
  ?>
			
  
                  
                  	<option value='<?=$materials_request['s_id']?>'><?=$name?></option> 
              		  
                   	
                  <?php
                   }
                   ?>

              		  
              	<?php	  foreach ($Supplier as $supplier):?>
              		  
              		  
		
		
                <option value="<?=$supplier['sup_id']?>"><?=$supplier['name']?> </option>
                 <?php endforeach;  ?>
              </select>
            
              
		  
	</div>
              	
              	
              	
              	
              		<div class="form-group">
              		    	<label> Purchase Mode</label>
               <select name="purchase" id="Status" class="form-control">
                   
               	<?php
               	
                             		  	
	  	$log_in1="select * from purchase where purchase_id='".$materials_request['p_id']."' ";

	        $log_in_rs1=mysqli_query($conn,$log_in1);
	        
	     
			  while($row3 = mysqli_fetch_array($log_in_rs1))
  {
    $name=$row3['purchase_mode']; ?>
                   	<option value='<?=$materials_request['p_id']?>'><?=$name?></option>
                   	
                  <?php
                   }
                   ?>
		  <?php foreach ($Purchase as $purchase):?>
		  
		
                <option value="<?=$purchase['purchase_mode']?>"><?=$purchase['purchase_mode']?> </option>
               <?php  endforeach; ?>
               
              </select>
              
              
            	</div>
            	
            <div class="form-group">
                
            <input type="file" name="avatar" />
               	</div> 		
            		
	
	<div class="modal-footer">
	  
	     <button type="submit" class="btn btn-primary">Save Changes</button>
	</div>
</form>







</body>
</html>