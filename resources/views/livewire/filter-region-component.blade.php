<div class="widget mercado-widget brand-widget">
    <h2 class="widget-title">Provinsi</h2>
    <div class="widget-content">
        <ul class="list-style vertical-list list-limited" data-show="6">
            <div id="posts">
            @foreach ($provinces as $province)
            <li class="list-item"><a class="filter-link" href="{{ route('jasa.province',['province_id'=>$province->id]) }}">{{ $province->name }} </a></li>
            @endforeach       
            </div>
            
        </ul>
    </div>
</div>
<p>

@push('scripts')
<script>  
$(".see-more").click(function() {
    $div = $($(this).data('div')); 
    $link = $(this).data('link'); 
  
    $page = $(this).data('page'); 
    $href = $link + $page; 
    $.get($href, function(response) { 
      $html = $(response).find("#posts").html(); 
      $div.append($html);
    });
  
    $(this).data('page', (parseInt($page) + 1)); 
  });

</script>
@endpush