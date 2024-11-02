<?php
/**
 * Generic HTML form
 *
 * @package
 * @file generic.php
 * @date 22.02.2011 08:15:28
 * @author Sebastian Brandner (http://bsdev.at)
 */
?>
<!-- START form/generic.php -->
<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e( $this->get_class_label() , $this->get_textdomain() ) ?></h2>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<?php wp_nonce_field( self::WP_NONCE ); ?>
		<?php
		$steps = $this->get_steps();
		foreach( $steps as $number => $fields ) {
			if( $number !== $step ) {
				foreach( $fields as $field ) {
					// TODO felder als hidden ausgeben
				}
			}
		}
		?>
	</form>
</div>
<!-- END form/generic.php -->
