
<!--
filename:  directory.php
can access once logged in either from logged in nav bar or profile page
directed from:  $_GET["action"]=="directory" (#7 on controllers/Action_Controller.php)
$data is passed in: $data = $contacts->getContacts();
-->
<main>
<div class="container">

	<div class="upper-spacer">
		<h2>Contact Directory</h2>

		<table class="table">
			<thead>
				<tr>
					<th class="headervis">Contact Id </th>
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
				// echo $_SESSION["contId"];
				
				// echo $_SESSION["contId"];
				foreach($results as $contact) {	
					$userIds[$contact["contId"]] = $contact["contId"];
					echo $userIds[$contact["contId"]];
			?>
					<tr>
						<td><a href='?action=viewProfile'><?=$userIds[$contact["contId"]];?></a>
						</td>
						<td><?=$contact["contFName"];?></td>
						<td><?=$contact["contLName"];?></td>
						<td><?=$contact["contPhone"];?></td>
						<td><?=$contact["contEmail"];?></td>
					</tr>

			<?php
				} // close foreach loop
			?>

			</tbody>
		</table>
	</div>


</div><!-- closes container -->
</main>