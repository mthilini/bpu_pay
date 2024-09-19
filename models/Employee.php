<?php

namespace app\models;

use Yii;

/**
 * This is the model class for retrieve data from "misbpudb" database.
 *
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     */
    public function getDepartment($deptID)
    {
        //Get the Department Name from departments table
        //
        $Department = Yii::$app->db2->createCommand("SELECT dname FROM departments where id='$deptID'")->queryScalar();
        if (!empty($Department)) {
            return $Department;
        } else {
            return $deptID;
        }
    }
    //
    public function getDesignation($ID)
    {
        //Get the Designation  from designations table
        //
        $Designation = Yii::$app->db2->createCommand("SELECT designation FROM designations where id='$ID'")->queryScalar();
        if (!empty($Designation)) {
            return $Designation;
        } else {
            return $ID;
        }
    }
    //
    public function getEmpStatus($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $EmpStatus = Yii::$app->db2->createCommand("SELECT status FROM emp_status where id='$ID'")->queryScalar();
        if (!empty($EmpStatus)) {
            return $EmpStatus;
        } else {
            return $ID;
        }
    }
    //
    public function getAcademic($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        if ($ID == 'A') {
            $Type = "Academic";
        } else {
            if ($ID == 'N') {
                $Type = "Non-Academic";
            } else {
                $Type = "Unknown";
            }
        }
        return $Type;
    }
    //
    //
    public function getGrade($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $EmpGrade = Yii::$app->db2->createCommand("SELECT grade FROM emp_grade where id='$ID'")->queryScalar();
        if (!empty($EmpGrade)) {
            return $EmpGrade;
        } else {
            return $ID;
        }
    }
    //
    //
    public function getEmpEpf($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $EmpEpf = Yii::$app->db2->createCommand("SELECT empEpf FROM employees where empepf='$ID'")->queryScalar();
        if (!empty($EmpEpf)) {
            return $EmpEpf;
        } else {
            return NULL;
        }
    }
    //
    //
    public function getEmpName($ID)
    {
        //Get the Employee Status (Temporary/Contract..) Name from emp_status table
        //
        $EmpName = Yii::$app->db2->createCommand("SELECT concat(empTitle,' ',namewithinitials) as empName FROM employees where empUPFNo='$ID'")->queryScalar();
        if (!empty($EmpName)) {
            return $EmpName;
        } else {
            return "Name NOT in HR Info";
        }
    }
    
}
