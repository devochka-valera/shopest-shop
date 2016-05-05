<?php
namespace app\controllers\admin;

use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);

    }

    public function actionCreate()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', ['category' => $category]);
    }


    public function actionUpdate()
    {
        return $this->render('update', []);

    }

}