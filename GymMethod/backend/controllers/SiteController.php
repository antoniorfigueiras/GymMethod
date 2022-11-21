<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
//use PharIo\Manifest\Url;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use function PHPUnit\Framework\isNull;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'error'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['admin', 'funcionario', 'treinador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {

        /*if (Yii::$app->user->can('loginBo')) { // se user for admin,sem login == guest
            return [
                'error' => [
                    'class' => \yii\web\ErrorAction::class,
                ],
            ];
        }

    if (!Yii::$app->user->can('loginBo')) {
        Yii::$app->user->logout();
        //$this->redirect('../../../frontend/web');
        //var_dump(Yii::$app->user->can('loginBo'));
    }*/
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /*if(Yii::$app->user->can('loginBO')){
                Yii::$app->getResponse()->redirect(Url::base(true).'../../../frontend/web')->send();
            //return $this->redirect(Url::base(true).'../../../frontend/web')->send();
                Yii::$app->end();
        }*/
        //var_dump(Yii::$app->user->can('loginBo'));
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(!Yii::$app->user->can('loginBO')){
                Yii::$app->user->logout();
                $this->redirect(Url::base(true).'../../../frontend/web');

            }else
            {
                return $this->goBack();
            }

        }


        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}