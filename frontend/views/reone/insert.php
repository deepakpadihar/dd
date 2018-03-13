<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
?>
<?php $form=ActiveForm::begin(); ?>

<?php echo $form->field($data,'name'); ?>
<?php echo $form->field($data,'address'); ?>
<?php echo $form->field($data,'pincode'); ?>
<?php echo html::submitButton('Add',['class'=>'btn btn-success']); ?>

<?php $form=ActiveForm::end(); ?>