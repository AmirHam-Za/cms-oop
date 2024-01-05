<?php
include '../Session.php';
include '../classes/Content.php';
Session::checkSession();

include '../classes/Category.php';
$category = new Category();

?>
<?php include 'layout/header.php'; ?>

<body>
	<div class="flex flex-col">
		<div class="">
			<?php include 'layout/nav.php'; ?>
		</div>
		<div class="flex">
			<div class="">
				<?php include 'layout/sidebar.php'; ?>
			</div>
			<div class="w-full p-2 ml-64 mt-12">
				<?php
				include 'db_connection.php';
				// Function to delete a user by ID
				?>
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$categoryData = $category->addCategory($_POST);

					if ($categoryData == true) {
						//   echo'##################################################';
				
					}
				}
				?>

				<body class="bg-gray-100">
					<!-- *****************BODY CONTENT AREA********************** -->
					<div
						class="mt-4 p-4 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 rounded-md shadow-md border border-gray-300  justify-between">
						<div class="mx-48 mt-4 p-4 rounded-md shadow-md border border-gray-300  justify-between">
							<h2 class="mb-3 border-l-4 border-green-500">
								<p class="ml-2 text-gray-600 text-xl font-semibold"> Category</p>
							</h2>
							<?php

							?>
							<div class="mx-auto bg-purple-100 p-4 rounded-md shadow mt-3">
								<!-- Create User Form -->
								<form action="" method="post">
									<label class="text-gray-600 text-sm font-semibold" for="name">Category
										Name:</label><br>
									<input class="h-8 rounded mb-2" type="text" name="name" id="name"><br>

									<button type="submit"
										class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
										Create Category
									</button>
								</form>
							</div>
						</div>
					</div>
				</body>
				<?php
				// Close the connection
				// $conn->close();
				?>
			</div>
		</div>
	</div>
</body>
<script src="dashboard/custom.js"></script>

</html>