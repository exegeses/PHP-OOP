<?php

    class Destino
    {

        private $destID;
        private $destNombre;
        private $destPrecio;
        private $regID;
        private $destAsientos;
        private $destDisponibles;
        private $destActivo;

        public function listarDestinos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre,
                           d.regID, regNombre,					
					       destPrecio,
					       destAsientos,
					       destDisponibles 
			            FROM destinos as d
			            INNER JOIN regiones as r
			                ON d.regID = r.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll();
            return $destinos;
        }

        public function agregarDestino()
        {
            $destNombre = $_POST['destNombre'];
            $regID = $_POST['regID'];
            $destPrecio = $_POST['destPrecio'];
            $destAsientos = $_POST['destAsientos'];
            $destDisponibles = $_POST['destDisponibles'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO destinos
                        ( destNombre, regID, destPrecio, destAsientos, destDisponibles )
                        VALUES 
                        ( :destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles )";
            $stmt = $link->prepare($sql);

            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);

            if( $stmt->execute() ){
                //registramos todos los atributos
                $this->setRegID($link->lastInsertId());
                $this->setDestNombre($destNombre);
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
                $this->setDestActivo(1);//default
                return true;
            }
            return false;
        }
        
        ###### getters & setters
        /**
         * @return mixed
         */
        public function getDestID()
        {
            return $this->destID;
        }

        /**
         * @param mixed $destID
         */
        public function setDestID($destID): void
        {
            $this->destID = $destID;
        }

        /**
         * @return mixed
         */
        public function getDestNombre()
        {
            return $this->destNombre;
        }

        /**
         * @param mixed $destNombre
         */
        public function setDestNombre($destNombre): void
        {
            $this->destNombre = $destNombre;
        }

        /**
         * @return mixed
         */
        public function getDestPrecio()
        {
            return $this->destPrecio;
        }

        /**
         * @param mixed $destPrecio
         */
        public function setDestPrecio($destPrecio): void
        {
            $this->destPrecio = $destPrecio;
        }

        /**
         * @return mixed
         */
        public function getRegID()
        {
            return $this->regID;
        }

        /**
         * @param mixed $regID
         */
        public function setRegID($regID): void
        {
            $this->regID = $regID;
        }

        /**
         * @return mixed
         */
        public function getDestAsientos()
        {
            return $this->destAsientos;
        }

        /**
         * @param mixed $destAsientos
         */
        public function setDestAsientos($destAsientos): void
        {
            $this->destAsientos = $destAsientos;
        }

        /**
         * @return mixed
         */
        public function getDestDisponibles()
        {
            return $this->destDisponibles;
        }

        /**
         * @param mixed $destDisponibles
         */
        public function setDestDisponibles($destDisponibles): void
        {
            $this->destDisponibles = $destDisponibles;
        }

        /**
         * @return mixed
         */
        public function getDestActivo()
        {
            return $this->destActivo;
        }

        /**
         * @param mixed $destActivo
         */
        public function setDestActivo($destActivo): void
        {
            $this->destActivo = $destActivo;
        }
    }