<?php namespace Sukohi\Camon;

class Camon {
	
	var $tag = 'i';
	
	public function __construct($tag='') {
		
		if(!empty($tag)) {
			
			$this->setTag($tag);
			
		}
		
	}
	
	public function setTag($tag) {
		
		$this->tag = $tag;
		
	}
	
	public static function test() {
		
		return 'OK';
		
	}
	
	public function fontawesome($name, $params=array(), $after_spacing=true) {
		
		return $this->get('fontawesome', $name, $params, $after_spacing);
		
	}

	public function glyphicon($name, $params=array(), $after_spacing=true) {
	
		return $this->get('glyphicon', $name, $params, $after_spacing);
	
	}

	public function ionicon($name, $params=array(), $after_spacing=true) {
	
		return $this->get('ionicon', $name, $params, $after_spacing);
	
	}

	public function octicon($name, $params=array(), $after_spacing=true) {
	
		return $this->get('octicon', $name, $params, $after_spacing);
	
	}
	
	public function get($type, $name, $params, $after_spacing) {
		
		$tag = (isset($params['tag'])) ? $params['tag'] : $this->tag;
		$class = (isset($params['class'])) ? $params['class'] .' ' : '';
		$space = ($after_spacing) ? ' ' : '';
		
		switch($type) {
			
			case 'fontawesome':
				$class .= 'fa fa-'. $name;
				break;
				
			case 'glyphicon':
				$class .= 'glyphicon glyphicon-'. $name;
				break;
				
			case 'ionicon':
				$class .= 'ion-'. $name;
				break;
				
			case 'octicon':
				$class .= 'octicon octicon-'. $name;
				break;
			
		}
		
		return '<'. $tag .' class="'. $class .'"'. $this->property($params) .'></'. $tag .'>'. $space;
		
	}
	
	private function property($params) {
		
		$return = '';
		
		if(isset($params['class'])) {
			
			unset($params['class']);
			
		}
		
		if(empty($params)) $return;
		
		foreach ($params as $key => $value) {
			
			$return .= ' '. $key .'="'. $value .'"';
			
		}
		
		return $return;
		
	}
	
}

/*** Examples

	// Simple way
	
	$camon = new Camon();
	echo $camon->fontawesome('search');
	echo $camon->glyphicon('search');
	echo $camon->ionicon('search');
	echo $camon->octicon('search');
	
	// Additional way
	
	$camon = new Camon('span');							// You can chage the tag.(Default: i tag)
	$camon->setTag('span');								// You can chage the tag after generating an instance.
	
	echo $camon->fontawesome('search', array(			// with additional class
		'class' => 'text-success'
	));
	
	echo $camon->glyphicon('search', array(				// with additional id
		'id' => 'glyphicon'
	));
	
	echo $camon->ionicon('search', array(), false);		// disabled after-spacing
	
	echo $camon->octicon('search', array(				// with all
		'id' => 'glyphicon', 
		'class' => 'text-success'
	), false);
	
	
	// If you'd like to find specific icons, the following page is really useful!
	// http://glyphsearch.com/
	
***/
