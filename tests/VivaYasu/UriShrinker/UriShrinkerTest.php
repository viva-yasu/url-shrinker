<?php

namespace VivaYasu\UriShrinker\Tests;

use VivaYasu\UrlShrinker\UrlShrinker;

class UriShrinkerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  UrlShrinker $uri_shrinker */
    private $uri_shrinker;
    private $access_key = 'AIzaSyDk8JonB2nEr8nf4C0W4ztDlJDmlDQ-z0U';
    private $long_url = 'https://github.com/viva-yasu/url-shrinker/';

    public function setUp()
    {
        $this->uri_shrinker = new UrlShrinker($this->access_key, $this->long_url);
    }

    public function testGenerateShortUrl()
    {
        $result = $this->uri_shrinker->getShortUrl();
        $this->assertEquals('https://goo.gl/o43GnB', $result);
    }
}