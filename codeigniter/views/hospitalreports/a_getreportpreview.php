
<div class="container starter-template">

	<div class="starter-template">

		<div class="row">

			<div class="row">
				<div class="jumbotron">
					<div class="container pull-center">
						<h2>
							Извештај :
							<strong><?php print str_pad($hreport->getId(), 6, "0", STR_PAD_LEFT)?>
							/
							<?php print str_pad($hreport->getDoctor(), 4, "0", STR_PAD_LEFT)?>
							/
							<?php print date("Y", strtotime($hreport->getDate()))?></strong>
						</h2>
						<h2><?php print lang("Date")?>: <strong><?php print date("d/m/Y", strtotime($hreport->getDate()))?></strong>
						</h2>
					</div>
				</div>
			</div>


			<div class="row">

				<div class="panel panel-default">
					<div class="panel-body" >
						<table  class="table">
							<tbody>
								 <tr>
									<td style="border-top: none" class = "col-xs-6"><?php print lang("Creation date")?></td>
									<td style="border-top: none"><strong><?php print date("d/m/Y", strtotime($hreport->getCreated()))?> </strong>
									</td>
								</tr>
								
								<tr>
									<td class = "col-xs-6"><?php print lang("Датум на посета")?></td>
									<td ><strong><?php print date("d/m/Y", strtotime($hreport->getDate()))?> </strong>
									</td>
								</tr>
							
								<tr > 
									<td ><?php print lang("Hospital")?></td>
									<td ><strong><?php print Hospital::find($hreport->getHospital())->getName()?></strong></td>
								</tr>
								<tr > 
									<td ><?php print lang("Address")?></td>
									<td ><strong><?php print Hospital::find($hreport->getHospital())->getAddress()?></strong></td>
								</tr>
								<tr > 
									<td ><?php print lang("Department")?></td>
									<?php if ($hreport->getDepartment() == "" ){?>
									<td></td>
									<?php } else {?>
									<td ><strong><?php print Department::find($hreport->getDepartment())->getName()?></strong></td>
									<?php } ?>
								</tr>
								<tr > 
									<td ><?php print lang("Doctor")?></td>
									<td ><strong><?php $doctor = Hospitaldoctor::find($hreport->getDoctor()); print $doctor->getFirstname()." ".$doctor->getLastname()?></strong></td>
								</tr>
								<tr > 
									<td ><?php print lang("Speciality")?></td>
									<td ><strong><?php $doctor = Hospitaldoctor::find($hreport->getDoctor()); print $doctor->getSpeciality()?></strong></td>
								</tr>
								<tr > 
									<td ><?php print lang("Phone")?></td>
									<td ><strong><?php $doctor = Hospitaldoctor::find($hreport->getDoctor()); print $doctor->getPhone()?></strong></td>
								</tr>
								<tr > 
									<td ><?php print lang("E-mail")?></td>
									<td ><strong><?php $doctor = Hospitaldoctor::find($hreport->getDoctor()); print $doctor->getEmail()?></strong></td>
								</tr>
								<tr > 
									<td ><?php print lang("Region")?></td>
									<td ><strong><?php $hospital = Hospital::find( $hreport->getHospital()); print Region::find($hospital->getRegion())->getName();?></strong></td>
								</tr>
								
							</tbody>

						</table>
					</div>
				</div>
			</div>
								
								
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-body" >
						<table  class="table">
							<tbody >
								
								<tr>
									<td style="border-top: none" class = "col-xs-6"><?php print lang("Recepcion")?></td>
									<td style="border-top: none"><strong><?php print lang(Config::getById($hreport->getRecepcion())->getValue())?> </strong></td>
								</tr>
								<tr>
									<td><?php print lang("Collaboration")?></td>
									<td><strong><?php print $hreport->getCollaboration()?></strong></td>
								</tr>
							
								<tr>
									<td><?php print lang("General Comment")?></td>
									<td><strong><?php print $hreport->getComment()?></strong></td>
								</tr>
							
							</tbody>

						</table>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>