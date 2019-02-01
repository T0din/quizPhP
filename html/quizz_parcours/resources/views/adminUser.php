<?= view('layouts/header')?>

<a href="<?= route('adminTag')?>"> <button type="submit" class="btn btn-primary btn-subject">Tag</button></a>
<a href="<?= route('adminQuizz')?>"> <button type="submit" class="btn btn-primary btn-subject">Quizz</button></a>
<h1>USER</h1>
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>Ajout nouveau utilisateur</div>

            </div>
            <div class="card-body">
                <form action="<?= route('adminPostUserAdd'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
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
                <form action="<?= route('adminPostUserUpdate'); ?>" method="post">
                    <div class="form-group">
                        <label for="platform">Utilisateurs</label>
                        <select class="custom-select" id="platform_id" name="user">
                            <option>-</option>
                            
                               
                            <?php foreach($userList as $user): ?>
                                <option name="<?= $user->id ?>" value="<?= $user->id ?>"> 
                                    <?= $user->name ?>
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
                <form action="<?= route('adminPostUserDelete'); ?>" method="post">
                <div class="form-group">
                        <label for="platform">Utilisateurs</label>
                        <select class="custom-select" id="platform_id" name="tag">
                            <option>-</option>
                            
                               
                            <?php foreach($userList as $user): ?>
                                <option name="<?= $user->id ?>" value="<?= $user->id ?>"> 
                                    <?= $user->name ?>
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