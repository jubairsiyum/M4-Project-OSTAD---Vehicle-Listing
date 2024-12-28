<?php
trait FileHandler {
    private $filePath = "data/vehicles.json";

    public function readFile() {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $json = file_get_contents($this->filePath);
        return json_decode($json, true) ?? [];
    }    

    public function writeFile($data) {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $json);
    }
}
