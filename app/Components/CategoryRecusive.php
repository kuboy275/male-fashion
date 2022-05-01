<?php

namespace App\Components;

class CategoryRecusive {

    private $data;
    private $html_select = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($parent_id , $id = 0, $text  = ''){

        foreach ($this->data as $value) {
            if($value['parent_id'] == $id ){
                
                if( !empty($parent_id) && $parent_id == $value['id'] ){
                    $this->html_select .= "<option a  selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }
                else {
                    
                    $this->html_select .= "<option b value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }

                $this->categoryRecusive($parent_id, $value['id'], $text. '| - ');

            }
        }

        return $this->html_select;

    }

}
