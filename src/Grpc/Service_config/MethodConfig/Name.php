<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/service_config/service_config.proto

namespace Grpc\Service_config\MethodConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The names of the methods to which this configuration applies.
 * - MethodConfig without names (empty list) will be skipped.
 * - Each name entry must be unique across the entire ServiceConfig.
 * - If the 'method' field is empty, this MethodConfig specifies the defaults
 *   for all methods for the specified service.
 * - If the 'service' field is empty, the 'method' field must be empty, and
 *   this MethodConfig specifies the default for all methods (it's the default
 *   config).
 * When determining which MethodConfig to use for a given RPC, the most
 * specific match wins. For example, let's say that the service config
 * contains the following MethodConfig entries:
 * method_config { name { } ... }
 * method_config { name { service: "MyService" } ... }
 * method_config { name { service: "MyService" method: "Foo" } ... }
 * MyService/Foo will use the third entry, because it exactly matches the
 * service and method name. MyService/Bar will use the second entry, because
 * it provides the default for all methods of MyService. AnotherService/Baz
 * will use the first entry, because it doesn't match the other two.
 * In JSON representation, value "", value `null`, and not present are the
 * same. The following are the same Name:
 * - { "service": "s" }
 * - { "service": "s", "method": null }
 * - { "service": "s", "method": "" }
 *
 * Generated from protobuf message <code>grpc.service_config.MethodConfig.Name</code>
 */
class Name extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Includes proto package name.
     *
     * Generated from protobuf field <code>string service = 1;</code>
     */
    protected $service = '';
    /**
     * Generated from protobuf field <code>string method = 2;</code>
     */
    protected $method = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $service
     *           Required. Includes proto package name.
     *     @type string $method
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grpc\ServiceConfig\ServiceConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Includes proto package name.
     *
     * Generated from protobuf field <code>string service = 1;</code>
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Required. Includes proto package name.
     *
     * Generated from protobuf field <code>string service = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setService($var)
    {
        GPBUtil::checkString($var, True);
        $this->service = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string method = 2;</code>
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Generated from protobuf field <code>string method = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMethod($var)
    {
        GPBUtil::checkString($var, True);
        $this->method = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Name::class, \Grpc\Service_config\MethodConfig_Name::class);
