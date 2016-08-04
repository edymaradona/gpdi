<?php

namespace backend\modules\m1\controllers;

use Yii;

use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use kartik\grid\EditableColumnAction;

use backend\models\Organization;
use backend\models\IndoKabupaten;
use backend\models\IndoKelurahan;
use backend\models\IndoProvinsi;

use backend\modules\m1\models\Pastor;
use backend\modules\m1\models\searchs\PastorSearch;
use backend\modules\m1\models\Family;
use backend\modules\m1\models\Ministry;
use backend\modules\m1\models\OrganizationRole;
use backend\modules\m1\models\Pendeta;
use backend\modules\m1\models\Legal;
use backend\modules\m1\models\Education;
use backend\modules\m1\models\Report;

use backend\models\User;

/**
 * PastorController implements the CRUD actions for Pastor model.
 */
class PastorController extends Controller
{
    public $layout = "column2";

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'editFamily' => [                                       // identifier for your editable column action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => Family::className(),                // the model for the record being edited
                'outputValue' => function ($model, $attribute, $key, $index) {
                    return $model->$attribute;      // return any custom output value if desired
                },
                'outputMessage' => function ($model, $attribute, $key, $index) {
                    return '';                                  // any custom error to return after model save
                },
                'showModelErrors' => true,                        // show model validation errors after save
                'errorOptions' => ['header' => '']                // error summary HTML options
                // 'postOnly' => true,
                // 'ajaxOnly' => true,
                // 'findModel' => function($id, $action) {},
                // 'checkAccess' => function($action, $model) {}
            ],
            'editOrganization' => [
                'class' => EditableColumnAction::className(),
                'modelClass' => OrganizationRole::className(),
                'outputValue' => function ($model, $attribute, $key, $index) {
                    return $model->$attribute;
                },
                'outputMessage' => function ($model, $attribute, $key, $index) {
                    return '';
                },
                'showModelErrors' => true,
                'errorOptions' => ['header' => '']
            ],
            'editMinistry' => [
                'class' => EditableColumnAction::className(),
                'modelClass' => Ministry::className(),
                'outputValue' => function ($model, $attribute, $key, $index) {
                    return $model->$attribute;
                },
                'outputMessage' => function ($model, $attribute, $key, $index) {
                    return '';
                },
                'showModelErrors' => true,
                'errorOptions' => ['header' => '']
            ],
        ]);
    }

    /**
     * Lists all Pastor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PastorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //print_r(Yii::$app->request->queryParams);
        //die;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pastor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Pastor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pastor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->can('AllModuleBundle')) {
            $model = Pastor::find()->joinWith('ministry')->where([
                '`pastor`.`id`' => $id,
                '`ministry`.`organization_parent_id`' => User::getGroupId()
            ])->one();
        } else {
            $model = Pastor::findOne($id);
        }

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Pastor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pastor();
        $model->setScenario('newpastor');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelMinistry = new Ministry();
            $modelMinistry->parent_id = $model->id;
            $modelMinistry->start_date = $model->start_date;
            $modelMinistry->organization_parent_id = $model->organization_parent_id;
            $modelMinistry->church_name = $model->church_name;
            $modelMinistry->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pastor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateeducation($id)
    {
        $model = new Education();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateEducation', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateeducation($id)
    {
        $model = $this->findModelEducation($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateEducation', [
                'model' => $model,
            ]);
        }
    }

    protected function findModelEducation($id)
    {
        if (($model = Education::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreatelegal($id)
    {
        $model = new Legal();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateLegal', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatelegal($id)
    {
        $model = $this->findModelLegal($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateLegal', [
                'model' => $model,
            ]);
        }
    }

    protected function findModelLegal($id)
    {
        if (($model = Legal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreatependeta($id)
    {
        $model = new Pendeta();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updatePendeta', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatependeta($id)
    {
        $model = $this->findModelPendeta($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updatePendeta', [
                'model' => $model,
            ]);
        }
    }

    protected function findModelPendeta($id)
    {
        if (($model = Pendeta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreatefamily($id)
    {
        $model = new Family();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateFamily', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatefamily($id)
    {
        $model = $this->findModelFamily($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateFamily', [
                'model' => $model,
            ]);
        }
    }

    protected function findModelFamily($id)
    {
        if (($model = Family::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateministry($id)
    {
        $model = new Ministry();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateMinistry', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateministry($id)
    {
        $model = $this->findModelMinistry($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateMinistry', [
                'model' => $model,
            ]);
        }
    }

    protected function findModelMinistry($id)
    {
        if (($model = Ministry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateorganization($id)
    {
        $model = new OrganizationRole();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateOrganization', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateorganization($id)
    {
        $model = $this->findModelOrganization($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateOrganization', [
                'model' => $model,
            ]);
        }
    }

    protected function findModelOrganization($id)
    {
        if (($model = OrganizationRole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreatereport($id)
    {
        $model = new Report();
        $model->parent_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateReport', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatereport($id)
    {
        $model = $this->findModelLegal($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect( Yii::$app->request->referrer );
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('updateReport', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pastor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteministry($id)
    {
        $model = $this->findModelMinistry($id);
        $model->delete();

        //return $this->redirect(['view', 'id' => $model->parent_id]);
    }

    public function actionDeleteorganization($id)
    {
        $model = $this->findModelOrganization($id);
        $model->delete();

        //return $this->redirect(['view', 'id' => $model->parent_id]);
    }

    public function actionDeletefamily($id)
    {
        $model = $this->findModelFamily($id);
        $model->delete();
        //return $this->redirect(['view', 'id' => $model->parent_id]);
    }

    public function actionDeletependeta($id)
    {
        $model = $this->findModelPendeta($id);
        $model->delete();

        //return $this->redirect(['view', 'id' => $model->parent_id]);
    }

    public function actionDeletelegal($id)
    {
        $model = $this->findModelLegal($id);
        $model->delete();

        //return $this->redirect(['view', 'id' => $model->parent_id]);
    }

    public function actionDeletereport($id)
    {
        $model = $this->findModelReport($id);
        $model->delete();

        //return $this->redirect(['view', 'id' => $model->parent_id]);
    }

    protected function findModelReport($id)
    {
        if (($model = Report::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                $model->photo_path = 'pastor/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
                $model->save(false);
                return $this->redirect(['view', 'id' => $id]);
                //return true;
            }
        }

    }

    public function actionAcdesakelkecamatan($key)
    {
        $arrayList = [];

        $query = IndoKelurahan::find()->joinWith('parent');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['like', '`indo_kelurahan`.`nama`', $key]);


        foreach ($dataProvider->getModels() as $model) {
            $arrayList [] = $model->nama . ',' . $model->parent->nama;
        }

        return Json::encode($arrayList);

    }

    public function actionAckabupatenkota($key)
    {
        $arrayList = [];

        $query = IndoKabupaten::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['like', 'nama', $key]);


        foreach ($dataProvider->getModels() as $model) {
            $arrayList [] = $model->nama;
        }

        return Json::encode($arrayList);

    }

    public function actionAcprovince($key)
    {
        $arrayList = [];

        $query = IndoProvinsi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['like', 'nama', $key]);


        foreach ($dataProvider->getModels() as $model) {
            $arrayList [] = $model->nama;
        }

        return Json::encode($arrayList);

    }

    public function actionAcpastor($key)
    {
        $arrayList = [];

        $query = Pastor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['like', 'pastor_name', $key]);


        foreach ($dataProvider->getModels() as $model) {
            $arrayList [] = $model->pastor_name;
        }

        return Json::encode($arrayList);

    }

}
