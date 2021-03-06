<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grpc/service_config/service_config.proto

namespace Grpc\Service_config;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for xds LB policy.
 *
 * Generated from protobuf message <code>grpc.service_config.XdsConfig</code>
 */
class XdsConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Name of balancer to connect to.
     *
     * Generated from protobuf field <code>string balancer_name = 1 [deprecated = true];</code>
     */
    protected $balancer_name = '';
    /**
     * Optional.  What LB policy to use for intra-locality routing.
     * If unset, will use whatever algorithm is specified by the balancer.
     * Multiple LB policies can be specified; clients will iterate through
     * the list in order and stop at the first policy that they support.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 2;</code>
     */
    private $child_policy;
    /**
     * Optional.  What LB policy to use in fallback mode.  If not
     * specified, defaults to round_robin.
     * Multiple LB policies can be specified; clients will iterate through
     * the list in order and stop at the first policy that they support.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig fallback_policy = 3;</code>
     */
    private $fallback_policy;
    /**
     * Optional.  Name to use in EDS query.  If not present, defaults to
     * the server name from the target URI.
     *
     * Generated from protobuf field <code>string eds_service_name = 4;</code>
     */
    protected $eds_service_name = '';
    /**
     * LRS server to send load reports to.
     * If not present, load reporting will be disabled.
     * If set to the empty string, load reporting will be sent to the same
     * server that we obtained CDS data from.
     *
     * Generated from protobuf field <code>.google.protobuf.StringValue lrs_load_reporting_server_name = 5;</code>
     */
    protected $lrs_load_reporting_server_name = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $balancer_name
     *           Name of balancer to connect to.
     *     @type \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $child_policy
     *           Optional.  What LB policy to use for intra-locality routing.
     *           If unset, will use whatever algorithm is specified by the balancer.
     *           Multiple LB policies can be specified; clients will iterate through
     *           the list in order and stop at the first policy that they support.
     *     @type \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $fallback_policy
     *           Optional.  What LB policy to use in fallback mode.  If not
     *           specified, defaults to round_robin.
     *           Multiple LB policies can be specified; clients will iterate through
     *           the list in order and stop at the first policy that they support.
     *     @type string $eds_service_name
     *           Optional.  Name to use in EDS query.  If not present, defaults to
     *           the server name from the target URI.
     *     @type \Google\Protobuf\StringValue $lrs_load_reporting_server_name
     *           LRS server to send load reports to.
     *           If not present, load reporting will be disabled.
     *           If set to the empty string, load reporting will be sent to the same
     *           server that we obtained CDS data from.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grpc\ServiceConfig\ServiceConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Name of balancer to connect to.
     *
     * Generated from protobuf field <code>string balancer_name = 1 [deprecated = true];</code>
     * @return string
     */
    public function getBalancerName()
    {
        return $this->balancer_name;
    }

    /**
     * Name of balancer to connect to.
     *
     * Generated from protobuf field <code>string balancer_name = 1 [deprecated = true];</code>
     * @param string $var
     * @return $this
     */
    public function setBalancerName($var)
    {
        GPBUtil::checkString($var, True);
        $this->balancer_name = $var;

        return $this;
    }

    /**
     * Optional.  What LB policy to use for intra-locality routing.
     * If unset, will use whatever algorithm is specified by the balancer.
     * Multiple LB policies can be specified; clients will iterate through
     * the list in order and stop at the first policy that they support.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig child_policy = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChildPolicy()
    {
        return $this->child_policy;
    }

    /**
     * Optional.  What LB policy to use for intra-locality routing.
     * If unset, will use whatever algorithm is specified by the balancer.
     * Multiple LB policies can be specified; clients will iterate through
     * the list in order and stop at the first policy that they support.
     *
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

    /**
     * Optional.  What LB policy to use in fallback mode.  If not
     * specified, defaults to round_robin.
     * Multiple LB policies can be specified; clients will iterate through
     * the list in order and stop at the first policy that they support.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig fallback_policy = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFallbackPolicy()
    {
        return $this->fallback_policy;
    }

    /**
     * Optional.  What LB policy to use in fallback mode.  If not
     * specified, defaults to round_robin.
     * Multiple LB policies can be specified; clients will iterate through
     * the list in order and stop at the first policy that they support.
     *
     * Generated from protobuf field <code>repeated .grpc.service_config.LoadBalancingConfig fallback_policy = 3;</code>
     * @param \Grpc\Service_config\LoadBalancingConfig[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFallbackPolicy($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Grpc\Service_config\LoadBalancingConfig::class);
        $this->fallback_policy = $arr;

        return $this;
    }

    /**
     * Optional.  Name to use in EDS query.  If not present, defaults to
     * the server name from the target URI.
     *
     * Generated from protobuf field <code>string eds_service_name = 4;</code>
     * @return string
     */
    public function getEdsServiceName()
    {
        return $this->eds_service_name;
    }

    /**
     * Optional.  Name to use in EDS query.  If not present, defaults to
     * the server name from the target URI.
     *
     * Generated from protobuf field <code>string eds_service_name = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setEdsServiceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->eds_service_name = $var;

        return $this;
    }

    /**
     * LRS server to send load reports to.
     * If not present, load reporting will be disabled.
     * If set to the empty string, load reporting will be sent to the same
     * server that we obtained CDS data from.
     *
     * Generated from protobuf field <code>.google.protobuf.StringValue lrs_load_reporting_server_name = 5;</code>
     * @return \Google\Protobuf\StringValue
     */
    public function getLrsLoadReportingServerName()
    {
        return isset($this->lrs_load_reporting_server_name) ? $this->lrs_load_reporting_server_name : null;
    }

    public function hasLrsLoadReportingServerName()
    {
        return isset($this->lrs_load_reporting_server_name);
    }

    public function clearLrsLoadReportingServerName()
    {
        unset($this->lrs_load_reporting_server_name);
    }

    /**
     * Returns the unboxed value from <code>getLrsLoadReportingServerName()</code>

     * LRS server to send load reports to.
     * If not present, load reporting will be disabled.
     * If set to the empty string, load reporting will be sent to the same
     * server that we obtained CDS data from.
     *
     * Generated from protobuf field <code>.google.protobuf.StringValue lrs_load_reporting_server_name = 5;</code>
     * @return string|null
     */
    public function getLrsLoadReportingServerNameUnwrapped()
    {
        return $this->readWrapperValue("lrs_load_reporting_server_name");
    }

    /**
     * LRS server to send load reports to.
     * If not present, load reporting will be disabled.
     * If set to the empty string, load reporting will be sent to the same
     * server that we obtained CDS data from.
     *
     * Generated from protobuf field <code>.google.protobuf.StringValue lrs_load_reporting_server_name = 5;</code>
     * @param \Google\Protobuf\StringValue $var
     * @return $this
     */
    public function setLrsLoadReportingServerName($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\StringValue::class);
        $this->lrs_load_reporting_server_name = $var;

        return $this;
    }

    /**
     * Sets the field by wrapping a primitive type in a Google\Protobuf\StringValue object.

     * LRS server to send load reports to.
     * If not present, load reporting will be disabled.
     * If set to the empty string, load reporting will be sent to the same
     * server that we obtained CDS data from.
     *
     * Generated from protobuf field <code>.google.protobuf.StringValue lrs_load_reporting_server_name = 5;</code>
     * @param string|null $var
     * @return $this
     */
    public function setLrsLoadReportingServerNameUnwrapped($var)
    {
        $this->writeWrapperValue("lrs_load_reporting_server_name", $var);
        return $this;}

}

