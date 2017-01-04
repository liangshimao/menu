<?php
use yii\helpers\Url;
?>
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="<?php echo Url::toRoute('/menu/type/add'); ?>" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <th width="100">名称：</th>
                    <td><input type="text" name="type[name]" value="" class="form-control-table width-160" id="User-username" style="display: inline" maxlength="50"></td>
                </tr>
                <tr>
                    <th width="100">排序：</th>
                    <td><input type="text" name="type[sort]" value="0" class="form-control-table width-160" id="User-sort" style="display: inline" maxlength="5"></td>
                </tr>
            </table>
            <div style="display: none;" class="btn"><input type="submit" id="dosubmit" class="dialog" name="dosubmit" value="提交"/></div>
        </form>
    </div>
</div>
<script>
    $(function(){
        $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){
            window.top.art.dialog({content: msg, lock: true, width: '250', height: '80'}, function () {
                this.close();
                $(obj).focus();
            })
        }});
        $("#User-username").formValidator({onshow:"请输入菜品类型",onfocus:"请输入菜品类型",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"菜品类型不能为空"});
        $("#User-sort").formValidator({onshow:"请输入排序",onfocus:"请输入排序",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"排序不能为空"}).regexValidator({regexp:"^[0-9]+$",onerror:"排序只能为数字"});
    });
</script>
