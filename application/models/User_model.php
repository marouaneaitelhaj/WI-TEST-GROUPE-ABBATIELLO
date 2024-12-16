<?php

class User_model extends CI_Model {

    public function createUsers($data) {
        if ($this->db->insert('users', $data)) {
            return $this->db->insert_id();
        } else {
            log_message('error', 'Échec de l\'insertion de l\'utilisateur : ' . $this->db->last_query());
            return false;
        }
    }

    public function updateUser($data, $id) {
        $this->db->where('id', $id);
        if ($this->db->update('users', $data)) {
            return true;
        } else {
            log_message('error', 'Échec de la mise à jour de l\'utilisateur avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return false;
        }
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('users')) {
            return true;
        } else {
            log_message('error', 'Échec de la suppression de l\'utilisateur avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return false;
        }
    }

    public function getAllUsers() {
        $query = $this->db->select('*')->from('users')->get();
        if ($query) {
            return $query->result();
        } else {
            log_message('error', 'Échec de la récupération de tous les utilisateurs : ' . $this->db->last_query());
            return [];
        }
    }

    public function getUsersWithSearch($text = '', $by = 'name') {
        $allowedColumns = ['name', 'surname', 'login', 'role'];
        if (!in_array($by, $allowedColumns)) {
            log_message('error', 'Colonne invalide pour la recherche : ' . $by);
            show_error('Colonne invalide pour la recherche.', 400);
            return [];
        }

        $this->db->select('*')->from('users');

        if (!empty($text)) {
            $this->db->like($by, $text);
        }

        $query = $this->db->get();
        if ($query) {
            return $query->result();
        } else {
            log_message('error', 'Échec de la récupération des utilisateurs avec la recherche : ' . $this->db->last_query());
            return [];
        }
    }
}
