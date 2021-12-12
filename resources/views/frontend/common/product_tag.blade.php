@php
    $tag_ind = App\Models\Product::groupBy('product_tags_ind')->select('product_tags_ind')->get();
    $tag_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
       
      <div class="tag-list"> 
        @if (session()->get('lang') == 'en') 
        @foreach ($tag_en as $tag)
            
        <a class="item active" title="{{$tag->product_tags_en}}" href="{{ url('product/tag/'.$tag->product_tags_en) }}">{{ str_replace(',',' ',$tag->product_tags_en)  }}</a> 

        @endforeach

        @else 
        @foreach ($tag_ind as $tag)
            
        <a class="item active" title="{{$tag->product_tags_ind}}" href="{{ url('product/tag/'.$tag->product_tags_ind) }}">{{ str_replace(',',' ',$tag->product_tags_ind)  }}</a> 

        @endforeach
        @endif
         
        </div>
      <!-- /.tag-list --> 
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>