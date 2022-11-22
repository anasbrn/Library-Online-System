<?php
    $title  = 'Books' ;
    include 'scripts.php' ;
    include_once 'head.php' ; 
    include_once 'sidebar.php' ;
    if(!isset($_SESSION['welcomeBack'])){
      header("location: signIn.php");
  }
?>

<body>
    <div class="my-2 mx-2 d-flex justify-content-end">
        <button class="btn btn-info btn-rounded text-white" onclick="resetForm()" data-bs-toggle="modal" data-bs-target="#exampleModal">Add book<i class="fa fa-plus mx-1 text-dark"></i></button>
    </div>

    <?php getBooks() ?>
    
 
    <!-- <?php if(isset($_GET['alert'])) : ?>
      <?php echo "<script> alert('".$_GET['alert']."')</script>" ?>
    <?php endif ?> -->


    

<!-- Modal Add Book -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="scripts.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nameBook" class="form-label">Name</label>
            <input type="text" class="form-control" name="title" required>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" required>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category"  class="form-select" required>
                <option value="Please select">Please select</option>
                <option value="1">Adventure</option>
                <option value="2">Fantasy</option>
                <option value="3">Mystery</option>
                <option value="4">Self-improvemen</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="photo">Photo</label>
            <input class="form-control" type="file" name="img" required>
          </div>

          <div class="mb-3">
            <label for="price" class="col-form-label">Price</label>
            <input class="form-control"  name="price" required></input>
          </div>
      </div>
      <div class="modal-footer" id="buttonModal">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info text-white" name="save" id="addBook" >Save</button>
        
      </div>
      
      </form>
    </div>
  </div>
</div>

    
<!-- Modal Edit Book -->
<div class="modal fade" id="editbook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="scripts.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nameBook" class="form-label">Name</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select" required>
                <option value="Please select">Please select</option>
                <option value="1" id="adventure">Adventure</option>
                <option value="2" id="fantasy">Fantasy</option>
                <option value="3" id="mystery">Mystery</option>
                <option value="4" id="self-improvemen">Self-improvemen</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="photo">Photo</label>
            <input class="form-control" type="file" name="img" id="photo" required>
          </div>

          <div class="mb-3">
            <label for="price" class="col-form-label">Price</label>
            <input class="form-control" id="price" name="price" required></input>
          </div>
          
      </div>
      <div class="modal-footer" id="buttonModal">
        <input type="hidden" name="id-book" id="id-book">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info text-white" name="edit">Update</button>
        
      </div>
      
      </form>
    </div>
  </div>
</div>

<!-- Modal delete book -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="scripts.php" method="POST">
          Are you sure you want to delete this book !
        </div>
        <div class="modal-footer">
          <input type="text" hidden name="bookId" id="bookId">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="confirm">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal add successfully -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Added!</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Book has been added successfully !
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info text-white" data-dismiss="modal">Ok</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal update successfully -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Updated!</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Book has been updated successfully !
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info text-white" data-dismiss="modal">Ok</button>
        </div>
    </div>
  </div>
</div>

   
    

<script src="/starter/js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php if(isset($_GET['addModal'])) : ?>
      <?php echo '<script type="text/javascript">
                     $("#addModal").modal("show");
        </script>' ; ?>
      <?php endif ?>

<?php if(isset($_GET['updateModal'])) : ?>
      <?php echo '<script type="text/javascript">
                     $("#updateModal").modal("show");
        </script>' ; ?>
      <?php endif ?>
</body>
<?php
    include_once 'footer.php' ;
?>

