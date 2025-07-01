<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Poppins&family=Space+Grotesk&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <title>AgroLink website</title>


   

</head>

<style>
 .about-images {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  margin-top: 30px;
}

.image {
  position: relative;
  flex: 0 0 220px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 15px;
  text-align: center;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
  overflow: hidden;
  padding-bottom: 50px; /* space for button */
}

.image:hover {
  transform: translateY(-5px);
}

.image img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 6px;
  margin-bottom: 10px;
}

.details-btn {
  position: absolute;
  bottom: 10px;
  left: 10px;
  padding: 6px 12px;
  font-size: 14px;
  border-radius: 5px;
  background-color: #28a745;
  border: none;
  color: white;
  text-decoration: none;
}

.details-btn:hover {
  background-color: #218838;
}

..product-card {
    position: relative;
    width: 250px;
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin: 20px;
}

.product-card img {
    width: 100%;
    border-radius: 10px;
    object-fit: cover;
}

.btn-star {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background-color: #ffc107;
    color: #fff;
    border: none;
    padding: 8px 16px;
    font-weight: bold;
    border-radius: 25px;
    box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-star:hover {
    background-color: #e0a800;
    transform: scale(1.05);
}

.fas.fa-star {
    color: gold;
    font-size: 18px;
}




</style>

<body>
    <div>
    
        @include('home.css')

   







</div>

    </div>

   
    

    <div class="about-agriplus">

        <div class="about-text">

            <h1>
                Buying and selling quality<br>
                farm produce has never <br>
                been easier
            </h1>

            <p>AgroLink is here to have you sorted, you can order farm<br>
                produce from the farmers, harvesters, and producers<br>
                directly
            </p>
            <button id="btn">Explore More</button>
        </div>
        <div class="about-img">
            <img src="./images/farmer a.jpeg" alt="farm products">
        </div>
    </div>

    <div class="vendors">

   

        <ul>
        <li>200+<br>
            Verified Vendors</li>
        <li>105+<br>
            Happy Customers</li>
        <li>2000+<br>
            Nation Wide Customers</li>
        </ul>
    </div>




    <div class="exists">
        <div class="about-exists">
            <h2><span id="two">Why w</span>e exist</h2>
            <p>we are built to make your work easier , like only online<br>
                ecommerce , Agriplus provide a great platform for<br>
                farmers to reach their customers throughout the <br>
                country .We have made it easier to shop from<br>
                anywhere through the platform.
            </p>
        </div>
        <div class="its-image">
            <img src="./images/farm f.jpeg" alt=" ">
        </div>
    </div>


    <div class="category">
        <h2>Our cate<span id="two">gories</span> of products</h2>
        <p>We go beyond the borders to ensure you get fresh produce<br>
            from the farm. Our customers satisfaction is our mission.
        </p>
    </div>

    <div class="popular">


     <div class="about-images">
  @foreach($products as $product)
    <div class="image">
        <img src="{{ asset('images/' . $product->image) }}">
        <h3>{{ $product->title }}</h3>
        <p>Ksh. {{ $product->price }}</p>
        <a class="btn btn-primary details-btn" href="{{ url('product_details', $product->id) }}">Details</a>
     <a class="btn-star" href="{{ url('add_star', $product->id) }}">★ Star</a>
</a>

    </div>
  @endforeach
</div>


    <div class="more">
        <h3><span>See</span> All<span id="arrow">&#8594</span></h3>

    </div>
   <hr>
    <div class="about-customers">
        <h1>What our Esteemed customers has to say about us.</h1>
    </div>
    <div class="feedback">
        <div class="customers">
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>"The most<br>efficient way to<br>get fresh<br>produce"</p>
            <div class="pics">
                <img src="./images/Rectangle 11.png" alt="mkulima">
                <p id="name">Rebbeca Mkulima</p>
            </div>
        </div>
        <div class="customers">
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>"Connecting rural<br>to urban through<br>business" </p>
            <div class="pics">
                <img src="./images/Rectangle 11-1.png" alt="mkulima">
                <p id="name">John doe</p>
            </div>
        </div>

        <div class="customers">
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>"Connecting rural<br>to urban through<br>business" </p>
            <div class="pics">
                <img src="./images/Rectangle 11-2.png" alt="mkulima">
                <p id="name">Lavington dwellers</p>
            </div>
        </div>
    </div>

    <div class="more">
        <h3><span>Read</span> More <span id="arrow">&#8594</span></h3>
    </div>

<!-- Email subscription -->
    <div class="about-email">
        <h1>We'd like to keep you in touch</h1>
        <p>Subscribe to our newsletter</p>
        <span><input type="email" placeholder="Enter your Email address"><button type="submit" id="button">Subscribe</button></span>

    </div>

    

    <!-- about footer -->

    <div class="about-us">
        <div class="about-app">
            <p id="logo">AgriPlus</p>
            <p>Quality Farn produce through<br> buying and selling</p>
          <div class="icons">
              <i class='bx bxl-facebook-circle'></i>
              <i class='bx bxl-instagram' ></i>
          </div>
            <h2>Get the app</h2>
            <div class="images">
                <img src="https://www.bystanderchronicles.com/wp-content/uploads/2019/06/AppStoreBadge.png" alt="">
               <img src="https://www.bystanderchronicles.com/wp-content/uploads/2019/06/GooglePlayBadge1.png" alt="">
           </div>
           
        </div>
        <div class="company">
            <h2>Company</h2>
            <ul>
                <li>About</li>
                <li>Product</li>
                <li>contact Us</li>
            </ul>
        </div>
        <div class="products">
            <h2>Products</h2>
            <ul>
                <li>Diary</li>
                <li>Cereals</li>
                <li>Vegetable & Fruits</li>
                <li>More.....</li>
            </ul>
        </div>

        <div class="others">
            <h2>Others</h2>
            <ul>
                <li>FAQs</li>
                <li>Terms of services</li>
                <li>Privacy and policy</li>
            </ul>
        </div>
           
    </div>
   

</body>

</html>