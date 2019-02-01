<?= view('layouts/header')?>

<a href="<?= route('adminTag')?>"> <button type="submit" class="btn btn-primary btn-subject">Tag</button></a>
<a href="<?= route('adminQuizz')?>"> <button type="submit" class="btn btn-primary btn-subject">Quizz</button></a>
<a href="<?= route('adminUser')?>"> <button type="submit" class="btn btn-primary btn-subject">Users</button></a>

 <?= view('layouts/footer')?>