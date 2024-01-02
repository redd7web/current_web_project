<?php
include 'includes/connect.php';

	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Food Menu</title>

  <!-- Favicons-->
  <link rel="icon" href="../assets/img/artist_logo.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="../assets/img/artist_logo.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  
     <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
    select{
        display:block;
    }
  </style> 
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="../assets/img/artist_logo.png" alt="logo" style="width:50px;height:50px;" /></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
				 <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold active"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Food Menu</a>
            </li>
            
            <li class="bold"><a href="events.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Events</a>
            </li>
                <!--<li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Events</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="events.php">All Orders</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li> -->
                <!--
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="all-tickets.php">All Tickets</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>	--!>	
            <li class="bold"><a href="gallery.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Gallery</a>
            </li>    	
            <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Food Menu</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">Add, Edit or Remove Menu Items.</p>
          <div class="divider"></div>
		  <form class="formValidate" id="formValidate" method="post" action="routers/menu-router.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Order Food</h4>
              </div>
              <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                    <i class="mdi-content-send right"></i>
                  </button>
                </div>
              <div>
				<table id="myTable" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Item Price/Piece</th>
                        <th>Category</th>
                        <th>Available</th>
                        <th>Image</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
				$result = mysqli_query($con, "SELECT * FROM items");
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td><img src="../assets/img/delete-icon.jpg" style="cursor:pointer;" class="delete-this" rel="'.$row['id'].'" />&nbsp;
                    <span style="display:none;">'.$row["name"].'</span>
                    <div class="input-field col s12">Name';
					echo '<input value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';					
					echo '<td><div class="input-field col s12">Description';
                    
                    
                    echo '<textarea  id="'.$row["id"].'_descr" name="'.$row['id'].'_descr" type="text" data-error=".errorTxt'.$row["id"].'">'.$row["descr"].'</textarea> <div class="errorTxt'.$row["id"].'"></div></td>';
                  
                    echo '<td><span style="display:none;">'; 
                     if($row["price"]<10){
                        echo "0".$row["price"];
                     }else{
                        echo $row["price"];
                     }
                    echo'</span><div class="input-field col s12 ">Price';
					echo '<input value="'.$row["price"].'" id="'.$row["id"].'_price" name="'.$row['id'].'_price" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';
                    
                    
                    echo '<td>
                    <span style="display:none;">'.$row["category"].'</span>
                    <div class="input-field col s12">Category';
                    echo '<input value="'.$row["category"].'" id="'.$row["id"].'_category" name="'.$row['id'].'_category" type="text" data-error=".errorTxt'.$row["id"].'" class="tags"><div class="errorTxt'.$row["id"].'"></div></td>';
                    
					echo '<td>';
					if($row['deleted'] == 0){
						$text1 = ' selected ';
						$text2 = '';
					}
					else{
						$text1 = '';
						$text2 = ' selected ';						
					}
					echo '<select name="'.$row['id'].'_hide">
                      <option value="1"'.$text1.'>Available</option>
                      <option value="2"'.$text2.'>Not Available</option>
                    </select></td>'; 
                    
                    echo '<td style="text-align:center;">';
                        echo "<iframe src='upload_image.php?row=$row[id]' style='width:200px;height:70px;border:0p solid #bbb;' frameborder='0'  scrolling='no' ></iframe>";
                    echo '</div>'; 
                    
                    echo '</td>';
                    echo '</tr>';
                    
                    
				}
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>
		  <form class="formValidate" id="formValidate1" method="post" action="routers/add-item.php" novalidate="novalidate"  enctype="multipart/form-data">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Add Item</h4>
              </div>
              <div>
                <table>
                    <thead>
                      <tr>
                        <th data-field="id">Name</th>
                        <th data-field="descr">Description</th>
                        <th data-field="name">Item Price/Piece</th>
                        <th data-field="category">Category</th>
                        <th>Image</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
					echo '<tr><td><div class="input-field col s12"><label for="name">Name</label>';
					echo '<input id="name" name="name" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';					                 
                    echo '<td><div class="input-field col s12"><label for="name">Description</label>';
					echo '<input id="descr" name="descr" type="text" data-error=".errorTxt01"><div class="errorTxt01"></div></td>';
                                                            
					echo '<td><div class="input-field col s12 "><label for="price" class="">Price</label>';
					echo '<input id="price" name="price" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';                                  
                     echo '<td><div class="input-field col s12 "><label for="price" >Category</label>';
					echo '<input class="tags" id="category" name="category" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';
                    echo "<td><input type='file' id='image_up' name='image_up'/></td>";
					echo '</tr>';
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>	
            
            
            
            
            
            
            <form class="formValidate" id="formValidate1" method="post" action="routers/category-edit.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Category Edit</h4>
              </div>
              <div>
                <table>
                    <thead>
                      <tr>
                        <th>&nbsp;</th>
                        <th data-field="id">Category Name</th>
                        <th data-field="descr">List Name</th>
                        <th data-field="name">Category Description</th>
                      </tr>
                    </thead>

                    <tbody>
				<?php
                
                    $result = mysqli_query($con, "SELECT * FROM category_list");
    				while($rows = mysqli_fetch_array($result))
    				{
    					echo '<tr>
                        <td><img src="../assets/img/delete-icon.jpg" class="del_categ" style="cursor:poiner;" rel="'.$rows["id"].'" categ="'.$rows["category_name"].'" /></td>
                        <td><div class="input-field col s12"><label for="'.$rows["id"].'_category_name">Name</label>';
    					echo '<input value="'.$rows["category_name"].'" id="'.$rows["id"].'_category_name " name="'.$rows['id'].'_category_name " type="text" data-error=".errorTxt'.$rows["id"].'"><div class="errorTxt'.$rows["id"].'"></div></td>';	
                        
                        echo '<td><div class="input-field col s12 "><label for="'.$rows["id"].'_category_list_name ">List Name</label>';
                        echo '<input value="'.$rows["category_list_name"].'" id="'.$rows["id"].'_category_list_name" name="'.$rows["id"].'_category_list_name" type="text" data-error=".errorTxt'.$rows["id"].'"><div class="errorTxt'.$rows["id"].'"></div></td>';
                        
    					echo '<td><div class="input-field col s12"><label for="'.$rows["id"].'_category_description">Description</label>';
                        echo '<input value="'.$rows["category_description"].'" id="'.$rows["id"].'_category_description" name="'.$rows['id'].'_category_description  " type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$rows["id"].'"></div></td>';
    					echo '</tr>';
                    }
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>		
            <div class="divider"></div>
            
          </div>
        </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->




  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="#" target="_blank">Students</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Students</a></span>
        </div>
    </div>
  </footer>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script>      
      $(document).ready(function(){
       $('#myTable').dataTable({
            "order": [ 3, 'asc' ],
            "lengthMenu": [ [10, 25, 50,100,150, -1], [10, 25, 50,100,150, "All"] ]
           }); 
        var availableTags = [
          <?php
           $rslt = mysqli_query($con,"SELECT category_name FROM category_list");
           while($rows = mysqli_fetch_array($rslt)){
             $ctgs[] = '"'.$rows['category_name'].'"';
           }
           if(!empty($ctgs)){
             echo implode(",",$ctgs);
           }
          ?>
        ];
        
        $( ".tags" ).autocomplete({
          source: availableTags
        });
        });
      $(".uploadimage").click(function(){
            alert("click");
      });
      $(".delete-this").click(function(){
            if (  confirm("Are you sure you want to delete this item ?") ){
                $.post( "delete_item.php", { id: $(this).attr('rel') },function(data){
                    alert("Item Successfully Deleted!");
                    window.location="http://www.artistrestaurant.com/admin/admin-page.php";
                });
            }
        }); 
        
        $(".del_categ").click(function(){
           if(confirm("Are you sure you want to delete this category?")){
                $.post("delete_categ.php",{id:$(this).attr('rel'),categ: $(this).attr('categ') },function(data){
                    alert("Category Deleted!  All previous items under this category are now un-categorized");
                    window.location="http://www.artistrestaurant.com/admin/admin-page.php";
                });
           } 
        });
    </script>
	<script type="text/javascript">        
    $("#formValidate").validate({
        rules: {
			<?php
			$result = mysqli_query($con, "SELECT id FROM items");           
			while($row = mysqli_fetch_array($result))
			{
				echo $row["id"].'_name:{
				required: true,
				minlength: 5,
				maxlength: 20 
				},'."\r\n";
				echo $row["id"].'_price:{
				required: true,	
				min: 0
				},'."\r\n";				
			}
		echo '},';
		?>
        messages: {
			<?php
			$result = mysqli_query($con, "SELECT id FROM items");
			while($row = mysqli_fetch_array($result))
			{  
				echo $row["id"].'_name:{
				required: "Ener item name",
				minlength: "Minimum length is 5 characters",
				maxlength: "Maximum length is 20 characters"
				},';
				echo $row["id"].'_price:{
				required: "Ener price of item",
				min: "Minimum item price is Rs. 0"
				},';				
			}
		echo '},';
		?>
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
    <script type="text/javascript">
    $("#formValidate1").validate({
        rules: {
		name: {
				required: true,
				minlength: 5
			},
		price: {
				required: true,
				min: 0
			},
	},
        messages: {
		name: {
				required: "Enter item name",
				minlength: "Minimum length is 5 characters"
			},
		 price: {
				required: "Enter item price",
				minlength: "Minimum item price is Rs.0"
			},
	},
		errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:index.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>