<?php

namespace Modules\Orders\Sidebar;


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
            $group->item(config('orders.name'),function(Item $item){
                $item->weight(config('orders.sidebar.weight'));
                $item->icon(config('orders.sidebar.icon'));
                $item->route('admin.orders.index');
                $item->authorize($this->auth->hasAccess('orders.index'));
            });
        });

        return $menu;
    }
}