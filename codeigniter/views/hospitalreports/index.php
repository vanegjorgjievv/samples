<div class="row show-grid">

	<div id="reportform"></div>
	<form method="get" action="">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label><?php print lang("Distributer")?>
					</label>

					<?php if ( User::getCurrent()->getRole() != 2) {?>
					<select class="pull-right form-control" style="width: 160px;"
						name="distributer">
						<option value="">
							<?php print lang("Select distributer")?>
						</option>
						<?php foreach ( $distributers as $d ) {?>
						<option
						<?php print (isset($_GET['distributer']) AND $_GET['distributer'] == $d->getId()) ? "selected='selected'" : "" ?>
							value="<?php print $d->getId()?>">
							<?php print $d->getFirstName() . " " . $d->getLastName()?>
						</option>
						<?php }?>
					</select>
					<?php  } else {?>

					<select class="pull-right form-control" style="width: 160px;"
						name="distributer">
						<option value="<?php print User::getCurrent()->getId()?>">
							<?php print User::getCurrent()->getFirstName() . " " . User::getCurrent()->getLastName()?>
						</option>

					</select>

					<?php }?>
				</div>
				<div class="form-group">
					<label><?php print lang("Region")?>
					</label> <select class="pull-right form-control"
						style="width: 160px;" name="region">
						<option value="">
							<?php print lang("Select region")?>
						</option>
						<?php foreach ($regions as $region) {?>
						<option
						<?php print (isset($_GET['region']) AND $_GET['region'] == $region->getId()) ? "selected='selected'" : "" ?>
							value="<?php print $region->getId()?>">
							<?php print $region->getName()?>
						</option>
						<?php }?>
					</select>
				</div>
				<div class="form-group ">
				<label><?php print lang("Reception")?>
					</label> <select class="pull-right form-control"
						style="width: 160px;" name="recepcion">
						<option value="">
							<?php print lang("Select reception")?>
						</option>
						<?php foreach ( $recepcion as $r ) {?>
						<option
						<?php print (isset($_GET['recepcion']) AND $_GET['recepcion'] == $r->getId()) ? "selected='selected'" : "" ?>
							value="<?php print $r->getId()?>">
							<?php print lang($r->getValue())?>
						</option>
						<?php }?>
					</select>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label><?php print lang("Hospital")?>
					</label> <select class="pull-right form-control"
					style="width: 160px;" name="hospital">
					<option value="">
						<?php print lang("Select Hospital")?>
					</option>
					<?php foreach ($hospitals as $hospital) {?>
					<option
					<?php print (isset($_GET['hospital']) AND $_GET['hospital'] == $hospital->getId()) ? "selected='selected'" : "" ?>
						value="<?php print $hospital->getId()?>">
						<?php print $hospital->getName()?>
					</option>
					<?php }?>
					</select>
				</div>
				<div class="form-group"></div>
					<label><?php print lang("Department")?>
					</label> <select class="pull-right form-control"
					style="width: 160px;" name="department">
					<option value="">
						<?php print lang("Select Department")?>
					</option>
					<?php foreach ($departments as $department) {?>
					<option
					<?php print (isset($_GET['department']) AND $_GET['department'] == $department->getId()) ? "selected='selected'" : "" ?>
						value="<?php print $department->getId()?>">
						<?php print $department->getName()?>
					</option>
					<?php }?>
				</select>
				<div class="form-group"></div>
					<label><?php print lang("Doctor")?>
					</label> <select class="pull-right form-control"
					style="width: 160px;" name="doctor">
					<option value="">
						<?php print lang("Select Doctor")?>
					</option>
					<?php foreach ($doctors as $doctor) {?>
					<option
					<?php print (isset($_GET['doctor']) AND $_GET['doctor'] == $doctor->getId()) ? "selected='selected'" : "" ?>
						value="<?php print $doctor->getId()?>">
						<?php print $doctor->getFirstname()." ".$doctor->getLastname();?>
					</option>
					<?php }?>
				</select>
			</div>



			<div class="col-md-3">
				<div class="form-group">
					<label><?php print lang("Date from")?> </label> <input type="text"
						name="datefrom" id="datefrom" class="pull-right form-control datefrom"
						style="width: 130px;"
						value="<?php print (isset($_GET['datefrom'])) ? date('m/d/Y', strtotime($_GET['datefrom'])) : date('m/d/Y'); ?>">
				</div>
				<div class="form-group">
					<label><?php print lang("date to")?>
					</label> <input type="text" class="pull-right form-control"
						id="dateto" name="dateto" style="width: 130px;"
						value="<?php print (isset($_GET['dateto'])) ? date('m/d/Y', strtotime($_GET['dateto'])) : date('m/d/Y'); ?>">

				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group"></div>
				<input type="hidden">
				<div class="form-group">
					<input type="submit" class="btn btn-primary pull-right"
						value="<?php print lang("Search")?>" />
				</div>
			</div>
		</div>
		
		
	</form>
</div>




<!-- End Search -->

<div class="row show-grid" >
	<a  href="/hospitalreports/insert" class="btn btn-primary pull-right"><?php print lang("Add new report")?></a>

</div>

<div class="row show-grid">

<?php if ( $hreports ) {?>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th><?php print lang("Distributer")?><small></small></th>
			<th><?php print lang("Hospital")?><small></small></th>
			<th><?php print lang("Department")?><small></small></th>
			<th><?php print lang("Doctor")?><small></small></th>
			<th><?php print lang("Speciality")?><small></small></th>
			<th><?php print lang("Region")?><small></small></th>
			<!-- <th><?php //print lang("Comment")?><small></small></th> -->
			<th><?php print lang("Date")?><small></small></th>
			<th><?php print lang("Created")?><small></small></th>
			<th><?php print lang("Actions")?> <small></small></th>
		</tr>
	</thead>
	<tbody>
	
	<?php foreach ( $hreports as $r ) {?>
	<tr>
		<td><?php print $r->getId()?></td>
		<td><?php $user = User::find($r->getUser()); print $user->getFirstName() . " " . $user->getLastName()?>
		</td>
		<td><?php print Hospital::find($r->getHospital())->getName()?></td>
		<?php if ( $r->getDepartment() == NULL ){?>
		<td></td>
		<?php } else {?>
		<td><?php print Department::find($r->getDepartment())->getName()?></td>
		<?php } ?>
		<td><?php $doctor = Hospitaldoctor::find($r->getDoctor()); print $doctor->getFirstname()." ".$doctor->getLastname()?></td>
		<td><?php $doctor = Hospitaldoctor::find($r->getDoctor()); print $doctor->getSpeciality()?></td>
		<td><?php $hospital = Hospital::find( $r->getHospital()); print Region::find($hospital->getRegion())->getName();?></td>
		<!-- <td><?php //print $r->getComment()?></td> -->
		<td><?php print date("d-m-Y", strtotime($r->getDate()))?></td>
		<td><?php print date("d-m-Y", strtotime($r->getCreated()))?></td>
				
		<td><a href="/hospitalreports/preview/<?php print $r->getId()?>"><?php print lang("Preview")?></a>
		<!-- <a href="/hospitalreports/delete/<?php //print $r->getId()?>"> <?php //print lang("Delete")?></a>-->
		<a href="#" onclick="deleteReport('<?php print $r->getId()?>')" > <?php print lang("Delete")?></a>
		</td>
	</tr>

	<?php }?>
	
</table>
<?php } else {?>
	<div class="alert alert-warning">
		<?php print lang("No results were found for your search.")?>
	</div>
	<?php }?>
</div>

<div class="row">
<?php echo $this->pagination->create_links()?>
<a  href="/hospitalreports/insert" class="btn btn-primary pull-right"><?php print lang("Add new report")?></a>  
	
</div>

<script>

$('.table').dataTable({    
    "pagingType": "full_numbers",
    aaSorting: [[0, 'desc']],
    "oLanguage": {
         "sSearch": "Барај:"
       }
});

</script>
<script>
function deleteReport( id ) {
	ret = confirm("<?php print lang("Are you sure you want to delete this item?")?>");
	if (ret) {
		window.location.href = '/hospitalreports/delete/' + id; 
	}
	return false;
}


$(function() {
	$( "#datefrom" ).datepicker();
	$( "#dateto" ).datepicker();
});
</script>


