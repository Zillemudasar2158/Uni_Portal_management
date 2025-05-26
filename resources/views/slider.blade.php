@include('simple_nav')

<div>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($slider as $index => $mainslider)
      <li data-target="#myCarousel" data-slide-to="{{ $mainslider }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
    @endforeach
  </ol>

  <!-- Slides -->
  <div class="carousel-inner">
    @if($slider->isEmpty())
    <img src="image/campus2.jpg" style="width:100%; height:650px;">
    @else
      @foreach($slider as $index => $mainslider)
        <div class="item {{ $index === 0 ? 'active' : '' }}">
          <img src="{{ asset($mainslider->pic_path) }}" style="width:100%; height:650px;">
          <div class="carousel-caption">
            <h2 style="color: white;"><i>{{ $mainslider->pic_description }}</i></h2>
          </div>
        </div>
      @endforeach
    @endif
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br><br>
@include('footer')