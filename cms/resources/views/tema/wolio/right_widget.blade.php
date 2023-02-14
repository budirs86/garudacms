
<div class="most-recent-area">
  <aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">KATEGORI</h4>
    <ul class="list cat-list">
      @php
          $cats = App\Models\Category::where('unit_id', $unit)->get();
      @endphp
      @foreach ($cats as $cat_item)
      <li>
        <a href="{{ route('berita_category', 'id='.$cat_item->id) }}" class="d-flex">
            <p>{{ $cat_item->title }}</p>
            <p>
            @php
              $news_count = App\Models\Berita::where('unit_id', $unit)
                            ->where('category_id', $cat_item->id)->count();    
            @endphp
            ({{ $news_count }})
          </p>
        </a>
      </li>
      @endforeach 
    </ul>
  </aside>

  </div>
  <span><br></span>
  <div class="most-recent-area">
    <!-- Section Tittle -->
    <div class="small-tittle mb-20">
        <h4>INFOGRAFIS</h4>
    </div>
    <a href="{{route('daftar_info')}}"><img src="{{ asset('images/info/'.$info[0]->pic)}}" id="img" width="100%" height="350"></a>
    
    <!-- Details -->
    <!-- <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
    <div id="gpr-kominfo-widget-container"></div>  -->
  </div>

</div>
