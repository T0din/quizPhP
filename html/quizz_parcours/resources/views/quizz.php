<?= view('layouts/header')?>


<div class="container-quizz">
    <div class="row">
        <div class="col-12"
            <div class="row">
                <h2> <?= $quizzIdInfo->title ?>
                    <span class="badge badge-pill badge-secondary"><?= count($questionsList)?> questions</span>
                </h2>
                
                
                <h4> 
                    <?= $quizzIdInfo->description ?>
                </h4>
                <?= ($userList->firstname . ' ' . $userList->lastname); ?>
            </div>
            </div>
    </div>

<div id="carouselExampleSlidesOnly" class="carousel  float-right slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../images/chocolat.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../images/Blade.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../images/fromage.jpg" alt="Third slide">
    </div>
  </div>
</div>


            <?php if (!empty($_SESSION)): ?>
            <form action="<?= route('quizzPostId', ['id' => $quizzIdInfo->id] )?>" method="post">

                <div class="row cards-quizz">
                    <?php foreach($questionsList as $questions):?>
                    <div class="col-sm-3 border p-0 mr-3 mb-3">

                        <?php $levelName = $levelList[$questions->levels_id];

                                
switch($levelName){
    case 'Débutant':
        $badgeClass = "badge-success";
    break;
    case 'Confirmé':
         $badgeClass = "badge-warning";
    break;
    case 'Expert':
        $badgeClass = "badge-danger";
    break;
    default:
        $badgeClass = "badge-success";
    ;
}
?>
<span class="badge <?= $badgeClass ?>  float-right mt-2 mr-2"><?= $levelName ?></span>


                        <div class="p-3 alert-success">
                            <?= $questions->question ?>
                        </div>
                        <div class="p-3 question-answer-block">
                                <?php foreach($answers[$questions->id] as $answersQuestion){

                            
                            echo '<div class="form-check">
                                <input class="form-check-input" type="radio" name="radio'.$answersQuestion->questions_id.'" id="exampleRadios1" value="'.$answersQuestion->id.'">
                                <label class="form-check-label" for="exampleRadios1">';
                                echo $answersQuestion->description;
                                echo '</label>';
                                echo '</div>';
                                 }
                                
                                ?>
                           
                        </div>

                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row mt-3">
                    <input type="submit" class="btn btn-primary background-blue btn-lg btn-block" value="OK"/>
                </div>
            </form>

            <?php else :?>

            <div class="row">
                    <?php foreach($questionsList as $questions):?>
                    <div class="col-sm-3 border p-0 mr-3 mb-3">

                        <?php $levelName = $levelList[$questions->levels_id];

                                
switch($levelName){
    case 'Débutant':
        $badgeClass = "badge-success";
    break;
    case 'Confirmé':
         $badgeClass = "badge-warning";
    break;
    case 'Expert':
        $badgeClass = "badge-danger";
    break;
    default:
        $badgeClass = "badge-success";
    ;
}
?>
<span class="badge <?= $badgeClass ?>  float-right mt-2 mr-2"><?= $levelName ?></span>

                        <div class="p-3 background-grey">
                            <?= $questions->question ?>
                        </div>
                        <div class="p-3 question-answer-block">
                        <ul>
                                    <?php 

                                    $i = 1; //optionnel (affichage)

                                    foreach($answers[$questions->id] as $answersQuestion ): 

                                    ?>
                                        <li>
                                            <?= $i ?>. <?= $answersQuestion->description ?> 
                                        </li>

                                    <?php

                                    $i += 1;
                                    endforeach; 

                                    ?>

                                </ul> 
                            </div>
                    </div>
                <?php endforeach; ?>
                </div>
                                <?php endif; ?>     

</div>
<?= view('layouts/footer')?>