<section class="product_section layout_padding" id="product">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <form action="{{ route('search.product') }}" method="get">
                <div class="form-group d-inline-block">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="search" id="" class="form-control" placeholder="Search product Here!" style="height: 50px; ">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="search">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.details', $product->id) }}" class="option1">
                                    Details
                                </a>
                                <form action="{{ route('add.cart', $product->id) }}" method="post">
                                    @csrf
                                    <div class="row mx-auto">
                                        <div class="col-md-4">
                                            <input type="number" min="1" style="width: 100px; height:50px" value="1" name="quantity">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="submit" value="Add Cart" class="me-auto">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('product') }}/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $product->category }}
                            </h5>
                            @if ($product->discount_price != null)
                                <h6 style="color: red">
                                    $ {{ $product->discount_price }}
                                </h6>
                                <h6 style="color: blue; text-decoration: line-through">
                                    $ {{ $product->price }}
                                </h6>
                            @else
                                <h6 style="color: blue">
                                    $ {{ $product->price }}
                                </h6>
                            @endif
                        </div>
                     </div>
                    </div>
                     @endforeach
               </div>
               <div class="py-3">
                  {{ $products->links() }}
               </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
