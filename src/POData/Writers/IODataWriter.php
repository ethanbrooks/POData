<?php

namespace POData\Writers;

use POData\Common\ODataException;
use POData\ObjectModel\ODataURL;
use POData\ObjectModel\ODataURLCollection;
use POData\ObjectModel\ODataFeed;
use POData\ObjectModel\ODataEntry;
use POData\ObjectModel\ODataLink;
use POData\ObjectModel\ODataPropertyContent;
use POData\ObjectModel\ODataProperty;


/**
 * Class IODataWriter
 * @package POData\Writers\Common
 */
interface IODataWriter
{

	/**
	 * Create odata object model from the request description and transform it to required content type form
	 *
	 *
	 * @param  ODataURL|ODataURLCollection|ODataPropertyContent|ODataFeed|ODataEntry $model Object of requested content.
	 *
	 * @return IODataWriter
	 */
	public function write($model);

	/**
     * Start writing a feed
     *
     * @param ODataFeed $feed Feed to write
     * 
     * @return IODataWriter
     */

    public function writeBeginFeed(ODataFeed $feed);

    /**
     * Start writing an entry.
     *
     * @param ODataEntry $entry Entry to write
     * 
     * @return IODataWriter
     */
    public function writeBeginEntry(ODataEntry $entry);

    /**
     * Start writing a link.
     * 
     * @param ODataLink $link Link to write.
     * @param Boolean   $isExpanded If entry type is Expanded or not.
     * 
     * @return IODataWriter
     */
    public function writeBeginLink(ODataLink $link, $isExpanded);

    /** 
     * Start writing a Properties.
     * 
     * @param ODataPropertyContent $properties ODataProperty Object to write.
     * 
     * @return IODataWriter
     */
    public function writeBeginProperties(ODataPropertyContent $properties);
    
    /**
     * Start writing a top level url
     *  
     * @param ODataURL $url ODataUrl object to write.
     * 
     * @return IODataWriter
     */
    public function writeBeginUrl(ODataURL $url);
    
    /**
     * Start writing a top level url collection
     * 
     * @param ODataUrlCollection $urls ODataUrlCollection to Write.
     * 
     * @return IODataWriter
     */
    public function writeBeginUrlCollection(ODataURLCollection $urls);

    /**
     * Finish writing an ODataEntry/ODataLink/ODataURL/ODataURLCollection.
     * 
     * @param ODataFeed|ODataEntry|ODataURL|ODataURLCollection|ODataProperty $kind Type of the top level object
     * 
     * @return IODataWriter
     */
    public function writeEnd($kind);

    /**
     * Get the output as string
     *  
     * @return string Result in requested format i.e. Atom or JSON.
     */
    public function getOutput();
}