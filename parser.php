<?php

final class Parser
{

    public function dom()
    {
        $dom = new DOMDocument();

        $this->curl();
        $dom->loadHTMLFile('foo.html');
        return $dom;
    }

    private function curl(): void
    {
        if (!file_get_contents('foo.html')) {
            exec('curl -o foo.html https://www.bills.ru');
        }
    }
}


$d = new Parser();

$dom  = $d->dom();

$table = $dom->getElementById('bizon_api_news_list');
$child_elements = $table->getElementsByTagName('td');

foreach ($child_elements as $child_element) {
    if ("news_date" === $child_element->getAttribute('class')) {
        var_dump("Дата: " . trim($child_element->textContent));
    }

    $ps = $child_element->getElementsByTagName('a');
    $first_para = $ps->item(0);
    if ($first_para) {
        var_dump($first_para->textContent);
        foreach ($ps as $g) {
            $url = $child_element->getAttribute('href');
            var_dump($url);
        }
    }
}
