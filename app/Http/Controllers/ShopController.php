<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \Cart;

class ShopController extends Controller
{

    /**
     * Add a row to the cart
     *
     * @param string       $id      Unique ID of the item|Item formated as array|Array of items
     * @param string       $name    Name of the item
     * @param int          $qty     Item qty to add to the cart
     * @param float        $price   Price of one item
     * @param Array        $options Array of additional options, such as 'size' or 'color'
     * @return CartCollection
     */
    public function cartAdd($id, $name, $qty, $price, $options = null)
    {
        /**
         * check if no extra options submited equals options value to
         * empty array.
         */
        if($options === null) $options = array();

        $cart = Cart::add($id, $name, $qty, $price, $options);

        return view('carts.addedToCart', compact($cart));
    }

    /**
     * Update the one row of the cart
     *
     * @param  string        $rowId       The rowid of the item you want to update
     * @param  key $attribute   item attribute to update
     * @param  value $attribute   new value of the cart atttibute
     * @return CartCollection
     */
    public function cartUpdate($rowId, $key, $value)
    {
        /**
         * available key to update
         * @var array
         */
        $param = array('id', 'name', 'qty', 'price', 'options');

        /**
         * validate value of each key
         */
        if  ( 
                (! in_array($key, $param)) OR 
                (  in_array($key, array('qty', 'price')) AND ! is_numeric($value)) OR
                (  $key == 'options' AND ! is_array($value) ) 
            )
            abort(404);

        Cart::update($rowId, array($key => $value));

        return $this->cartContent();
    }

    /**
     * Get the cart content
     *
     * @return CartCollection
     */
    public function cartContent()
    {
        $content = Cart::content();

        return view('carts.content', compact('content'));
    }
}
