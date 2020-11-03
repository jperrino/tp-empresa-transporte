<?php

class Chofer
{

    public $cuil;
    public $apellido;
    public $nombre;
    public $domicilio;
    public $telefono1;
    public $telefono2;
    public $fechaNacimiento;
    public $fechaIngreso;
    public $fechaBaja;
    public $motivoBaja;
    public $fechaVencimientoCarnet;

    public function __construct($cuil, $apellido, $nombre, $domicilio, $telefono1, $telefono2,
        $fechaNacimiento, $fechaIngreso, $fechaBaja, $motivoBaja,
        $fechaVencimientoCarnet) {
        $this->cuil = $cuil;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->domicilio = $domicilio;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaBaja = $fechaBaja;
        $this->motivoBaja = $motivoBaja;
        $this->fechaVencimientoCarnet = $fechaVencimientoCarnet;
    }

    public function get_cuil()
    {
        return $this->cuil;
    }

    public function get_apellido()
    {
        return $this->apellido;
    }

    public function get_nombre()
    {
        return $this->nombre;
    }

    public function get_domicilio()
    {
        return $this->domicilio;
    }

    public function get_telefono1()
    {
        return $this->telefono1;
    }

    public function get_telefono2()
    {
        return $this->telefono2;
    }

    public function get_fechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function get_fechaIngreso()
    {
        return $this->fechaIngreso;
    }

    public function get_fechaBaja()
    {
        return $this->fechaBaja;
    }

    public function get_motivoBaja()
    {
        return $this->motivoBaja;
    }

    public function get_fechaVencimientoCarnet()
    {
        return $this->fechaVencimientoCarnet;
    }

}
