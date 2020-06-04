<?php

namespace App\Http\Controllers;


use App\Helper\SoundgenHelper;
use App\Url;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Helper;

class SoundgenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function index() {
        return view('index');
    }
    public function generate(Request $request){
        try {
            $this->validate($request, ['url' => 'url|required']);
        }catch (\Exception $e){
            $result = ["Status" => "Error" , "Message" => "Invalid Url"];
            return view('index')->with('result',$result);

        }
        $url = $request->get('url');
        $host = parse_url($url,PHP_URL_HOST);
        if($host != "soundcloud.com") {
            $result = ["Status" => "Error" , "Message" => "Invalid Url"];
            return view('index')->with('result',$result);

        }
        $sc = new SoundgenHelper($url);
        $result =$sc->generate();
        if($result['Status'] == 'Success'){
            if(Url::where('url',$sc->getUrl())->exists()){
                $song = Url::where('url',$sc->getUrl())->first();
                $song->hits = $song->hits +1 ;
                $song->save();
            }else{
                $song = new Url();
                $song->url = $sc->getUrl();
                $song->hits = 1;
                $song->save();
            }
        }
        return view('index')->with('result',$result);
    }
    //
}
