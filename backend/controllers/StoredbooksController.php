<?php

namespace backend\controllers;

use frontend\models\Authors;
use frontend\models\Storedbooks;
use frontend\models\StoredbooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Exception;
use yii\base\Model;
use Yii;

/**
 * StoredbooksController implements the CRUD actions for Storedbooks model.
 */
class StoredbooksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Storedbooks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity != NULL) {
            $searchModel = new StoredbooksSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            return $this->render('/site/index');
        }
    }

    /**
     * Displays a single Storedbooks model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /*
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        */
        if(Yii::$app->user->identity != NULL) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else
        {
            return $this->render('/site/index');
        }
    }

    /**
     * Creates a new Storedbooks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity != NULL) {
            $model = new Storedbooks();
            $modela = new Authors();
    
            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $modela->load($this->request->post()) ) {
                    if($_POST['Authors']['id']==NULL)
                    {
                        return $this->redirect(['create']);
                    }
                    else
                    {
                        $model->authorid = $_POST['Authors']['id'];
                        $model->save(false);
                        $modela->save();
                        //*******************************************************************************
        
                        $bookid = $model->id;
                        $image = UploadedFile::getInstance($model, 'img');
        
                        if($image) {   //pokud je fileinput vyplnen, tak probehne. V pripade, ze ne, tak se provede else a nastavi se defaultni foto
                            $imageName = 'book' . $bookid . '.' . $image->getExtension();
                            $image->saveAs('@frontend/images/books/' . $imageName);
                            $model->img = $imageName;
                        }
                        else{
                            $model->img = "default.png";
                        }
        
                        $model->save();
        
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
            else {
                $model->loadDefaultValues();
                $modela->loadDefaultValues();
            }
    
            return $this->render('create', [
                'model' => $model,
                'modela' => $modela,
            ]);
        }
        else
        {
            return $this->render('/site/index');
        }
    }

    /**
     * Updates an existing Storedbooks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity != NULL) {
            $model = $this->findModel($id);
            $modela = new Authors();
    
            if ($this->request->isPost && $model->load($this->request->post()) && $modela->load($this->request->post())) {
                if($_POST['Authors']['id']==NULL)   //pokud je pri updatu nevyplneny autor, tak update neprobehne.
                {
                    return $this->redirect(['update','id' => $model->id]);
                }
                else {
                    $model->authorid = $_POST['Authors']['id'];
                    $model->save(false);
                    $modela->save();
    
                    //*******************************************************************************
    
                    $bookid = $model->id;
                    $image = UploadedFile::getInstance($model, 'img');
    
                    if($image) {   //pokud je fileinput vyplnen, tak probehne. V pripade, ze ne, tak se provede else a nastavi se defaultni foto
                        $imageName = 'book' . $bookid . '.' . $image->getExtension();
                        $image->saveAs('@frontend/images/books/' . $imageName);
                        $model->img = $imageName;
                    }
                    else if($model->img == "" || $model->img == "default.png"){
                        $model->img = "default.png";
                    }
    
                    $model->save();
    
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
    
            return $this->render('update', [
                'model' => $model,
                'modela' => $modela,
            ]);
        }
        else
        {
            return $this->render('/site/index');
        }
    }

    /**
     * Deletes an existing Storedbooks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->identity != NULL) {
            $data = Storedbooks::findOne($id);
            if($data->img != "default.png")
                unlink(\Yii::getAlias('@frontend').'/images/books/' . $data->img);
    
            $this->findModel($id)->delete();
    
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('/site/index');
        }
    }

    /**
     * Finds the Storedbooks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Storedbooks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Storedbooks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Odstrani foto u knihy pokud je nejaka nastavena
     * @param int $id ID
     * @return \yii\web\Response
     */
    public function actionOdstranitfoto($id)
    {
        if(Yii::$app->user->identity != NULL) {
            $model=Storedbooks::findOne(['id' => $id]);
            
            if($model->img != "default.png")
                unlink(\Yii::getAlias('@frontend').'/images/books/' . $model->img);
                
            $model->img="default.png";
            $model->save();
    
            return $this->redirect(['update', 'id' => $model->id]);
        }
        else
        {
            return $this->render('/site/index');
        }
    }
    /**
     * Zapise ke knize v databázi hodnotu 0, která představuje vracenou knihu
     * smaze zaznam z tabulky borrowedbooks (neni uz potreba)
     * @param int $id ID
     * @return \yii\web\Response
     */
    public function actionVratit($id)
    {
        if(Yii::$app->user->identity != NULL) {
            $model=Storedbooks::findOne(['id' => $id]);
            Borrowedbooks::deleteAll(['idbook'=>$model->id]);
            $model->save();
    
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('/site/index');
        }
    }
    /**
     * Zapise ke knize v databázi hodnotu 1, která představuje vypůjčení knihy, pricte pocet pujceni,
     * vytvori novy zaznam v databazi borrowedbooks, ktery uchova po dobu pujceni potrebna data
     * @param int $id ID
     * @return \yii\web\Response
     */
    public function actionPujcit($id)
    {
        /*
        $model=Storedbooks::findOne(['id' => $id]);
        $modela=new Borrowedbooks();
        $datum=date("Y-m-d");
        $mod_date = strtotime($datum."+ 14 days");

        $modela->idbook=$model->id;
        $modela->iduser=Yii::$app->user->getId();
        $modela->fromdate=date($datum);
        $modela->untildate=date("Y-m-d",$mod_date);
        $modela->save();
        
        $model->borrowedcount++;
        $model->save();
        */
        if(Yii::$app->user->identity != NULL) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model=Storedbooks::findOne(['id' => $id]);
                $modela=new Borrowedbooks();
                $datum=date("Y-m-d");
                $mod_date = strtotime($datum."+ 14 days");
    
                $modela->idbook=$model->id;
                $modela->iduser=Yii::$app->user->getId();
                $modela->fromdate=date($datum);
                $modela->untildate=date("Y-m-d",$mod_date);
    
                $model->borrowedcount++;
    
                $model->save();
                $modela->save();
    
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
    
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('/site/index');
        }
    }
}
