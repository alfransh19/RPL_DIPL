<?php

namespace App;
 class Cart{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->items = $oldCart->totalQty;
            $this->items = $oldCart->totalPrice;
        }
    }
    public function add($item, $id){
        $storedItem = ['qty'=>0,'price'=>$item->price, 'item'=>$item];
        if($this->items){
            if(is_array($this->items) && array_key_exists($id, $this->items)){
                $storedItem = $items[$id];
            }
        }
        
        $storedItem['qty']++;
        $storedItem['price'] = $item->price *$storedItem['qty'];
        $storedItem[$id]=$storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
 }