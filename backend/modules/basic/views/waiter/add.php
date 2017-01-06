<?php
use yii\helpers\Url;
?>
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="<?php echo Url::toRoute('/basic/waiter/add'); ?>" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <th width="100">姓  名：</th>
                    <td><input type="text" name="waiter[name]" value="" maxlength="10" class="form-control-table width-160" id="name" style="display: inline" ></td>
                </tr>
                <tr>
                    <th width="100">性  别：</th>
                    <td>
                        <input type="radio" name="waiter[sex]" value="0" checked>男
                        <input type="radio" name="waiter[sex]" value="1">女
                    </td>
                </tr>
                <tr>
                    <th width="100">手机号：</th>
                    <td><input type="text" name="waiter[mobile]" value="" maxlength="20" class="width-160 form-control" id="mobile" style="display: inline"></td>
                </tr>
                <tr>
                    <th width="100">家庭住址：</th>
                    <td><input type="text" name="waiter[address]" value="" maxlength="50" class="width-160 form-control" id="address" style="display: inline;"></td>
                </tr>
                <tr>
                    <th width="100">入职时间：</th>
                    <td>
                        <div class='input-group date width-160'>
                            <input type='text' class="form-control start_date" id="add_time" name="waiter[add_time]" placeholder="入职日期" size="10"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th width="100">给付薪水：</th>
                    <td>
                        <input type="text" name="waiter[salary]" value="" maxlength="20" class="width-160 form-control" id="salary" style="display: inline">
                    </td>
                </tr>
                <tr>
                    <th width="100">排序：</th>
                    <td>
                        <input type="text" name="waiter[sort]" value="0" maxlength="20" class="width-160 form-control" id="sort" style="display: inline">
                    </td>
                </tr>
            </table>
            <div style="display: none;" class="btn"><input type="submit" id="dosubmit" class="dialog" name="dosubmit" value="提交"/></div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/jedate/jedate.js"></script>

<script>
    //日期插件
    var myDate = new Date();
    var monthStr = myDate.getMonth()+1;
    var dateStr = myDate.getFullYear() +'-'+ monthStr + '-' + myDate.getDate() + " 23:59:59";
    
    $(function(){
        $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){
            window.top.art.dialog({content: msg, lock: true, width: '250', height: '80'}, function () {
                this.close();
                $(obj).focus();
            })
        }});
        $("#name").formValidator({onshow: "请输入真实姓名",onfocus:"请输入真实姓名",oncorrect:"输入正确"}).inputValidator({min: 1,onerror: "真实姓名不能为空"}).regexValidator({regexp: "^[\u4e00-\u9fa5]+$", onerror: "真实姓名只能输入中文姓名"});
        $("#mobile").formValidator({onshow:"请输入手机号",onfocus:"请输入手机号",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"手机号不能为空"}).regexValidator({regexp:regexEnum.mobile,onerror:"手机号格式不正确"});
        $("#address").formValidator({onshow:"请输入家庭住址",onfocus:"请输入家庭住址",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"家庭住址不能为空"}).regexValidator({regexp: "^[\u4e00-\u9fa5]+$", onerror: "家庭住址只能输入中文"});
        $("#salary").formValidator({onshow:"请输入给付薪水",onfocus:"请输入给付薪水",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"给付薪水不能为空"}).regexValidator({regexp:regexEnum.decmal1,onerror:"给付薪水必须是数字"});
        $("#sort").formValidator({onshow:"请输入排序",onfocus:"请输入排序",oncorrect:"输入正确"}).inputValidator({min:1,onerror:"排序不能为空"}).regexValidator({regexp:regexEnum.intege1,onerror:"排序必须是数字"});

        
        jeDate({
            dateCell:".start_date",
            format:"YYYY-MM-DD",
            isinitVal:true,  isTime:false,
            isClear:true,
            minDate:"2000-06-01",
            maxDate: dateStr, //最大日期
            festival: true //显示节日
        });
    });
</script>
