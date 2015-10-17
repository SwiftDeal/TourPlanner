<?php

/**
 * Description of project
 *
 * @author Meraj Ahmad Siddiqui <meraj@cloudstuffs.com>
 */
class Project extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 128
     */
    protected $_name;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     */
    protected $_details;
}
