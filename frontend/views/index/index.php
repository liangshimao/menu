<?php
use yii\helpers\Url;
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>

<body>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/images/index/shop_1.jpg"></div>
        <div class="swiper-slide"><img src="/images/index/shop_1.jpg"></div>
        <div class="swiper-slide"><img src="/images/index/shop_1.jpg"></div>
    </div>
</div>

<div class="nav-lf">
    <ul id="nav">
        <?php foreach ($type as $k=>$v):?>
        <li><a href="#st<?=$k;?>"><?=$v;?></a><b></b></li>
        <?php endforeach;?>
    </ul>
</div>
<form action="" id="myform">
    <div id="container" class="container" style="margin-bottom:100px;">
        <?php foreach ($food as $val):?>
            <div class="section" id="st<?=$val['id'];?>">
                <?php foreach ($val['list'] as $value):?>
                    <div class="prt-lt">
                        <div class="lt-lt"><img src="<?=$value['thumb']?>"></div>
                        <div class="lt-ct">
                            <p><?=$value['name']?></p>
                            <p class="pr">¥<span class="price"><?=$value['price']?></span></p>
                        </div>
                        <div class="lt-rt">
                            <input type="button" class="minus"  value="-">
                            <input type="text" class="result" value="0" name="<?=$value['id']?>">
                            <input type="button" class="add" value="+">
                        </div>
                    </div>
                <?php endforeach;?>

            </div>
        <?php endforeach;?>

    </div>
</form>


<footer>
    <div class="ft-lt">
        <p>合计:<span id="total" class="total">163.00元</span><span class="nm">(<label class="share"></label>份)</span></p>
    </div>
    <div class="ft-rt" onclick="tijiao()">
        <p>选好了</p>
    </div>
</footer>


<script type="text/javascript" src="/js/Adaptive.js"></script>
<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/js/swiper.min.js"></script>
<script type="text/javascript" src="/js/jquery.nav.js"></script>
<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });

    $(function(){
        $('#nav').onePageNav();
    });

</script>
<script>
    $(function(){

        $("#nav li:first").addClass("current");

        $(".add").click(function(){
            var t=$(this).parent().find('input[class*=result]');
            t.val(parseInt(t.val())+1);
            setTotal();
        })

        $(".minus").click(function(){
            var t=$(this).parent().find('input[class*=result]');
            t.val(parseInt(t.val())-1);
            if(parseInt(t.val())<0){
                t.val(0);
            }
            setTotal();


        })

        function setTotal(){
            var s=0;
            var v=0;
            var n=0;
            <!--计算总额-->
            $(".lt-rt").each(function(){
                s+=parseInt($(this).find('input[class*=result]').val())*parseFloat($(this).siblings().find('span[class*=price]').text());

            });

            <!--计算菜种-->
            var nIn = $("li.current a").attr("href");
            $(nIn+" input[type='text']").each(function() {
                if($(this).val()!=0){
                    n++;
                }
            });

            <!--计算总份数-->
            $("input[type='text']").each(function(){
                v += parseInt($(this).val());
            });
//            if(n>0){
//                $(".current b").html(n).show();
//            }else{
//                $(".current b").hide();
//            }
            $(".share").html(v);
            $("#total").html(s.toFixed(2));
        }
        setTotal();

    });

    function tijiao()
    {
        var value = prompt('请输入餐桌号:','');
        if(value == null){
            return false;
        }
        if(value == '' || isNaN(value)){
            tijiao();
        }else{
           $.ajax({
               url:"<?=Url::toRoute('/index/order_ajax')?>",
               dataType:"json",
               type:"post",
               data:{food:$("#myform").serializeArray(),table:value},
               success:function(res){
                    if(res.code == 200){
                        alert(res.msg);
                        window.location.reload();
                    }
               }
           })
        }
    }
</script>
<script type="text/javascript" src="/js/waypoints.min.js"></script>
<script type="text/javascript" src="/js/navbar2.js"></script>
</body>
</html>