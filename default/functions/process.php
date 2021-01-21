<?php
class  productValidate {

    private $data;
    private $errors = [];
    private static $fields = ['category', 'price','name','image'];

    public function __construct($post_data){
        $this->data = $post_data;
    }
    public function validateForm(){
        foreach(self::$fields as $field){
            if(array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateCategory();
        $this->validatePrice();
        $this->validateName();
        $this->validateImage();
        return $this->errors;
        
    }
    private function validateCategory(){
        $val = trim($this->data['category']);
        var_dump($val);
        exit;
        if(empty($val)){
            $this->addError('category', 'category cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('category', 'category must be 6-12 chars & alphanumeric');
            }
        }

    }
    private function validatePrice(){
        $val = trim($this->data['price']);

        if(empty($val)){
            $this->addError('price', 'category cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('price', 'category must be 6-12 chars & alphanumeric');
            }
        }


    }
    private function validateName(){
        if(empty($val)){
            $this->addError('name', 'name cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('name', 'name must be 6-12 chars & alphanumeric');
            }
        }

    }
    private function validateImage(){
        if(empty($val)){
            $this->addError('image', 'category cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('image', 'category must be 6-12 chars & alphanumeric');
            }
        }
    }
    private function addError($key, $val){
        $this->errors[$key] = $val;

    }
}

?>

