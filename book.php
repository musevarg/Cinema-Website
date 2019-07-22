<?php

$page_title = 'Bioscoop - Book';
include('header.php');

require ('scripts/connect_db.php');

$i = $_GET['i'];
$t = $_GET['t'];
$today = date("m/d/Y");

if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$rev = mysqli_real_escape_string($conn, trim($_POST['rev']));
	$rating = mysqli_real_escape_string($conn, trim($_POST['ratings']));
	$userid = $_SESSION["userid"];
	$username = $_SESSION["username"];
	$q = "INSERT INTO reviews (movieID, userID, username, stars, review, datePosted) VALUES ('$i', '$userid', '$username', $rating, '$rev' , NOW() )";
    $r = @mysqli_query ($conn, $q);
}


$sql = "SELECT * FROM movies WHERE movieId=$i";
$query = mysqli_query( $conn, $sql );

if (mysqli_num_rows($query) > 0)
{
  $array = array();
  while($row = mysqli_fetch_assoc($query)){
    $array[] = $row;
  }
}

mysqli_close($conn);

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<style>

	.bookingbooth
	{
		height: auto;
	}

	.card
	{
		top: 50px;
		width: 90%;
		margin: 0 auto;
	}

	.checked
	{
    	color: orange;
	}

	.prettySep
	{
		height: 20px;
	}

	.submit
	{
		margin: auto;
		width: 95%;
		margin-top: 20px;
	}

	.rate:hover
	{
		color: orange;
		cursor: pointer;
	}
</style>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<div class="film-list bookingbooth">

	<form>

		<div class="col">

		<div class="card">
	        <div class="row no-gutters">
	          <div class="col-auto cardimage2">
	            <img src="<?php echo $string = substr($array[0]['poster'],0,255); ?>" width="220" height="300" alt="">
	          </div>
	          <div class="col cardtext">
	            <div class="card-block px-2">
	              <h4 class="card-title"><?php echo $string = substr($array[0]['name'],0,255); ?></h4>
	              <p class="card-text"><?php echo $string = substr($array[0]['description'],0,1024); ?></p>
	              <p class="card-text"><?php echo $string = "With: " . substr($array[0]['actors'],0,255); ?></p>
	              <p class="card-text"><?php echo $string = "Ticket Price: £" . $array[0]['price']; ?></p>

	            </div>
	          </div>
	        </div>
	      </div>

	  </div>

	  <div class="col">

	  	<div class="card">
	  		<div class="row no-gutters">

	            	<div class="col-sm">
		               <p class="datetimeinput">Time:
		               <select id="formTime" class="form-control datetimeinput" id="exampleFormControlSelect1">
		                 <?php
		                  $string = substr($array[0]['showtimes'],0,255);
		                  $times = explode(';',$string);
		                  foreach ($times as $time) {
		                  	if ($time == $t)
		                  	{
		                  		echo '<option selected>'.$time.'</option> ';
		                  	} else
		                  	{
		                  		echo '<option>'.$time.'</option> ';
		                  	}
		                  }
		                ?>
		   			</select>
		   			</p>
		   		</div>

		<div class="col-sm">
				<p class="datetimeinput">Date: <input type="text" class="form-control datetimeinput" id="datepicker" value=<?php echo '"' .$today. '"'?>> </p>
			</div>

			<div class="col-sm">
				<p class="datetimeinput">Quantity:
				<select class="form-control datetimeinput" id="formTickets">
					<option selected>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select>
			</p>
			</div>
		</div>



<div class="row no-gutters">
	   			<button type="button" class="btn btn-primary bookbutton" data-toggle="modal" data-target="#exampleModal" onclick="passDataToModal()">Book Now</button>
	   		</div>
	        
	        </div>

	        </div>

	   </form>

	   <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<table class="modalTable">
      		<tr>
      			<td>Movie</td>
      			<td><?php echo $string = substr($array[0]['name'],0,255); ?></td>
      		</tr>
      		<tr>
      			<td>Date</td>
      			<td id="modalDate"></td>
      		</tr>
      		 <tr>
      			<td>Time</td>
      			<td id="modalTime"></td>
      		</tr>
      		<tr>
      			<td>Tickets</td>
      			<td id="modalTickets"></td>
      		</tr>
      		 <tr>
      			<td>Total Price</td>
      			<td id="modalPrice"></td>
      		</tr>
      	</table>
      	<!--PAYPAL-->

      </div>
      <div class="modal-footer">

      	<div id="paypal-button-container"><p>In order to complete the booking process, you must log in to paypal using the following credentials:<br>email: kintama@test.com / pass: 12345678</p></div>
      	<p id="not-logged-in">You must be logged in to buy tickets.</p>

      	<?php 

      	if (isset($_SESSION["userid"]))
      	{
      		echo '<style>#paypal-button-container{display:block;}#not-logged-in{display:none;}</style>';
      		$id = $_SESSION["userid"];
      	}
      	else
      	{
      		echo '<style>#paypal-button-container{display:none;}#not-logged-in{display:block;}</style>';
      		$id = 0;
      	}

      	?>

      </div>
    </div>
  </div>
</div>

<script>

var date;
var time;
var tickets;
var price;

	function passDataToModal()
	{
		date = document.getElementById("datepicker").value;
		time = document.getElementById("formTime").value;
		document.getElementById("modalDate").innerHTML = date;
		document.getElementById("modalTime").innerHTML = time;
		price = <?php echo $array[0]['price']; ?>;
		tickets = document.getElementById("formTickets").value;
		document.getElementById("modalTickets").innerHTML = tickets;
		document.getElementById("modalPrice").innerHTML = tickets + " x £" + price + " = £" + (tickets*price);
	}

// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: true,

// PayPal Client IDs - replace with your own

client: {
  sandbox: 'AXxOLn6CqvCZlFblZhgVfRQlRnv2EVz4pTUY-Al2DcmtFb7fBj1BU24gOApX6kE7OEpEYIkHTqbxRzqG',
  production: '<insert production client id>'
},

payment: function (data, actions) {
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: tickets*price,
            currency: 'GBP'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {

      var uid = <?php echo $id; ?>;
      var movid = <?php echo $i; ?>;
      var movname = <?php echo $string = '"'.substr($array[0]['name'],0,255).'"' ?>;
      var movtime = time;
      var movdate = date;
      var totalPrice = tickets * price;

  	var url = 'uid='+uid+'&movid='+movid+'&movname='+movname+'&movtime='+movtime+'&movdate='+movdate+'&movtickets='+tickets+'&price='+price+'&totalprice='+totalPrice;
  	console.log(url);
    $.ajax
  ({
  url: "scripts/saveOrderDetails.php",
  type : "POST",
  cache : false,
  data : url,
  success: function(response)
  {
  alert(response);
  }
  });

    });
}
}, '#paypal-button-container');

</script>

<div class="trailer-background">

<div class="divider">
</div>

<div class="section">
    <img src="img/trailer.png" />
</div>

<div class="divider">
</div>

	<div class="trailer">
		<div class="videoWrapper">
			<iframe src=<?php echo $string = '"https://www.youtube.com/embed/'. substr($array[0]['trailer'],0,255) . '?rel=0"'; ?> frameborder="0" allowfullscreen></iframe>

		</div>
	</div>

</div>

	<div class="reviews">

<div class="divider">
</div>

<div class="section">
    <img src="img/reviews.png" />
</div>

<div class="divider">
</div>


		<?php
			require ('scripts/connect_db.php');

			$sql = "SELECT * FROM reviews WHERE movieId=$i";
			$query = mysqli_query( $conn, $sql );

			if (mysqli_num_rows($query) > 0)
			{
			  $array = array();
			  while($row = mysqli_fetch_assoc($query)){
			    /*$array[] = $row;*/
			    echo '<div class="card reviewcard">
	        <div class="row no-gutters">
	          <div class="col-auto ">
	            <p>'.substr($row['username'],0,255).'</p>';
	            
	            $stars = $row['stars'];
	            for ($x = 0; $x < 5; $x++)
	            {
    				if ($stars <= $x)
    				{
    					echo '<span class="fa fa-star"></span>';
    				}
    				else
    				{
    					echo '<span class="fa fa-star checked"></span>';
    				}
				} 
				

	            echo '<p>Posted on<br />'
				.substr($row['datePosted'],0,10).'</p>
	          </div>
	          <div class="col cardtext">
	            <div class="card-block px-2">
				<p>'.substr($row['review'],0,4000).'</p>

	            </div>
	          </div>
	        </div>
	      </div>';
			  }
			}

			mysqli_close($conn);
		?>




	      <div class="reviewForm">
	      	<?php

	      		if(isset($_SESSION["userid"]))
				{
					echo '<center><h3>Write down a few lines, rate the movie... it\'s that simple!</h3></center>

				<form action="book.php?i='.$i.'" method="post">

					<div class="textareaWrapper"> 
						<textarea name="rev"></textarea>
					</div>

					<div class="row">
						<div class="col">
							<div class="rating" onmouseleave="leave()">
								<label>Your rating:</label>
								<input id="ratings" type="hidden" name="ratings" value="" />
								<span onclick="rate1()" onmouseover="rate1()" id="rate1" class="fa fa-star rate"></span>
								<span onclick="rate2()" onmouseover="rate2()" id="rate2" class="fa fa-star rate"></span>
								<span onclick="rate3()" onmouseover="rate3()" id="rate3" class="fa fa-star rate"></span>
								<span onclick="rate4()" onmouseover="rate4()" id="rate4" class="fa fa-star rate"></span>
								<span onclick="rate5()" onmouseover="rate5()" id="rate5" class="fa fa-star rate"></span>
							</div>
						</div>
						<div class="col">
							<div class="postWrapper">
								<input class="submit btn" type="submit" name="post" value="Post" />
							</div>
						</div>
					</div>


				</form>
				
				<script>
				function rate1()
				{
					document.getElementById("rate1").style.color="orange";
					document.getElementById("rate2").style.color="white";
					document.getElementById("rate3").style.color="white";
					document.getElementById("rate4").style.color="white";
					document.getElementById("rate5").style.color="white";
					document.getElementById("ratings").value="1";
				}
				function rate2()
				{
					document.getElementById("rate1").style.color="orange";
					document.getElementById("rate2").style.color="orange";
					document.getElementById("rate3").style.color="white";
					document.getElementById("rate4").style.color="white";
					document.getElementById("rate5").style.color="white";
					document.getElementById("ratings").value="2";
				}
				function rate3()
				{
					document.getElementById("rate1").style.color="orange";
					document.getElementById("rate2").style.color="orange";
					document.getElementById("rate3").style.color="orange";
					document.getElementById("rate4").style.color="white";
					document.getElementById("rate5").style.color="white";
					document.getElementById("ratings").value="3";
				}
				function rate4()
				{
					document.getElementById("rate1").style.color="orange";
					document.getElementById("rate2").style.color="orange";
					document.getElementById("rate3").style.color="orange";
					document.getElementById("rate4").style.color="orange";
					document.getElementById("rate5").style.color="white";
					document.getElementById("ratings").value="4";
				}
				function rate5()
				{
					document.getElementById("rate1").style.color="orange";
					document.getElementById("rate2").style.color="orange";
					document.getElementById("rate3").style.color="orange";
					document.getElementById("rate4").style.color="orange";
					document.getElementById("rate5").style.color="orange";
					document.getElementById("ratings").value="5";
				}
				function leave()
				{
					document.getElementById("rate1").style.color="white";
					document.getElementById("rate2").style.color="white";
					document.getElementById("rate3").style.color="white";
					document.getElementById("rate4").style.color="white";
					document.getElementById("rate5").style.color="white";
				}
				</script>


				';
				} else
				{
					echo '<center><h3>You must be logged in to post a review!</h3></center>';
				}

	      	?>


		  </div>

	</div>

<div class="prettySep"></div>

</div>

<?php

include('footer.html');

?>