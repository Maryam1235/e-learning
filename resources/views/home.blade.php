<x-layout />
@include('partials.header')

<div class="background" >
</div>

<main>
<br><br><br>
<div class="slider-container">
<div class="col-md-10">
 <div class="card">
        {{-- <div class="card-header">
         <h3 class="card-title">Carousel with captions</h3>
        </div> --}}
<div class="card-body">
<div id="carouselExampleCaptions"   data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/IMG16.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>The teacher is guiding their students around a table, explaining the task at hand with clear instructions.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/IMG3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p> The students are engaged in a practical session of dissecting a rat. They are gathered around lab tables, wearing protective gear such as gloves and lab coats for safety. </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/IMG15.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Kawawa JKT School is located in a serene environment, providing a conducive atmosphere for learning</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/IMG9.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fourth slide label</h5>
        The school offers a comfortable and well-maintained environment for boarding students, with clean and secure hostels.
      </div>
    </div>
     <div class="carousel-item">
      <img src="{{ asset('images/IMG2.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fifth slide label</h5>
        The students are lined up on the parade ground, standing in neat rows and columns, dressed in their school uniforms.
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/IMG6.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Sixth slide label</h5>
        A group of students is in a garden, watering vegetables. <br>They are working together, carefully tending to the plants, ensuring each one gets<br> enough water.
      </div>
    </div>
     <div class="carousel-item">
      <img src="{{ asset('images/IMG17.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Seventh slide label</h5>
        A group of students is in a garden, watering vegetables. They are working together, carefully tending to the plants, ensuring each one gets enough water.
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div>
</div>
</div>
</div>
</div>
    
    <!-- slider section -->
    {{-- <div class="slider-container">
        <div class="image-bar">
            <div class="image-slide active" id="image1">
                <img src="{{ asset('images/IMG17.jpg') }}" alt="Image 1">
                <div class="text-overlay">
                    <p>
                        The text-overlay div wraps the text to place it on top of the image, while the images switch based on the active slide.
                    </p>
                </div>
            </div>
            <div class="image-slide" id="image2">
                <img src="{{ asset('images/IMG16.jpg') }}" alt="Image 2">
                <div class="text-overlay">
                    <p>
                        The teacher is guiding their students around a table, explaining the task at hand with clear instructions.
                    </p>
                </div>
            </div>
            <div class="image-slide" id="image3">
                <img src="{{ asset('images/IMG3.jpg') }}" alt="Image 3">
                <div class="text-overlay">
                    <p>
                        The students are engaged in a practical session of dissecting a rat. They are gathered around lab tables, wearing protective gear such as gloves and lab coats for safety. 
                    </p>
                </div>
            </div>
            <div class="image-slide" id="image4">
                <img src="{{ asset('images/IMG15.jpg') }}" alt="Image 4">
                <div class="text-overlay">
                    <p>
                        Kawawa JKT School is located in a serene environment, providing a conducive atmosphere for learning
                    </p>
                </div>
            </div>
             <div class="image-slide" id="image5">
                <img src="{{ asset('images/IMG6.jpg') }}" alt="Image 4">
                <div class="text-overlay">
                    <p>
                        
                        A group of students is in a garden, watering vegetables. They are working together, carefully tending to the plants, ensuring each one gets enough water
                    </p>
                </div>
            </div>
            <div class="image-slide" id="image6">
                <img src="{{ asset('images/IMG2.jpg') }}" alt="Image 4">
                <div class="text-overlay">
                    <p>  
                        The students are lined up on the parade ground, standing in neat rows and columns, dressed in their school uniforms.
                    </p>
                </div>
            </div>
             <div class="image-slide" id="image7">
                <img src="{{ asset('images/IMG9.jpg') }}" alt="Image 4">
                <div class="text-overlay">
                    <p> 
                        The school offers a comfortable and well-maintained environment for boarding students, with clean and secure hostels.
                    </p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- end slider section -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <!-- Assignments Card -->
            <div class="card card-outline card-info shadow col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4 text-center d-flex flex-column align-items-center">
                        {{-- <i class="fa fa-3x fa-book mb-2"></i> --}}
                        <img src="{{ asset('images/bookIcon.jpeg') }}" class="d-block " style="height:50px; width:50px;" alt="...">
                        <h5 class="mb-3">Assignments</h5>
                        <p class="text-center">Platform allows lectures to create assignments for students, and students can perform and submit their theory and practical assignments on the platform.</p>
                    </div>

                </div>
            </div>

            
            <div class="col-lg-1 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"></div>

            
         
             <div class="card card-outline card-info shadow col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4 text-center d-flex flex-column align-items-center">
                        {{-- <i class="fa fa-3x fa-globe mb-2"></i> --}}
                        <img src="{{ asset('images/globe.jpeg') }}" class="d-block " style="height:50px; width:50px;" alt="...">
                        <h5 class="mb-3">Online Lectures</h5>
                        <p  class="text-center">Allows students to attend teachers from anywhere, and lecturers can conduct lectures for a large number of students from any location.</p>
                    </div>

                </div>
            </div>

           
            <div class="col-lg-1 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"></div>

      
              <div class="card card-outline card-info shadow col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4 text-center d-flex flex-column align-items-center">
                        {{-- <i class="fa fa-3x fa-file mb-2"></i> --}}
                        <img src="{{ asset('images/fileIcon.jpeg') }}" class="d-block" style="height:50px; width:50px;" alt="...">
                        <h5 class="mb-3">Quizzes</h5>
                        <p  class="text-center">The platform enables teachers to upload quizzes,and allows students to take quizzes and submit them within a limited time.</p>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
     <div class="ml-6">
        <form action="{{ route('select.role') }}" method="POST" style="display: inline-block;">
            @csrf
            <button type="submit" name="role" value="teacher" class="button" style="margin: 20px">I am a Teacher</button>
            <button type="submit" name="role" value="student" class="button">I am a Student</button>
        </form>
    </div>
</div>
   
</main>

@include('partials.footer')

<script>
    let currentSlide = 0;
    const images = document.querySelectorAll('.image-slide');

    function showSlide(index) {
        images[currentSlide].classList.remove('active');
        currentSlide = index;
        images[currentSlide].classList.add('active');
    }

    function nextSlide() {
        const nextIndex = (currentSlide + 1) % images.length;
        showSlide(nextIndex);
    }

    setInterval(nextSlide, 3000); // Change slide every 3 seconds
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



