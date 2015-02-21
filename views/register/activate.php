<div id='wrapper'>
	<div id="content">
	<h1>Confirmation Complete</h1>
		<div class="confComplete">
		<?php
		if(isset($data['success'])) {
			echo $data['success'];
		}

		if(isset($error)){
			foreach($error as $error){
				echo"<p>$error</p>";
			}
		}

		?>
		</div>
	</div>
</div>
