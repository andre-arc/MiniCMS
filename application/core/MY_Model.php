<?php
class MY_Model extends CI_Model
{  
    protected $table_name='';
    protected $primary_key='id';
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();

           if (!$this->table_name) {
            $this->table_name = str_replace('M_','', get_class($this));
        }

    }
    
    public function get($id) {
        return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
    }

    public function get_all($fields = '', $where = array(), $table = '', $limit = '', $order_by = '', $group_by = '', $join = null) {
        $data = array();
        if ($fields != '') {
            $this->db->select($fields);
        }

        if (count($where)) {
            $this->db->where($where);
        }

        if ($table != '') {
            $this->table_name = $table;
        }

        if ($limit != '') {
            if(is_array($limit)){
                $this->db->limit($limit[0], $limit[1]);
            }
            elseif(is_numeric($limit)){
                $this->db->limit($limit);
            }
        }

        if ($order_by != '') {
            $this->db->order_by($order_by);
        }

        if ($group_by != '') {
            $this->db->group_by($group_by);
        }
        
        if($join != null){
            $this->db->join($join['table_name'], $join['foreign_key']);
        }

        $Q = $this->db->get($this->table_name);

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_object() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();

        return $data;
    }

    public function insert($data) {
        $data['date_created'] = $data['date_updated'] = date('Y-m-d H:i:s');
        $data['created_from_ip'] = $data['updated_from_ip'] = $this->input->ip_address();

        $success = $this->db->insert($this->table_name, $data);
        if ($success) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function update($data, $id) {
        $data['date_updated'] = date('Y-m-d H:i:s');
        $data['updated_from_ip'] = $this->input->ip_address();

        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id);

        return $this->db->delete($this->table_name);
    }

}
?>