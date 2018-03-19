<?php
/* @var $this yii\web\View */
	use yii\helpers\Html;

	use yii\widgets\LinkPager;
?>
<h2 class="page-header">
	All Polling Units Results
	<?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role =='admin') : ?>
           
		<a href="new_pu" class="btn btn-primary pull-right">New</a>

	<?php endif; ?>
</h2>

<?php if(Yii::$app->session->hasFlash('success')) : ?>
	<div class="alert alert-success"><?=Yii::$app->session->getFlash('success')?></div>
<?php endif; ?>

<?php if($ann_pu_res) : ?>
	<table class="table table-header table-bordered table-striped">
		<thead>
			<th>Polling Unit Name</th>
			<th>Polling Unit Ward</th>
			<th>Polling Unit Lga</th>
			<th>Party Name</th>
			<th>Party Score</th>
		</thead>
		<tbody>
			<?php foreach($ann_pu_res as $pu_res) : ?>
				<tr>
					<td><?=$pu_res->polling_unit->polling_unit_name?></td>
					<td><?=$pu_res->polling_unit->ward->ward_name?></td>
					<td><?=$pu_res->polling_unit->lga->lga_name?></td>
					<td><?=$pu_res->party_abbreviation?></td>
					<td><?=$pu_res->party_score?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	Not available
<?php endif; ?>

<?= LinkPager::widget(['pagination'=>$pagination]) ?>