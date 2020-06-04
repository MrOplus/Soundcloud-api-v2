<?php


namespace App\Helper;


class SoundgenHelper
{
    private $client_id = "wZqSTsuaIqNKp9h7w02H2wjF7Cez8C4y";
    private $app_version = "1591174330";
    private $url = "" ;
    public function getUrl(){
        return $this->url;
    }
    public function __construct($url)
    {
        $this->url = preg_replace('/\\?.*/', '', $url);

    }
    public function generate(){
        $content = $this->get($this->url);
        if($content == false)
            return ["Status" => "Error" , "Message" => "Invalid Http Response"];
        $matches = [] ;
        $result = preg_match('/https:\/\/api-v2\.soundcloud\.com\/media\/soundcloud:tracks\:(\d+)\/([0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12})\/stream\/progressive/',$content,$matches);
        if(!$result)
            return ["Status" => "Error" , "Message" => "MP3 Url Not Found"];
        $api = $matches[0];
        $api .= "?client_id=$this->client_id&app_version=$this->app_version&app_locale=en";
        $sc_api = $this->get($api);
        if($sc_api == false)
            return ["Status" => "Error" , "Message" => "Invalid Http Response"];
        $data = json_decode($sc_api,true);
        if(isset($data['url']))
            return ["Status" => "Success" , "Url" => $data['url']];
        else
            return ["Status" => "Error" ,  "Message" => "MP3 Endpoint Url Not Found"];
    }
    private function get($url){
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36 Edg/83.0.478.37");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $content = curl_exec($ch);
            curl_close($ch);
            return $content;
        }catch (\Exception $ex){
            return false;
        }
    }
}
