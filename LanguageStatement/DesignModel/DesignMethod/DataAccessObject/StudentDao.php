<?php
/**
 * 数据访问对象接口
 */

namespace LanguageStatement\DesignModel\DesignMethod\DataAccessObject;


interface StudentDao
{
    public function getAllStudents();
    public function getStudent($name);
    public function updateStudent(Student $student);
    public function deleteStudent(Student $student);

}