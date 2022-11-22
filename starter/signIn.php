<?php 
    include 'scripts.php' ;
    if(isset($_SESSION['welcomeBack'])){
        header('location: dashboard.php') ;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/starter/css/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="/starter/css/style.css">
    <title>Sign In</title>
</head>
<body>
    <div class="parent">
        <div class="child">
            <div class="sous-child">
            <form action="scripts.php" method="POST" class="myForm">
                <div class="mt-4 mx-5 text-center">
                    <img src="/design/img/form/utilisateur.png" width="150" height="150">
                </div>

                <?php if(isset($_SESSION['invalid'])) : ?> 
                        <div class="text-danger text-center">
                            <?php echo $_SESSION['invalid']; ?>
                        </div>
                        <?php unset($_SESSION['invalid']); ?>
                <?php endif ?>

                <div class="mb-3 mx-5 position-relative">
                    <i class="fa fa-envelope text-white position-absolute"></i>
                    <input class="form-control inputs text-white ps-4" type="email" name="email" id="email" placeholder="Email" required oninput="emailValidation()">
                    <div class="errorEmail" id="errorEmail">*Please enter the right form</div>
                </div>

                <div class="mb-3 mx-5 position-relative">
                    <i class="fa fa-lock text-white position-absolute"></i>
                    <input class="form-control inputs text-white ps-4" type="password" name="password" id="password" placeholder="password" required oninput="passwordValidation()">
                    <div class="errorPassword" id="errorPassword">*Please enter the right form</div>
                </div>

                <div class="mb-3 mx-5 text-white">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Remember me ?</label>
                </div>

                <div class="mb-5 mx-5 text-center">
                    <button href="dashboard.php" class="signInButton text-white" type="submit" name="signIn" id=register>Sign In</button>
                </div>

                <div class="text-center">
                    <a href="/starter/signUp.php" class="account text-white">You don't have an account? <b>Sign Up</b></a>
                </div>
            </form>
        </div>
        </div>
    </div>
    <script src="/starter/js/app.js"></script>
</body>
</html>