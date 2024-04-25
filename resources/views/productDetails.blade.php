<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<style>

</style>
</head>
<body>
<div class="page-wrpper">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #6EDAE6 !important;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="/frontend/images/iphone.png" alt="Bootstrap" width="30" height="24">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    Offers
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($parentcategories as $parentcategory)
                                    <li><a class="dropdown-item" href="{{route('categoryproductlist', $parentcategory->slug)}}">{{$parentcategory->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Detail -->
    {{--    <div class="container my-4">--}}
    {{--    <div class="d-flex justify-content-center row">--}}
    {{--        <div class="col-md-10">--}}
    {{--            <div class="row p-2 bg-white rounded">--}}
    {{--                <div class="col-md-5 mt-1">--}}
    {{--                    <img class="img-fluid img-responsive rounded product-image" src="https://images.priceoye.pk/apple-iphone-15-pakistan-priceoye-l41de-270x270.webp"></div>--}}
    {{--                <div class="col-md-7 mt-1">--}}
    {{--                    <h5>Apple iPhone 15 Plus</h5>--}}
    {{--                    <div class="d-flex flex-row">--}}
    {{--                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>--}}
    {{--                    </div>--}}
    {{--                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div>--}}
    {{--                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div>--}}
    {{--                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.<br><br></p>--}}
    {{--                    --}}
    {{--                    <div class="d-flex flex-row align-items-center">--}}
    {{--                        <h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span>--}}
    {{--                    </div>--}}
    {{--                    <h6 class="text-success">Free shipping</h6>--}}
    {{--                    <div class="d-flex my-4">--}}
    {{--                        <button class="btn btn-primary" type="button">Details</button>--}}
    {{--                        <button class="btn btn-primary mx-3" type="button">Add to wishlist</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <!-- 2nd Detail Card -->

    <div class="container my-4">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    @foreach($product as $product)
                        <div class="preview col-md-6">
                            <span class="mx-2 header-share-icon" onclick="toggleSharePopup('{{$product->id}}')" header-data-popup="{{$product->id}}">
                                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                <div class="header-popup" id="header-popup-{{$product->id}}">
                                    <div class="header-popup-content">
                                        <a target="_blank" href="#"><i class="mx-2 text-primary fa-brands fa-facebook"></i>Facebook</a>
                                        <a target="_blank" href="#"> <i class="mx-2 text-info fa-brands fa-twitter"></i>Twitter</a>
                                        <a target="_blank" href="#"> <i class="mx-2 text-success fa-brands fa fa-whatsapp"></i>Whatsapp</a>
                                        <span><i class="mx-2 text-secondary fa-solid fa-copy" onclick="topiccopylink('{{$product->id}}')"></i>Copy link</span>
                                    </div>
                                </div>
                            </span>

                            <div class="preview-pic tab-content">

                                <div class="tab-pane active" id="pic-1"><img
                                        src="{{ asset('images/' . $product->photo) }}"/></div>

                            </div>
                        </div>
                        <div class="details col-md-6">
                            <p class="vote"><strong></strong>{{$subscribe_user}} have participated </p>
                            <h3 class="product-title">{{$product->title}}</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <p class="product-description">{!! $product->description !!}</p>
                            @php
                                $after_discount=($product->price-($product->price*$product->discount)/100);
                            @endphp
                            <h4 class="price">current price: <span>(Rs.){{number_format($after_discount,2)}} </span>
                            </h4>
                            {{ number_format($product->price, 2) }}
                            <h5 class="sizes">sizes:
                                <span class="size" data-toggle="tooltip" title="small">s</span>
                                <span class="size" data-toggle="tooltip" title="medium">m</span>
                                <span class="size" data-toggle="tooltip" title="large">l</span>
                                <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                            </h5>
                            <h5 class="colors">colors:
                                <span class="color orange"></span>
                                <span class="color green"></span>
                                <span class="color blue"></span>
                            </h5>
                            <div class="action">
                                @if(auth()->check())
                                    @if($subscribe_product != $product->id)
                                        <a href="{{route('make.payment', $product->id)}}"
                                           onclick="showToast('You have already subscribed to this product', 'check')">
                                            <button class="add-to-cart1 btn btn-default" type="button">Subscribe for
                                                Rs. {{$product->price_per_share}}</button>
                                        </a>
                                    @else
                                        <button class="add-to-cart1 btn btn-default" type="button">Already Subscribe
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}">
                                        <button class="add-to-cart1 btn btn-default" type="button">Buy for
                                            Rs. {{$product->price_per_share}}</button>
                                    </a>
                                @endif
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span>
                                </button>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- Product grid -->
    <div class="container pb-3">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img decoding="async" class="pic-1"
                                 src="https://images.priceoye.pk/apple-iphone-15-pakistan-priceoye-l41de-270x270.webp">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">20%</span>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star disable"></li>
                    </ul>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Women's Blouse</a></h3>
                        <div class="price">$16.00
                            <span>$20.00</span>
                        </div>
                        <a class="add-to-cart2" href="">+ Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img decoding="async" class="pic-1"
                                 src="https://3docean.img.customer.envatousercontent.com/files/468905644/590.jpg?auto=compress%2Cformat&fit=crop&crop=top&max-h=8000&max-w=590&s=125662d6f08f6ff9674e5861f99845ca">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">30%</span>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Men's Plain Tshirt</a></h3>
                        <div class="price">$35.00
                            <span>$100.00</span>
                        </div>
                        <a class="add-to-cart2" href="">+ Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img decoding="async" class="pic-1"
                                 src="https://images.priceoye.pk/apple-iphone-13-pakistan-priceoye-whjtp-270x270.webp">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">50%</span>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Marks & Spencer</a></h3>
                        <div class="price">$50.00
                            <span>$100.00</span>
                        </div>
                        <a class="add-to-cart2" href="">+ Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="#">
                            <img decoding="async" class="pic-1"
                                 src="https://images.priceoye.pk/apple-iphone-xi-pakistan-priceoye-rnsnj-270x270.webp">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">Sale</span>
                        <span class="product-discount-label">20%</span>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Men's Formal Shirt</a></h3>
                        <div class="price">$60.00
                            <span>$80.00</span>
                        </div>
                        <a class="add-to-cart2" href="">+ Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="new_footer_area bg_color mt-4">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s"
                             style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Don’t miss any updates of our new templates and extensions.!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true"
                                  _lpchecked="1">
                                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s"
                             style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Android App</a></li>
                                <li><a href="#">ios App</a></li>
                                <li><a href="#">Desktop</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">My tasks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s"
                             style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Term &amp; conditions</a></li>
                                <li><a href="#">Reporting</a></li>
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s"
                             style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <a href="#" class="fab fa-facebook"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-linkedin"></a>
                                <a href="#" class="fab fa-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400">© Mian Waseem. 2024 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <p>Made with <i class="fa-solid fa-heart text-danger"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>

    function toggleSharePopup(productId) {
        var popup = document.getElementById('header-popup-' + productId);
        popup.classList.toggle('show');
    }

    window.onclick = function(event) {
        if (!event.target.matches('.header-share-icon') && !event.target.matches('.header-popup')) {
            var popups = document.querySelectorAll('.header-popup');
            popups.forEach(function(popup) {
                popup.classList.remove('show');
            });
        }
    }

</script>
</body>
</html>
