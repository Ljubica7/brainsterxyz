<nav class="navbar navbar-expand-lg navbar-dark navbar-color">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img src="public/img/logo.png" alt="brainster logo" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">    
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])) : ?>
                <li class="nav-item">
                    <a class="nav-link text-dark " href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
                </li>         

                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo URLROOT; ?>/users/logout">Logout </a>
                </li>                        
                <?php endif; ?>
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
            </ul>   
        </div>
    </div>
</nav>
