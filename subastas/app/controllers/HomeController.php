<?php
use Vendorname\autoload;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class HomeController extends BaseController {

    public $restful = true;
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function get_index()
	{

        $auctions = Auction::where('status','=','Active')->get();
        $now=strtotime(date('Y-m-d H:i:s'));
        $result=array();
        foreach ($auctions as $a) {
            $end=strtotime($a->end_date)+intval($a->added_time);
            if($end > $now)
            {
                array_push($result, $a);
            }
            else
            {
                $a->status='Finished';
                $a->save();
            }
        }
		return View::make('inicio')->with('auctions',$result);

	}

    public function post_signin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
        {
            return Redirect::to('inicio');
        }
        else{
            return Redirect::to('inicio')->withErrors('E@Las credenciales no son validas.');
        }
    }



    public function post_register()
    {
            try
            {
                $u1= new User;
                $u1->name=Input::get('uname');
                $u1->email=Input::get('email');
                $u1->password = Hash::make(Input::get('password'));
                $u1->points = 0;
                $u1->avatar='';
                $u1->type='User';
                $u1->save();

                Auth::login($u1);

                return Redirect::to('inicio');
            }
            catch(Exception $e)
            {
                return Redirect::to('inicio')->withErrors('E@Ya hay un usuario con este correo');
            }
    }

    public function get_time($auction_id)
    {

        $auction= Auction::find($auction_id);
        $now=strtotime(date('Y-m-d H:i:s'));
        $result=strtotime($auction->end_date)+intval($auction->added_time)-$now;
        $usr_name=$auction->id_user>0?$auction->user->name:'';
        echo $auction_id."@".date('H:i:s',$result)."@".$auction->price."@".$usr_name;

    }

    public function get_add_time($auction_id)
    {
        if(Auth::check())
        {
            if(Auth::user()->points>0)
            {
                Auth::user()->points--;
                Auth::user()->save();
                $auction= Auction::find($auction_id);
                $auction->added_time+=10;
                $auction->price+=1;
                $auction->id_user=Auth::user()->id;
                $auction->save();
                $now=strtotime(date('Y-m-d H:i:s'));
                $result=strtotime($auction->end_date)+intval($auction->added_time)+11-$now;
                $bid=new Bid;
                $bid->value=$auction->price;
                $bid->id_user=Auth::user()->id;
                $bid->id_auction=$auction->id;
                $bid->save();
                echo $auction_id."@".date('H:i:s',$result)."@".$auction->price."@".Auth::user()->name."@".Auth::user()->points;  


                $connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
                $channel = $connection->channel();

                $channel->exchange_declare('myqueue', 'topic', false, false, false);

                $routing_key = "time";

                $data = $auction_id."@".date('H:i:s',$result)."@".$auction->price."@".Auth::user()->name;

                $msg = new AMQPMessage($data);

                $channel->basic_publish($msg, 'myqueue', $routing_key);

                $channel->close();
                $connection->close();
            }
            else
            {
                echo 'error@No tiene sificientes puntos';
            }
            
        }
        else
        {
            echo 'error@Por favor haga sign in';
        }

              
    }

    public function get_subasta($auction_id)
    {
        $auction= Auction::find($auction_id);
        return View::make('articulo');
    }

    public function get_finish_auction($auction_id)
    {
        $auction= Auction::find($auction_id);
        if($auction->status != "Finished")
        {
            $auction->status="Finished";
            $auction->save();

            $connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
            $channel = $connection->channel();

            $channel->exchange_declare('myqueue', 'topic', false, false, false);

            $routing_key = "time";
            if($auction->id_user == Auth::user()->id)
            {
                $data="done@".$auction_id."@".$auction->item->name."@"."winnerqwe";
            }
            else
            {
                $data = "done@".$auction->item->name."@".$auction->user->name;
            }
            

            $msg = new AMQPMessage($data);

            $channel->basic_publish($msg, 'myqueue', $routing_key);

            $channel->close();
            $connection->close();
        }
        

    }

}