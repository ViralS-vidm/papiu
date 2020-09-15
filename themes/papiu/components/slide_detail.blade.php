<div>
    <div class="imgHome">
        <div id="carouselExampleControls{{ $product->id }}" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($product->detailImages as $i => $image )
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i + 1 }}"
                        class="{{ $i == 0 ? 'active' : '' }}">
                        <div class="contentText_slide">
                            <span>{{ $i + 1 }}</span>
                            <p>Of</p>
                            <p>{{ $product->detailImages->count() }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach($product->detailImages as $i => $image )
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <img src="{{ url($image->original_url) }}" class="d-block w-100" alt=""/>
                    </div>
                @endforeach
                <a class="carousel-control-prev" href="#carouselExampleControls{{ $product->id }}" role="button"
                   data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls{{ $product->id }}" role="button"
                   data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="titleSlideCategory">
        <span>Toàn cảnh</span>
    </div>
</div>
