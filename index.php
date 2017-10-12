<?php
require 'header.php';
?>
</header>
  <div class="spacer">
  </div>
  <!-- start carousel -->
  <div class="carouselFixed">
  <div class="container-fluid">
    <div class="row">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active item1">
        <img src="https://i.ytimg.com/vi/1X6OAucemtE/maxresdefault.jpg" alt="Los Angeles">
      </div>

      <div class="item item2">
        <img src="https://www.tampabayfoodtruckrally.com/uploads/images/Food_Truck_Photos/Engine_53_Pizza.jpg" alt="Chicago">
      </div>

      <div class="item item3">
        <img src="http://www.ternascodearagon.es/wp-content/uploads/2015/11/Bocadillo-TA-Bandera-Irlandesa.jpg" alt="New york">
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- end carousel -->

<div class="baudi">
<div class="titles">
<h1>Mon histoire</h1>
</div>
<div class=" aboutUs">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
</div>
<div class="titles">
<h1>Nouveautés</h1>
</div>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="media">
        <div class="col-md-offset-1 col-md-4">
          <a class="pull-left" href="#">
            <img class="media-object img-responsive" src="http://via.placeholder.com/800x600" alt="Image">
          </a>
        </div>
        <div class="media-body">
          <div class="col-md-offset-2 col-md-5">
            <h4 class="media-heading">Les bocadillos</h4>
            <div class="composition"><h5>Ingredients</h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
            <div class="caption"><h5>Description</h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
  <?php
      include 'footer.php';
  ?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>
</body>
</html>
