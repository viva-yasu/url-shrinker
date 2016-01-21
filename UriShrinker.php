<?php
/**
 * Auth: Yasunari Kondo
 */

namespace UriShrinker;


class UriShrinker
{
    private $api_key;
    private $before_url;
    private $short_url;

    /**
     * UriShrinker constructor.
     * @param $api_key string
     * @param $before_url string
     */
    public function __construct($api_key, $before_url)
    {
        $this->api_key = $api_key;
        $this->before_url = $before_url;
        $this->_create_short_url();
    }

    public function getShortUrl()
    {
        return $this->short_url;
    }


    private function _create_short_url()
    {
        $tmp = $this->_curl_start();
        $this->short_url = $tmp->id;
    }

    private function _curl_start()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key=' . $this->api_key);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array('longUrl' => $this->before_url)));
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 5);
        $res1 = curl_exec($curl);
        $res2 = curl_getinfo($curl);
        curl_close($curl) ;

        $json = substr($res1, $res2['header_size']);

        $obj = json_decode($json);

        return $obj;
    }
}

