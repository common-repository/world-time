<div class="wrap">
	<h2><?php _e('Time Settings') ?></h2>
	<form action="options.php" method="post">
		<?php settings_fields('wt-settings') ?>
		<h3 class="title"><?php _e('Time Zones') ?></h3>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="_wt_time_1"><?php _e('1 Time') ?>:</label></th>
					<td>
						<select name="_wt_time_1" id="_wt_time_1" class="postform">
						<?php echo $this->getTimezones(1) ?>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="_wt_time_2"><?php _e('2 Time') ?>:</label></th>
					<td>
						<select name="_wt_time_2" id="_wt_time_2" class="postform">
						<?php echo $this->getTimezones(2) ?>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="_wt_time_3"><?php _e('3 Time') ?>:</label></th>
					<td>
						<select name="_wt_time_3" id="_wt_time_3" class="postform">
						<?php echo $this->getTimezones(3) ?>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="_wt_time_4"><?php _e('4 Time') ?>:</label></th>
					<td>
						<select name="_wt_time_4" id="_wt_time_4" class="postform">
						<?php echo $this->getTimezones(4) ?>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_attr_e('Save Settings') ?>">
		</p>
	</form>
</div>