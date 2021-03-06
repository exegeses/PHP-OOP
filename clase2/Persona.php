<?php

    class Persona
    {
        ## atributos
        private $nombre;
        private $apellido;

        ## métodos

        /**
         * Método para informar datos de la Persona
         * @return string $mensaje
         */
        public function verDatos()
        {
            $mensaje = 'Nombre: '.$this->nombre;
            $mensaje .= '<br>';
            $mensaje .= 'Apellido: '.$this->apellido;
            $mensaje .= '<br>';
            return $mensaje;
        }

        ### getters and setters

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }
        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre): void
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getApellido()
        {
            return $this->apellido;
        }
        /**
         * @param mixed $apellido
         */
        public function setApellido($apellido): void
        {
            $this->apellido = $apellido;
        }



    }
