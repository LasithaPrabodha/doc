<?php
$editId = $_POST['EID'];
require '../includes/sql.php';

$con = db_connect();
$sql = 'select * from feedbacks where f_id=' . $editId;
$resultSet = $con->query($sql);
while ($row = $resultSet->fetch_array()) {
    $fid= $row['f_id'];
    $name=$row['name']; 
    $email= $row['email'];
    $sub=$row['subject']; 
    $contnt=$row['content']; 
}

?>
<form class="form-horizontal">
<fieldset>



<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Feedback ID:</label>  
  <div class="col-md-4">
      <p><?PHP echo $fid;?></p>
  </div>
</div>

    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">User Name:</label>  
  <div class="col-md-4">
      <p><?PHP echo $name;?></p>
  </div>
</div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email:</label>  
  <div class="col-md-4">
      <p><?PHP echo $email;?></p>
  </div>
</div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Subject:</label>  
  <div class="col-md-4">
      <p><?PHP echo $sub; ?></p>
  </div>
</div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Content:</label>  
  <div class="col-md-4">
      <p><?PHP echo $contnt;?></p>
  </div>
</div>
</fieldset>
</form>