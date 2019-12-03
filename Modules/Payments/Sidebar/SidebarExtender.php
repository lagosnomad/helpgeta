<?php

namespace Modules\Payments\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::global.menus.content'), function (Group $group)
        {
            $group->item('Payments',function(Item $item){
                $item->weight(config('payments.sidebar.weight'));
                $item->icon(config('payments.sidebar.icon'));
                $item->route('admin.payments.index');
                $item->authorize($this->auth->hasAccess('payments.index'));
            });
        });

        return $menu;
    }
}