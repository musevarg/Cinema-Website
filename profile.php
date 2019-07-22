<?php

$page_title = 'Bioscoop - User Profile';
include('header.php');

if(!isset($_SESSION['userid']))
    {
    	header('Location: login.php');
    	exit;
    }

require ('scripts/connect_db.php');

$id = $_SESSION["userid"];
$sql = "SELECT * FROM users WHERE userID=$id";
$query = mysqli_query( $conn, $sql );

if (mysqli_num_rows($query) > 0)
{
  $array = array();
  while($row = mysqli_fetch_assoc($query)){
    $array[] = $row;
  }
}

?>

<div class="film-list">

	<div class="profilebody">

			<div class="card profilecard">
	        <div class="row no-gutters">

	          <div class="col-sm">
	          	<div class="profile">
		          	<h4>Your Profile</h4>
		          	<table>
					    <tbody>
					      <tr>
					        <td><b>Name:</b></td>
					        <td><?php echo $array[0]['firstname'] . ' ' . $array[0]['lastname']; ?></td>
					      </tr>
					      <tr>
					        <td><b>Email:</b></td>
					        <td><?php echo $array[0]['email']; ?></td>
					      </tr>
					      <tr>
					        <td><b>Phone:</b></td>
					        <td><?php echo $array[0]['phone']; ?></td>
					      </tr>
					      <tr>
					        <td><b>Address:</b></td>
					        <td><?php if($array[0]['address2'] != '') {$add2 = $array[0]['address2'] . '<br>'; } else { $add2 = ""; } echo $array[0]['address1'] .'<br>'. $add2 . $array[0]['city'] .'<br>'. $array[0]['postcode']; ?></td>
					      </tr>
					      <tr>
					        <td><b>Registered on:</b></td>
					        <td><?php echo substr($array[0]['registerDate'],0,10); ?></td>
					      </tr>
					    </tbody>
					  </table>

		        </div>
	          </div>

	          <div class="col-lg">
	          	<div class="orders">
				<p><b>Most recent orders:</b></p>

				<?php

					$sql = "SELECT * FROM orders WHERE userID=$id";
					$query = mysqli_query( $conn, $sql );

					if (mysqli_num_rows($query) > 0)
					{
					  $array = array();
					  $modalCount = 0;
					  while($row = mysqli_fetch_assoc($query)){
					  	$modalCount++;
					    echo '
					    <p>
					  	<a class="btn btn-primary order" data-toggle="collapse" href="#collapseExample'.$modalCount.'" role="button" aria-expanded="false" aria-controls="collapseExample">'.$row["movieName"].'</a>
						</p>
						<div class="collapse" id="collapseExample'.$modalCount.'">
						  <div class="card card-body orderdetails">
						    <p>Time: '.$row["movieTime"].'<br>
						    Date: '.$row["movieDate"].'<br>
						    Tickets: '.$row["tickets"].'<br>
						    Total Paid: £'.$row["totalPrice"].'</p>
						  </div>
						</div>
					    ';
					  }
					}

				?>

				</div>
	          </div>
	        </div>
	      </div>
	</div>

</div>

<?php
include('footer.html');
?>