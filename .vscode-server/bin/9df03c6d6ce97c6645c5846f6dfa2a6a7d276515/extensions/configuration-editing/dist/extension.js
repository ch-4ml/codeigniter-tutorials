!function(e,t){for(var n in t)e[n]=t[n]}(exports,function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=4)}([function(e,t){e.exports=require("path")},function(e,t){e.exports=require("vscode")},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r,o,i,a,s,l=n(0),u=n(5),c=Object.prototype.toString;function f(e){return void 0!==e}function d(e){return"[object String]"===c.call(e)}function p(e){return JSON.parse(u.readFileSync(e,"utf8"))}function g(e,t){return s&&(e="［"+e.replace(/[aouei]/g,"$&$&")+"］"),0===t.length?e:e.replace(/\{(\d+)\}/g,function(e,n){var r=n[0],o=t[r],i=e;return"string"==typeof o?i=o:"number"!=typeof o&&"boolean"!=typeof o&&void 0!==o&&null!==o||(i=String(o)),i})}function h(e){return function(t,n){for(var r=[],o=2;o<arguments.length;o++)r[o-2]=arguments[o];return function(e){return"[object Number]"===c.call(e)}(t)?t>=e.length?void console.error("Broken localize call found. Index out of bounds. Stacktrace is\n: "+new Error("").stack):g(e[t],r):d(n)?(console.warn("Message "+n+" didn't get externalized correctly."),g(n,r)):void console.error("Broken localize call found. Stacktrace is\n: "+new Error("").stack)}}function m(e,t){for(var n=[],r=2;r<arguments.length;r++)n[r-2]=arguments[r];return g(t,n)}function v(e,t){return i[e]=t,t}function b(e,t){var n,r=l.join(a.cacheRoot,e.id+"-"+e.hash+".json"),o=!1,i=!1;try{return n=JSON.parse(u.readFileSync(r,{encoding:"utf8",flag:"r"})),function(e){var t=new Date;u.utimes(e,t,t,function(){})}(r),n}catch(e){if("ENOENT"===e.code)i=!0;else{if(!(e instanceof SyntaxError))throw e;console.log("Syntax error parsing message bundle: "+e.message+"."),u.unlink(r,function(e){e&&console.error("Deleting corrupted bundle "+r+" failed.")}),o=!0}}if(!(n=function(e,t){var n=a.translationsConfig[e.id];if(n){var r=p(n).contents,o=p(l.join(t,"nls.metadata.json")),i=Object.create(null);for(var s in o){var u=o[s],c=r[e.outDir+"/"+s];if(c){for(var f=[],g=0;g<u.keys.length;g++){var h=u.keys[g],m=c[d(h)?h:h.key];void 0===m&&(m=u.messages[g]),f.push(m)}i[s]=f}else i[s]=u.messages}return i}}(e,t))||o)return n;if(i)try{u.writeFileSync(r,JSON.stringify(n),{encoding:"utf8",flag:"wx"})}catch(e){if("EEXIST"===e.code)return n;throw e}return n}function y(e){try{return function(e){var t=p(l.join(e,"nls.metadata.json")),n=Object.create(null);for(var r in t){var o=t[r];n[r]=o.messages}return n}(e)}catch(e){return void console.log("Generating default bundle from meta data failed.",e)}}function C(e,t){var n;if(!0===a.languagePackSupport&&void 0!==a.cacheRoot&&void 0!==a.languagePackId&&void 0!==a.translationsConfigFile&&void 0!==a.translationsConfig)try{n=b(e,t)}catch(e){console.log("Load or create bundle failed ",e)}if(!n){if(a.languagePackSupport)return y(t);var r=function(e){for(var t=a.locale;t;){var n=l.join(e,"nls.bundle."+t+".json");if(u.existsSync(n))return n;var r=t.lastIndexOf("-");t=r>0?t.substring(0,r):void 0}if(void 0===t&&(n=l.join(e,"nls.bundle.json"),u.existsSync(n)))return n}(t);if(r)try{return p(r)}catch(e){console.log("Loading in the box message bundle failed.",e)}n=y(t)}return n}function w(e){if(!e)return m;var t=l.extname(e);if(t&&(e=e.substr(0,e.length-t.length)),a.messageFormat===r.both||a.messageFormat===r.bundle){var n=function(e){for(var t,n=l.dirname(e);t=l.join(n,"nls.metadata.header.json"),!u.existsSync(t);){var r=l.dirname(n);if(r===n){t=void 0;break}n=r}return t}(e);if(n){var o=l.dirname(n),c=i[o];if(void 0===c)try{var d=JSON.parse(u.readFileSync(n,"utf8"));try{var g=C(d,o);c=v(o,g?{header:d,nlsBundle:g}:null)}catch(e){console.error("Failed to load nls bundle",e),c=v(o,null)}}catch(e){console.error("Failed to read header file",e),c=v(o,null)}if(c){var b=e.substr(o.length+1).replace(/\\/g,"/"),y=c.nlsBundle[b];return void 0===y?(console.error("Messages for file "+e+" not found. See console for details."),function(){return"Messages not found."}):h(y)}}}if(a.messageFormat===r.both||a.messageFormat===r.file)try{var w=p(function(e){var t;if(a.cacheLanguageResolution&&t)t=t;else{if(s||!a.locale)t=".nls.json";else for(var n=a.locale;n;){var r=".nls."+n+".json";if(u.existsSync(e+r)){t=r;break}var o=n.lastIndexOf("-");o>0?n=n.substring(0,o):(t=".nls.json",n=null)}a.cacheLanguageResolution&&(t=t)}return e+t}(e));return Array.isArray(w)?h(w):f(w.messages)&&f(w.keys)?h(w.messages):(console.error("String bundle '"+e+"' uses an unsupported format."),function(){return"File bundle has unsupported format. See console for details"})}catch(e){"ENOENT"!==e.code&&console.error("Failed to load single file bundle",e)}return console.error("Failed to load message bundle for file "+e),function(){return"Failed to load message bundle. See console for details."}}!function(e){e.file="file",e.bundle="bundle",e.both="both"}(r=t.MessageFormat||(t.MessageFormat={})),function(e){e.is=function(e){var t=e;return t&&f(t.key)&&f(t.comment)}}(o||(o={})),function(){if(a={locale:void 0,languagePackSupport:!1,cacheLanguageResolution:!0,messageFormat:r.bundle},d(process.env.VSCODE_NLS_CONFIG))try{var e=JSON.parse(process.env.VSCODE_NLS_CONFIG);if(d(e.locale)&&(a.locale=e.locale.toLowerCase()),function(e){return!0===e||!1===e}(e._languagePackSupport)&&(a.languagePackSupport=e._languagePackSupport),d(e._cacheRoot)&&(a.cacheRoot=e._cacheRoot),d(e._languagePackId)&&(a.languagePackId=e._languagePackId),d(e._translationsConfigFile)){a.translationsConfigFile=e._translationsConfigFile;try{a.translationsConfig=p(a.translationsConfigFile)}catch(t){e._corruptedFile&&u.writeFile(e._corruptedFile,"corrupted","utf8",function(e){console.error(e)})}}}catch(e){}s="pseudo"===a.locale,void 0,i=Object.create(null)}(),t.loadMessageBundle=w,t.config=function(e){return e&&(d(e.locale)&&(a.locale=e.locale.toLowerCase(),void 0,i=Object.create(null)),void 0!==e.messageFormat&&(a.messageFormat=e.messageFormat)),s="pseudo"===a.locale,w}},function(e,t,n){"use strict";function r(e,t){void 0===t&&(t=!1);var n=0,r=e.length,s="",l=0,u=16,c=0,f=0,d=0,p=0,g=0;function h(t,r){for(var o=0,i=0;o<t||!r;){var a=e.charCodeAt(n);if(a>=48&&a<=57)i=16*i+a-48;else if(a>=65&&a<=70)i=16*i+a-65+10;else{if(!(a>=97&&a<=102))break;i=16*i+a-97+10}n++,o++}return o<t&&(i=-1),i}function m(){if(s="",g=0,l=n,f=c,p=d,n>=r)return l=r,u=17;var t=e.charCodeAt(n);if(o(t)){do{n++,s+=String.fromCharCode(t),t=e.charCodeAt(n)}while(o(t));return u=15}if(i(t))return n++,s+=String.fromCharCode(t),13===t&&10===e.charCodeAt(n)&&(n++,s+="\n"),c++,d=n,u=14;switch(t){case 123:return n++,u=1;case 125:return n++,u=2;case 91:return n++,u=3;case 93:return n++,u=4;case 58:return n++,u=6;case 44:return n++,u=5;case 34:return n++,s=function(){for(var t="",o=n;;){if(n>=r){t+=e.substring(o,n),g=2;break}var a=e.charCodeAt(n);if(34===a){t+=e.substring(o,n),n++;break}if(92!==a){if(a>=0&&a<=31){if(i(a)){t+=e.substring(o,n),g=2;break}g=6}n++}else{if(t+=e.substring(o,n),++n>=r){g=2;break}switch(a=e.charCodeAt(n++)){case 34:t+='"';break;case 92:t+="\\";break;case 47:t+="/";break;case 98:t+="\b";break;case 102:t+="\f";break;case 110:t+="\n";break;case 114:t+="\r";break;case 116:t+="\t";break;case 117:var s=h(4,!0);s>=0?t+=String.fromCharCode(s):g=4;break;default:g=5}o=n}}return t}(),u=10;case 47:var m=n-1;if(47===e.charCodeAt(n+1)){for(n+=2;n<r&&!i(e.charCodeAt(n));)n++;return s=e.substring(m,n),u=12}if(42===e.charCodeAt(n+1)){n+=2;for(var b=r-1,y=!1;n<b;){var C=e.charCodeAt(n);if(42===C&&47===e.charCodeAt(n+1)){n+=2,y=!0;break}n++,i(C)&&(13===C&&10===e.charCodeAt(n)&&n++,c++,d=n)}return y||(n++,g=1),s=e.substring(m,n),u=13}return s+=String.fromCharCode(t),n++,u=16;case 45:if(s+=String.fromCharCode(t),++n===r||!a(e.charCodeAt(n)))return u=16;case 48:case 49:case 50:case 51:case 52:case 53:case 54:case 55:case 56:case 57:return s+=function(){var t=n;if(48===e.charCodeAt(n))n++;else for(n++;n<e.length&&a(e.charCodeAt(n));)n++;if(n<e.length&&46===e.charCodeAt(n)){if(!(++n<e.length&&a(e.charCodeAt(n))))return g=3,e.substring(t,n);for(n++;n<e.length&&a(e.charCodeAt(n));)n++}var r=n;if(n<e.length&&(69===e.charCodeAt(n)||101===e.charCodeAt(n)))if((++n<e.length&&43===e.charCodeAt(n)||45===e.charCodeAt(n))&&n++,n<e.length&&a(e.charCodeAt(n))){for(n++;n<e.length&&a(e.charCodeAt(n));)n++;r=n}else g=3;return e.substring(t,r)}(),u=11;default:for(;n<r&&v(t);)n++,t=e.charCodeAt(n);if(l!==n){switch(s=e.substring(l,n)){case"true":return u=8;case"false":return u=9;case"null":return u=7}return u=16}return s+=String.fromCharCode(t),n++,u=16}}function v(e){if(o(e)||i(e))return!1;switch(e){case 125:case 93:case 123:case 91:case 34:case 58:case 44:case 47:return!1}return!0}return{setPosition:function(e){n=e,s="",l=0,u=16,g=0},getPosition:function(){return n},scan:t?function(){var e;do{e=m()}while(e>=12&&e<=15);return e}:m,getToken:function(){return u},getTokenValue:function(){return s},getTokenOffset:function(){return l},getTokenLength:function(){return n-l},getTokenStartLine:function(){return f},getTokenStartCharacter:function(){return l-p},getTokenError:function(){return g}}}function o(e){return 32===e||9===e||11===e||12===e||160===e||5760===e||e>=8192&&e<=8203||8239===e||8287===e||12288===e||65279===e}function i(e){return 10===e||13===e||8232===e||8233===e}function a(e){return e>=48&&e<=57}function s(e,t,n){var o,i,a,s,c;if(t){for(s=t.offset,c=s+t.length,a=s;a>0&&!u(e,a-1);)a--;for(var f=c;f<e.length&&!u(e,f);)f++;i=e.substring(a,f),o=function(e,t){var n=0,r=0,o=t.tabSize||4;for(;n<e.length;){var i=e.charAt(n);if(" "===i)r++;else{if("\t"!==i)break;r+=o}n++}return Math.floor(r/o)}(i,n)}else i=e,o=0,a=0,s=0,c=e.length;var d,p=function(e,t){for(var n=0;n<t.length;n++){var r=t.charAt(n);if("\r"===r)return n+1<t.length&&"\n"===t.charAt(n+1)?"\r\n":"\r";if("\n"===r)return"\n"}return e&&e.eol||"\n"}(n,e),g=!1,h=0;d=n.insertSpaces?l(" ",n.tabSize||4):"\t";var m=r(i,!1),v=!1;function b(){return p+l(d,o+h)}function y(){var e=m.scan();for(g=!1;15===e||14===e;)g=g||14===e,e=m.scan();return v=16===e||0!==m.getTokenError(),e}var C=[];function w(t,n,r){!v&&n<c&&r>s&&e.substring(n,r)!==t&&C.push({offset:n,length:r-n,content:t})}var k=y();if(17!==k){var S=m.getTokenOffset()+a;w(l(d,o),a,S)}for(;17!==k;){for(var A=m.getTokenOffset()+m.getTokenLength()+a,x=y(),T="";!g&&(12===x||13===x);){w(" ",A,m.getTokenOffset()+a),A=m.getTokenOffset()+m.getTokenLength()+a,T=12===x?b():"",x=y()}if(2===x)1!==k&&(h--,T=b());else if(4===x)3!==k&&(h--,T=b());else{switch(k){case 3:case 1:h++,T=b();break;case 5:case 12:T=b();break;case 13:T=g?b():" ";break;case 6:T=" ";break;case 10:if(6===x){T="";break}case 7:case 8:case 9:case 11:case 2:case 4:12===x||13===x?T=" ":5!==x&&17!==x&&(v=!0);break;case 16:v=!0}!g||12!==x&&13!==x||(T=b())}w(T,A,m.getTokenOffset()+a),k=x}return C}function l(e,t){for(var n="",r=0;r<t;r++)n+=e;return n}function u(e,t){return-1!=="\r\n".indexOf(e.charAt(t))}var c;function f(e,t,n){void 0===t&&(t=[]),void 0===n&&(n=c.DEFAULT);var r={type:"array",offset:-1,length:-1,children:[],parent:void 0};function o(e){"property"===r.type&&(r.length=e-r.offset,r=r.parent)}function i(e){return r.children.push(e),e}p(e,{onObjectBegin:function(e){r=i({type:"object",offset:e,length:-1,parent:r,children:[]})},onObjectProperty:function(e,t,n){(r=i({type:"property",offset:t,length:-1,parent:r,children:[]})).children.push({type:"string",value:e,offset:t,length:n,parent:r})},onObjectEnd:function(e,t){r.length=e+t-r.offset,r=r.parent,o(e+t)},onArrayBegin:function(e,t){r=i({type:"array",offset:e,length:-1,parent:r,children:[]})},onArrayEnd:function(e,t){r.length=e+t-r.offset,r=r.parent,o(e+t)},onLiteralValue:function(e,t,n){i({type:g(e),offset:t,length:n,parent:r,value:e}),o(t+n)},onSeparator:function(e,t,n){"property"===r.type&&(":"===e?r.colonOffset=t:","===e&&o(t))},onError:function(e,n,r){t.push({error:e,offset:n,length:r})}},n);var a=r.children[0];return a&&delete a.parent,a}function d(e,t){if(e){for(var n=e,r=0,o=t;r<o.length;r++){var i=o[r];if("string"==typeof i){if("object"!==n.type||!Array.isArray(n.children))return;for(var a=!1,s=0,l=n.children;s<l.length;s++){var u=l[s];if(Array.isArray(u.children)&&u.children[0].value===i){n=u.children[1],a=!0;break}}if(!a)return}else{var c=i;if("array"!==n.type||c<0||!Array.isArray(n.children)||c>=n.children.length)return;n=n.children[c]}}return n}}function p(e,t,n){void 0===n&&(n=c.DEFAULT);var o=r(e,!1);function i(e){return e?function(){return e(o.getTokenOffset(),o.getTokenLength(),o.getTokenStartLine(),o.getTokenStartCharacter())}:function(){return!0}}function a(e){return e?function(t){return e(t,o.getTokenOffset(),o.getTokenLength(),o.getTokenStartLine(),o.getTokenStartCharacter())}:function(){return!0}}var s=i(t.onObjectBegin),l=a(t.onObjectProperty),u=i(t.onObjectEnd),f=i(t.onArrayBegin),d=i(t.onArrayEnd),p=a(t.onLiteralValue),g=a(t.onSeparator),h=i(t.onComment),m=a(t.onError),v=n&&n.disallowComments,b=n&&n.allowTrailingComma;function y(){for(;;){var e=o.scan();switch(o.getTokenError()){case 4:C(14);break;case 5:C(15);break;case 3:C(13);break;case 1:v||C(11);break;case 2:C(12);break;case 6:C(16)}switch(e){case 12:case 13:v?C(10):h();break;case 16:C(1);break;case 15:case 14:break;default:return e}}}function C(e,t,n){if(void 0===t&&(t=[]),void 0===n&&(n=[]),m(e),t.length+n.length>0)for(var r=o.getToken();17!==r;){if(-1!==t.indexOf(r)){y();break}if(-1!==n.indexOf(r))break;r=y()}}function w(e){var t=o.getTokenValue();return e?p(t):l(t),y(),!0}function k(){switch(o.getToken()){case 3:return function(){f(),y();for(var e=!1;4!==o.getToken()&&17!==o.getToken();){if(5===o.getToken()){if(e||C(4,[],[]),g(","),y(),4===o.getToken()&&b)break}else e&&C(6,[],[]);k()||C(4,[],[4,5]),e=!0}return d(),4!==o.getToken()?C(8,[4],[]):y(),!0}();case 1:return function(){s(),y();for(var e=!1;2!==o.getToken()&&17!==o.getToken();){if(5===o.getToken()){if(e||C(4,[],[]),g(","),y(),2===o.getToken()&&b)break}else e&&C(6,[],[]);(10!==o.getToken()?(C(3,[],[2,5]),0):(w(!1),6===o.getToken()?(g(":"),y(),k()||C(4,[],[2,5])):C(5,[],[2,5]),1))||C(4,[],[2,5]),e=!0}return u(),2!==o.getToken()?C(7,[2],[]):y(),!0}();case 10:return w(!0);default:return function(){switch(o.getToken()){case 11:var e=0;try{"number"!=typeof(e=JSON.parse(o.getTokenValue()))&&(C(2),e=0)}catch(e){C(2)}p(e);break;case 7:p(null);break;case 8:p(!0);break;case 9:p(!1);break;default:return!1}return y(),!0}()}}return y(),17===o.getToken()||(k()?(17!==o.getToken()&&C(9,[],[]),!0):(C(4,[],[]),!1))}function g(e){switch(typeof e){case"boolean":return"boolean";case"number":return"number";case"string":return"string";default:return"null"}}function h(e,t,n,r,o){for(var i,a=t.slice(),s=f(e,[]),l=void 0,u=void 0;a.length>0&&(u=a.pop(),void 0===(l=d(s,a))&&void 0!==n);)"string"==typeof u?((i={})[u]=n,n=i):n=[n];if(l){if("object"===l.type&&"string"==typeof u&&Array.isArray(l.children)){var c=d(l,[u]);if(void 0!==c){if(void 0===n){if(!c.parent)throw new Error("Malformed AST");var p=l.children.indexOf(c.parent),g=void 0,h=c.parent.offset+c.parent.length;if(p>0)g=(k=l.children[p-1]).offset+k.length;else if(g=l.offset+1,l.children.length>1)h=l.children[1].offset;return m(e,{offset:g,length:h-g,content:""},r)}return m(e,{offset:c.offset,length:c.length,content:JSON.stringify(n)},r)}if(void 0===n)return[];var v=JSON.stringify(u)+": "+JSON.stringify(n),b=o?o(l.children.map(function(e){return e.children[0].value})):l.children.length,y=void 0;return m(e,y=b>0?{offset:(k=l.children[b-1]).offset+k.length,length:0,content:","+v}:0===l.children.length?{offset:l.offset+1,length:0,content:v}:{offset:l.offset+1,length:0,content:v+","},r)}if("array"===l.type&&"number"==typeof u&&Array.isArray(l.children)){if(-1===u){v=""+JSON.stringify(n),y=void 0;if(0===l.children.length)y={offset:l.offset+1,length:0,content:v};else y={offset:(k=l.children[l.children.length-1]).offset+k.length,length:0,content:","+v};return m(e,y,r)}if(void 0===n&&l.children.length>=0){var C=u,w=l.children[C];y=void 0;if(1===l.children.length)y={offset:l.offset+1,length:l.length-2,content:""};else if(l.children.length-1===C){var k,S=(k=l.children[C-1]).offset+k.length;y={offset:S,length:l.offset+l.length-2-S,content:""}}else y={offset:w.offset,length:l.children[C+1].offset-w.offset,content:""};return m(e,y,r)}throw new Error("Array modification not supported yet")}throw new Error("Can not add "+("number"!=typeof u?"index":"property")+" to parent of type "+l.type)}if(void 0===n)throw new Error("Can not delete in empty document");return m(e,{offset:s?s.offset:0,length:s?s.length:0,content:JSON.stringify(n)},r)}function m(e,t,n){var r=v(e,t),o=t.offset,i=t.offset+t.content.length;if(0===t.length||0===t.content.length){for(;o>0&&!u(r,o-1);)o--;for(;i<r.length&&!u(r,i);)i++}for(var a=s(r,{offset:o,length:i-o},n),l=a.length-1;l>=0;l--){var c=a[l];r=v(r,c),o=Math.min(o,c.offset),i=Math.max(i,c.offset+c.length),i+=c.content.length-c.length}return[{offset:o,length:e.length-(r.length-i)-o,content:r.substring(o,i)}]}function v(e,t){return e.substring(0,t.offset)+t.content+e.substring(t.offset+t.length)}n.r(t),function(e){e.DEFAULT={allowTrailingComma:!1}}(c||(c={})),n.d(t,"createScanner",function(){return b}),n.d(t,"getLocation",function(){return y}),n.d(t,"parse",function(){return C}),n.d(t,"parseTree",function(){return w}),n.d(t,"findNodeAtLocation",function(){return k}),n.d(t,"findNodeAtOffset",function(){return S}),n.d(t,"getNodePath",function(){return A}),n.d(t,"getNodeValue",function(){return x}),n.d(t,"visit",function(){return T}),n.d(t,"stripComments",function(){return O}),n.d(t,"printParseErrorCode",function(){return I}),n.d(t,"format",function(){return j}),n.d(t,"modify",function(){return P}),n.d(t,"applyEdits",function(){return E});var b=r,y=function(e,t){var n=[],r=new Object,o=void 0,i={value:{},offset:0,length:0,type:"object",parent:void 0},a=!1;function s(e,t,n,r){i.value=e,i.offset=t,i.length=n,i.type=r,i.colonOffset=void 0,o=i}try{p(e,{onObjectBegin:function(e,i){if(t<=e)throw r;o=void 0,a=t>e,n.push("")},onObjectProperty:function(e,o,i){if(t<o)throw r;if(s(e,o,i,"property"),n[n.length-1]=e,t<=o+i)throw r},onObjectEnd:function(e,i){if(t<=e)throw r;o=void 0,n.pop()},onArrayBegin:function(e,i){if(t<=e)throw r;o=void 0,n.push(0)},onArrayEnd:function(e,i){if(t<=e)throw r;o=void 0,n.pop()},onLiteralValue:function(e,n,o){if(t<n)throw r;if(s(e,n,o,g(e)),t<=n+o)throw r},onSeparator:function(e,i,s){if(t<=i)throw r;if(":"===e&&o&&"property"===o.type)o.colonOffset=i,a=!1,o=void 0;else if(","===e){var l=n[n.length-1];"number"==typeof l?n[n.length-1]=l+1:(a=!0,n[n.length-1]=""),o=void 0}}})}catch(e){if(e!==r)throw e}return{path:n,previousNode:o,isAtPropertyKey:a,matches:function(e){for(var t=0,r=0;t<e.length&&r<n.length;r++)if(e[t]===n[r]||"*"===e[t])t++;else if("**"!==e[t])return!1;return t===e.length}}},C=function(e,t,n){void 0===t&&(t=[]),void 0===n&&(n=c.DEFAULT);var r=null,o=[],i=[];function a(e){Array.isArray(o)?o.push(e):r&&(o[r]=e)}return p(e,{onObjectBegin:function(){var e={};a(e),i.push(o),o=e,r=null},onObjectProperty:function(e){r=e},onObjectEnd:function(){o=i.pop()},onArrayBegin:function(){var e=[];a(e),i.push(o),o=e,r=null},onArrayEnd:function(){o=i.pop()},onLiteralValue:a,onError:function(e,n,r){t.push({error:e,offset:n,length:r})}},n),o[0]},w=f,k=d,S=function e(t,n,r){if(void 0===r&&(r=!1),function(e,t,n){return void 0===n&&(n=!1),t>=e.offset&&t<e.offset+e.length||n&&t===e.offset+e.length}(t,n,r)){var o=t.children;if(Array.isArray(o))for(var i=0;i<o.length&&o[i].offset<=n;i++){var a=e(o[i],n,r);if(a)return a}return t}},A=function e(t){if(!t.parent||!t.parent.children)return[];var n=e(t.parent);if("property"===t.parent.type){var r=t.parent.children[0].value;n.push(r)}else if("array"===t.parent.type){var o=t.parent.children.indexOf(t);-1!==o&&n.push(o)}return n},x=function e(t){switch(t.type){case"array":return t.children.map(e);case"object":for(var n=Object.create(null),r=0,o=t.children;r<o.length;r++){var i=o[r],a=i.children[1];a&&(n[i.children[0].value]=e(a))}return n;case"null":case"string":case"number":case"boolean":return t.value;default:return}},T=p,O=function(e,t){var n,o,i=r(e),a=[],s=0;do{switch(o=i.getPosition(),n=i.scan()){case 12:case 13:case 17:s!==o&&a.push(e.substring(s,o)),void 0!==t&&a.push(i.getTokenValue().replace(/[^\r\n]/g,t)),s=i.getPosition()}}while(17!==n);return a.join("")};function I(e){switch(e){case 1:return"InvalidSymbol";case 2:return"InvalidNumberFormat";case 3:return"PropertyNameExpected";case 4:return"ValueExpected";case 5:return"ColonExpected";case 6:return"CommaExpected";case 7:return"CloseBraceExpected";case 8:return"CloseBracketExpected";case 9:return"EndOfFileExpected";case 10:return"InvalidCommentToken";case 11:return"UnexpectedEndOfComment";case 12:return"UnexpectedEndOfString";case 13:return"UnexpectedEndOfNumber";case 14:return"InvalidUnicode";case 15:return"InvalidEscapeCharacter";case 16:return"InvalidCharacter"}return"<unknown ParseErrorCode>"}function j(e,t,n){return s(e,t,n)}function P(e,t,n,r){return h(e,t,n,r.formattingOptions,r.getInsertionIndex)}function E(e,t){for(var n=t.length-1;n>=0;n--)e=v(e,t[n]);return e}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});const r=n(3),o=n(0),i=n(1),a=n(2),s=n(6),l=a.loadMessageBundle(n(0).join(__dirname,"extension.ts")),u=i.window.createTextEditorDecorationType({light:{color:"#757575"},dark:{color:"#878787"}});let c;function f(e){return i.languages.registerCompletionItemProvider({language:"jsonc",pattern:e},{provideCompletionItems(e,t,n){const o=r.getLocation(e.getText(),e.offsetAt(t));if(!o.isAtPropertyKey&&o.previousNode&&"string"===o.previousNode.type){const n=e.lineAt(t.line).text.indexOf("$"),r=n>=0?new i.Position(t.line,n):t;return[{label:"workspaceFolder",detail:l(0,null)},{label:"workspaceFolderBasename",detail:l(1,null)},{label:"relativeFile",detail:l(2,null)},{label:"relativeFileDirname",detail:l(3,null)},{label:"file",detail:l(4,null)},{label:"cwd",detail:l(5,null)},{label:"lineNumber",detail:l(6,null)},{label:"selectedText",detail:l(7,null)},{label:"fileDirname",detail:l(8,null)},{label:"fileExtname",detail:l(9,null)},{label:"fileBasename",detail:l(10,null)},{label:"fileBasenameNoExtension",detail:l(11,null)},{label:"defaultBuildTask",detail:l(12,null)}].map(e=>({label:"${"+e.label+"}",range:new i.Range(r,t),detail:e.detail}))}return[]}})}function d(e,t){const n=e&&e.recommendations||[];if(Array.isArray(n)){const e=i.extensions.all.filter(e=>!(e.id.startsWith("vscode.")||"Microsoft.vscode-markdown"===e.id||n.indexOf(e.id)>-1));if(e.length)return e.map(e=>{const n=new i.CompletionItem(e.id),r=`"${e.id}"`;return n.kind=i.CompletionItemKind.Value,n.insertText=r,n.range=t,n.filterText=r,n});{const e=new i.CompletionItem(l(13,null));return e.insertText='"vscode.csharp"',e.kind=i.CompletionItemKind.Value,e.range=t,[e]}}}function p(e){if(!e||"launch.json"!==o.basename(e.document.fileName))return;const t=[];let n=!1,a=0;r.visit(e.document.getText(),{onObjectProperty:(r,o,s)=>{(n="version"===r||"type"===r||"request"===r||"compounds"===r||"configurations"===r&&0===a)&&t.push(new i.Range(e.document.positionAt(o),e.document.positionAt(o+s)))},onLiteralValue:(r,o,a)=>{n&&t.push(new i.Range(e.document.positionAt(o),e.document.positionAt(o+a)))},onArrayBegin:(e,t)=>{a++},onArrayEnd:(e,t)=>{a--}}),e.setDecorations(u,t)}t.activate=function(e){e.subscriptions.push(i.languages.registerCompletionItemProvider({language:"jsonc",pattern:"**/settings.json"},{provideCompletionItems:(e,t,n)=>new s.SettingsDocument(e).provideCompletionItems(t,n)})),e.subscriptions.push(...[i.languages.registerCompletionItemProvider({pattern:"**/extensions.json"},{provideCompletionItems(e,t,n){const o=r.getLocation(e.getText(),e.offsetAt(t)),a=e.getWordRangeAtPosition(t)||new i.Range(t,t);if("recommendations"===o.path[0]){const t=r.parse(e.getText());return d(t,a)}return[]}}),i.languages.registerCompletionItemProvider({pattern:"**/*.code-workspace"},{provideCompletionItems(e,t,n){const o=r.getLocation(e.getText(),e.offsetAt(t)),a=e.getWordRangeAtPosition(t)||new i.Range(t,t);if("extensions"===o.path[0]&&"recommendations"===o.path[1]){const t=r.parse(e.getText()).extensions;return d(t,a)}return[]}})]),e.subscriptions.push(f("**/launch.json")),e.subscriptions.push(f("**/tasks.json")),e.subscriptions.push(i.window.onDidChangeActiveTextEditor(e=>p(e),null,e.subscriptions)),e.subscriptions.push(i.workspace.onDidChangeTextDocument(e=>{i.window.activeTextEditor&&e.document===i.window.activeTextEditor.document&&(c&&clearTimeout(c),c=setTimeout(()=>p(i.window.activeTextEditor),1e3))},null,e.subscriptions)),p(i.window.activeTextEditor)},i.languages.registerDocumentSymbolProvider({pattern:"**/launch.json",language:"jsonc"},{provideDocumentSymbols(e,t){const n=[];let o="",a="",s=0,l=0;return r.visit(e.getText(),{onObjectProperty:(e,t,n)=>{a=e},onLiteralValue:(e,t,n)=>{"name"===a&&(o=e)},onObjectBegin:(e,t)=>{2===++l&&(s=e)},onObjectEnd:(t,r)=>{o&&2===l&&n.push(new i.SymbolInformation(o,i.SymbolKind.Object,new i.Range(e.positionAt(s),e.positionAt(t)))),l--}}),n}},{label:"Launch Targets"})},function(e,t){e.exports=require("fs")},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});const r=n(1),o=n(3),i=n(2).loadMessageBundle(n(0).join(__dirname,"settingsDocumentHelper.ts"));t.SettingsDocument=class{constructor(e){this.document=e}provideCompletionItems(e,t){const n=o.getLocation(this.document.getText(),this.document.offsetAt(e)),i=this.document.getWordRangeAtPosition(e)||new r.Range(e,e);return"window.title"===n.path[0]?this.provideWindowTitleCompletionItems(n,i):"files.associations"===n.path[0]?this.provideFilesAssociationsCompletionItems(n,i):"files.exclude"===n.path[0]||"search.exclude"===n.path[0]?this.provideExcludeCompletionItems(n,i):"files.defaultLanguage"===n.path[0]?this.provideLanguageCompletionItems(n,i):this.provideLanguageOverridesCompletionItems(n,e)}provideWindowTitleCompletionItems(e,t){const n=[];return n.push(this.newSimpleCompletionItem("${activeEditorShort}",t,i(0,null))),n.push(this.newSimpleCompletionItem("${activeEditorMedium}",t,i(1,null))),n.push(this.newSimpleCompletionItem("${activeEditorLong}",t,i(2,null))),n.push(this.newSimpleCompletionItem("${activeFolderShort}",t,i(3,null))),n.push(this.newSimpleCompletionItem("${activeFolderMedium}",t,i(4,null))),n.push(this.newSimpleCompletionItem("${activeFolderLong}",t,i(5,null))),n.push(this.newSimpleCompletionItem("${rootName}",t,i(6,null))),n.push(this.newSimpleCompletionItem("${rootPath}",t,i(7,null))),n.push(this.newSimpleCompletionItem("${folderName}",t,i(8,null))),n.push(this.newSimpleCompletionItem("${folderPath}",t,i(9,null))),n.push(this.newSimpleCompletionItem("${appName}",t,i(10,null))),n.push(this.newSimpleCompletionItem("${remoteName}",t,i(11,null))),n.push(this.newSimpleCompletionItem("${dirty}",t,i(12,null))),n.push(this.newSimpleCompletionItem("${separator}",t,i(13,null))),Promise.resolve(n)}provideFilesAssociationsCompletionItems(e,t){const n=[];if(2===e.path.length){if(e.isAtPropertyKey&&""!==e.path[1])return this.provideLanguageCompletionItems(e,t);n.push(this.newSnippetCompletionItem({label:i(14,null),documentation:i(15,null),snippet:e.isAtPropertyKey?'"*.${1:extension}": "${2:language}"':'{ "*.${1:extension}": "${2:language}" }',range:t})),n.push(this.newSnippetCompletionItem({label:i(16,null),documentation:i(17,null),snippet:e.isAtPropertyKey?'"/${1:path to file}/*.${2:extension}": "${3:language}"':'{ "/${1:path to file}/*.${2:extension}": "${3:language}" }',range:t}))}return Promise.resolve(n)}provideExcludeCompletionItems(e,t){const n=[];return 1===e.path.length?(n.push(this.newSnippetCompletionItem({label:i(18,null),documentation:i(19,null),snippet:e.isAtPropertyKey?'"**/*.${1:extension}": true':'{ "**/*.${1:extension}": true }',range:t})),n.push(this.newSnippetCompletionItem({label:i(20,null),documentation:i(21,null),snippet:e.isAtPropertyKey?'"**/*.{ext1,ext2,ext3}": true':'{ "**/*.{ext1,ext2,ext3}": true }',range:t})),n.push(this.newSnippetCompletionItem({label:i(22,null),documentation:i(23,null),snippet:e.isAtPropertyKey?'"**/*.${1:source-extension}": { "when": "$(basename).${2:target-extension}" }':'{ "**/*.${1:source-extension}": { "when": "$(basename).${2:target-extension}" } }',range:t})),n.push(this.newSnippetCompletionItem({label:i(24,null),documentation:i(25,null),snippet:e.isAtPropertyKey?'"${1:name}": true':'{ "${1:name}": true }',range:t})),n.push(this.newSnippetCompletionItem({label:i(26,null),documentation:i(27,null),snippet:e.isAtPropertyKey?'"{folder1,folder2,folder3}": true':'{ "{folder1,folder2,folder3}": true }',range:t})),n.push(this.newSnippetCompletionItem({label:i(28,null),documentation:i(29,null),snippet:e.isAtPropertyKey?'"**/${1:name}": true':'{ "**/${1:name}": true }',range:t}))):(n.push(this.newSimpleCompletionItem("false",t,i(30,null))),n.push(this.newSimpleCompletionItem("true",t,i(31,null))),n.push(this.newSnippetCompletionItem({label:i(32,null),documentation:i(33,null),snippet:'{ "when": "$(basename).${1:extension}" }',range:t}))),Promise.resolve(n)}provideLanguageCompletionItems(e,t,n=(e=>JSON.stringify(e))){return r.languages.getLanguages().then(e=>{const o=[],i=r.workspace.getConfiguration();for(const a of e){const e=i.inspect(`[${a}]`);if(!e||!e.defaultValue){const e=new r.CompletionItem(n(a));e.kind=r.CompletionItemKind.Property,e.range=t,o.push(e)}}return o})}provideLanguageOverridesCompletionItems(e,t){if(0===e.path.length){let n=this.document.getWordRangeAtPosition(t,/^\s*\[.*]?/)||new r.Range(t,t),o=this.document.getText(n);if(o&&o.trim().startsWith("["))return n=new r.Range(new r.Position(n.start.line,n.start.character+o.indexOf("[")),n.end),this.provideLanguageCompletionItems(e,n,e=>`"[${e}]"`);n=this.document.getWordRangeAtPosition(t)||new r.Range(t,t);let a='"[${1:language}]": {\n\t"$0"\n}';return(o=this.document.getText(n))&&o.startsWith('"')&&(n=new r.Range(new r.Position(n.start.line,n.start.character+1),n.end),a=a.substring(1)),Promise.resolve([this.newSnippetCompletionItem({label:i(34,null),documentation:i(35,null),snippet:a,range:n})])}if(1===e.path.length&&e.previousNode&&"string"==typeof e.previousNode.value&&e.previousNode.value.startsWith("[")){let n=this.document.getWordRangeAtPosition(t)||new r.Range(t,t);return this.provideLanguageCompletionItems(e,n,e=>`"[${e}]"`)}return Promise.resolve([])}newSimpleCompletionItem(e,t,n,o){const i=new r.CompletionItem(e);return i.kind=r.CompletionItemKind.Value,i.detail=n,i.insertText=o||e,i.range=t,i}newSnippetCompletionItem(e){const t=new r.CompletionItem(e.label);return t.kind=r.CompletionItemKind.Value,t.documentation=e.documentation,t.insertText=new r.SnippetString(e.snippet),t.range=e.range,t}}}]));
//# sourceMappingURL=https://ticino.blob.core.windows.net/sourcemaps/9df03c6d6ce97c6645c5846f6dfa2a6a7d276515/extensions/configuration-editing/dist/extension.js.map