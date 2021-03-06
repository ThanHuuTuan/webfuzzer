<!doctype html>
<html class="no-js" lang="en">
    <?php 
    	include("head.php"); 
    ?>
    <?php 
    	if (!isset($_SESSION['token'])){
        	header('Location: login.php');
        	die();
    	}
	?>
    <body>
    <div class="main-wrapper">
        <div class="app" id="app">
			<?php 
				include("header.php"); 
				include("sidebar.php");
			?>		
            <article class="content dashboard-page">
                <section class="section">
                    <div class="header-block header-block-search hidden-sm-down">
                    	<div class="tab-content">		
                    		<div class="row">
                    			<div class="col-md-10">
                    				<div class="input-group">
                    					<span class="input-group-btn">
                    						<button class="btn btn-default fa fa-search" type="button"></button>
                    					</span>
                    					<input type="text" class="form-control" placeholder="Search by domain..." >
                    				</div>
                    			</div>
                    			<div class="col-md-2">
                    				<p><a href="./new_domain.php" class="btn btn-primary" role="button">New Domain</a></p>
                    			</div>
                    		</div>
                    	</div>
                    </div>	

	                

        	<div class="card">
        		<div class="card-block">
            		<div class="card-title-block">
            			<h3 class="title"> Verify domains </h3>
	            </div>
	            <section class="example">
		            <div class="table-responsive">
	                <table class="table table-striped table-bordered table-hover">
	                <thead>
	                    <tr>
	                    <th>#</th>
	                    <th>Domains</th>
	                    <th>Ownership verified</th>
	                    <th>Action</th>
	                    </tr>
	                </thead>
		                <tbody>
	                    <?php
	                    	$token = $_SESSION['token'];
	                    	$num = GET('/domains', $token);
	                    	for ( $x = 0; $x < count($num['body']); $x++ ) {
	                    		$data = GET($num['body'][$x]['href'], $token);
	                    		$action = "<a href='connection.php?action=delete&id=".$num['body'][$x]['id']."'>Delete</a> | Verify";
	                    		$verify = "false";
	                    		if ( $data['body']['verification'] == "true" ) {
	                    			$action = "<a href='connection.php?action=delete&id=".$num['body'][$x]['id']."'>Delete</a>";
	                    			$verify = "true";
	                    		}
	                    		echo "<tr><td>".$data['body']['id']."</td><td>".$data['body']['url']."</td><td>".$verify."</td><td>".$action."</td></tr>";
	                    	}
	                    ?>
	                </tbody>
	                </table>
	            </div>
	            </section>
	        </div>
	
	    </div>
	
		    <nav class="text-xs-center">
	        <ul class="pagination">
	        <li class="page-item">
	            <a class="page-link" href="">Prev</a>
	        </li>
	        <li class="page-item"></li>
	            <a class="page-link" href="">1</a>
	        <li class="page-item"></li>
		            <a class="page-link" href="">2</a>
					<li class="page-item"></li>
	            <a class="page-link" href="">3</a>
	        <li class="page-item"></li>
	            <a class="page-link" href="">4</a>
	        <li class="page-item">
	            <a class="page-link" href="">Next</a>
	        </li>
	        </ul>
	    </nav>
	
	            </section>                    
	        </article>
		        </div>
	    </div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
        </div>
    </div>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>
    </body>

</html>
