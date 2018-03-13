<?php
use yii\helpers\Html;
?>
<style>
table th,td{
	padding:10px;
}
</style>
<?= Html::a('Add More Entries',['reone/insert'],['class'=>'btn btn-success']); ?> |
<?= Html::a('Mail',['reone/mail'],['class'=>'btn btn-success']); ?>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Address</th>
		<th>Pincode</th>
		<th>Edit/Delete</th>
	</tr>
<?php foreach($data as $pdata){ ?>
	<tr>
		<td><?= $pdata->id ?></td>
		<td><?= $pdata->name ?></td>
		<td><?= $pdata->address ?></td>
		<td><?= $pdata->pincode ?></td>
		<td><?= Html::a('Update',['reone/update', 'id' =>$pdata->id],['class'=>'btn btn-success']); ?> | <?= Html::a('Delete',['reone/delete', 'id' =>$pdata->id],['class'=>'btn btn-success']); ?></td>
		
	</tr>
<?php } ?>
</table>
