<?php

$page_title = 'Bioscoop';
include('header.php');

require ('scripts/connect_db.php');

$sql = "SELECT * FROM movies ORDER BY movieId ASC LIMIT 6";
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

<script type="text/javascript" src="js/bioscoop.js"></script>

<!--TOP CAROUSEL-->
<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100"  src="img/slide1.jpg">
          <div class="overlay"></div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slide2.jpg">
      <div class="overlay"></div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100"  src="img/slide3.jpg">
      <div class="overlay"></div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
<!--/TOP CAROUSEL-->


<!--WHAT'S ON-->

<div id="whatson" class="divider">
</div>

<div class="section">
    <img src="img/whatson.png" />
</div>

<div class="divider">
</div>

<div class="film-list">
  <div class="container">
<h4>Click on a time to book now!</h4>

  <div class="row">

    <div class="col-sm">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-auto cardimage">
            <img src="<?php echo $string = substr($array[0]['poster'],0,255); ?>" width="220" height="300" alt="">
          </div>
          <div class="col cardtext">
            <div class="card-block px-2">
              <h4 class="card-title"><?php echo $string = substr($array[0]['name'],0,255); ?></h4>
              <p class="card-text"><?php echo $string = substr($array[0]['description'],0,1024); ?></p>
              <p class="card-text"><?php echo $string = "With: " . substr($array[0]['actors'],0,255); ?></p>
                <?php
                  $string = substr($array[0]['showtimes'],0,255);
                  $times = explode(';',$string);
                  foreach ($times as $time) {
                  echo '<a href="book.php?i='.substr($array[0]['movieID'],0,3).'&t='.$time.'" class="btn btn-primary">'.$time.'</a> ';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-auto cardimage">
            <img src="<?php echo $string = substr($array[1]['poster'],0,255); ?>" width="220" height="300" alt="">
          </div>
          <div class="col cardtext">
            <div class="card-block px-2">
              <h4 class="card-title"><?php echo $string = substr($array[1]['name'],0,255); ?></h4>
              <p class="card-text"><?php echo $string = substr($array[1]['description'],0,1024); ?></p>
              <p class="card-text"><?php echo $string = "With: " . substr($array[1]['actors'],0,255); ?></p>
                <?php
                  $string = substr($array[1]['showtimes'],0,255);
                  $times = explode(';',$string);
                  foreach ($times as $time) {
                  echo '<a href="book.php?i='.substr($array[1]['movieID'],0,3).'&t='.$time.'" class="btn btn-primary">'.$time.'</a> ';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>

<div class="row">

    <div class="col-sm">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-auto cardimage">
            <img src="<?php echo $string = substr($array[2]['poster'],0,255); ?>" width="220" height="300" alt="">
          </div>
          <div class="col cardtext">
            <div class="card-block px-2">
              <h4 class="card-title"><?php echo $string = substr($array[2]['name'],0,255); ?></h4>
              <p class="card-text"><?php echo $string = substr($array[2]['description'],0,1024); ?></p>
              <p class="card-text"><?php echo $string = "With: " . substr($array[2]['actors'],0,255); ?></p>
                <?php
                  $string = substr($array[2]['showtimes'],0,255);
                  $times = explode(';',$string);
                  foreach ($times as $time) {
                  echo '<a href="book.php?i='.substr($array[2]['movieID'],0,3).'&t='.$time.'" class="btn btn-primary">'.$time.'</a> ';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-auto cardimage">
            <img src="<?php echo $string = substr($array[3]['poster'],0,255); ?>" width="220" height="300" alt="">
          </div>
          <div class="col cardtext">
            <div class="card-block px-2">
              <h4 class="card-title"><?php echo $string = substr($array[3]['name'],0,255); ?></h4>
              <p class="card-text"><?php echo $string = substr($array[3]['description'],0,1024); ?></p>
              <p class="card-text"><?php echo $string = "With: " . substr($array[3]['actors'],0,255); ?></p>
                <?php
                  $string = substr($array[3]['showtimes'],0,255);
                  $times = explode(';',$string);
                  foreach ($times as $time) {
                  echo '<a href="book.php?i='.substr($array[3]['movieID'],0,3).'&t='.$time.'" class="btn btn-primary">'.$time.'</a> ';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>

<div class="row">

    <div class="col-sm">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-auto cardimage">
            <img src="<?php echo $string = substr($array[4]['poster'],0,255); ?>" width="220" height="300" alt="">
          </div>
          <div class="col cardtext">
            <div class="card-block px-2">
              <h4 class="card-title"><?php echo $string = substr($array[4]['name'],0,255); ?></h4>
              <p class="card-text"><?php echo $string = substr($array[4]['description'],0,1024); ?></p>
              <p class="card-text"><?php echo $string = "With: " . substr($array[4]['actors'],0,255); ?></p>
                <?php
                  $string = substr($array[4]['showtimes'],0,255);
                  $times = explode(';',$string);
                  foreach ($times as $time) {
                  echo '<a href="book.php?i='.substr($array[4]['movieID'],0,3).'&t='.$time.'" class="btn btn-primary">'.$time.'</a> ';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-auto cardimage">
            <img src="<?php echo $string = substr($array[5 ]['poster'],0,255); ?>" width="220" height="300" alt="">
          </div>
          <div class="col cardtext">
            <div class="card-block px-2">
              <h4 class="card-title"><?php echo $string = substr($array[5]['name'],0,255); ?></h4>
              <p class="card-text"><?php echo $string = substr($array[5]['description'],0,1024); ?></p>
              <p class="card-text"><?php echo $string = "With: " . substr($array[5]['actors'],0,255); ?></p>
                <?php
                  $string = substr($array[5]['showtimes'],0,255);
                  $times = explode(';',$string);
                  foreach ($times as $time) {
                  echo '<a href="book.php?i='.substr($array[5]['movieID'],0,3).'&t='.$time.'" class="btn btn-primary">'.$time.'</a> ';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>

  </div>
</div>

<!--/WHAT'S ON-->

<!--COMING SOON-->

<div id="comingsoon" class="divider">
</div>

<div class="section">
    <img src="img/comingsoon.png" />
</div>

<div class="divider">
</div>
        
<!--POSTERS-->
<div class="comingsoon">

      <ul id="flexiselDemo3">
        <li><img src="img/soon1.jpg" width="200" height="280"/></li>
        <li><img src="img/soon2.jpg" width="200" height="280"/></li>
        <li><img src="img/soon3.jpg" width="200" height="280"/></li>
        <li><img src="img/soon4.jpg" width="200" height="280"/></li>
        <li><img src="img/soon5.jpg" width="200" height="280"/></li>
        <li><img src="img/soon6.jpg" width="200" height="280"/></li>
      </ul>

</div>
<!--/POSTERS-->

<!--/COMING SOON-->

<!--FIND US-->

<div id="findus" class="divider">
</div>

<div class="section">
    <img src="img/findus.png" />
</div>

<div class="divider">
</div>



<div class="row findus">



    <div class="col-auto booknowdiv">
      <h5>Don't waste time</h5>
      <br />
      <a href="index.php#whatson" class="btn btn-primary">
        <h4>Book Now!</h4>
      </a>
    </div>

    <div class="col-auto times">
      <h5>Opening Times</h5><br />
      <p>Mon-Sat: 10am - 12am</p>
      <p>Sun: 11am - 10pm</p>
    </div>

    <div class="col-auto address">
      <h6>Address</h6>
      <p>Bankhead Avenue
      <br>Edinburgh
      <br>EH11 4DE</p>
      
      <p>Email: ec1529114@edinburghcollege.ac.uk</p>
      <p>Phone: 0131 669 4400</p>
    </div>
</div>

<div class="divider">
</div>


      <div id="map">       
      </div>

<div class="divider">
</div>

<!--/FIND US-->

<?php

include('footer.html');

?>