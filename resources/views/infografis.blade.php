
@foreach (galery() as $item)

<div class="swiper-slide">
<div class="image-container">
<a href="/storage/{{$item->file}}" target="_blank"><img class="img-responsive" src="/storage/{{$item->file}}" width="180px" height="160px" alt="alternative"></a>
</div>
</div>
@endforeach