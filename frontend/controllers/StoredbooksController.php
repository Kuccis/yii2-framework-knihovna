<?php

namespace frontend\controllers;

use frontend\models\Authors;
use frontend\models\Storedbooks;
use frontend\models\StoredbooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $searchModel = new StoredbooksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Storedbooks model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Storedbooks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
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

                    $bookid=$model->id;
                    $image = UploadedFile::getInstance($model, 'img');
                    if($model->img!="") {
                        $imageName = 'book' . $bookid . '.' . $image->getExtension();
                        $image->saveAs('D:/xampp/htdocs/knihovnakucera/images/books/' . $imageName);
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

    /**
     * Updates an existing Storedbooks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
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
                    $image->saveAs('D:/xampp/htdocs/knihovnakucera/images/books/' . $imageName);
                    $model->img = $imageName;
                }
                else{
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

    /**
     * Deletes an existing Storedbooks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $data = Storedbooks::findOne($id);
        if($data->img != "default.png")
            unlink('D:/xampp/htdocs/knihovnakucera/images/books/' . $data->img);

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
}
