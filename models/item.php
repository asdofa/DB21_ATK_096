<?php
    class Item
    {
        public $ITEM_ID;
        public $ITEM_NAME;
        public $ITEM_CLASSIFIER;

        public function __construct($ITEM_ID,$ITEM_NAME,$ITEM_CLASSIFIER)
        {
            $this->ITEM_ID = $ITEM_ID;
            $this->ITEM_NAME = $ITEM_NAME;
            $this->ITEM_CLASSIFIER = $ITEM_CLASSIFIER;
        }

        public static function getall()
        {
            $itemList=[];

            require("connection_connect.php");

            $sql="SELECT * FROM ITEM";
            $result=$conn->query($sql);

            while($my_row = $result->fetch_assoc())
            {
                $ITEM_ID=$my_row[ITEM_ID];
                $ITEM_NAME=$my_row[ITEM_NAME];
                $ITEM_CLASSIFIER=$my_row[ITEM_CLASSIFIER];
                $itemList[]=new Item($ITEM_ID,$ITEM_NAME,$ITEM_CLASSIFIER);
            }

            require("connection_close.php");

            return $itemList;
        }

        public static function search($key)
        {
            $itemList=[];

            require("connection_connect.php");

            $sql = "SELECT * FROM ITEM WHERE( ITEM_ID like '%$key%' or ITEM_NAME like '%$key%' or ITEM_CLASSIFIER like '%$key%' ) ";
            $result = $conn->query($sql);

            while ($my_row = $result->fetch_assoc())
            {
                $ITEM_ID=$my_row[ITEM_ID];
                $ITEM_NAME=$my_row[ITEM_NAME];
                $ITEM_CLASSIFIER=$my_row[ITEM_CLASSIFIER];
                $itemList[]=new Item($ITEM_ID,$ITEM_NAME,$ITEM_CLASSIFIER);
            }

            require("connection_close.php");

            return $itemList;
        }

        public static function get($ITEM_ID)
        {
            require("connection_connect.php");

            $sql = "SELECT * FROM ITEM WHERE ITEM_ID = '$ITEM_ID' ";
            $result = $conn->query($sql);
            $my_row = $result->fetch_assoc();

            $ITEM_ID=$my_row[ITEM_ID];
            $ITEM_NAME=$my_row[ITEM_NAME];
            $ITEM_CLASSIFIER=$my_row[ITEM_CLASSIFIER];

            require("connection_close.php");
            
            return new Item($ITEM_ID,$ITEM_NAME,$ITEM_CLASSIFIER);

        }

        public static function add($ITEM_ID,$ITEM_NAME,$ITEM_CLASSIFIER)
        {
            require("connection_connect.php");

            $sql = "INSERT INTO `ITEM` (`ITEM_ID`,`ITEM_NAME`,`ITEM_CLASSIFIER`) VALUES ('$ITEM_ID','$ITEM_NAME','$ITEM_CLASSIFIER')";
            $result = $conn->query($sql);

            require("connection_close.php");

            return("add success $result row");
            
        }
        public static function update($ITEM_ID,$ITEM_NAME,$ITEM_CLASSIFIER,$OLD_ID)
        {
            require("connection_connect.php");

            $sql = "UPDATE `ITEM` SET `ITEM_ID` = '$ITEM_ID' ,`ITEM_NAME` = '$ITEM_NAME' ,`ITEM_CLASSIFIER` = '$ITEM_CLASSIFIER' WHERE ITEM_ID = '$OLD_ID' ";
            $result = $conn->query($sql);

            require("connection_close.php");

            return("update success $result row");

        }
        public static function delete($id)
        {
            require("connection_connect.php");
            
            $sql = "DELETE FROM ITEM WHERE ITEM_ID = '$id'";
            $result = $conn->query($sql);

            require("connection_close.php");

            return("update success $result row");
            
        }
    }
?>