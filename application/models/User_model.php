<?php

class User_model extends CI_Model {

    public function createUser($data) {


        if (isset($data['mot_de_passe'])) {
            $data['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_BCRYPT);
        }

        
        if ($this->db->insert('utilisateur', $data)) {
            return $this->db->insert_id();
        } else {
            log_message('error', 'Échec de l\'insertion de l\'utilisateur : ' . $this->db->last_query());
            return false;
        }
    }

    public function updateUser($data, $id) {

        if (isset($data['mot_de_passe'])) {
            $data['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_BCRYPT);
        }


        $this->db->where('id', $id);
        if ($this->db->update('utilisateur', $data)) {
            return true;
        } else {
            log_message('error', 'Échec de la mise à jour de l\'utilisateur avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return false;
        }
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('utilisateur')) {
            return true;
        } else {
            log_message('error', 'Échec de la suppression de l\'utilisateur avec l\'ID ' . $id . ': ' . $this->db->last_query());
            return false;
        }
    }

    public function getAllUtilisateur() {
        $query = $this->db->select('*')->from('utilisateur')->get();
        if ($query) {
            return $query->result();
        } else {
            log_message('error', 'Échec de la récupération de tous les utilisateurs : ' . $this->db->last_query());
            return [];
        }
    }

    public function getUtilisateurWithSearch($text = '', $by = 'name') {
        $allowedColumns = ['nom', 'prenom', 'login', 'role'];
        if (!in_array($by, $allowedColumns)) {
            log_message('error', 'Colonne invalide pour la recherche : ' . $by);
            show_error('Colonne invalide pour la recherche.', 400);
            return [];
        }

        $this->db->select('*')->from('utilisateur');

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

    public function get_user_by_login($login) {
        $query = $this->db->select('*')->from('utilisateur')->where('login', $login)->get();
        if ($query) {
            return $query->row();
        } else {
            log_message('error', 'Échec de la récupération de l\'utilisateur avec le login ' . $login . ': ' . $this->db->last_query());
            return null;
        }
    }
    

    public function validate_login($login, $password) {
        $user = $this->get_user_by_login($login);

        if ($user && password_verify($password, $user->mot_de_passe)) {
            return $user;
        } else {
            return null;
        }
    }
}
