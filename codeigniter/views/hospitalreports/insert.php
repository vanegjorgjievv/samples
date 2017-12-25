<?php $hospitalreport = Session::get("hospitalreport"); ?>
<?php if ( $hospitalreport) { ?>

<script>
$(function(){
	getDepartment('<?php print $hospitalreport?>');
});
</script>
<?php } ?>


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8">
	
	<fieldset>
		<legend><?php print lang("New report")?></legend>

	<form class="form-horizontal" role="form" method="post" action="" >

	<span><?php print lang("The fields with red color are required.")?><br/></span>
		
		<div class="form-group">
		<br/>
			<label for="" class="col-lg-2 control-label"><?php print lang("Creation date")?></label>
			<div class="col-lg-6">
			<input type="text" class="form-control" name="created" id="created" value="<?php print date("d-m-Y")?>" readonly="readonly">
	
			</div>
		</div>
		
		<div class="form-group">
		<br/>
			<label for="" class="col-lg-2 control-label"><?php print lang("Date")?></label>
			<div class="col-lg-6">
			<input type="text" class="form-control" name="date" id="date" value="<?php print date("d-m-Y")?>">
			<br/>
			</div>
		</div>
		<?php if( $hospitalreport ) { ?>
		
		<div class="form-group has-error">
		<label for="" class="col-lg-2 control-label"><?php print lang("Hospital")?></label>
			<div class="col-lg-6 controls">
				<select class="form-control validacijaselect hospitalselect" name="hospital" id="idhosp" onchange="getDepartment(this.value)">
					<option value="0"><?php print lang("Choose hospital")?></option>
					<?php foreach($hospitals as $k => $v) { ?>
					<option <?php print ($hospitalreport == $k) ? "selected='selected'" : ""?>  value="<?php print $k?>"><?php print $v?></option>
					<?php }?>
			    </select>
			    <span for="hospital" class="help-block has-error"><?php echo form_error('hospital'); ?></span>
		    <br/>
		    </div>
	 </div>
	 
	 <?php } else {?>
	 
	 <div class="form-group has-error">
		<label for="" class="col-lg-2 control-label"><?php print lang("Hospital")?></label>
			<div class="col-lg-6 controls">
				<select class="form-control validacijaselect hospitalselect" name="hospital" id="idhosp" onchange="getDepartment(this.value)">
					<option value="0"><?php print lang("Choose hospital")?></option>
					<?php foreach($hospitals as $k => $v) { ?>
					<!-- <option  value="<?php //print $h->getId();?>" <?php //print (set_value('hospital', $this->input->post("hospital")) == $h->getId()) ? "selected='selected'" : ""?> ><?php //print $h->getName();?></option> --> 
					<option   value="<?php print $k?>"><?php print $v?></option>
					<?php }?>
			    </select>
			    <span for="hospital" class="help-block has-error"><?php echo form_error('hospital'); ?></span>
		    <br/>
		    </div>
	 </div>
	 
	 <?php } ?>
	 
	 <div id="departmentinfo"></div>  
	 
	  <div id="doctorinfo">
<!-- 	  
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
-->	  
	  </div>
	
	 <div id="specialityinfo"></div> 
	 
	<div class="form-group">
		<label for="" class="col-lg-2 control-label"><?php print lang("Reception")?></label>
			<div class="col-lg-6">
				<select class="form-control" name="recepcion" >
				 <?php foreach ($reception as $rt) {?>
				 	<option value="<?php print $rt->getId();?>"><?php print lang($rt->getValue())?></option>
				 <?php }?>
				</select>
				<br/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="" class="col-lg-2 control-label"><?php print lang("Collaboration")?></label>
			<div class="col-lg-6">
			<textarea name="collaboration" class="form-control" rows="" cols="30"></textarea>
			<br/>
			</div>
		</div>
		
		<div class="form-group has-error">
			<label for="" class="col-lg-2 control-label"><?php print lang("Comment")?></label>
			<div class="col-lg-6">
			<textarea name="comment" class="form-control validacija" rows="" cols="30"></textarea>
			 <span for="comment" class="help-block has-error"><?php echo form_error('comment'); ?></span>
			 <br/>
			</div>
		</div>

		<div class="form-group">
		    <div class="col-lg-offset-2 col-lg-10">
		    <button type="submit" class="btn btn-primary"><?php print lang("Insert")?></button>
		     <a class="btn btn-info" href="/hospitalreports/index"><?php print lang("Cancel")?> </a>
		    </div>
		</div>
		
		
		
</form>
</fieldset>
</div>		
</div>

<script type="text/javascript">

function getDepartment(id) {

	$.post("/hospitalreports/a_getdepartments/",
			{ hospital: id },
			function(data){
				//alert(data)
				if (data == "false"){
					
					$.post("/hospitalreports/a_gethospitaldoctors/",
							{ hospital: id },
							function(data){
								$("#departmentinfo").html("");

								$("#doctorinfo").html(data);
							})
					
				} else {
				
					$("#departmentinfo").html(data);
				}
			});
}
function getDoctor(id) {

	$.post("/hospitalreports/a_getdoctors/",
			{ department: id },
			function(data){
				//alert(data)
				$("#doctorinfo").html(data);
			});
}


</script>
<!-- 
<script type="text/javascript">

$("body").on("change",".depselect",function(){

	var value = $(this).val();
	
	$.post("/hospitalreports/a_getdoctors/",
			{ department: value },
			function(data){
				//alert(data)
				$("#doctorinfo").html(data);
			});

	
})

</script>
-->




<script type="text/javascript">

$("body").on("change",".hospitalselect",function(){

	var valueh = $(this).val();

	
	
	$.post("/hospitalreports/a_getdoctorsdepartmentnull/",
				{ hospital: valueh },
				function(data){
					
					$("#doctorinfo").html(data);

				});

});	

	$("body").on("change",".depselect",function(){

	var valued = $(this).val();
	var valueh = $("#idhosp").val();

	if ( valued == 0 ){ 

		$.post("/hospitalreports/a_getdoctorsdepartmentnull/",
				{ hospital: valueh },
				function(data){
					
					$("#doctorinfo").html(data);
				});

	} else {
	
		$.post("/hospitalreports/a_getdoctors/",
				{ hospital: valueh , department: valued },
				function(data){
					
					$("#doctorinfo").html(data);
				});
	}
		
	});

	

	$("body").on("change",".doctorselect",function(){

		var valuedoc = $(this).val();

		if (valuedoc != 0 ){
		
			$.post("/hospitalreports/a_getdoctorspeciality/",
					{ doctor: valuedoc },
					function(data){
						
						$("#specialityinfo").html(data);
					});
		} else {

			$("#specialityinfo").html("");
		}
		
	});

	$(".hospitalselect").on("change", function(){

		$("#specialityinfo").html("");

	});
	


</script>




<script>


$(function() {
	$( "#date" ).datepicker();
});

</script>

 <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
<script type="text/javascript">

$('.validacija').keyup(function(){
	 $(this).parent().parent().removeClass("has-error");});

$('.validacija').focusout(function(){
	 if($(this).val().length < 1 ){
		 $(this).parent().parent().addClass("has-error");}});

$('.validacijaselect').on('change',function(){
	if($(this).val() > 0 ){
		 $(this).parent().parent().removeClass("has-error");}
	else{
		$(this).parent().parent().addClass("has-error");}}) 

		
var selectedValue = $('.validacijaselect').find(":selected").val();
	if( selectedValue > 0 ){
		 $('.validacijaselect').parent().parent().removeClass("has-error");}
	else{
		$('.validacijaselect').parent().parent().addClass("has-error");}

		 

	 
</script>









