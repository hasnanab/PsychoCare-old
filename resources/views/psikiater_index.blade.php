<!doctype html>
<html lang="en">
  <head>
  	<title>PsychoCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
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
              <i class="fa fa-bell" aria-hidden="true"></i>
              <div class="user-logo">
                  @foreach($gambar as $g)
                      <img src="{{url($g->foto)}}" style="width: 50%">
                      <h3>{{$g->username}}</h3>
                  @endforeach

              </div>
          </div>
          <ul class="list-unstyled components mb-5">
              <li class="active">
                  <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
              </li>
              </li>
              <li>
                  <a href="/history/chat"><span class="fa fa-history mr-3"></span>History</a>
              </li>
              <li>
                  <a href="/psikiater/profil"><span class="fa fa-cog mr-3"></span> Settings</a>
              </li>
              <li>
                  <a href="{{url('/signout')}}"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">PsychoCare</h2>
            <table  border="0" cellspacing="10" width="1100" align="center">
                <p>Tahukah Anda apa bedanya autisme dan down syndrome?<br>

                    Tahukah Anda apa bedanya depresi dan stres?<br>

                    Tahukah Anda apa bedanya bipolar dan gangguan kepribadian ganda?<br><br>

                    Beberapa contoh di atas adalah istilah psikologi yang sering tidak dipahami oleh masyarakat luas. Tak jarang kita menggunakan kata autis untuk menyindir orang yang terus menerus menggunakan gadget padahal sedang banyak orang di sekitarnya. Tak jarang juga kita mengatakan diri kita sedang depresi karena banyak pekerjaan, padahal sesungguhnya depresi adalah kondisi klinis yang jauh berbeda dari stres biasa.
                    <br>
                    Kurangnya pengetahuan ini membuat banyak orang tidak sadar dengan kondisi diri sendiri maupun orang lain. Akibatnya, tindakan untuk mencari bantuan pun sangat kurang atau malah ditakuti. Bagi sebagian orang, mencari bantuan ke psikolog hanya berlaku untuk orang ‘gila’.
                    <br>
                    Permasalahan psikologis yang kurang dipahami merupakan masalah nyata. Departemen Kesehatan Indonesia menemukan bahwa setidaknya 69% pasien yang datang ke puskesmas mengeluhkan sakit fisik (sakit kepala, mual, sakit leher) yang ternyata disebabkan oleh gangguan psikologis ringan (depresi ringan, kecemasan). Padahal, menurut WHO, sehat adalah kondisi utuh dari kesehatan fisik, mental, dan kesejahteraan sosial. Sayangnya, kesadaran masyarakat mengenai pentingnya kesehatan mental masih kurang. Upaya edukasi serta pemberian layanan terhambat oleh jumlah tenaga kesehatan mental yang masih minim di Indonesia. Saat ini hanya ada sekitar 1000 psikolog klinis di Indonesia yang terpusat di kota-kota besar saja.
                    <br>
                    Pijar Psikologi hadir sebagai sarana edukasi mengenai isu-isu kesehatan mental dan psikologi yang mudah diakses. Tujuan kami sederhana. Dengan adanya pengetahuan, maka orang akan dengan mudah menyadari. Dengan timbulnya kesadaran, maka stigma negatif mengenai permasalahan psikologis dapat dikurangi. Harapan kami, mencari bantuan psikologis bukan lagi hal yang perlu ditakuti.
                    <br>
                    Setiap orang berhak untuk sehat, dan setiap orang berhak untuk bahagia. Karena sehat tidak hanya fisik, tetapi juga secara mental.</p>
            </table>
        </div>
		</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
