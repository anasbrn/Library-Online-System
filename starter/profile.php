<?php
    $title  = 'Profile' ;
    include 'scripts.php' ;
    include_once 'head.php' ;
    include_once 'sidebar.php' ;
    if(!isset($_SESSION['welcomeBack'])){
        header("location: signIn.php");
    }
?>
    <?php if(isset($_SESSION['accountExist'])) : ?>
      <div class="mx-2 my-2 alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong>
        <?php echo $_SESSION['accountExist'] ;
            unset($_SESSION['accountExist']) ;
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
      </div>
    <?php endif ?>
    
    <?php if(isset($_SESSION['addAccount'])) : ?>
      <div class="mx-2 my-2 alert alert-success alert-dismissible fade show">
        <strong>Success!</strong>
        <?php echo $_SESSION['addAccount'] ;
            unset($_SESSION['addAccount']) ;
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
            <input type="text" class="form-control profileUsername" id="username" name="username"  oninput="usernameValidation()" value="<?php echo $_SESSION['username']  ?>" required>
            <div class="errorUsername" id="errorUsername">*Please enter the right form</div>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Email</label>
            <input type="Email" class="form-control profileEmail" id="email" name="email" oninput="emailValidation()" value="<?php echo $_SESSION['email']  ?>" required>
            <div class="errorEmail" id="errorEmail">*Please enter the right form</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control profilePassword" id="password" name="password" oninput="passwordValidation()" value="<?php echo $_SESSION['password']  ?>" required>
            <div class="errorPassword" id="errorPassword">*Please enter the right form</div>
        </div>
        
      <div class="">
        <button type="submit" class="btn btn-dark text-white" name="update" id="register">Update</button>
      </div>
      
      </form>

<script src="/js/app.js"></script>
<?php
    include_once 'footer.php' ;
?>