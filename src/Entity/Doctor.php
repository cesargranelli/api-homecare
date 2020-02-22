<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="doctors")
 */
class Doctor
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    public $id;
    /**
     * @ORM\Column(type="string")
     */
    public $crm;
    /**
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * Doctor constructor.
     * @param $crm
     * @param $name
     */
    public function __construct($crm, $name)
    {
        $this->crm = $crm;
        $this->name = $name;
    }

}