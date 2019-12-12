<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron jumbotron-fluid text-center jumbotron-gif">
        <div class="container">
            <h1 class="display-3 text-light"><?php echo $data['title']; ?></h1>
            <p class="lead text-light"><?php echo $data['description']; ?></p>
        </div>
    </div>
<!-- start -->
  
    <div class="container py-5">
    <div class="row">

    <?php foreach($data['posts'] as $post) : ?>
        <div class="col-md-4 card-animation">
          <div class="card mb-4 shadow-sm">
               
                <img src="<?php echo $post->image; ?>" alt="" class="bd-placeholder-img card-img-top card-image-size mx-auto my-3">

                <h2 class="card-title text-center title-text text-capitalize"> <?php echo $post->title; ?> </h2>
                <h4 class="text-center title-text text-capitalize"> <?php echo $post->subtitle; ?> </h4>

                <div class="card-body">
                    <p class="card-text card-height text-justify"><?php echo $post->body; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                    
                        <div class="btn-group">
                        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-sm btn-outline-secondary">More</a>       
                        </div>

                        <small class="text-muted">written on <?php echo $post->postCreated; ?></small>
                    </div>
                </div>
          </div>
        </div>  
    <?php endforeach; ?>

    </div>
    </div>
   
<?php require APPROOT . '/views/inc/footer.php'; ?>