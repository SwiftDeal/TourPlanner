<?php

/**
 * The User Model
 *
 * @author Cloudstuffs Team
 */
class User extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, alpha, min(3), max(32)
     * @label first name
     */
    protected $_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * 
     * @validate required, alpha, min(3), max(32)
     * @label Gender
     */
    protected $_gender;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label email address
     */
    protected $_email;

	/**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Mobile Number
     */
    protected $_mobile;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, alpha, min(8), max(32)
     * @label password
     */
    protected $_password;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * 
     * @label Auth Level     
     */
    protected $_alevel;
     /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * 
     * @label Auth type    
     */
    protected $_auth_type;
    
    /**
    * @column
    * @readwrite
    * @type integer
    */
    protected $_verified;

}
