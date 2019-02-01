
<?= view('layouts/header')?>
            <div class="row home">
                <h2> Bienvenue sur O'Quiz </h2>
                <h3 class="home-hello">Bonjour
                
                  <?php if($isConnected): ?>
                  <?= ($isAdmin)?"ADMIN ":"" ?>
                  <?= $currentUser->firstname; ?>
                  <?php endif; ?>
                  </h3>

                <?php if($isConnected): ?>
                <a href="<?= route('tags')?>"> <button type="submit" class="btn btn-primary btn-subject">Sujets de quizz</button></a>
                <?php endif; ?>
                <p>

                <?php if($isAdmin): ?>
                <a href="<?= route('admin')?>"> <button type="submit" class="btn btn-primary btn-subject">Admin</button></a>
                <?php endif; ?>
                <p>

                Un quiz (prononcé « kiz » ou « kouïz ») est un jeu qui consiste en un questionnaire permettant de tester des connaissances générales ou spécifiques ou des compétences. Un quiz se pratique seul ou à plusieurs, suivant des procédures plus ou moins élaborées. Il peut se présenter sous formes de questionnaire à choix multiples ou de questionnaire simple, mais la différence majeure avec un autre test de connaissances ou de personnalité est qu'on attend du participant une réponse non développée d'un ou deux mots.

                Le quiz est le principe de nombreux jeux de société ou de jeux radiophoniques ou télévisés. Lorsqu'il ne s'agit pas d'un jeu, on parle plutôt de « questionnaire » ou de « test » que de quiz.
                
                </p>
            </div>

            <div class="row">
            <?php foreach($quizzList as $quizz): ?>
            <div class="col-sm-4">
            <h3 class="text-blue"><a href="<?= route('quizzId', ['id' => $quizz->id ])?>"><?= $quizz->title ?></a></h3>
                    <h5><?= $quizz->description ?></h5>

                    <p><?php
                            echo $userList[$quizz->app_users_id];
                   ?></p>
                    </div>
                    <?php endforeach;?>
            </div>

 <?= view('layouts/footer')?>