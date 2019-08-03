<?php

namespace Entity;
/**
 * estado
 * @Entity
 * @Table(name="estado")
 */



class Estado{
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
    */
    public $id_estado;

    /**
     * @Column(type="string", columnDefinition="VARCHAR(20) NOT NULL")
    */
    public $sgl_estado = ''; 

      
    
    public function getId_estado(){
        return $this->id_estado;
    }

    public function setId_estado($id_estado){
        $this->id_estado = $id_estado;
    }

    public function getSgl_estado(){
        return $this->sgl_estado;
    }

    public function setSgl_estado($sgl_estado){
        $this->sgl_estado = $sgl_estado;
    }   
}


/* End of file membership.php */
/* Location: ./application/model/Responsavel.php */