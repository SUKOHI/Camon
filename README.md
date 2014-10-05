Camon
=====

A PHP package mainly developed for Laravel to generate icon fonts like font-awesome, glyphicons, ionicons and octicions.

Installation&setting for Laravel
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\Camon\CamonServiceProvider', 
    )

Also

    'aliases' => array(  
        ...Others...,  
        'Camon' => 'Sukohi\Camon\Facades\Camon',
    )

Usage
====

**Basic**

    echo Camon::fontawesome('search');
    echo Camon::glyphicon('search');
    echo Camon::ionicon('search');
    echo Camon::octicon('search');

**Arias**

    echo Camon::FA('search');	// fontawesome('search')
    echo Camon::GL('search');	// glyphicon('search')
    echo Camon::ION('search');	// ionicon('search')
    echo Camon::OCT('search');	// octicon('search')

**Additional**

    // changing tag to span
    echo Camon::fontawesome('search')->tag('span');

    // with additional class
    echo Camon::fontawesome('search', array(
    	'class' => 'text-success'
    ));

    // with additional id
    echo Camon::glyphicon('search', array(
    	'id' => 'id'
    ));

    // disabled after-spacing

    echo Camon::ionicon('search', array(), false);

    // with All
    echo Camon::octicon('search', array(				
    	'id' => 'glyphicon', 
    	'class' => 'text-success'
    ), false);
		
**CDN**

    echo Camon::cdn('fontawesome');
    echo Camon::cdn('glyphicon', $version = '3.0.0');
    echo Camon::cdn('ionicon', $version = '1.5.2', $tag = true);
    echo Camon::cdn('octicon', $version = '2.1.2', $tag = false);	// Only URL

**Search icon**

If you'd like to find specific icons, the following page is really useful!
http://glyphsearch.com/