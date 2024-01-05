<?php
include '../Session.php';
Session::checkSession();
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
			<div class="w-full p-2 ml-64">
				<?php
				include 'db_connection.php';

				$footer = new Footer();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$footerData = $footer->addFooter($_POST, $_FILES);
				}
				?>

				<body class="bg-gray-100">
					<!-- *****************BODY CONTENT AREA********************** -->
					<div class="bg-gradient-to-r from-blue-100 via-red-100 to-green-100 p-4 rounded-md shadow-md">
						<div class=" mx-48 bg-gray-100 p-4 rounded-md shadow-md">
							<h2 class="mb-3 border-l-4 border-green-500">
								<p class="ml-2 text-gray-600 text-xl font-semibold"> Footer</p>
							</h2>

							<div class="mx-auto bg-purple-100 p-4 rounded-md shadow mt-3">
								<!-- Create User Form -->
								<form action="" method="post" enctype="multipart/form-data">
									<div class="my-2">
										<label class="text-gray-600 text-sm font-semibold" for="image">Header
											Logo</label><br>
										<input class="h-8 rounded mb-2" type="file" name="image" id="image" accept="image/*">
									</div>
									<div class="my-2">
										<label class="text-gray-600 text-sm font-semibold" for="name">Footer
											Name:</label><br>
										<input class="h-8 rounded mb-2" type="text" name="name" id="name"><br>
									</div>
									<button type="submit"
										class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
										Create
									</button>
								</form>
							</div>
						</div>
					</div>
				</body>

				<?php
				$conn->close();
				?>
			</div>
		</div>
	</div>
</body>
<script src="dashboard/custom.js"></script>

</html>