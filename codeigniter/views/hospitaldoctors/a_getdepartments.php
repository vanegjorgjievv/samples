 <div class="form-group">
	<label for="" class="col-lg-2 control-label"><?php print lang("Department")?></label>
		<div class="col-lg-10 controls">
			<select class="form-control validacijaselect depselect" name="department">
				<option value="0"><?php print lang("Choose department")?></option>
				<?php foreach($departments as $d) { ?>
					<?php if ( $d->getDepartment() != NULL ) { ?>
					<option  value="<?php print $d->getDepartment();?>" ><?php print Department::find($d->getDepartment())->getName();?></option> 
					<?php }?>
				<?php }?>
		    </select>
		    <span for="department" class="help-block has-error"><?php echo form_error('department'); ?></span>
	    <br/>
	    </div>
 </div>