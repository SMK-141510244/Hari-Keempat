<!DOCTYPE html>
<html lang="en">
<head>
<title>Ujikom</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{url('poli/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{url('poli/css/style.css')}}" rel="stylesheet">
<link href="{{url('poli/font/css/fontello.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
  <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <img src="img/logo.PNG" alt="">
      <ul class="nav nav-collapse">
        <li><a href="{{url('/home')}}" ><i class="icon-user"></i> Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <font color="white">Menu</font> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
            <a href="{{ url('JABATAN') }}">Data Jabatan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('GOLONGAN')}}">Data Golongan</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="{{url('KATEGORI')}}">Kategori Lembur</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="{{ url('PEGAWAI') }}">Data Pegawai</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('LEMBUR')}}">Data Lembur Pegawai</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('TUNJANGAN') }}">Tunjangan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('TUNJANGANPEG') }}">Data Tunjangan Pegawai</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('PENGGAJIAN') }}">Data Penggajian</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="icon-paper-plane"></i>Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                 
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        </ul>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>

@yield('content')

<div class="footer" href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
  <div class="container">
    <p class="pull-left"><a href="http://dzyngiri.com">141510244@smkassalaambandung.sch.id</a></p>
    <p class="pull-right"><a href="#myModal" role="button" data-toggle="modal"> <i class="icon-mail"></i> CONTACT</a></p>
  </div>
</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><i class="icon-mail"></i> Contact Me</h3>
  </div>
  <div class="modal-body">
    <form action="#">
      <input type="text" placeholder="Yopur Name">
      <input type="text" placeholder="Your Email">
      <input type="text" placeholder="Website (Optional)">
      <textarea rows="3" style="width:80%"></textarea>
      <br>
      <button type="submit" class="btn btn-large"><i class="icon-paper-plane"></i> SUBMIT</button>
    </form>
  </div>
</div>

<script src="{{url('poli/js/jquery-1.10.1.min.js')}}"></script>
<script src="{{url('poli/js/bootstrap.min.js')}}"></script>
<script>
$('#myModal').modal('hidden')
</script>
</body>
</html>