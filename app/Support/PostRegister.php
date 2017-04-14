<?php

namespace Claws\Support;


class PostRegister{

    protected $registered = [];

    public function greet(){
        dd('aaa');
    }

    public function register($post){
        if(!array_key_exists('name',$post)){
            return false;
        }

        if($this->isRegistered($post['name'])){
            return false;
        }

        $postPlural = str_plural($post['name']);
        $postTitle = title_case($post['name']);
        $postTitlePlural = title_case($postPlural);

        $defaultPost = [
            'name' => $post['name'],
            'template' => "template-{$post['name']}",
            'createText' => "Create {$postTitle}",
            'listTitle' => "List of {$postTitlePlural}",
            'urlBase' => "/{$post['name']}/",
            'listName' => $postTitlePlural,
        ];

        $postToRegister = $post + $defaultPost;

        $this->registered[$post['name']] = (object)$postToRegister;
    }

    public function isRegistered($post){
        return array_key_exists($post,$this->registered);
    }

    public function getRegisteredPost($post){
        return $this->registered[$post];
    }

    public function getRegister(){
        return $this->registered;
    }
}