<?php
/******* SeanPHP *******
 * SQL基类
 * Author: SeanLee 929325776@qq.com
 */
class Sql{

    protected $handle;
    protected $field = '*';
    protected $table;
    protected $result = null;
    protected $fetchSql = false;
    protected $options = [];

    //-[连接数据库]-//
    public function connect($host, $username, $password, $dbname){
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
            $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            $this->handle = new PDO($dsn, $username, $password, $option);
        } catch (PDOException $e) {
            exit('错误: ' . $e->getMessage());
        }
    }

    //-[是否返回SQL语句]-//
    public function fetchSql($flag = true){
        $this->fetchSql = $flag;
        return $this;
    }

    //-[是否返回SQL语句]-//
    public function data($data = null){
        if(isset($data) && is_array($data)){
            $this->options['data'] = $data;
        }
        return $this;
    }

    //-[限制查询]-//
    public function limit($offset, $length = null){
        if (is_null($length) && strpos($offset, ',')) {
            list($offset, $length) = explode(',', $offset);
        }
        $this->options['limit'] = intval($offset) . ($length ? ',' . intval($length) : '');

        return $this;
    }

    //-[AND查询条件]-//
    public function where($where = null){
        if(isset($where)) {
            if (is_string($where)){
                $this->options['where'] = ' WHERE ' . $where;
            }elseif (is_array($where)){
                if($this->is_assoc($where)){
                    $_where[] = $this->parseUpdate($where);
                    $where = $_where;
                }
                $this->options['where'] = ' WHERE ' . implode(' AND ', $where);
            }
        }
        return $this;
    }

    //-[OR查询条件]-//
    public function whereOr($where = null){
        if(isset($where)) {
            if (is_string($where)){
                $this->options['where'] = ' WHERE ' . $where;
            }elseif (is_array($where)){
                $this->options['where'] = ' WHERE ' . implode(' OR ', $where);
            }
        }

        return $this;
    }

    //-[设置操作表]-//
    public function table($table = null){
        if(isset($field)){
            $this->table = $table;
        }

        return $this;
    }

    //-[设置字段]-//
    public function field($field = null){
        if(isset($field)){
            if (is_string($field))
                $this->field = $field;
            elseif (is_array($field))
                $this->field = implode(',', $field);
            else
                $this->field = '*';
        }

        return $this;
    }

    //-[排序条件]-//
    public function order($order = null){
        if(isset($order)) {
            if(is_string($order)){
                $this->options['order'] = ' ORDER BY ' . $order;
            }elseif(is_array($order)){
                $this->options['order'] = ' ORDER BY ' . implode(' ', $order);
            }
        }

        return $this;
    }

    //-[查询一条记录]-//
    public function one(){
        $sql = sprintf("select %s from `%s` %s limit 1", $this->field, $this->table, $this->getFilter());
        if($this->fetchSql)
            return $sql;
        $sth = $this->handle->prepare($sql);
        $sth->execute();

        return $sth->fetch();
    }

    //-[查询所有]-//
    public function select(){
        $sql = sprintf("select %s from `%s` %s", $this->field, $this->table, $this->getFilter());
        if($this->fetchSql)
            return $sql;
        $sth = $this->handle->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

    //-[根据条件 (id) 删除]-//
    public function delete($where = null){
        if(!isset($where) && !isset($this->options['where'])){
            exit('删除条件不能为空');
        }
        isset($where) ? $this->where($where) : $this->options['where'];

        $sql = sprintf("delete from `%s` %s", $this->table, $this->options['where']);
        if($this->fetchSql)
            return $sql;
        $sth = $this->handle->prepare($sql);
        $sth->execute();

        return $sth->rowCount();
    }

    //-[自定义SQL查询，返回影响的行数]-//
    public function query($sql){
        $sth = $this->handle->prepare($sql);
        $sth->execute();

        return $sth->rowCount();
    }

    //-[新增数据]-//
    public function add($data = null){
        if(!isset($data) && !isset($this->options['data'])){
            exit('请赋值');
        }
        isset($data) ? $this->data($data) : $this->options['data'];

        $sql = sprintf("insert into `%s` %s", $this->table, $this->parseInsert($this->options['data']));
        if($this->fetchSql)
            return $sql;
        return $this->query($sql);
    }

    //-[修改数据]-//
    public function update($data = []){
        if(!isset($this->options['where'])){
            exit('更新条件不能为空');
        }

        if(!isset($data) && !isset($this->options['data'])){
            exit('请赋值');
        }
        isset($data) ? $this->data($data) : $this->options['data'];

        $sql = sprintf("update `%s` set %s %s", $this->table, $this->parseUpdate($this->options['data']), $this->options['where']);
        if($this->fetchSql)
            return $sql;
        return $this->query($sql);
    }

    //-[获取filter]-//
    protected function getFilter(){
        $filter = [];
        if (isset($this->options['where'])) {
            $filter[] = $this->options['where'];
        }
        if (isset($this->options['order'])) {
            $filter[] = $this->options['order'];
        }
        if (isset($this->options['limit'])) {
            $filter[] = $this->options['limit'];
        }
        return implode(' ', $filter);
    }

    //-[将数组转换成插入格式的sql语句]-//
    protected function parseInsert($data){
        if(!is_array($data))    return false;
        $fields = array();
        $values = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", $value);
        }

        $field = implode(',', $fields);
        $value = implode(',', $values);

        return sprintf("(%s) values (%s)", $field, $value);
    }

    //-[将数组转换成更新格式的sql语句]-//
    protected function parseUpdate($data){
        if(!is_array($data))    return false;
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = '%s'", $key, $value);
        }

        return implode(',', $fields);
    }

    //-[判断是否为关联数组]-//
    private function is_assoc($arr) {  
        return array_keys($arr) !== range(0, count($arr) - 1);  
    }   
}