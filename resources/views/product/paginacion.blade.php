@if (count($viewData["products"]))
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-4 mb-2">
            <div class="card">
                <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn">
                    <img src="{{ asset('/img/'.$product->getImage()) }}" class="card-img-top img-card">
                </a>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('/img/pokeball.png') }}" class="img-fluid" width="100px" height="100px">
                <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
                class="btn bg-secondary nombre-pokemons text-white">{{ $product->getName() }}</a>
            </div>
        </div>
    @endforeach
@endif