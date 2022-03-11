<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class FavoritelistComponent extends Component
{
    public function removeFromFavorite($jasa_id){
        foreach(Cart::instance('wishlist')->content() as $fitem){

            if($fitem->id == $jasa_id){
                Cart::instance('wishlist')->remove($fitem->rowId);
                $this->emitTo('favorite-count-component','refreshComponent');
                return;
            }
        }

    }

    public function moveFavoriteToCart($rowId){
        $item=Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Jasa');
        $this->emitTo('favorite-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function render()
    {
        return view('livewire.favoritelist-component')->layout('layouts.base');
    }
}