<div class="row show-grid" >
	<a  href="/hospitaldoctors/insert" class="btn btn-primary pull-right"><?php print lang("Add new doctor")?></a>

</div>

<div class="row show-grid">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th><?php print lang("Firstname")?><small></small></th>
			<th><?php print lang("Lastname")?><small></small></th>
			<th><?php print lang("Speciality")?><small></small></th>
			<th><?php print lang("Hospital")?><small></small></th>
			<th><?php print lang("Department")?><small></small></th>
			<th><?php print lang("Phone")?><small></small></th>
			<th><?php print lang("Email")?> <small></small></th>
			<th><?php print lang("Actions")?> <small></small></th>
		</tr>
	</thead>
	<tbody>
	
	<?php foreach ( $hdoctors as $d ) {?>
	<tr>
		<td><?php print $d->getId()?></td>
		<td><?php print $d->getFirstname()?></td>
		<td><?php print $d->getLastname()?></td>
		<td><?php print $d->getSpeciality()?></td>
		<td><?php print Hospital::find($d->getHospital())->getName()?></td>
		<?php if ( $d->getDepartment() == NULL ){?>
		<td></td>
		<?php } else {?>
		<td><?php print Department::find($d->getDepartment())->getName()?></td>
		<?php } ?>
		<td><?php print $d->getPhone()?></td>
		<td><?php print $d->getEmail()?></td>
		<td><a href="/hospitaldoctors/edit/<?php print $d->getId()?>"><?php print lang("Edit")?></a> | 
		<!-- <a href="/hospitaldoctors/delete/<?php print $d->getId()?>"> <?php print lang("Delete")?></a> -->
		<a href="#" onclick="deleteDoctor('<?php print $d->getId()?>')" > <?php print lang("Delete")?></a>
		</td>
	</tr>

	<?php }?>
	
</table>
</div>

<div class="row">
<a  href="/hospitaldoctors/insert" class="btn btn-primary pull-right"><?php print lang("Add new doctor")?></a>  
	
</div>

<script>

$('.table').dataTable({"sPaginationType": "bs_full"});

function deleteDoctor( id ) {
	ret = confirm("<?php print lang("If you delete this doctor, you will delete all reports by this doctor! Are you sure you want to delete this doctor?")?>");
	if (ret) {
		window.location.href = '/hospitaldoctors/delete/' + id; 
	}
	return false;
}

</script>

