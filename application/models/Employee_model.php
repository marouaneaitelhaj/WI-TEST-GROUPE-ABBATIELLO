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
}
