 $(document).ready(function() {

 	$('#keyword').on('keyup', function(){
 		$('#container').load('../pages/admin/pencarian.php?keyword='+ $('#keyword').val());

 	});
 });