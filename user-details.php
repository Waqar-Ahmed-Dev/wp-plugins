<?php

global $wpdb;

/*** API Request  ***/

// create curl resource
$ch = curl_init();

// set API endpoint hit
curl_setopt($ch, CURLOPT_URL, "http://jsonplaceholder.typicode.com/users/".$_REQUEST['uid']."");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

//parse jason 
$userdetail_arr = json_decode($output, true);
?>
<p style="text-align: right;padding-right:10px; position:absolute; right:0; cursor:pointer;" onclick="closepopup()">X</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:0;">
  <tr>
    <td width="30%" class="heading">Name</td>
    <td width="70%"><?php echo $userdetail_arr['name']; ?></td>
  </tr>
  <tr>
    <td class="heading">Username</td>
    <td><?php echo $userdetail_arr['username']; ?></td>
  </tr>
  <tr>
    <td class="heading">Email</td>
    <td><?php echo $userdetail_arr['email']; ?></td>
  </tr>
  <tr>
    <td class="heading">Address</td>
    <td><?php echo $userdetail_arr['address']['street'].', '.$userdetail_arr['address']['suite'].', '.$userdetail_arr['address']['city'].', '.$userdetail_arr['address']['zipcode']; ?></td>
  </tr>
  <tr>
    <td class="heading">GEO Location </td>
    <td><?php echo $userdetail_arr['address']['geo']['lat'].', '.$userdetail_arr['address']['geo']['lng']; ?></td>
  </tr>
  <tr>
    <td class="heading">Phone</td>
    <td><?php echo $userdetail_arr['phone']; ?></td>
  </tr>
  <tr>
    <td class="heading">Website</td>
    <td><a href="http://<?php echo $userdetail_arr['website']; ?>" target="_blank"><?php echo $userdetail_arr['website']; ?></a></td>
  </tr>
  <tr>
    <td class="heading">Company </td>
    <td><?php echo $userdetail_arr['company']['name']; ?><br /><?php echo $userdetail_arr['company']['catchPhrase']; ?><br /><?php echo $userdetail_arr['company']['bs']; ?></td>
  </tr>
</table>
