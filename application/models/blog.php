<?php

/**
 * Description of Package
 *
 * @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
 */
class Blog extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 16
     *
     * @label Title
     */
    protected $_title;
    
    /**
     * @column
     * @readwrite
     * @type integer
     * 
     *
     * @label  Writer Id
     */
    protected $_user_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 1000
     * 
     * @label content
     */
    protected $_content;


}
