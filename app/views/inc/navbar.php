<nav class="navbar navbar-expand-lg navbar-dark navbar-color">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img src="https://lh3.googleusercontent.com/proxy/s-rPg9ArqmoYcVTu45EyS3S8iKC_MuOfHYFzhVwJEKza3zDu0aYvJskH_eK6gLns1wsu5onyPqTadikAIbDu0ClHmD0sct9z5vgcB_ZKp7o9CZSiFis-YDKIRh5Wsy5t" alt="brainster logo" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">    
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link text-dark text-capitalize text-center" href="<?php echo URLROOT; ?>">Академија за </br> програмирање</a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link text-dark text-capitalize text-center" href="<?php echo URLROOT; ?>/pages/about">Академија за </br> маркетинг</a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link text-dark pt-4" href="<?php echo URLROOT; ?>">Блог</a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link text-dark text-capitalize text-center" href="<?php echo URLROOT; ?>/pages/about">Вработи наши </br> студенти</a>
                </li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                <li class="nav-item mx-2">
                    <a class="nav-link text-dark pt-4" href="<?php echo URLROOT; ?>/users/logout">Logout </a>
                </li>         
                <?php endif; ?>
            </ul>   
        </div>
    </div>
</nav>
