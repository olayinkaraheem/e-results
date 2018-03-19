<?php
?>

<?php
/* @var $this yii\web\View */
	use yii\helpers\Html;
	use app\models\Lga;
	use app\models\AnnouncedPuResults;

?>

<div class="container">

<h2 class="page-header">LGAs Results</h2>

<p>Please Select an LGA below to View Corresponding Election Result</p>

<?= Html::dropDownList('lga_id',$selection = null, Lga::find()
                    ->select(['lga_name', 'lga_id'])
                    ->indexBy('lga_id')
                    ->column(), [
                        'prompt'=>'Select Local Government Area',
                        'onchange'=>'
                            $.post("'.Yii::$app->urlManager->createUrl('/results/result-by-lga?id=').'"+$(this).val(), function(data){
                            $("div.results").html(data);
                        });'
                    ], ['class'=>'form-control'])?>





</div>

<div class="container results"></div>