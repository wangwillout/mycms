<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Admin;
use common\widgets\datepicker\DatePicker;

/**
 * AdminSearch represents the model behind the search form about `common\models\Admin`.
 */
class AdminSearch extends Admin
{
    public $create_time_end;

    /**
     * 继承方法
     * (non-PHPdoc)
     * @see \common\models\Member::attributeLabels()
     */
     public function attributeLabels()
     {
         $data = parent::attributeLabels();
         $data['create_time_end']= '至';
         return $data;
     }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_sys', 'status', 'role_id', 'update_time'], 'integer'],
            [['account', 'password', 'avatar', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Admin::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //排序
        $query->orderBy('create_time desc');

        DatePicker::strToTime($this, $params, ['create_time','create_time_end']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['=', 'is_sys', $this->is_sys])
            ->andFilterWhere(['=', 'status', $this->status])
            ->andFilterWhere(['>=', 'create_time', $this->create_time])
            ->andFilterWhere(['<=', 'create_time', $this->create_time_end]);

        return $dataProvider;
    }
}
