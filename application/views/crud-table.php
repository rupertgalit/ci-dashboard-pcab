<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRUD</h1>
    <?php echo var_dump($data); ?>

    <table border="1">  
      <tbody>  
         <tr>  
            <td>Id</td>  
            <td>Name</td>   
            <td>Gateway</td>  
            <td>Craeted at</td>  
            <td>STATUS</td>  
         </tr>  
         <?php  
         foreach ($data as $row)  
         {  
            ?><tr>  
            <td><?php echo $row['ID'];?></td>
            <td><?php echo $row['NAME'];?></td>
            <td><?php echo $row['GATEWAY'];?></td>
            <td><?php echo $row['CREATED_AT'];?></td>
            <td><?php echo $row['STATUS'];?></td>


            </tr>  
         <?php }  
         ?>  
      </tbody>  
   </table> 
</body>
</html>