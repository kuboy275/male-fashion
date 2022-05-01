<?php

namespace App\Traits;

trait DeleteModelTrait {


    public function deleteModel($id, $model_name, $gate_policy){

        $model_find = $model_name::find($id);
        $this->authorize($gate_policy,$model_find);

        $model_find->delete();
        return back();

    }

}