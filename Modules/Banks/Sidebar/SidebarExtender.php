<?php

namespace Modules\Banks\Sidebar;


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
            $group->item('Banks',function(Item $item){
                $item->weight(config('banks.sidebar.weight'));
                $item->icon(config('banks.sidebar.icon'));
                $item->route('admin.banks.index');
                $item->authorize($this->auth->hasAccess('banks.index'));
            });
        });

        return $menu;
    }
}