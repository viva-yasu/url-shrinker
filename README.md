# UrlShrinker
UrlShrinker is a simple short URL generator via Google URL Shortener.

# Install
```
$ php composer.phar require viva-yasu/url-shrinker:dev-master
```
or
```
{
  "require": {
      "viva-yasu/url-shrinker": "dev-master"
  }
}
```
write the above in composer.json

# Usage
```
<?php

use VivaYasu\UrlShrinker\UrlShrinker;

$uriShrinker = new UrlShrinker('access key', 'long URL');
echo $uriShrinker->getShortUrl();
```
notice:  
The param1 of This constructor is Google URL Shortener access key.  
The param2 of This constructor is long URL to want to shorten.  
