<?php

namespace core\selby\SitemapMaker;

use PHPHtmlParser\Dom;

class SitemapXmlMaker extends \core\selby\SitemapMaker
{
    public function createMap(): ?string
    {
        $result = '';
        $writer = new \XMLWriter;

        $writer->openMemory();
        $writer->setIndentString('    ');
        $writer->setIndent(true);
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('urlset');
        $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $writer->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        for ($i = 0; $i < min(count($this->input), $this->limit); $i++) {

            $parts = explode(';', trim($this->input[$i]), 2);
            $url   = $parts[0];

            $writer->startElement('url');

                $writer->startElement('loc');
                $writer->text($url);
                $writer->endElement();

                $writer->startElement('lastmod');
                $writer->text(date(DATE_ATOM));
                $writer->endElement();

                $writer->startElement('changefreq');
                $writer->text('daily');
                $writer->endElement();

                $writer->startElement('priority');
                $writer->text('1.0');
                $writer->endElement();

            $writer->endElement();
        }

        $writer->endElement();
        $writer->endDocument();
        $result = $writer->outputMemory();

        return trim($result);
    }
}
