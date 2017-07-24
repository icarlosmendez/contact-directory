
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
			<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter List" autofocus="autofocus">
		</div>


		<div class="row">
			<div class="col sevenths">
				<h3>Last</h3>
			</div>
			<div class="col sevenths">
				<h3>First</h3>
			</div>
			<div class="col sevenths">
				<h3>Cell</h3>
			</div>
			<div class="col sevenths">
				<h3>Landline</h3>
			</div>
			<div class="col sevenths">
				<h3>Email</h3>
			</div>
			<div class="col sevenths">
				<h3>Title</h3>
			</div>
			<div class="col sevenths">
				<h3>Co</h3>
			</div>
			<div class="col sevenths">
				<h3>Dept</h3>
			</div>
		</div>

		<div class="scrollable">
			<!-- Table body is comprised of the user data output by a foreach loop -->
			<table class="table order-table">
			<tbody class="shadow">
			<?php
				foreach($results as $contact) {
			?>

					<tr>
						<td class="sevenths"><?=$contact["contLName"];?></td>
						<td class="sevenths"><?=$contact["contFName"];?></td>
						<td class="sevenths"><?=$contact["contCell"];?></td>
						<td class="sevenths"><?=$contact["contLand"];?></td>
						<td class="sevenths"><?=$contact["contEmail"];?></td>
						<td class="sevenths"><?=$contact["contTitle"];?></td>
						<td class="sevenths"><?=$contact["contCo"];?></td>
						<td class="sevenths"><?=$contact["contDept"];?></td>
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