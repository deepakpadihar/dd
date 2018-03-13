<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $mail=ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

<?php echo $mail->field($maildata,'reciever_name')->textinput(['maxlenght'=>100]); ?>
<?php echo $mail->field($maildata,'reciever_email')->textinput(['maxlenght'=>255]); ?>
<?php echo $mail->field($maildata,'subject')->textinput(['maxlenght'=>50]); ?>
<?php echo $mail->field($maildata,'content')->textarea(['maxlenght'=>255]); ?>
<?php echo $mail->field($maildata,'attachment')->fileinput(['maxlenght'=>255]); ?>
<?php echo html::submitButton('SendMail',['reone/SendMail'],['class'=>'btn btn-success']); ?>
<?php $mail=ActiveForm::end(); ?>