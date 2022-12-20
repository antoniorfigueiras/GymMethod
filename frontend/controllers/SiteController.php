<?php

namespace frontend\controllers;

use common\models\Perfil;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Symfony\Component\VarDumper\Cloner\Data;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Produto;
use yii\helpers\Url;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends \frontend\base\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLoja()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Produto::find()->publicado()
        ]);
        return $this->render('loja',[
            'dataProvider' => $dataProvider
        ]);
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/cliente/index');
        }
        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function getId()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT id FROM user ORDER BY id DESC LIMIT 1");
        $userID = $command->queryAll();
        return User::findOne($userID);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $modelPerfil = new Perfil();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $user=$this->getId();
            $modelPerfil->user_id=$user->getId();
            if($modelPerfil->load(Yii::$app->request->post()) && $modelPerfil->save())
            {
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'modelPerfil' => $modelPerfil,
        ]);
    }
}
