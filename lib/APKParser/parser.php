<?php
/*
 *
 * A ported and somewhat modified code from the Androguard project
 *  -original file: androguard/core/bytecodes/apk.py
 *
 *
 * Copyright (C) 2012, Anthony Desnos <desnos at t0t0.fr>
 * Modification (C) 2014, Normal Ra

 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.

 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace APKParser;

require_once 'buffer.php';

class APK {
    private $xml = array();
    private $axml = array();
    private $arsc = array();

    private $package = "";
    private $androidversion = array();
    private $permissions = array();
    private $valid_apk = False;

    private $files = array();

    public function __construct($filepath) {
        $this->filepath = $filepath;

        $this->zip = new \ZipArchive();
        $result = $this->zip->open($filepath);

        if ($result !== True) {
            throw new \Exception('Cannot open "' . $filepath . '"');
        }

        $m_n = 'AndroidManifest.xml';
        $m_buff = $this->zip->getStream($m_n);
        $this->axml[$m_n] = new AXMLPrinter($m_buff);

        try {
            $this->xml[$m_n] = simplexml_load_string($this->axml[$m_n]->get_buff());
        } catch (\Exception $e) {
            $this->xml[$m_n] = NULL;
        }

        if (isset($this->xml[$m_n])) {
            // We have to cast SimpleXML returns. Sad.
            $this->package = (string)$this->xml[$m_n]->attributes()->package;

            $m_androidns = $this->xml[$m_n]->attributes('android', true);
            $this->androidversion["Code"] = (string)$m_androidns->versionCode;
            $this->androidversion["Name"] = (string)$m_androidns->versionName;

            $this->valid_apk = True;
        }
    }

    public function is_valid_APK() {
        return $this->valid_apk;
    }

    public function get_filepath() {
        return $this->filepath;
    }

    public function get_package() {
        return $this->package;
    }

    public function get_androidversion_code() {
        return $this->androidversion["Code"];
    }

    public function get_androidversion_name() {
        return $this->androidversion["Name"];
    }

    public function get_file($filepath) {
        return $this->zip->getStream($filepath);
    }

    public function get_element($tag_name, $attribute, $ns = NULL) {
        $m_node = $this->xml['AndroidManifest.xml']->{$tag_name}[0];

        if (!$m_node) { return false; }

        if ($ns) {
            return (string)$m_node->attributes('android', true)->{$attribute};
        }

        return (string)$m_node->attributes()->{$attribute};
    }

    public function get_permissions() {
        throw new \Exception("Ha!");
    }

    public function get_details_permissions() {
        throw new \Exception("!aH");
    }

    public function get_max_sdk_version() {
        return (int)$this->get_element('uses-sdk', 'maxSdkVersion', true);
    }

    public function get_min_sdk_version() {
        return (int)$this->get_element('uses-sdk', 'minSdkVersion', true);
    }

    public function get_target_sdk_version() {
        return (int)$this->get_element('uses-sdk', 'targetSdkVersion', true);
    }

    public function get_android_manifest_axml() {
        return $this->axml['AndroidManifest.xml'];
    }

    public function get_android_manifest_xml() {
        return $this->xml['AndroidManifest.xml'];
    }

    public function get_android_resources() {
        if (isset($this->arsc['resources.arsc'])) {
            return $this->arsc['resources.arsc'];
        }

        $this->arsc['resources.arsc'] = new ARSCParser($this->get_file('resources.arsc'));
        return $this->arsc['resources.arsc'];
    }
}

const UTF8_FLAG = 0x00000100;


class StringBlock {
    public function __construct(\BuffaloHandle $buff) {
        $this->start = $buff->position();
        $this->_cache = array();
        $this->header = unpack('s', $buff->read(2))[1];
        $this->header_size = unpack('s', $buff->read(2))[1];

        $this->chunkSize = unpack('i', $buff->read(4))[1];
        $this->stringCount = unpack('i', $buff->read(4))[1];
        $this->styleOffsetCount = unpack('i', $buff->read(4))[1];

        $this->flags = unpack('i', $buff->read(4))[1];
        $this->m_isUTF8 = (($this->flags & UTF8_FLAG) != 0);

        $this->stringsOffset = unpack('i', $buff->read(4))[1];
        $this->stylesOffset = unpack('i', $buff->read(4))[1];

        $this->m_stringOffsets = array();
        $this->m_styleOffsets = array();
        $this->m_strings = array();
        $this->m_styles = array();

        for ($i = 0; $i < $this->stringCount; $i++) {
            $this->m_stringOffsets[] = unpack('i', $buff->read(4))[1];
        }

        for ($i = 0; $i < $this->styleOffsetCount; $i++) {
            $this->m_styleOffsets[] = unpack('i', $buff->read(4))[1];
        }

        $size = $this->chunkSize - $this->stringsOffset;
        if ($this->stylesOffset != 0) {
            $size = $this->stylesOffset - $this->stringsOffset;
        }

        # FIXME
        if (($size % 4) != 0) { throw new \Exception("ooo"); }

        for ($i = 0; $i < $size; $i++) {
            $this->m_strings[] = unpack('c', $buff->read(1))[1];
        }

        if ($this->stylesOffset != 0) {
            $size = $this->chunkSize - $this->stylesOffset;

            # FIXME
            if (($size % 4) != 0) { throw new \Exception("ooo"); }

            for ($i = 0; $i < ($size / 4); $i++) {
                $this->m_styles[] = unpack('i', $buff->read(4))[1];
            }
        }
    }

    public function getString($idx) {
        if (isset($this->_cache[$idx])) {
            return $this->_cache[$idx];
        }

        if ($idx < 0 or !$this->m_stringOffsets or $idx >= count($this->m_stringOffsets)) {
            return "";
        }

        $offset = $this->m_stringOffsets[$idx];

        if (!$this->m_isUTF8) {
            $length = $this->getShort2($this->m_strings, $offset);
            $offset += 2;
            $this->_cache[$idx] = $this->decode($this->m_strings, $offset, $length);
        } else {
            $offset += $this->getVarint($this->m_strings, $offset)[1];
            $varint = $this->getVarint($this->m_strings, $offset);

            $offset += $varint[1];
            $length = $varint[0];

            $this->_cache[$idx] = $this->decode2($this->m_strings, $offset, $length);
        }

        return $this->_cache[$idx];
    }

    private function decode($array, $offset, $length) {
        $length = $length * 2;
        $length = $length + $length % 2;

        $data = "";

        for ($i = 0; $i < $length; $i++) {
            $data .= pack("C*", $this->m_strings[$offset + $i]);
        }

        return iconv('utf-16', 'utf-8', $data);
    }

    private function decode2($array, $offset, $length) {
        $data = "";

        for ($i = 0; $i < $length; $i++) {
            $data .= pack("C*", $this->m_strings[$offset + $i]);
        }

        return $data;#iconv('utf-8', 'ASCII', $data);
    }

    private function getVarint($array, $offset) {
        $val = $array[$offset];
        $more = ($val & 0x80) != 0;
        $val &= 0x7f;

        if (!$more) {
            return array($val, 1);
        }

        return array($val << 8 | $array[$offset + 1] & 0xff, 2);
    }

    private function getShort2($array, $offset) {
        return ($array[$offset + 1] & 0xff) << 8 | $array[$offset] & 0xff;
    }
}

const ATTRIBUTE_IX_NAMESPACE_URI  = 0;
const ATTRIBUTE_IX_NAME           = 1;
const ATTRIBUTE_IX_VALUE_STRING   = 2;
const ATTRIBUTE_IX_VALUE_TYPE     = 3;
const ATTRIBUTE_IX_VALUE_DATA     = 4;
const ATTRIBUTE_LENGHT            = 5;

const CHUNK_AXML_FILE             = 0x00080003;
const CHUNK_RESOURCEIDS           = 0x00080180;
const CHUNK_XML_FIRST             = 0x00100100;
const CHUNK_XML_START_NAMESPACE   = 0x00100100;
const CHUNK_XML_END_NAMESPACE     = 0x00100101;
const CHUNK_XML_START_TAG         = 0x00100102;
const CHUNK_XML_END_TAG           = 0x00100103;
const CHUNK_XML_TEXT              = 0x00100104;
const CHUNK_XML_LAST              = 0x00100104;

const START_DOCUMENT              = 0;
const END_DOCUMENT                = 1;
const START_TAG                   = 2;
const END_TAG                     = 3;
const TEXT                        = 4;


class AXMLParser {
    private $m_resourceIDs = array();
    private $m_prefixuri = array();
    private $m_uriprefix = array();
    private $m_prefixuriL = array();
    private $visited_ns = array();

    public function __construct($raw_buff) {
        self::reset();


        $this->buffer = new \BuffaloHandle($raw_buff);
        $this->buffer->read(4);
        $this->buffer->read(4);

        $this->sb = new StringBlock($this->buffer);
    }

    private function reset() {
        $this->m_event = -1;
        $this->m_lineNumber = -1;
        $this->m_name = -1;
        $this->m_namespaceUri = -1;
        $this->m_attributes = array();
        $this->m_idAttribute = -1;
        $this->m_classAttribute = -1;
        $this->m_styleAttribute = -1;
    }

    public function next() {
        $this->doNext();
        return $this->m_event;
    }

    private function doNext() {
        if ($this->m_event == END_DOCUMENT) {
            return;
        }

        $event = $this->m_event;

        self::reset();
        while (true) {
            $pos = $this->buffer->position();
            $chunkType = -1;


            # Fake END_DOCUMENT event.
            if ($event == END_TAG) {}

            # START_DOCUMENT
            if ($event == START_DOCUMENT) {
                $chunkType = CHUNK_XML_START_TAG;
            } else {
                if ($this->buffer->end()) {
                    $this->m_event = END_DOCUMENT;
                    break;
                }

                $chunkType = unpack('V', $this->buffer->read(4))[1];
            }

            if ($chunkType == CHUNK_RESOURCEIDS) {
                $chunkSize = unpack('V', $this->buffer->read(4))[1];
                # FIXME
                if ($chunkSize < 8 or ($chunkSize % 4) != 0) { throw new \Exception("ooo"); }

                for ($i = 0; $i < ($chunkSize / 4 - 2); $i++) {
                    $this->m_resourceIDs[] = unpack('V', $this->buffer->read(4))[1];
                }

                continue;
            }

            # FIXME
            if ($chunkType < CHUNK_XML_FIRST or $chunkType > CHUNK_XML_LAST) { throw new \Exception("ooo"); }

            # Fake START_DOCUMENT event.
            if ($chunkType == CHUNK_XML_START_TAG and $event == -1) {
                $this->m_event = START_DOCUMENT;
                break;
            }

            $this->buffer->read(4);
            $lineNumber = unpack('V', $this->buffer->read(4))[1];
            $this->buffer->read(4);

            if ($chunkType == CHUNK_XML_START_NAMESPACE
                or $chunkType == CHUNK_XML_END_NAMESPACE) {

                if ($chunkType == CHUNK_XML_START_NAMESPACE) {
                    $prefix = unpack('V', $this->buffer->read(4))[1];
                    $uri = unpack('V', $this->buffer->read(4))[1];

                    $this->m_prefixuri[$prefix] = $uri;
                    $this->m_uriprefix[$uri] = $prefix;
                    $this->m_prefixuriL[] = array($prefix, $uri);
                    $this->ns = $uri;
                } else {
                    $this->ns = -1;
                    $this->buffer->read(4);
                    $this->buffer->read(4);
                    $this->m_prefixuriL = array_pop($this->m_prefixuriL);
                }

                continue;
            }

            $this->m_lineNumber = $lineNumber;

            if ($chunkType == CHUNK_XML_START_TAG) {
                $this->m_namespaceUri = unpack('V', $this->buffer->read(4))[1];
                $this->m_name = unpack('V', $this->buffer->read(4))[1];

                # FIXME
                $this->buffer->read(4);  # flags

                $attributeCount = unpack('V', $this->buffer->read(4))[1];
                $this->m_idAttribute = ($attributeCount >> 16) - 1;
                $attributeCount = $attributeCount & 0xFFFF;
                $this->m_classAttribute = unpack('V', $this->buffer->read(4))[1];
                $this->m_styleAttribute = ($this->m_classAttribute >> 16) - 1;

                $this->m_classAttribute = ($this->m_classAttribute & 0xFFFF) - 1;

                for ($i = 0; $i < ($attributeCount * ATTRIBUTE_LENGHT); $i++) {
                    $t = unpack('V', $this->buffer->read(4))[1];
                    $this->m_attributes[] = $t;
                }

                for ($i = ATTRIBUTE_IX_VALUE_TYPE; $i < count($this->m_attributes); $i += ATTRIBUTE_LENGHT) {
                    $this->m_attributes[$i] = ($this->m_attributes[$i] >> 24);
                }

                $this->m_event = START_TAG;
                break;
            }

            if ($chunkType == CHUNK_XML_END_TAG) {
                $this->m_namespaceUri = unpack('V', $this->buffer->read(4))[1];
                $this->m_name = unpack('V', $this->buffer->read(4))[1];
                $this->m_event = END_TAG;
                break;
            }

            if ($chunkType == CHUNK_XML_TEXT) {
                $this->m_name = unpack('V', $this->buffer->read(4))[1];

                # FIXME
                $this->buffer->read(4);
                $this->buffer->read(4);

                $this->m_event = TEXT;
                break;
            }
        }
    }

    public function getPrefixByUri($uri) {
        if (!isset($this->m_uriprefix[$uri])) {
            return -1;
        }

        return $this->m_uriprefix[$uri];
    }

    public function getPrefix() {
        if (!isset($this->m_uriprefix[$this->m_namespaceUri])) {
            return '';
        }

        return $this->m_uriprefix[$this->m_namespaceUri];
    }

    public function getName() {
        if ($this->m_name == -1 or ($this->m_event != START_TAG and $this->m_event != END_TAG)) {
            return '';
        }

        return $this->sb->getString($this->m_name);
    }

    public function getText() {
        if ($this->m_name == -1 or $this->m_event != TEXT) {
            return '';
        }

        return $this->sb->getString($this->m_name);
    }

    public function getXMLNS() {
        $buff = '';

        foreach($this->m_uriprefix as $k => $v) {
            if (!in_array($k, $this->visited_ns)) {
                $buff .= sprintf("xmlns:%s=\"%s\"",
                    $this->sb->getString($v),
                    $this->sb->getString($this->m_prefixuri[$v]));
                $this->visited_ns[] = $k;
            }
        }

        return $buff;
    }

    public function getAttributeOffset($index) {
        # FIXME
        if ($this->m_event != START_TAG) {
            throw new \Exception("Current event is not START_TAG.");
        }

        $offset = $index * 5;
        # FIXME
        if ($offset >= count($this->m_attributes)) {
            throw new \Exception("Invalid attribute index");
        }

        return $offset;
    }

    public function getAttributeCount() {
        if ($this->m_event != START_TAG) {
            return -1;
        }

        return count($this->m_attributes) / ATTRIBUTE_LENGHT;
    }

    public function getAttributePrefix($index) {
        $offset = $this->getAttributeOffset($index);
        $uri = $this->m_attributes[$offset + ATTRIBUTE_IX_NAMESPACE_URI];

        $prefix = $this->getPrefixByUri($uri);

        if ($prefix == -1) {
            return "";
        }

        return $this->sb->getString($prefix);
    }

    public function getAttributeName($index) {
        $offset = $this->getAttributeOffset($index);
        $name = $this->m_attributes[$offset + ATTRIBUTE_IX_NAME];

        if ($name == -1) {
            return "";
        }

        return $this->sb->getString($name);
    }

    public function getAttributeValueType($index) {
        $offset = $this->getAttributeOffset($index);
        return $this->m_attributes[$offset + ATTRIBUTE_IX_VALUE_TYPE];
    }

    public function getAttributeValueData($index) {
        $offset = $this->getAttributeOffset($index);
        return $this->m_attributes[$offset + ATTRIBUTE_IX_VALUE_DATA];
    }

    public function getAttributeValue($index) {
        $offset = $this->getAttributeOffset($index);
        $valueType = $this->m_attributes[$offset + ATTRIBUTE_IX_VALUE_TYPE];

        if ($valueType == TYPE_STRING) {
            $valueString = $this->m_attributes[$offset + ATTRIBUTE_IX_VALUE_STRING];
            return $this->sb->getString( $valueString );
        }

        return "";
    }
}

const TYPE_ATTRIBUTE          = 2;
const TYPE_DIMENSION          = 5;
const TYPE_FIRST_COLOR_INT    = 28;
const TYPE_FIRST_INT          = 16;
const TYPE_FLOAT              = 4;
const TYPE_FRACTION           = 6;
const TYPE_INT_BOOLEAN        = 18;
const TYPE_INT_COLOR_ARGB4    = 30;
const TYPE_INT_COLOR_ARGB8    = 28;
const TYPE_INT_COLOR_RGB4     = 31;
const TYPE_INT_COLOR_RGB8     = 29;
const TYPE_INT_DEC            = 16;
const TYPE_INT_HEX            = 17;
const TYPE_LAST_COLOR_INT     = 31;
const TYPE_LAST_INT           = 31;
const TYPE_NULL               = 0;
const TYPE_REFERENCE          = 1;
const TYPE_STRING             = 3;


class AXMLPrinter {
    private $axml = NULL;

    public function __construct($raw_buff) {
        $this->axml = new AXMLParser($raw_buff);
        $this->xmlns = false;

        $this->buff = '';

        while (true) {
            $_type = $this->axml->next();

            if ($_type == START_DOCUMENT) {
                $this->buff .= sprintf("%s\n", '<?xml version="1.0" encoding="utf-8"?>');
            } elseif ($_type == START_TAG) {
                $this->buff .= '<' . $this->getPrefix($this->axml->getPrefix()) . $this->axml->getName() . "\n";

                for ($i = 0; $i < $this->axml->getAttributeCount(); $i++) {
                    $this->buff .= sprintf("%s%s=\"%s\"\n",
                        $this->getPrefix( $this->axml->getAttributePrefix($i) ),
                        $this->axml->getAttributeName($i),
                        htmlspecialchars($this->getAttributeValue( $i )));
                }

                $this->buff .= $this->axml->getXMLNS();
                $this->buff .= ">\n";

            } elseif ($_type == END_TAG) {
                $this->buff .= sprintf( "</%s%s>\n", $this->getPrefix( $this->axml->getPrefix() ), $this->axml->getName() );
            } elseif ($_type == TEXT) {
                #$this->buff .= sprintf("%s\n", htmlspecialchars($this->axml->getText()));
            } elseif ($_type == END_DOCUMENT) {
                break;
            }
        }
    }

    public function get_buff() {
        return $this->buff; #.encode('utf-8')?
    }

    private function getPrefix($prefix) {
        if ($prefix == NULL or strlen($prefix) == 0) {
            return '';
        }

        return $prefix . ':';
    }

    private function getAttributeValue($index) {
        $_type = $this->axml->getAttributeValueType($index);
        $_data = $this->axml->getAttributeValueData($index);

        if ($_type == TYPE_STRING) {
            return $this->axml->getAttributeValue($index);

        } elseif ($_type == TYPE_ATTRIBUTE) {
            return "?" . $this->getPackage($_data) . $_data;

        } elseif ($_type == TYPE_REFERENCE) {
            return '@' . dechex($_data);#"@" . $this->getPackage($_data) . $_data;

        } elseif ($_type == TYPE_FLOAT) {
            return unpack("f", pack("L", $_data))[1];

        } elseif ($_type == TYPE_INT_HEX) {
            return "0x" . $_data;

        } elseif ($_type == TYPE_INT_BOOLEAN) {
            if ($_data == 0) {
                return "false";
            }

            return "true";

        #} elseif ($_type == self::TYPE_DIMENSION) {
        #    return "%f%s" % (complexToFloat(_data), DIMENSION_UNITS[_data & COMPLEX_UNIT_MASK])

        #} elseif ($_type == self::TYPE_FRACTION) {
        #    return "%f%s" % (complexToFloat(_data) * 100, FRACTION_UNITS[_data & COMPLEX_UNIT_MASK])

        #} elseif ($_type >= self::TYPE_FIRST_COLOR_INT and $_type <= self::TYPE_LAST_COLOR_INT) {
        #    return "#%08X" % _data

        } elseif ($_type >= TYPE_FIRST_INT and $_type <= TYPE_LAST_INT) {
            if ($_data > 0x7fffffff) {
                $_data = (0x7fffffff & $_data) - 0x80000000;
            }

            return $_data;
        }
        return "<0x" . $_data . ", type 0x" . $_type . ">";
    }

    private function getPackage($id) {
        if ($id >> 24 == 1) {
            return "android:";
        }

        return "";
    }
}

const RES_NULL_TYPE               = 0x0000;
const RES_STRING_POOL_TYPE        = 0x0001;
const RES_TABLE_TYPE              = 0x0002;
const RES_XML_TYPE                = 0x0003;

# Chunk types in RES_XML_TYPE;
const RES_XML_FIRST_CHUNK_TYPE    = 0x0100;
const RES_XML_START_NAMESPACE_TYPE= 0x0100;
const RES_XML_END_NAMESPACE_TYPE  = 0x0101;
const RES_XML_START_ELEMENT_TYPE  = 0x0102;
const RES_XML_END_ELEMENT_TYPE    = 0x0103;
const RES_XML_CDATA_TYPE          = 0x0104;
const RES_XML_LAST_CHUNK_TYPE     = 0x017f;

# This contains a uint32_t array mapping strings in the string;
# pool back to resource identifiers.  It is optional.
const RES_XML_RESOURCE_MAP_TYPE   = 0x0180;

# Chunk types in RES_TABLE_TYPE
const RES_TABLE_PACKAGE_TYPE      = 0x0200;
const RES_TABLE_TYPE_TYPE         = 0x0201;
const RES_TABLE_TYPE_SPEC_TYPE    = 0x0202;


class ARSCParser {
    public function __construct($raw_buff) {
        $this->analyzed = False;
        $this->buff = new \BuffaloHandle($raw_buff);

        $this->header = new ARSCHeader($this->buff);
        $this->packageCount = unpack('i', $this->buff->read(4))[1];

        $this->stringpool_main = new StringBlock($this->buff);

        $this->next_header = new ARSCHeader($this->buff);
        $this->packages = array();
        $this->values = array();

        for ($i = 0; $i < $this->packageCount; $i++) {
            $current_package = new ARSCResTablePackage($this->buff);
            $package_name = $current_package->get_name();

            $this->packages[$package_name] = array();

            $mTableStrings = new StringBlock($this->buff);
            $mKeyStrings = new StringBlock($this->buff);

            $this->packages[$package_name][] = $current_package;
            $this->packages[$package_name][] = $mTableStrings;
            $this->packages[$package_name][] = $mKeyStrings;

            $pc = new PackageContext($current_package, $this->stringpool_main, $mTableStrings, $mKeyStrings);

            $current = $this->buff->position();
            while (!$this->buff->end()) {
                $header = new ARSCHeader($this->buff);
                $this->packages[$package_name][] = $header;

                if ($header->type == RES_TABLE_TYPE_SPEC_TYPE) {
                    $this->packages[$package_name][] = new ARSCResTypeSpec($this->buff, $pc);

                } elseif ($header->type == RES_TABLE_TYPE_TYPE) {
                    $a_res_type = new ARSCResType($this->buff, $pc);
                    $this->packages[$package_name][] = $a_res_type;

                    $entries = array();
                    for ($i = 0; $i < $a_res_type->entryCount; $i++) {
                        $current_package->mResId = $current_package->mResId & 0xffff0000 | $i;
                        $entries[] = array(unpack('i', $this->buff->read(4))[1], $current_package->mResId);
                    }

                    $this->packages[$package_name][] = $entries;

                    while (list(, $array) = each($entries)) {
                        list($entry, $res_id) = $array;

                        if ($this->buff->end()) {
                            break;
                        }

                        if ($entry != -1) {
                            $ate = new ARSCResTableEntry($this->buff, $res_id, $pc);
                            $this->packages[$package_name][] = $ate;
                        }
                    }

                } elseif ($header->type == RES_TABLE_PACKAGE_TYPE) {
                    break;

                } else {
                    throw new \Exception("unknown type");
                    break;
                }

                $current += $header->size;
                $this->buff->seek($current);
            }
        }
    }

    private function _analyse() {
        if ($this->analyzed) {
            return;
        }

        $this->analyzed = True;

        foreach ($this->packages as $package_name=>$value) {
            $this->values[$package_name] = array();
            $t = 0;

            for ($i = 3; $i < count($value); $i++) {
                $header = $value[$i];

                if ($header instanceof ARSCHeader) {
                    if ($header->type == RES_TABLE_TYPE_TYPE) {
                        $a_res_type = $value[$i + 1];

                        if (!isset($this->values[$package_name][$a_res_type->config->get_language()])) {
                            $this->values[$package_name][$a_res_type->config->get_language()] = array( 'public' => array() );
                        }

                        $c_value = &$this->values[$package_name][$a_res_type->config->get_language()];
                        $entries = $value[$i + 2];
                        $nb_i = 0;
                        while (list(, $array) = each($entries)) {
                            list($entry, $res_id) = $array;

                            if ($entry != -1) {
                                $ate = $value[$i + 3 + $nb_i];

                                if ($ate->get_index() != -1) {
                                    $c_value["public"][] = array($a_res_type->get_type(), $ate->get_value(), $ate->mResId);
                                }

                                if (!isset($c_value[$a_res_type->get_type()])) {
                                    $c_value[$a_res_type->get_type()] = array();
                                }

                                if ($a_res_type->get_type() == "string") {
                                    $c_value["string"][] = $this->get_resource_string($ate);
                                }

                                $nb_i++;
                            }
                        }

                        $i++;
                    }
                }
            }
        }
    }

    public function get_resource_value_by_reference($id) {
        $data = array();

        foreach ($this->packages as $package_name=>$value) {
            for ($i = 3; $i < count($value); $i++) {
                $header = $value[$i];

                if ($header instanceof ARSCResTableEntry) {
                    if (dechex($header->mResId) == $id) {
                        $data[] = $header->get_key_data();
                    }
                }
            }
        }

        return $data;
    }

    public function get_resource_string($ate) {
        return array($ate->get_value(), $ate->get_key_data());
    }

    public function get_packages_names() {
        return array_keys($this->packages);
    }

    public function get_locales($package_name) {
        $this->_analyse();
    }
}


class PackageContext {
    public function __construct($current_package, $stringpool_main, $mTableStrings, $mKeyStrings) {
        $this->stringpool_main = $stringpool_main;
        $this->mTableStrings = $mTableStrings;
        $this->mKeyStrings = $mKeyStrings;
        $this->current_package = $current_package;
    }

    public function get_mResId() {
        return $this->current_package->mResId;
    }

    public function set_mResId($mResId) {
        $this->current_package->mResId = $mResId;
    }
}


class ARSCHeader {
    public function __construct($buff) {
        $this->start = $buff->position();
        $this->type = unpack('s', $buff->read(2))[1];
        $this->header_size = unpack('s', $buff->read(2))[1];
        $this->size = unpack('i', $buff->read(4))[1];
    }
}


class ARSCResTablePackage {
    public function __construct($buff) {
        $this->start = $buff->position();
        $this->id = unpack('i', $buff->read(4))[1];
        $this->name = $buff->read(256);
        $this->typeStrings = unpack('i', $buff->read(4))[1];
        $this->lastPublicType = unpack('i', $buff->read(4))[1];
        $this->keyStrings = unpack('i', $buff->read(4))[1];
        $this->lastPublicKey = unpack('i', $buff->read(4))[1];
        $this->mResId = $this->id << 24;
    }

    public function get_name() {
        $name = iconv('utf-16', 'utf-8', $this->name);
        $name = substr($name, 0, strpos($name, "\x00"));
        return $name;
    }
}


class ARSCResTypeSpec {
    public function __construct($buff, $parent = NULL) {
        $this->start = $buff->position();
        $this->parent = $parent;
        $this->id = unpack('c', $buff->read(1))[1];
        $this->res0 = unpack('c', $buff->read(1))[1];
        $this->res1 = unpack('s', $buff->read(2))[1];
        $this->entryCount = unpack('i', $buff->read(4))[1];

        $this->typespec_entries = array();
        for ($i = 0; $i < $this->entryCount; $i++) {
            $this->typespec_entries[] = unpack('i', $buff->read(4))[1];
        }
    }
}


class ARSCResType {
    public function __construct($buff, $parent = NULL) {
        $this->start = $buff->position();
        $this->parent = $parent;
        $this->id = unpack('c', $buff->read(1))[1];
        $this->res0 = unpack('c', $buff->read(1))[1];
        $this->res1 = unpack('s', $buff->read(2))[1];
        $this->entryCount = unpack('i', $buff->read(4))[1];
        $this->entriesStart = unpack('i', $buff->read(4))[1];
        $this->mResId = (0xff000000 & $this->parent->get_mResId()) | $this->id << 16;
        $this->parent->set_mResId($this->mResId);

        $this->config = new ARSCResTableConfig($buff);
    }

    public function get_type() {
        return $this->parent->mTableStrings->getString($this->id - 1);
    }
}


class ARSCResTableConfig {
    public function __construct($buff) {
        $this->start = $buff->position();
        $this->size = unpack('i', $buff->read(4))[1];
        $this->imsi = unpack('i', $buff->read(4))[1];
        $this->locale = unpack('i', $buff->read(4))[1];
        $this->screenType = unpack('i', $buff->read(4))[1];
        $this->input = unpack('i', $buff->read(4))[1];
        $this->screenSize = unpack('i', $buff->read(4))[1];
        $this->version = unpack('i', $buff->read(4))[1];

        $this->screenConfig = 0;
        $this->screenSizeDp = 0;

        if ($this->size >= 32) {
            $this->screenConfig = unpack('i', $buff->read(4))[1];

            if ($this->size >= 36) {
                $this->screenSizeDp = unpack('i', $buff->read(4))[1];
            }
        }

        $this->exceedingSize = $this->size - 36;
        if ($this->exceedingSize > 0) {
            throw new \Exception("too much bytes !");
            $this->padding = $buff->read($this->exceedingSize);
        }
    }

    public function get_language() {
        $x = $this->locale & 0x0000ffff;
        return chr($x & 0x00ff) . chr(($x & 0xff00) >> 8);
    }

    public function get_country() {
        $x = ($this->locale & 0xffff0000) >> 16;
        return chr($x & 0x00ff) . chr(($x & 0xff00) >> 8);
    }
}


class ARSCResTableEntry {
    public function  __construct($buff, $mResId, $parent = NULL) {
        $this->start = $buff->position();
        $this->mResId = $mResId;
        $this->parent = $parent;
        $this->size = unpack('s', $buff->read(2))[1];
        $this->flags = unpack('s', $buff->read(2))[1];
        $this->index = unpack('i', $buff->read(4))[1];

        if ($this->flags & 1) {
            $this->item = new ARSCComplex($buff, $parent);
        } else {
            $this->key = new ARSCResStringPoolRef($buff, $this->parent);
        }
    }

    public function get_index() {
        return $this->index;
    }

    public function get_value() {
        return $this->parent->mKeyStrings->getString($this->index);
    }

    public function get_key_data() {
        return $this->key->get_data_value();
    }

    public function is_public() {
        return $this->flags == 0 or $this->flags == 2;
    }

    public function is_complex() {
        return ($this->flags & 1) == 1;
    }
}


class ARSCComplex {
    public function __construct($buff, $parent = NULL) {
        $this->start = $buff->position();
        $this->parent = $parent;

        $this->id_parent = unpack('i', $buff->read(4))[1];
        $this->count = unpack('i', $buff->read(4))[1];

        $this->items = array();
        for ($i = 0; $i < $this->count; $i++) {
            $this->items[] = array(unpack('i', $buff->read(4))[1], new ARSCResStringPoolRef($buff, $this->parent));
        }
    }
}


class ARSCResStringPoolRef {
    public function __construct($buff, $parent = NULL) {
        $this->start = $buff->position();
        $this->parent = $parent;

        $this->skip_bytes = $buff->read(3);
        $this->data_type = unpack('c', $buff->read(1))[1];
        $this->data = unpack('i', $buff->read(4))[1];
    }

    public function get_data_value() {
        return $this->parent->stringpool_main->getString($this->data);
    }

    public function get_data() {
        return $this->data;
    }

    public function get_data_type() {
        return $this->data_type;
    }
}
