<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    
  </head>
  <body>

    <?php require_once 'process.php'?>

    <?php 
    $mysqli 
    = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data")  or die(mysqli_error($mysqli));
 
    //print_r($result);


?>
<div class="container">
<table class="table table-dark table-striped">
<tr>
<th>Name</th>
<th>Location</th>
<th colspan="2">Action</th>
</tr>
<?php 
while($row=$result->fetch_assoc()):?>
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['location'];?></td>
<td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit  </td>

<td><a href="process.php?delete=<?php echo $row['id']; ?>" >Delete</td>

</tr
><?php endwhile; ?>
</table>
</div>

    <div class="row justify-content-center">
      
       <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
     <div class="form-group">
       
        <div class="form-group">
        <label>Name</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
      </div>
      <div class="form-group">
        <label>Location</label>
      <input type="text" name="location" value="<?php echo $location; ?>">
      </div>  
      <div class="form-group">

        <?php 
        if($update == true): ?>
      <button type="submit" name="update" >Update</button>
        <?php else: ?>

        <button type="submit" name="save" >Save</button>
        <?php endif; ?>
      </div>
     </div>
    </form>
    </div>
   
  </body>
</html>