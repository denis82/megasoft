<?php

final class Parser
{

    public function dom()
    {
        $dom = new DOMDocument();


        //methods to load HTML
        $this->curl();
        $dom->loadHTMLFile('https://www.bills.ru/');


        $documentElement = $dom->documentElement;
        var_dump($documentElement);
    }

    private function curl()
    {
        $url = "https://www.bills.ru";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($ch);
        var_dump(curl_error($ch));
        curl_close($ch);
        exit;
    }
}


$d = new Parser();

$d->dom();
