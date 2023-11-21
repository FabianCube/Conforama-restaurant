<?php

class Usuarios
{
    private $usuario_id;
    private $rol_id;
    private $nombre_usuario;
    private $apellido_usuario;
    private $email;
    private $telefono;

    public function __construct()
    { }

    /**
     * Get the value of usuario_id
     */
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of rol_id
     */
    public function getRol_id()
    {
        return $this->rol_id;
    }

    /**
     * Set the value of rol_id
     *
     * @return  self
     */
    public function setRol_id($rol_id)
    {
        $this->rol_id = $rol_id;

        return $this;
    }

    /**
     * Get the value of nombre_usuario
     */
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Set the value of nombre_usuario
     *
     * @return  self
     */
    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }

    /**
     * Get the value of apellido_usuario
     */
    public function getApellido_usuario()
    {
        return $this->apellido_usuario;
    }

    /**
     * Set the value of apellido_usuario
     *
     * @return  self
     */
    public function setApellido_usuario($apellido_usuario)
    {
        $this->apellido_usuario = $apellido_usuario;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
