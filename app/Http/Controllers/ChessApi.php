<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class ChessApi extends Controller
{
    public function GetMyStats(){
        $clientHTTP=new Client();
        $url="https://api.chess.com/pub/player/C3P03/stats";
        
        try{
        $respose=$clientHTTP->request('GET',$url,[
            'verify'=>false,
        ]);
        $responseBody= json_decode($respose->getBody());
        }catch(\GuzzleHttp\Exception\RequestException $e){
            echo Psr7\Message::toString($e->getRequest());
            if($e->hasResponse()){
                echo Psr7\Message::toString($e->getResponse());
            }
        }
      
        
        return view('chessStats',["responseBody"=>$responseBody]);
    }
}
