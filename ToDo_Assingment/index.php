<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<style>
 
 .left {
  margin: auto; 
  width: 60%;
  border: 2px #E6E6FA;
  padding: 30px;
  background-color: #E6E6FA;
  margin-top:20px
  }

   .right { 
  width: 60%;
  padding: 5px;
  }
  
 table tr td:last-child{
  width: 30px;
  }
  .table{
  } 
  thead{
   background-color: #E6E6FA;
  }
  .fa{
    font-size:20px;
    color: #e60000;

  }
  p{
    color: #e60000;
  }
  

  </style>

<body>
    <div class="container-fluid ">
      <div class="col-sm-6">
       <div class="left">
       <form action="" method="post" id='myForm'>
          
         <div class="form-group">
          <strong>Name:</strong>
          <input type="text"  name="name" class="form-control" required>
        </div>

        <div class="form-group">
          <strong >Age:</strong>
          <input type="number" name="age" class="form-control" required>
        </div>

        <div class="clearfix">
         <input type="submit" name="submit" class="btn btn-primary float-left " value="Save">
         <button type="button"  onclick="myFunction()" class="btn btn-danger cancel float-right" >Clear</button>
       </div>
    </form>
    

<script type="text/javascript">
    function myFunction() {
  document.getElementById("myForm").reset();
}
     

    </script>
    </div>
  </div>

 <?php
 include 'conn.php';
          
 if(isset($_POST['submit'])){
          
    $c_name = $_POST['name'];
    $c_age  = $_POST['age'];

    $sql = "INSERT INTO customer(name,age)
      VALUES ( '$c_name','$c_age')";
          
 if ($conn->query($sql) === TRUE) {
   $msg =  "New record created successfully";
          } else {
            $msg =  "Error: " . $sql . "<br>" . $conn->error;
             }
          }
          
          $conn->close();
          
          ?> 


<div class="col-sm-6">
  <div class="right">
   <?php
   include'conn.php';
   $sql = "SELECT * FROM  customer";
   $result=mysqli_query($conn,$sql);
   if($result ->num_rows >0)
   {
   echo '<table class="table table-hover table-bordered">
            <p><b>Customer<b></p>
            <thead>
              <tr>
                <th>Name</th>
                <th>Age</th>
                <th>action</th>
              </tr>
            </thead>';
    while ($row = mysqli_fetch_assoc($result)) {
              
          echo "<tbody >"; 
           echo "<tr>";
              echo "<td>".$row['name']."</td>";
              echo "<td>".$row['age']."</td>";
              echo "<td>";
              echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-close" onclick="return myfun()"></span></a>';
              echo "</td>";
           echo "</tr>";
           echo "</tbody>";
           }

    echo "</table>";
    echo "<form action='delete_all.php' method='post'>";
    echo "<button type='submit' name='delete' class='btn btn-primary btn-block' onclick='return myfun1()''>Clear All</button>";
    echo "</form>";

 }else{
   echo '<table class="table table-hover table-bordered">
            <thead>
              <tr>
               <th>Name</th>
                <th>Age</th>
                <th>action</th>
              </tr>
            </thead> 
            <p><b>You have no data in this table</b></p> ';  
          
     }
?>
    </div>
  </div>
</div>
   <script>
    function myfun() {
      return confirm("Are you sure to delete this record.");
      }
      function myfun1() {
      return confirm("Are you sure to delete all record.");
      }
  </script>

</body>
</html>

