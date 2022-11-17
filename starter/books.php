<?php
    $title  = 'Books' ;
    include 'scripts.php' ;
    include_once 'head.php' ; 
    include_once 'sidebar.php' ;
?>

<body>
    <div class="my-2 mx-2 d-flex justify-content-end">
        <button class="btn btn-info btn-rounded text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Add book<i class="fa fa-plus mx-1 text-dark"></i></button>
    </div>

   <?php getBooks() ?>
   
</body>

<!-- Modal -->
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
            <input type="text" class="form-control" id="nameBook" name="title" required>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select" required>
                <option value="Please select">Please select</option>
                <option value="1">Adventure</option>
                <option value="2">Fantasy</option>
                <option value="3">Mystery</option>
                <option value="4">Self-improvemen</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="photo">Photo</label>
            <input class="form-control" type="file" name="img" id="img" required>
          </div>

          <div class="mb-3">
            <label for="description" class="col-form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info text-white" name="save">Save</button>
      </div>
      
      </form>
    </div>
  </div>
</div>
<?php
    include_once 'footer.php' ;
?>

