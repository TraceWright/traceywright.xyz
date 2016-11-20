<?php echo validation_errors(); ?>


<h4>Walk Sessions</h4>

<article>

<ul style="list-style-type: none;">
	<?php foreach ($idwalkdata as $key => $item): ?>
		<li style="padding-bottom: 10px;">

		<!-- form-open will send data to the file location (controller via the route) defined in the 'url', routing is required to make this work -->
		<?php echo form_open('my/admin/locationsadmin'); ?>

		<b><?php echo ($item->sepflag); ?> &emsp;</b>
		<input type="input" name="walkdescription" value="<?php echo ($item->walkdescription); ?>" style="border: none;" />

		<input type="hidden" name="sepflagid" value="<?php echo ($item->sepflag); ?>" />

		<input type="submit" name="submit" value="Update Walk Description" style="color: blue; border-color: blue;">

		<p><a href="<?php echo site_url('my/admin/locationsadmin/'.$item->sepflag); ?>">Remove from Map view</a></p>
			
		</form>
		</li>
	<?php endforeach ?>
</ul>


	<!-- 
	<label for="<?php $walkdescription ?>">Walk Description</label>
    <input type="input" name="walkdescription" /><br />

    <label for="<?php $walknumber ?>">Walk Number</label>
    <input type="input" name="walknumber" /><br />

    <input type="submit" name="submit" value="Send" />
 -->
</article>

