/*
 * bg.js
 * author: seanlee
 * http://www.seanlee.win
 */
(function(window){
    //定义画布宽高和生成点的个数
    var width = $sean.getdom('#container').offsetWidth, height = $sean.getdom('#container').offsetHeight, point = 36;
    var can = {};
    can.circleInfo = [];

    can.init = function(wrap, _point){
        if(typeof _point == 'number'){
            point = _point;
        }
        can.canvas = document.getElementById(wrap);
        can.canvas.width = width,
        can.canvas.height = height;
        can.context = can.canvas.getContext('2d');
        can.context.strokeStyle = 'rgba(0,0,0,0.02)',
        can.context.strokeWidth = 1,
        can.context.fillStyle = 'rgba(0,0,0,0.05)';

        can.circleInfo = [];
        for (var i = 0; i < point; i++) {
            can.circleInfo.push(can.drawCricle(can.context, can.num(width), can.num(height), can.num(15, 2), can.num(10, -10)/40, can.num(10, -10)/40));
        }
        can.draw();
    };
    //每帧绘制
    can.draw = function() {
        can.context.clearRect(0,0, can.canvas.width, can.canvas.height);
        for (var i = 0; i < point; i++) {
            can.drawCricle(can.context, can.circleInfo[i].x, can.circleInfo[i].y, can.circleInfo[i].r);
        }
        for (var i = 0; i < point; i++) {
            for (var j = 0; j < point; j++) {
                if (i + j < point) {
                    var A = Math.abs(can.circleInfo[i+j].x - can.circleInfo[i].x),
                        B = Math.abs(can.circleInfo[i+j].y - can.circleInfo[i].y);
                    var lineLength = Math.sqrt(A*A + B*B);
                    var C = 1/lineLength*7-0.009;
                    var lineOpacity = C > 0.03 ? 0.03 : C;
                    if (lineOpacity > 0) {
                        can.drawline(can.context, can.circleInfo[i].x, can.circleInfo[i].y, can.circleInfo[i+j].x, can.circleInfo[i+j].y, lineOpacity);
                    }
                }
            }
        }
    };
    //线条：开始xy坐标，结束xy坐标，线条透明度
    can.line = function(x, y, _x, _y, o) {
        this.beginX = x,
        this.beginY = y,
        this.closeX = _x,
        this.closeY = _y,
        this.o = o;
    };
    //点：圆心xy坐标，半径，每帧移动xy的距离
    can.circle = function(x, y, r, moveX, moveY) {
        this.x = x,
        this.y = y,
        this.r = r,
        this.moveX = moveX,
        this.moveY = moveY;
    };
    //生成max和min之间的随机数
    can.num = function(max, _min) {
        var min = arguments[1] || 0;
        return Math.floor(Math.random()*(max-min+1)+min);
    };
    // 绘制原点
    can.drawCricle = function(cxt, x, y, r, moveX, moveY) {
        var circle = new can.circle(x, y, r, moveX, moveY)
        cxt.beginPath()
        cxt.arc(circle.x, circle.y, circle.r, 0, 2*Math.PI)
        cxt.closePath()
        cxt.fill();
        return circle;
    };
    //绘制线条
    can.drawline = function(cxt, x, y, _x, _y, o) {
        var line = new can.line(x, y, _x, _y, o)
        cxt.beginPath()
        cxt.strokeStyle = 'rgba(0,0,0,'+ o +')'
        cxt.moveTo(line.beginX, line.beginY)
        cxt.lineTo(line.closeX, line.closeY)
        cxt.closePath()
        cxt.stroke();

    };
    can.refresh = function(){
        for (var i = 0; i < point; i++) {
            var cir = can.circleInfo[i];
            cir.x += cir.moveX;
            cir.y += cir.moveY;
            if (cir.x > width) cir.x = 0;
            else if (cir.x < 0) cir.x = width;
            if (cir.y > height) cir.y = 0;
            else if (cir.y < 0) cir.y = height;
            
        }
        can.draw();
    }

    window.$bg = can;
})(window);