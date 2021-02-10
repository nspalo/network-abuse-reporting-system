<?php

namespace App\Database\Entities\NetworkAddress;

use App\Database\Entities\AbuseReports\AbuseReport;
use App\Database\Entities\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class NetworkAddress
 * @package App\Database\Entities\NetworkAddress
 * @ORM\Entity
 * @ORM\Table(name="network_address")
 */
class NetworkAddress extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * String Representation of IPV4 or IPV6
     *
     * @ORM\Column(name="ip_address", type="string", length=45, unique=true, nullable=false)
     */
    protected $ipAddress;

    /**
     * One IP Address has many One or Many Abuse Report
     * - This is the inverse side.
     *
     * @ORM\OneToMany(targetEntity="App\Database\Entities\AbuseReports\AbuseReport", mappedBy="ipAddress")
     * @var ArrayCollection|AbuseReport[] $abuseReports
     */
    protected $abuseReports;


    /**
     * NetworkAddress constructor.
     * @param string $ipAddress
     */
    public function __construct(string $ipAddress)
    {
        $this->setIpAddress($ipAddress);
        $this->abuseReports = new ArrayCollection();
    }

    /**
     * Get IP Address Version
     * - validate IP Address and return IPV4 or IPV6
     *   otherwise, throw a runtime exception
     *
     * @param string|null $ipAddress
     * @return string
     */
    public function getAddressVersion(?string $ipAddress): string
    {
        if(empty($ipAddress)) {
            $ipAddress = $this->getIpAddress();
        }

        if(filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipVersion = "IPV4";
        } else if(filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipVersion = "IPV6";
        } else {
            throw new \RuntimeException('Invalid IP Address.');
        }

        return $ipVersion;
    }

    /**
     * Get the Network's IP Address value
     * - Supports IPV4 and IPV6
     *
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     *  Set the Network's IP Address value
     * - Supports IPV4 and IPV6
     *
     * @param string $ipAddress
     */
    public function setIpAddress(string $ipAddress): void
    {
        if(filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            $this->ipAddress = $ipAddress;
        } else {
            throw new \RuntimeException('Invalid IP Address.');
        }
    }

    /**
     * Get Abuse Reports
     *
     * @return AbuseReport[]|ArrayCollection
     */
    public function getAbuseReports()
    {
        return $this->abuseReports;
    }

    /**
     * Add new Abuse Report
     *
     * @param $abuseReport
     */
    public function addAbuseReports($abuseReport): void
    {
        if(empty($abuseReport)) {
            throw new \RuntimeException('Invalid Abuse Report');
        }

        $this->abuseReports->add($abuseReport);
    }
}
