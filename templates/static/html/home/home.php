<html><head><style>
    .home{ position: fixed; top: 100%; left: 0px; bottom: 0px; right: 0px; }
    .home .content{ position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; }
    .home .split{ z-index: 5; position: fixed; top: 100%; margin-top: -34px; left: -200px; right: -200px; height: 34px; background: linear-gradient(to top, rgba(44,38, 56, 0.7) 0%, rgba(44,38,56,0) 100%); }
    .home .top{ overflow: hidden; position: absolute; top: 30px; left: 30px; right: 30px; bottom: 50%; }
    .home .top .item{ background-position: center bottom !important; }
    .home .top .texts{ color: #FFF; position: absolute; bottom: 0%; left: 30px; right: 30px; }
    .home .bottom{ overflow: hidden; position: absolute; top: 50%; left: 30px; right: 30px; bottom: 30px; }
    .home .bottom .item{  }
    .home .bottom .bg{  transform: scale(1.02); -webkit-transform: scale(1.02); position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; background: no-repeat center; background-position: center top !important; background-size: cover; }
    .home .bottom .texts{ color: #FFF; position: absolute; top: 0%; left: 30px; right: 30px; }
    .home .item{ position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; background: no-repeat center; background-size: cover; }
    .home .item p{ padding: 0px; }
    .home .buttons{ position: absolute; top: 50px; right: 50px; z-index: 5; }
    .home .button{ overflow: hidden; background: rgba(255,255,255,0.4); float: right; clear: both; width: 33px; height: 6px; margin-bottom: 6px; cursor: pointer; text-align: right; }
    .home .button .name{ white-space: nowrap; opacity: 0; font-size: 14px; color:#FFF; text-transform: uppercase; top: 10px; padding: 0px 10px; }
    .r1100 .home .top .texts  > div{ margin: 0px !important; padding: 0px !important; line-height: normal !important; }
    .r1100 .home .bottom .texts > div{ margin: 0px !important;  }
    .r600 .home .top{ top: 0px; left: 0px; bottom: 50%; right: 0px; }
    .r600 .home .buttons{ top: 5px; right: 5px; -webkit-transform: scale(0.8) !important; transform: scale(0.8) !important; }
    .r600 .home .button{ margin-bottom: 16px !important;  }
    .r600 .home .top .texts{ left: 15px; right: 15px; }
    .r600 .home .bottom{ top: 50%; left: 0px; bottom: 0px; right: 0px;}
    .r600 .home .bottom .texts{ left: 15px; right: 15px; }
    
    .r600 .home .slide0 .t_24{ letter-spacing: 8px !important; font-size: 12px !important; }
    .r600 .home .top .slide0 .t_90{ margin-top: -10px !important; }
    .r600 .home .t_90, .r600 .home .slide0 .t_90 *{ letter-spacing: 3px !important; }
    .r600 .home .bottom .slide0 .texts{ margin-top: -40px !important; }
    
    .r600 .home .t_18{ letter-spacing: 3px !important; font-size: 10px !important; }
    .r600 .home .t_60, .r600 .home .t_60 *{ letter-spacing: 1px !important;  font-size: 20px !important; }
    
    .r600 .home .t1{ margin-bottom: 0px !important; }
    .r600 .home .t2{ margin-bottom: 10px !important; }
    .r600 .home .t2 *, .r600 .home .t2{ line-height: 22px !important; }
    
    .r600 .home .top .texts{ margin-bottom: -5px !important; }
    .r600 .home .bottom .texts{ margin-top: -8px  !important; }
    .r600 .home .last_t1, .r600 .home .last_t1 *{ letter-spacing: 8px !important; font-size: 12px !important;  }
    .r600 .home .top .last_t1{ margin-bottom: -15px !important; }
    .r600 .home .button_style1{ -webkit-transform: scale(0.8) !important;  }
    
    
    .r400 .home .bottom .slide0 .texts{ margin-top: -20px !important; line-height: 30px !important; }
</style>
<script>
    home = {}
    home.current;
    home.playing = false;
    //++ change
        home.change = function(index){
            try{
                if(index == home.current) return;
                if(home.playing) return;
                home.playing = true;
                var direction = (index > home.current) ? 1 : -1;
                if(home.current){
                    if(direction == 1){
                        var timeline2 = new TimelineMax();
                            timeline2.set(".top .item, .bottom .item", {zIndex:"auto"});
                            timeline2.fromTo( ".top .slide"+home.current, 1.5, { y:0}, {display:"none", y:-$(".top").height(), ease:Expo.easeInOut}, "0" );
                            timeline2.fromTo( ".bottom .slide"+home.current, 1.5, { y:0}, {display:"none", y:-$(".top").height(), ease:Expo.easeInOut}, "0" );
                    }else{
                        var timeline2 = new TimelineMax();
                            timeline2.set(".top .item, .bottom .item", {zIndex:"auto"});
                            timeline2.fromTo( ".top .slide"+home.current, 1.5, { y:0}, {display:"none", y:$(".top").height(), ease:Expo.easeInOut}, "0" );
                            timeline2.fromTo( ".bottom .slide"+home.current, 1.5, { y:0}, {display:"none", y:$(".bottom").height(), ease:Expo.easeInOut}, "0" );
                    }
                }
                home.current = index;
                if(direction == 1){
                    
                    var timeline = new TimelineMax( {onComplete:function(){ home.playing = false } } );
                        timeline.set(".top .slide"+home.current+", .bottom .slide"+home.current, {display:"block", zIndex:2});
                        timeline.fromTo( ".top .slide"+home.current+"", 1.5, { y:$(".top").height()}, {display:"block", y:0, ease:Expo.easeInOut}, "0" );
                        timeline.fromTo( ".bottom .slide"+home.current+"", 1.5, { y:$(".bottom").height()}, {display:"block", y:0, ease:Expo.easeInOut}, "0" );
                        timeline.staggerFromTo($(".top .slide"+home.current+" .texts").children(), 0.7, {top:150, alpha:0}, {top:5, alpha:1, ease:Expo.easeOut}, 0.15, "0.7");
                        timeline.staggerFromTo($(".bottom .slide"+home.current+" .texts").children().get().reverse(), 0.8, {top:-150, alpha:0}, {top:0, alpha:1, ease:Expo.easeOut}, 0.15, "0.7");
                }else{
                    var timeline = new TimelineMax( {onComplete:function(){ home.playing = false } });
                        timeline.set(".top .slide"+home.current+", .bottom .slide"+home.current, {display:"block", zIndex:2});
                        timeline.fromTo( ".top .slide"+home.current+"", 1.5, { y:-$(".top").height()}, {display:"block", y:0, ease:Expo.easeInOut}, "0" );
                        timeline.fromTo( ".bottom .slide"+home.current+"", 1.5, { y:-$(".bottom").height()}, {display:"block", y:0, ease:Expo.easeInOut}, "0" );
                        timeline.staggerFromTo($(".top .slide"+home.current+" .texts").children(), 0.7, {top:150, alpha:0}, {top:5, alpha:1, ease:Expo.easeOut}, 0.15, "0.7");
                        timeline.staggerFromTo($(".bottom .slide"+home.current+" .texts").children().get().reverse(), 0.8, {top:-150, alpha:0}, {top:0, alpha:1, ease:Expo.easeOut}, 0.15, "0.7");
                }
                home.changeButton();
            }catch(err){}
        }
    //--
    //++ Change Button / Rollover / Rollout
        home.changeButton = function(){
            var button = $(".home .button").get(home.current);
            var timeline2 = new TimelineMax();
                timeline2.to($(".home .button .name"), 0.3, { alpha:0 });
                timeline2.to($(".home .button").not(button), 0.3, { backgroundColor:"rgba(255,255,255,0.4)", height:6, width:33}, "0");
                $(".home .button").data("selected",false);
                $(button).data("selected",true);
            var dim = cuppa.dim($(button).find(".name"));
            var timeline = new TimelineMax();
                timeline.to(button, 0.3, { backgroundColor:"#DD3154", height:36, width:dim.width });
                timeline.fromTo($(button).find(".name"), 0.3, {alpha:0}, { alpha:1 });  
        }
        home.rollover = function(e){
            if($(this).data("selected")) return;
            TweenMax.to(this, 0.3, {backgroundColor:"rgba(255,255,255,1)"})
        }; $(".home .button").bind("mouseenter",home.rollover);
        home.rollout = function(e){
            if($(this).data("selected")) return;
             TweenMax.to(this, 0.3, {backgroundColor:"rgba(255,255,255,0.4)"})
        }; $(".home .button").bind("mouseleave",home.rollout);
    //--
    //++ select button
        home.selectedButtons = function(index){
            if(index == undefined) return;
            $(".home .buttons .button").removeClass("selected");
            $($(".home .buttons .button").get(index)).addClass("selected");
        }
    //--
    //++ onMouse wheel
        home.onMousewheel = function(e){
            if(home.playing) return;
            var dir = 0;
                if(e.originalEvent.detail) dir = e.originalEvent.detail;
                if(e.originalEvent.deltaY) dir = e.originalEvent.deltaY*-1;
                if(e.originalEvent.wheelDelta) dir = e.originalEvent.wheelDelta*-1;
            if(dir > 0 ){
                var next = home.current+1;
                if(next > $(".home .top .item").length-1) return;
                home.change(next);
            }else{
                var next = home.current-1;
                if(next < 0) return;
                home.change(next);
            }
        }
    //--
    //--
    //++ default
        home.defaultConf = function(){
            $(".home .top .item").css("display", "none");
            $(".home .bottom .item").css("display", "none");
        }
    //--
    //++ onMouseMove
        home.onMouseMove = function(e){
            var perX = (e.clientX/$(window).width())-0.5;
            var perY = (e.clientY/$(window).height())-0.5;   
            TweenMax.to(".content", 0.4, { rotationY:5*perX, rotationX:5*perY,  ease:Linear.easeNone, transformPerspective:1000, transformOrigin:"center" })
        }
    //--
    //++ resize
        home.resize = function(){  }; 
    //--
    //++ end
        home.end = function(){
            $(window).unbind("mousemove");
        }
    //--
    //++ init
        home.init = function(){
            cuppa.addEventListener("resize", home.resize, window, "home"); home.resize();
            cuppa.addRemoveListener(".home", home.end);
            cuppa.wheelSmoothDisable(".wrap2");
            cuppa.mousewheel(window, home.onMousewheel);
            home.defaultConf();
            TweenMax.delayedCall(0.5, function(){ home.change(0); } );
            $(window).mousemove(home.onMouseMove);
            
            $(".home .content").swipe( {
                swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
                   if(direction == "up"){
                        var next = home.current+1;
                        if(next > $(".home .top .item").length-1) return;
                        home.change(next);
                   }else if(direction == "down"){
                        var next = home.current-1;
                        if(next < 0) return;
                        home.change(next);
                   }
                }
            });
        }; cuppa.addEventListener("ready",  home.init, document, "home");
    //--
</script>
<style type="text/css">
.welcome{
    position:absolute;
    top:0px;
}
</style></head><body>
<div class="welcome" style="width:100%;">
    <div class="w_1">
        <img src="administrator/media/page/template/logo3.png" style="width: 6%;position: absolute;top: 40px;left: 90%;">
        <img src="administrator/media/page/template/logo4.png" style="width: 6%;position: absolute;top: 90px;left: 45%;">
        <span style="font-size: 700%;font-family: Nexabold;letter-spacing: 8px;padding-left: 25%;position: absolute;margin-top: 15%;">KSHITIJ <span style="color:rgb(207,53,64);">2016
            <br><span style="font-size:21%;position:relative;top:-70px;">ASIA-S LARGEST TECHNO-MANAGENT FEST</span>
        </span></span>
        <button style="cursor:pointer;background-color: transparent;width: 15%;height: 40px;font-size: 180%;font-family: Nexabold;color: #FFF;position: relative;top: 430px;left: 13%;">SIGN UP</button>
        <button style="cursor:pointer;background-color: transparent;width: 15%;height: 40px;font-size: 180%;font-family: Nexabold;color: #FFF;position: relative;top: 430px;left: 60%;">LOGIN</button>
        <span class="know" style="font-family: Nexabold;position: relative;top: 600px;left: 12%;color: rgb(207,53,64);cursor:pointer;">CLICK HERE TO KNOW MORE</span>
    </div>
</div>
<div class="home">
    <div class="content">
        <div class="top">
                            <div class="item slide0" style="background-image: url(administrator/media/home/events_top.png)" >
                    <div class="texts">
                        <div style="margin-bottom: -28px;">
<div style="text-align: center; padding-bottom: 20px;"><!--<span style="font-family: merriweather_italic; letter-spacing: 20px;"> 
<span style="font-family: merriweather_italic;" class="t_24">Digital Innovation</span> </span>--></div>
<div style="text-align: left;" class="t_70"><span style="font-family: Nexabold; letter-spacing: 10px;">BIGGEST</span>
</div>
</div>                    </div>
                </div>
                            <div class="item slide1" style="background-image: url(administrator/media/home/exhibitions_top.png)" >
                    <div class="texts">
                        <div style="margin-bottom: -13px;">
<div class="t1" style="text-align: left; margin-bottom: 10px;"><span style="font-family: merriweather_italic; letter-spacing: 10px;"> <span class="t_18"></span> </span></div>
<div class="t2" style="text-align: left;"><span style="font-family: Bryant-Bold; letter-spacing: 3.5px;"> <span class="t_50"></span> <br /> </span> <span style="font-family: Nexabold; letter-spacing: 3.5px;padding-left:5%;"> <span class="t_50">WORLD CLASS</span> </span> <span style="font-size: 50px; font-family: Bryant-Bold; letter-spacing: 3.5px;"> &nbsp; <br /> </span></div>
</div>                    </div>
                </div>
                            <div class="item slide2" style="background-image: url(administrator/media/home/workshops_top.png)" >
                    <div class="texts">
                        <div style="margin-bottom: -13px;">
<div class="t1" style="margin-bottom: 10px;"><span style="font-family: merriweather_italic; letter-spacing: 10px;"> <span class="t_18"></span> </span></div>
<div class="t2"><span style="font-family: Nexabold; letter-spacing: 3.5px;"> <span class="t_50">EXCITING</span> </span></div>
</div>                    </div>
                </div>
                            <div class="item slide3" style="background-image: url(administrator/media/home/megashows_top.png)" >
                    <div class="texts">
                        <div style="margin-bottom: -13px;">
<div class="t1" style="text-align: left; margin-bottom: 10px;"><span style="font-family: merriweather_italic; letter-spacing: 10px;"> <span class="t_18"></span> </span></div>
<div class="t2" style="text-align: left;padding-left:51%;"><span style="font-family: Bryant-Bold; letter-spacing: 3.5px;"> <span class="t_50"></span> <br /> </span> <span style="font-family: Nexabold; letter-spacing: 3.5px;"> <span class="t_50">STUNNING</span> </span></div>
</div>                    </div>
                </div>
                            <div class="item slide4" style="background-image: url(administrator/media/home/guests_top.png)" >
                    <div class="texts">
                        <div style="margin-bottom: -13px;">
<div class="t1" style="text-align: left; margin-bottom: 10px;"><span style="font-family: merriweather_italic; letter-spacing: 10px;"> <span class="t_18"></span> </span></div>
<div class="t2" style="text-align: right;"><span style="font-family: Nexabold; letter-spacing: 3.5px;"> <span class="t_50">ENTHRALLING</span> </span></div>
</div>                    </div>
                </div>
                            <!--<div class="item slide5" style="background-image: url(administrator/media/home/home_cases_effective_1437461651.jpg)" >
                    <div class="texts">
                        <div style="margin-bottom: -28px;">
<div class="last_t1" style="text-align: center; padding-bottom: 20px;"><span style="font-family: merriweather_bold_italic;"> <span style="font-family: merriweather_italic; letter-spacing: 20px;" class="t_24">Digital Innovation</span> </span></div>
<div class="last_t2" style="text-align: center;"><span style="font-family: Bryant-Bold; letter-spacing: 10px;"> <span class="t_90">IS TO KNOCK IT</span> </span></div>
</div>                    </div>
                </div>-->
                    </div>
        <div class="bottom" >
                            <div class="item slide0" >
                    <div class="bg" style="background-image: url(administrator/media/home/events_bottom2.png)" ></div>
                    <div class="texts">
                        <div style="text-align: left; padding-top: -10px;"><span style="font-family: Nexabold; letter-spacing: 10px;"><span class="t_70">EVENTS</span></span><span style="font-family: Bryant-Bold; font-size: 90px; letter-spacing: 10px;"><br /></span></div>
<div style="text-align: center;"><span style="font-family: merriweather_bold_italic; font-size: 24px;">&nbsp;</span></div>
<div style="text-align: center; margin-top: 15px;"></div></div>
                </div>
                            <div class="item slide1" >
                    <div class="bg" style="background-image: url(administrator/media/home/exhibitions_bottom.png)" ></div>
                    <div class="texts">
                        <div class="t2" style="text-align: left; padding-left:7%;padding-top: 5px;"><span style="font-family: Nexabold; letter-spacing: 3.5px;"> <span class="t_50">EXHIBITIONS</span> </span> <span style="font-family: Bryant-Bold; font-size: 50px; letter-spacing: 3.5px;"> <br /> </span></div>
<div style="text-align: left;" class="t_50 t2"><span style="font-family: Bryant-Bold; letter-spacing: 3.5px;"></span></div>                    </div>
                </div>
                            <div class="item slide2" >
                    <div class="bg" style="background-image: url(administrator/media/home/workshops_bottom.png)" ></div>
                    <div class="texts">
                        <div class="t2">
<p style="padding-top: 4px;" class="t_50"><span style="font-family: Nexabold; letter-spacing: 3.5px;">WORKSHOPS</span></p>
<p class="t_50"><span style="font-family: Bryant-Bold; letter-spacing: 3.5px;"></span></p>
</div>                    </div>
                </div>
                            <div class="item slide3" >
                    <div class="bg" style="background-image: url(administrator/media/home/megashows_bottom.png)" ></div>
                    <div class="texts">
                        <div class="t2">
<p style="padding-top: 4px;padding-left:48%;" class="t_50"><span style="font-family: Nexabold; letter-spacing: 3.5px;">MEGASHOWS</span></p>
<p class="t_50"><span style="font-family: Bryant-Bold; letter-spacing: 3.5px;"></span></p>
</div>                    </div>
                </div>
                            <div class="item slide4" >
                    <div class="bg" style="background-image: url(administrator/media/home/guests_bottom.png)" ></div>
                    <div class="texts">
                        <div class="t2" style="text-align: right; padding-top: 4px;padding-right:7%;"><span style="font-family: Nexabold; letter-spacing: 3.5px;"> <span class="t_50">GUESTS</span> </span> <span style="font-family: Bryant-Bold; font-size: 50px; letter-spacing: 3.5px;"> <br /> </span>
<div style="text-align: left;" class="t_50 t2"><span style="font-family: Bryant-Bold; letter-spacing: 3.5px;"></span></div>
</div>                    </div>
                </div>
                           <!-- <div class="item slide5" >
                    <div class="bg" style="background-image: url(administrator/media/home/home_cases_effective2_1437461659.jpg)" ></div>
                    <div class="texts">
                        <div class="last_t2" style="text-align: center; padding-top: 20px;"><span style="font-family: Bryant-Bold; letter-spacing: 10px;"> <span class="t_90">OUT OF THE PARK</span> </span></div>
<div class="last_t1" style="text-align: center;"><span style="font-family: merriweather_bold_italic;"></span> <span style="font-family: merriweather_bold_italic;"> <span style="font-family: merriweather_italic; letter-spacing: 20px;" class="t_24">with our clients.</span> </span></div>
<div class="button_wrap" style="text-align: center; padding-top: 60px; font-size: 16px; letter-spacing: 6px;"><a href="en/portfolio" class="button_style1 link">VIEW OUR WORK</a></div>                    </div>
                </div>-->
                    </div>
        <div class="split"></div>
    </div>
    <div class="buttons">
                    <div onclick="home.change(0)" class="button"><span class="name f_bryant_bold">EVENTS</span></div>
                    <div onclick="home.change(1)" class="button"><span class="name f_bryant_bold">EXHIBITIONS</span></div>
                    <div onclick="home.change(2)" class="button"><span class="name f_bryant_bold">WORKSHOPS</span></div>
                    <div onclick="home.change(3)" class="button"><span class="name f_bryant_bold">MEGASHOWS</span></div>
                    <div onclick="home.change(4)" class="button"><span class="name f_bryant_bold">GUEST LECTURES</span></div>
                    <!--<div onclick="home.change(5)" class="button"><span class="name f_bryant_bold">EFFECTIVE</span></div>-->
            </div>
</div>
<script type="text/javascript">
            
              $(".know").click(function(){
                console.log('1121111122');
                $(".welcome").hide();
                $(".home").animate({ 'top': '0px'}, 1000 );
                $(".split").animate({ 'top': '50%'}, 200 );
                console.log('1111111122');
              });
            

            </script>
</body></html>