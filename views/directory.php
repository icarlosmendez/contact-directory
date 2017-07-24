
<!--
filename:  directory.php
can access once logged in either from logged in nav bar or profile page
directed from:  $_GET["action"]=="directory" (#7 on controllers/Action_Controller.php)
$data is passed in: $data = $contacts->getContacts();
-->
<main>
<div class="container">

	<div class="upper-spacer">
		<div class="row">
			<div class="col s6">
				<h2 class="">Contact Directory</h2>
			</div>
			<div class="col s6">
				<a class="btn right" href='?action=addContact'>Add Contact</a>
			</div>
		</div>
		<div class="row">
			<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter List">
		</div>


		<div class="row">
			<div class="col s3 headervis">Last Name</div>
				<!-- <a href="?action=sortlnameasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
				<a href="?action=sortlnamedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
			<div class="col s3 headervis">First Name</div>
				<!-- <a href="?action=sortfnameasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
				<a href="?action=sortfnamedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
			<div class="col s3 headervis">Phone Number</div>
				<!-- <a href="?action=sortphoneasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
				<a href="?action=sortphonedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
			<div class="col s3 headervis">Email</div>
				<!-- <a href="?action=sortemailasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
				<a href="?action=sortemaildesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
		</div>

		<div class="scrollable">
			<!-- Table body is comprised of the user data output by a foreach loop -->
			<table class="table order-table">
			<tbody>
			<?php
				foreach($results as $contact) {	
					// $contId=$contact["contId"]
			?>

					<tr>
						<!-- <td>
							<a href='?action=viewProfileContact&$contId'>
								<?=$contId;?>
							</a>
						</td> -->
						<td class="headervis"><?=$contact["contLName"];?></td>
						<td class="headervis"><?=$contact["contFName"];?></td>
						<td class="headervis"><?=$contact["contPhone"];?></td>
						<td class="headervis"><?=$contact["contEmail"];?></td>
						<!-- <td>
							<a href='?action=deleteContact'>
								<img class="trash right" role="button" src="public/images/trash_delete.svg" alt="Delete" title="Delete" />
							</a>
						</td> -->
					</tr>

			<?php
				} // close foreach loop
			?>

			</tbody>
		
			</table>
		</div>
	</div>


</div><!-- closes container -->
</main>