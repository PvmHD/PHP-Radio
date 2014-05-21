<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<?php require_once('php/header.php'); ?>
 </head>

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
    

  <!-- Navbar
    ================================================== -->
    <?php require_once('php/navbar.php'); ?>



<div class="container">


<?php

if(isset($_GET['q']) && !empty($_GET['q'])){

		$q = $_GET['q'];
		$data = json_decode(get('http://dirble.com/dirapi/search/apikey/'. $api_key .'/search/' . $q));


		   if(!empty($data)){

		 	$q = htmlentities($q,ENT_QUOTES);
			print '<h2>Results for: "'. $q .'"</h2>';

	 		  $count = count($data);
			  $pages = floor($count / 10);
		      $r_pages = $count % 10;

		      
		      if($r_pages != 0){
		        $pages++;
		      }


		        //looots of variables
		        $cp = 1; 
		        $i = 0;
		        $p = 0;
		        $x = 1;
		        $t = 0;
		        $c = false;
		        $cc = false;
		        $pagesnr = '<div class="pagination pagination-centered"><ul class="tabs">';

		      foreach($data as $radio){

		        // code for printing the tabbed system
		        if($i % 10 == 0){
		            print '<div class="tab-content"  id="tabs'.$cp.'">
		              <table class="table table-bordered table-striped table-hover">
		                  <thead>
		                    <tr>
		                      <th>#</th>
		                      <th>Name</th>
		                      <th>Site</th>
		                      <th>Country</th>
		                      <th>Bitrate</th>
		                      <th>Status</th>
		                    </tr>
		                  </thead>
		                  <tbody>';
		            
		            if($cp == 1){
		              $pagesnr .= '<a ><button href="#" class="defaulttab btn btn-primary"  rel="tabs'.$cp.'">'.$cp.'</button></a>&nbsp;';
		            }
		            else{
		              $pagesnr .= '<a ><button href="#"  class="btn btn-primary" rel="tabs'.$cp.'">'.$cp.'</button></a>&nbsp;';
		            }
		            $t = 1;
		              
		              $p = $p + 10;
		              $n = $pages * 10 - $p;
		              if($n == 0){
		              if($c != true){
		                if($cp == $pages){
		                  $c = true;
		                  $cc = true;
		                }
		              }
		            }
		          }

		          // end of code for printing the tabbed system

		          //print '<script>c++</script>';

		          

		          $status = (int)$radio->status;
		          if($status == 1){
		            $status = '<img src="../../img/on.png" /> Online';
		          }
		          else{
		            $status = '<img src="../../img/off.png" /> Offline';
		          }

		          $website = '';
		          if($radio->website != ''){
		            $website = '<a href="'.$radio->website.'">'. $radio->website .'</a>';
		          }
		          else{
		            $website = 'Not available';
		          }

		            print '<tr>
		                      <td>'.($i + 1).'</td>
		                      <td><a href="../../php/listen.php?u='.$radio->streamurl.'&t='.$radio->name.'">'.$radio->name.'</a></td>
		                      <td>'. $website .'</td>
		                      <td><img src="../../img/blank.gif" class="flag flag-'. strtolower($radio->country) .'" />&nbsp;&nbsp;'. $radio->country .'</td>
		                      <td>'.$radio->bitrate.'</td>
		                      <td>'.$status.'</td>
		                    </tr>';

		     
		          //end of ban details


		           // code for printing the tabbed system

		          if($t == 10){
		            print ' </tbody>
		                </table></div>';
		            $cp++;
		          }

		          if($cc == true){
		            if($x == $r_pages){
		              print ' </tbody>
		                </table></div>';
		            }
		            $x++;
		          }

		           // end of code for printing the tabbed system

		         
		          $t++;
		          $i++;

		      }
		      $pagesnr .= '</ul></div>';
		      


		      print $pagesnr;
	  }
	  else{

	  	$q = $_GET['q'];
		$q = htmlentities($q,ENT_QUOTES);
	  	print '<h2>No results were found for: "'. $q .'".</h2>';

	  }
	 
}
else{
	print '<h2>Please insert a string to search for.</h2>';
}

?>


<?php require_once('php/footer.php'); ?>



</div>




</body>
</html>
