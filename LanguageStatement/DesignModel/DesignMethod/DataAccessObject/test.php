<?php
/**
 * 用例
 */

namespace LanguageStatement\DesignModel\DesignMethod\DataAccessObject;
spl_autoload_register(function($className){
    $filePath=__DIR__.'/../../../../'.$className.'.php';
    if(file_exists($filePath)){
        require_once $filePath;
    }
});

class test
{
    public static function main()
    {
        $studentDao=new StudentDaoImpl();

        foreach($studentDao->getAllStudents() as $student){
            echo "print : ".$student->getName()."\n";
        }

        $student=$studentDao->getStudent('Robert');
        $student->setName('Michael');
        $studentDao->updateStudent($student);
    }
}
test::main();