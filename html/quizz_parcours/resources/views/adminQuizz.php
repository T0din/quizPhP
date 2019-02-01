<?= view('layouts/header')?>

<a href="<?= route('adminTag')?>"> <button type="submit" class="btn btn-primary btn-subject">Tag</button></a>
<a href="<?= route('adminUser')?>"> <button type="submit" class="btn btn-primary btn-subject">Users</button></a>
<h1>QUIZZ</h1>
<?php if(!empty($msgList)): ?>
    <?php foreach($msgList as $currentMsg): ?>
        <div class="alert alert-danger" role="alert">
            <?= $currentMsg ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>Ajout nouveau quizz</div>

            </div>
            <div class="card-body">
                <form action="<?= route('adminPostQuizzAdd'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Titre</label>
                        <input type="text" class="form-control" name="title" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>Modify</div>

            </div>
            <div class="card-body">
                <form action="<?= route('adminPostQuizzUpdate'); ?>" method="post">
                    <div class="form-group">
                        <label for="platform">Sujets</label>
                        <select class="custom-select" id="platform_id" name="quizz">
                            <option>-</option>
                            
                               
                            <?php foreach($quizzList as $quizz): ?>
                                <option name="<?= $quizz->id ?>" value="<?= $quizz->id ?>"> 
                                    <?= $quizz->title ?>
                                </option>
                                
                            <?php endforeach;?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nouveau nom</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="status">Statut</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Modifier</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>Delete</div>

            </div>
            <div class="card-body">
                <form action="<?= route('adminPostQuizzDelete'); ?>" method="post">
                <div class="form-group">
                        <label for="platform">Sujets</label>
                        <select class="custom-select" id="platform_id" name="tag">
                            <option>-</option>
                            
                               
                            <?php foreach($quizzList as $quizz): ?>
                                <option name="<?= $quizz->id ?>" value="<?= $quizz->id ?>"> 
                                    <?= $quizz->title ?>
                                </option>
                                
                            <?php endforeach;?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Supprimer</button>

                </form>
            </div>
        </div>
    </div>
</div>

 <?= view('layouts/footer')?>