<?php

namespace Modules\Coupons\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.main'), function (Group $group)
        {
            $group->item('Coupons',function(Item $item){
                $item->weight(config('coupons.sidebar.weight'));
                $item->icon(config('coupons.sidebar.icon'));
                $item->route('admin.coupons.index');
                $item->authorize($this->auth->hasAccess('coupons.index'));
            });
        });

        return $menu;
    }
}