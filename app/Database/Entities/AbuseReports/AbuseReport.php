<?php

namespace App\Database\Entities\AbuseReports;

use App\Database\Entities\Entity;
use App\Database\Entities\NetworkAddress\NetworkAddress;
use App\Database\Entities\User\User;
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
     * @ORM\JoinColumn(name="network_id", referencedColumnName="id")
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
     * One User can submit Many Abuse Report
     *
     * @ORM\ManyToOne(targetEntity="App\Database\Entities\User\User")
     * @ORM\JoinColumn(name="reporter_id", referencedColumnName="id")
     * @var User $reporter
     */
    protected $reporter;

    /**
     * AbuseReport constructor.
     *
     * @param NetworkAddress $ipAddress
     * @param string $comment
     * @param User|null $reporter
     */
    public function __construct(NetworkAddress $ipAddress, string $comment, ?User $reporter = null)
    {
        $this->setIpAddress($ipAddress);
        $this->setComment($comment);
        $this->setReporter($reporter);
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
     * Set Network Address
     *
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
     * Get Report Comment
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Set Report Comment
     *
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        if(empty($comment)) {
            $comment = null;
        }

        $this->comment = $comment;
    }

    /**
     * Retrieve the Report(User) Instance
     * - reporting can be done by non registered reporter
     *   hence, null value must be expected
     *
     * @return ?User
     */
    public function getReporter(): ?User
    {
        return $this->reporter;
    }

    /**
     * Set the Report(User) Instance
     * - reporting can be done by non registered reporter
     *   hence, null value must be expected
     *
     * @param User|null $reporter
     */
    public function setReporter(?User $reporter): void
    {
        if($reporter === null) {
            $reporter = null;
        }

        $this->reporter = $reporter;
    }
}
