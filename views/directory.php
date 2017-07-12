
<!--
filename:  employeeDirectory.php
can access once logged in either from logged in nav bar or profile page
directed from:  $_GET["action"]=="directory" (#7 on controllers/Action_Controller.php)
$data is passed in: $data = $employees->getEmployees();
-->
<main>
<div class="container">

	<div class="upper-spacer">
		<h2>Employee Directory</h2>

		<table class="table">
			<thead>
				<tr>
					<th class="headervis">First Name
						<a href="?action=sortfnameasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortfnamedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a>
					</th>
					<th class="headervis">Last Name
						<a href="?action=sortlnameasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortlnamedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a>
					</th>
					<th class="headervis">Phone Number
						<a href="?action=sortphoneasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortphonedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a>
					</th>
					<th class="headervis">Email
						<a href="?action=sortemailasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortemaildesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a>
					</th>
				</tr>
			</thead>
			<tbody>

			<?php
				foreach($results as $employee){
			?>
					<tr>
						<td><?=$employee["empFName"];?></td>
						<td><?=$employee["empLName"];?></td>
						<td><?=$employee["empPhone"];?></td>
						<td><?=$employee["empEmail"];?></td>
					</tr>

			<?php
				} // close foreach
			?>

			</tbody>
		</table>
	</div>


</div><!-- closes container -->
</main>