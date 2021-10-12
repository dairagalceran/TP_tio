<?php

class TaskModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    }

    /**
     * Obtener todas las tareas de la DB
     */
    function getAllTasks() {
        // 1. Enviamos la consulta (2 sub pasos)
        $query = $this->db->prepare('SELECT * FROM task');
        $query->execute();

        // 2. obtengo la respuesta de la DB
        $tasks = $query->fetchAll(PDO::FETCH_OBJ); // obtengo un arreglo con TODAS las tareas

        return $tasks;
    }

    /**
     * Inserta una tarea en la DB
     */
    function insertTask($titulo, $descripcion, $prioridad) {
        $query = $this->db->prepare('INSERT INTO task(titulo, descripcion, prioridad) VALUES (?, ?, ?)');
        $query->execute([$titulo, $descripcion, $prioridad]);

        return $this->db->lastInsertId();
    }

    /**
     * Elimina una tarea en la DB
     */
    function deleteTask($id) {    
        $query = $this->db->prepare('DELETE FROM task WHERE id=?');
        $query->execute([$id]);
    }

    /**
     * Actualiza una tarea en la DB
     */
    function updateTask($id) {
        $query = $this->db->prepare('UPDATE task SET finalizada=1 WHERE id=?');
        $query->execute([$id]);
    }
	
}