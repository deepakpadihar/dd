<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
class Mailme extends \yii\db\ActiveRecord
{
	public function rules()
	{
		return [
				[['reciever_name','reciever_email','subject','content'],'required'],
				[['reciever_name','reciever_email','subject','content'],'string','max'=>255]
		];
	}
} 

?> 