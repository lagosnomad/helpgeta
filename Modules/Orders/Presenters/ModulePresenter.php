<?php namespace Modules\Orders\Presenters;

use Carbon\Carbon;
use Modules\Core\Presenters\Presenter;

class ModulePresenter  extends Presenter
{

    /**
     * Get title
     *
     * @return string
     */
    public function title()
    {
        return '';
    }

    public function status()
    {
        $status = isset($this->entity->status) ? $this->entity->status : null;
        if(!is_null($status)){
            return order_status_label($status->name);
        }
        return '';
    }

    public function createdAt()
    {
        $date = new Carbon($this->entity->created_at);
        return $date->toDayDateTimeString();
    }

    public function location()
    {
        $location = $this->entity->address;
        $location .= ($this->entity->landmark !='') ? ', '.$this->entity->landmark : '';
        $location .= '<br>';
        $location .= $this->entity->city->name.', '.$this->entity->state->name;
        return $location;
    }
}