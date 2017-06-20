<?php
/******* SeanPHP *******
 * Model基类
 * Author: SeanLee 929325776@qq.com
 */
class Model extends Sql{
    protected $model;
    protected $table;
    public static $dbConfig = [];

    public function __construct(){
        //-[连接数据库]-//
        $this->connect(self::$dbConfig['host'], self::$dbConfig['user'], self::$dbConfig['password'],self::$dbConfig['database']);

        //-[获取数据库表名]-//
        if (!$this->table) {
            //-[获取模型类名称]-//
            $this->model = get_class($this);
            $this->model = substr($this->model, 0, -5);
            //-[驼峰处加入_,比如UserProfile变为user_profile]-//
            $this->model = preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', $this->model);
            //-[数据库表名与类名一致]-//
            $this->table = strtolower($this->model);
        }
    }
}