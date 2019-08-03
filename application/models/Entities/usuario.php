<?php


/**
 *
 * @Entity
 * @Table(name="usuario")
 */
class usuario
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;


    /**
     * @Column(type="string", columnDefinition="VARCHAR(50) NOT NULL")
     */
    public $nome = 0;


    /**
     * @Column(type="string", columnDefinition="VARCHAR(50) NOT NULL")
     */
    public $email = 0;


    /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
    */
    public $celular = '';
    

    /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
    */
    public $active = '';

   /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
    */
    public $id_estado; 


   /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
    */
    public $id_cidade;


     /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
    */
    public $datacadastro = ''; 

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

   
    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getId_Estado(){               
        return $this->id_estado;
    }


    public function setId_Estado($id_estado){              
        $this->id_estado = $id_estado;
        return $this->id_estado;
    }

    public function getId_Cidade(){               
        return $this->id_cidade;
    }


    public function setId_Cidade($id_cidade){              
        $this->id_cidade = $id_cidade;
        return $this->id_cidade;
    }

    public function getDatacadasro()
    {
        return $this->datacadastro;
    }

    public function setDatacadastro($datacadastro)
    {
        $this->datacadastro = $datacadastro;
    }

}


/* End of file usuario.php */
/* Location: ./application/model/usuario.php */