<?php
/**
 * 业务对象
 */

namespace LanguageStatement\DesignModel\DesignMethod\TransferObject;


class StudentBO
{
    protected $students=[];

    public function __construct()
    {
        $this->students[1]=new StudentVO('Robert',1);
        $this->students[2]=new StudentVO('John',2);
    }

    public function getAllStudent()
    {
        return $this->students;
    }

    public function getStudent($rollNo)
    {
        return $this->students[$rollNo];
    }

    public function updateStudent(StudentVO $studentVO)
    {
        $this->students[$studentVO->getRollNo()]->setName($studentVO->getName());
        echo "updated Student : ".$studentVO->getName()."\n";
    }

    public function deleteStudent(StudentVO $studentVO)
    {
        unset($this->students[$studentVO->getRollNo()]);
        echo "delete Student : ".$studentVO->getName()."\n";
    }

}