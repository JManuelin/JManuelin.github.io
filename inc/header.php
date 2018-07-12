
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./css/nav.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="./js/prefixfree.min.js"></script> 
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> 
<script>
$(document).ready(function(){ 
  var touch   = $('#resp-menu');
  var menu  = $('.menu');
 
  $(touch).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle();
  });
  
  $(window).resize(function(){
    var w = $(window).width();
    if(w > 767 && menu.is(':hidden')) {
      menu.removeAttr('style');
    }
  });
  
});
</script>
      

      <nav> <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Menu</a>
  <ul class="menu">
    <li><a class="homer" href="#"><i class="fa fa-home"></i> HOME</a>
      
    </li>
    <li><a  href="#"><i class="fa fa-tags"></i> RESERVACION</a>
      <ul class="sub-menu">
        <li><a href="reserva.php">Reservar</a></li>
        <li><a href="#">Sub-Menu 2</a>
          <ul>
            <li><a href="#">Sub Sub-Menu 1</a></li>
            <li><a href="#">Sub Sub-Menu 2</a></li>
            <li><a href="#">Sub Sub-Menu 3</a></li>
            <li><a href="#">Sub Sub-Menu 4</a></li>
            <li><a href="#">Sub Sub-Menu 5</a></li>
          </ul>
        </li>
        <li><a href="#">Sub-Menu 3</a>
          <ul>
            <li><a href="#">Sub Sub-Menu 1</a></li>
            <li><a href="#">Sub Sub-Menu 2</a></li>
            <li><a href="#">Sub Sub-Menu 3</a></li>
            <li><a href="#">Sub Sub-Menu 4</a></li>
            <li><a href="#">Sub Sub-Menu 5</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a  href="#"><i class="fa fa-camera"></i> PORTFOLIO</a>
      <ul class="sub-menu">
        <li><a href="#">Sub-Menu 1</a></li>
        <li><a href="#">Sub-Menu 2</a>
          <ul>
            <li><a href="#">Sub Sub-Menu 1</a></li>
            <li><a href="#">Sub Sub-Menu 2</a></li>
            <li><a href="#">Sub Sub-Menu 3</a></li>
            <li><a href="#">Sub Sub-Menu 4</a></li>
            <li><a href="#">Sub Sub-Menu 5</a></li>
          </ul>
        </li>
        <li><a href="#">Sub-Menu 3</a>
          <ul>
            <li><a href="#">Sub Sub-Menu 1</a></li>
            <li><a href="#">Sub Sub-Menu 2</a></li>
            <li><a href="#">Sub Sub-Menu 3</a></li>
            <li><a href="#">Sub Sub-Menu 4</a></li>
            <li><a href="#">Sub Sub-Menu 5</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a  href="login.php"><i class="fa fa-user"></i> Login</a></li>
    <li><a  href="#"><i class="fa fa-bullhorn"></i> BLOG</a></li>
    <li><a  href="#"><i class="fa fa-envelope"></i> CONTACT</a></li>
    <li><a  href="#"><i class="fa fa-sitemap"></i> SITEMAP</a></li>
  </ul>
</nav>




 <style>
@import url(http://fonts.googleapis.com/css?family=roboto:400,400italic,600,700,800);

</style>
