
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

		<table class="table">
			<!-- Table Head is comprised of the Column names and sorting icons/buttons -->
			<thead>
				<tr>
					<!-- <th class="headervis">Contact Id </th> -->
					<th class="headervis">First Name
						<!-- <a href="?action=sortfnameasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortfnamedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
					</th>
					<th class="headervis">Last Name
						<!-- <a href="?action=sortlnameasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortlnamedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
					</th>
					<th class="headervis">Phone Number
						<!-- <a href="?action=sortphoneasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortphonedesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
					</th>
					<th class="headervis">Email
						<!-- <a href="?action=sortemailasc"><img class="asc" src="../public/images/arrow_icon_asc.svg"></a>
						<a href="?action=sortemaildesc"><img class="dsc" src="../public/images/arrow_icon_dsc.svg"></a> -->
					</th>
				</tr>
			</thead>
			</table>

			<div class="scrollable">
				<!-- Table body is comprised of the user data output by a foreach loop -->
				<table class="table">
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
							<td class="headervis"><?=$contact["contFName"];?></td>
							<td class="headervis"><?=$contact["contLName"];?></td>
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