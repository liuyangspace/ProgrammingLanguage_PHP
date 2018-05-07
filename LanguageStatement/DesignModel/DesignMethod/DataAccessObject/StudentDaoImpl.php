<?php
/**
 * 数据访问对象实体类
 */

namespace LanguageStatement\DesignModel\DesignMethod\DataAccessObject;


class StudentDaoImpl implements StudentDao
{
    protected $studentList=[];

    public function __construct()
    {
        $this->studentList[]=new Student('Robert',12);
        $this->studentList[]=new Student('John',11);
    }

    public function deleteStudent(Student $student)
    {
        foreach($this->studentList as $key=>$value){
            if($value->getName()==$student->getName()){
                unset($this->studentList[$key]);
            }
        }
        echo "delete : ".$student->getName()."\n";
    }

    public function getAllStudents()
    {
        return $this->studentList;
    }

    public function getStudent($name)
    {
        foreach($this->studentList as $key=>$value){
            if($value->getName()==$name){
                return $value;
            }
        }
        return false;
    }

    public function updateStudent(Student $student)
    {
        foreach($this->studentList as $key=>$value){
            if($value->getName()==$student->getName()){
                $this->studentList[$key]->setOld($student->getOld());
            }
        }
        echo "update : ".$student->getName()."\n";
    }
}