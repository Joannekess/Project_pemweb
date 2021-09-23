<?php  

	require 'functions.php';

	$id = $_GET['id'];

	if( delete ($id) > 0) {
		echo "
				<script>
					alert('Data successfully deleted!');
					window.location.href = 'challenge.php';
				</script>";
			} else {
				echo 
				"<script>
					alert('failed to delete data!');
				</script>";
			}

?>