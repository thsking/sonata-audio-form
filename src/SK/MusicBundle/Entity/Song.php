<?php

namespace SK\MusicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Song
 *
 * @ORM\Table(name="song")
 * @ORM\Entity(repositoryClass="SK\MusicBundle\Repository\SongRepository")
 */
class Song
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="credits", type="integer")
     */
    private $credits;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="text")
     */
    private $tags;

    /**
     * @var int
     *
     * @ORM\Column(name="listened", type="integer", nullable=true)
     */
    private $listened;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;


    /**
     * @ORM\OneToMany(targetEntity="SK\MusicBundle\Entity\Audio", mappedBy="song")
     */
    private $audios;

    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Song
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set artisteName
     *
     * @param string $artisteName
     *
     * @return Song
     */
    public function setArtisteName($artisteName)
    {
        $this->artisteName = $artisteName;

        return $this;
    }

    /**
     * Get artisteName
     *
     * @return string
     */
    public function getArtisteName()
    {
        return $this->artisteName;
    }

    /**
     * Set credits
     *
     * @param integer $credits
     *
     * @return Song
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Get credits
     *
     * @return int
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Song
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set listened
     *
     * @param integer $listened
     *
     * @return Song
     */
    public function setListened($listened)
    {
        $this->listened = $listened;

        return $this;
    }

    /**
     * Get listened
     *
     * @return int
     */
    public function getListened()
    {
        return $this->listened;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Song
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->audios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add audio
     *
     * @param \SK\MusicBundle\Entity\Audio $audio
     *
     * @return Song
     */
    public function addAudio(\SK\MusicBundle\Entity\Audio $audio)
    {
        $this->audios[] = $audio;

        return $this;
    }

    /**
     * Remove audio
     *
     * @param \SK\MusicBundle\Entity\Audio $audio
     */
    public function removeAudio(\SK\MusicBundle\Entity\Audio $audio)
    {
        $this->audios->removeElement($audio);
    }

    /**
     * Get audios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAudios()
    {
        return $this->audios;
    }
}
