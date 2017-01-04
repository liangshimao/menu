<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;

?>
<link href="/css/form.css" rel="stylesheet">

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
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td><?= ++$k; ?></td>
            <td><?= $val->name;?></td>
            <td><?= isset($val->type->name)?$val->type->name:'';?></td>
            <td><?= $val->price;?></td>
            <td><?= $val->thumb;?></td>
            <td><?= $val->desc;?></td>
            <td>
                <a class="btn btn-info button"
                   href="javascript:window.parent.edit(1,'修改菜品类型信息','<?php echo Url::toRoute(['/menu/food/edit', 'id' => $val->id]); ?>', 600, 300)"><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>
                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/menu/type/delete', 'id' => $val->id]); ?>', '确定要刪除<?=$val->name?>吗?')"><i
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
        omnipotent('edit','<?=Url::toRoute('/menu/food/add')?>', '添加用户', 600, 550, 0);
    }

</script>