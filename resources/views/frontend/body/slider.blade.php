<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
     
      <!-- /.item -->
      @foreach ($sliders as $slider)
          
      @if ($slider->status == 1)
          
      <div class="item" style="background-image: url({{ asset($slider->slider_img) }}">
        <div class="container-fluid">
          <div class="caption bg-color vertical-center text-left">
            <div class="slider-header fadeInDown-1"></div>
            <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
            <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
            <div class="button-holder fadeInDown-3"> <a href="{{url('/')}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
          </div>
          <!-- /.caption --> 
        </div>
        <!-- /.container-fluid --> 
      </div>
      @endif

      <!-- /.item --> 
      @endforeach
    </div>
    <!-- /.owl-carousel --> 
  </div>