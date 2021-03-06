<?php
namespace Lobacher\Simpleblog\Domain\Validator;

class BlogValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {
    
    /**
     * Validates the given value
     *
     * @param mixed $object
     * @return bool
     */
    protected function isValid($object) {
        
        if (preg_match('/Joomla/i', $object->getTitle()) &&
            preg_match('/ist gut/i', $object->getDescription())) {
            
            $this->result->forProperty('title')
                ->addError(
                    new \TYPO3\CMS\Extbase\Error\Error(
                        'Title sollte nicht "Joomla" enthalten!',
                        1389545446
                    ));
                    
            $this->result->forProperty('description')
                ->addError(
                    new \TYPO3\CMS\Extbase\Error\Error(
                        'und die Beschreibung sollte nicht "ist gut" enthalten!',
                        1389545446
                    ));
        } else {
            return TRUE;
        }
    }
}
?>