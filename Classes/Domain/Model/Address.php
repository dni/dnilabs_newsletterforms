<?php
namespace Dnilabs\DnilabsNewsletterforms\Domain\Model;
class Address extends \TYPO3\TtAddress\Domain\Model\Address {

    /**
     * @var boolean
     */
    protected $html;

    /**
     * @var boolean
     */
    protected $hidden;

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

    /**
     * @param string $hidden
     * @return void
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return boolean
     */
    public function getHidden() {
        return $this->hidden;
    }

}
