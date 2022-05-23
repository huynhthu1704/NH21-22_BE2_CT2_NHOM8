@extends('master')
@section('content')
    <input type="text" hidden name="column" value="3">
    <main class="main">
        <div class="page-header text-center" style="background-image: url('/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Molla<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span class="products-and-page">9 of 56</span> Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="product_name" data-sort="asc" selected>A-Z</option>
                                            <option value="price" data-sort="desc">prices descending</option>
                                            <option value="price" data-sort="asc">prices increase</option>
                                            <option value="created_at" data-sort="desc">New</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                <div class="toolbox-layout">
                                    <a href="{{ route('category.2col') }}" class="btn-layout">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category.html" class="btn-layout active">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center" id="products-wraper">

                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center" id="pagination">

                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="javascript:void(0)" onclick="clearFilter()" class="sidebar-filter-clear">Clean
                                    All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @php
                                                $categories = \App\Models\Category::all();
                                            @endphp
                                            @foreach ($categories as $category)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="category"
                                                            value="{{ $category->id }}" id="cat-{{ $category->id }}">
                                                        <label class="custom-control-label"
                                                            for="cat-{{ $category->id }}">{{ $category->category_name }}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">{{ count($category->products) }}</span>
                                                </div><!-- End .filter-item -->
                                            @endforeach


                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-2">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            @php
                                                $brands = \App\Models\Brand::all();
                                            @endphp
                                            @foreach ($brands as $brand)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="brand"
                                                            value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                                                        <label class="custom-control-label"
                                                            for="brand-{{ $brand->id }}">{{ $brand->brand_name }}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">{{ count($brand->products) }}</span>
                                                </div><!-- End .filter-item -->
                                            @endforeach
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                        aria-controls="widget-3">
                                        Colour
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            @php
                                                $colors = \App\Models\Color::all();
                                            @endphp
                                            @foreach ($colors as $color)
                                                <a href="javascript:void(0)" class="colorCheckbox"
                                                    data-color="{{ $color->id }}"
                                                    style="background: {{ $color->color_code }};"><span
                                                        class="sr-only">{{ $color->color_name }}</span></a>
                                            @endforeach
                                        </div><!-- End .filter-colors -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                        aria-controls="widget-5" class="">
                                        Price
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-5" style="">
                                    <div class="widget-body">
                                        <span class="rangeValues d-block text-center pb-2"></span>
                                        <div class="range-slider">
                                            @php
                                                $product = \App\Models\Product::class;
                                            @endphp
                                            <input value="{{ $product::min('price') }}"
                                                min="{{ $product::min('price') }}" max="{{ $product::max('price') }}"
                                                name="price_value" step="500" type="range">
                                            <input value="{{ $product::max('price') }}"
                                                min="{{ $product::min('price') }}" max="{{ $product::max('price') }}"
                                                step="500" name="price_value" type="range">
                                        </div>
                                    </div><!-- End .widget-body -->
                                    <script>
                                        function getVals() {
                                            // Get slider values

                                            let slides = document.querySelectorAll("input[name=price_value]");
                                            let slide1 = parseFloat(slides[0].value);
                                            let slide2 = parseFloat(slides[1].value);
                                            // Neither slider will clip the other, so make sure we determine which is larger
                                            if (slide1 > slide2) {
                                                let tmp = slide2;
                                                slide2 = slide1;
                                                slide1 = tmp;
                                            }

                                            let displayElement = document.getElementsByClassName("rangeValues")[0];
                                            displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
                                        }

                                        window.onload = function() {
                                            // Initialize Sliders
                                            let sliderSections = document.getElementsByClassName("range-slider");
                                            for (let x = 0; x < sliderSections.length; x++) {
                                                let sliders = sliderSections[x].getElementsByTagName("input");
                                                for (let y = 0; y < sliders.length; y++) {
                                                    if (sliders[y].type === "range") {
                                                        sliders[y].oninput = getVals;
                                                        // Manually trigger event first time to display values
                                                        sliders[y].oninput();
                                                    }
                                                }
                                            }
                                        }
                                    </script>
                                </div><!-- End .collapse -->
                            </div>
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <script src="{{ asset('/js/ajax/category.js') }}"></script>
@endsection('content')
