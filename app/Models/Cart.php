<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = null ;
    public $total_qty = 0;
    public $total_price = 0;

    /**
     * Cart constructor.
     * @param $oldCart
     */
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->total_qty = $oldCart->total_qty;
            $this->total_price = $oldCart->total_price;
        }
    }

    /**
     * @param $item
     * @param $id
     */
    public function add($item, $id)
    {
        $listItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $listItem = $this->items[$id];
            }
        }
        $listItem['qty']++;
        $listItem['price'] = $item->price * $listItem['qty'];
        $this->total_price += $item->price;
        $this->items[$id] = $listItem;
        $this->total_qty++;
    }

    /**
     * @param $id
     */
    public function reduceOne($id)
    {
        $this->items[$id]['qty']--;
        $this->total_qty--;
        $price = $this->items[$id]['item']['price'];
        $this->total_price -= $price;
        $this->items[$id]['price'] -= $price;
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    /**
     * @param $id
     */
    public function increaseOne($id)
    {
        $this->items[$id]['qty']++;
        $this->total_qty++;
        $price = $this->items[$id]['item']['price'];
        $this->total_price += $price;
        $this->items[$id]['price'] += $price;
    }

    /**
     * @param $id
     */
    public function removeItem($id) {
        $this->total_qty -= $this->items[$id]['qty'];
        $price = $this->items[$id]['item']['price'];
        $this->total_price -= $price;
        unset($this->items[$id]);
    }
}
