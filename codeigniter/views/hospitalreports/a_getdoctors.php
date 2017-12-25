 <div class="form-group has-error">
	<label for="" class="col-lg-2 control-label"><?php print lang("Doctor")?></label>
		<div class="col-lg-6 controls">
			<select class="form-control validacijaselect doctorselect" name="doctor" id="iddoc">
				<option value="0"><?php print lang("Choose doctor")?></option>
				<?php foreach($doctors as $d) { ?>
				<option  value="<?php print $d->getId();?>" ><?php print $d->getFirstname()." ".$d->getLastname();?></option> 
				<?php }?>
		    </select>
		    <span for="doctor" class="help-block has-error"><?php echo form_error('doctor'); ?></span>
	    <br/>
	    </div>
 </div>
 
 <script>

 $('.validacijaselect').on('change',function(){
		if($(this).val() > 0 ){
			 $(this).parent().parent().removeClass("has-error");}
		else{
			$(this).parent().parent().addClass("has-error");}}) 

 </script>