<?php

namespace Modules\Testimonials\Sidebar;


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
            $group->item('Testimonials',function(Item $item){
                $item->weight(config('testimonials.sidebar.weight'));
                $item->icon(config('testimonials.sidebar.icon'));
                $item->route('admin.testimonials.index');
                $item->authorize($this->auth->hasAccess('testimonials.index'));
            });
        });

        return $menu;
    }
}