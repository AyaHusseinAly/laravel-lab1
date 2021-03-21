<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $allPosts;

    public function  __construct() {
        $this->allPosts=[
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','description' => 'laravel is awsome framework'],
            ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15','description' => 'PHP is awsome Language'],
            ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01','description' => 'JavaScript is awsome Language'],
        ];
    }

    public function index()
    {

        return view('posts.index', [
            'posts' => $this->allPosts
        ]);
    }

    public function show($postId)
    {
       
        $key = array_search($postId, array_column( $this->allPosts, 'id'));
        $post = $this->allPosts[$key];
        //$post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //logic to insert request data into db

        return redirect()->route('posts.index');
    }

    public function edit($postId)
    {
        $key = array_search($postId, array_column( $this->allPosts, 'id'));
        $post = $this->allPosts[$key];
        
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    public function update($postId)
    {
        $key = array_search($postId, array_column( $this->allPosts, 'id'));
        $post = $this->allPosts[$key];
        //$post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];

        return view('posts.show', [
            'post' => $post,
        ]);
        
        //return redirect()->route('posts.index');
    
    }

}
