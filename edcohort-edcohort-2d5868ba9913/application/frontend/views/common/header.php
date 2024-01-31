<?php
$segment1 = $this->uri->segment(1);
$segs = $this->uri->segment_array();
$title=$this->url->page_title($segment1);
$meta_keyword=$this->url->meta_key($segment1);
$meta_description=$this->url->meta_desc($segment1);
$canonical=$this->url->canonical($segment1);
if($segment1=="")
{
  $title=$this->url->page_title($this->url->slug(1));
  $meta_keyword=$this->url->meta_key($this->url->slug(1));
  $meta_description=$this->url->meta_desc($this->url->slug(1));
  $canonical=$this->url->canonical($this->url->slug(1));
}
else if($segment1==$this->url->slug(15))
{
  $product_name = @$records['0']->product_name;
  $title = ($records['0']->product_meta_title) ? $records['0']->product_meta_title : $product_name;
  $meta_keyword = (@$records['0']->product_meta_keyword) ? $records['0']->product_meta_keyword : $product_name;
  $meta_description = (@$records['0']->product_meta_description) ? $records['0']->product_meta_description : $product_name;
}
else if($segment1==$this->url->slug(13))
{
  $segment = end($segs);
  $category_seo = $this->common_model->categoryMeta($segment);
  $category = $segment;
  $cat_title = @strtr($category, '-', ' ');
  $title = (@$category_seo['0']->category_meta_title) ?  : $cat_title;
  $meta_keyword = (@$category_seo['0']->category_meta_keyword) ?  : $cat_title;
  $meta_description = (@$category_seo['0']->category_meta_description) ?  : $cat_title;
  $canonical = (@$category_seo['0']->category_canonical) ?  : '';
}
$seg_title = @strtr($segment1, '-', ' ');
if(empty($title)){
  $title = $seg_title;
}
if(empty($meta_keyword)){
  $meta_keyword = $seg_title;
}
if(empty($meta_description)){
  $meta_description = $seg_title;
}
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="author" content=""/>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keyword; ?>">
    <link rel="canonical" href="<?php echo $canonical; ?>" />
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" />
    <!-- Title -->
    <title> <?php if($title!=""){ echo ucwords($title); } ?></title>
    
    <!--font css-->
    <link href="<?php echo base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!--plugin css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Rich Editor -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css'>
    
    
    <!--custom css-->
    <link href="<?php echo base_url(); ?>assets/css/style.css?v=2" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
  <script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"
    var segment_1 = "<?php echo $this->uri->segment(1); ?>"   
  </script>  
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=65042bdf0650df0019078701&product=inline-share-buttons&source=platform" async="async"></script>
  
</head>
<body>
  <?php $url=$this->uri->segment(1); ?>
  <?php $user_id = $this->session->userdata('user_id'); ?>
  <?php $user_fullname = $this->session->userdata('user_fullname'); ?>
  <?php $jewelry_menu = $this->session->userdata('jewelry_menu'); ?>
  <?php  $segment_1=$this->uri->segment(1); ?>

  <script type="text/javascript">
 $(document).ready(function() {

    if(segment_1!="course" ){    

      $("#page-loader").fadeOut();

    }

  });
  </script>


	<!--Loader-->
    <div id="global-loader" style="display:none">
      <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="img">
    </div><!--/Loader-->
    
    <!--wrapper start-->
    <div class="wrapper">
    
        <!--header start-->
        <div class="header d-flex justify-content-between align-items-center">
        
            <!--logo-->
            <div class="logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Edcohort"></a>
            </div>
        	<?php //print_ex($type_records); ?>
            <!--Search-box-->
            <div class="header-search d-flex">
                <div class="dropdown review-dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Review
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <?php if(!empty($type_records)){ ?>
                      <?php foreach($type_records as $type){ ?>
                      	<li><?php echo $type->title; ?></li>
                      <?php } } ?>
                    </ul>
                  </div>
                  <div class="search-box">
                    <input type="text" placeholder="Search for Brands, Exams" class="search-input">
                    <input type="submit" class="search-submit">
                  </div>
            </div>
        
            <!--header right-->
            <div class="header-right">
              <?php if(empty($user_id)){?>
                <a href="<?php echo base_url(); ?>" class="sign-btn" data-bs-toggle="modal" data-bs-target="#signup-button">Sign Up</a>
                <a href="<?php echo base_url(); ?>" class="login-btn" data-bs-toggle="modal" data-bs-target="#login-button">Log In</a>
                  <?php }else{ ?>
                    <div class="user-info-box">
                        <h3><?php echo $user_fullname; ?></h3>
                        <a href="<?php echo base_url(); ?>logout">Logout</a>
                        <div class="user-photo"></div>
                    </div>
                <?php } ?>
            </div>
        
        
        </div>
        <!--header end-->
   
    
   