<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/service_config/service_config.proto

namespace Grpc\Service_config\WeightedTargetLoadBalancingPolicyConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>grpc.service_config.WeightedTargetLoadBalancingPolicyConfig.Target</code>
 */
class Target extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 weight = 1;</code>
     */
    protected $weight = 0;
    /**
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 2;</code>
     */
    private $child_policy;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $weight
     *     @type \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $child_policy
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grpc\ServiceConfig\ServiceConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 weight = 1;</code>
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Generated from protobuf field <code>uint32 weight = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setWeight($var)
    {
        GPBUtil::checkUint32($var);
        $this->weight = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChildPolicy()
    {
        return $this->child_policy;
    }

    /**
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 2;</code>
     * @param \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChildPolicy($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Grpc\Service_config\LoadBalancingConfig::class);
        $this->child_policy = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Target::class, \Grpc\Service_config\WeightedTargetLoadBalancingPolicyConfig_Target::class);

