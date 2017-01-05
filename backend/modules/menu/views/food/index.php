<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;

?>
<link href="/css/form.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/css/lunbotu.css">
<link type="text/css" rel="stylesheet" href="/css/lunbotu/style.css">
<script type="text/javascript" src="/js/jquery.min2.js"></script>
<script type="text/javascript" src="/js/pirobox.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $().piroBox({
            my_speed: 400, //animation speed
            bg_alpha: 0.1, //background opacity
            slideShow : true, // true == slideshow on, false == slideshow off
            slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
            close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox
        });
    });
</script>

<div class="search-nav">
    <form class="form-inline" action="<?= Url::toRoute('/menu/food/index') ?>" method="get">
        <div class="form-group input-group-sm">
            <label for="txtName">名称：</label>
            <input class="form-control ipt" id="txtName" placeholder="菜品名称" name="name" value="<?= empty($params['name']) ? '' : $params['name'] ?>">
        </div>
        <div class="form-group input-group-sm">
            <label for="Select">类型：</label>
            <select id="type" class="form-control width-120" name="type" style="width:120px;">
                <option value="">-菜品类型-</option>
                <?php if ($typeList): foreach ($typeList as $key=>$val): ?>
                    <option value="<?= $key;?>"
                            <?php if (isset($params['type']) && $params['type'] == $key): ?>selected<?php endif; ?>><?= $val; ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
            <button class="btn btn-default" id="btnSearch" type="button" onclick="add()"><i class="glyphicon glyphicon-plus-sign"></i> 新增</button>
        </div>
    </form>
</div>

<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>类型</th>
        <th>价格</th>
        <th>图片</th>
        <th>描述</th>
        <th>排序</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td style="vertical-align: middle;"><?= ++$k; ?></td>
            <td style="vertical-align: middle;"><?= $val->name;?></td>
            <td style="vertical-align: middle;"><?= isset($val->type->name)?$val->type->name:'';?></td>
            <td style="vertical-align: middle;"><?= $val->price;?></td>
            <td style="vertical-align: middle;"><a href="<?= $val->thumb?>" class="pirobox_gall" title=""><img src="<?= $val->thumb?>" alt="<?= $val->name.'图片';?>" width="80" height="50"></a></td>
            <td style="vertical-align: middle;"><?= $val->desc;?></td>
            <td style="vertical-align: middle;"><?= $val->sort;?></td>
            <td style="vertical-align: middle;">
                <a class="btn btn-info button"
                   href="javascript:window.parent.edit(1,'修改菜品信息','<?php echo Url::toRoute(['/menu/food/edit', 'id' => $val->id]); ?>', 600, 500)"><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>
                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/menu/food/delete', 'id' => $val->id]); ?>', '确定要刪除<?=$val->name?>吗?')"><i
                        class="glyphicon glyphicon-trash"></i> 删除</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo GoLinkPager::widget(['pagination' => $pages,'go' => false]);?>
</div>


<script type="text/javascript">
    /**
     * 添加用户
     */
    function add()
    {
        omnipotent('edit','<?=Url::toRoute('/menu/food/add')?>', '添加新菜', 600, 500, 0);
    }

</script>