<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="shortcut icon" href="/frontendimages/Icons/home-icon.png">
    <link rel="stylesheet" href="/frontend/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

{{--    <!-- ----------main style------------ -->--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="style.css">--}}
{{--    <!-- ------------Google Fonts-------------- -->--}}
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
{{--    <!-- --------------Icon pack font-awesome----------- -->--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{--    <!-- --------------------Google Maps Api---------------- -->--}}
    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl7F3URup7S4Of3R3cJQLk535vNnUQRzg&callback=initMap">
    </script>
</head>
<body>
<div class="container">
    <!-- Section 1 -->
    <section class="section-1" id="section-1">
        <!-- Logo -->
        <a href="#" class="logo">
            <i class="fab fa-apple"></i>
        </a>
        <!--End of Logo -->

        <!-- Navbar -->
        <nav class="navbar">
            <a href="#section-2" class="navbar-link">iPhone 12</a>
            <a href="#section-3" class="navbar-link">MacBook Air</a>
            <a href="#section-3" class="navbar-link">Watch</a>
            @auth
                @if(Auth::user()->role_id == 1)
                    <a target="_blank" href="{{ route('dashboard') }}" class="navbar-link">dashboard</a>
                @elseif(Auth::user()->role_id == 2)
                    <a target="_blank" href="{{ route('user.home') }}" class="navbar-link">dashboard</a>
                @endif
            @else
                <a href="{{ route('login.form') }}" class="navbar-link">Join Us</a>
            @endauth

        </nav>
        <!-- End of Navbar -->

        <!-- Cube -->
        <div class="cube-wrapper">
            <div class="cube">
                <div class="front-side">
                    <img src="/frontend/images/iphone.png">
                </div>
                <div class="back-side center">
                    <i class="fab fa-apple"></i>
                </div>
            </div>
            <!-- Controls -->
            <div class="controls">
                <a href="#" class="top-x-control">
                    <i class="fas fa-arrow-up "></i>
                </a>
                <a href="#" class="bottom-x-control">
                    <i class="fas fa-arrow-down "></i>
                </a>
                <a href="#" class="left-y-control">
                    <i class="fas fa-arrow-left "></i>
                </a>
                <a href="#" class="right-y-control">
                    <i class="fas fa-arrow-right "></i>
                </a>
                <a href="#" class="top-z-control">
                    <i class="fas fa-arrow-down "></i>
                </a>
                <a href="#" class="bottom-z-control">
                    <i class="fas fa-arrow-up "></i>
                </a>
            </div>
            <!-- End of Controls -->
        </div>
        <!-- End of Cube -->

        <!-- Banner -->
        <div class="section-1-banner center">
            <h1>&#8592; Best Gift</h1>
            <p>"Creativity is just connecting things."</p>
            <span> - Steve Jobs</span>
            <button type="button">Buy Now</button>
        </div>
        <!-- End of Banner -->

        <!-- Slideshow -->
        <div class="slideshow"></div>
        <!-- End of Slideshow -->
    </section>
    <!-- End of Section 1 -->

    <!-- Section 2 -->
    <section class="section-2" id="section-2">
        <!-- Section 2 Heading -->
        <h1 class="section-2-heading">iPhone 12</h1>
        <!-- End of Section 2 Heading -->

        <!-- Section 2 Images -->
        <div class="iphones">
            <img src="/frontend/images/iPhones/iphones-1-img.png" class="iphone-img-1">
            <img src="/frontend/images/iPhones/iphones-2-img.png" class="iphone-img-2">
        </div>
        <!-- End of Section 2 Images -->

        <!-- Section 2 Buttons -->
        <div class="iphone-btns">
            <a href="#" class="iphone-btn center"><span>Learn More</span></a>
            <a href="#" class="iphone-btn center"><span>Shop</span></a>
        </div>
        <!-- End of Section 2 Buttons -->
    </section>
    <!-- End of Section 2 -->
    <!-- featured products -->
    <div class="small-container mt-5">
        <h2 class="title">Featured Products</h2>
        <div class="row horizontal-scroll-wrapper squares">
            @foreach($product_lists as $product)
            <div class="col-4 box-container">
                <div class="image-overlay"></div>
                <img src="{{ asset('images/'.$product->photo) }}" alt="tablet pc">
                <h5 class="product_name">{{$product->title}}</h5>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <div class="content-details fadeIn-bottom">
                    <h3 class="content-title">{{$product->title}}</h3>
                    <h4 class="content-price">{{$product->price}}</h4>
                </div>
                <p class="price_name" >{{$product->title}}</p>
                <!-- <div class="btn btn-secondary" title="Preview Item"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                </div> -->
            </div>
            @endforeach
        </div>
        <!-- Latest products -->
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <div class="col-4 box-container">
                <img src="/frontend/images/Alienware-laptop.png" alt="Gaming Laptop">
                <h5 class="product_name">X-box Console</h5>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p class="price_name" >Rs2000</p>
            </div>
            <div class="col-4 box-container">
                <img src="/frontend/images/canon-cam.jpg" alt="Camera">
                <h5 class="product_name">Canon 12X Pro Shoot</h5>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p class="price_name" >Rs990</p>
            </div>
            <div class="col-4 box-container">
                <img src="/frontend/images/iphone9-phone.jpg" alt="Iphone SE">
                <h5 class="product_name">IPhone SE</h5>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p class="price_name" >Rs4999.99</p>
            </div>
            <div class="col-4 box-container">
                <img src="/frontend/images/logitech-tab.png" alt="Tablet Pc">
                <h5 class="product_name">Samsung Tablet PC</h5>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p class="price_name" >Rs3999.99</p>
            </div>

        </div>
    </div>

    <!-- Section 3 -->
    <!-- End of Section 3 -->

    <!-- Section 4 -->
    <section class="section-4 center" id="section-4">
        <!-- Section 4 Watches -->
        <div class="watches center">
            <!-- Watch Bands -->
            <div class="watch-bands center">
                <img src="/frontend/images/watches/watch-band-1.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-2.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-3.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-4.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-5.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-6.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-7.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-8.jpg" class="watch-band-img">
                <img src="/frontend/images/watches/watch-band-9.jpg" class="watch-band-img">
            </div>
            <!-- End of Watch Bands -->

            <!-- Watch Cases -->
            <div class="watch-cases center">
                <img src="/frontend/images/watches/watch-case-1.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-2.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-3.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-4.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-5.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-6.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-7.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-8.png" class="watch-case-img">
                <img src="/frontend/images/watches/watch-case-9.png" class="watch-case-img">
            </div>
            <!-- End of Watch Cases -->
        </div>
        <!-- End of Section 4 Watches -->

        <!-- Watch Controls -->
        <a href="#" class="watch-control watch-top-control center">
            <i class="fas fa-angle-up"></i>
        </a>
        <a href="#" class="watch-control watch-right-control center">
            <i class="fas fa-angle-right"></i>
        </a>
        <a href="#" class="watch-control watch-bottom-control center">
            <i class="fas fa-angle-down"></i>
        </a>
        <a href="#" class="watch-control watch-left-control center">
            <i class="fas fa-angle-left"></i>
        </a>
        <!-- End of Watch Controls -->

        <!-- Watch Button -->
        <button class="watch-btn">Buy Now</button>
        <!-- End of Watch Button -->
    </section>
    <!-- End of Section 4 -->

    <!-- Section 5 -->
    <section class="section-5 center" id="section-5">
        <!-- Section 5 Content -->
        <div class="airpods">
            <!-- Section 5 Heading -->
            <h1 class="section-5-heading">AirPods</h1>
            <!-- End of Section 5 Heading -->

            <!-- Section 5 Images -->
            <img src="/frontend/images/AirPods/airpods-1.png" class="airpods-img-1">
            <img src="/frontend/images/AirPods/airpods-2.png" class="airpods-img-2">
            <!-- End of Section 5 Images -->

            <!-- Section 5 Buttons -->
            <div class="airpods-buttons">
                <button class="airpods-btn">Learn More</button>
                <button class="airpods-btn">Buy</button>
            </div>
            <!-- End of Section 5 Buttons -->
        </div>
        <!-- End of Section 5 Content -->
    </section>
    <!-- End of Section 5 -->

    <!-- Section 6 -->

    <!-- End of Section 6 -->
</div>
<script src="/frontend/script.js"></script>
</body>
</html>


