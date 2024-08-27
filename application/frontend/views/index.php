<?php
$course = $this->input->get('segment');
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
?>
<!-- adding owl.carousel.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
    integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- adding owl.theme.default.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* Your existing styles */
.pt-5 {
    padding-top: 5px;
}

.logo-content {
    text-align: center;
}

.logo-slider {
    width: 100%;
    overflow: hidden;
}

.logo-slide-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    flex: 0 0 auto;
    margin-right: 15px;
    /* Adjust as needed */
}

.top-brands img {
    max-width: 100%;
    height: auto;
}

/* Responsive styles for smaller screens */
@media (max-width: 768px) {
    .pt-5 {
        padding-top: 10px;
        /* Adjust as needed */
    }

    .logo-content h2 {
        font-size: 1.5em;
        /* Adjust as needed */
    }

    .logo-slide-track {
        flex-wrap: nowrap;
        height: 176px
    }

    .top-brands img {

        max-width: 100%;

        /* Adjust as needed */
    }

    .how-section1 .subheading {
        font-size: 18px;

    }

    .img-sub-heading {
        font-size: 16px;
    }
}

@media (min-width: 786px) and (max-width: 1024px) {
    .img-sub-heading {
        font-size: 16px;
    }



    .how-section1 .subheading {
        font-size: 16px;

    }
}
</style>


<!--banner start-->
<!-- <div class="banner">
    <div class="container pt-5">
        <h1>Got something to say?</h1>
        <h1>We Are Here to Listen..</h1>
        <p class='w-50 text-dark'>In our educational world, knowledge meets technology. Discover 'Expert Insights,'
            'Side-by-Side' comparisons, 'User Experiences,' and 'Issues & Solutions.' Your guide to 'Top-Rated'
            resources, a 'Resource Hub' for all things education, 'Trends & Analysis,' 'Student Stories,' 'Educational
            Choices,' and 'In-Depth Info.' Join us on a journey to elevate your learning experience!</p>
        <?php if ($this->session->userdata('user_id')) { ?>
        <a href="<?php echo base_url(); ?>write-a-review?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
            class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a
            review
        </a>
        <?php } else { ?>
        <a href="javascript:void(0)" class="banner-btn" data-bs-effect="effect-scale" data-bs-toggle="modal"
            data-bs-target="#login-button">
            <img src="<?php echo base_url(); ?>assets/images/review-icon2.png" alt="">Write a review
        </a>
        <?php } ?> -->
<!-- <a href="#" class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a review</a> -->
<!-- </div>
</div> -->
<!--banner end-->
<!--Logo Sectiont-->
<!-- imageCarousell -->

<!--* Start of BAnner Section  -->
<?php $res_banner = get_banner_images(); ?>
<div id="imageCarousel" class="carousel slide carousel-fade" data-ride="carousel" style="max-height: 600px; margin: 0 auto;">
    <div class="carousel-inner">
        <?php
        if($res_banner)
        {
            $i=1;
            foreach($res_banner as $b)
            {
                if($i==1)
                {
                 ?>
        <div class="carousel-item active">
            <img src="<?php echo base_url(); ?>uploads/banner/<?php echo $b->home_slider_image; ?>"
                class="d-block w-100" alt="Image 1" style="max-height:500px; width: auto; object-fit:cover;">
        </div>
        <?php
            }
            else{
                    ?>
        <div class="carousel-item ">
            <img src="<?php echo base_url(); ?>uploads/banner/<?php echo $b->home_slider_image; ?>"
                class="d-block w-100" alt="Image 1" style="max-height:500px; width: auto; object-fit:cover;">
        </div>
        <?php
            }
            $i++;
        }
        }
        ?>

        <!-- <div class="carousel-item">
            <img src="https://placekitten.com/800/402" class="d-block w-100" alt="Image 3"
                style="max-height:500px; width: auto;object-fit:cover;">
        </div> -->
    </div>
    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--* End of BAnner Section  -->

<div class="pt-5 logo-content brand-align">
    <h2>Top Brands</h2>
</div>

<?php 
 $resp_getall_brand = get_all_brand();
?>

<div class="logo-slider">
    <div class="logo-slide-track">
        <?php
        if ($resp_getall_brand) {
            foreach ($resp_getall_brand as $r) {
                
        ?>
        <div class="slide top-brands text-center">
            <div class="image-container">
                <img src="<?php echo base_url(); ?>uploads/brand/<?php echo $r->brand_image; ?>" alt=""
                    class="img-fluid">
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>




<!--End Logo Sectiont-->

<div class="content content-bg">
<div class="pt-5 logo-content brand-align">
    <h2>Segment</h2>
    
</div>
    <style>
    .container {
        position: relative;
    }

    .arrow-mark {
        position: absolute;
        bottom: 10px;
        right: 10px;
        font-size: 30px;
        color: white;
        padding: 0px 5px 0px 0px;
    }

    .card-img-top {
        position: relative;
        height: 200px;
        object-fit: cover;
        object-position: center;
    }

    .card-body {
        position: relative;


    }

    .card-title {
        position: absolute;
        bottom: 10px;
        left: 10px;
        margin-bottom: 0;
        font-size: 23px;
        color: white;
        border-radius: 10px;
        font-weight: bold;
        text-align: left;
        padding-left: 5px;
        padding-bottom: 5px;
    }

    .card {
        transition: all .2s ease;
        border: 2px solid #ddd;
        height: 280px;
        /*width: 350px;*/
        /*border-radius: 20px;*/
        border: 1px solid #979797;
        background: none;
        transition: 0.3s ease, border 0.3s ease, box-shadow 0.3s ease;


    }

    .card:hover {
        transform: scale(1.03);
        background: white;
        border: none;
        box-shadow: 0px 3px 4px 0px #979797;

    }
    </style>
   <!-- <div class="container">
        <div class="row justify-content-center">
            <?php
            
            $class_records_count = count($segment_record);
            if ($class_records_count > 0) {
                foreach ($segment_record as $class) { ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card text-center">
                    <div class="card-img-top card-img-size img-size mt-5">
                        <?php echo $class->segment_img; ?>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><?php echo $class->segment_name; ?></h5>
                        <p class="card-text" style="text-align: left;">Some quick example text to build on the card
                            title and make up the bulk of
                            the card's content.</p>
                        <a href="<?php echo base_url(); ?>?segment=<?php echo $class->segment_name; ?>" class="mt-auto">
                            <div class="arrow-mark">&#8594;</div>
                        </a>

                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div> -->
</div>


<!-- veena -->

<div class="content content-bg pt-5 pb-5">

  
    
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $class_records_count = count($segment_record);
            if ($class_records_count > 0) {
                foreach ($segment_record as $class) { 
                    ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <input type ="hidden" value = "<?php echo $class->id ?>" class="segment_id">
            <a href="<?php echo base_url(); ?>?segment=<?php echo $class->segment_name; ?>" class="segment-link mt-auto">
                <div class="card text-center" style="background-image: url('<?php echo base_url(); ?>assets/images/<?php echo $class->segment_img; ?>'); background-size: cover;">

               
                    <div class="card-img-top card-img-size img-size mt-5 d-flex justify-content-center align-items-center"
                        style="height: 50%; width: 100%; filter: invert(100%) sepia(100%) saturate(10000%) hue-rotate(20deg);">
                        <?php //echo $class->segment_img; ?>
                    </div> 
                    <div class="card-body d-flex flex-column justify-content-center card-background">
                        <h5 class="card-title "><?php echo $class->segment_name; ?></h5>
                            <div class="arrow-mark">&#8594;</div>
                    </div>
                </div>
                </a>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>





<!-- -------------------------------------- -->
<?php $courseid = $this->input->get('segment'); ?>
<!--start-->
<div class="all-course-box1">
    <div class="course-inner-row">
        <div class="course-right">
            <?php if (!empty($courseid)) { ?>
            <?php
                $resp_get_brand = getseg_brand_list($courseid);
                
                if ($resp_get_brand) {
                    ?>
            <!-- Popular Brands Section -->
            <div class="course-row article-section" id="Popular-Brands">
                <div class=" text-center">
                    <h2>Popular Brands</h2>
                    <p>Got the course, but worried about the brand?<br /> Read about all brands and their offerings
                        here.</p>
                </div>
                <div class="container pt-5 card-container" id="brandCard">
                    <div class="d-block d-md-flex row ">
                        <?php foreach ($resp_get_brand as $brand) { ?>
                        <div class=" col-sm-12 col-xl-3 col-lg-4 mb-3">
                            <div class="card brandCard">
                                <img class="card-img-top"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo $brand->brand_image; ?>"
                                    alt="<?php echo $brand->brand_name; ?>">
                                <div class="card-body text-center ">
                                    <h5 class="card-title" style = "overflow:hidden;text-overflow: ellipsis; white-space: nowrap;"><?php echo $brand->brand_name; ?></h5>
                                    <div class="popular-star-rating m-2">
                                        <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <hr>
                                    <a  href="<?php echo base_url(); ?>/all-product?segment=<?php echo $course; ?>&brand=<?php echo $brand->product_brand; ?>" style="text-decoration:none; ">
                                        <div class="view-program-font viewButton">View Brand</div>
                                    </a>
                                    <!-- <p class=" card-text rating-number">
                                        <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2
                                    </p> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center m-5">
                  <!--  <a href="<?php echo base_url(); ?>brands" class="btn btn-primary btn-select">VIEW ALL BRANDS</a> -->
                </div>
            </div>
            <?php } ?>
            <?php
                $resp_get_course = getseg_course_list($courseid);
                if ($resp_get_course) {
                    ?>
            <!-- Popular Courses Section -->
            <div class="course-row article-section" id="Popular-Courses">
                <style>
                .cntr {
                    max-width: 100vw;
                    margin: 0 auto;
                  /*  padding: 20px;*/
                    position: relative
                }

                .crd-cntr {
                    display: flex;
                    overflow-x: hidden;
                    scroll-snap-type: x mandatory;
                }

                .crd {
                    flex: 0 0 24%;
                    /* To show 4 cards per row */
                    /* margin: 0 5px 0 0; */
                    border: 1px solid #ccc;
                  /*  border-radius: 8px;*/
                    background-color: #fff;
                    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.01);
                    

                }

                .crd-bdy {
                  /*  padding: 20px;*/
                    text-align: center;
                }

                #prevBtn {
                    position: absolute;


                    top: 50%;
                    left: 0px
                }

                #nextBtn {
                    position: absolute;


                    top: 50%;
                    right: 40px
                }

                .btn {
                    padding: 0px;
                    font-size: 16px;
                    border: none;
                    border-radius: 0px;
                    background-color: #007BFF;
                    color: #fff;
                    cursor: pointer;
                }

                .btn:not(:last-child) {
                    margin-right: 10px;
                }
                
                @media (max-width: 768px) {
                    .crd {
        flex-basis: calc(100% - 10px); /* To show 1 card per row on smaller screens */
        margin: 0 0 10px 0; /* Adjust margin for better spacing */
    }

    #prevBtn {
        left: 10px; /* Adjust left position for better alignment */
    }

    #nextBtn {
        right: 10px; /* Adjust right position for better alignment */
    }
}

                </style>
                <div class=" container course-section-title text-center">
                    <h2>Popular Courses</h2>
                    <p>Got the course, but worried about the brand?</p>
                </div>

                <div class=" cntr">
                    <div class="crd-cntr">
                        <?php foreach ($resp_get_course as $r) { ?>
                        <div class="crd">
                            <div class="crd-bdy brandCard">
                                <img class="card-img-top" style=""
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo $r->brand_image; ?>"
                                    alt="<?php echo $r->product_name; ?>">
                                <h5 class="crd-ttl pt-3" ><?php echo $r->product_name; ?></h5>
                                <div class="popular-star-rating m-2">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <i
                                        class="fa fa-star<?php echo ($r->product_rating >= $i) ? ' text-yellow' : ''; ?>"></i>
                                    <?php } ?>
                                </div>
                                <hr>
                                <a href="<?php echo base_url(); ?>review?course=<?php echo $r->product_id; ?>&segment=<?php echo $course; ?>"
                                        style="text-decoration:none; ">
                                        <div class="view-program-font viewButton">
                                            View Program
                                        </div>
                                    </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="btn-cntr">
                        <div id="prevBtn" class=""><img src="uploads/left.png" alt="" style="border-radius:100% ">
                        </div>
                        <div id="nextBtn" class=""><img src="uploads/right.png" alt="" style="border-radius:100%"></div>
                    </div>

                    <script>
                    const cardContainer = document.querySelector('.crd-cntr');
                    const prevBtn = document.getElementById('prevBtn');
                    const nextBtn = document.getElementById('nextBtn');
                    let scrollPosition = 0;
                  
                    const updateScrollPosition = () => {
            const visibleCards = Math.floor(cardContainer.offsetWidth / document.querySelector('.crd-bdy').offsetWidth);
            const totalCards = cardContainer.children.length;
            scrollPosition = Math.min(scrollPosition, totalCards - visibleCards);
            cardContainer.scroll({
                left: scrollPosition * document.querySelector('.crd-bdy').offsetWidth,
                behavior: 'smooth'
            });
        };

        prevBtn.addEventListener('click', () => {
            scrollPosition = Math.max(0, scrollPosition - 1);
            updateScrollPosition();
        });

        nextBtn.addEventListener('click', () => {
            const cardWidth = document.querySelector('.card').offsetWidth;
            const visibleCards = Math.floor(cardContainer.offsetWidth / cardWidth);
            const totalCards = cardContainer.children.length;
            const maxScrollPosition = totalCards - visibleCards;
            if (scrollPosition < maxScrollPosition) {
                scrollPosition = Math.min(scrollPosition + 1, maxScrollPosition);
            } else {
                // If at the end, loop back to the beginning
                scrollPosition = 0;
            }
            updateScrollPosition();
        });

        window.addEventListener('resize', updateScrollPosition);
        updateScrollPosition();
                    </script>
                </div>

                <div class="container pt-5" id="brandCard">
                    <div class=" d-block d-md-flex row">
                        
                        <?php foreach ($resp_get_course as $r)  { 
                          
                            
                            ?>
                        <div class="col-sm-12 col-xl-3 col-lg-4 mb-3">
                            <div class="card brandCard">
                                <img class="card-img-top"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo $r->brand_image; ?>"
                                    alt="<?php echo $r->product_name; ?>">
                                <div class="card-body text-center">
                                    <h5 style ="overflow:hidden;text-overflow: ellipsis; white-space: nowrap;"><?php echo $r->product_name; ?></h5>
                                    <div class="popular-star-rating m-2">
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <i
                                            class="fa fa-star<?php echo ($r->product_rating >= $i) ? ' text-yellow' : ''; ?>"></i>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <a href="<?php echo base_url(); ?>review?course=<?php echo $r->product_id; ?>&segment=<?php echo $course; ?>"
                                        style="text-decoration:none; ">
                                        <div class="view-program-font viewButton">
                                            View Program
                                        </div>
                                    </a>
                                    <!-- <p class="card-text rating-number">
                                        <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2
                                    </p> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center m-5">
                 <!--   <a href="<?php echo base_url(); ?>course" class="btn btn-primary btn-select">VIEW ALL
                        COURSES</a>  -->
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>




<!-- Ends Popular Brands --->

<!--Choose Course Sectiont-->


<!-- **** Choose Course Section  **** --->


<div class="container">
    <style>
         @media (max-width: 550px) {
            .row {
                flex-direction: row;
            }

            .how-img {
                order: unset;
            }

            .course-section-title .row:nth-child(even) .how-img {
                order: -1;
            }
        }
        </style>
    <div class="course-section-title ">
        <div class="row bg-color-review">
            <div class="col-12 col-sm-3 col-lg-6 how-img">
                <img src="<?php echo base_url(); ?>assets/images/review_v1.png" class="rounded-circle img-fluid image-set"
                    alt="" style="width: 400px;" />
            </div>
            <div class="col-12 col-sm-9 col-lg-6 course-section-title" id="review-section">
                <h2>Review</h2>
                <h3 class="subheading mb-2"> Find the Truth, Make the Right Choice</h3>
                <h3 class="subheading1 "> Transparent Reviews, Tailored for You</h3>
                <p class="text-muted img-sub-heading">Discover authentic insights from fellow learners. Select your filters and access precise reviews on brands, courses, schools, colleges, and more. With reviews in text, voice, or video formats, make informed decisions swiftly. Gauge ratings, see the number of reviewers, and find results in seconds. Join a community of learners, sharing experiences to empower your choices.</p>
                <a href="review" class="img-btn-explore" data-bs-toggle="modal"  data-id = "review"
                    data-bs-target="#segment-button">EXPLORE</a>
                 
            </div>
        </div>
        <div class="row bg-color-complain mt-3">
            <div class="col-md-8 col-sm-9 col-lg-6 " id="complain-section">
                <h2>Complain</h2>
                <h3 class="subheading mb-2">Speak Up, Get Justice</h3>
                <h3 class="subheading1">Your Voice, Your Justice</h3>
                <p class="text-muted img-sub-heading">Feel deceived? Raise your voice against unfair practices. Lodge complaints against companies or brands that betray your trust. Your complaints are heard, ensuring justice and transparency. We amplify your voice across all channels, leveraging the power of networking to resolve your grievances effectively</p>
                <a href="complain" class="img-btn-explore" data-bs-toggle="modal" data-id = "complain"
                    data-bs-target="#segment-button" >EXPLORE</a>
                    
            </div>
            <div class="col-md-4 col-sm-3 col-lg-6 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cmp-img.jpg" class="rounded-circle img-fluid image-set" alt="" />
            </div>
        </div>
        <div class="row bg-color-comparison mt-3">
            <div class="col-md-4 col-sm-3 col-lg-6 how-img">
                <img src="<?php echo base_url(); ?>assets/images/1ct.webp" class="rounded-circle img-fluid image-set"
                    alt="" />
            </div>
            <div class="col-md-8 col-sm-9 col-lg-6" id="comparision-section">
                <h2>Comparison</h2>
                <h3 class="subheading mb-2">Choose Wisely, Decide Confidently</h3>
                <h3 class="subheading1">Informed Decision-Making through Detailed Comparisons</h3>
                <p class="text-muted img-sub-heading">Struggling to decide between options? Our comparison tool simplifies the process. Compare brands, courses, products, and services across various parameters to make informed decisions. From pricing and features to user reviews and ratings, access comprehensive insights for confident choices. Make your comparisons with clarity and ease.
                </p>
                <a href="#" class="img-btn-explore" data-bs-toggle="modal"
                    data-bs-target="#segment-button">EXPLORE</a>
            </div>
        </div>
        <div class="row bg-color-review mt-3">
            <div class="col-md-8 col-sm-9 col-lg-6" id="counselling-section">
                <h2>Counselling</h2>
                <h3 class="subheading mb-2">Navigate Uncertainty with Confidence</h3>
                <h3 class="subheading1">Expert Guidance, Tailored to You</h3>
                <p class="text-muted img-sub-heading">Feeling lost? Navigate through uncertainties with expert guidance. Receive unbiased counselling to make informed decisions about your educational journey. Tailored to your needs, our counselling services provide clarity and direction. Get advice from our renowned experts, influential YouTubers, bloggers, or even directly from the company or brand of your choice, ensuring comprehensive consideration before joining a course. Empower yourself with personalized support from seasoned professionals.</p>
                <a href="#" class="img-btn-explore" data-bs-toggle="modal"
                    data-bs-target="#segment-button">EXPLORE</a>
            </div>
            <div class="col-md-4 how-img col-sm-3 col-lg-6">
                <img src="<?php echo base_url(); ?>assets/images/cnslng-img.jpg" class="rounded-circle img-fluid image-set"
                    alt="" />
            </div>
        </div>

        <div class="row bg-color-complain mt-3">
            <div class="col-md-4 col-sm-3 col-lg-6 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cohort-study-img.jpeg" class="rounded-circle img-fluid image-set"
                    alt="" />
            </div>
            <div class="col-md-8 col-sm-9 col-lg-6" id="cohort-section">
                <h2>Cohort</h2>
                <h3 class="subheading mb-2">Connect, Learn, Succeed Together</h3>
                <h3 class="subheading1">Collaborative Learning Communities</h3>
                <p class="text-muted img-sub-heading">Don't navigate the learning journey alone. Create your own exclusive rooms based on specific interest areas and connect with like-minded individuals or learners. Whether it's preparing for exams, exploring hobbies, or diving into niche subjects, our cohort feature allows you to create and join rooms tailored to your interests. Collaborate, share insights, and conquer challenges with peers who share your passions. Start building your learning community today, where every room is a gateway to new opportunities and connections.
                </p>
                <a href="#" class="img-btn-explore" data-bs-toggle="modal"
                    data-bs-target="#segment-button">EXPLORE</a>
            </div>
        </div>

        <div class="row mt-3 d-flex flex-sm-row-reverse">
            <div class="col-md-6 col-sm-9 col-lg-6 p-2" id="coupons-section">
                <h2>Group Coupons</h2>
                <h3 class="subheading mb-2">Save Together, Learn Together</h3>
                <h3 class="subheading1">Collective Buying Power, Maximum Discounts</h3>
                <p class="text-muted img-sub-heading">Save big by joining forces with others interested in the same products or services. Our group coupon feature connects remote individuals to avail maximum discounts through collective buying power. Collaborate, negotiate, and unlock exclusive deals with ease. This revolutionary feature is the first of its kind, empowering learners to access the lowest possible fees or prices for any course, program, or product. Start saving together today!
</p>
                <a href="#" class="img-btn-explore" data-bs-toggle="modal"
                    data-bs-target="#segment-button">EXPLORE</a>
            </div>
            <div class="col-md-6 col-sm-3 col-lg-6 how-img p-2">
                <img src="<?php echo base_url(); ?>assets/images/coupons-img.jpg" class="rounded-circle img-fluid image-set                                                                                                                                                                                                         "
                    alt="" />
            </div>
        </div>

    </div>
</div>


<div class="course-section-title ">
    <h2><center>Similar Topics </center></h2>
</div>

<div class="grey-bg grey-light-bg pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4 pb-3">
                <img class="img-fluid" src="<?php //echo base_url(); 
                                                        ?>assets/images/get-in-touch.jpg">
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4 pb-3">
                <img class="img-fluid" src="<?php //echo base_url(); 
                                                        ?>assets/images/get-in-touch.jpg">
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4 ">
                <img class="img-fluid" src="<?php //echo base_url(); 
                                                        ?>assets/images/get-in-touch.jpg">
            </div>

        </div>

    </div>
</div>

</div>
<!--right end-->

</div>
<!--end-->



</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
    integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin = "anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>


 $(document).ready(function() {

    $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    /* here you can set the settings for responsive
       items */
    responsive: {
        0: {
            items: 2
        },
        768: {
            items: 4
        }
    }
});
    $(".segment-link").on("click", function(event) {
        event.preventDefault(); // Prevent the default behavior of the anchor tag
        var href = $(this).attr("href"); // Get the value of the href attribute
        var segmentId = href.split('=')[1]; // Extract the value of segment from the href
        console.log(segmentId); // Output the segment ID to the console (you can do whatever you want with this value)
        window.location="<?php echo base_url();?>review/?segment="+segmentId;
       /* $.ajax({
            url: base_url + 'filter/get_product_id_table',
            dataType: 'json',
            type: 'post',
            data: {
                segment_id: segmentId
            },
            success: function(data) {
               console.log(data.data);
               if(data.status == 1)
               {
                    window.location="<?php echo base_url();?>review/?segment="+segmentId;
               }
               else
               {
                    alert("No data found");
               }

                // $('#city').html('<option value="">Select City</option>');
            }
           
        });*/
    });
    /*$('.img-btn-explore').on("click", function(event) {
        var info = $(this).val();
        var newURL = window.location.protocol + '//' + window.location.host + window.location.pathname + info;
        window.history.pushState({ path: newURL }, '', newURL); 
        

    $('.seg-links').on("click", function(event) {
       var seg_name= $(this).data('value');
       var fullURL = window.location.href;
       var urlParams = new URLSearchParams(window.location.search);
       urlParams.set(segment, seg_name);  
       //console.log(fullURL); 
     //  window.location.href = window.location.protocol + '//' + window.location.host + window.location.pathname + '?' + urlParams.toString();
    });
        var modal = new bootstrap.Modal(document.getElementById('segment-button'));
        modal.show();
    });*/
}); 

</script>


<!--content end-->