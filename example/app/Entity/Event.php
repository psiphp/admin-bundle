<?php

namespace Psi\Bundle\Admin\Example\app\Entity;

use Doctrine\ORM\Mapping as ORM;
use Psi\Component\ContentType\Metadata\Annotations as ContentType;
use Psi\Component\Grid\Metadata\Annotations as Grid;

/**
 * @ORM\Entity()
 *
 * @Grid\Grid(
 *     name="main",
 *     columns={
 *         @Grid\Column(name="title", type="property")
 *     }
 * )
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ContentType\Field(type="date")
     */
    private $date;

    /**
     * @ContentType\Field(type="text")
     */
    private $title;

    public function getDate() 
    {
        return $this->date;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getTitle() 
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
