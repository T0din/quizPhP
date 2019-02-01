<?= view('layouts/header')?>

            <div class="row">
                <h2> Sujet : <?=$tagsIdInfo[0]->name?> </h2>
                <a href="<?= route('tags')?>"> <button type="submit" class="btn btn-primary">retour</button></a>
            </div>

            <div class="row">
            <?php foreach($quizzByTag as $quizz): ?>
            <?php //dump($quizz) ?>
            <div class="col-sm-4">
            <h3 class="text-blue"><a href="<?= route('quizzId', ['id' => $quizz->id ])?>"><?= $quizz->title ?></a></h3>      
                    </div>
                    <?php endforeach;?>
            </div>
            <?= view('layouts/footer')?>