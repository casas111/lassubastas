<?php
/**
 * Created by PhpStorm.
 * User: alejandro
 * Date: 2/19/14
 * Time: 1:56 PM
 */

class AdminController extends BaseController {

    public $restful = true;


    public function post_new_item()
    {
        $type = Auth::user()->type;
        if($type == "Admin")
        {
            $item = new Item;
            $item->name=Input::get('nombre');
            $item->description=Input::get('descripcion');
            $item->cost=intval(Input::get('costo'));
            $file = Input::file('imagen_item');
            var_dump($file);
            $destinationPath = 'uploads/';
            if(is_object($file))
            {
                $filename = $file->getClientOriginalName();
                $upload_success = Input::file('imagen_item')->move($destinationPath, $filename);
                if( $upload_success ) {
                    $item->image=$filename;
                }
            }
            $item->average_offers=100;
            $item->save();
            return Redirect::to('admin/new_item')->withErrors('A@Articulo guardado exitosamente!');
        }
        else
        {
            return Redirect::to('inicio')->withErrors('E@No tiene permisos para realizar esta accion.');
        }
    }

    public function get_new_item(){
        $type = Auth::user()->type;
        if($type == "Admin")
        {
            return View::make('admin.new_item');
        }
        else
        {
            return Redirect::to('inicio')->withErrors('E@No tiene permisos para realizar esta accion.');
        }
    }


    public function post_new_auction()
    {
        $type = Auth::user()->type;
        if($type == "Admin")
        {
            $full_date=Input::get('end_date').' '.Input::get('end_time');

            $auction = new Auction;
            $auction->status="Active";
            $auction->id_item=Input::get('item_id');
            $auction->end_date=date("Y-m-d H:i:s",strtotime($full_date));
            $auction->added_time=0;
            $auction->save();

            return Redirect::to('admin/new_auction')->withErrors('A@Subasta ha iniciado exitosamente!');
        }
        else
        {
            return Redirect::to('inicio')->withErrors('E@No tiene permisos para realizar esta accion.');
        }
    }

    public function get_new_auction(){
        $type = Auth::user()->type;
        if($type == "Admin")
        {
            $items=Item::all();
            $now=date('Y-m-d H:i:s');
            return View::make('admin.new_auction')->with('articulos',$items)->with('now',$now);
        }
        else
        {
            return Redirect::to('inicio')->withErrors('E@No tiene permisos para realizar esta accion.');
        }
    }



} 