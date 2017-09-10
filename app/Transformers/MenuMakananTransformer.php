<?php

namespace App\Transformers;

use App\Menu;
use League\Fractal\TransformerAbstract;

class MenuMakananTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Menu $menu)
    {
        $admin = \Auth::user();
        $actionUrl = admin_url('menu-makanan').'/'.$menu->id;
        $editBtn = admin_edit_button($actionUrl.'/edit', $admin);
        $deleteBtn = admin_delete_button($actionUrl, $admin);


        return [
            'id' => $menu->id,
            'nama_menu' => ucwords($menu->nama_menu),
            'jenis' => ucfirst($menu->jenis),
            'harga' => 'Rp. '.number_format($menu->harga, 0, ',', '.'),
            'action' => $editBtn.$deleteBtn
        ];
    }
}
