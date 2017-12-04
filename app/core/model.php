<?php 
 class Model
{
  private static $db = null; 
  private $mysqli; 
  private $sym_query = "{?}"; 
  public $table;

  public static function getDB() {
    if (self::$db == null) self::$db = new Model();
    return self::$db;
  }

   function __construct() {
    $this->mysqli = new mysqli("127.0.0.1", "root", "", "sunnyvale-test");
    if($this->mysqli){
    $this->mysqli->query("SET lc_time_names = 'ru_RU'");
    $this->mysqli->query("SET NAMES 'utf8'");
    }
    else{echo "Ошибочка вышла. Нет соединения с базой!";}
    
        $modelName = get_class($this);
        $arrExp = preg_split("/(?=[A-Z])/", $modelName,0,PREG_SPLIT_NO_EMPTY);
        $tableName = strtolower($arrExp[1]);
        $this->table = $tableName;
  }

  public function getNumRows() {
      $num_query = $this->mysqli->query("SELECT * FROM `".$this->table."`");
      $num_rows = $num_query->num_rows;
      return $num_rows;
  }
  
   public function getAdminRows($query) {
      $num_query = $this->mysqli->query($query);
      $admin_rows = $num_query->num_rows;
      return $admin_rows;
  }
  /* Вспомогательный метод, который заменяет "символ значения в запросе" на конкретное значение,
   *  которое проходит через "функции безопасности" */
  private function getQuery($query, $params) {
    if ($params) {
      for ($i = 0; $i < count($params); $i++) {
        $pos = strpos($query, $this->sym_query);
        $arg = "'".$this->mysqli->real_escape_string($params[$i])."'";
        $query = substr_replace($query, $arg, $pos, strlen($this->sym_query));
    }
    }
    return $query;
  }

  /* SELECT-метод, возвращающий таблицу результатов */
  public function select($query, $params = false) {
    $result_set = $this->mysqli->query($this->getQuery($query, $params));
    if (!$result_set) return false;
    return $this->resultSetToArray($result_set);
  }

  /* SELECT-метод, возвращающий одну строку с результатом */
  public function selectRow($query, $params = false) {
    $result_set = $this->mysqli->query($this->getQuery($query, $params));
    if ($result_set->num_rows != 1){ return false;}
    else {return $result_set->fetch_assoc();}
  }

  /* SELECT-метод, возвращающий значение из конкретной ячейки */
  public function selectCell($query, $params = false) {
    $result_set = $this->mysqli->query($this->getQuery($query, $params));
    if ((!$result_set) || ($result_set->num_rows != 1)) return false;
    else {
      $arr = array_values($result_set->fetch_assoc());
      return $arr[0];
    }
  }

  /* НЕ-SELECT методы (INSERT, UPDATE, DELETE). Если запрос INSERT, то возвращается id последней вставленной записи */
  public function query($query, $params = false) {
    $success = $this->mysqli->query($this->getQuery($query, $params));
    if ($success) {
      if ($this->mysqli->insert_id === 0) return true;
      else return $this->mysqli->insert_id;
    }
    else return false;
  }

  /* Преобразование result_set в двумерный массив */
  private function resultSetToArray($result_set) {
    $array = array();
    while (($row = $result_set->fetch_assoc()) != false) {
      $array[] = $row;
    }
    return $array;
  }

  public function __destruct() {
    if ($this->mysqli) $this->mysqli->close();
  }
}

