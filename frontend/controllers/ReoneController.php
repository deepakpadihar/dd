<?php
namespace frontend\controllers;
use Yii;
use yii\web\UploadedFile;
use app\models\Mailme;
use app\models\Reone;
use yii\web\Controller;
use yii\mail\BaseMessage;

class ReoneController extends Controller
{
	public function actionIndex()
	{
		$data= Reone::find()->all();
		return $this->render('index',['data'=>$data]);
	}
	public function actionInsert()
	{
		$data=new Reone();
		if($data->load(Yii::$app->request->post()) && $data->save())
		{
			$this->redirect(['index']);
		}
		return $this->render('insert',['data'=>$data]);
	}
	public function actionUpdate($id)
	{
		$data= Reone::findone($id);
		if($data->load(Yii::$app->request->post()) && $data->save())
		{
			$this->redirect(['index']);
		}
		return $this->render('update',['data'=>$data]);
	}
	public function actionDelete($id)
	{
		$data= Reone::find()->where(['id'=>$id])->one();
		$data->delete();
		$this->redirect(['flash']);
	}
	public function actionFlash()   
    {   
	    $session = Yii::$app->session;   
	    // set a flash message named as "welcome"   
	    $session->setFlash('welcome', 'Successfully deleted!');   
	    return $this->render('flash');
	    $this->redirect(['index']);   
	}
	public function actionMail()
	{
		$maildata=new Mailme;
		if($maildata->load(Yii::$app->request->post()))
		{
			$maildata->attachment=UploadedFile::getInstance($maildata,'attachment');	
			if($maildata->attachment)
			{
				$time=time();
				$maildata->attachment->saveAs('attachments/'.$time.'.'.$maildata->attachment->extension);
				$maildata->attachment='attachments/'.$time.'.'.$maildata->attachment->extension;
			}
			if($maildata->attachment)
			{
				$value=Yii::$app->mailer->compose()
				->setFrom(['dpadihar@gmail.com'])
				->setTo($maildata->reciever_email)
				->setSubject($maildata->subject)
				->setHtmlBody($maildata->content)
				->attach($maildata->attachment)
				->send();
			}
			else
			{
				$value=Yii::$app->mailer->compose()
				->setFrom(['dpadihar@gmail.com'])
				->setTo($maildata->reciever_email)
				->setSubject($maildata->subject)
				->settextBody($maildata->content)
				->send();
			}
			
			// $maildata->save();
			$this->redirect(['index']);
		}
		else
		{
			
			return $this->render('sendmail',['maildata'=>$maildata]);
		}
		
	}
	// public function actionSendmail($id)
 //    {   
 //        $message            = new YiiMailMessage;
 //           //this points to the file test.php inside the view path
 //        $message->view = "test";
 //        $sid                 = 1;
 //        $criteria            = new CDbCriteria();
 //        $criteria->condition = "studentID=".$sid."";            
 //        $studModel1          = Student::model()->findByPk($sid);        
 //        $params              = array('myMail'=>$studModel1);
 //        $message->subject    = 'My TestSubject';
 //        $message->setBody($params, 'text/html');                
 //        $message->addTo('deepak.singh1@girnarsoft.com');
 //        $message->from = 'dpadihar@gmail.com';   
 //        Yii::app()->mail->send($message);       
 //    }
}
?>