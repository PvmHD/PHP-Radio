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

if(isset($_GET['country']) && isset($_GET['name']) && !empty($_GET['country']) && !empty($_GET['name'])){

	//http://dirble.com/dirapi/country/apikey/api-key/country/country code

	$code = trim($_GET['country']);
	$name = htmlentities($_GET['name'],ENT_QUOTES);


	if(strlen($code) == 2){

		$data = json_decode(get('http://dirble.com/dirapi/country/apikey/'. $api_key .'/country/' . $code));

		print '<h2>Country: '. $name .'</h2>';

		 // print_r($data);

		  if(!empty($data)){

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
	  	print '<h2>No radio stations were found for this country.</h2>';
	  }
	 
	}
	else{
		print '<h2>An error occured</h2>';
	}

}
else{

print '<legend>Africa</legend>



<a href="'. $p .'countries/dz/Algeria">  <div class="span3"><img class="flag flag-dz" src="../../img/blank.gif" alt="Algeria" /> Algeria</div></a>
<a href="'. $p .'countries/ao/Angola">  <div class="span3"><img class="flag flag-ao" src="../../img/blank.gif" alt="Angola" /> Angola</div></a>
<a href="'. $p .'countries/bj/Benin">  <div class="span3"><img class="flag flag-bj" src="../../img/blank.gif" alt="Benin" /> Benin</div></a>
<a href="'. $p .'countries/bw/Botswana">  <div class="span3"><img class="flag flag-bw" src="../../img/blank.gif" alt="Botswana" /> Botswana</div></a>
<a href="'. $p .'countries/bf/Burkina Faso">  <div class="span3"><img class="flag flag-bf" src="../../img/blank.gif" alt="Burkina Faso" /> Burkina Faso</div></a>
<a href="'. $p .'countries/bi/Burundi">  <div class="span3"><img class="flag flag-bi" src="../../img/blank.gif" alt="Burundi" /> Burundi</div></a>
<a href="'. $p .'countries/cm/Cameroon">  <div class="span3"><img class="flag flag-cm" src="../../img/blank.gif" alt="Cameroon" /> Cameroon</div></a>
<a href="'. $p .'countries/cv/Cape Verde">  <div class="span3"><img class="flag flag-cv" src="../../img/blank.gif" alt="Cape Verde" /> Cape Verde</div></a>
<a href="'. $p .'countries/cf/Central African Republic">  <div class="span3"><img class="flag flag-cf" src="../../img/blank.gif" alt="Central African Republic" /> Central African Republic</div></a>
<a href="'. $p .'countries/td/Chad">  <div class="span3"><img class="flag flag-td" src="../../img/blank.gif" alt="Chad" /> Chad</div></a>
<a href="'. $p .'countries/km/Comoros">  <div class="span3"><img class="flag flag-km" src="../../img/blank.gif" alt="Comoros" /> Comoros</div></a>
<a href="'. $p .'countries/cg/Congo">  <div class="span3"><img class="flag flag-cg" src="../../img/blank.gif" alt="Congo" /> Congo</div></a>
<a href="'. $p .'countries/cd/Congo, The Democratic Republic of the">  <div class="span3"><img class="flag flag-cd" src="../../img/blank.gif" alt="Congo, The Democratic Republic of the" /> Congo, The Democratic Republic of the</div></a>
<a href="'. $p .'countries/ci/Côte d\'Ivoire">  <div class="span3"><img class="flag flag-ci" src="../../img/blank.gif" alt="Côte d\'Ivoire" /> Côte d\'Ivoire</div></a>
<a href="'. $p .'countries/dj/Djibouti">  <div class="span3"><img class="flag flag-dj" src="../../img/blank.gif" alt="Djibouti" /> Djibouti</div></a>
<a href="'. $p .'countries/eg/Egypt">  <div class="span3"><img class="flag flag-eg" src="../../img/blank.gif" alt="Egypt" /> Egypt</div></a>
<a href="'. $p .'countries/gq/Equatorial Guinea">  <div class="span3"><img class="flag flag-gq" src="../../img/blank.gif" alt="Equatorial Guinea" /> Equatorial Guinea</div></a>
<a href="'. $p .'countries/er/Eritrea">  <div class="span3"><img class="flag flag-er" src="../../img/blank.gif" alt="Eritrea" /> Eritrea</div></a>
<a href="'. $p .'countries/et/Ethiopia">  <div class="span3"><img class="flag flag-et" src="../../img/blank.gif" alt="Ethiopia" /> Ethiopia</div></a>
<a href="'. $p .'countries/ga/Gabon">  <div class="span3"><img class="flag flag-ga" src="../../img/blank.gif" alt="Gabon" /> Gabon</div></a>
<a href="'. $p .'countries/gm/Gambia">  <div class="span3"><img class="flag flag-gm" src="../../img/blank.gif" alt="Gambia" /> Gambia</div></a>
<a href="'. $p .'countries/gh/Ghana">  <div class="span3"><img class="flag flag-gh" src="../../img/blank.gif" alt="Ghana" /> Ghana</div></a>
<a href="'. $p .'countries/gn/Guinea">  <div class="span3"><img class="flag flag-gn" src="../../img/blank.gif" alt="Guinea" /> Guinea</div></a>
<a href="'. $p .'countries/gw/Guinea-Bissau">  <div class="span3"><img class="flag flag-gw" src="../../img/blank.gif" alt="Guinea-Bissau" /> Guinea-Bissau</div></a>
<a href="'. $p .'countries/ke/Kenya">  <div class="span3"><img class="flag flag-ke" src="../../img/blank.gif" alt="Kenya" /> Kenya</div></a>
<a href="'. $p .'countries/ls/Lesotho">  <div class="span3"><img class="flag flag-ls" src="../../img/blank.gif" alt="Lesotho" /> Lesotho</div></a>
<a href="'. $p .'countries/lr/Liberia">  <div class="span3"><img class="flag flag-lr" src="../../img/blank.gif" alt="Liberia" /> Liberia</div></a>
<a href="'. $p .'countries/ly/Libya">  <div class="span3"><img class="flag flag-ly" src="../../img/blank.gif" alt="Libya" /> Libya</div></a>
<a href="'. $p .'countries/mg/Madagascar">  <div class="span3"><img class="flag flag-mg" src="../../img/blank.gif" alt="Madagascar" /> Madagascar</div></a>
<a href="'. $p .'countries/mw/Malawi">  <div class="span3"><img class="flag flag-mw" src="../../img/blank.gif" alt="Malawi" /> Malawi</div></a>
<a href="'. $p .'countries/ml/Mali">  <div class="span3"><img class="flag flag-ml" src="../../img/blank.gif" alt="Mali" /> Mali</div></a>
<a href="'. $p .'countries/mr/Mauritania">  <div class="span3"><img class="flag flag-mr" src="../../img/blank.gif" alt="Mauritania" /> Mauritania</div></a>
<a href="'. $p .'countries/mu/Mauritius">  <div class="span3"><img class="flag flag-mu" src="../../img/blank.gif" alt="Mauritius" /> Mauritius</div></a>
<a href="'. $p .'countries/yt/Mayotte">  <div class="span3"><img class="flag flag-yt" src="../../img/blank.gif" alt="Mayotte" /> Mayotte</div></a>
<a href="'. $p .'countries/ma/Morocco">  <div class="span3"><img class="flag flag-ma" src="../../img/blank.gif" alt="Morocco" /> Morocco</div></a>
<a href="'. $p .'countries/mz/Mozambique">  <div class="span3"><img class="flag flag-mz" src="../../img/blank.gif" alt="Mozambique" /> Mozambique</div></a>
<a href="'. $p .'countries/na/Namibia">  <div class="span3"><img class="flag flag-na" src="../../img/blank.gif" alt="Namibia" /> Namibia</div></a>
<a href="'. $p .'countries/ne/Niger">  <div class="span3"><img class="flag flag-ne" src="../../img/blank.gif" alt="Niger" /> Niger</div></a>
<a href="'. $p .'countries/ng/Nigeria">  <div class="span3"><img class="flag flag-ng" src="../../img/blank.gif" alt="Nigeria" /> Nigeria</div></a>
<a href="'. $p .'countries/rw/Rwanda">  <div class="span3"><img class="flag flag-rw" src="../../img/blank.gif" alt="Rwanda" /> Rwanda</div></a>
<a href="'. $p .'countries/re/Réunion">  <div class="span3"><img class="flag flag-re" src="../../img/blank.gif" alt="Réunion" /> Réunion</div></a>
<a href="'. $p .'countries/sh/Saint Helena">  <div class="span3"><img class="flag flag-sh" src="../../img/blank.gif" alt="Saint Helena" /> Saint Helena</div></a>
<a href="'. $p .'countries/st/Sao Tome and Principe">  <div class="span3"><img class="flag flag-st" src="../../img/blank.gif" alt="Sao Tome and Principe" /> Sao Tome and Principe</div></a>
<a href="'. $p .'countries/sn/Senegal">  <div class="span3"><img class="flag flag-sn" src="../../img/blank.gif" alt="Senegal" /> Senegal</div></a>
<a href="'. $p .'countries/sc/Seychelles">  <div class="span3"><img class="flag flag-sc" src="../../img/blank.gif" alt="Seychelles" /> Seychelles</div></a>
<a href="'. $p .'countries/sl/Sierra Leone">  <div class="span3"><img class="flag flag-sl" src="../../img/blank.gif" alt="Sierra Leone" /> Sierra Leone</div></a>
<a href="'. $p .'countries/so/Somalia">  <div class="span3"><img class="flag flag-so" src="../../img/blank.gif" alt="Somalia" /> Somalia</div></a>
<a href="'. $p .'countries/za/South Africa">  <div class="span3"><img class="flag flag-za" src="../../img/blank.gif" alt="South Africa" /> South Africa</div></a>
<a href="'. $p .'countries/ss/South Sudan">  <div class="span3"><img class="flag flag-ss" src="../../img/blank.gif" alt="South Sudan" /> South Sudan</div></a>
<a href="'. $p .'countries/sd/Sudan">  <div class="span3"><img class="flag flag-sd" src="../../img/blank.gif" alt="Sudan" /> Sudan</div></a>
<a href="'. $p .'countries/sz/Swaziland">  <div class="span3"><img class="flag flag-sz" src="../../img/blank.gif" alt="Swaziland" /> Swaziland</div></a>
<a href="'. $p .'countries/tz/Tanzania">  <div class="span3"><img class="flag flag-tz" src="../../img/blank.gif" alt="Tanzania" /> Tanzania</div></a>
<a href="'. $p .'countries/tg/Togo">  <div class="span3"><img class="flag flag-tg" src="../../img/blank.gif" alt="Togo" /> Togo</div></a>
<a href="'. $p .'countries/tn/Tunisia">  <div class="span3"><img class="flag flag-tn" src="../../img/blank.gif" alt="Tunisia" /> Tunisia</div></a>
<a href="'. $p .'countries/ug/Uganda">  <div class="span3"><img class="flag flag-ug" src="../../img/blank.gif" alt="Uganda" /> Uganda</div></a>
<a href="'. $p .'countries/eh/Western Sahara">  <div class="span3"><img class="flag flag-eh" src="../../img/blank.gif" alt="Western Sahara" /> Western Sahara</div></a>
<a href="'. $p .'countries/zm/Zambia">  <div class="span3"><img class="flag flag-zm" src="../../img/blank.gif" alt="Zambia" /> Zambia</div></a>
<a href="'. $p .'countries/zw/Zimbabwe">  <div class="span3"><img class="flag flag-zw" src="../../img/blank.gif" alt="Zimbabwe" /> Zimbabwe</div></a>




<legend>America</legend>




<a href="'. $p .'countries/ai/Anguilla">  <div class="span3"><img class="flag flag-ai" src="../../img/blank.gif" alt="Anguilla" /> Anguilla</div></a>
<a href="'. $p .'countries/ag/Antigua and Barbuda">  <div class="span3"><img class="flag flag-ag" src="../../img/blank.gif" alt="Antigua and Barbuda" /> Antigua and Barbuda</div></a>
<a href="'. $p .'countries/ar/Argentina">  <div class="span3"><img class="flag flag-ar" src="../../img/blank.gif" alt="Argentina" /> Argentina</div></a>
<a href="'. $p .'countries/aw/Aruba">  <div class="span3"><img class="flag flag-aw" src="../../img/blank.gif" alt="Aruba" /> Aruba</div></a>
<a href="'. $p .'countries/bs/Bahamas">  <div class="span3"><img class="flag flag-bs" src="../../img/blank.gif" alt="Bahamas" /> Bahamas</div></a>
<a href="'. $p .'countries/bb/Barbados">  <div class="span3"><img class="flag flag-bb" src="../../img/blank.gif" alt="Barbados" /> Barbados</div></a>
<a href="'. $p .'countries/bz/Belize">  <div class="span3"><img class="flag flag-bz" src="../../img/blank.gif" alt="Belize" /> Belize</div></a>
<a href="'. $p .'countries/bm/Bermuda">  <div class="span3"><img class="flag flag-bm" src="../../img/blank.gif" alt="Bermuda" /> Bermuda</div></a>
<a href="'. $p .'countries/bo/Bolivia, Plurinational State of">  <div class="span3"><img class="flag flag-bo" src="../../img/blank.gif" alt="Bolivia, Plurinational State of" /> Bolivia, Plurinational State of</div></a>
<a href="'. $p .'countries/br/Brazil">  <div class="span3"><img class="flag flag-br" src="../../img/blank.gif" alt="Brazil" /> Brazil</div></a>
<a href="'. $p .'countries/ca/Canada">  <div class="span3"><img class="flag flag-ca" src="../../img/blank.gif" alt="Canada" /> Canada</div></a>
<a href="'. $p .'countries/ky/Cayman Islands">  <div class="span3"><img class="flag flag-ky" src="../../img/blank.gif" alt="Cayman Islands" /> Cayman Islands</div></a>
<a href="'. $p .'countries/cl/Chile">  <div class="span3"><img class="flag flag-cl" src="../../img/blank.gif" alt="Chile" /> Chile</div></a>
<a href="'. $p .'countries/co/Colombia">  <div class="span3"><img class="flag flag-co" src="../../img/blank.gif" alt="Colombia" /> Colombia</div></a>
<a href="'. $p .'countries/cr/Costa Rica">  <div class="span3"><img class="flag flag-cr" src="../../img/blank.gif" alt="Costa Rica" /> Costa Rica</div></a>
<a href="'. $p .'countries/cu/Cuba">  <div class="span3"><img class="flag flag-cu" src="../../img/blank.gif" alt="Cuba" /> Cuba</div></a>
<a href="'. $p .'countries/cw/Curaçao">  <div class="span3"><img class="flag flag-cw" src="../../img/blank.gif" alt="Curaçao" /> Curaçao</div></a>
<a href="'. $p .'countries/dm/Dominica">  <div class="span3"><img class="flag flag-dm" src="../../img/blank.gif" alt="Dominica" /> Dominica</div></a>
<a href="'. $p .'countries/do/Dominican Republic">  <div class="span3"><img class="flag flag-do" src="../../img/blank.gif" alt="Dominican Republic" /> Dominican Republic</div></a>
<a href="'. $p .'countries/ec/Ecuador">  <div class="span3"><img class="flag flag-ec" src="../../img/blank.gif" alt="Ecuador" /> Ecuador</div></a>
<a href="'. $p .'countries/sv/El Salvador">  <div class="span3"><img class="flag flag-sv" src="../../img/blank.gif" alt="El Salvador" /> El Salvador</div></a>
<a href="'. $p .'countries/fk/Falkland Islands (Malvinas)">  <div class="span3"><img class="flag flag-fk" src="../../img/blank.gif" alt="Falkland Islands (Malvinas)" /> Falkland Islands (Malvinas)</div></a>
<a href="'. $p .'countries/gf/French Guiana">  <div class="span3"><img class="flag flag-gf" src="../../img/blank.gif" alt="French Guiana" /> French Guiana</div></a>
<a href="'. $p .'countries/gl/Greenland">  <div class="span3"><img class="flag flag-gl" src="../../img/blank.gif" alt="Greenland" /> Greenland</div></a>
<a href="'. $p .'countries/gd/Grenada">  <div class="span3"><img class="flag flag-gd" src="../../img/blank.gif" alt="Grenada" /> Grenada</div></a>
<a href="'. $p .'countries/gp/Guadeloupe">  <div class="span3"><img class="flag flag-gp" src="../../img/blank.gif" alt="Guadeloupe" /> Guadeloupe</div></a>
<a href="'. $p .'countries/gt/Guatemala">  <div class="span3"><img class="flag flag-gt" src="../../img/blank.gif" alt="Guatemala" /> Guatemala</div></a>
<a href="'. $p .'countries/gy/Guyana">  <div class="span3"><img class="flag flag-gy" src="../../img/blank.gif" alt="Guyana" /> Guyana</div></a>
<a href="'. $p .'countries/ht/Haiti">  <div class="span3"><img class="flag flag-ht" src="../../img/blank.gif" alt="Haiti" /> Haiti</div></a>
<a href="'. $p .'countries/hn/Honduras">  <div class="span3"><img class="flag flag-hn" src="../../img/blank.gif" alt="Honduras" /> Honduras</div></a>
<a href="'. $p .'countries/jm/Jamaica">  <div class="span3"><img class="flag flag-jm" src="../../img/blank.gif" alt="Jamaica" /> Jamaica</div></a>
<a href="'. $p .'countries/mq/Martinique">  <div class="span3"><img class="flag flag-mq" src="../../img/blank.gif" alt="Martinique" /> Martinique</div></a>
<a href="'. $p .'countries/mx/Mexico">  <div class="span3"><img class="flag flag-mx" src="../../img/blank.gif" alt="Mexico" /> Mexico</div></a>
<a href="'. $p .'countries/ms/Montserrat">  <div class="span3"><img class="flag flag-ms" src="../../img/blank.gif" alt="Montserrat" /> Montserrat</div></a>
<a href="'. $p .'countries/an/Netherlands Antilles">  <div class="span3"><img class="flag flag-an" src="../../img/blank.gif" alt="Netherlands Antilles" /> Netherlands Antilles</div></a>
<a href="'. $p .'countries/ni/Nicaragua">  <div class="span3"><img class="flag flag-ni" src="../../img/blank.gif" alt="Nicaragua" /> Nicaragua</div></a>
<a href="'. $p .'countries/pa/Panama">  <div class="span3"><img class="flag flag-pa" src="../../img/blank.gif" alt="Panama" /> Panama</div></a>
<a href="'. $p .'countries/py/Paraguay">  <div class="span3"><img class="flag flag-py" src="../../img/blank.gif" alt="Paraguay" /> Paraguay</div></a>
<a href="'. $p .'countries/pe/Peru">  <div class="span3"><img class="flag flag-pe" src="../../img/blank.gif" alt="Peru" /> Peru</div></a>
<a href="'. $p .'countries/pr/Puerto Rico">  <div class="span3"><img class="flag flag-pr" src="../../img/blank.gif" alt="Puerto Rico" /> Puerto Rico</div></a>
<a href="'. $p .'countries/kn/Saint Kitts and Nevis">  <div class="span3"><img class="flag flag-kn" src="../../img/blank.gif" alt="Saint Kitts and Nevis" /> Saint Kitts and Nevis</div></a>
<a href="'. $p .'countries/lc/Saint Lucia">  <div class="span3"><img class="flag flag-lc" src="../../img/blank.gif" alt="Saint Lucia" /> Saint Lucia</div></a>
<a href="'. $p .'countries/pm/Saint Pierre and Miquelon">  <div class="span3"><img class="flag flag-pm" src="../../img/blank.gif" alt="Saint Pierre and Miquelon" /> Saint Pierre and Miquelon</div></a>
<a href="'. $p .'countries/vc/Saint Vincent and the Grenadines">  <div class="span3"><img class="flag flag-vc" src="../../img/blank.gif" alt="Saint Vincent and the Grenadines" /> Saint Vincent and the Grenadines</div></a>
<a href="'. $p .'countries/sx/Sint Maarten">  <div class="span3"><img class="flag flag-sx" src="../../img/blank.gif" alt="Sint Maarten" /> Sint Maarten</div></a>
<a href="'. $p .'countries/sr/Suriname">  <div class="span3"><img class="flag flag-sr" src="../../img/blank.gif" alt="Suriname" /> Suriname</div></a>
<a href="'. $p .'countries/tt/Trinidad and Tobago">  <div class="span3"><img class="flag flag-tt" src="../../img/blank.gif" alt="Trinidad and Tobago" /> Trinidad and Tobago</div></a>
<a href="'. $p .'countries/tc/Turks and Caicos Islands">  <div class="span3"><img class="flag flag-tc" src="../../img/blank.gif" alt="Turks and Caicos Islands" /> Turks and Caicos Islands</div></a>
<a href="'. $p .'countries/us/United States">  <div class="span3"><img class="flag flag-us" src="../../img/blank.gif" alt="United States" /> United States</div></a>
<a href="'. $p .'countries/uy/Uruguay">  <div class="span3"><img class="flag flag-uy" src="../../img/blank.gif" alt="Uruguay" /> Uruguay</div></a>
<a href="'. $p .'countries/ve/Venezuela, Bolivarian Republic of">  <div class="span3"><img class="flag flag-ve" src="../../img/blank.gif" alt="Venezuela, Bolivarian Republic of" /> Venezuela, Bolivarian Republic of</div></a>
<a href="'. $p .'countries/vg/Virgin Islands, British">  <div class="span3"><img class="flag flag-vg" src="../../img/blank.gif" alt="Virgin Islands, British" /> Virgin Islands, British</div></a>
<a href="'. $p .'countries/vi/Virgin Islands, U.S.">  <div class="span3"><img class="flag flag-vi" src="../../img/blank.gif" alt="Virgin Islands, U.S." /> Virgin Islands, U.S.</div></a>




<legend>Asia</legend>



<a href="'. $p .'countries/af/Afghanistan">  <div class="span3"><img class="flag flag-af" src="../../img/blank.gif" alt="Afghanistan" /> Afghanistan</div></a>
<a href="'. $p .'countries/am/Armenia">  <div class="span3"><img class="flag flag-am" src="../../img/blank.gif" alt="Armenia" /> Armenia</div></a>
<a href="'. $p .'countries/az/Azerbaijan">  <div class="span3"><img class="flag flag-az" src="../../img/blank.gif" alt="Azerbaijan" /> Azerbaijan</div></a>
<a href="'. $p .'countries/bh/Bahrain">  <div class="span3"><img class="flag flag-bh" src="../../img/blank.gif" alt="Bahrain" /> Bahrain</div></a>
<a href="'. $p .'countries/bd/Bangladesh">  <div class="span3"><img class="flag flag-bd" src="../../img/blank.gif" alt="Bangladesh" /> Bangladesh</div></a>
<a href="'. $p .'countries/bt/Bhutan">  <div class="span3"><img class="flag flag-bt" src="../../img/blank.gif" alt="Bhutan" /> Bhutan</div></a>
<a href="'. $p .'countries/bn/Brunei Darussalam">  <div class="span3"><img class="flag flag-bn" src="../../img/blank.gif" alt="Brunei Darussalam" /> Brunei Darussalam</div></a>
<a href="'. $p .'countries/kh/Cambodia">  <div class="span3"><img class="flag flag-kh" src="../../img/blank.gif" alt="Cambodia" /> Cambodia</div></a>
<a href="'. $p .'countries/cn/China">  <div class="span3"><img class="flag flag-cn" src="../../img/blank.gif" alt="China" /> China</div></a>
<a href="'. $p .'countries/cy/Cyprus">  <div class="span3"><img class="flag flag-cy" src="../../img/blank.gif" alt="Cyprus" /> Cyprus</div></a>
<a href="'. $p .'countries/ge/Georgia">  <div class="span3"><img class="flag flag-ge" src="../../img/blank.gif" alt="Georgia" /> Georgia</div></a>
<a href="'. $p .'countries/hk/Hong Kong">  <div class="span3"><img class="flag flag-hk" src="../../img/blank.gif" alt="Hong Kong" /> Hong Kong</div></a>
<a href="'. $p .'countries/in/India">  <div class="span3"><img class="flag flag-in" src="../../img/blank.gif" alt="India" /> India</div></a>
<a href="'. $p .'countries/id/Indonesia">  <div class="span3"><img class="flag flag-id" src="../../img/blank.gif" alt="Indonesia" /> Indonesia</div></a>
<a href="'. $p .'countries/ir/Iran, Islamic Republic of">  <div class="span3"><img class="flag flag-ir" src="../../img/blank.gif" alt="Iran, Islamic Republic of" /> Iran, Islamic Republic of</div></a>
<a href="'. $p .'countries/iq/Iraq">  <div class="span3"><img class="flag flag-iq" src="../../img/blank.gif" alt="Iraq" /> Iraq</div></a>
<a href="'. $p .'countries/il/Israel">  <div class="span3"><img class="flag flag-il" src="../../img/blank.gif" alt="Israel" /> Israel</div></a>
<a href="'. $p .'countries/jp/Japan">  <div class="span3"><img class="flag flag-jp" src="../../img/blank.gif" alt="Japan" /> Japan</div></a>
<a href="'. $p .'countries/jo/Jordan">  <div class="span3"><img class="flag flag-jo" src="../../img/blank.gif" alt="Jordan" /> Jordan</div></a>
<a href="'. $p .'countries/kz/Kazakhstan">  <div class="span3"><img class="flag flag-kz" src="../../img/blank.gif" alt="Kazakhstan" /> Kazakhstan</div></a>
<a href="'. $p .'countries/kp/Korea, Democratic People\'s Republic of">  <div class="span3"><img class="flag flag-kp" src="../../img/blank.gif" alt="Korea, Democratic People\'s Republic of" /> Korea, Democratic People\'s Republic of</div></a>
<a href="'. $p .'countries/kr/Korea, Republic of">  <div class="span3"><img class="flag flag-kr" src="../../img/blank.gif" alt="Korea, Republic of" /> Korea, Republic of</div></a>
<a href="'. $p .'countries/kw/Kuwait">  <div class="span3"><img class="flag flag-kw" src="../../img/blank.gif" alt="Kuwait" /> Kuwait</div></a>
<a href="'. $p .'countries/kg/Kyrgyzstan">  <div class="span3"><img class="flag flag-kg" src="../../img/blank.gif" alt="Kyrgyzstan" /> Kyrgyzstan</div></a>
<a href="'. $p .'countries/la/Lao People\'s Democratic Republic">  <div class="span3"><img class="flag flag-la" src="../../img/blank.gif" alt="Lao People\'s Democratic Republic" /> Lao People\'s Democratic Republic</div></a>
<a href="'. $p .'countries/lb/Lebanon">  <div class="span3"><img class="flag flag-lb" src="../../img/blank.gif" alt="Lebanon" /> Lebanon</div></a>
<a href="'. $p .'countries/mo/Macao">  <div class="span3"><img class="flag flag-mo" src="../../img/blank.gif" alt="Macao" /> Macao</div></a>
<a href="'. $p .'countries/my/Malaysia">  <div class="span3"><img class="flag flag-my" src="../../img/blank.gif" alt="Malaysia" /> Malaysia</div></a>
<a href="'. $p .'countries/mv/Maldives">  <div class="span3"><img class="flag flag-mv" src="../../img/blank.gif" alt="Maldives" /> Maldives</div></a>
<a href="'. $p .'countries/mn/Mongolia">  <div class="span3"><img class="flag flag-mn" src="../../img/blank.gif" alt="Mongolia" /> Mongolia</div></a>
<a href="'. $p .'countries/mm/Myanmar">  <div class="span3"><img class="flag flag-mm" src="../../img/blank.gif" alt="Myanmar" /> Myanmar</div></a>
<a href="'. $p .'countries/np/Nepal">  <div class="span3"><img class="flag flag-np" src="../../img/blank.gif" alt="Nepal" /> Nepal</div></a>
<a href="'. $p .'countries/om/Oman">  <div class="span3"><img class="flag flag-om" src="../../img/blank.gif" alt="Oman" /> Oman</div></a>
<a href="'. $p .'countries/pk/Pakistan">  <div class="span3"><img class="flag flag-pk" src="../../img/blank.gif" alt="Pakistan" /> Pakistan</div></a>
<a href="'. $p .'countries/ps/Palestinian Territory, Occupied">  <div class="span3"><img class="flag flag-ps" src="../../img/blank.gif" alt="Palestinian Territory, Occupied" /> Palestinian Territory, Occupied</div></a>
<a href="'. $p .'countries/ph/Philippines">  <div class="span3"><img class="flag flag-ph" src="../../img/blank.gif" alt="Philippines" /> Philippines</div></a>
<a href="'. $p .'countries/qa/Qatar">  <div class="span3"><img class="flag flag-qa" src="../../img/blank.gif" alt="Qatar" /> Qatar</div></a>
<a href="'. $p .'countries/sa/Saudi Arabia">  <div class="span3"><img class="flag flag-sa" src="../../img/blank.gif" alt="Saudi Arabia" /> Saudi Arabia</div></a>
<a href="'. $p .'countries/sg/Singapore">  <div class="span3"><img class="flag flag-sg" src="../../img/blank.gif" alt="Singapore" /> Singapore</div></a>
<a href="'. $p .'countries/lk/Sri Lanka">  <div class="span3"><img class="flag flag-lk" src="../../img/blank.gif" alt="Sri Lanka" /> Sri Lanka</div></a>
<a href="'. $p .'countries/sy/Syrian Arab Republic">  <div class="span3"><img class="flag flag-sy" src="../../img/blank.gif" alt="Syrian Arab Republic" /> Syrian Arab Republic</div></a>
<a href="'. $p .'countries/tw/Taiwan, Province of China">  <div class="span3"><img class="flag flag-tw" src="../../img/blank.gif" alt="Taiwan, Province of China" /> Taiwan, Province of China</div></a>
<a href="'. $p .'countries/tj/Tajikistan">  <div class="span3"><img class="flag flag-tj" src="../../img/blank.gif" alt="Tajikistan" /> Tajikistan</div></a>
<a href="'. $p .'countries/th/Thailand">  <div class="span3"><img class="flag flag-th" src="../../img/blank.gif" alt="Thailand" /> Thailand</div></a>
<a href="'. $p .'countries/tl/Timor-Leste">  <div class="span3"><img class="flag flag-tl" src="../../img/blank.gif" alt="Timor-Leste" /> Timor-Leste</div></a>
<a href="'. $p .'countries/tr/Turkey">  <div class="span3"><img class="flag flag-tr" src="../../img/blank.gif" alt="Turkey" /> Turkey</div></a>
<a href="'. $p .'countries/tm/Turkmenistan">  <div class="span3"><img class="flag flag-tm" src="../../img/blank.gif" alt="Turkmenistan" /> Turkmenistan</div></a>
<a href="'. $p .'countries/ae/United Arab Emirates">  <div class="span3"><img class="flag flag-ae" src="../../img/blank.gif" alt="United Arab Emirates" /> United Arab Emirates</div></a>
<a href="'. $p .'countries/uz/Uzbekistan">  <div class="span3"><img class="flag flag-uz" src="../../img/blank.gif" alt="Uzbekistan" /> Uzbekistan</div></a>
<a href="'. $p .'countries/vn/Viet Nam">  <div class="span3"><img class="flag flag-vn" src="../../img/blank.gif" alt="Viet Nam" /> Viet Nam</div></a>
<a href="'. $p .'countries/ye/Yemen">  <div class="span3"><img class="flag flag-ye" src="../../img/blank.gif" alt="Yemen" /> Yemen</div></a>

<legend>Australia and Oceania</legend>


<a href="'. $p .'countries/as/American Samoa">  <div class="span3"><img class="flag flag-as" src="../../img/blank.gif" alt="American Samoa" /> American Samoa</div></a>
<a href="'. $p .'countries/au/Australia">  <div class="span3"><img class="flag flag-au" src="../../img/blank.gif" alt="Australia" /> Australia</div></a>
<a href="'. $p .'countries/ck/Cook Islands">  <div class="span3"><img class="flag flag-ck" src="../../img/blank.gif" alt="Cook Islands" /> Cook Islands</div></a>
<a href="'. $p .'countries/fj/Fiji">  <div class="span3"><img class="flag flag-fj" src="../../img/blank.gif" alt="Fiji" /> Fiji</div></a>
<a href="'. $p .'countries/pf/French Polynesia">  <div class="span3"><img class="flag flag-pf" src="../../img/blank.gif" alt="French Polynesia" /> French Polynesia</div></a>
<a href="'. $p .'countries/gu/Guam">  <div class="span3"><img class="flag flag-gu" src="../../img/blank.gif" alt="Guam" /> Guam</div></a>
<a href="'. $p .'countries/ki/Kiribati">  <div class="span3"><img class="flag flag-ki" src="../../img/blank.gif" alt="Kiribati" /> Kiribati</div></a>
<a href="'. $p .'countries/mh/Marshall Islands">  <div class="span3"><img class="flag flag-mh" src="../../img/blank.gif" alt="Marshall Islands" /> Marshall Islands</div></a>
<a href="'. $p .'countries/fm/Micronesia, Federated States of">  <div class="span3"><img class="flag flag-fm" src="../../img/blank.gif" alt="Micronesia, Federated States of" /> Micronesia, Federated States of</div></a>
<a href="'. $p .'countries/nr/Nauru">  <div class="span3"><img class="flag flag-nr" src="../../img/blank.gif" alt="Nauru" /> Nauru</div></a>
<a href="'. $p .'countries/nc/New Caledonia">  <div class="span3"><img class="flag flag-nc" src="../../img/blank.gif" alt="New Caledonia" /> New Caledonia</div></a>
<a href="'. $p .'countries/nz/New Zealand">  <div class="span3"><img class="flag flag-nz" src="../../img/blank.gif" alt="New Zealand" /> New Zealand</div></a>
<a href="'. $p .'countries/nu/Niue">  <div class="span3"><img class="flag flag-nu" src="../../img/blank.gif" alt="Niue" /> Niue</div></a>
<a href="'. $p .'countries/nf/Norfolk Island">  <div class="span3"><img class="flag flag-nf" src="../../img/blank.gif" alt="Norfolk Island" /> Norfolk Island</div></a>
<a href="'. $p .'countries/mp/Northern Mariana Islands">  <div class="span3"><img class="flag flag-mp" src="../../img/blank.gif" alt="Northern Mariana Islands" /> Northern Mariana Islands</div></a>
<a href="'. $p .'countries/pw/Palau">  <div class="span3"><img class="flag flag-pw" src="../../img/blank.gif" alt="Palau" /> Palau</div></a>
<a href="'. $p .'countries/pg/Papua New Guinea">  <div class="span3"><img class="flag flag-pg" src="../../img/blank.gif" alt="Papua New Guinea" /> Papua New Guinea</div></a>
<a href="'. $p .'countries/pn/Pitcairn">  <div class="span3"><img class="flag flag-pn" src="../../img/blank.gif" alt="Pitcairn" /> Pitcairn</div></a>
<a href="'. $p .'countries/ws/Samoa">  <div class="span3"><img class="flag flag-ws" src="../../img/blank.gif" alt="Samoa" /> Samoa</div></a>
<a href="'. $p .'countries/sb/Solomon Islands">  <div class="span3"><img class="flag flag-sb" src="../../img/blank.gif" alt="Solomon Islands" /> Solomon Islands</div></a>
<a href="'. $p .'countries/tk/Tokelau">  <div class="span3"><img class="flag flag-tk" src="../../img/blank.gif" alt="Tokelau" /> Tokelau</div></a>
<a href="'. $p .'countries/to/Tonga">  <div class="span3"><img class="flag flag-to" src="../../img/blank.gif" alt="Tonga" /> Tonga</div></a>
<a href="'. $p .'countries/tv/Tuvalu">  <div class="span3"><img class="flag flag-tv" src="../../img/blank.gif" alt="Tuvalu" /> Tuvalu</div></a>
<a href="'. $p .'countries/vu/Vanuatu">  <div class="span3"><img class="flag flag-vu" src="../../img/blank.gif" alt="Vanuatu" /> Vanuatu</div></a>
<a href="'. $p .'countries/wf/Wallis and Futuna">  <div class="span3"><img class="flag flag-wf" src="../../img/blank.gif" alt="Wallis and Futuna" /> Wallis and Futuna</div></a>

<legend>Europe</legend>


<a href="'. $p .'countries/al/Albania">  <div class="span3"><img class="flag flag-al" src="../../img/blank.gif" alt="Albania" /> Albania</div></a>
<a href="'. $p .'countries/ad/Andorra">  <div class="span3"><img class="flag flag-ad" src="../../img/blank.gif" alt="Andorra" /> Andorra</div></a>
<a href="'. $p .'countries/at/Austria">  <div class="span3"><img class="flag flag-at" src="../../img/blank.gif" alt="Austria" /> Austria</div></a>
<a href="'. $p .'countries/by/Belarus">  <div class="span3"><img class="flag flag-by" src="../../img/blank.gif" alt="Belarus" /> Belarus</div></a>
<a href="'. $p .'countries/be/Belgium">  <div class="span3"><img class="flag flag-be" src="../../img/blank.gif" alt="Belgium" /> Belgium</div></a>
<a href="'. $p .'countries/ba/Bosnia and Herzegovina">  <div class="span3"><img class="flag flag-ba" src="../../img/blank.gif" alt="Bosnia and Herzegovina" /> Bosnia and Herzegovina</div></a>
<a href="'. $p .'countries/bg/Bulgaria">  <div class="span3"><img class="flag flag-bg" src="../../img/blank.gif" alt="Bulgaria" /> Bulgaria</div></a>
<a href="'. $p .'countries/hr/Croatia">  <div class="span3"><img class="flag flag-hr" src="../../img/blank.gif" alt="Croatia" /> Croatia</div></a>
<a href="'. $p .'countries/cz/Czech Republic">  <div class="span3"><img class="flag flag-cz" src="../../img/blank.gif" alt="Czech Republic" /> Czech Republic</div></a>
<a href="'. $p .'countries/dk/Denmark">  <div class="span3"><img class="flag flag-dk" src="../../img/blank.gif" alt="Denmark" /> Denmark</div></a>
<a href="'. $p .'countries/ee/Estonia">  <div class="span3"><img class="flag flag-ee" src="../../img/blank.gif" alt="Estonia" /> Estonia</div></a>
<a href="'. $p .'countries/fo/Faroe Islands">  <div class="span3"><img class="flag flag-fo" src="../../img/blank.gif" alt="Faroe Islands" /> Faroe Islands</div></a>
<a href="'. $p .'countries/fi/Finland">  <div class="span3"><img class="flag flag-fi" src="../../img/blank.gif" alt="Finland" /> Finland</div></a>
<a href="'. $p .'countries/fr/France">  <div class="span3"><img class="flag flag-fr" src="../../img/blank.gif" alt="France" /> France</div></a>
<a href="'. $p .'countries/de/Germany">  <div class="span3"><img class="flag flag-de" src="../../img/blank.gif" alt="Germany" /> Germany</div></a>
<a href="'. $p .'countries/gi/Gibraltar">  <div class="span3"><img class="flag flag-gi" src="../../img/blank.gif" alt="Gibraltar" /> Gibraltar</div></a>
<a href="'. $p .'countries/gr/Greece">  <div class="span3"><img class="flag flag-gr" src="../../img/blank.gif" alt="Greece" /> Greece</div></a>
<a href="'. $p .'countries/va/Holy See (Vatican City State)">  <div class="span3"><img class="flag flag-va" src="../../img/blank.gif" alt="Holy See (Vatican City State)" /> Holy See (Vatican City State)</div></a>
<a href="'. $p .'countries/hu/Hungary">  <div class="span3"><img class="flag flag-hu" src="../../img/blank.gif" alt="Hungary" /> Hungary</div></a>
<a href="'. $p .'countries/is/Iceland">  <div class="span3"><img class="flag flag-is" src="../../img/blank.gif" alt="Iceland" /> Iceland</div></a>
<a href="'. $p .'countries/ie/Ireland">  <div class="span3"><img class="flag flag-ie" src="../../img/blank.gif" alt="Ireland" /> Ireland</div></a>
<a href="'. $p .'countries/it/Italy">  <div class="span3"><img class="flag flag-it" src="../../img/blank.gif" alt="Italy" /> Italy</div></a>
<a href="'. $p .'countries/lv/Latvia">  <div class="span3"><img class="flag flag-lv" src="../../img/blank.gif" alt="Latvia" /> Latvia</div></a>
<a href="'. $p .'countries/li/Liechtenstein">  <div class="span3"><img class="flag flag-li" src="../../img/blank.gif" alt="Liechtenstein" /> Liechtenstein</div></a>
<a href="'. $p .'countries/lt/Lithuania">  <div class="span3"><img class="flag flag-lt" src="../../img/blank.gif" alt="Lithuania" /> Lithuania</div></a>
<a href="'. $p .'countries/lu/Luxembourg">  <div class="span3"><img class="flag flag-lu" src="../../img/blank.gif" alt="Luxembourg" /> Luxembourg</div></a>
<a href="'. $p .'countries/mk/Macedonia, The Former Yugoslav Republic of">  <div class="span3"><img class="flag flag-mk" src="../../img/blank.gif" alt="Macedonia, The Former Yugoslav Republic of" /> Macedonia, The Former Yugoslav Republic of</div></a>
<a href="'. $p .'countries/mt/Malta">  <div class="span3"><img class="flag flag-mt" src="../../img/blank.gif" alt="Malta" /> Malta</div></a>
<a href="'. $p .'countries/md/Moldova, Republic of">  <div class="span3"><img class="flag flag-md" src="../../img/blank.gif" alt="Moldova, Republic of" /> Moldova, Republic of</div></a>
<a href="'. $p .'countries/mc/Monaco">  <div class="span3"><img class="flag flag-mc" src="../../img/blank.gif" alt="Monaco" /> Monaco</div></a>
<a href="'. $p .'countries/me/Montenegro">  <div class="span3"><img class="flag flag-me" src="../../img/blank.gif" alt="Montenegro" /> Montenegro</div></a>
<a href="'. $p .'countries/nl/Netherlands">  <div class="span3"><img class="flag flag-nl" src="../../img/blank.gif" alt="Netherlands" /> Netherlands</div></a>
<a href="'. $p .'countries/no/Norway">  <div class="span3"><img class="flag flag-no" src="../../img/blank.gif" alt="Norway" /> Norway</div></a>
<a href="'. $p .'countries/pl/Poland">  <div class="span3"><img class="flag flag-pl" src="../../img/blank.gif" alt="Poland" /> Poland</div></a>
<a href="'. $p .'countries/pt/Portugal">  <div class="span3"><img class="flag flag-pt" src="../../img/blank.gif" alt="Portugal" /> Portugal</div></a>
<a href="'. $p .'countries/ro/Romania">  <div class="span3"><img class="flag flag-ro" src="../../img/blank.gif" alt="Romania" /> Romania</div></a>
<a href="'. $p .'countries/ru/Russian Federation">  <div class="span3"><img class="flag flag-ru" src="../../img/blank.gif" alt="Russian Federation" /> Russian Federation</div></a>
<a href="'. $p .'countries/sm/San Marino">  <div class="span3"><img class="flag flag-sm" src="../../img/blank.gif" alt="San Marino" /> San Marino</div></a>
<a href="'. $p .'countries/rs/Serbia">  <div class="span3"><img class="flag flag-rs" src="../../img/blank.gif" alt="Serbia" /> Serbia</div></a>
<a href="'. $p .'countries/sk/Slovakia">  <div class="span3"><img class="flag flag-sk" src="../../img/blank.gif" alt="Slovakia" /> Slovakia</div></a>
<a href="'. $p .'countries/si/Slovenia">  <div class="span3"><img class="flag flag-si" src="../../img/blank.gif" alt="Slovenia" /> Slovenia</div></a>
<a href="'. $p .'countries/es/Spain">  <div class="span3"><img class="flag flag-es" src="../../img/blank.gif" alt="Spain" /> Spain</div></a>
<a href="'. $p .'countries/se/Sweden">  <div class="span3"><img class="flag flag-se" src="../../img/blank.gif" alt="Sweden" /> Sweden</div></a>
<a href="'. $p .'countries/ch/Switzerland">  <div class="span3"><img class="flag flag-ch" src="../../img/blank.gif" alt="Switzerland" /> Switzerland</div></a>
<a href="'. $p .'countries/ua/Ukraine">  <div class="span3"><img class="flag flag-ua" src="../../img/blank.gif" alt="Ukraine" /> Ukraine</div></a>
<a href="'. $p .'countries/gb/United Kingdom">  <div class="span3"><img class="flag flag-gb" src="../../img/blank.gif" alt="United Kingdom" /> United Kingdom</div></a>



<br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br />';

}

?>

<?php require_once('php/footer.php'); ?>



</div>




</body>
</html>
