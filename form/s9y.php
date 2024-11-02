<?php
/**
 * 
 *
 * @package 
 * @file s9y.php
 * @date 26.02.2011 21:47:48
 * @author Sebastian Brandner (http://bsdev.at)
 */

if( !isset( $_POST['s9y_host'] ) ) { $_POST['s9y_host'] = 'localhost'; }
if( !isset( $_POST['s9y_user'] ) ) { $_POST['s9y_user'] = 'serendipity'; }
if( !isset( $_POST['s9y_name'] ) ) { $_POST['s9y_name'] = 'serendipity'; }
if( !isset( $_POST['s9y_prefix'] ) ) { $_POST['s9y_prefix'] = 'serendipity_'; }
if( !isset( $_POST['s9y_override'] ) ) { $_POST['s9y_override'] = 'update'; }

?>
<!-- START form/s9y.php -->
<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e( $this->get_class_label() , $this->get_textdomain() ) ?></h2>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
		<?php wp_nonce_field( self::WP_NONCE ); ?>
		<table>
		    <tbody>
		    	<tr>
		    		<td colspan="3"><strong><?php _e( 'Enter the data to access your serendipity blog.', $this->get_textdomain() ); ?></strong></td>
		    	</tr>
		    	<tr>
		    		<td width="150">DB Type</td>
		    		<td width="250">
		    			<select name="s9y_type">
		    				<option value="pdomysql"<?php echo ( 'pdomysql' == $_POST['s9y_type'] ? ' selected="selected"' : '' ); ?>>PDO MySQL</option>
		    				<option value="pdopgsql"<?php echo ( 'pdopgsql' == $_POST['s9y_type'] ? ' selected="selected"' : '' ); ?>>PDO PostgreSQL</option>
		    			</select>
	    			</td>
		    		<td><em><?php _e('You need either PDO_MySQL or PDO_PostgreSQL', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>DB Server</td>
		    		<td><input type="text" name="s9y_host" value="<?php echo $_POST['s9y_host']?>" /></td>
		    		<td><em><?php _e('The hostname or ip adress from the database server.', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>DB Port</td>
		    		<td><input type="text" name="s9y_port" size="6" maxlength="5" value="<?php echo $_POST['s9y_port']?>" /></td>
		    		<td><em><?php _e('If you need to connect to a socket, leave this field blank. The default port for PostgreSQL is 5432 and for MySQL 3306.', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>DB User</td>
		    		<td><input type="text" name="s9y_user" value="<?php echo $_POST['s9y_user']?>" /></td>
		    		<td><em><?php _e('', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>DB Password</td>
		    		<td><input type="password" name="s9y_pass" value="" /></td>
		    		<td><em><?php _e('', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>DB Name</td>
		    		<td><input type="text" name="s9y_name" value="<?php echo $_POST['s9y_name']?>" /></td>
		    		<td><em><?php _e('Your db name, e.g. <em>serendipity</em>', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>Tableprefix</td>
		    		<td><input type="text" name="s9y_prefix" value="<?php echo $_POST['s9y_prefix']?>" /></td>
		    		<td><em><?php _e('Table prefix like "serendipity_".', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td colspan="3">
		    			<strong><?php _e( 'Import options', $this->get_textdomain() ); ?></strong>
		    		</td>
		    	</tr>
		    	<tr>
		    		<td valign="top">Override</td>
		    		<td>
		    			<input type="radio" name="s9y_override" value="update"<?php echo ( 'update' == $_POST['s9y_override'] ? ' selected="selected"' : '' ) ?>/>
		    			<?php _e( 'Update entries', $this->get_textdomain() ); ?><br />
		    			
		    			<input type="radio" name="s9y_override" value="delete"<?php echo ( 'delete' == $_POST['s9y_override'] ? ' selected="selected"' : '' ) ?>/>
		    			<?php _e( 'Delete and reimport', $this->get_textdomain() ); ?><br />
		    			
		    			<input type="radio" name="s9y_override" value="copy"<?php echo ( 'copy' == $_POST['s9y_override'] ? ' selected="selected"' : '' ) ?>/>
		    			<?php _e( 'Import as copy', $this->get_textdomain() ); ?><br />
		    		</td>
		    		<td><em><?php _e('Choose if you want to update or delete already imported posts or import again as a copy.', $this->get_textdomain() ); ?></em></td>
		    	</tr>
		    	<tr>
		    		<td>&nbsp;</td>
		    		<td>&nbsp;</td>
		    		<td align="right"><input type="submit" name="btnNext" class="button" value="<?php _e( 'Start import', $this->get_textdomain() ); ?> &raquo;" /></td>
		    	</tr>
		    </tbody>
		</table>
	</form>
	<pre><?php var_dump($_POST); ?></pre>
</div>
<!-- END form/s9y.php -->