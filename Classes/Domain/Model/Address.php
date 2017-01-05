<?php
namespace Dnilabs\DnilabsNewsletterforms\Domain\Model;
class Address extends \TYPO3\TtAddress\Domain\Model\Address {

    /**
     * @var boolean
     */
    protected $html;

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param string $html
     * @return void
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * @return boolean
     */
    public function getHtml() {
        return $this->html;
    }

}
