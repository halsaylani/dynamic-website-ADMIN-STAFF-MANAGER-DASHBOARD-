<?php require_once '../app/views/templates/header.php' ?>

  <?php if(isset($data['successfully'])){ ?>
    <div class="alert alert-dismissible alert-success"><?=$data['successfully']?></div>
  <?php } ?>
  <?php if(isset($data['message'])){ ?>
    <div class="alert alert-dismissible alert-danger"><?=$data['message']?></div>
  <?php } ?>
  <script src="/js/emailvalidation.js"></script>
<form method="post" action="clientsinfo/index" >
<fieldset>
    <h1> Enter client informations</h1>
    <h2>your role is: <?=$_SESSION['role']?></h2>
    <div class="form-group">
      <label for="exampleUsername">Client's Name</label>
      <div class="col-lg-3">
      <input class="form-control" placeholder="Client's Name" type="text" name="cname" >
    </div>
  </div>
     <div class="form-group">
      <label for="emailaddress">Email Address</label>
      <div class="col-lg-3">

      <input  class="form-control" placeholder="Email Address" type="text" name="cemail" id="txtEmail" onchange="ValidateEmail(this.value);"> 
      </div>
    <div class="form-group">
      <label for="phonenumber">Phone Number</label>
      <div class="col-lg-3">
      <input class="form-control" placeholder="Phone Number" type="tel" name="cpnumber" >
    </div>
    <div class="form-group">
      <label for="birthdate">Birth Date</label>
      <div class="col-lg-3">
      <input class="form-control" placeholder="Birth Date" type="date" name="cbdate" >
       <div class="form-group">
  </fieldset>
  <button type="submit" name = "add" class="btn btn-primary" >add</button>
</form>
    <?php require_once '../app/views/templates/footer.php' ?>
    
