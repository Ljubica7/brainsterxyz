<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5 mx-5">
        <h2>Add Post</h2>
        <p>Create a post</p>
        <form action="<?php echo URLROOT; ?>/posts/add" method="POST">
            <div class="form-group">
                <label for="image">Image(link): <sup>*</sup></label>
                <input type="text" name="image" class="form-control form-control-lg <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>">
                <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle: <sup>*</sup></label>
                <input type="text" name="subtitle" class="form-control form-control-lg <?php echo (!empty($data['subtitle_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subtitle']; ?>">
                <span class="invalid-feedback"><?php echo $data['subtitle_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="body">Body: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>           
            <input type="submit" class="btn btn-success" value="Submit">     
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>