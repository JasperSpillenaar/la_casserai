<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="Reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    public $room_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="Reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    public $user_id;

    /**
     * @ORM\Column(type="date")
     */
    public $checkin_date;

    /**
     * @ORM\Column(type="date")
     */
    public $checkout_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomId(): ?room
    {
        return $this->room_id;
    }

    public function setRoomId(?room $room_id): self
    {
        $this->room_id = $room_id;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->checkin_date;
    }

    public function setCheckinDate(\DateTimeInterface $checkin_date): self
    {
        $this->checkin_date = $checkin_date;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkout_date;
    }

    public function setCheckoutDate(\DateTimeInterface $checkout_date): self
    {
        $this->checkout_date = $checkout_date;

        return $this;
    }
}
