<?php namespace Sukohi\Camon;

class Camon {
	
	private $_tag = 'i';
	private $_type, $_name, $_space = '';
	private $_params = [];
	
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
	
	public function space($mode = '') {
		
		$this->_space = $mode;
		return $this;
		
	}
	
	public function fontawesome($name, $params = [], $after_spacing = true) {

		return $this->FA($name, $params, $after_spacing);

	}

	public function FA($name, $params = [], $after_spacing = true) {

		$this->setParams('fontawesome', $name, $params, $after_spacing);
		return $this;

	}

	public function glyphicon($name, $params = [], $after_spacing = true) {

		return $this->GL($name, $params, $after_spacing);

	}

	public function GL($name, $params = [], $after_spacing = true) {

		$this->setParams('glyphicons', $name, $params, $after_spacing);
		return $this;

	}

	public function ionicon($name, $params = [], $after_spacing = true) {

		return $this->ION($name, $params, $after_spacing);

	}

	public function ION($name, $params = [], $after_spacing = true) {

		$this->setParams('ionicons', $name, $params, $after_spacing);
		return $this;

	}

	public function octicon($name, $params = [], $after_spacing = true) {

		return $this->OCT($name, $params, $after_spacing);

	}

	public function OCT($name, $params = [], $after_spacing = true) {

		$this->setParams('octicons', $name, $params, $after_spacing);
		return $this;
		
	}

	public function foundation($name, $params = [], $after_spacing = true) {

		return $this->FI($name, $params, $after_spacing);

	}

	public function FI($name, $params = [], $after_spacing = true) {

		$this->setParams('foundation', $name, $params, $after_spacing);
		return $this;

	}

	public function materialicon($name, $params = [], $after_spacing = true) {

		return $this->MI($name, $params, $after_spacing);

	}

	public function MI($name, $params = [], $after_spacing = true) {

		$this->setParams('material-icons', $name, $params, $after_spacing);
		return $this;

	}
	
	public function generate($type, $name, $params) {
		
		$icon_class = $text = '';
		
		switch($type) {
			
			case 'fontawesome':
				$icon_class = 'fa fa-'. $name;
				break;
				
			case 'glyphicons':
				$icon_class = 'glyphicon glyphicon-'. $name;
				break;
				
			case 'ionicons':
				$icon_class = 'ion-'. $name;
				break;
				
			case 'octicons':
				$icon_class = 'octicon octicon-'. $name;
				break;

			case 'foundation':
				$icon_class = 'fi-'. $name;
				break;

			case 'material-icons':
				$icon_class = 'material-icons';
				$text = $name;
				break;
			
		}
		
		$params['class'] = (!empty($params['class'])) ? $icon_class .' '. $params['class'] : $icon_class;
		$tag = '<'. $this->_tag . $this->property($params) .'>'. $text .'</'. $this->_tag .'>';
		
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
		$this->_params = [];
		
	}
	
	private function property($params) {
		
		$return = '';
		if(empty($params)) $return;
		
		foreach ($params as $key => $value) {
			
			$return .= ' '. $key .'="'. $value .'"';
			
		}
		
		return $return;
		
	}
	
	public static function cdn($icon, $version = '', $tag = true) {
		
		$url = '';

		switch ($icon) {

			case 'fontawesome':
				if(empty($version)) $version = '4.5.0';
				$url = '//maxcdn.bootstrapcdn.com/font-awesome/'. $version .'/css/font-awesome.min.css';
				break;

			case 'glyphicons':
				if(empty($version)) $version = '3.3.6';
				$url = '//maxcdn.bootstrapcdn.com/bootstrap/'. $version .'/css/bootstrap.min.css';
				break;

			case 'ionicons':
				if(empty($version)) $version = '2.0.1';
				$url = '//code.ionicframework.com/ionicons/'. $version .'/css/ionicons.min.css';
				break;

			case 'octicons':
				if(empty($version)) $version = '3.4.1';
				$url = '//cdnjs.cloudflare.com/ajax/libs/octicons/'. $version .'/octicons.min.css';
				break;

			case 'foundation':
				if(empty($version)) $version = '3.0.0';
				$url = '//cdnjs.cloudflare.com/ajax/libs/foundicons/'. $version .'/foundation-icons.min.css';
				break;

			case 'material-icons':
				if(empty($version)) $version = '2.2.0';
				$url = '//cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/'. $version .'/css/material-design-iconic-font.min.css';
				break;

		}
		
		if(!$tag) {
			
			return $url;
			
		}
		
		return '<link href="'. $url .'" rel="stylesheet">';
		
	}
	
}
