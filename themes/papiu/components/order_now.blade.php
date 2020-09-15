<div class="oderNow">
    <div class="container">
        <div class="leftTitle">
            <h1>
                {!! $leftTitle !!}
            </h1>
        </div>
        <div class="rightTitle">
            <span>{!!  $rightTitle !!}</span>
            <a class="{{$class ?? ''}}" @if(isset($linkUrl)) href="{{ url($linkUrl) }}" @endif>{{ $linkLabel }}</a>
        </div>
    </div>
</div><!-- End .orderNow -->

