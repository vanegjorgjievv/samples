<div class="form-group">
	<label for="speciality" class="col-lg-2 control-label"><?php print lang("Speciality")?></label>
	<div class="col-lg-6 controls">
	<input type="text" name="speciality" class="form-control validacija" id="" placeholder="<?php print lang("Speciality")?>" value="<?php print $hdoctor->getSpeciality();?>" />
	<span for="speciality" class="help-block has-error"><?php echo form_error('speciality'); ?></span>
	<br/>
	</div>
</div>
