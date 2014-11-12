<?php
namespace Lobacher\Simpleblog\Validation\Validator;
class WordValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {
    
    public function isValid($property) {
        
        $max = $this->options['max'];
        
        if (str_word_count($property, 0) <= $max) {
            return TRUE;
        } else {
            $this->addError('Verringern Sie die Anzahl der Worte - es sind maximal '.$max.' erlaubt!', 1383400016);
            return FALSE;
        }
    }
}
?>