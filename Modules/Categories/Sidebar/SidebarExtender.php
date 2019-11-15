<?php

namespace Modules\Categories\Sidebar;


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
            $group->item('Services',function(Item $item){
                $item->weight(config('categories.sidebar.weight'));
                $item->icon(config('categories.sidebar.icon'));
                $item->route('admin.categories.index');
                $item->authorize($this->auth->hasAccess('categories.index'));
            });
        });

        return $menu;
    }
}