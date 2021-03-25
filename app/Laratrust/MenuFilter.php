<?php

namespace App\Laratrust;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\LaratrustFacade;

class MenuFilter implements FilterInterface
{
    public function transform($item)
    {

        if (isset($item['permission']) && !LaratrustFacade::isAbleTo($item['permission'])) {
            $item['restricted'] = true;
        }
        return  $item;
    }
}