<?php

class CursoBean {
    public $codCurso;
    public $nombCurso;
    public $grupoCurso;
    public $horaEntrada;
    public $horaSalida;
    public $modoCurso;
    public $diaCurso;
    public $profesorApe;
    public $profesorNomb;
    public $estadoCurso;
    public $codArea; //De la llave foranea

    //Getter
    public function getCodCurso() {
        return $this->codCurso;
    }

    public function getNomCurso() {
        return $this->nombCurso;
    }

    public function getGrupoCurso() {
        return $this->grupoCurso;
    }

    public function getHoraEntrada() {
        return $this->horaEntrada;
    }

    public function getHoraSalida() {
        return $this->horaSalida;
    }

    public function getModoCurso() {
        return $this->modoCurso;
    }

    public function getDiaCurso() {
        return $this->diaCurso;
    }

    public function getProfesorApe() {
        return $this->profesorApe;
    }


    public function getProfesorNomb() {
        return $this->profesorNomb;
    }

    public function getEstadoCurso() {
        return $this->estadoCurso;
    }

    public function getCodArea() {
        return $this->codArea;
    }


    //Setter
    public function setCodCurso($codCurso) {
        $this->codCurso = $codCurso;
    }

    public function setNombCurso($nombCurso) {
        $this->nombCurso = $nombCurso;
    }

    public function setGrupoCurso($grupoCurso) {
        $this->grupoCurso = $grupoCurso;
    }

    public function setHoraEntrada($horaEntrada) {
        $this->horaEntrada = $horaEntrada;
    }

    public function setHoraSalida($horaSalida) {
        $this->horaSalida = $horaSalida;
    }

    public function setModoCurso($modoCurso) {
        $this->modoCurso = $modoCurso;
    }

    public function setDiaCurso($diaCurso) {
        $this->diaCurso = $diaCurso;
    }

    public function setProfesorApe($profesorApe) {
        $this->profesorApe = $profesorApe;
    }

    public function setProfesorNomb($profesorNomb) {
        $this->profesorNomb = $profesorNomb;
    }

    public function setEstadoCurso($estadoCurso) {
        $this->estadoCurso = $estadoCurso;
    }

    public function setCodArea($codArea) {
        $this->codArea = $codArea;
    }
}

?>

