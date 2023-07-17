<html>
<body>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>	
<script type="text/javascript">
	// Menu toggle
	let toggle = document.querySelector('.toggle');
	let navigation = document.querySelector('.navigation');
	let main = document.querySelector('.main');

	toggle.onclick = function(){
		navigation.classList.toggle('active');
		main.classList.toggle('active');
	}


	$(document).ready(function(){
		$('.sub-btn').click(function(){
			$(this).next('.drop').slideToggle();
		});
	});
</script>
</body>
</html>