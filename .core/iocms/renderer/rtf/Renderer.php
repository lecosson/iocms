<?php
/**
 * Created by PhpStorm.
 * User: lecosson
 * Date: 20.08.21
 * Time: 12:17
 */

namespace iocms\renderer\rtf;


use iocms\interfaces\IRenderer;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Reader\RTF\Document;
use PhpOffice\PhpWord\Writer\HTML;

class Renderer implements IRenderer {

    public static function renderSource($content):string {
        $phpWord = new PhpWord();

        $doc = new Document();
        $doc->rtf = $content;
        $doc->read($phpWord);

        $writer = new HTML($phpWord);
        return preg_replace( '/^<[^>]+>|<\/[^>]+>$/', '', // strip outer BODY tag
            trim( // remove trailing line breaks
                $writer->getWriterPart('Body')->write() // get text contet from RTF
            )
        );
    }

}