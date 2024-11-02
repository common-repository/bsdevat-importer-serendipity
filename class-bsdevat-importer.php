<?php
/**
 * The importer base class for WordPress.
 *
 * @package BSDEVat\Importer
 * @file class-bsdevat-importer.php
 * @date 19.02.2011 21:59:11
 * @author Sebastian Brandner (http://bsdev.at)
 */
namespace BSDEVat\Importer;

// Load Importer API
require_once ABSPATH . 'wp-admin/includes/import.php';
require_once dirname(__FILE__) . '/class-bsdevat-formelement.php';

if ( !class_exists( '\WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) ) {
		require_once $class_wp_importer;
	}
}

// TODO Dokumentation
abstract class AbstractImporter extends \WP_Importer {
	const WP_NONCE = 'bsdevat-importer';
	
	protected $s9y_db = NULL;
	
	public function __construct() {

	}

	// ----- PRIVATE FUNCTIONS -----
	/**
	 *
	 * Enter description here ...
	 * @param int $step
	 */
	private function generate_generic_form( $step ) {
		$form = dirname( __FILE__ ) . '/form/generic.php';
		if( file_exists( $form ) ) {
			include $form;
		}
	}

	// ----- PROTECTED FUNCTIONS -----

	// TODO Dokumentation
	abstract protected function get_textdomain();
	abstract protected function get_class_slug();
	abstract protected function get_class_label();
	abstract protected function get_class_description();
	/**
	 * Check the form data
	 *
	 * @abstract
	 * @param int $step
	 * @return WP_Error Returns <em>NULL</em> if the data is valid for this step
	 */
	abstract protected function check_form( $step );
	abstract protected function setup();

	/**
	 * Generate and print a form for the given step
	 *
	 * Each child class has to implement this function to build the
	 * form with fields.
	 *
	 * @param int $step
	 */
	protected function generate_form( $step ) {
		$this->generate_generic_form($step);
	}
	
	/**
	 * Add a formelement or text to the specified step
	 * 
	 * @param int $step
	 * @param mixed $obj
	 */
	protected function add_formrow( $step, $obj ) {
		if ($obj instanceof BSDEVat\Utilities\Formelement) {
			// FIXME elemente zum Formular hinzufügen;
		}
	}
	
	// FIXME aus dem LJ Importer adaptieren
	protected function throw_error( $error, $step ) {
		echo '<p><strong>' . $error->get_error_message() . '</strong></p>';
		echo $this->next_step( $step, __( 'Try Again' , 'livejournal-importer') );
	}

	// ----- PUBLIC FUNCTIONS -----

	// TODO Dokumentation
	public function dispatch() {
		// check if wp_nonce is set
		if ( count( $_POST ) ) {
			check_admin_referer( self::WP_NONCE );
		}
		
		// set actual step
		if ( empty( $_POST['step'] ) ) {
			$step = 0;
		} else {
			$step = (int) $_POST['step'];
		}
		
		// check if "next" button was clicked
		if( isset( $_POST['btnNext'] ) ) {
			$result = $this->check_form( $step );
			if ( is_wp_error( $result ) ) {
				// write error to form
			} else {
				// no error, next step
				$step++;
			}
		}

		/*
		 * Actions mit do_action()
		 * import_done, import_end, import_post_added, import_post_meta, import_start
		 */
		$this->generate_form( $step );
	} // dispatch

	public function load_textdomain() {
		$textdomain = $this->get_textdomain();
	    load_plugin_textdomain(
	    	$textdomain,
	    	false,
	    	dirname( __FILE__ ) . '/languages'
	    );
	}
	
	/**
	 * Initializes the importer, register it to WordPress and loads
	 * the localisation files.
	 */
	public static function init() {
		// Instanz erstellen und registrieren
		$class = get_called_class();
		$instance = new $class();
		$instance->setup();

		$textdomain = $instance->get_textdomain();

		register_importer(
			$instance->get_class_slug(),
			__( $instance->get_class_label(), $textdomain ),
			__( $instance->get_class_description(), $textdomain ),
			array ($instance, 'dispatch')
		);

		add_action( 'init', array( $instance, 'load_textdomain' ) );
	} // init()

} // BSDEVat_Importer
