<?php
namespace common\service;

use yii;
use mdm\admin\models\Menu;

/**
 * 系统管理服务
 * @author xiaomalover <xiaomalover@gmail.com>
 */
class MenuService
{
    /**
     * 获取后端菜单
     */
    public static function getMenu()
    {
        $list = Menu::find()->orderBy('order asc')->all();
        $menu = [];
        foreach ($list as $v) {
            if ($v->parent == '') {
                $item['text'] = $v->name;
                $item['collapsed'] = true;
                $child = [];
                foreach ($list as $v_child) {
                    if ($v_child->parent == $v->id) {
                        $c['id'] = $v_child->id;
                        $c['text'] = $v_child->name;
                        $c['route'] = $v_child->route;
                        $child[] = $c;
                    }
                }
                $item['items'] = $child;
                $menu[] = $item;
            }
        }
        return json_encode($menu);
    }

    
}
