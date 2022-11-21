<?php
    $title  = 'Profile' ;
    include 'scripts.php' ;
    include_once 'head.php' ;
    include_once 'sidebar.php' ;
    if(!isset($_SESSION['welcomeBack'])){
        header("location: signIn.php");
    }
?>
    <?php if(isset($_SESSION['fieldMessage'])) : ?>
        <div class="alert alert-red">
            <strong>Error!</strong>
            <?php 
                echo $_SESSION['fieldMessage']; 
                unset($_SESSION['fieldMessage']);
                ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
        </div>
    <?php endif ?>

    

    <form action="scripts.php" method="POST" enctype="multipart/form-data" class="updateForm">
        <div class="mt-4 mx-5 text-center">
            <img src="/design/img/form/utilisateur.png" width="150" height="150">
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"  value="<?php echo $_SESSION['username']  ?>" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Email</label>
            <input type="Email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']  ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $_SESSION['password']  ?>" required>
        </div>
        
      <div class="">
        <button type="submit" class="btn btn-info text-white" name="update">Update</button>
      </div>
      
      </form>

<!-- <script src="/js/app.js"></script> -->
<?php
    include_once 'footer.php' ;
?>