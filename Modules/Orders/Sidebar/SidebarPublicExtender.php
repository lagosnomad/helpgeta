<?php

namespace Modules\Orders\Sidebar;


use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as PackageSideBarExtender;
use Modules\Core\Sidebar\BaseSidebarExtender;

class SidebarPublicExtender extends BaseSidebarExtender implements PackageSideBarExtender
{
    public function extendWith(Menu $menu)
    {
        $menu->group('Account', function (Group $group)
        {
            $group->weight(0);
            $group->hideHeading();
            $group->item('Manage Requests',function(Item $item){
                $item->weight(1);
                $item->icon('fa fa-list-alt');
                $item->route('account.orders.index');
            });
        });

        return $menu;
    }
}