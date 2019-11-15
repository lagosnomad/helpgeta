<?php

namespace Modules\Cities\Sidebar;


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
            $group->item('Cities',function(Item $item){
                $item->weight(config('cities.sidebar.weight'));
                $item->icon(config('cities.sidebar.icon'));
                $item->route('admin.cities.index');
                $item->authorize($this->auth->hasAccess('cities.index'));
            });
        });

        return $menu;
    }
}