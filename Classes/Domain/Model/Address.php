<?php
namespace Dnilabs\DnilabsNewsletterforms\Domain\Model;
class Address extends \TYPO3\TtAddress\Domain\Model\Address {

    /**
     * @var boolean
     */
    protected $module_sys_dmail_html;

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param string $module_sys_dmail_html
     * @return void
     */
    public function setHtml($module_sys_dmail_html)
    {
        $this->module_sys_dmail_html = $module_sys_dmail_html;
    }

    /**
     * @return boolean
     */
    public function getHtml() {
        return $this->module_sys_dmail_html;
    }

}
