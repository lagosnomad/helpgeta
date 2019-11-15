<?php namespace Modules\Menus\Entities;

use Modules\Core\Collections\NestableTrait;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Menu extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Menus\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];


    public function menu_links()
    {
        return $this->hasMany('Modules\Menus\Entities\MenuLink')->orderBy('position', 'asc');
    }
}