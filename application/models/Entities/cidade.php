<?php

namespace Entity;
/**
 * cidade
 * @Entity
 * @Table(name="cidade")
 */



class Cidade{
    
    
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
    */
    public $id_cidade;

    /**
     * @Column(type="string", columnDefinition="VARCHAR(20) NOT NULL")
    */
    public $nom_cidade = ''; 

      
    
    public function getId_cidade(){
        return $this->id_cidade;
    }

    public function setId_cidade($id_cidade){
        $this->id_cidade = $id_cidade;
    } 

    public function getNom_cidade(){
        return $this->nom_cidade;
    }

    public function setNom_cidade($nom_cidade){
        $this->nom_cidade = $nom_cidade;
    }   
}


/* End of file membership.php */
/* Location: ./application/model/Responsavel.php */