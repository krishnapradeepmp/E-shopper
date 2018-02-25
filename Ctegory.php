<?php
include_once 'config.php';
$sql= "SELECT * FROM category";
$result=$con->query($sql);
while($row= mysqli_fetch_assoc($result))
{
echo '<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#'
											.$row['category_name'].
										'">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>'
											.$row['category_name'].
										'</a>
									</h4>
								</div>
								<div id="'
											.$row['category_name'].
										'" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>';
											
        
        $sql2= 'SELECT * FROM sub_category WHERE parent_ID ='
											.$row['id'].
										'';
        $result1= $con->query($sql2);
        while($row1= mysqli_fetch_assoc($result1)){
        
                                                    
            
                                     
        echo '<li><a href="#">'.$row1['cat_name']. '</a></li>';
            
        }
        
										echo	'<li></li>
											<li></li>
											<li></li>
											<li></li>
										</ul>
									</div>
								</div>
							</div>';
}

