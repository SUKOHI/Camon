Camon
=====

A PHP package mainly developed for Laravel to generate icon fonts like font-awesome, glyphicons, ionicons and octicions.

Installation&setting
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\Camon\CamonServiceProvider'  
    )

Also

    'aliases' => array(  
        ...Others...,  
        'Sukohi\Camon\CamonServiceProvider'  
    )

Usage
====

	echo Camon::fontawesome('search');
	echo Camon::glyphicon('search');
	echo Camon::ionicon('search');
	echo Camon::octicon('search');
	
	/***  Additional way  ***/
	
	// with additional  
	echo Camon::fontawesome('search', array(
		'class' => 'text-success'
	));
	
	// with additional id
	echo Camon::glyphicon('search', array(
		'id' => 'glyphicon'
	));
	
	// disabled after-spacing
	echo Camon::ionicon('search', array(), false);
	
	// with many
	echo Camon::octicon('search', array(
		'id' => 'glyphicon', 
		'style' => 'font-size:1.5rem', 
		'class' => 'text-success'
	), false);
