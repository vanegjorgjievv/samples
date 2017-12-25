<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8">
	 

<fieldset>
	<legend><?php print lang("Add new doctor")?></legend>
	
	<form class="form-horizontal" role="form" method="post" action="" > 
	<span><?php print lang("The fields with red color are required.")?><br/></span>
	
 <div class="form-group has-error">
 <br/>
	<label  for="firstname" class="col-lg-2 control-label"><?php print lang("Firstname")?> </label>
	<div class="col-lg-10 controls">
	<input type="text" name="firstname" class="form-control validacija" id="" placeholder="<?php print lang("Firstname")?>" value="<?php echo set_value('firstname', $this->input->post("firstname")); ?>" />
	<span for="firstname" class="help-block has-error"><?php echo form_error('firstname'); ?></span>
	</div>
</div>
 <div class="form-group has-error">
 <br/>
	<label  for="lastname" class="col-lg-2 control-label"><?php print lang("Lastname")?> </label>
	<div class="col-lg-10 controls">
	<input type="text" name="lastname" class="form-control validacija" id="" placeholder="<?php print lang("Lastname")?>" value="<?php echo set_value('lastname', $this->input->post("lastname")); ?>" />
	<span for="lastname" class="help-block has-error"><?php echo form_error('lastname'); ?></span>
	</div>
</div>

<div class="form-group has-error">
 <br/>
	<label for="speciality" class="col-lg-2 control-label"><?php print lang("Speciality")?></label>
	<div class="col-lg-10 controls">
	<input type="text" name="speciality" class="form-control validacija" id="" placeholder="<?php print lang("Speciality")?>" value="<?php echo set_value('speciality', $this->input->post("speciality")); ?>" />
	<span for="speciality" class="help-block has-error"><?php echo form_error('speciality'); ?></span>
	<br/>
	</div>
</div>


<div class="form-group has-error">
	<label for="" class="col-lg-2 control-label"><?php print lang("Hospital")?></label>
		<div class="col-lg-10 controls">
			<select class="form-control validacijaselect hospitalselect" name="hospital" id="idhosp" onchange="getDepartment(this.value)">
				<option value="0"><?php print lang("Choose hospital")?></option>
				<?php foreach($hospitals as $h) { ?>
				<option  value="<?php print $h->getId();?>" <?php print (set_value('hospital', $this->input->post("hospital")) == $h->getId()) ? "selected='selected'" : ""?> ><?php print $h->getName();?></option> 
				<?php }?>
		    </select>
		    <span for="hospital" class="help-block has-error"><?php echo form_error('hospital'); ?></span>
	    <br/>
	    </div>
 </div>
 
 <div id="departmentinfo"></div>
 
 
 <div class="form-group">
		<label for="" class="col-lg-2 control-label"><?php print lang("Phone")?> </label> 
		<div class="col-lg-10">
		<input type="text" name="phone" class="form-control" id="" placeholder="<?php print lang("Phone")?>" value="<?php echo set_value('phone', $this->input->post("phone")); ?>" />
	    <br/>
	    </div>
</div>
	
<div class="form-group">
		<label for="" class="col-lg-2 control-label"><?php print lang("Email")?></label>
		<div class="col-lg-10">
		<input type="text" name="email" class="form-control" id="" placeholder="<?php print lang("Email")?>" value="<?php echo set_value('email', $this->input->post("email")); ?>" />
		<br/>
		</div>
</div>
<div class="form-group">
		<label for="" class="col-lg-2 control-label"><?php print lang("Comment")?></label>
		<div class="col-lg-10">
		<input type="text" name="comment" class="form-control" id="" placeholder="<?php print lang("Comment")?>" value="<?php echo set_value('comment', $this->input->post("comment")); ?>" />
		<br/>
		</div>
</div>


<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <button type="submit" class="btn btn-primary"><?php print lang("Insert")?></button>
    <a class="btn btn-info" href="/hospitaldoctors/index"><?php print lang("Cancel")?> </a>
    </div>
</div>

</form>
</fieldset>

</div>
</div>

<script type="text/javascript">

function getDepartment(id) {

	$.post("/hospitaldoctors/a_getdepartments/",
			{ hospital: id },
			function(data){
				//alert(data)
				$("#departmentinfo").html(data);
			});
				
		
}


</script>
 
 
<script type="text/javascript">

$('.validacija').keyup(function(){
	if($(this).val().length > 1 ){
	 $(this).parent().parent().removeClass("has-error");}});

$('.validacija').keydown(function(){
	 if($(this).val().length < 2 ){
		 $(this).parent().parent().addClass("has-error");}});

$('.validacija').focusout(function(){
	 if($(this).val().length < 1 ){
		 $(this).parent().parent().addClass("has-error");}});
$('.validacijaselect').on('change',function(){
	if($(this).val() > 0 ){
		 $(this).parent().parent().removeClass("has-error");}
	else{
		$(this).parent().parent().addClass("has-error");}}) 
		 
</script>

