Camon
=====

A PHP package mainly developed for Laravel to generate icon fonts like the below.  
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/Camon/tree/1.0))

* [Font-Awesome](http://fortawesome.github.io/Font-Awesome/)
* [Glyphicons](http://glyphicons.com/)
* [Ionicons](http://ionicons.com/)
* [Octicons](https://octicons.github.com/)
* [Foundation Icon Fonts](http://zurb.com/playground/foundation-icon-fonts-3)
* [Material Icons](http://google.github.io/material-design-icons/)

![Imgur](http://i.imgur.com/FTOCIwy.png)

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/camon": "2.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\Camon\CamonServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Camon'   => Sukohi\Camon\Facades\Camon::class
    ]

Usage
====

    // Font-Awesome
    echo \Camon::FA('home');
    
    // Glyphicons
    echo \Camon::GL('home');
    
    // Ionicons
    echo \Camon::ION('home');
    
    // Octicons
    echo \Camon::OCT('home');
    
    // Foundation Icon Fonts
    echo \Camon::FI('home');
    
    // Material Icons
    echo \Camon::MI('face');

**Options**

    // Specific tag
    echo \Camon::FA('home')->tag('span');

    // Additional Class
    echo \Camon::FA('home', ['class' => 'text-success']);

    // Specific Property
    echo \Camon::FA('home', ['id' => 'id']);

    // Without After-Spacing

    echo \Camon::FA('home', [], false);

    // Multiply
    echo \Camon::FA('home', [
    	'id' => 'your-id-name', 
    	'class' => 'your-class-name'
    ], false);

**After-Spacing**

    echo \Camon::FA('home')->space();	// without space
    echo \Camon::FA('home')->space('left');
    echo \Camon::FA('home')->space('right');
    echo \Camon::FA('home')->space('both');

**CDN**

    echo \Camon::cdn('fontawesome');
    echo \Camon::cdn('fontawesome', $version = '4.4.0');
    echo \Camon::cdn('fontawesome', $version = '4.4.0', $tag = true);
    echo \Camon::cdn('fontawesome', $version = '4.4.0', $tag = false);	// Only URL
    
* Parameter for cdn can be `fontawesome`, `glyphicons`, `ionicons`, `octicons`, `foundation` and `material-icons`.  

Note: material-icons doesn't have version as of 10 Aug, 2015.

How to search icons
====

Try the below. Really useful!  
  
* [GlyphSearch](http://glyphsearch.com/)

License
====

This package is licensed under the MIT License.

Copyright 2014 Sukohi Kuhoh