<?php

namespace CodeCommerce;


class Cart {

    private $items;

    function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'name' => $name,
                'price' => $price,
                'qtd' => isset($this->items[$id]['qtd'])?$this->items[$id]['qtd']++ : 1
            ]
        ];
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $item){
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }

    public function removeQtd($id)
    {
        ($this->items[$id]['qtd'] > 1) ? $this->items[$id]['qtd']-- : 1;
    }
}