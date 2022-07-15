/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
				location.reload();
			});
		}
	});

	jQuery(document).on("click", ".approveUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "approveUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to approve this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully approved"); }
				else if(data.status = false) { alert("User approved failed"); }
				else { alert("Access denied..!"); }
				location.reload();

			});
		}
	});	
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
