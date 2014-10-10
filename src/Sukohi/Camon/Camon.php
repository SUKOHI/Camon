<?php namespace Sukohi\Camon;

class Camon {
	
	private $_tag = 'i';
	private $_type, $_name, $_space = '';
	private $_params = array();
	
	public function __toString() {
		
		return $this->generate($this->_type, $this->_name, $this->_params);
		
	}
	
	public function id($id) {
		
		$this->_params['id'] = $id;
		return $this;
		
	}
	
	public function css($css) {
		
		$this->_params['class'] = $css;
		return $this;
		
	}
	
	public function tag($tag) {
		
		$this->_tag = $tag;
		return $this;
		
	}
	
	public function space($mode='') {
		
		$this->_space = $mode;
		return $this;
		
	}
	
	public function fontawesome($name, $params=array(), $after_spacing=true) {
		
		$this->setParams('fontawesome', $name, $params, $after_spacing);
		return $this;
		
	}
	
	public function FA($name, $params=array(), $after_spacing=true) {
		
		return $this->fontawesome($name, $params, $after_spacing);
		
	}

	public function glyphicon($name, $params=array(), $after_spacing=true) {
	
		$this->setParams('glyphicon', $name, $params, $after_spacing);
		return $this;
	
	}
	
	public function GL($name, $params=array(), $after_spacing=true) {
		
		return $this->glyphicon($name, $params, $after_spacing);
		
	}

	public function ionicon($name, $params=array(), $after_spacing=true) {
	
		$this->setParams('ionicon', $name, $params, $after_spacing);
		return $this;
	
	}
	
	public function ION($name, $params=array(), $after_spacing=true) {
		
		return $this->ionicon($name, $params, $after_spacing);
		
	}

	public function octicon($name, $params=array(), $after_spacing=true) {
	
		$this->setParams('octicon', $name, $params, $after_spacing);
		return $this;
	
	}
	
	public function OCT($name, $params=array(), $after_spacing=true) {
		
		return $this->octicon($name, $params, $after_spacing);
		
	}
	
	public function generate($type, $name, $params) {
		
		$icon_class = '';
		
		switch($type) {
			
			case 'fontawesome':
				$icon_class = 'fa fa-'. $name;
				break;
				
			case 'glyphicon':
				$icon_class = 'glyphicon glyphicon-'. $name;
				break;
				
			case 'ionicon':
				$icon_class = 'ion-'. $name;
				break;
				
			case 'octicon':
				$icon_class = 'octicon octicon-'. $name;
				break;
			
		}
		
		$params['class'] = (!empty($params['class'])) ? $params['class'] .' '. $icon_class : $icon_class;
		$tag = '<'. $this->_tag . $this->property($params) .'></'. $this->_tag .'>';
		
		switch ($this->_space) {
			
			case 'left':
				$tag = ''. $tag;
				break;
				
			case 'right':
				$tag = $tag .' ';
				break;
				
			case 'both':
				$tag = ' '. $tag .' ';
				break;
			
		}
		
		$this->resetParams();
		return $tag;
		
	}
	
	private function setParams($type, $name, $params, $after_spacing) {
		
		$this->_type = $type;
		$this->_name = $name;
		$this->_params = $params;
		$this->_space = ($after_spacing) ? 'right' : '';
		
	}
	
	private function resetParams() {
		
		$this->_tag = 'i';
		$this->_type = $this->_name = $this->_space = '';
		$this->_params = array();
		
	}
	
	private function property($params) {
		
		$return = '';
		if(empty($params)) $return;
		
		foreach ($params as $key => $value) {
			
			$return .= ' '. $key .'="'. $value .'"';
			
		}
		
		return $return;
		
	}
	
	public static function cdn($icon, $version='', $tag=true) {
		
		$url = '';
		
		switch ($icon) {
			
			case 'fontawesome':
				if(empty($version)) $version = '4.2.0';
				$url = '//maxcdn.bootstrapcdn.com/font-awesome/'. $version .'/css/font-awesome.min.css';
				break;
			
			case 'glyphicon':
				if(empty($version)) $version = '3.0.0';
				$url = '//netdna.bootstrapcdn.com/bootstrap/'. $version .'/css/bootstrap-glyphicons.css';
				break;
			
			case 'ionicons':
				if(empty($version)) $version = '1.5.2';
				$url = '//code.ionicframework.com/ionicons/'. $version .'/css/ionicons.min.css';
				break;
			
			case 'octicons':
				if(empty($version)) $version = '2.1.2';
				$url = '//cdnjs.cloudflare.com/ajax/libs/octicons/'. $version .'/octicons.css';
				break;
				
		}
		
		if(!$tag) {
			
			return $url;
			
		}
		
		return '<link href="'. $url .'" rel="stylesheet">';
		
	}
	
}

/*** Examples

	// Basic ways
	
	echo Camon::fontawesome('search');
	echo Camon::glyphicon('search');
	echo Camon::ionicon('search');
	echo Camon::octicon('search');
	
	// Arias ways
	
	echo Camon::FA('search');	// fontawesome('search')
	echo Camon::GL('search');	// glyphicon('search')
	echo Camon::ION('search');	// ionicon('search')
	echo Camon::OCT('search');	// octicon('search')
	
	// Additional ways
	
	echo Camon::fontawesome('search')->tag('span');		// changing tag to span
	
	echo Camon::fontawesome('search', array(			// with additional class
		'class' => 'text-success'
	));
	
	echo Camon::glyphicon('search', array(				// with additional id
		'id' => 'glyphicon'
	));
	
	echo Camon::ionicon('search', array(), false);		// disabled after-spacing
	
	echo Camon::octicon('search', array(				// with all
		'id' => 'glyphicon', 
		'class' => 'text-success'
	), false);
			
	// CDN

	echo Camon::cdn('fontawesome');
	echo Camon::cdn('glyphicon', $version = '3.0.0');
	echo Camon::cdn('ionicon', $version = '1.5.2', $tag = true);
	echo Camon::cdn('octicon', $version = '2.1.2', $tag = false);	// URL
	
	
	// If you'd like to find specific icons, the following page is really useful!
	// http://glyphsearch.com/
	
***/
