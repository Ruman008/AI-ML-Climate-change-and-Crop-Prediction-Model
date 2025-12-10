

<!DOCTYPE html>
<html>
<?php include ('header.php');  ?>

  <body class="bg-white" id="top">
  
<?php include ('nav.php');  ?>

 
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
<!-- ======================================================================================================================================== -->

<div class="container-fluid ">
    
    	 <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Prediction</span>
          </div>
        </div>
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-success mb-3">
				<form role="form" action="#" method="post" >  
				  <div class="card-header">
				  <span class=" text-info display-4" > Temperature Prediction  </span>	
						<span class="pull-right">
							<button type="submit" value="Recommend" name="Temperature_predict" class="btn btn-warning btn-submit">SUBMIT</button>
						</span>		
				  
				  </div>

				  <div class="card-body text-dark">
				     <form role="form" action="#" method="post" >     
					 
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

    <thead>
					<tr class="font-weight-bold text-default">
					<th><center> maxtempC</center></th>
					<th><center>mintempC</center></th>
					<th><center>cloudcover</center></th>
					<th><center>humidity</center></th>
					<th><center>sunHour</center></th>
					<th><center>HeatIndex</center></th>
					<th><center>precipMM</center></th>
                    <th><center>pressure</center></th>
                    <th><center>windspeedkmph</center></th>
					
        </tr>
    </thead>
 <tbody>
                                 <tr class="text-center">
                                    <td>
                                    	<div class="form-group">
											<input type = 'number' name = 'maxt' placeholder="maxtempC Eg:30" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'mt' placeholder="mintempC Eg:14" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'cc' placeholder="cloudcover Eg:0" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'hu' step =0.01 placeholder="humidity Eg:48" required class="form-control">
											
										</div>
                                    </td>
									
                                    <td>
                                    	<div class="form-group">
											<input type = 'number' name = 'sunh' step =0.01 placeholder="sunHour Eg:8.7" required class="form-control">
											
										</div>
                                    </td>

									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'heatin' step =0.01 placeholder="HeatIndex Eg:17" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'precip' step =0.01 placeholder="precipMM Eg:0.0" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											 <input type = 'number' name = 'pres' step =0.01 placeholder="pressure Eg:1013" required class="form-control">
											
										</div>
                                    </td>

                                    <td>
                                    	<div class="form-group">
											<input type = 'number' name = 'winds' step =0.01 placeholder="windspeedkmph Eg:17" required class="form-control">
											
										</div>
                                    </td>
                                </tr>
                            </tbody>
							
					
	</table>
	</form>
</div>
</div>



<div class="card text-white bg-gradient-success mb-3">
				  <div class="card-header">
				  <span class=" text-success display-4" > Result  </span>					
				  </div>

					<h4>
					<?php 
					if(isset($_POST['Temperature_predict'])){
					$maxt=trim($_POST['maxt']);
                    $mt=trim($_POST['mt']);
					$cc=trim($_POST['cc']);
					$hu=trim($_POST['hu']);
					$sunh=trim($_POST['sunh']);
					$heatin=trim($_POST['heatin']);
					$precip=trim($_POST['precip']);
					$pres=trim($_POST['pres']);
                    $winds=trim($_POST['winds']);


					echo "Temperature predicted is : ";

					$Jsonmaxt=json_encode($maxt);
                    $Jsonmt=json_encode($mt);
					$Jsoncc=json_encode($cc);
					$Jsonhu=json_encode($hu);
					$Jsonsunh=json_encode($sunh);
					$Jsonheatin=json_encode($heatin);
                    $Jsonprecip=json_encode($precip);
					$Jsonpres=json_encode($pres);
					$Jsonwinds=json_encode($winds);
					
					$command = escapeshellcmd("python ML/Temperature_prediction/trecommend.py $Jsonmaxt $Jsonmt $Jsoncc $Jsonhu $Jsonsunh $Jsonheatin $Jsonpres $Jsonprecip $Jsonwinds ");
                    $output = passthru($command);
					echo $output;					
					}
                    ?>
					</h4>
            </div>
 
	
	
            </div>
          </div>  
       </div>
		 
</section>

    <?php require("footer.php");?>

</body>
</html>

