<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.16.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class CompactionRequest
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'dbname',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'tablename',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'partitionname',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'type',
            'isRequired' => true,
            'type' => TType::I32,
            'class' => '\metastore\CompactionType',
        ),
        5 => array(
            'var' => 'runas',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'properties',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::STRING,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::STRING,
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
        7 => array(
            'var' => 'initiatorId',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        8 => array(
            'var' => 'initiatorVersion',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        9 => array(
            'var' => 'poolName',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        10 => array(
            'var' => 'numberOfBuckets',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        11 => array(
            'var' => 'orderByClause',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var string
     */
    public $dbname = null;
    /**
     * @var string
     */
    public $tablename = null;
    /**
     * @var string
     */
    public $partitionname = null;
    /**
     * @var int
     */
    public $type = null;
    /**
     * @var string
     */
    public $runas = null;
    /**
     * @var array
     */
    public $properties = null;
    /**
     * @var string
     */
    public $initiatorId = null;
    /**
     * @var string
     */
    public $initiatorVersion = null;
    /**
     * @var string
     */
    public $poolName = null;
    /**
     * @var int
     */
    public $numberOfBuckets = null;
    /**
     * @var string
     */
    public $orderByClause = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['dbname'])) {
                $this->dbname = $vals['dbname'];
            }
            if (isset($vals['tablename'])) {
                $this->tablename = $vals['tablename'];
            }
            if (isset($vals['partitionname'])) {
                $this->partitionname = $vals['partitionname'];
            }
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
            if (isset($vals['runas'])) {
                $this->runas = $vals['runas'];
            }
            if (isset($vals['properties'])) {
                $this->properties = $vals['properties'];
            }
            if (isset($vals['initiatorId'])) {
                $this->initiatorId = $vals['initiatorId'];
            }
            if (isset($vals['initiatorVersion'])) {
                $this->initiatorVersion = $vals['initiatorVersion'];
            }
            if (isset($vals['poolName'])) {
                $this->poolName = $vals['poolName'];
            }
            if (isset($vals['numberOfBuckets'])) {
                $this->numberOfBuckets = $vals['numberOfBuckets'];
            }
            if (isset($vals['orderByClause'])) {
                $this->orderByClause = $vals['orderByClause'];
            }
        }
    }

    public function getName()
    {
        return 'CompactionRequest';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->dbname);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->tablename);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->partitionname);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->runas);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::MAP) {
                        $this->properties = array();
                        $_size754 = 0;
                        $_ktype755 = 0;
                        $_vtype756 = 0;
                        $xfer += $input->readMapBegin($_ktype755, $_vtype756, $_size754);
                        for ($_i758 = 0; $_i758 < $_size754; ++$_i758) {
                            $key759 = '';
                            $val760 = '';
                            $xfer += $input->readString($key759);
                            $xfer += $input->readString($val760);
                            $this->properties[$key759] = $val760;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->initiatorId);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->initiatorVersion);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->poolName);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->numberOfBuckets);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->orderByClause);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('CompactionRequest');
        if ($this->dbname !== null) {
            $xfer += $output->writeFieldBegin('dbname', TType::STRING, 1);
            $xfer += $output->writeString($this->dbname);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->tablename !== null) {
            $xfer += $output->writeFieldBegin('tablename', TType::STRING, 2);
            $xfer += $output->writeString($this->tablename);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->partitionname !== null) {
            $xfer += $output->writeFieldBegin('partitionname', TType::STRING, 3);
            $xfer += $output->writeString($this->partitionname);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::I32, 4);
            $xfer += $output->writeI32($this->type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->runas !== null) {
            $xfer += $output->writeFieldBegin('runas', TType::STRING, 5);
            $xfer += $output->writeString($this->runas);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->properties !== null) {
            if (!is_array($this->properties)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('properties', TType::MAP, 6);
            $output->writeMapBegin(TType::STRING, TType::STRING, count($this->properties));
            foreach ($this->properties as $kiter761 => $viter762) {
                $xfer += $output->writeString($kiter761);
                $xfer += $output->writeString($viter762);
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->initiatorId !== null) {
            $xfer += $output->writeFieldBegin('initiatorId', TType::STRING, 7);
            $xfer += $output->writeString($this->initiatorId);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->initiatorVersion !== null) {
            $xfer += $output->writeFieldBegin('initiatorVersion', TType::STRING, 8);
            $xfer += $output->writeString($this->initiatorVersion);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->poolName !== null) {
            $xfer += $output->writeFieldBegin('poolName', TType::STRING, 9);
            $xfer += $output->writeString($this->poolName);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->numberOfBuckets !== null) {
            $xfer += $output->writeFieldBegin('numberOfBuckets', TType::I32, 10);
            $xfer += $output->writeI32($this->numberOfBuckets);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->orderByClause !== null) {
            $xfer += $output->writeFieldBegin('orderByClause', TType::STRING, 11);
            $xfer += $output->writeString($this->orderByClause);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
