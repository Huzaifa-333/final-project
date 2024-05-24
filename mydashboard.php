<?php
include 'db_config.php';

// Establish database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Fetch data from the database
$sql = "SELECT * FROM gym";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gym Website</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="animate.css"> -->
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet"  href="styles.css">
  <style>
    .show-requests {
    width: 80%;
    min-height: 450px;
    margin: 100px auto;
}

/* table css */
.request-table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
    text-align: center;
}
.request-table th, .request-table td {
    border: 1px solid #ddd;
    padding: 8px;
}
.request-table th {
    background-color: #f2f2f2;
    color: #333;
}
.request-table tr:nth-child(even) {
    background-color: #f9f9f9;
}
.request-table tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}
.request-table th, .request-table td {
    text-align: center;
}
  </style>
  
</head>
<body>
 
 <!-- Start Header  -->
 <header>
 	 <div class="container">
 	 	<div class="logo">
 	 		 <a href="">Fitness <span>Zone</span></a>
 	 	</div>
 	 	<a href="javascript:void(0)" class="ham-burger">
 	       <span></span>	
 	       <span></span>
 	 	</a>
 	 	<div class="nav">
 	 		<ul>
 	 			<li><a href="#home">Home</a></li>
 	 			<li><a href="about.html">About</a></li>
 	 			<li><a href="services.html">Services</a></li>
 	 			<li><a href="Gallery.html">Gallery & Packages</a></li>
 	 			<li><a href="Contact.html">Contact</a></li>
 	 		</ul>
 	 	</div>
 	 </div>
 </header>
 <!-- End Header  -->
 <div class="show-requests">
        <h1>User Dashboard</h1>
        <table class="request-table">
            <tr>
                <th>User ID</th>
                <th> Name</th>
                <th> Email</th>
                <th> Address</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php
            include 'db_config.php';
            // Establish database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM gym";
$result = $conn->query($sql);
            
            if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo htmlspecialchars($row['message']); ?></td>
                        <td>
                        <a href="edit_data.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="delete_data.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                        
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No requests found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
 <div class="copy">
    PowerBy &copy; Huzaifa DAr
</div>

 <!-- jquery -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){

      $(".ham-burger, .nav ul li a").click(function(){
       
        $(".nav").toggleClass("open")

        $(".ham-burger").toggleClass("active");
      })      
      $(".accordian-container").click(function(){
      	$(".accordian-container").children(".body").slideUp();
      	$(".accordian-container").removeClass("active")
      	$(".accordian-container").children(".head").children("span").removeClass("fa-angle-down").addClass("fa-angle-up")
      	$(this).children(".body").slideDown();
      	$(this).addClass("active")
      	$(this).children(".head").children("span").removeClass("fa-angle-up").addClass("fa-angle-down")
      })

       $(".nav ul li a, .go-down").click(function(event){
         if(this.hash !== ""){

              event.preventDefault();

              var hash=this.hash; 

              $('html,body').animate({
                scrollTop:$(hash).offset().top
              },800 , function(){
                 window.location.hash=hash;
              });

              // add active class in navigation
              $(".nav ul li a").removeClass("active")
              $(this).addClass("active")
         }
      })
})

</script>
<script src="min.js"></script>
<script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       0,
      }
    );
    wow.init();
  </script>
</body>
</html>





