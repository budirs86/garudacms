    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="public/tema/aznews/assets/img/logo/logo_baubau_small.png" alt="">
                </div>
            </div>
        </div>
    </div>
<header>
  <!-- Header Start -->
 <div class="header-area">
      <div class="main-header ">
          <div class="header-top black-bg d-none d-md-block">
             <div class="container">
                 <div class="col-xl-12">
                      <div class="row d-flex justify-content-between align-items-center">
                          <div class="header-info-left">
                              <ul>     
                                  <li><img src="public/tema/aznews/assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                  <li><img src="public/tema/aznews/assets/img/icon/header_icon1.png" alt=""><label id=date></label></li>
                              </ul>
                          </div>
                       
                      </div>
                 </div>
             </div>
          </div>
          <div class="header-mid d-none d-md-block">
             <div class="container">
                  <div class="row d-flex align-items-center">
                      <!-- Logo -->
                      <div class="col-xl-3 col-lg-3 col-md-3">
                          <div class="logo">
                              <a href="{{ route('home')}}"><img src="public/assets/logo/header_baubau.png" width="1150" alt=""></a>
                          </div>
                      </div>
                  
                  </div>
             </div>
          </div>
         <div class="header-bottom header-sticky">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                          <!-- sticky -->
                              <div class="sticky-logo">
                                  <a href="{{ route('home')}}"><img src="public/tema/aznews/assets/img/logo/baubaulogo.png" width="250" alt=""></a>
                              </div>
                          <!-- Main-menu -->
                          <div class="main-menu d-none d-md-block">
                              <nav>                  
                                  <ul id="navigation">    
                                      <li><a href="{{ route('home')}}">BERANDA</a></li>
                                      @foreach ($menu as $menu_item)
                                        <li><a href="{{ route('pages', 'id='.$menu_item->link)}}">{{ $menu_item->title }}</a>
                                            @php
                                                $childs = App\Models\Menu::where('parent_id', $menu_item->id)->get();
                                                $count = count($childs);
                                            @endphp
                                            @if ($count > 0 )
                                                <ul class="submenu">
                                                    @foreach ($childs as $child)
                                                        <li><a href="{{ route('pages','id='.$child->link)}}">{{ $child->title}}</a></li>
                                                    @endforeach
                                                </ul>    
                                            @endif
                                        </li>

                                      @endforeach
                                  </ul>
                              </nav>
                          </div>
                      </div>             
                      <div class="col-xl-2 col-lg-2 col-md-4">
                          <div class="header-right-btn f-right d-none d-lg-block">
                              <i class="fas fa-search special-tag"></i>
                              <div class="search-box">
                                  <form action="#">
                                      <input type="text" placeholder="Search">
                                      
                                  </form>
                              </div>
                          </div>
                      </div>
                      <!-- Mobile Menu -->
                      <div class="col-12">
                          <div class="mobile_menu d-block d-md-none"></div>
                      </div>
                  </div>
              </div>
         </div>
      </div>
 </div>
  <!-- Header End -->
</header>
