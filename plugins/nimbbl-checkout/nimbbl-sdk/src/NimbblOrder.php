<?php

namespace Nimbbl\Api;

use JsonSerializable;

class NimbblOrder extends NimbblEntity implements JsonSerializable
{
    public static function entityClass()
    {
        return 'Nimbbl\\Api\\NimbblOrder';
    }

    /**
     *  @param $id Customer id description
     */
    public function retrieveOne($id)
    {
        $nimbblRequest = new NimbblRequest();
        $oneEntity = $nimbblRequest->request('GET', 'orders/one/' . $id);
        $loadedEntity = $this->fillOne($oneEntity);
        $this->attributes = $loadedEntity->attributes;
        $this->error = $loadedEntity->error;
        return $this;
    }

    public function retrieveMany($options = array())
    {
        $f = base64_encode($this->buildHttpQuery($options));
        $nimbblRequest = new NimbblRequest();
        $manyEntities = $nimbblRequest->request('GET', 'orders/many?f=' . $f . '&pt=no');

        $users = array();
        foreach ($manyEntities['items'] as $idx => $oneEntity) {
            $users[] = $this->fillOne($oneEntity);
        }

        return [
            'items' => $users,
            'meta' => $manyEntities['_meta']
        ];
    }

    public function create($attributes = array())
    {
        $nimbblRequest = new NimbblRequest();
        $createdEntity = $nimbblRequest->request('POST', 'v2/create-order', $attributes);

        $newCreatedEntity = new NimbblOrder();
        if (key_exists('error', $createdEntity)) {
            $newCreatedEntity->error = $createdEntity['error'];
        }
        else {
            $attributes = array();
            foreach ($createdEntity as $key => $value) {
                $attributes[$key] = $value;
            }
            $newCreatedEntity->attributes = $attributes;
        }

        return $newCreatedEntity;
    }

    public function edit($attributes = null)
    {
        throw new Exception("Unsupported operation.");
    }
}
