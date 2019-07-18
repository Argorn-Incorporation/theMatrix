releaseResource = function(char) {
    function getObject(obj) {
        for(i=0; i < char.length; i++) {
         return char;
        }
    }

    function addAttrs(obj, newTag) {
        for(num=0; num < attrs.length; num++) {
            var tagAttr = attrs[num][0],
            tagAttrVal = attrs[num][1];
            $newTag = newTag.setAttribute(tagAttr, tagAttrVal);
        }
        return $newTag;
    }

    function url_domain(url) {
      var regex = /\w+.(com|co\.kr|be|js|css)/ig;
      var convertedUrl = url.match(regex);
      return convertedUrl;
    }

    function url_info(url) {
        var popp = url_domain(url);
        if (popp==null || popp==undefined) {
            return popp;
        }
        var arr = popp[0].split('.');
        return arr;
    }

    function dec_urii (url) {
        $t = url.replace("tls","https");
        return $t.replace("fls","http");
    }

    function createHeadTag(par) {
        var heads = document.getElementsByTagName("head");
        if (heads && heads.length) {
            var headTag = heads[0];
            return headTag;
        }
        else {
            var headTag = document.createElement('head');
            return headTag[0];
        }
    }

    var scripts = [];
    LoadScriptsSync(char,scripts)


    function LoadScriptsSync (_scripts, scripts) {
    var x = 0;
    var loopArray = function(_scripts, scripts) {
        // call itself
        loadScript(_scripts[x], scripts[x], function(){
            // set x to next item
            x++;
            // any more items in array?
            if(x < _scripts.length) {
                loopArray(_scripts, scripts);   
            }
        }); 
    }
    loopArray(_scripts, scripts); 
    
    }

    function loadScript( newArr, script, callback ){
            var type = newArr.type,
                url = dec_urii(decodeURIComponent(newArr.src)),
                attrs = newArr.attrs,
                checkID = newArr.isAvail;
                headTag = createHeadTag(true);
                html = newArr.ins;
                if (type=="js") {
                    var element = document.querySelector("script[src*='"+url+"']"),
                        attrSrc = "src",
                        newTag = element,
                        attrType = "type",
                        type = "text/javascript"

                    if (!element) {
                        newTag = document.createElement('script');
                    }
                }

                if (type=="css") {
                    var element = document.querySelector("link[href*='"+url+"']"),
                        attrSrc = "href",
                        newTag = element,
                        attrType = "type";
                        type = "text/css";
                    if (!element) {
                        newTag = document.createElement('link');
                    }
                }

                if (type=="img") {
                    var element = document.querySelector("img[src*='"+url+"']"),
                        attrSrc = "src",
                        newTag = element,
                        attrType = "";
                        type = "";
                    if (!element) {
                        newTag = document.createElement('img');
                    }
                }

                if (url=="create") {
                    var element = document.querySelector(type+"[id*='"+checkID+"']"),
                        attrSrc = "",
                        newTag = element,
                        attrType = "";
                        type = type;
                    if (!element) {
                        newTag = document.createElement(type);
                    }
                    
                    if (html) {
                        newTag.innerHTML=html;
                    }
                }
                if (attrSrc) {newTag.setAttribute(attrSrc, url);}
                if (attrType) {newTag.setAttribute(attrType, type); }
                newTag.setAttribute("charset", "utf-8");
                var ui = url_info(url);
                if (ui!=null || ui!=undefined) {
                    newTag.setAttribute("data-rlmodule", ui[0]);
                    newTag.setAttribute("data-rlcontext", ui[1]);
                }
                

                for(num=0; num < attrs.length; num++) {
                    var tagAttr = attrs[num][0],
                    tagAttrVal = attrs[num][1];
                    newTag.setAttribute(tagAttr, tagAttrVal);
                }
                newTag.onload = function(){
                callback();
        }
        headTag.appendChild(newTag);
    }
        return "isReady";
};