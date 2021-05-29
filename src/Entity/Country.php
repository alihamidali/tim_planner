<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code_one", type="string", length=5, nullable=false)
     */
    private $codeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="code_two", type="string", length=5, nullable=false)
     */
    private $codeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=300, nullable=false)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=300, nullable=false)
     */
    private $nationality;


}
