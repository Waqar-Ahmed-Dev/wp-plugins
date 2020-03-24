function popuser(uid){
// we call the function
		var ajaxRequest; // The variable that makes Ajax possible!
 	try{
 		// Opera 8.0+, Firefox, Safari
 		ajaxRequest = new XMLHttpRequest();
 	} catch (e){
 		// Internet Explorer Browsers
 	try{
 	ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 	try{
 	ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
 	} catch (e){
 	// Something went wrong
 		alert("Your browser broke!");
 	return false;
 		}
	}
}
	 // Create a function that will receive data sent from the server
	 ajaxRequest.onreadystatechange = function(){
	 if(ajaxRequest.readyState == 4 ){
		
	var response_data=ajaxRequest.responseText ;
	//alert(response_data);
	//jQuery(".products_wrapper").empty();
	
	jQuery("#ajax-loader").hide();
							
	}
}


var string = 'action=' ;
ajaxRequest.open( "get" , '<?php echo plugins_url();?>/inpsyde-users/user-details.php?' + string , true );
//alert(ignore);
ajaxRequest.send(null);
jQuery("#ajax-loader").show();

	
}
