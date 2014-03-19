<?php
/**
 * Created by PhpStorm.
 * User: alejandro
 * Date: 2/13/14
 * Time: 1:19 AM
 */

class Item extends Eloquent{

    protected $fillable = array('*');

    //---------- Belongs To ----------------

    //------------ Has ----------------------

    public function auctions()
    {
        return $this->hasMany('Auction','id_auction');
    }


}