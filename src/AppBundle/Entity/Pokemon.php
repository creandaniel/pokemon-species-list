<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use AppBundle\Controller\PokemonController;

/**
 *@ORM\Entity
 *@ORM\Table(name="pokemon")
 */

class Pokemon
{

	/**
	*@ORM\Column(type="integer")
	*@ORM\Id
	*@ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

    /**
	*@ORM\Column(type="string", length=150)
	*
	* @Assert\NotBlank()
	* @Assert\Length(min=2)
	*/

	protected $name;

	/**
	*@ORM\Column(type="text")
	*
	*@Assert\NotBlank()
	*@Assert\Length(min=5, max=500)
	*/

	protected $description;

    /**
	*@ORM\Column(type="text")
	*
	*@Assert\NotBlank()
	*@Assert\Length(min=5, max=500)
	*/

	protected $types;

    /**
	*@ORM\Column(type="text")
	*
	*@Assert\NotBlank()
	*@Assert\Length(min=5, max=100)
	*/

	protected $moves;

    /**
	*@ORM\Column(type="text")
	*
	*@Assert\NotBlank()
	*@Assert\Length(min=5, max=150)
	*/

	protected $ability;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Pokemon
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pokemon
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set types
     *
     * @param string $types
     *
     * @return Pokemon
     */
    public function setTypes($types)
    {
        $this->types = $types;

        return $this;
    }

    /**
     * Get types
     *
     * @return string
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Set moves
     *
     * @param string $moves
     *
     * @return Pokemon
     */
    public function setMoves($moves)
    {
        $this->moves = $moves;

        return $this;
    }

    /**
     * Get moves
     *
     * @return string
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * Set ability
     *
     * @param string $ability
     *
     * @return Pokemon
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;

        return $this;
    }

    /**
     * Get ability
     *
     * @return string
     */
    public function getAbility()
    {
        return $this->ability;
    }
}
