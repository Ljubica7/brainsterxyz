<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        </div>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title">
                <?php echo $post->title; ?>
            </h4>
            <div class="bg-light p-2 mb-3">
                written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
            </div>
            <p class="card-text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>

                <?php if ($data['post']->user_id == isLoggedIn()) : ?>
                    <hr>
                    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>

                    <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="POST">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                <?php endif; ?>

        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>