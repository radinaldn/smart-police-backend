<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 12/10/17
 * Time: 11:46
 */

namespace app\api\modules\v1\controllers;

use app\models\User;
use yii\rest\Controller;

class LoginController extends Controller
{
    public function actionLogin(){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $response = null;

        if(\Yii::$app->request->isPost){

            $data = \Yii::$app->request->post();
            $password = $data['password'];
            $user = User::find()->where(['id_user'=>$data['username']])
                ->andWhere(['password'=> $password])->all();

            if(isset($user)){
                $response['status'] = 'success';
                $response['data'] = $user;
            }
            else{
                $response['status'] = 'gagal login';
            }

        }
        return $response;
    }

    public function actionIndex(){
        echo "Hello";
    }

}