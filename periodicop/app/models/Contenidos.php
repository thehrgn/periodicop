<?php

class Contenidos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $titulo;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $cuerpo;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $image_url;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $categoria_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $created;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $modified;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('categoria_id', 'Categorias', 'id', ['alias' => 'Categorias']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contenidos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contenidos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'contenidos';
    }

}
