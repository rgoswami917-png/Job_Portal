<?php
require_once(LIB_PATH . DS . 'database.php');

class Jobs {

    protected static $tblname = "tbljob";

    /** Get all DB fields **/
    function dbfields() {
        global $mydb;
        return $mydb->getfieldsononetable(self::$tblname);
    }

    /** Return all jobs **/
    function listofjob() {
        global $mydb;
        $mydb->setQuery("SELECT * FROM " . self::$tblname);
        $cur = $mydb->loadResultList();   // ✅ FIXED
        return $cur;
    }

    /** Return single job **/
    function single_job($id = "") {
        global $mydb;
        $mydb->setQuery("SELECT * FROM " . self::$tblname . " WHERE JOBID = '{$id}' LIMIT 1");
        $cur = $mydb->loadSingleResult();
        return $cur;
    }

    /** Instantiate object **/
    static function instantiate($record) {
        $object = new self;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute) {
        return array_key_exists($attribute, $this->attributes());
    }

    /** Get attributes **/
    protected function attributes() {
        $attributes = array();
        foreach ($this->dbfields() as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    /** Sanitize attributes **/
    protected function sanitized_attributes() {
        global $mydb;
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $mydb->escape_value($value);
        }
        return $clean_attributes;
    }

    /** Save job **/
    public function save() {
        return isset($this->JOBID) ? $this->update($this->JOBID) : $this->create();
    }

    /** Create job **/
    public function create() {
        global $mydb;
        $attributes = $this->sanitized_attributes();

        $sql = "INSERT INTO " . self::$tblname . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        $mydb->setQuery($sql);

        if ($mydb->executeQuery()) {
            $this->JOBID = $mydb->insert_id();
            return true;
        } else {
            return false;
        }
    }

    /** Update job **/
    public function update($id = 0) {
        global $mydb;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();

        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$tblname . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE JOBID = '{$id}'";

        $mydb->setQuery($sql);
        return $mydb->executeQuery();
    }

    /** Delete job **/
    public function delete($id = 0) {
        global $mydb;
        $sql = "DELETE FROM " . self::$tblname . " WHERE JOBID = '{$id}' LIMIT 1";
        $mydb->setQuery($sql);
        return $mydb->executeQuery();
    }
}
?>
