<?php
namespace Dnilabs\DnilabsNewsletterforms\Classes\PostProcess;

class UnsubscribePostProcessor extends \TYPO3\CMS\Form\PostProcess\AbstractPostProcessor
  implements \TYPO3\CMS\Form\PostProcess\PostProcessorInterface {

    /**
     * @var \Dnilabs\DnilabsNewsletterforms\Domain\Repository\AddressRepository
     * @inject
     */
    protected $addressRepository;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    /**
     * @var \TYPO3\CMS\Form\Domain\Model\Element
     */
    protected $form;

    /**
     * @var array
     */
    protected $typoScript;

    /**
     * Constructor
     *
     * @param \TYPO3\CMS\Form\Domain\Model\Element $form Form domain model
     * @param array $typoScript Post processor TypoScript settings
     */
    public function __construct(\TYPO3\CMS\Form\Domain\Model\Element $form, array $typoScript) {
        $this->form = $form;
        foreach($this->form->getChildElements() as $element) {
          $attr = $element->getAdditionalArguments();
          $this->args[$attr["name"]] = $attr["value"];
        }
        $this->typoScript = $typoScript;
    }

    /**
     * The main method called by the post processor
     *
     * @return string HTML message from this processor
     */
    public function process() {
        $querySettings = $this->addressRepository->createQuery()->getQuerySettings();
        $querySettings->setStoragePageIds(array($this->typoScript["pid"]));
        $this->addressRepository->setDefaultQuerySettings($querySettings);
        $address = $this->addressRepository->findOneByEmail($this->args["email"]);
        if ($address) {
          $this->addressRepository->remove($address);
          $this->persistenceManager->persistAll();
        }
    }

}
