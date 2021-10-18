<?php
session_start();

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
  $numbers = range($min, $max);
  shuffle($numbers);
  return array_slice($numbers, 0, $quantity);
}

$_SESSION['set1']=  UniqueRandomNumbersWithinRange(0,15,7);
$_SESSION['set2'] =  UniqueRandomNumbersWithinRange(2,20,6);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sets</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/form.js"></script>
  <script src="js/form-main.js"></script>
<style>
form .error{
    color: red;
}
</style>
</head>
<body>

<div class="container">
    <div class="row">
    <div class="col-sm-8">
       <h2>Sets operation</h2>
        <p> SET 1= [<?= implode(',', $_SESSION['set1']); ?> ] </p>
        <p> SET 2= [<?= implode(',', $_SESSION['set2']); ?>] </p>

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Set</a></li>
        <li><a data-toggle="tab" href="#tab2">Operation</a></li>
      </ul>




      <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
        <br>
        <form action="submitsets.php" method="POST" id="set-from">
            <input type="hidden" value="set1" name="step1">

             <div class="form-group">
              <label for="set">Select Predefined Set:</label>
              <select class="form-control required" id="set" name="set">
                <option value="">Select</option>
                <option value="set1">1</option>
                <option value="set2">2</option>
              </select>
            </div>

            <div class="form-group">
                <label for="opertion">Select Operation:</label>
                <select class="form-control required" id="opertion" name="opertion">
                  <option value="">Select</option>
                  <option value="1">Add number</option>
                  <option value="2">Check number (in set)</option>
                  <option value="3">Remove number</option>
                  <option value="4">get set</option>
                </select>
                <br>
                <input type="text" class="form-control required number cleanup" id="number" placeholder="Enter number" name="number" maxlength="5" value="">
            </div>

            <div id="loading1"  align="center" style="display:none;">
              <img src="./img/ajax-loader.gif"/>
            </div>
            <div id="msg" style="display: none"></div>

            <button type="submit" class="btn btn-default" id="submit-number">submit number</button>
            <br/>
            <br/>
            <div id="response"></div>
         </form>
       </div>
      <div id="tab2" class="tab-pane fade">
      <br>
      <form action="submitsets.php" method="POST" id="set-frm">
      <input type="hidden" value="set1" name="step2">
        <div class="form-group">
            <label for="sel1">Select another opertion</label>
            <select class="form-control required" id="sel3" name="opertion">
                <option value="">select</option>
                <option value="union">Union</option>
                <option value="intersection">intersection</option>
            </select>
        </div>
        <div id="loading1"  align="center" style="display:none;">
            <img src="http://demo.aminfocraft.com/imenex/assets/img/ajax-loader.gif"/>
         </div>
        <div id="msg" style="display: none"></div>
        <button type="submit" class="btn btn-default">FInal Result</button>
        <br />
        <br/>
        <div id="response2"></div>
        <br>
        <br>
        </form>

        </div>

        </div>
      </div>
    </div>
</div>
<script>

function showresult(){

  var html='<p>'+arguments[0]+'</p>';
   html +='<p>'+arguments[1]+'= ['+jobj.data.join(',')+']</p>';
   $('div#response').html(html).focus();
}

function showresul2(){
  var html ='<p>New sets= ['+jobj.data.join(',')+']</p>';
  $('div#response2').html(html).focus();
}

$(document).ready(function() {
    setForm('set-from');

    $("#opertion ").change(function(){

      if($(this).val()==4){
        $('#number').hide();
      }
      else{
        $('#number').show();
      }

    });


    setForm('set-frm');
});
</script>
</body>
</html>
