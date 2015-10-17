<?php

/**
 * The User Model
 *
 * @author Cloudstuffs Team
 */
class Srec extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label first name
     */
    protected $_search;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * 
     * @label Input 1
     */
    protected $_input1;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Input2
     */
    protected $_input2;

	/**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Input 3
     */
    protected $_input3;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Input 4
     */
    protected $_input4;
    


}
