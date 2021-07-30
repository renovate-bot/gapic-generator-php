<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: compliance.proto

namespace Google\Validation\Showcase\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * ComplianceGroups encapsulates a group of RPC requests to the Compliance
 * server: one request for each combination of elements of `rpcs` and of
 * `requests`.
 *
 * Generated from protobuf message <code>google.showcase.v1beta1.ComplianceGroup</code>
 */
class ComplianceGroup extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * Generated from protobuf field <code>repeated string rpcs = 2;</code>
     */
    private $rpcs;
    /**
     * Generated from protobuf field <code>repeated .google.showcase.v1beta1.RepeatRequest requests = 3;</code>
     */
    private $requests;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $rpcs
     *     @type \Google\Validation\Showcase\V1beta1\RepeatRequest[]|\Google\Protobuf\Internal\RepeatedField $requests
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Compliance::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string rpcs = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRpcs()
    {
        return $this->rpcs;
    }

    /**
     * Generated from protobuf field <code>repeated string rpcs = 2;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRpcs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->rpcs = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .google.showcase.v1beta1.RepeatRequest requests = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Generated from protobuf field <code>repeated .google.showcase.v1beta1.RepeatRequest requests = 3;</code>
     * @param \Google\Validation\Showcase\V1beta1\RepeatRequest[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRequests($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Validation\Showcase\V1beta1\RepeatRequest::class);
        $this->requests = $arr;

        return $this;
    }

}
