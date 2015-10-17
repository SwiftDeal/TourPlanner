<?php

/**
 * Description of member
 *
 * @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
 */
class Booking extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_package_id;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_users;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 32
     */
    protected $_transaction_id;
}
