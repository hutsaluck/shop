<?php
use \Illuminate\Support\Str;
?>
<div class="col-3 mb-4 d-flex align-items-stretch">
    <div class="card">
        <img class="card-img-top" src="{{ $product->cover }}" alt="{{ $product->title }}">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('catalog.show', ['slug' => $product->slug]) }}">
                    {{ $product->title }}
                </a>
            </h5>
            <p>
                @foreach($product->categories as $category)
                    <a href="">
                            <span class="badge rounded-pill
                             @if ($category->id == 1)
                                bg-primary
                                @elseif($category->id == 2)
                                bg-secondary
                                @elseif($category->id == 3)
                                bg-success
                                @elseif($category->id == 4)
                                bg-danger
                                @elseif($category->id == 5)
                                bg-info
                            @endif
                                mr-1">{{ $category->name }}</span>
                    </a>
                @endforeach
            </p>
            <p>&dollar;{{ $product->price }}</p>
            <p class="card-text">
                {{ Str::limit($product->description, 120, '...') }}
            </p>

        </div>
        <div class="card-footer">
                <span class="badge {{ $product->stock > 0 ? 'badge-success' : 'badge-danger'}}">
                    {{ $product->stock > 0 ? 'on stock' : 'not on stock'}}
                </span>
{{--            <span class="float-right">--}}
{{--                <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}"--}}
{{--                   class="btn btn-sm btn-outline-secondary waves-effect">--}}
{{--                    to cart <i class="fas fa-cart-arrow-down"></i>--}}
{{--                </a>--}}
{{--            </span>--}}
        </div>
    </div>
</div>
