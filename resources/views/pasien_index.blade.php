<!doctype html>
<html lang="en">
  <head>
  	<title>{{$title}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
        <!-- <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);"> -->
        <div class="img bg-wrap text-center py-4">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(assets/images/logo.jpg);"></div>
	  				<h3>{{$session['username']}}</h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="{{url('/pasien')}}"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
              <a href="{{url('/tanyadok')}}"><span class="fa fa-comments-o mr-3"></span> Tanya Dokter</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-search mr-3"></span> Cari Dokter</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-history mr-3"></span> Riwayat</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="{{url('/sign-out')}}"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
        <!-- <div id="content">
        <h2 class="mb-4">PsychoCare</h2>
        <p>lorem</p>
        </div> -->
		</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

     <!-- Menu Toggle Script -->
     <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
  </body>
</html>