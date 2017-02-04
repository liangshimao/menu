<?php
use yii\helpers\Url;
use common\models\menu\Food;
?>
<style>
    .mag-lf-20{margin-left:20px;}
    .select-font{font-size: 12px;}
    .alert-success span{font-size: 12px;}
    .table-condensed tbody tr td b{color: #666;}
    input:focus{box-shadow:0;border:none;color:#000;}
    .table-condensed tbody tr td input{font-size: 12px;}
    /*.table-condensed thead tr th,.title{text-align: center;font-size: 12px;color: #666;font-weight: 700;background: #dff0d8}*/
    .table-condensed tbody tr td{text-align: center;font-size: 12px;}
    .wl-type{height: 25px;font-size: 12px;display: inline-block;width: 96px;}
    .table > tbody > tr > td{
        vertical-align: middle;
    }
</style>
<div style="padding:8px;">
    <form action="<?php echo Url::toRoute(['/order/eating/edit','id'=>$orderModel->id])?>" method="post" id="myform">
        <table class="table table-bordered table-striped table-hover table-condensed">
            <thead>
            <th colspan="12" style="text-align: center;">华通饭庄新订单</th>
            </thead>
            <tbody>
            <tr>
                <td colspan="3" style="text-align:right;"><b>餐桌号：</b></td>
                <td colspan="5"><input type="text" class="form-control" width="60%" name="table" id="table" value="<?=$orderModel->table_id;?>"></td>
                <td colspan="4"></td>
            </tr>
            <tr><td colspan="12"><b>订餐列表</b></td></tr>
            <tr style="text-align: center;">
                <td colspan="1"><b>ID</b></td>
                <td colspan="3"><b>类型</b></td>
                <td colspan="3"><b>菜品</b></td>
                <td colspan="1"><b>数量</b></td>
                <td colspan="3"><b>备注</b></td>
                <td colspan="1"><a href="javascript:void(0);" id="btnAdd"><i class="glyphicon glyphicon-plus-sign"></i></a></i></td>
            </tr>
            <?php $kk = 0;foreach ($detailList as $value):?>
            <tr style="text-align: center;" class="detail_list">
                <td colspan="1"><?=++$kk;?></td>
                <td colspan="3">
                    <select class="form-control width-120 detail-type" onchange="typeChange(this);">
                        <option value="">-菜品类型-</option>
                        <?php foreach ($typeList as $key=>$val):?>
                            <option value="<?=$key;?>" <?php if(isset($value->food->type_id)):echo $value->food->type_id==$key?'selected':'';endif;?>><?=$val;?></option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td colspan="3">
                    <select class="form-control width-120 detail-food" name="detail[<?=$kk-1;?>][food_id]">
                        <option value="">-菜品名称-</option>
                        <?php if(isset($value->food->type_id)):?>
                        <?php $foodList = Food::getList($value->food->type_id);foreach ($foodList as $k=>$v):?>
                                <option value="<?=$k;?>" <?php if(isset($value->food->id)):echo $value->food->id==$k?'selected':'';endif;?>><?=$v;?></option>
                        <?php endforeach;endif;?>
                    </select>
                </td>
                <td colspan="1"><input type="number" min="1" value="<?=$value->count;?>" class="form-control num" name="detail[<?=$kk-1;?>][count]" style="width:60px;"></td>
                <td colspan="3"><input type="text" value="<?=$value->remark;?>" class="form-control" name="detail[<?=$kk-1;?>][remark]" ></td>
                <td colspan="1"><a class="btn btn-danger" onclick="remove(this)"><i class="glyphicon glyphicon-remove-sign"></i> 移除</a></td> </tr>
            </tr>
            <?php endforeach;?>
            </tbody>
            <div style="display: none;" class="btn"><input type="submit" id="dosubmit" class="dialog" name="dosubmit" value="提交"/></div>
        </table>
    </form>
    <input type="hidden" name="k" value="<?=$kk;?>">
</div>

<script>
    $(function(){

        $("#btnAdd").click(function(){
            var num = $("tr.detail_list:last").find("td:first").html();
            num = parseInt(num);
            var k = $("input[name=k]").val();
            k = parseInt(k);
            var html = '<tr style="text-align:center;" class="detail_list">' +
                '<td colspan="1">'+ (num+1) +'</td>'+
                '<td colspan="3"><select class="form-control width-120 detail-type" onchange="typeChange(this);"> <option value="">-菜品类型-</option><?php foreach ($typeList as $key=>$val):?><option value="<?=$key;?>"><?=$val;?></option><?php endforeach;?></select></td>'+
                '<td colspan="3"> <select class="form-control width-120 detail-food" name="detail['+ k +'][food_id]"> <option value="">-菜品名称-</option></select></td>'+
                '<td colspan="1"><input type="number" min="1" value="1" class="form-control num" name="detail['+ k +'][count]" style="width:60px;"></td>'+
                '<td colspan="3"><input type="text" value="" class="form-control" name="detail['+ k +'][remark]" ></td>'+
                '<td colspan="1"><a class="btn btn-danger" onclick="remove(this)"><i class="glyphicon glyphicon-remove-sign"></i> 移除</a></td> </tr>';
            $("tr.detail_list:last").after(html);
            $("input[name=k]").val(k+1);
        });

        $(".num").keydown(function(event){
            var theEvent = window.event||event;
            var keycode = theEvent.keyCode || theEvent.which;
            if(!(keycode==46)&&!(keycode==8)&&!(keycode==37)&&!(keycode==39))
                if(!(( keycode >= 48 && keycode <= 57) || (keycode>=96 && keycode<=105))){
                    if(document.all)
                    {
                        window.theEvent.returnValue = false;
                    }else{
                        theEvent.preventDefault();
                    }
                }
        });


        $(function(){
            $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){
                window.top.art.dialog({content: msg, lock: true, width: '250', height: '80'}, function () {
                    this.close();
                    $(obj).focus();
                })
            }});
            $("#table").formValidator({onshow:"",onfocus:""}).inputValidator({min:1,onerror:"餐桌号码不能为空"}).regexValidator({regexp:"^[0-9]+$",onerror:"餐桌号码只能为数字"});
        });

    });
    function remove(obj)
    {
        var item = $(obj).parent().parent();
        var items = item.nextAll(".detail_list");
        items.each(function(){
            var num = $(this).find("td:first").html();
            $(this).find("td:first").html(num - 1);
        });
        item.remove();
    }
    function typeChange(obj)
    {
        var typeId = $(obj).val();
        if(typeId == ""){
            var html = '<option value="">-菜品名称-</option>';
            $(obj).parent().next().find(".detail-food").html(html);
            return ;
        }
        $.ajax({
            'type':'POST',
            'url':'<?=Url::toRoute(['/menu/food/getlist_ajax']);?>',
            'dataType':"json",
            'data':{id:typeId},
            'success':function (result) {
                if(result.code == 200){
                    var html = '<option value="">-菜品名称-</option>';
                    $.each(result.data,function(k,v){
                        html += '<option value="'+ k +'">'+ v +'</option>';
                    });
                    $(obj).parent().next().find(".detail-food").html(html);
                }
            }
        });
    }
</script>