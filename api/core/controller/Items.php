<?php

namespace Core\Controller;

class  Items
{
    function __construct()
    {
        echo "hi from const.<br>";
    }
    /**
     * GET All Item
     * 
     * @return void
     */
    public function index()
    {
        echo "hi from index";
    }

    /**
     * GET Single Item
     * 
     * @return void
     */
    public function single()
    {
        echo "hi from single";
    }

    /**
     * CREATE An Item
     * 
     * @return void
     */
    public function create()
    {
        echo "hi from crate";
    }

    /**
     * Update An Item
     * 
     * @return void
     */
    public function update()
    {
        echo "hi from update";
    }

    /**
     * DELETE All Item
     * 
     * @return void
     */
    public function delete()
    {
        echo "hi from delete";
    }
}
