<?php

/**
 * Description of NewsLetter
 *
 * @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
 */
class Newsletter extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 50
     */
    protected $_name;
    
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 50
     * 
     * 
     * @label email
     */
    protected $_email;
}
