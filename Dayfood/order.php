<?php
session_start();

require_once("db.php");
if(!empty($_POST["save_record"])) {
	$sql = "INSERT INTO dforder ( foodname,quantity,contactno,address ) 
	VALUES ( :foodname, :quantity,:contactno, :address )";
	$pdo_statement=$pdo_conn->prepare($sql);
	$result = $pdo_statement->execute(array( ':foodname'=>$_POST['foodname'],
	'quantity'=>$_POST['quantity'], ':contactno'=>$_POST['contactno'],
	':address'=>$_POST['address'] ));
	if($result) {
				echo '<script type="text/javascript">'; 
echo 'alert("Order added successfully");'; 
echo '</script>';

		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Orders </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/Navigation.css" type="text/css">
<link rel="stylesheet" href="CSS/Home.css" type="text/css">
<link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.min.css">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="CSS/ionicons-2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="CSS/Books.css">
<link rel="stylesheet" href="CSS/footer.css" type="text/css">
<script src="js/bootstrap.min.js"></script>
<style>
h3{
font-size:35px;
color:#922B21 ;
text-align:center;
}

h2{
font-size:25px;
color::#212F3C ;
text-align:left;
}
.navigation-bar a {
  padding: 0px;
  margin: 0px;
  text-align: center;
  display:inline-block;
  vertical-align:top;
}


.btne {

border: none;
background: #34495E;
color: Red !important;
font-weight: 100;
font-family:arial;
padding: 5px;
text-transform: uppercase;
border-radius: 4px;
display: inline-block;
transition: all 0.3s ease 0s;
text-decoration:none;
}

.btne:hover {
color: white !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: black;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;
}
* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}


input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}


hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}


</style>
</head>
<body style="overflow-x:hidden; ">

<div class="topnav" >

	<a  href="newsandpromotion.html" ><i class="fa fa-sign-in-alt"></i> News and promotions</a>
	<a class="active" href="order.php" ><i class="fa fa-sign-in-alt"></i> Order</a>
	<a  href="gallery.html" ><i class="fas fa-book"></i> Gallery</a>
    <a href="index.html"><i class="fa fa-home"></i> Day Foods</a>
</div>
<br>
<br>


<p style="font-weight:bold;text-align:center;line-height:30px;font-size:40px; 0px;color:#34495E">Orders</p>
<br>


<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="POST">
      
        <div class="row" >
          <div class="col-50">

            <label  style="font-weight:bold;color:black;font-family:calibri"><i class="fas fa-utensils"></i> Food Name</label>
  <input style="font-weight:bold;color:black;font-family:calibri" type="text" class="form-field" name="foodname" id="foodname" required  />
            <label style="font-weight:bold;color:black;font-family:calibri" for="bname"><i class="fa fa-plus"></i> Quantity</label>
  <input style="font-weight:bold;color:black;font-family:calibri" type="text"  class="form-field" name="quantity" id="quantity" required  />
            <label  style="font-weight:bold;color:black;font-family:calibri"><i class="fas fa-phone"></i>Contact No </label>
  <input style="font-weight:bold;color:black;font-family:calibri"  type="text"  class="form-field" name="contactno" id="contactno"  required  />
            <label  style="font-weight:bold;color:black;font-family:calibri"><i class="fas fa-address-book"></i> Address</label>
  <input style="font-weight:bold;color:bla;font-family:calibri"  type="text"  class="form-field" name="address" id="address" required  />

<center>
<div class="btne"  align="center"><button type="save_record" value="save_record" name="save_record"  style="font-size:20px;font-weight:bold;color:Black;font-family:calibri;text-decoration:none;bord;border-radius:10%;border:2px;padding:10px;width:150px;"  >Order</button></div>
    </center>
          </div>

      
      </div>


  </form>
</div>
</div>
</div>
    
<br>

<h2 style="background-color:#34495E ;color:#FFFCFC; ">Food List</h2>
<table class="table table-dark">
	<thead>
	<tr>
		<th scope='col'>Food Name</th>
		<th scope='col'>Type</th>
		<th scope='col'>Price</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<th scope='row'>Burger</th>
			<td>Chicken</td>
			<td>550 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Burger</th>
			<td>Beef</td>
			<td>650/=</td>
		</tr>	
		<tr>
			<th scope='row'>Burger</th>
			<td>Veg</td>
			<td>450 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Pizza</th>
			<td>Chicken</td>
			<td>800 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Pizza</th>
			<td>Beef</td>
			<td>900 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Pizza</th>
			<td>Veg</td>
			<td>700 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Noodles</th>
			<td>Chicken</td>
			<td>500 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Noodles</th>
			<td>Beef</td>
			<td>550 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Noodles</th>
			<td>Veg</td>
			<td>450 /=</td>
		</tr>	
		<tr>
			<th scope='row'>Burrito</th>
			<td>Chicken</td>
			<td>350 /=</td>
		</tr>	
	
	
	</tbody>

</table>

<br>
   


  <div class="footer-dark">
        <footer>

            <div class="container10" style="text-align: center;">
                <div class="row">
				
                    <div class="col-sm-6 col-md-3 item">
                        <h3 style="color:white">Resources</h3>
                        <ul style=" text-align: left; display: inline-block; ">
                            <li ><a href="#">Copyright</a></li>
                            <li ><a href="#">Open acess</a></li>
                            <li><a href="#">Licensing</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3 style="color:white;">About</h3>
                        <ul style=" text-align: left; display: inline-block; ">
                            <li ><a href="#">History</a></li>
                            <li ><a href="#">Awards</a></li>
                            <li ><a href="#">Founders</a></li>
                            <li ><a href="#">Accountability</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3 style="color:white;">Contact Us</h3>
						<div style="text-align: left; display: inline-block;" >
						   <p>  Mobile No - 00000000</p>
                           <p>Land Line - 000000000</p>
                           <p>E-mail	  - postbox12@gmail.com</p>
                           <p >Address   - No.10,Main Road, City</p>
                       </div>
                    </div>
                    <div class="col item social">
					<a href="#"><i class="icon ion-social-facebook"></i></a>
					<a href="#"><i class="icon ion-social-twitter"></i></a>
					<a href="#"><i class="icon ion-social-snapchat"></i></a>
					<a href="#"><i class="icon ion-social-instagram"></i></a>
					</div>
                </div>
                <p class="copyright">Day Food © 2020</p>
            </div>
        </footer>
    </div>
    
    </div>
</body>


</html>