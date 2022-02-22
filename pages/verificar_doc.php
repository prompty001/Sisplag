<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
</head>
<body>
   
   <?php
    require_once('../config/painel.php');   

    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "files/".$fileName;
        
        $query = Conexao::conectar()->prepare ("INSERT INTO documento (requerimento) VALUES ('$fileName')");
        $query->execute();
        $run = $query->fetchAll();
        
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error";
        }
        
    }
    
    ?>
   
   <table>
       <tr>
           <td>
               <form action="../expo/download_doc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="submit" name="submit"> Upload</button>
                </form>
           </td>
       </tr>
       <tr>
           <td>
              <?php
              require_once('../config/painel.php');  
               $query2 = Conexao::conectar()->prepare ("SELECT * FROM documento");
               $query2->execute();
                $run2 = $query2->fetchAll();
               
               foreach($run2 as $run2){
                   ?>
               <a href="../expo/download_doc.php?file=<?php echo $run2['requerimento'] ?>">Download</a><br>
               <?php
               }
               ?>
           </td>
       </tr>
   </table>
    
</body>
</html>