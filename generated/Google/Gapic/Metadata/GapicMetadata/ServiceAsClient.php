<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: gapic/metadata/gapic_metadata.proto

namespace Google\Gapic\Metadata\GapicMetadata;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information about a specific client implementing a proto-defined service.
 *
 * Generated from protobuf message <code>google.gapic.metadata.GapicMetadata.ServiceAsClient</code>
 */
class ServiceAsClient extends \Google\Protobuf\Internal\Message
{
    /**
     * The name of the library client formatted as it appears in the source code
     *
     * Generated from protobuf field <code>string library_client = 1;</code>
     */
    protected $library_client = '';
    /**
     * A mapping from each proto-defined RPC name to the the list of
     * methods in library_client that implement it. There can be more
     * than one library_client method for each RPC. RPCs with no
     * library_client methods need not be included.
     * The key name is the name of the RPC as defined and formated in
     * the proto file.
     *
     * Generated from protobuf field <code>map<string, .google.gapic.metadata.GapicMetadata.MethodList> rpcs = 2;</code>
     */
    private $rpcs;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $library_client
     *           The name of the library client formatted as it appears in the source code
     *     @type array|\Google\Protobuf\Internal\MapField $rpcs
     *           A mapping from each proto-defined RPC name to the the list of
     *           methods in library_client that implement it. There can be more
     *           than one library_client method for each RPC. RPCs with no
     *           library_client methods need not be included.
     *           The key name is the name of the RPC as defined and formated in
     *           the proto file.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Gapic\Metadata\GapicMetadata::initOnce();
        parent::__construct($data);
    }

    /**
     * The name of the library client formatted as it appears in the source code
     *
     * Generated from protobuf field <code>string library_client = 1;</code>
     * @return string
     */
    public function getLibraryClient()
    {
        return $this->library_client;
    }

    /**
     * The name of the library client formatted as it appears in the source code
     *
     * Generated from protobuf field <code>string library_client = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setLibraryClient($var)
    {
        GPBUtil::checkString($var, True);
        $this->library_client = $var;

        return $this;
    }

    /**
     * A mapping from each proto-defined RPC name to the the list of
     * methods in library_client that implement it. There can be more
     * than one library_client method for each RPC. RPCs with no
     * library_client methods need not be included.
     * The key name is the name of the RPC as defined and formated in
     * the proto file.
     *
     * Generated from protobuf field <code>map<string, .google.gapic.metadata.GapicMetadata.MethodList> rpcs = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getRpcs()
    {
        return $this->rpcs;
    }

    /**
     * A mapping from each proto-defined RPC name to the the list of
     * methods in library_client that implement it. There can be more
     * than one library_client method for each RPC. RPCs with no
     * library_client methods need not be included.
     * The key name is the name of the RPC as defined and formated in
     * the proto file.
     *
     * Generated from protobuf field <code>map<string, .google.gapic.metadata.GapicMetadata.MethodList> rpcs = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setRpcs($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Gapic\Metadata\GapicMetadata\MethodList::class);
        $this->rpcs = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAsClient::class, \Google\Gapic\Metadata\GapicMetadata_ServiceAsClient::class);
