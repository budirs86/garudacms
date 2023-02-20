
<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<style>
  img {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  </style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src={{ asset('assets/logo/cms_logo.png') }} alt="Garuda CMS Logo" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark bg-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="d-flex col-12">
              <img src={{ asset("assets/logo/cms_logo.png")}} width="150" class="center">
            </div>
        </div>
        <br>
        <br>  
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $berita }}</h3>
                <p>Artikel</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper"></i>
              </div>
              <a href="{{ route('berita') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $halaman }}</h3>

                <p>Pages</p>
              </div>
              <div class="icon">
                <i class="fa fa-globe"></i>
              </div>
              <a href="{{ route('halaman') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $pengguna }}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $kategory }}</h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a href="{{ route('category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
       <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><strong>Berita Terbaru</strong></h3>
                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th width="400">Judul</th>
                            <th width="100">Tanggal</th>
                            <th width="200">Kategori</th>
                            <th width="100">Show</th>
                            <th width="100">Portal</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $i = 1;
                          @endphp

                          @foreach ($news as $item)
                            <tr>
                              <td>{{ $i }}.</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ date('d/m/y', strtotime($item->created_at)) }}</td>
                              <td>{{ $item->category->title }}</td>
                              <td>{{ $item->show }}</td>
                              <td>{{ $item->portal }}</td>
                              
                            </tr>
                            @php
                            $i++    
                            @endphp 
                          @endforeach
                        </tbody>
                        
                      </table>
                      {{-- {!! $news->withQueryString()->links('pagination::bootstrap-5') !!} --}}
                    </div>
                    <!-- /.card-body -->
                  </div>    
            </div>
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.footer')
</body>
</html>
