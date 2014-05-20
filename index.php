<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <?php 
    require_once('php/config.php'); 

    $p = $installation_path;

    //random feature

    $radios = file('php/random.txt');
    $random = explode('xXxDeLXxX',$radios[rand(0,count($radios) - 1)]);
    $rstream = trim($random[0]);
    $rtitle = trim($random[1]);


    ?>
    <meta charset="utf-8">
    <title><?php print htmlentities($site_name,ENT_QUOTES) . ' | ' . htmlentities($site_slogan,ENT_QUOTES) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php print htmlentities($site_meta_description,ENT_QUOTES); ?>">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <!--<link href="css/layout.css" rel="stylesheet">-->
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootswatch.css" rel="stylesheet">
    <link href="css/flags.css" rel="stylesheet">

    <script src="js/jQuery.js"></script>
    <script src="js/jquery.smooth-scroll.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootswatch.js"></script>

    <script>

    function gosearch(){
    	 url =  <?php print "'" . $p . "'"; ?> + 'search/string/' + document.getElementById('q2').value;  
         window.location = url;
    }

    $(document).ready(function() {
        
        $(function(){
             $("#q").keyup(function(e){
                  if (e.keyCode === 13) {
                    url =  <?php print "'" . $p . "'"; ?> + 'search/string/' + document.getElementById('q').value;  
                    window.location = url;
                  }
             });

        });

         $(function(){
             $("#q2").keyup(function(e){
                  if (e.keyCode === 13) {
                    url =  <?php print "'" . $p . "'"; ?> + 'search/string/' + document.getElementById('q2').value;  
                    window.location = url;
                  }
             });

        });

    });

    </script>



 </head>

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
    

  <!-- Navbar
    ================================================== -->
    <?php require_once('php/navbar.php'); ?>



<div class="container">

<?php

$count = json_decode(get('http://dirble.com/dirapi/amountStation/apikey/' . $api_key));
$count = $count->amount;


?>

<center>
<h1 style="font-size:80px;"><?php print $site_name; ?></h1>
<br />
<p><?php print $site_slogan; ?></p><br />
        <input type="text" name="q" id="q2" value="" class="span6" style="padding: 10px !important;font-size: 18px !important;" placeholder="Search for a genre/artist/song">
        <button type="button" value="" class="btn" style="padding: 10px !important;font-size: 16px !important;margin-top: -10px;" onclick="gosearch();">Search</button>
      
 <p>Currently, there are <?php print $count; ?> radio stations you can choose from.</p>
</center>


<?php require_once('php/footer.php'); ?>


</div>




</body>
</html>
