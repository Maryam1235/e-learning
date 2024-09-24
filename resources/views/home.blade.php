<x-layout />
@include('partials.header')

<div class="background" >
</div>

<main>
    <h1 class="moving-text">Welcome to the System</h1>
    
    <!-- slider section -->
    <div class="slider-container">
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
    </div>
    <!-- end slider section -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <!-- Assignments Card -->
            <div class="card card-outline card-info shadow col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book mb-4"></i>
                        <h5 class="mb-3">Assignments</h5>
                        <p>Platform allows lectures to create assignments for students, and students can perform and submit their theory and practical assignments on the platform.</p>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-1 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"></div>

            
            <div class="card card-outline card-info shadow col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe mb-4"></i>
                        <h5 class="mb-3">Online Lectures</h5>
                        <p>Allows students to attend teachers from anywhere, and lecturers can conduct lectures for a large number of students from any location.</p>
                    </div>
                </div>
            </div>

           
            <div class="col-lg-1 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"></div>

            
            <div class="card card-outline card-info shadow col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-file mb-4 "></i>
                        <h5 class="mb-3">Quizzes</h5>
                        <p>The platform enables teachers to upload quizzes,and allows students to take quizzes and submit them within a limited time.</p>
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


