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
                <div class="mt-2 ms-4 text-center h4">
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
                <i class="fas fa-book-open"></i>
                <div>
                    <h3><?php countCategories() ?></h3>
                    <p class="text-muted h5">Categories</p>
                </div>
            </div>

        </div>
        
        <h3 class="titles">Recent books</h3>
        <div class="statistics2">
            <?php recentBooks() ?>
        </div>  
    </section>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(isset($_GET['updateProfileAlert'])) : ?>
      <?php echo '<script> 
                          Swal.fire({
                              title               : "Profile has been updated Successfully",
                              confirmButtonColor  : "#3BCEE5",
                              icon                : "success",
                              iconColor           : "#3BCEE5"  
                          })
                  </script>' ; ?>
      <?php endif ?>

    <?php
        include_once 'footer.php' ;
    ?>