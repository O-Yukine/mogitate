<div>
    <a href="{{ url('/products/' . $product->id) }}">
        <div class="card">
            <div class="card__img">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="card__content">
                <div class="card__content-tag">
                    <p class="card__content-tag-item">{{ $product->name }}</p>
                    <p class="card__content-tag-item card__content-tag-item--last">
                        ¥{{ number_format($product->price) }}
                    </p>
                </div>
            </div>
        </div>
    </a>

    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
</div>
