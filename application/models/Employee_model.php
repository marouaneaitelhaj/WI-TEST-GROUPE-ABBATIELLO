<?php

class Employee_model extends CI_Model {

    public function createEmployee($data) {
        if ($this->db->insert('employees', $data)) {
            return $this->db->insert_id();
        } else {
            log_message('error', 'Échec de l\'insertion de l\'employé : ' . $this->db->last_query());
            return false;
        }
    }

    public function updateEmployee($data, $id) {
        $this->db->where('id', $id);
        if ($this->db->update('employees', $data)) {
            return true;
        } else {
            log_message('error', 'Échec de la mise à jour de l\'employé avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return false;
        }
    }

    public function deleteEmployee($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('employees')) {
            return true;
        } else {
            log_message('error', 'Échec de la suppression de l\'employé avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return false;
        }
    }

    public function getAllEmployees() {
        $query = $this->db->select('*')->from('employees')->get();
        if ($query) {
            return $query->result();
        } else {
            log_message('error', 'Échec de la récupération de tous les employés : ' . $this->db->last_query());
            return [];
        }
    }

    public function getEmployeesWithSearch($text = '', $by = 'name') {
        $allowedColumns = ['id', 'nom', 'prenom', 'mail', 'adresse', 'telephone', 'poste'];
        if (!in_array($by, $allowedColumns)) {
            log_message('error', 'Colonne invalide pour la recherche : ' . $by);
            show_error('Colonne invalide pour la recherche.', 400);
            return [];
        }

        $this->db->select('*')->from('employees');

        if (!empty($text)) {
            $this->db->like($by, $text);
        }

        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            log_message('error', 'Échec de la récupération des employés avec la recherche : ' . $this->db->last_query());
            return [];
        }
    }

    public function getEmployeeById($id) {
        $query = $this->db->select('*')->from('employees')->where('id', $id)->get();
        if ($query) {
            return $query->row();
        } else {
            log_message('error', 'Échec de la récupération de l\'employé avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return null;
        }
    }

    public function searchEmployees($search, $sort_by = 'nom', $sort_order = 'asc') {
        $allowedSortColumns = ['id', 'nom', 'prenom', 'mail', 'adresse', 'telephone', 'poste'];
        $allowedSortOrders = ['asc', 'desc'];

        if (!in_array($sort_by, $allowedSortColumns)) {
            log_message('error', 'Colonne de tri invalide : ' . $sort_by);
            show_error('Colonne de tri invalide.', 400);
            return [];
        }

        if (!in_array($sort_order, $allowedSortOrders)) {
            log_message('error', 'Ordre de tri invalide : ' . $sort_order);
            show_error('Ordre de tri invalide.', 400);
            return [];
        }

        $this->db->select('*')->from('employees');

        if (!empty($search)) {
            $this->db->group_start()
                     ->like('nom', $search)
                     ->or_like('prenom', $search)
                     ->or_like('mail', $search)
                     ->or_like('adresse', $search)
                     ->or_like('telephone', $search)
                     ->or_like('poste', $search)
                     ->group_end();
        }

        $this->db->order_by($sort_by, $sort_order);

        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            log_message('error', 'Échec de la recherche des employés : ' . $this->db->last_query());
            return [];
        }
    }
}
