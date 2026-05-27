<?php
class Animal
{
    private $nombre;
    private $edad;
    private $raza;

    public function __construct($nombre = "", $edad = 0, $raza = "")
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->raza = $raza;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setEdad($edad)
    {
        if ($edad > 0) {
            $this->edad = $edad;
        }
    }

    public function getEdad()
    {
        if ($this->edad > 0) {
            return $this->edad;
        }

        return "Edad no valida";
    }
}
?>
