<?php

/**
 * Description of payment
 *
 * @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
 */
class Feedback extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_user_id;
    
    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_package_id;
    
    
    /**
     * @column
     * @readwrite
     * @type text
     * 
     * 
     * @validate required, min(3)
     * @label description
     */
    protected $_description;
}
