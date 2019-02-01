<?= view('layouts/header')?>


<?php if (!empty($errorList)) : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    <?php foreach ($errorList as $currentError) : ?>
        <?= $currentError ?><br>
    <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="<?= route('signinPost')?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">  Connexion</a></button>
</form>
 <button type="submit"  class="btn btn-primary"><a  href="<?php echo (route('signup'));?>"><font color="white">Pas encore de compte ?</font></a></button>

 <?= view('layouts/footer')?>