<?php

/**
 * Description of Package
 *
 * @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
 */
class Tourpack extends Shared\Model {
    
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
     * @type text
     * @length 50
     *
     * @label  Location
     */
    protected $_location;

    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @label Description
     */
    protected $_description;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 200
     * 
     * @label  Attraction
     */
    protected $_attraction;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 50
     *
     * @label Duration
     */
    protected $_duration;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 50
     *
     * @label Duration
     */
    protected $_coverimage;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 50
     *
     * @label Season
     */
    protected $_season;

    /**
     * @column
     * @readwrite
     * @type integer
     * 
     */
    protected $_price;

}
