<?php

namespace Modules\Reports\Sidebar;


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
            $group->item('Reports',function(Item $item){
                $item->weight(config('reports.sidebar.weight'));
                $item->icon(config('reports.sidebar.icon'));
                $item->route('admin.reports.index');
                $item->authorize($this->auth->hasAccess('reports.index'));
            });
        });

        return $menu;
    }
}