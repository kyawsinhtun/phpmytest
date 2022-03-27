<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Test</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once 'add.php'; ?>
        
        <?php
        if (isset($_SESSION['message'])):
        ?>
        
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        
        <?php endif ?>
        
        <?php
            $mysqli = new mysqli('localhost','ahtun','mypass123','info') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result);
        ?>
        
        <h2 class="center"><center>Web Development Test Two</center></h2>
        <br />
        <br />
        
        <div class="container">
            <table class="table">
                
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Hobby</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                <?php
                while($row = $result->fetch_assoc()):
                ?>
                
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['hobby']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="text-warning text-decoration-none">Edit</a>
                    </td>
                    <td>
                        <a href="add.php?delete=<?php echo $row['id']; ?>" class="text-danger text-decoration-none">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <br />
        <br />
        
        <?php
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        
        ?>
        <div class="container">
            <h2 class="center"><center>Web Development Test Two</center></h2>
            <br />
            <br />
        <form action="add.php" method="POST">
            
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="form-group">
                <label for="name" class="mb-2">Name</label><br />
                <div class="d-grid"><input type="text" name="name" class="form-control" value="<?php echo $name; ?>" /></div>
            </div><br />
            
            <div class="form-group">
                <label for="phone" class="mb-2">Phone</label><br />
                <div class="d-grid"><input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>"/></div>
            </div><br />
            
            <div class="form-group">
		<input type="radio" name="gender" id="gndm" class="" value="Male"checked/> <label for="gndm">Male</label><br />
		<input type="radio" name="gender" id="gndf" class="" value="Female" /> <label for="gndf">Female</label><br />
            </div><br />
            
            <div class="form-group">
		<input type="checkbox" name="hobby[]" id="swi" value="Swimming" /> <label for="swi">Swimming</label><br />
		<input type="checkbox" name="hobby[]" id="rea" value="Reading" /> <label for="rea">Reading</label><br />
		<input type="checkbox" name="hobby[]" id="coo" value="Cooking" /> <label for="coo">Cooking</label><br />
                <input type="checkbox" name="hobby[]" id="tra" value="Travelling" /> <label for="tra">Travelling</label><br />
                <input type="checkbox" name="hobby[]" id="goi" value="Going out with friends" /> <label for="goi">Going out with friends</label><br />
            </div><br />
            
            <div class="form-group">
                <?php
                    if ($update == true):
                ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                <?php endif; ?>
            </div>
            
        </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    </body>
</html>
