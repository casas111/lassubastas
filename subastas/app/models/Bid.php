<?php
/**
 * Created by PhpStorm.
 * User: alejandro
 * Date: 2/13/14
 * Time: 1:21 AM
 */

class Bid extends Eloquent{

    protected $fillable = array('*');

    //---------- Belongs To ----------------

    public function user()
    {
        return $this->belongsTo('User','id_user');
    }

    public function auction()
    {
        return $this->belongsTo('Auction','id_auction');
    }

    //------------ Has ----------------------



}