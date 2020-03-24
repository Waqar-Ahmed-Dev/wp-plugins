<script>
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
	jQuery("#user-details").html('');
	jQuery("#user-bg-mask").show();
	jQuery("#user-details").html(response_data);
	
	jQuery("#ajax-loader").hide();
							
	}
}


var string = 'uid=' + uid; 
ajaxRequest.open( "get" , '<?php echo plugins_url();?>/inpsyde-users/user-details.php?' + string , true );
//alert(ignore);
ajaxRequest.send(null);
jQuery("#user-details").html('Loading! Please wait ...');

	
}

function closepopup(){
jQuery("#user-details").html('');
	jQuery("#user-bg-mask").hide();
}
</script>
<?php
global $wpdb;

//Load the style sheet
wp_enqueue_style( 'inpsyde-users', plugins_url().'/inpsyde-users/css/inpsyde-users.css' );
//Load the js scripts
//wp_enqueue_script( 'script',plugins_url().'/inpsyde-users/js/inpsyde-users.js', array ( 'jquery' ), 1.1, true);

/*** API Request  ***/

// create curl resource
$ch = curl_init();

// set API endpoint hit
curl_setopt($ch, CURLOPT_URL, "http://jsonplaceholder.typicode.com/users");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

//parse jason 
$userslist_arr = json_decode($output, true);

?>
<div id="user-bg-mask" style="width:100%; height:100%; background:rgba(207, 207, 207, 0.8588235294117647); position:absolute; left:0; top:0; z-index:99; display:none;"></div>
<div id="user-details" style="position: absolute; background: #fff; z-index: 100; min-width:715px;"></div>
<table role="table">
  <thead role="rowgroup">
    <tr role="row">
	 <th role="columnheader" class="heading" style="border-top-left-radius: 15px;">Name</th>
      <th role="columnheader" class="heading">User Name</th>
      <th role="columnheader" class="heading">Email</th>
      <th role="columnheader" class="heading" style="border-top-right-radius: 15px;">Phone</th>
  </thead>
  <tbody role="rowgroup">
	<?php
	foreach($userslist_arr as $user_rec){
	
		$param = $user_rec['id'];
		echo '<tr role="row" onclick="popuser('.$param.')">';
		/*echo .'<br/>';
		echo $user_rec['username'].'<br/>';
		echo $user_rec['email'].'<br/>';
		echo $user_rec['address']['street'].'<br/>';
		echo $user_rec['address']['suite'].'<br/>';
		echo $user_rec['address']['city'].'<br/>';
		echo $user_rec['address']['zipcode'].'<br/>';
		echo $user_rec['geo']['lat'].'<br/>';
		echo $user_rec['geo']['lng'].'<br/>';*/
		echo '<td role="cell">'.$user_rec['name'].'</td>
		  <td role="cell">'.$user_rec['username'].'</td>
		  <td role="cell">'.$user_rec['email'].'</td>
		  <td role="cell">'.$user_rec['phone'].'</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>