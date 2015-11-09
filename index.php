<?php
		include 'ContentChecker.php';
		use ctrlbox\ContentChecker as cc;
		
if(isset($_POST['parse'])){
		cc::setFormat('json');
		cc::displayAll(1);
		if(isset($_POST['url']) && !empty($_POST['url'])){
			$check = cc::checkUrl($_POST['url']);
		}elseif(isset($_POST['rawdata']) && !empty($_POST['rawdata'])){
			$check = cc::checkData($_POST['rawdata']);
		}
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Content Checker v2</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<style>
/* Move down content because we have a fixed navbar that is 50px tall */

body {
  background-image: url("http://siph0n.in/index_files/dot.gif");
	padding-top: 50px;
	padding-bottom: 20px;
}
#scanresults {
  color: #fff;
}
#jumbo {
  background-color: transparent;
}
#credits {
  color: #fff;
}

</style>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<center>
<img src="http://forum.siph0n.in/images/cleandark/logo.png"/>
<div id="jumbo" class="jumbotron" style="width:50%;">
<div class="container">
<div class="inner_body text-center">
  <form class="form" method="post" name="checker" role="form">
    <div class="panel-group" id="accordion">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-link"></span>Check URL</a></h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse ">
          <div class="panel-body">
            <input class="form-control" type="url" name="url" id="url" placeholder="Enter an URL.." />
          </div>
        </div>
      </div>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-pencil"></span>Check Raw Text</a></h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="panel-body">
            <textarea class="form-control" name="rawdata" id="rawdata" placeholder="Enter any type of raw data" rows="10"></textarea>
          </div>
        </div>
      </div>
    </div>
    <button name="parse" id="parse" type="button" class="btn btn-success" role="button" >CHECK <br>
<span class="glyphicon glyphicon-upload"></span></button>
  </form>
  </div>
</div>
</div>
<div class="container">
<div class="inner_body text-center">
  <div id="scanresults">- Results will display here -</div>
  <hr>
</div>
<footer id="credits">
  Credits: <a href="https://github.com/83leej/ContentChecker-php5">https://github.com/83leej/ContentChecker-php5</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> 
<script>
$( "#parse" ).click(function(){
	var toparseUrl = $( "#url" ).val()
    $.ajax({
        url: "index.php",
        type: "POST",
        cache: false,
        data: { parse:true, url: toparseUrl, rawdata: $( "#rawdata" ).val() },
        success : function(html){
			var newhtml = JSON.parse(html);
			makeResults(newhtml);
        },
        complete : function(html){
       },
        error : function(event, request, settings){
			var newhtml = event.responseText;
            $("#scanresults").html(newhtml);
        }
	});
});

	function makeResults (returnData) { 
		console.log(returnData);
		var div = document.createElement('div');
		div.id = 'cc_found_content';
		document.getElementById("scanresults").appendChild(div);
		var divis = document.createElement('div');
		divis.id = 'cc_found_content_raw';
		document.getElementById("scanresults").appendChild(divis);
		document.getElementById(div.id).innerHTML 		= "<h2> "+Object.keys(returnData).length+" Data types detected</h2>";
		for ( var obj in returnData ) {
			document.getElementById(div.id).innerHTML 		+= '<strong>Total '+returnData[obj].desc+'</strong> '+returnData[obj].total+'<br>';
			//document.getElementById(divis.id).innerHTML 		+= '<div class="alert alert-success" role="alert"><strong>Raw '+obj+'</strong>'+returnData[obj].raw+'</div>';
		}
	}
$( "#rawdata").click(function(){
	$( "#url").val(null)
});
$( "#url").click(function(){
	$( "#rawdata").val(null)
});
</script>
</body>
</html>
<?php
	}
	?>
