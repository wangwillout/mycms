<?php
use yii\helpers\Url;
?>
<div class="header">
    <div class="dl-title"><span class="">个人后台管理系统</span></div>
    <div class="dl-log">欢迎您，<span class="dl-log-user"><?=Yii::$app->user->identity->username?></span>
        <a href="<?=Url::to(['logout'])?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>

<div class="content">
    <div class="dl-main-nav">
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-storage">首页</div></li>
            <li class="nav-item"><div class="nav-item-inner nav-inventory">搜索页</div></li>
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>

<script>
    BUI.use('common/main',function(){
        var config = [
            {
                id:'menu',
                menu:[
                    {
                        text:'商品管理',
                        collapsed:true,
                        items:[
                            {id:'product_category',text:'分类列表',href:'/product-category/index'},
                            {id:'brand',text:'品牌列表',href:'/brand/index'},
                            {id:'product',text:'商品列表',href:'/product/index'},
                            {id:'sku',text:'sku列表',href:'/sku/index'},
                        ]
                    },
                    {
                        text:'订单管理',
                        collapsed:true,
                        items:[
                            {id:'order',text:'订单列表',href:'/order/index'},
                            {id:'delivery_address',text:'收货地址列表',href:'/delivery-address/index'},
                            {id:'shipment',text:'邮寄列表',href:'/shipment/index'},
                        ]
                    },
                    {
                        text:'权限管理',
                        collapsed:true,
                        items:[
                            {id:'user',text:'用户列表',href:'/admin/user'},
                            {id:'assignment',text:'分配权限',href:'/admin/assignment'},
                            {id:'role',text:'角色列表',href:'/admin/role'},
                            {id:'permission',text:'权限列表',href:'/admin/permission'},
                            {id:'route',text:'路由列表',href:'/admin/route'},
                            {id:'rule',text:'规则列表',href:'/admin/rule'},
                            {id:'menu',text:'菜单列表',href:'/admin/menu'},
                        ]
                    },

                ]
            }

        ];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>