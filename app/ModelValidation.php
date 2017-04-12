<?php

namespace App;
use Validator;
use Illuminate\Support\MessageBag;

trait ModelValidation {

    protected $errors;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    protected static function boot(){
        parent::boot();

        static::saving(function($model){
            return $model->validate();
        });
    }

    public function validate(){

        $currentDirtyRules = static::$dirtyRules;
        $dirtyAttributes = $this->getDirty();

        foreach ($currentDirtyRules as $key => $value) {
            if(empty($dirtyAttributes[$key])){
                unset($currentDirtyRules[$key]);
            }
        }

        $merged_rules = array_merge(static::$rules, $currentDirtyRules);

        $v = Validator::make($this->attributes, $merged_rules, static::$messages);

        if ($v->passes() && !$this->hasErrors()){
            return true;
        }

        if($this->errors == null){
            $this->errors = new MessageBag();
        }
        $this->setErrors($v->messages());
        return false;
    }

    public function addError($key, $message){

        if($this->errors == null){
            $this->errors = new MessageBag();
        }

        $this->errors->add($key,$message);
    }

    protected function setErrors($errors){
        $this->errors->merge($errors);
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        return ! empty($this->errors);
    }
}