<?php

namespace app\models;

use Yii;

class Common extends \yii\db\ActiveRecord
{

    public function getTotalClosingYearEndBalance($param)
    {

        $year = $param['year'];
        $table = $param['table'];
        $sum = $param['sum'];
        $field = $param['field'];

        $yearEndDate = $year . '-12-31';
        $query = "SELECT 
                SUM($sum) 
            FROM 
                $table 
            WHERE 
                $field='" . date($yearEndDate) . "'";

        if (isset($param['cashbook']) && !empty($param['cashbook'])) {
            $cashbookColumn = $param['cashbookColumn'];
            $cashbook = $param['cashbook'];
            $query .= (" AND $cashbookColumn='" . $cashbook . "'");
        }

        $command = Yii::$app->db->createCommand($query);

        $sum = $command->queryScalar();
        return $sum;
    }

    public function getPreviousBalance($param = [])
    {
        $from = $param['from'];
        $to = $param['to'];
        $table = $param['table'];
        $check = $param['check'];
        $field = $param['field'];
        $dateField = $param['dateField'];

        $query = "SELECT
                (
                    SUM(IF($check = 'R', $field, 0)) - SUM(IF($check = 'P', $field, 0))
                ) AS totalAmount 
            FROM
                $table 
            WHERE
                $dateField BETWEEN '$from' AND '$to' ";

        if (isset($param['cashbook']) && !empty($param['cashbook'])) {
            $cashbookColumn = $param['cashbookColumn'];
            $cashbook = $param['cashbook'];
            $query .= (" AND $cashbookColumn='" . $cashbook . "'");
        }

        $command = Yii::$app->db->createCommand($query);

        $totalAmount = $command->queryScalar();
        return $totalAmount;
    }
}
