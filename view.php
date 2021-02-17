<?php
    include "config.php ";
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$num_per_page = 05;
		$start_from = ($page-1)*05;
    $sql = "SELECT * FROM  details  limit $start_from, $num_per_page";
    $result = $conn->query($sql);
    // $num_per_page = 02;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				
    </head>
        <body>           
            <h2 style="text-align:center;">Details </h2>
			<?php
            session_start();
                 if(isset($_SESSION['User'])){
                    echo '<b>welcome:</b> <h3 style="color: blue; font-weight: bolder ">'.$_SESSION['User']. ' </h3>';
                     }  
                     else {
                     header("Location:index.php");
                     }                
           ?>    
					 <form class="" action="" method="get" autocomplete="off">   
								<nav class="navbar navbar-default">
										<div class="container-fluid" style="margin: 10px auto">
												<div class="nav navbar-left">               
													<a class="btn btn-success" href="logout.php?logout">Create</a>
												</div>
												<div class="navbar-form"   role="search" style="display: inline">                        
													<input type="text" name ="search" id="search"   class="form-control"placeholder="Search for names..">  
											                
												</div>
													<div class="nav navbar-right">               
														<a class="btn btn-warning" href="logout.php?logout">Logout</a>
												</div>             
										</div>
								</nav>
								
								<div class="col-md-12">
										<!-- <div class="container"> -->
														<table id ="tabledata" class="table table-responsive">
														<thead>
														<tr>
																<th>Register Number</th>
																<th>Name</th>
																<th>Age</th>
																<th>Year</th>
																<th>Gender</th>
																<th>Department</th>
																<th>Phone Number</th>
																<th>Image</th>
														</tr>
															</thead>
																		<tbody>
																				<?php 
																						if($result ->num_rows > 0){
																								while($row = $result->fetch_assoc()){
																				?>
																										<tr>
																												<td><?php echo $row['std_regno']; ?></td>
																												<td><?php echo $row['std_name']; ?></td>
																												<td><?php echo $row['std_age']; ?></td>
																												<td><?php echo $row['std_year']; ?></td>
																												<td><?php echo $row['std_gender']; ?></td>
																												<td><?php echo $row['std_department']; ?></td>
																												<td><?php echo $row['std_phone']; ?></td>
																												<td><img src = "<?php echo $row['std_image']; ?>" width ="70" > </td>                                        
																												<div class="form-group">
																												<td>                                                
																												<a class="btn btn-success"href = "edit.php?id=<?php  echo  $row['id'];?>"> Edit</a>
																												<a class="btn btn-danger" href = "delete.php?id=<?php  echo  $row['id'];?>"> Delete</a>                                       
																												</td>
																										</tr>                                                                   
																								<?php
																								}                                                                    
																						}
																				?>                   
																		</tr>                     
															</tbody>
												</table>
																						
											<?php
												$pr_query = "SELECT * FROM details";
												$result = $conn->query($pr_query);
												$totalrecord =mysqli_num_rows($result);
												$totalpages = ceil( $totalrecord/$num_per_page);
											?>
												<ul class="pagination pagination-lg">
												<!-- <li><a href="" class="btn btn-primary">previous</a></li> -->
												<?php for($i=1; $i<=$totalpages;$i++) echo "<li><a href='view.php?page=".$i."'>$i</a></li>" ?>
												<!-- <li><a href="" class="btn btn-primary">next</a></li> -->
											</ul> 					
										</div>
									</div>
							</form>
        </div> 
				<
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
   </body>
</html>