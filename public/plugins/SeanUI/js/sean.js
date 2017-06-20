/*
 * Seanjs
 * author: seanlee 929325776@qq.com
 * http://www.seanlee.win
 */
(function(window){
    var o = {};
    o.el = null;
    o.traversal = false;
    /**
     * @param el dom元素
     * @param traversal<boolean> 是否遍历所有同名元素
     */
    o.dom = function(el, traversal){
        if(arguments.length >= 1 && typeof arguments[0] == 'string'){
            if(document.querySelector){
                if(typeof traversal == 'boolean' && traversal){
                    o.traversal = true;
                    o.el = document.querySelectorAll(arguments[0]);
                }else{
                    o.traversal = false;
            	    o.el = document.querySelector(arguments[0]);
                }
            }
        }else if(arguments.length >= 1 && typeof arguments[0] == 'object'){
            o.el = el;
        }
        return this;
    };

    o.getdom = function(el, traversal){
        if(document.querySelector){
            if(typeof traversal == 'boolean' && traversal){
                el = document.querySelectorAll(arguments[0]);
            }else{
                el = document.querySelector(arguments[0]);
            }
        }
        return el;
    }

    o.eq = function(el){
        return o.el.isEqualNode(el);
    };

    o.trim = function(str){
        if(String.prototype.trim){
            return str == null ? "" : String.prototype.trim.call(str);
        }else{
            return str.replace(/(^\s*)|(\s*$)/g, "");
        }
    };
    o.trimAll = function(str){
        return str.replace(/\s*/g,'');
    };

    o.isEmpty = function(str){
        return o.trimAll(str);
    }

    o.isElement = function(obj){
        return !!(obj && obj.nodeType == 1);
    };

    o.parent = function(){
        o.el = o.el.parentNode;
        return this;
    }

    o.text = function(txt){
    	if(o.el === null){
    		console.warn('请赋予当前对象dom值');
    		return;
    	}
        if(arguments.length === 1){
            o.el.innerText = txt;
            if(o.traversal && o.el.length > 0){
                for(var i=0; i< o.el.length; i++){
                    o.el[i].innerText = txt;
                }
            }
        }else{
            return o.el.textContent;
        }
        return this;
    };

    o.html = function(html){
        if(o.el === null){
            console.warn('请赋予当前对象dom值');
            return;
        }
        if(arguments.length === 1){
            o.el.innerHTML = html;
            if(o.traversal && o.el.length > 0){
                for(var i=0; i<o.el.length; i++){
                    o.el[i].innerHTML = html;
                }
            }
        }else{
            return o.el.innerHTML;
        }
        return this;
    };

    o.val = function(val){
        var obj = o.traversal ? o.el[0] : o.el;
        if(typeof obj == 'undefined'){
            console.warn('请赋予当前对象dom值');
            return;
        }
        if(arguments.length === 0){
            switch(obj.tagName){
                case 'SELECT':
                    return obj.options[obj.selectedIndex].value;
                    break;
                case 'INPUT':
                    return obj.value;
                    break;
                case 'TEXTAREA':
                    return obj.value;
                    break;
            }
        }
        if(arguments.length === 1){
            switch(obj.tagName){
                case 'SELECT':
                    obj.options[obj.selectedIndex].value = val;
                    break;
                case 'INPUT':
                    obj.value = val;
                    break;
                case 'TEXTAREA':
                    obj.value = val;
                    break;
            }
        }
        return this;
    };

    o.prepend = function(html){
        if(o.el === null){
            console.warn('请赋予当前对象dom值');
            return;
        }
        var origin = o.el.innerHTML;
        o.el.innerHTML = html + origin; 
        if(o.traversal && o.el.length > 0){
            for(var i=0; i<o.el.length; i++){
                origin = o.el[i].innerHTML;
                o.el[i].innerHTML = html + origin;
            }
        }
        return this;
    };

    o.append = function(html){
        if(o.el === null){
            console.warn('请赋予当前对象dom值');
            return;
        }
        o.el.innerHTML += html;
        if(o.traversal && o.el.length > 0){
            for(var i=0; i<o.el.length; i++){
                o.el[i].innerHTML += html;
            }
        }
        return this;
    };

    o.before = function(html){
        var obj = o.traversal ? o.el[0] : o.el;
        if(typeof obj == 'undefined'){
            console.warn('请赋予当前对象dom值');
            return;
        }
        obj.insertAdjacentHTML('beforebegin', html);
        return this;
    };

    o.after = function(html){
        var obj = o.traversal ? o.el[o.el.length - 1] : o.el;
        if(typeof obj == 'undefined'){
            console.warn('请赋予当前对象dom值');
            return;
        }
        obj.insertAdjacentHTML('afterend', html);
        return this;
    };

    o.remove = function(el){
        if(typeof arguments[0] == 'string'){
            el = o.getdom(el);
        }
        if(el && el.parentNode){
            el.parentNode.removeChild(el);
        }
    };

    o.hasClass = function(cls){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        if(o.el.className.indexOf(cls) > -1){
            return true;
        }else{
            return false;
        }
    };

    o.setClass = function(cls){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        o.el.className = cls;
        return this;
    };

    o.addClass = function(cls){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        o.el.className += ' '+ cls;
        return this;
    };

    o.removeClass = function(cls){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        o.el.className = o.el.className.replace(cls, '');
        return this;
    };

    o.css = function(css){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        if(typeof css == 'string' && css.indexOf(':') > 0){
            o.el.style && (o.el.style.cssText += ';' + css);
        }
        return this;
    };

    o.show = function(){
        o.removeClass('animated').removeClass('hide').removeClass('show').removeClass('fadeOut').removeClass('fadeIn').addClass('show');
        return this;
    };

    o.hide = function(){
        o.removeClass('animated').removeClass('hide').removeClass('show').removeClass('fadeOut').removeClass('fadeIn').addClass('hide');
        return this;
    };

    o.fadeIn = function(){
        o.removeClass('animated').removeClass('hide').removeClass('show').removeClass('fadeOut').removeClass('fadeIn').addClass('show animated fadeIn');
        return this;
    };

    o.fadeOut = function(){
        o.removeClass('animated').removeClass('hide').removeClass('show').removeClass('fadeOut').removeClass('fadeIn').addClass('hide animated fadeOut');
        return this;
    };

    o.stopBubble = function(){
        window.eventcancelBubble = true; 
    };

    o.offset = function(){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        var rect = o.el.getBoundingClientRect();
        return {
            l: rect.left + Math.max(document.documentElement.scrollLeft, document.body.scrollLeft),
            t: rect.top + Math.max(document.documentElement.scrollTop, document.body.scrollTop),
            w: o.el.offsetWidth,
            h: o.el.offsetHeight
        };
    };

    /*
     * el.addEvent('click', function(){})
     */
    o.addEvent = function(type,handle){
        try{
            o.el.addEventListener(type, handle, false);
        }catch(e){
            try{  // IE8.0及其以下版本
                o.el.attachEvent('on' + type, handle);
            }catch(e){  // 早期浏览器
                o.el['on' + type] = handle;
            }
        }
        return this;
    }

    o.attr = function(name, value){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        if(arguments.length == 1){
            if(typeof name == 'string'){
                return o.el.getAttribute(name);
            }else if(typeof name == 'object'){
                for(var key in name){  
                    o.el.setAttribute(key, name[key]);
                }
            }
        }else if(arguments.length == 2){
            o.el.setAttribute(name, value);
        }
        return this;
    };

    o.removeAttr = function(name){
        if(!o.el){
            console.warn('请赋予当前对象dom值');
            return;
        }
        if(arguments.length === 1){
            o.el.removeAttribute(name);
        }
    };

    o.loader = function(time){
        var obj = o.dom('#container');
        if(!obj){
            console.warn('loading组件默认放在#container内');
            return;
        }
        if(! o.getdom('#loader')){
            var html = '<div class="loader show" id="loader"></div>';
            obj.prepend(html);
            if(typeof time == 'number' && time > 0){
                setTimeout(function(){
                    o.remove('#loader');
                }, time)
            }
        }else{
            o.remove('#loader');
        }        
    }

    o.createXHR = function(){
        if(window.XMLHttpRequest) {
            return new XMLHttpRequest();
        }else if (window.ActiveXObject) {
            var versions = ['MSXML2.XMLHttp','Microsoft.XMLHTTP'];
            for (var i = 0,len = versions.length; i<len; i++) {
                try {
                    return new ActiveXObject(version[i]);
                    break;
                } catch (e) {
                    continue;
                }   
            }
        }else {
            throw new Error('浏览器不支持XHR对象！');
        }
    };

    o.post = function(url, data, callback, dataType){
        if(arguments.length === 3){
            dataType = 'json';
        }
        o.ajax({
            method : 'post',
            url : url,
            data : data,
            dataType: dataType,
            success : callback,
        });
    };

    o.get = function(url, data, callback, dataType){
        if(arguments.length === 3){
            dataType = 'json';
        }
        o.ajax({
            method : 'get',
            url : url,
            data : data,
            dataType: dataType,
            success : callback,
        });
    };

    o.ajax = function(obj){
        var xhr = o.createXHR();
        obj.url = obj.url + '?rand=' + Math.random();
        obj.data = o.parseParams(obj.data);
        //若是GET请求，则将数据加到url后面
        if (obj.method === 'get') {
            obj.url += obj.url.indexOf('?') == -1 ? '?' + obj.data : '&' + obj.data; 
        }
        if (obj.async === true) {
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) { 
                    callback();
                }
            };
        }
        xhr.open(obj.method, obj.url, obj.async);
        if (obj.method === 'post') {
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(obj.data);
        } else {
            xhr.send(null);
        }
        if (obj.async === false) {
            callback();
        }
        function callback() {
            if (xhr.status == 200) {
                if(typeof obj.dataType == 'string' && obj.dataType == 'text'){
                    obj.success(xhr.responseText);
                }else{
                    obj.success(JSON.parse(xhr.responseText));
                }
            } else {
                console.warn('错误代号：' + xhr.status + '，错误信息：' + xhr.statusText);
            }   
        }
    };

    o.parseParams = function(data){
        var arr = [];
        for (var i in data) {
            arr.push(encodeURIComponent(i) + '=' + encodeURIComponent(data[i]));
        }
        return arr.join('&');
    };

    window.$sean = o;

})(window);