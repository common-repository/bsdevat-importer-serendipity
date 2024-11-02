<?php
/**
 * 
 * 
 * @package 
 * @file class-bsdevat-importer-formelement.php
 * @date 22.02.2011 08:59:38
 * @author Sebastian Brandner (http://bsdev.at)
 */

namespace BSDEVat\Utilities;

class Formelement {
	/**
	 * @var string
	 */
	private $type;
	/**
	 * @var string
	 */
	private $value;
	/**
	 * @var string
	 */
	private $label;
	/**
	 * @var string
	 */
	private $description;
	/**
	 * @var array
	 */
	private $options;
	/**
	 * @var array
	 */
	private $html_attributes;
	
	private function generate_id() {
		// TODO namen mit [] durch _ ersetzen
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $type
	 * @param string $name
	 * @param string $value
	 * @param string $label
	 * @param string $description
	 * @param array $html_attributes
	 * @param array $options
	 */
	public function __construct( $type, $name, $value, $label = '', $description = '', $html_attributes = NULL, $options = NULL ) {
		$this->type            = $type;
		$this->name            = $name;
		$this->value           = $value;
		$this->label           = $label;
		$this->description     = $description;
		$this->html_attributes = $html_attributes;
		$this->options         = $options;
	}
	
	/**
	 * Enter description here ...
	 * 
	 * @return string
	 */
	public function get_html() {
		switch( $this->type ) {
			case 'textarea': {
				break;
			}
			case 'select': {
				break;
			}
			case 'input':
			case 'password':
			case 'checkbox': {
				break;
			}
			case 'hidden': {
				return $this->get_html_as_hidden();
				break;
			}
			default: {
				// TODO throw Exception ??
			}
		} 
	}
	
	/**
	 * Enter description here ...
	 * 
	 * @return string
	 */
	public function get_html_as_hidden() {
		// TODO <input hidden> ausgeben
		return '<input type="hidden" name="' . $this->name . '" id="' . $this->generate_id() . '" value ="' . $this->value . '" />';
	}
	
	/**
	 * Enter description here ...
	 * 
	 * @return string
	 */
	public function __toString() {
		return $this->get_label() . $this->get_html();
	}
}