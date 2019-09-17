<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $page =2;
    protected $skip_pages=0;
    protected $dataJSON = '
[
  {
    "item": [
      {
        "id": 0,
        "isActive": true,
        "age": 35,
        "eyeColor": "brown",
        "name": "Isabel Noel",
        "gender": "female",
        "company": "RUBADUB",
        "email": "isabelnoel@rubadub.com",
        "phone": "+1 (905) 515-2287",
        "address": "353 Vanderveer Place, Welda, Texas, 3873"
      }
    ]
  },
  {
    "item": [
      {
        "id": 1,
        "isActive": true,
        "age": 28,
        "eyeColor": "green",
        "name": "Campos Pittman",
        "gender": "male",
        "company": "EVENTIX",
        "email": "campospittman@eventix.com",
        "phone": "+1 (847) 543-3337",
        "address": "860 Ralph Avenue, Yettem, Louisiana, 726"
      }
    ]
  },
  {
    "item": [
      {
        "id": 2,
        "isActive": true,
        "age": 28,
        "eyeColor": "brown",
        "name": "Sharpe French",
        "gender": "male",
        "company": "QUAREX",
        "email": "sharpefrench@quarex.com",
        "phone": "+1 (869) 472-3624",
        "address": "131 Hinsdale Street, Gasquet, Federated States Of Micronesia, 5052"
      }
    ]
  },
  {
    "item": [
      {
        "id": 3,
        "isActive": false,
        "age": 31,
        "eyeColor": "brown",
        "name": "Teresa Bush",
        "gender": "female",
        "company": "OVIUM",
        "email": "teresabush@ovium.com",
        "phone": "+1 (957) 433-3564",
        "address": "257 Williams Place, Elizaville, North Carolina, 2007"
      }
    ]
  },
  {
    "item": [
      {
        "id": 4,
        "isActive": true,
        "age": 33,
        "eyeColor": "green",
        "name": "Lowe Horne",
        "gender": "male",
        "company": "BARKARAMA",
        "email": "lowehorne@barkarama.com",
        "phone": "+1 (967) 560-3576",
        "address": "894 Amboy Street, Skyland, Connecticut, 156"
      }
    ]
  },
  {
    "item": [
      {
        "id": 5,
        "isActive": true,
        "age": 21,
        "eyeColor": "blue",
        "name": "Minnie Reese",
        "gender": "female",
        "company": "EPLODE",
        "email": "minniereese@eplode.com",
        "phone": "+1 (855) 481-3494",
        "address": "703 Prospect Place, Wilmington, Indiana, 1827"
      }
    ]
  }
]';

    public function index(Request $request) 
    {
         $this->skip_pages = 0;
         $request->session()->put('skip_pages',$this->skip_pages);
         return view('home');
    }

    public function ajax(Request $request) 
    {
        $src = json_decode($this->dataJSON);

        // filter isActive
        $resArr = [];
        foreach($src as $i) {
            if($i->item[0]->isActive) $resArr[] = $i;
        }

        $cnt = count($resArr);

        $result = [];
        $finish = 0;
        $this->skip_pages = $request->session()->get('skip_pages',0);
        $result = array_slice($resArr,$this->skip_pages,$this->page);
        $this->skip_pages+=$this->page;
        $request->session()->put('skip_pages',$this->skip_pages);
        if($this->skip_pages>=$cnt) $finish=1;

        return response()->json(['success'=>$result,'skip'=>$this->skip_pages,'finish'=>$finish]);
    }
}
