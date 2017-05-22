<?php
class Model {

    protected $table_name;
    protected $id_column;
    protected $columns = [];
    protected $column = [];
    protected $collection;
    protected $sql;
    protected $params = [];
    
    public function initCollection() {
        $columns = implode(',',$this->getColumns());
        $this->sql = "select $columns from " . $this->table_name ;
        return $this;
    }
    
    public function getColumns() {
        $db = new DB();
        $sql = "show columns from  $this->table_name;";
        $results = $db->query($sql);
        foreach($results as $result) {
            array_push($this->columns,$result['Field']);
        }
        return $this->columns;
    }

    public function getColumn($column_name) {
        $db = new DB();
        $sql = "select $this->table_name.$column_name from $this->table_name;";
        $results = $db->query($sql);
        foreach($results as $result) {
            $this->column[] = $result[$column_name];
        }
        return $this->column;
    }


    public function sort($params) {
        if(count($params) > 0) {
            $this->sql .= " order by ";
            foreach ($params as $key => $value) {
                $this->sql .= "$key $value,";
            }
            $this->sql= chop($this->sql,',');
        }
        return $this;
    }

    public function filter($params) {
       if ($params){
           $this->sql .= ' where ';
           foreach ($params as $k => $v){
               $this->sql .=  $k . ' = ? and ';
               $this->params[] = $v;
           }
           $this->sql = mb_strrichr($this->sql, 'and ', true);
       }
        return $this;
    }
    
    public function getCollection() {
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;
    }
    
    public function select() {
        return $this->collection;
    }
    
    public function selectFirst() {
        return isset($this->collection[0]) ? $this->collection[0] : null;
    }
    
    public function getItem($id) {
        $sql = "select * from $this->table_name where $this->id_column = ?;";
        $db = new DB();
        $params = array($id);
        return $db->query($sql, $params)[0];
    }

    public function saveItem($id, $values) {
        $sql = "update $this->table_name"
            . " set ";
        $params = [];
        foreach ($values as $key=>$value) {
            $sql .= "$key = ?,";
            array_push($params, $value);
        }
        $sql = chop($sql,',');
        $sql .= " where $this->id_column = ?;";
        array_push($params, $id);
        $db = new DB();
        return $db->query($sql, $params);
    }
    public function addItem($values) {
        $sql = "insert into {$this->table_name}(";
        $params = [];
        $vals = "";
        foreach ($values as $key=>$value) {
            $sql .= "$key,";
            $vals .= "?,";
            array_push($params, $value);
        }
        $sql = chop($sql,',');
        $vals = chop($vals,',');
        $sql .= ") values ($vals);";
        $db = new DB();
        return $db->query($sql, $params);
    }
    
    public function getPostValues() {
        $values = [];
        $columns = $this->getColumns();
        foreach ($columns as $column) {
            /*
            if ( isset($_POST[$column]) && $column !== $this->id_column ) {
                $values[$column] = $_POST[$column];
            }
             * 
             */
            $column_value = filter_input(INPUT_POST, $column);
            if ($column_value && $column !== $this->id_column ) {
                $values[$column] = $column_value;
            }

        }
        return $values;
    }

}
