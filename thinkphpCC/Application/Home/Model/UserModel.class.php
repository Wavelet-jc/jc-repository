<?php
/**
 * Created by PhpStorm.
 * User: jc
 * Date: 2019/1/8
 * Time: 19:44
 */

namespace Home\Model;
use Think\Model;

class UserModel extends Model{

//    protected $tablePrefix = "tablePrefix";     //定义表名前缀
//    protected $tableName = "tableName";     //定义表名名称后缀
//    protected $trueTableName = "tp_abc";    //定义表格全名
//    protected $dbName = "dbName";   //选择数据库名
    public function __construct($name = '', $tablePrefix = '', $connection = '')
    {
        parent::__construct($name, $tablePrefix, $connection);
        //echo "/UserModel<br>";
    }
}