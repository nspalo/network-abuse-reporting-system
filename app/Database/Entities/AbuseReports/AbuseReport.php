<?php

namespace App\Database\Entities\AbuseReports;

use App\Database\Entities\Entity;
use App\Database\Entities\NetworkAddress\NetworkAddress;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbuseReport
 * @package App\Database\Entities\AbuseReports
 * @ORM\Entity
 */
class AbuseReport extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many Report is associated to One IP
     * - This is the owning side.
     *
     * @ORM\ManyToOne(targetEntity="App\Database\Entities\NetworkAddress\NetworkAddress", inversedBy="abuseReports")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * @var NetworkAddress $ipAddress
     */
    protected $ipAddress;

    /**
     *  Comment
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $comment;

    /**
     * AbuseReport constructor.
     *
     * @param NetworkAddress $ipAddress
     * @param string $comment
     */
    public function __construct(NetworkAddress $ipAddress, string $comment)
    {
        $this->setIpAddress($ipAddress);
        $this->setComment($comment);
    }

    /**
     * NetworkAddress
     *
     * @return NetworkAddress
     */
    public function getNetworkAddress(): NetworkAddress
    {
        return $this->ipAddress;
    }

    /**
     * NetworkAddress' IP Address Value
     *
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->getNetworkAddress()->getIpAddress();
    }

    /**
     * @param NetworkAddress $ipAddress
     */
    public function setIpAddress(NetworkAddress $ipAddress): void
    {
        if($ipAddress === null) {
            throw new \RuntimeException('Invalid IP Address');
        }
        $this->ipAddress = $ipAddress;
    }
    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        if(empty($comment)) {
            $comment = null;
        }

        $this->comment = $comment;
    }
}
