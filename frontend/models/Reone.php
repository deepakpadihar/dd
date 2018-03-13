<?php
namespace app\models;
use Yii;

class Reone extends \yii\db\ActiveRecord
{
	public function rules()
	{
		return [ 
		[['name','address','pincode'],'required'],
		[['name','address'],'string','max'=>100],
		[['pincode'],'string','max'=>15]
		];
	}
}
?>