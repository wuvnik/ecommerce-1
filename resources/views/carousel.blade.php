<!DOCTYPE html>
<html>

<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CS425- Bootstrap Carousel with captions</title>
  <!-- Latest compiled and minified Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h2 class="text-center" style="background:#ff7e03 ; color: white;  padding: 7px;">See the Latest Products Now</h2>
    <div id="carouselExample" class="carousel slide w-100" data-bs-ride="carousel" data-bs-interval="3000">
   <div class="carousel-indicators">
     <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
     <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
     <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
   </div>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img class="d-block w-100" src="https://www.cs.ucy.ac.cy/courses/EPL425/labs/LAB10/slide1.jpg" alt="First slide">
       <div class="carousel-caption d-none d-md-block">
          <h5>Social Facilities Center</h5>
          <p>University Campus</p>
       </div>
     </div>
     <div class="carousel-item">
       <img class="d-block w-100" src="https://www.cs.ucy.ac.cy/courses/EPL425/labs/LAB10/slide2.jpg" alt="Second slide">
       <div class="carousel-caption d-none d-md-block">
          <h5>Anastasios G. Leventis</h5>
          <p>University House</p>
       </div>
     </div>
     <div class="carousel-item">
       <img class="d-block w-100" src="https://www.cs.ucy.ac.cy/courses/EPL425/labs/LAB10/slide3.jpg" alt="Third slide">
       <div class="carousel-caption d-none d-md-block">
         <h5>Faculty of Engineering</h5>
         <p>University Campus</p>
      </div>
     </div>
   </div>
   <button class="carousel-control-prev" data-bs-target="#carouselExample" type="button" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" data-bs-target="#carouselExample" type="button" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Next</span>
   </button>
  </div>
  </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>

<style>
    img {
  height: 350px; 
  object-fit: cover;
}
</style>