<?php

namespace Claws\Support;


class PostRegister{

    protected $registered = [];
    private $currentMeta = '';
    private $currentPost = '';

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
            'meta' => []
        ];

        $postToRegister = $post + $defaultPost;

        $this->registered[$post['name']] = (object)$postToRegister;
    }

    public function isRegistered($post){
        return array_key_exists($post,$this->registered);
    }

    public function addPostMeta($post,$key,$template){
        $this->registered[$post]->meta[$key] = [];
        $this->registered[$post]->meta[$key]['template'] = $template;
        $this->registered[$post]->meta[$key]['data'] = new \StdClass();

        $this->currentMeta = $key;
        $this->currentPost = $post;

        ob_start();
            include Theme::getThemePath() . "/" . $this->registered[$post]->meta[$key]['template'];
        ob_get_clean();
    }

    public function getMetaObject($post){
        $meta = [];
        foreach ($this->registered[$post]->meta as $key => $value) {
            $meta[$key] = $value['data'];
        }
        return (object) $meta;
    }

    public function getMetaTemplates($post){
        foreach ($this->registered[$post]->meta as $key => $value) {
            $this->currentMeta = $key;
            $this->currentPost = $post;
            include Theme::getThemePath() . "/" . $this->registered[$post]->meta[$key]['template'];
        }
    }

    public function addMetaField($key){
        $this->registered[$this->currentPost]->meta[$this->currentMeta]['data']->{$key} = '';
    }

    public function getRegisteredPost($post){
        return $this->registered[$post];
    }

    public function getRegister(){
        return $this->registered;
    }
}