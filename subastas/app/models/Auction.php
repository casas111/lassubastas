<?php
/**
 * Created by PhpStorm.
 * User: alejandro
 * Date: 2/17/14
 * Time: 5:34 PM
 */

class Auction extends Eloquent{

    protected $fillable = array('*');

    //---------- Belongs To ----------------

    public function user()
    {
        return $this->belongsTo('User','id_user');
    }

    public function item()
    {
        return $this->belongsTo('Item','id_item');
    }

    //------------ Has ----------------------

    public function bids()
    {
        return $this->hasMany('Bid','id_auction');
    }



}