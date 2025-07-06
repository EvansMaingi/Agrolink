<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  
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

.main {
    display: flex;
    align-items: center;
    /* justify-content: space-between; */
    height: 100vh; 
    background-color: none;
    
}

.farm {
    
    width: 100%;
    height: 100%;
    margin-top: 90px;
    overflow: hidden;
}


.farm img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image fills the container without distortion */
    display: block;
    
}

.farm::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 640px;
    background: rgba(0, 0, 0, 0.2); /* Black overlay (adjust 0.4 for darkness) */
}



.smallcont{
    position: absolute;
    top: 150px;
    left: 100px;
    width: 600px;
    height: 200px;
    background-color: rgba(128, 128, 128, 0.16);
    overflow: hidden;
    align-items: center;
    border-radius: 5px;
    /z-index: 1;/
    padding: 20px;
}

.smallcont h1{
    color: white;
    font-weight: bold;
    text-align: justify;
    font-size: 3.0rem;
    margin-right: 40px;
}

.smallcont p{
    color: white;
    font-style: italic;
    text-align:left;
    /margin-left: 130px;/
    font-size: 1.2rem;
    line-height: 1.5;
}

.Explore {
    position: absolute;
    top: 350px;  
    color: #fff;
    font-weight: bold;
    left: 100px;
    transition: transform 0.3s, box-shadow 0.3s;
    /font-size: 2.0rem;/
}

.Explore:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
.Explore a[href="#Discover"]{
    background-color: green;
    color:white;
    text-decoration: none;
    border-radius: 5px;
    margin: 0 15px;
    padding: 8px 12px;

}

.about-section {
    display: flex;
    align-items: center;
    width: 100%;
    margin: 0 auto;
    padding: 80px 20px;
    gap: 60px;
    background: linear-gradient(to right, #f9f9f9 50%, white 50%);
}

/* Image Section */
.about-image {
    flex: 1;
    min-width: 450px;
    height: 500px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    transform: rotate(-2deg);
    transition: transform 0.3s ease;
}

.about-image:hover {
    transform: rotate(0deg) scale(1.02);
}

.about-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

/* Content Section */
.about-content {
    flex: 1;
    padding: 40px;
}

.about-title {
    font-size: 2.5rem;
    line-height: 1.3;
    color: #2a7d2e;
    margin-bottom: 25px;
    font-weight: 700;
}

.highlight {
    color: #1e5a21;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

.divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, #2a7d2e, #5cb85c);
    margin: 20px 0;
    border-radius: 2px;
}

.about-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #444;
    margin-bottom: 30px;
}

.cta-button {
    background: linear-gradient(to right, #2a7d2e, #5cb85c);
    color: white;
    border: none;
    padding: 15px 35px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(42, 125, 46, 0.3);
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(42, 125, 46, 0.4);
}

.simple-contact {
    /*max-width: 500px;*/
    width: 100%;
    margin: 40px auto;
    padding: 30px;
    text-align: center;
    background: linear-gradient(to right, #2a7d2e, #5cb85c);

    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.simple-contact h2 {
    color: #2a7d2e;
    margin-bottom: 15px;
    font-size: 1.8rem;
}

.contact-divider {
    width: 60px;
    height: 3px;
    background: #5cb85c;
    margin: 0 auto 25px;
    border-radius: 3px;
}

.contact-methods {
    margin-bottom: 30px;
}

.contact-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin: 20px 0;
    font-size: 1.1rem;
    color: #333;
}

.contact-item i {
    color: #2a7d2e;
    font-size: 1.3rem;
    width: 25px;
}


.social-links {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.social-links a {
    color: white;
    background: #2a7d2e;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
    text-decoration: none;
}

.social-links a:hover {
    background: #1e5a21;
    transform: translateY(-3px);
}

.service-header {
    text-align: center;
    margin: 60px 0;
}

.service-header h1 {
    font-size: 2.5rem;
    color: #2a7d2e;
    margin-bottom: 10px;
}

.header-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(to right, #2a7d2e, #5cb85c);
    margin: 20px auto;
    border-radius: 2px;
}

.service-header p {
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 40px;
}







</style>

<body>
    <div>
    

        @include('home.css')

</div>

    </div>

   
    

    <div class="main"  id="farm">
        <div class="farm">
            <img src="images/2.jpg" alt="alt">
            <div class="smallcont">
                <h1>Welcome To AgroLink</h1><br>
                <p>Empowering Agriculture, One Listing at a Time</p> 
            </div>
            <div class="Explore">
                <a href="#Discover" class="nDiscover">Discover More</a>
            </div>

        </div>
            

    </div>

    <div class="about-section" id="about-section">
        <div class="about-image">
            <img src="images/1.jpg" alt="Farmers using AgroLink platform">
        </div>
        <div class="about-content">
            <h2 class="about-title">
                <span class="highlight">AgroLink</span> connects farmers and landowners 
                with buyers through a simple, reliable platform
            </h2>
            <div class="divider"></div>
            <p class="about-description">
                We empower farmers to reach wider markets by listing land and produce directly online. 
                Our platform eliminates middlemen, making transactions faster, fairer, 
                and more accessible for everyone.
            </p>
            <button class="cta-button">Get Started</button>
        </div>
    </div>



    



   

    <div class="service-header">
        <h1>Here are the listings</h1>
        <div class="header-divider"></div>
        <p>Discover our premium land and agricultural options</p>
    </div>

    <div class="popular">


     <div class="about-images" id="Discover">
  @foreach($products as $product)
    <div class="image">
        <img src="{{ asset('images/' . $product->image) }}">
        <h3>{{ $product->title }}</h3>
        <p>Ksh. {{ $product->price }}</p>
        <a class="btn btn-primary details-btn" href="{{ url('product_details', $product->id) }}">Details</a>
     <a class="btn-star" href="{{ url('add_star', $product->id) }}">★ Star</a>


    </div>
  @endforeach
</div>

<div class="simple-contact" id="simple-contact">
    <h2>Contact AgroLink</h2>
    <div class="contact-divider"></div>
    
    <div class="contact-methods">
        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <span>hello@agrolink.co.ke</span>
        </div>
        
        <div class="contact-item">
            <i class="fas fa-phone"></i>
            <span>+254 578 788 634</span>
        </div>
    </div>
    
    <div class="social-links">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
    </div>
</div>



   

</body>

</html>