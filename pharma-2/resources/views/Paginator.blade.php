@if ($paginator->hasPages())
<ul class=" d-flex justify-content-center m-auto">
    @if ($paginator->onFirstPage())
    <span class="font_20 text-secondary d-none " wire:click='previousPage'>
        <i class="fas fa-chevron-circle-left"></i>
    </span>
    @else
    <span class="font_20 " wire:click='previousPage'>
        <i class="fas fa-chevron-circle-left"></i>
    </span>
@endif

@foreach($elements as $element)
    <div class=" pagination justify-content-center" >
@if(is_array($element))
 @foreach($element as $page => $url)
     @if($page == $paginator->currentPage())
    <li class="mx-2 font_20" wire:click='gotoPage({{$page}})'><i class="fas fa-circle"></i></li>
          @else
          <li class=" mx-2 font_20 " wire:click='gotoPage({{$page}})'><i class="far fa-circle"></i></li>
     @endif
 @endforeach
    
@endif


       
        
    </div>
@endforeach


@if ($paginator->hasMorePages())
<span wire:click='nextPage' class=" font_20"><i class="fas fa-chevron-circle-right"></i> </span>

@else
    <span wire:click='nextPage' class="d-none text-secondary font_20"><i class="fas fa-chevron-circle-right"></i> </span>

@endif

</ul>
@endif

<style>
.font_20{
    font-size: 30px;
}
    </style>