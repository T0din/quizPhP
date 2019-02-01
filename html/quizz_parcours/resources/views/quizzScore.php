<?= view('layouts/header')?>
<div class="row">
<?php $_SESSION['score'] = 0; ?>

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
                                     <?php 
                                       if($questions->answers_id === intval($answersChosen[$questions->id]) && intval($answersChosen[$questions->id]) === $answersQuestion->id ):
                                    ?>
                                        <li>
                                            <?='<font color="green">'. '&#9989; '.$answersQuestion->description .'</font>' ?> 
                                        </li>
                                      <?php $_SESSION['score'] = $_SESSION['score'] + 1;
                                       $i += 1; ?>
                                        <?php  elseif(intval($answersChosen[$questions->id]) === $answersQuestion->id ):
                                    ?>
                                        <li>
                                            <?='<font color="red">'. '&#10006; '.$answersQuestion->description .'</font>' ?> 
                                        </li>
                                        <?php  $i += 1; ?>
                                    <?php else : ?>
                                    <li>
                                            <?= $i.$answersQuestion->description  ?> 
                                        </li>
                                        
                                    <?php
                                    $i += 1;
                                   
                                    ?>
                                    <?php
                                endif;  

                                    endforeach; 

                                    ?>

                                </ul> 
                            </div>
                            <div class="p-3 background-grey question-answer-block"> 
                        <?= $questions->anecdote ?>
                                <a href=" <?='https://fr.wikipedia.org/wiki/' . $questions->wiki?>"><?= $questions->wiki ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <h2>Votre score est : <?=$_SESSION['score']?> / 10</h2>
                
                <?= view('layouts/footer')?>