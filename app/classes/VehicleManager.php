<?php

require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function addVehicle($data) {
        $vehicles = $this->readFile();
        $vehicles[] = $data;
        $data['id'] = uniqid();
        $this->writeFile($vehicles);

    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readFile();
        foreach ($vehicles as $vehicle){
            if ($vehicle['id'] == $id) {
                $vehicle = array_merge($vehicle, $data);
                break;
            }
        }

    $this->writeFile($vehicles);
    }

    public function deleteVehicle($id) {
        $vehicles = $this->readFile();
        $vehicles = array_filter($vehicles, function($vehicle) use ($id){
            return $vehicle['id'] != $id;
        });

        $this->writeFile(array_values($vehicles));

    }

    public function getVehicles() {
       return $this->readFile();
    }
    public function getDetails() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
           ];
    }
}
