<?php

namespace Modules\Identifications\Sidebar;


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
            $group->item('Identifications',function(Item $item){
                $item->weight(config('identifications.sidebar.weight'));
                $item->icon(config('identifications.sidebar.icon'));
                $item->route('admin.identifications.index');
                $item->authorize($this->auth->hasAccess('identifications.index'));
            });
        });

        return $menu;
    }
}