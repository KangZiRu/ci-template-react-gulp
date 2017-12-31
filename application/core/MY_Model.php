<?php defined('BASEPATH') OR die('No direct script access is allowed!');


class MY_Model extends CI_Model
{
    public $_db;


    protected $table_name;
    protected $primary_key = 'id';
    protected $selected;
    protected $error = array();


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * -------------------------------------------------------------------
     * CRUD FUNCTIONS
     * -------------------------------------------------------------------
     */
    public function get_all($fields=NULL, $where=NULL, $limit=NULL, $order_by=NULL)
    {
        if ($fields !== NULL)
        {
            $this->db->select($fields);
        }

        if ($where !== NULL)
        {
            $this->db->where($where);
        }

        if ($limit !== NULL)
        {
            $this->db->limit($limit[1], $limit[0]);
        }

        if ($order_by !== NULL)
        {
            $this->db->order_by($order_by);
        }

        return $this->db->get($this->table_name)->result_object();
    }


    public function get($id, $select=NULL)
    {
        if ($select !== NULL)
        {
            $this->db->select();
        }

        if (gettype($id) == 'array')
        {
            $this->db->where($id);
        }
        else
        {
            $this->db->where($this->primary_key, $id);
        }

        return $this->db->get($this->table_name)
                        ->result_object();
    }


    public function insert($data)
    {
        return $this->db->insert($this->table_name, $data) ? TRUE : FALSE;
    }


    public function update($id, $data)
    {
        return $this->db->where($this->primary_key, $id)
                        ->update($this->table_name, $data);
    }


    public function delete($id)
    {
        return $this->db->where($this->primary_key, $id)
                        ->delete($this->table_name);
    }


    /**
     * -------------------------------------------------------------------
     * HELPER FUNCTIONS
     * -------------------------------------------------------------------
     */

    /**
     * Wrapper for $this->db->like()
     *
     * @param $column   Specified column you want to search
     * @param $pattern  Matching value pattern you want to search
     *
     * @return object
     */
    public function search($column, $pattern=NULL)
    {
        if ($pattern === NULL)
        {
            $this->db->like($column);
        }
        else
        {
            $this->db->like($column, $pattern);
        }

        return $this;
    }


    public function select($field)
    {
        $this->db->select($field);

        return $this;
    }


    public function join($table_name, $join_condition)
    {
        $this->db->join($table_name, $join_condition);
        
        return $this;
    }


    public function count()
    {
        $data = $this->db->select('COUNT('.$this->primary_key.') as count')
                         ->get($this->table_name)
                         ->result_object();

        return int($data->count);
    }


    /**
     * -------------------------------------------------------------------
     * UTILITY FUNCTIONS
     * -------------------------------------------------------------------
     */

    /**
     * Get the database errors
     *
     * @param $return_type  Variable type you want to returned
     * @param $index        Error index
     */
    public function get_error($return_type=NULL, $index=0)
    {
        if ( ! is_null($return_type))
        {
            if ($return_type == 'code')
            {
                $keys = array_keys($this->error);
                return isset($keys[0]) ? $keys[0] : '';
            }
            else if ($return_type='string')
            {
                return isset($this->error[$index]) ? $this->error[$index] : '';
            }
        }

        return $this->error;
    }


    /**
     * Set database error
     *
     * @param $error_message    Error message to display
     * @param #error_code       Error code to specify the error type
     */
    private function set_error($error_message, $error_code=NULL)
    {
        if (is_null($error_code))
        {
            if (gettype($error_message) == 'array')
            {
                $this->error = $error_message;
            }
            else $this->error[] = $error_message;
        }
        else
        {
            $this->error[$error_code] = $error_message;
        }
    }
}
