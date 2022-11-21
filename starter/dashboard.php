<?php
    $title  = 'Dashboard' ;
    include 'scripts.php' ;
    include_once 'head.php' ;
    include_once 'sidebar.php' ;
    if(!isset($_SESSION['welcomeBack'])){
        header("location: signIn.php");
    }

?>

        <!-- <h2 class="mt-1 text-center">👋Welcome back ** !</h1> -->
        <?php if(isset($_SESSION['welcomeBack'])) : ?> 
                <div class="mt-2 ms-4 h4">
                    <?php echo $_SESSION['welcomeBack']; ?>
                </div>
               
        <?php endif ?>

        <h3 class="titles">Dashboard</h3>
        <div class="statistics">
            <div class="statistics_box d-flex justify-content-start align-items-center">
                <i class="fa fa-users"></i>
                <div>
                    <h3><?php countUsers() ?></h3>
                    <p class="text-muted h5">New users</p>
                </div>
            </div>

            <div class="statistics_box d-flex justify-content-start align-items-center">
                <i class="fa fa-book"></i>
                <div>
                    <h3><?php countBooks() ?></h3>
                    <p class="text-muted h5">Total books</p>
                </div>
            </div>

            <div class="statistics_box d-flex justify-content-start align-items-center">
                <i class="fa fa-shopping-cart"></i>
                <div>
                    <h3>0</h3>
                    <p class="text-muted h5">Books out</p>
                </div>
            </div>

            <div class="statistics_box d-flex justify-content-start align-items-center">
                <i class="fa fa-dollar"></i>
                <div>
                    <h3>0</h3>
                    <p class="text-muted h5">Earnings</p>
                </div>
            </div>
        </div>
        <div class="statistics2">
            <?php recentBooks() ?>
            <?php recentUsers() ?>
        </div>  
    </section>

    <?php
        include_once 'footer.php' ;
    ?>