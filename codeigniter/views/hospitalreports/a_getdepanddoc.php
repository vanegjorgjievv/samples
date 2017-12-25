
 <div class="form-group">
	<label for="" class="col-lg-2 control-label"><?php print lang("Department")?></label>
		<div class="col-lg-6 controls">
			<select class="form-control validacijaselect depselect" name="department" id="iddep">
				<option value="0"><?php print lang("Choose department")?></option>
				<?php foreach($departments as $d) { ?>
				<option  value="<?php print $d->getDepartment();?>" ><?php print Department::find($d->getDepartment())->getName();?></option> 
				<?php }?>
		    </select>
		    <span for="department" class="help-block has-error"><?php echo form_error('department'); ?></span>
	    <br/>
	    </div>
 </div>
 
  <div class="form-group">
	<label for="" class="col-lg-2 control-label"><?php print lang("Doctor")?></label>
		<div class="col-lg-6 controls">
			<select class="form-control validacijaselect docselect" name="doctor" id="iddoc">
				<option value="0"><?php print lang("Choose doctor")?></option>
				<?php foreach($doctors as $d) { ?>
				<option  value="<?php print $d->getId();?>" ><?php print $d->getFirstname()." ".$d->getLastname();?></option> 
				<?php }?>
		    </select>
		    <span for="doctor" class="help-block has-error"><?php echo form_error('doctor'); ?></span>
	    <br/>
	    </div>
 </div>