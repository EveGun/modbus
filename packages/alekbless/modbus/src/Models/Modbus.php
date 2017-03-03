<?php

namespace Alekbless\Modbus\Models;

use Illuminate\Database\Eloquent\Model;
use PHPModbus\ModbusMasterTcp;
use PHPModbus\PhpType;

class Modbus extends Model
{



    public function readInt16 ($ip_address, $port, $node_id, $register_address, $read_ammount)
    {
        $modbus = new ModbusMasterTcp($ip_address, $port);
        try
        {
        	// Read input discretes - FC 4
        	$recData = $modbus->readMultipleInputRegisters($node_id, $register_address, $read_ammount);
        }
        catch (Exception $e)
        {
        	// Print error information if any
        	//echo $modbus;
        	//echo $e;
        	exit;
        }

        //Chunk array to set of two bytes. (16 bit register)
        $values = array_chunk($recData, 2);

        // convert bytes to int and store in variable
        foreach($values as &$bytes)
        {
          $bytes = PhpType::bytes2signedInt($bytes, 0);
        }
        return $values;
    }
}
