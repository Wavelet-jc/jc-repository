<?php
/**
 * Created by PhpStorm.
 * User: jc
 * Date: 2019/1/8
 * Time: 19:44
 */

namespace Home\Model;
use Think\Model;

class ChatGroupMsgModel extends Model{
    public function __construct()
    {
        parent::__construct();
        //echo "Home/ChatGroupMsgModel <br>";
    }
//    protected $tablePrefix = "tablePrefix";     //定义表名前缀
//    protected $tableName = "tableName";     //定义表名名称后缀
    protected $trueTableName = "chat_group_msg";    //定义表格全名
//    protected $dbName = "dbName";   //选择数据库名

}