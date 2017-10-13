<?php include "./static/includes/header.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<h1 style="color:red">Tomorrows Dailies</h1>
<?php

$dailies = json_decode(file_get_contents("https://api.guildwars2.com/v2/achievements/daily/tomorrow"));

$dailyIDs = '';
foreach ($dailies as $gameMode) {
	foreach ($gameMode as $achievement) {
		$dailyIDs .= $achievement->id .',';
	}
}
// get all of the achievement data from the API - returns array of objects, indexed numerically
$allAchieves = json_decode(file_get_contents("https://api.guildwars2.com/v2/achievements?ids=".$dailyIDs));
// start a new array to hold the properly indexed achievements - indexing by their ids
$achievesArray = array();
// loop through the array of objects and add them to the id-indexed array
foreach ($allAchieves as $achieve) {
	$achievesArray[$achieve->id] = $achieve;
}
unset($allAchieves); // just so we know, we aren't using this anymore!
//
?>

<div class="widget-box collapsible">
	<div class="widget-title"> <a href="#collapseOne" data-toggle="collapse"> <span class="icon"><i class="icon-arrow-right"></i></span>
		<h5>WvW Dailies</h5>
	</a></div>
	<div class="collapse in" id="collapseOne">
		<div class="widget-content span12">
			<table class="table table-bordered table-striped">
			<thead>
			<th> Name </th>
			<th> Requirement </th>
			<th> Description </th>
			<!-- <th> Required Access</th> -->
			</thead>
				<?php foreach($dailies->wvw as $daily) { ?>
				<tr>
					<tr>
						<td> <?= $achievesArray[$daily->id]->name ?> </td>
						<td> <?= $achievesArray[$daily->id]->requirement ?> </td>
						<td> <?= $achievesArray[$daily->id]->description ?> </td>
						<!-- <td> <?php print_r($daily->required_access); ?> </td>  -->
					</tr>
				</tr>
			<?php } ?>
			</table>
		</div>
	</div>
</div>

<div class="widget-box collapsible">
	<div class="widget-title"> <a href="#collapseTwo" data-toggle="collapse"> <span class="icon"><i class="icon-arrow-right"></i></span>
		<h5>PvP Dailies</h5>
	</a></div>
	<div class="collapse in" id="collapseTwo">
		<div class="widget-content span12">
			<table class="table table-bordered table-striped">
			<thead>
			<th> Name </th>
			<th> Requirement </th>
			<th> Description </th>
			<!-- <th> Required Access</th> -->
			</thead>
				<?php foreach($dailies->pvp as $daily) { ?>
				<tr>
					<tr>
						<td> <?= $achievesArray[$daily->id]->name ?> </td>
						<td> <?= $achievesArray[$daily->id]->requirement ?> </td>
						<td> <?= $achievesArray[$daily->id]->description ?> </td>
						<!-- <td> <?php print_r($daily->required_access); ?> </td>  -->
					</tr>
				</tr>
			<?php } ?>
			</table>
		</div>
	</div>
</div>
<div class="widget-box collapsible">
	<div class="widget-title"> <a href="#collapsThree" data-toggle="collapse"> <span class="icon"><i class="icon-arrow-right"></i></span>
		<h5>PvE Dailies</h5>
	</a></div>
	<div class="collapse in" id="collapsThree">
		<div class="widget-content span12">
			<table class="table table-bordered table-striped">
			<thead>
			<th> Name </th>
			<th> Requirement </th>
			<th> Description </th>
			<!-- <th> Required Access</th> -->
			</thead>
				<?php foreach($dailies->pve as $daily) { ?>
				<tr>
					<tr>
						<td> <?= $achievesArray[$daily->id]->name ?> </td>
						<td> <?= $achievesArray[$daily->id]->requirement ?> </td>
						<td> <?= $achievesArray[$daily->id]->description ?> </td>
						<!-- <td> <?php print_r($daily->required_access); ?> </td>  -->
					</tr>
				</tr>
			<?php } ?>
			</table>
		</div>
	</div>
</div>
<div class="widget-box collapsible">
	<div class="widget-title"> <a href="#collapseFour" data-toggle="collapse"> <span class="icon"><i class="icon-arrow-right"></i></span>
		<h5>Fractal Dailies</h5>
	</a></div>
	<div class="collapse in" id="collapseFour">
		<div class="widget-content span12">
			<table class="table table-bordered table-striped">
			<thead>
			<th> Name </th>
			<th> Requirement </th>
			<th> Description </th>
			<!-- <th> Required Access</th> -->
			</thead>
				<?php foreach($dailies->fractals as $daily) { ?>
				<tr>
					<tr>
						<td> <?= $achievesArray[$daily->id]->name ?> </td>
						<td> <?= $achievesArray[$daily->id]->requirement ?> </td>
						<td> <?= $achievesArray[$daily->id]->description ?> </td>
						<!-- <td> <?php print_r($daily->required_access); ?> </td>  -->
					</tr>
				</tr>
			<?php } ?>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<?php include "./static/includes/footer.php";?>
	<!-- /*
	Things to display
	Name, Requirement, Description
	*/ -->