<?php
use yii\helpers\Url;
?>
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="<?php echo Url::toRoute(['/menu/food/edit','id' => $model->id]); ?>" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <th width="100">菜品名称：</th>
                    <td><input type="text" name="food[name]" value="<?=$model->name;?>" class="form-control-table width-160" id="name" style="display: inline" ></td>
                </tr>
                <tr>
                    <th width="100">菜品类型：</th>
                    <td>
                        <select name="food[type_id]" id="type" class="form-control" style="width:160px;display:inline">
                            <option value="">-请选择菜品类型-</option>
                            <?php if($typeList): foreach($typeList as $key=>$val):?>
                                <option value="<?=$key;?>" <?php if($model->type_id == $key):echo 'selected';endif;?>><?=$val;?></option>
                            <?php endforeach;endif;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="100">价 格：</th>
                    <td><input type="text" name="food[price]" value="<?=$model->price;?>" class="width-160 form-control" id="price" style="display: inline"></td>
                </tr>
                <tr>
                    <th width="100">排序：</th>
                    <td><input type="text" name="food[sort]" value="<?=$model->sort;?>" class="form-control-table width-160" id="sort" style="display: inline" maxlength="5"></td>
                </tr>
                <tr>
                    <th width="100">图片信息：</th>
                    <td>
                        <img src="<?=$model->thumb;?>" id="thumb" width="200" height="150">
                        <a href="javascript:;" style="margin-left:15px;" id="thumb_select">>>点击这里选择图片</a>
                        <input type="hidden" name="food[thumb]" value="<?=$model->thumb;?>" id="thumb_hidden">
                        <input type="file" id="thumb_file" name="thumb_file" style="display: none;">
                    </td>
                </tr>
                <tr>
                    <th width="100">描 述：</th>
                    <td><textarea class="inputStyle moretxt width-160" id="desc" placeholder="请输入描述信息" name="food[desc]" style="display: inline; width: 350px; height: 80px;" maxlength="50"><?=$model->desc;?></textarea></td>
                </tr>
            </table>
            <div style="display: none;" class="btn"><input type="submit" id="dosubmit" class="dialog" name="dosubmit" value="提交"/></div>
        </form>
    </div>
</div>


<script src="/js/ajaxfileupload.js"></script>
<script>
    $(function(){

        $("#thumb_select").click(function(){
            $("#thumb_file").click();
        });

        $("#thumb_file").change(function(){
            $.ajaxFileUpload({
                url:"<?=Url::toRoute('/menu/food/upload')?>",
                dataType:"text",
                secureuri: false,
                fileElementId:"thumb_file",
                success:function(data){
                    var datas = jQuery.parseJSON(data);
                    $("#thumb").attr("src",datas.data.url);
                    $("#thumb_hidden").val(datas.data.url);
                }
            });
        });


        $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){
            window.top.art.dialog({content: msg, lock: true, width: '250', height: '80'}, function () {
                this.close();
                $(obj).focus();
            })
        }});

        $("#name").formValidator({onshow:"请输入菜品名称",onfocus:"请输入菜品名称",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"菜品名称不能为空"}).defaultPassed();
        $("#type").formValidator({onshow:"请选择菜品类型",onfocus:"请选择菜品类型",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"菜品类型不能为空"}).defaultPassed();
        $("#price").formValidator({onshow:"请输入价格",onfocus:"请输入价格",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"价格信息不能为空"}).regexValidator({regexp: "^[0-9]+([.][0-9]+)?$", onerror: "菜品价格只能为数字"}).defaultPassed();
        $("#sort").formValidator({onshow:"请输入排序",onfocus:"请输入排序",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"排序不能为空"}).regexValidator({regexp:"^[0-9]+$",onerror:"排序只能为数字"}).defaultPassed();

    });
</script>
