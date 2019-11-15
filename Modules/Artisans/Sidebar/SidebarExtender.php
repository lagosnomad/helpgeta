<?php

namespace Modules\Artisans\Sidebar;


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
            $group->weight(1);
            $group->item('Service Providers',function(Item $item){
                $item->weight(config('artisans.sidebar.weight'));
                $item->icon(config('artisans.sidebar.icon'));
                $item->route('admin.artisans.index');
                $item->authorize($this->auth->hasAccess('artisans.index'));
            });
        });

        return $menu;
    }
}