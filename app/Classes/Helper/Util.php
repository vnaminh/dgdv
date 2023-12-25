<?php


namespace App\Classes\Helper;


class Util
{

    /**
     *
     * @param <string> $str : Chuoi can strip
     * @return <string>
     */
    public static function stripUnicode($str, $isUpper = false)
    {
        if (preg_match('/[\x{4E00}-\x{9FBF}\x{3040}-\x{309F}\x{30A0}-\x{30FF}]/u', $str)) {
            // tieng Nhat, khoi stripUnicode
            return $str;
        }
        if ($str === '0' || $str === 0)
            return 0;
        else {
            if (!$str)
                return false;
            $unicode = array(
                'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|á|à|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ắ|ằ|ẳ|ẵ|ặ',
                'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Ă|Â|Á|À|Ả|Ã|Ạ|Ắ|Ằ|Ẳ|Ã|Ặ|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd' => 'đ',
                'D' => 'Đ',
                'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ề|é|è|ẻ|ẽ|ẹ|ế|ề|ể|ễ|ệ',
                'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i' => 'í|ì|ỉ|ĩ|ị|í|ì|ỉ|ĩ|ị',
                'I' => 'Í|Ì|Ỉ|Ĩ|Ị|Í|Ì|Ỉ|Ĩ|Ị',
                'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ',
                'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ',
                'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Ú|Ù|Ủ|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'y' => 'ý|ỳ|ỷ|ỹ|ỵ|ý|ỳ|ỷ|ỹ|ỵ',
                'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
            );
            foreach ($unicode as $nonUnicode => $uni) {
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
            }

            if($isUpper){
                $str = self::upperString($str);
            }

            return $str;
        }
    }

    /**
     * Function name        : slitText
     * Purpose                  : Cat chuoi voi so luong tu nhat dinh
     * Create date        : 08/04/2011
     * @param string $text : Chuoi dua vao
     * @param int $size : Kich thuoc chuoi
     * @return string           : Tra ve chuoi can cat
     */
    public static function slitText($text, $size)
    {
        if (($size) && ($size < strlen($text))) {
            return substr($text, 0, strpos($text, " ", $size - 7)) . " ...";
        }
        return $text;
    }

    /**
     * Function name        :    stripInput
     * Purpose              :    Tao chuoi //n toan, thay the ma HTML thanh ma code...
     * Create date          :    08/04/2011
     * @param string $text :    Chuoi can thay the
     * @return string       :    Tra ve chuoi da thay the
     */
    public static function stripInput($text)
    {
        if (!is_array($text)) {
            $text = trim($text);
        }
        //$text = stripslashes($text);
        $search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
        $replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
//        $search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;", "&");
//        $replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ", '&amp;');
        $text = str_replace($search, $replace, $text);

        return $text;
    }

    /**
     * Function name        :    stripOutput
     * Purpose            :    Tao chuoi an toan, thay the code thanh ma HTML...
     * Create date        :    17/02/2009
     * @param string $text :    Chuoi can thay the
     * @return string        :    Tra ve chuoi da thay the
     */
    public static function stripOutput($text, $fixnbsp = false)
    {
        //hhnam add convert html &nbsp; to space
        if ($fixnbsp == true) {
            $text = htmlentities($text, null, 'utf-8');
            $text = str_replace("&nbsp;", " ", $text);
            $text = html_entity_decode($text, null, 'utf-8');
        }//end 01/08/2014

        $search = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;");
        $replace = array("\"", "'", "\\", '\"', "\'", "<", ">");
//        $search = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", '&amp;');
//        $replace = array("\"", "'", "\\", '\"', "\'", "<", ">", "&");
        $text = str_replace($search, $replace, trim($text));
        return $text;
    }

    public static function stripArrayInput(&$arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $k => $v) {
                $arr[$k] = self::stripArrayInput($v);
            }
        } else {
            return self::stripInput($arr);
        }
        return $arr;
    }

    public static function strToTime($str)
    {
        if (is_null($str) || $str == '')
            return null;
        $date = 0;
        $str = str_replace('/', '-', $str);
        $c = strlen($str) - strlen(str_replace(':', '', $str));
        if ($c == 0) {
            //$date = DateTime::createFromFormat('d-m-Y H:i:s', $str . ' 00:00:00');
            $date = strtotime($str . ' 00:00:00');
        } else if ($c == 1) {
            //$date = DateTime::createFromFormat('d-m-Y H:i:s', $str . ':00');
            $date = strtotime($str . ':00');
        } else {
            //$date = DateTime::createFromFormat('d-m-Y H:i:s', $str);
            $date = strtotime($str);
        }
        if (!$date)
            return null;
        //return $date->getTimestamp();
        return $date;
    }

    public static function timeToStr($val, $full_format = false)
    {
        if (!is_numeric($val)) {
            return '';
        }
        if ($val == 0) {
            return '';
        }
        if ($full_format) {
//            $format = "d" . config('constants.__FORMATDATE_SEP') . "m" . config('constants.__FORMATDATE_SEP') . "Y H:i";
            $format = $full_format;
        } else {
            $format = "d" . config('constants.__FORMATDATE_SEP') . "m" . config('constants.__FORMATDATE_SEP') . "Y";
        }
        return date($format, $val);
    }

    /**
     * @param type $val
     * @return string
     * @author nchien - 01/11/2016
     * @abstract Khai báo hàm lấy thông tin thứ trong tuần
     */
    public static function timeToDayOfWeek($val)
    {
        if (!is_numeric($val)) {
            return '';
        }
        if ($val == 0) {
            return '';
        }
        //
        switch (date('N', $val)) {
            case 1:
                $res = "Thứ hai";
                break;
            case 2:
                $res = "Thứ ba";
                break;
            case 3:
                $res = "Thứ tư";
                break;
            case 4:
                $res = "Thứ năm";
                break;
            case 5:
                $res = "Thứ sáu";
                break;
            case 6:
                $res = "Thứ bảy";
                break;
            case 7:
                $res = "Chủ nhật";
                break;
            default:
                $res = '';
                break;
        }
        return $res;
    }// end function timeToDayOfWeek

    public static function newlineTextarea($val)
    {
        return str_replace(array("\r\n", "\r", "\n"), "<br />", $val);
    }

    //--pqbao 29-03-2013

    /**
     * Chuyen so thanh ngay dd-mm-YYYY
     * @param int $num
     * @param string $format_option : d-m-Y H:i:s
     * @return dd-mm-YYYY
     */
    public static function timeToStrCutmp($val, $format_option = "")
    {
        if (!is_numeric($val)) {
            return '';
        }
        if ($val == 0) {
            return '';
        }

        if ($format_option == "") {
            $format_option = 'd-m-Y H:i';
        }
        return date($format_option, $val);
    }

    /**
     * tinh so ngay tu ngay bat dau den ket thuc (dang timestamp)
     * @param int $start_date
     * @param int $end_date
     * @return int so ngay
     */
    public static function diffTimeToDays($start_date, $end_date)
    {
        return ceil(($end_date - $start_date) / (24 * 60 * 60));
    }

    /**
     * them so ngay vao timestamp hien tai
     * @param type $date
     * @param type $val
     * @return type
     */
    public static function addDate($date, $val)
    {
        return $date + ($val * 24 * 60 * 60);
    }

    /**
     * Tinh so ngay cua 1 nam
     * @param type $year
     */
    public static function getDaysOfYear($year)
    {
        return date('z', mktime(0, 0, 0, 12, 31, $year)) + 1;
    }

    public static function getYearOfDate($date)
    {
        $date_formated = DateTime::createFromFormat("d-m-Y", $date);
        $year = $date_formated->format("Y");
        return $year;
    }

    public static function round($value, $step)
    {
        $cd = ((int)($value / $step)) * $step;
        $ct = $cd + $step;
        if (round(($value - $cd), 5) >= round(($ct - $value), 5)) {
            $value = $ct;
        } else
            $value = $cd;
        return $value;
    }

    public static function getParam($index = NULL)
    {
        $params = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        if (__DB_NAME == __DB_ORACLE) {
            $arr = range('a', 'z');
            $params = $arr;

            foreach ($arr as $v) {
                foreach ($arr as $v1) {
                    $params[] = $v . $v1;
                }
            }
        }
        if (is_null($index)) {
            return $params;
        }
        return $params[$index];
    }

    public static function usingIE()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $ub = False;
        if (preg_match('/MSIE/i', $u_agent)) {
            $ub = True;
        }

        return $ub;
    }

    public static function checkDateFromString($date)
    {
        if (is_array($date) || is_null($date))
            return false;

        return (preg_match("/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/", $date));
    }

    /**
     * Kiem tra mot so co phai da duoc dinh dang chua
     * @param type $val
     */
    public static function checkFormatedNumber($val)
    {
        return (preg_match("/\b\d{1,3}(?:.?\d{3})*(?:\,\d{2})?\b/", $val));
    }

    /**
     *
     * @param <type> $val
     * @return <type>
     */
    public static function numberFormat($val)
    {
        if ($val == '') {
            return $val;
        }
        if (!is_numeric(doubleval($val))) {
            return $val;
        }
        if (strstr($val, '.') === false || !(strpos($val, 'E') === false)) {
            $val = number_format(doubleval($val), 0, config('constants.__FORMATNUMBER_DECIMALS_POINT'), config('constants.____FORMATNUMBER_THOUSANDS_SEP'));
        } else {
            $a = explode('.', $val);
            $l = strlen($a[count($a) - 1]);
            $val = number_format(doubleval($val), $l, config('constants.__FORMATNUMBER_DECIMALS_POINT'), config('constants.____FORMATNUMBER_THOUSANDS_SEP'));
        }
        return $val;
    }

    /**
     *
     * @param <type> $val
     * @param <type> $dec_point
     * @param <type> $thousands_sep
     * @return <type>
     */
    public static function numberTypeFormat($val, $dec_point = ".", $thousands_sep = ",")
    {
        if ($val == '') {
            return $val;
        }
        if (!is_numeric(doubleval($val))) {
            return $val;
        }
        if (strstr($val, $thousands_sep) === false || !(strpos($val, 'E') === false)) {
            $val = number_format(doubleval($val), 0, $dec_point, $thousands_sep);
        } else {
            $a = explode(',', $val);
            $l = strlen($a[count($a) - 1]);
            $val = number_format(doubleval($val), $l, $dec_point, $thousands_sep);
        }
        return $val;
    }

    /**
     * Kiem tra xem du lieu hien tai co vuot qua gioi han upload cua server khong
     */
    public static function checkOutOfPostSizeLimit()
    {
        $max_size = ini_get('upload_max_filesize');
        $max_size = substr($max_size, 0, strlen($max_size) - 1);
        $max_size = $max_size * 1024 * 1024;

        $data = isset($_SERVER['CONTENT_LENGTH']) ? $_SERVER['CONTENT_LENGTH'] : 0;
        return $data > $max_size;
    }

    /**
     * Tác giả ntthuan
     * Tách mảng (1,2,3,5,6,8,9) Thành (1,2,3),(5,6),(8,9)
     * @param array $arr
     * @return array
     */
    public static function explodeArray($arr)
    {
        asort($arr);
        $kq = array();
        $i = 0;
        $j = 0;
        foreach ($arr as $k => $v) {
            if ($j == 0) {
                $kq[$i][] = $v;
                $j++;
                $temp = $v;
                continue;
            }
            if (($temp + 1) == $v) {
                $kq[$i][] = $v;
            } else {
                $i++;
                $kq[$i][] = $v;
            }
            $temp = $v;
            $j++;
        }
        return $kq;
    }

    /**
     * tác giả nhthinh
     * Trả về mảng nh để fill vào cmb nhhk
     *
     * @param type $datanhhk danh sách nhhk lấy từ model tables
     * @return string
     */
    public static function hashNHHK($datanhhk)
    {
        $datanh = array();
        $count = 0;
        foreach ($datanhhk as $k => $v) {
            $nh = substr($v, 0, strlen($v) - 1);
            if ($k == 0) {
                $datanh[$count]['nam_hoc_value'] = $nh - 1;
                $datanh[$count]['nam_hoc_text'] = ($nh - 1) . '-' . $nh;
                $count++;
            } else {
                if ($datanh[($count - 1)]['nam_hoc_value'] != ($nh - 1)) {
                    $datanh[$count]['nam_hoc_value'] = $nh - 1;
                    $datanh[$count]['nam_hoc_text'] = ($nh - 1) . '-' . $nh;
                    $count++;
                }
            }
        }
        return $datanh;
    }

    public static function hashTietHoc($buoi, $tietdau, $sotiet)
    {
        $sotietsang = TKBInfo::get_SoTietSang();
        $sotietchieu = TKBInfo::get_SoTietChieu();
        $sotiettoi = TKBInfo::get_SoTietToi();
        $arr = array();
        for ($i = 1; $i <= ($sotietsang + $sotietchieu + $sotiettoi); $i++) {
            $arr[$i] = '&minus;';
        }
        switch ($buoi) {
            case 1:
                for ($j = $tietdau; $j < ($tietdau + $sotiet); $j++) {
                    $arr[$j] = $j % 10;
                }
                break;
            case 2:
                for ($j = ($sotietsang + $tietdau); $j < ($sotietsang + $tietdau + $sotiet); $j++) {
                    $arr[$j] = $j % 10;
                }

                break;
            case 3:
                for ($j = ($sotietsang + $tietdau + $sotietchieu); $j < ($sotietchieu + $sotietsang + $tietdau + $sotiet); $j++) {
                    $arr[$j] = $j % 10;
                }
                break;
        }
        // print_r($arr);
        return implode('', $arr);
    }

    public static function convertMoneyToNumber($money)
    {
        return str_replace(",", "", $money);
    }

    private static function strToArr($input)
    {
        $outarr = "";
        $str_len = mb_strlen($input, "UTF-8") - 1;
        $startpos = 0;
        while ($startpos <= $str_len) {
            $outarr[$startpos] = mb_substr($input, $startpos, 1, "UTF-8");
            $startpos++;
        }
        return $outarr;
    }

    public static function TCVN3ToUnicode($input)
    {
        return $input;
        /*
            if ($input == '')
                return '';
            else {

                //$test = mb_detect_encoding($input);
                //echo "$input -".$test."-";
                //if ($test!="UTF-8")
                $input = utf8_encode($input);
                $a = Util::strToArr($input);
                $l = mb_strlen($input, "UTF-8");
                $s = '';

                for ($i = 0; $i < $l; $i++) {
                    if (ord($a[$i]) < 190) {
                        $s .= $a[$i];
                    } else {
                        switch ($a[$i]) {
                            case '¸': $s .= 'á'; //a'
                                break;
                            case '¸': $s .= 'Á'; //A'
                                break;
                            case 'µ': $s .= 'à'; //a`
                                break;
                            case 'µ': $s .= 'À'; //A`
                                break;
                            case '¶': $s .= 'ả'; //a?
                                break;
                            case '¶': $s .= 'Ả'; //A?
                                break;
                            case '·': $s .= 'ã'; //a~
                                break;
                            case '·': $s .= 'Ã'; //A~
                                break;
                            case '¹': $s .= 'ạ'; //a.
                                break;
                            case '¹': $s .= 'Ạ'; //A.
                                break;
                            case '¨': $s .= 'ă'; //a(
                                break;
                            case '¡': $s .= 'Ă'; //A(
                                break;
                            case '¾': $s .= 'ắ'; //a('
                                break;
                            case '¾': $s .= 'Ắ'; //A('
                                break;
                            case '»': $s .= 'ằ'; //a(`
                                break;
                            case '»': $s .= 'Ằ'; //A(`
                                break;
                            case '¼': $s .= 'ẳ'; //a(?
                                break;
                            case '¼': $s .= 'Ẳ'; //A(?
                                break;
                            case '½': $s .= 'ẵ'; //a(~
                                break;
                            case '½': $s .= 'Ẵ'; //A(~
                                break;
                            case 'Æ': $s .= 'ặ'; //a(.
                                break;
                            case 'Æ': $s .= 'Ặ'; //A(.
                                break;
                            case '©': $s .= 'â'; //a^
                                break;
                            case '¢': $s .= 'Â'; //A^
                                break;
                            case 'Ê': $s .= 'ấ'; //a^'
                                break;
                            case 'Ç': $s .= 'ầ'; //a^`
                                break;
                            case 'È': $s .= 'ẩ'; //a^?
                                break;
                            case 'É': $s .= 'ẫ'; //a^~
                                break;
                            case 'Ë': $s .= 'ậ'; //a^.
                                break;
                            case 'Ê': $s .= 'Ấ'; //A^'
                                break;
                            case 'Ç': $s .= 'Ầ'; //A^`
                                break;
                            case 'È': $s .= 'Ẩ'; //A^?
                                break;
                            case 'É': $s .= 'Ẫ'; //A^~
                                break;
                            case 'Ë': $s .= 'Ậ'; //A^.
                                break;
                            case 'Ð': $s .= 'é'; //e'
                                break;
                            case 'Ì': $s .= 'è'; //e`
                                break;
                            case 'Î': $s .= 'ẻ'; //e?
                                break;
                            case 'Ï': $s .= 'ẽ'; //e~
                                break;
                            case 'Ñ': $s .= 'ẹ'; //e.
                                break;
                            case 'Ð': $s .= 'É'; //E'
                                break;
                            case 'Ì': $s .= 'È'; //E`
                                break;
                            case 'Î': $s .= 'Ẻ'; //E?
                                break;
                            case 'Ï': $s .= 'Ẽ'; //E~
                                break;
                            case 'Ñ': $s .= 'Ẹ'; //E.
                                break;
                            case 'ª': $s .= 'ê'; //e^
                                break;
                            case 'Õ': $s .= 'ế'; //e^'
                                break;
                            case 'Ò': $s .= 'ề'; //e^`
                                break;
                            case 'Ó': $s .= 'ể'; //e^?
                                break;
                            case 'Ô': $s .= 'ễ'; //e^~
                                break;
                            case 'Ö': $s .= 'ệ'; //e^.
                                break;
                            case '£': $s .= 'Ê'; //E^
                                break;
                            case 'Õ': $s .= 'Ế'; //E^'
                                break;
                            case 'Ò': $s .= 'Ề'; //E^`
                                break;
                            case 'Ó': $s .= 'Ể'; //E^?
                                break;
                            case 'Ô': $s .= 'Ễ'; //E^~
                                break;
                            case 'Ö': $s .= 'Ệ'; //E^.
                                break;
                            case 'ã': $s .= 'ó'; //o'
                                break;
                            case 'ß': $s .= 'ò'; //o`
                                break;
                            case 'á': $s .= 'ỏ'; //o?
                                break;
                            case 'â': $s .= 'õ'; //o~
                                break;
                            case 'ä': $s .= 'ọ'; //o.
                                break;
                            case 'ã': $s .= 'Ó'; //O'
                                break;
                            case 'ß': $s .= 'Ò'; //O`
                                break;
                            case 'á': $s .= 'Ỏ'; //O?
                                break;
                            case 'â': $s .= 'Õ'; //O~
                                break;
                            case 'ä': $s .= 'Ọ'; //O.
                                break;
                            case '«': $s .= 'ô'; //o^
                                break;
                            case 'è': $s .= 'ố'; //o^'
                                break;
                            case 'å': $s .= 'ồ'; //o^`
                                break;
                            case 'æ': $s .= 'ổ'; //o^?
                                break;
                            case 'ç': $s .= 'ỗ'; //o^~
                                break;
                            case 'é': $s .= 'ộ'; //o^.
                                break;
                            case '¤': $s .= 'Ô'; //O^
                                break;
                            case 'è': $s .= 'Ố'; //O^'
                                break;
                            case 'å': $s .= 'Ồ'; //O^`
                                break;
                            case 'æ': $s .= 'Ổ'; //O^?
                                break;
                            case 'ç': $s .= 'Ỗ'; //O^~
                                break;
                            case 'é': $s .= 'Ộ'; //O^.
                                break;
                            case '¬': $s .= 'ơ'; //o+
                                break;
                            case 'í': $s .= 'ớ'; //o+'
                                break;
                            case 'ê': $s .= 'ờ'; //o+`
                                break;
                            case 'ë': $s .= 'ở'; //o+?
                                break;
                            case 'ì': $s .= 'ỡ'; //o+~
                                break;
                            case 'î': $s .= 'ợ'; //o+.
                                break;
                            case '¥': $s .= 'Ơ'; //O+
                                break;
                            case 'í': $s .= 'Ớ'; //O+'
                                break;
                            case 'ê': $s .= 'Ờ'; //O+`
                                break;
                            case 'ë': $s .= 'Ở'; //O+?
                                break;
                            case 'ì': $s .= 'Ỡ'; //O+~
                                break;
                            case 'î': $s .= 'Ợ'; //O+.
                                break;
                            case 'ó': $s .= 'ú'; //u'
                                break;
                            case 'ï': $s .= 'ù'; //u`
                                break;
                            case 'ñ': $s .= 'ủ'; //u?
                                break;
                            case 'ò': $s .= 'ũ'; //u~
                                break;
                            case 'ô': $s .= 'ụ'; //u.
                                break;
                            case 'ó': $s .= 'Ú'; //U'
                                break;
                            case 'ï': $s .= 'Ù'; //U`
                                break;
                            case 'ñ': $s .= 'Ủ'; //U?
                                break;
                            case 'ò': $s .= 'Ũ'; //U~
                                break;
                            case 'ô': $s .= 'Ụ'; //U.
                                break;
                            case '­': $s .= 'ư'; //u+
                                break;
                            case 'ø': $s .= 'ứ'; //u+'
                                break;
                            case 'õ': $s .= 'ừ'; //u+`
                                break;
                            case 'ö': $s .= 'ử'; //u+?
                                break;
                            case '÷': $s .= 'ữ'; //u+~
                                break;
                            case 'ù': $s .= 'ự'; //u+.
                                break;
                            case '¦': $s .= 'Ư'; //U+
                                break;
                            case 'ø': $s .= 'Ứ'; //U+'
                                break;
                            case 'õ': $s .= 'Ừ'; //U+`
                                break;
                            case 'ö': $s .= 'Ử'; //U+?
                                break;
                            case '÷': $s .= 'Ữ'; //U+~
                                break;
                            case 'ù': $s .= 'Ự'; //U+.
                                break;
                            case 'Ý': $s .= 'í'; //i'
                                break;
                            case '×': $s .= 'ì'; //i`
                                break;
                            case 'Ø': $s .= 'ỉ'; //i?
                                break;
                            case 'Ü': $s .= 'ĩ'; //i~
                                break;
                            case 'Þ': $s .= 'ị'; //i.
                                break;
                            case 'Ý': $s .= 'Í'; //I'
                                break;
                            case '×': $s .= 'Ì'; //I`
                                break;
                            case 'Ø': $s .= 'Ỉ'; //I?
                                break;
                            case 'Ü': $s .= 'Ĩ'; //I~
                                break;
                            case 'Þ': $s .= 'Ị'; //I.
                                break;
                            case '®': $s .= 'đ'; //dd
                                break;
                            case '§': $s .= 'Đ'; //DD
                                break;
                            case 'ý': $s .= 'ý'; //y'
                                break;
                            case 'ú': $s .= 'ỳ'; //y`
                                break;
                            case 'û': $s .= 'ỷ'; //y?
                                break;
                            case 'ü': $s .= 'ỹ'; //y~
                                break;
                            case 'þ': $s .= 'ỵ'; //y.
                                break;
                            case 'ý': $s .= 'Ý'; //Y'
                                break;
                            case 'ú': $s .= 'Ỳ'; //Y`
                                break;
                            case 'û': $s .= 'Ỷ'; //Y?
                                break;
                            case 'ü': $s .= 'Ỹ'; //Y~
                                break;
                            case 'þ': $s .= 'Ỵ'; //Y.
                                break;

                            default: $s .= $a[$i];
                        }
                    }
                }
                return $s;
            }
            */
    }

    public static function unicodeToTCVN3($input)
    {
        return $input;
        /*
            if ($input == '')
                return '';
            else {
                $a = Util::strToArr($input);
                $l = mb_strlen($input, "UTF-8");
                $s = '';

                for ($i = 0; $i < $l; $i++) {
                    if (ord($a[$i]) < 190) {
                        $s .= $a[$i];
                    } else {
                        switch ($a[$i]) {
                            case 'á': $s .= '¸'; //a'
                                break;
                            case 'Á': $s .= '¸'; //A'
                                break;
                            case 'à': $s .= 'µ'; //a`
                                break;
                            case 'À': $s .= 'µ'; //A`
                                break;
                            case 'ả': $s .= '¶'; //a?
                                break;
                            case 'Ả': $s .= '¶'; //A?
                                break;
                            case 'ã': $s .= '·'; //a~
                                break;
                            case 'Ã': $s .= '·'; //A~
                                break;
                            case 'ạ': $s .= '¹'; //a.
                                break;
                            case 'Ạ': $s .= '¹'; //A.
                                break;
                            case 'ă': $s .= '¨'; //a(
                                break;
                            case 'Ă': $s .= '¡'; //A(
                                break;
                            case 'ắ': $s .= '¾'; //a('
                                break;
                            case 'Ắ': $s .= '¾'; //A('
                                break;
                            case 'ằ': $s .= '»'; //a(`
                                break;
                            case 'Ằ': $s .= '»'; //A(`
                                break;
                            case 'ẳ': $s .= '¼'; //a(?
                                break;
                            case 'Ẳ': $s .= '¼'; //A(?
                                break;
                            case 'ẵ': $s .= '½'; //a(~
                                break;
                            case 'Ẵ': $s .= '½'; //A(~
                                break;
                            case 'ặ': $s .= 'Æ'; //a(.
                                break;
                            case 'Ặ': $s .= 'Æ'; //A(.
                                break;
                            case 'â': $s .= '©'; //a^
                                break;
                            case 'Â': $s .= '¢'; //A^
                                break;
                            case 'ấ': $s .= 'Ê'; //a^'
                                break;
                            case 'ầ': $s .= 'Ç'; //a^`
                                break;
                            case 'ẩ': $s .= 'È'; //a^?
                                break;
                            case 'ẫ': $s .= 'É'; //a^~
                                break;
                            case 'ậ': $s .= 'Ë'; //a^.
                                break;
                            case 'Ấ': $s .= 'Ê'; //A^'
                                break;
                            case 'Ầ': $s .= 'Ç'; //A^`
                                break;
                            case 'Ẩ': $s .= 'È'; //A^?
                                break;
                            case 'Ẫ': $s .= 'É'; //A^~
                                break;
                            case 'Ậ': $s .= 'Ë'; //A^.
                                break;
                            case 'é': $s .= 'Ð'; //e'
                                break;
                            case 'è': $s .= 'Ì'; //e`
                                break;
                            case 'ẻ': $s .= 'Î'; //e?
                                break;
                            case 'ẽ': $s .= 'Ï'; //e~
                                break;
                            case 'ẹ': $s .= 'Ñ'; //e.
                                break;
                            case 'É': $s .= 'Ð'; //E'
                                break;
                            case 'È': $s .= 'Ì'; //E`
                                break;
                            case 'Ẻ': $s .= 'Î'; //E?
                                break;
                            case 'Ẽ': $s .= 'Ï'; //E~
                                break;
                            case 'Ẹ': $s .= 'Ñ'; //E.
                                break;
                            case 'ê': $s .= 'ª'; //e^
                                break;
                            case 'ế': $s .= 'Õ'; //e^'
                                break;
                            case 'ề': $s .= 'Ò'; //e^`
                                break;
                            case 'ể': $s .= 'Ó'; //e^?
                                break;
                            case 'ễ': $s .= 'Ô'; //e^~
                                break;
                            case 'ệ': $s .= 'Ö'; //e^.
                                break;
                            case 'Ê': $s .= '£'; //E^
                                break;
                            case 'Ế': $s .= 'Õ'; //E^'
                                break;
                            case 'Ề': $s .= 'Ò'; //E^`
                                break;
                            case 'Ể': $s .= 'Ó'; //E^?
                                break;
                            case 'Ễ': $s .= 'Ô'; //E^~
                                break;
                            case 'Ệ': $s .= 'Ö'; //E^.
                                break;
                            case 'ó': $s .= 'ã'; //o'
                                break;
                            case 'ò': $s .= 'ß'; //o`
                                break;
                            case 'ỏ': $s .= 'á'; //o?
                                break;
                            case 'õ': $s .= 'â'; //o~
                                break;
                            case 'ọ': $s .= 'ä'; //o.
                                break;
                            case 'Ó': $s .= 'ã'; //O'
                                break;
                            case 'Ò': $s .= 'ß'; //O`
                                break;
                            case 'Ỏ': $s .= 'á'; //O?
                                break;
                            case 'Õ': $s .= 'â'; //O~
                                break;
                            case 'Ọ': $s .= 'ä'; //O.
                                break;
                            case 'ô': $s .= '«'; //o^
                                break;
                            case 'ố': $s .= 'è'; //o^'
                                break;
                            case 'ồ': $s .= 'å'; //o^`
                                break;
                            case 'ổ': $s .= 'æ'; //o^?
                                break;
                            case 'ỗ': $s .= 'ç'; //o^~
                                break;
                            case 'ộ': $s .= 'é'; //o^.
                                break;
                            case 'Ô': $s .= '¤'; //O^
                                break;
                            case 'Ố': $s .= 'è'; //O^'
                                break;
                            case 'Ồ': $s .= 'å'; //O^`
                                break;
                            case 'Ổ': $s .= 'æ'; //O^?
                                break;
                            case 'Ỗ': $s .= 'ç'; //O^~
                                break;
                            case 'Ộ': $s .= 'é'; //O^.
                                break;
                            case 'ơ': $s .= '¬'; //o+
                                break;
                            case 'ớ': $s .= 'í'; //o+'
                                break;
                            case 'ờ': $s .= 'ê'; //o+`
                                break;
                            case 'ở': $s .= 'ë'; //o+?
                                break;
                            case 'ỡ': $s .= 'ì'; //o+~
                                break;
                            case 'ợ': $s .= 'î'; //o+.
                                break;
                            case 'Ơ': $s .= '¥'; //O+
                                break;
                            case 'Ớ': $s .= 'í'; //O+'
                                break;
                            case 'Ờ': $s .= 'ê'; //O+`
                                break;
                            case 'Ở': $s .= 'ë'; //O+?
                                break;
                            case 'Ỡ': $s .= 'ì'; //O+~
                                break;
                            case 'Ợ': $s .= 'î'; //O+.
                                break;
                            case 'ú': $s .= 'ó'; //u'
                                break;
                            case 'ù': $s .= 'ï'; //u`
                                break;
                            case 'ủ': $s .= 'ñ'; //u?
                                break;
                            case 'ũ': $s .= 'ò'; //u~
                                break;
                            case 'ụ': $s .= 'ô'; //u.
                                break;
                            case 'Ú': $s .= 'ó'; //U'
                                break;
                            case 'Ù': $s .= 'ï'; //U`
                                break;
                            case 'Ủ': $s .= 'ñ'; //U?
                                break;
                            case 'Ũ': $s .= 'ò'; //U~
                                break;
                            case 'Ụ': $s .= 'ô'; //U.
                                break;
                            case 'ư': $s .= '­'; //u+
                                break;
                            case 'ứ': $s .= 'ø'; //u+'
                                break;
                            case 'ừ': $s .= 'õ'; //u+`
                                break;
                            case 'ử': $s .= 'ö'; //u+?
                                break;
                            case 'ữ': $s .= '÷'; //u+~
                                break;
                            case 'ự': $s .= 'ù'; //u+.
                                break;
                            case 'Ư': $s .= '¦'; //U+
                                break;
                            case 'Ứ': $s .= 'ø'; //U+'
                                break;
                            case 'Ừ': $s .= 'õ'; //U+`
                                break;
                            case 'Ử': $s .= 'ö'; //U+?
                                break;
                            case 'Ữ': $s .= '÷'; //U+~
                                break;
                            case 'Ự': $s .= 'ù'; //U+.
                                break;
                            case 'í': $s .= 'Ý'; //i'
                                break;
                            case 'ì': $s .= '×'; //i`
                                break;
                            case 'ỉ': $s .= 'Ø'; //i?
                                break;
                            case 'ĩ': $s .= 'Ü'; //i~
                                break;
                            case 'ị': $s .= 'Þ'; //i.
                                break;
                            case 'Í': $s .= 'Ý'; //I'
                                break;
                            case 'Ì': $s .= '×'; //I`
                                break;
                            case 'Ỉ': $s .= 'Ø'; //I?
                                break;
                            case 'Ĩ': $s .= 'Ü'; //I~
                                break;
                            case 'Ị': $s .= 'Þ'; //I.
                                break;
                            case 'đ': $s .= '®'; //dd
                                break;
                            case 'Đ': $s .= '§'; //DD
                                break;
                            case 'ý': $s .= 'ý'; //y'
                                break;
                            case 'ỳ': $s .= 'ú'; //y`
                                break;
                            case 'ỷ': $s .= 'û'; //y?
                                break;
                            case 'ỹ': $s .= 'ü'; //y~
                                break;
                            case 'ỵ': $s .= 'þ'; //y.
                                break;
                            case 'Ý': $s .= 'ý'; //Y'
                                break;
                            case 'Ỳ': $s .= 'ú'; //Y`
                                break;
                            case 'Ỷ': $s .= 'û'; //Y?
                                break;
                            case 'Ỹ': $s .= 'ü'; //Y~
                                break;
                            case 'Ỵ': $s .= 'þ'; //Y.
                                break;

                            default: $s .= $a[$i];
                        }
                    }
                }
                return utf8_decode($s);
            }
            */
    }

    /**
     * convert ascii to utf8
     * ex data from hrmctu
     * @access Public
     * @param str assci
     * @return str utf8
     * @author hhnam
     * @since  24-11-2012
     */
    public static function asciiToUTF8($str)
    {
        /*$str1 = str_replace("\\", "%u", $str);
        if (strlen($str) == strlen($str1))
            return $str;

        $str1 = preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str1));

        $i = 0;
        $tmp = "";
        while ($i < strlen($str1)) {
            if (substr($str1, $i, 3) == "&#x") {
                $i += 3;
                $tmp .= mb_convert_encoding('&#' . hexdec(substr($str1, $i, 4)) . ';', 'UTF-8', 'HTML-ENTITIES');
                $i += 5;
            } else {
                $tmp .= substr($str1, $i, 1);
                $i++;
            }
        }

        return $tmp;
         *
         */
        return $str;
    }

    public static function createRandomPassword($length = 6)
    {
        $chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz' .
            '123456789';

        $str = '';
        $max = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++)
            $str .= $chars[rand(0, $max)];

        return $str;
    }

    /**
     *
     * @param type $dirname duong dan toi thu muc dinh tao
     * @param type $premistion :quyen cua thuc muc do == mac dinh la co day quyen
     */
    public static function createDirectory($dirname, $premistion = 0777)
    {
        $oldmask = umask(022);
        @mkdir($dirname, $premistion, true); //tao thu muc luu file bien tap noi dung pdf
        umask($oldmask);
    }

    /**
     *
     * @param type $dirname duong dan toi thu muc dinh tao
     * @param type $premistion :quyen cua thuc muc do == mac dinh la co day quyen
     */
    public static function copyFile($pathFrom, $pathTo, $mode = 0777)
    {
        //$oldmask = umask(0);
        @chmod(dirname($pathTo), $mode);
        @copy($pathFrom, $pathTo);
        //umask($oldmask);
    }

    /**
     *
     * @param type $dir :đường dẫn tới thư mục muốn xóa
     * @return boolean
     */
    public static function deleteDirectory($dirname)
    {
        // Sanity check
        if (!file_exists($dirname)) {
            return false;
        }
        // Simple delete for a file
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }

        // Loop through the folder
        $dir = dir($dirname);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            // Recurse
            self::deleteDirectory($dirname . DIRECTORY_SEPARATOR . $entry);
        }
        // Clean up
        $dir->close();
        return @rmdir($dirname);
    }

    public static function read_number_vn($so, $no_dong = false, $no_ucfirst = false)
    {
        $am_so = "";
        if ($so > 999999999999) {
            return "";
        } elseif ($so < 0) {
            $so = 0 - $so;
            $am_so = "Âm ";
        } elseif ($so == 0) {
            return "không";
        }
        $Ty = floor($so / 1000000000); /* Tỷ  */
        $le_ty = $so % 1000000000;
        $le_trieu = $so % 1000000;
        $le_ngan = $so % 1000;
        $so -= $Ty * 1000000000;
        $Gn = floor($so / 1000000);  /* Triệu (giga) */
        $so -= $Gn * 1000000;
        $kn = floor($so / 1000);     /* Ngàn (kilo) */
        $so -= $kn * 1000;
        $Hn = floor($so / 100);      /* Trăm (hecto) */
        $so -= $Hn * 100;
        $Dn = floor($so / 10);       /* Mười (deca) */
        $n = $so % 10;

        $res = "";
        if ($Ty) {
            $res .= Util::read_number_vn($Ty) . " tỷ";
            if ($le_ty > 0) {
                //$res.=",";
            }
        }

        if ($Gn) {
            $res .= (empty($res) ? "" : " ") . Util::read_number_vn($Gn) . " triệu";
            if ($le_trieu > 0) {
                //$res.=",";
            }
        }

        if ($kn) {
            $res .= (empty($res) ? "" : " ") .
                Util::read_number_vn($kn) . " nghìn";
            if ($le_ngan > 0) {
                //$res.=",";
            }
        }

        if ($Hn) {
            $res .= (empty($res) ? "" : " ") .
                Util::read_number_vn($Hn) . " trăm";
        } elseif ($res != "" && ($Dn != 0 || $n != 0)) {
            $res .= " không trăm";
        }

        $mot = array("", "một", "hai", "ba", "bốn", "năm", "sáu",
            "bảy", "tám", "chín", "mười", "mười một", "mười hai", "mười ba",
            "mười bốn", "mười lăm", "mười sáu", "mười bảy", "mười tám",
            "mười chín");
        $hangmuoi = array("", "", "hai mươi", "ba mươi", "bốn mươi", "năm mươi", "sáu mươi", "bảy mươi", "tám mươi", "chín mươi");

        if ($Dn || $n) {
            if (!empty($res)) {
                $res .= " ";
            }

            if ($Dn == 1) {
                $res .= $mot[$Dn * 10 + $n];
            } elseif ($Dn == 0 && $res != "") {
                $res .= "linh " . $mot[$Dn * 10 + $n];
            } else {
                $res .= $hangmuoi[$Dn];

                if ($n) {
                    $res .= " " . $mot[$n];
                }
            }
        }

        if (empty($res)) {
            $res = "";
        }
        $result = $am_so . $res;
        if (__OWNER == 'ctu') {
            $result = str_replace("không mươi", "lẻ", $result);
            $result = str_replace("lẻ không", "", $result);
            $result = str_replace("mươi không", "mươi", $result);
            $result = str_replace("một mươi", "mười", $result);
            $result = str_replace("mươi năm", "mươi lăm", $result);
            $result = str_replace("mươi một", "mươi mốt", $result);
        }
        return $result;
    }

    public static function convertMoneyToStringVN($amount, $no_dong = false, $no_ucfirst = false)
    {
        return ucfirst(trim(Util::read_number_vn($amount)) . " đồng");
    }

    public static function convertSoToStringVN($amount, $no_dong = false, $no_ucfirst = false)
    {
        return ucfirst(trim(Util::read_number_vn($amount)));
    }

    /**
     *  ham tao file pdf
     * @param file_path $input
     * @param dir $output
     * @return type
     */
    function createPDF($input, $output)
    {
        $input = str_replace("\\", "/", $input);
        $fileName_Input = pathinfo($input, PATHINFO_FILENAME);
        $extFile = pathinfo($input, PATHINFO_EXTENSION);
        $output = str_replace("\\", "/", $output);
        //rename file den thu muc vua tao
        $input_Temp = $output . "/word_convert_temp." . $extFile;
        if (rename($input, $input_Temp)) {
            if (substr(php_uname(), 0, 5) == 'Linux') {
                $myCommand = __LINKTOLIBREOFFICE_FORUBUNTU . " --headless --convert-to pdf $input_Temp -outdir $output ";
            } else {
                $myCommand = __LINKTOLIBREOFFICE . " --writer --headless --convert-to pdf --outdir $output " . $input_Temp;
            }
            $escaped_command = escapeshellcmd($myCommand);
            shell_exec($escaped_command);
            if (rename($input_Temp, $input)) {
                rename($output . "/word_convert_temp." . __UPLOAD_EXT_PDF, $output . "/" . $fileName_Input . "." . __UPLOAD_EXT_PDF);
                return $output . "/" . $fileName_Input . "." . __UPLOAD_EXT_PDF;
            }
        }
        return FALSE;
    }

    /**
     * tao watermark cho file pdf
     * @param type $file_path duong dan toi file pdf chua co water mark
     * @param type $watermark_file duong dan toi file anh
     * @param type $output_file dau ra
     * @param type $to_file xuat file download neu la false ; true luu thanh file (duong dan file)
     */
    public static function watermarkPDF($file_path, $watermark_file, $output_file, $to_file = false)
    {
        require_once(__SITE_PATH . '/modules/com/pdf/fpdf.php');
        require_once(__SITE_PATH . '/modules/com/pdf/fpdi.php');
        // Created Watermark Image
        $pdf = new FPDI();
        $pagecount = $pdf->setSourceFile($file_path);

        for ($i = 1; $i <= $pagecount; $i++) {
            $pdf->addPage();
            $pdf->Image($watermark_file, 5, 50, 180, 120, 'png');
            $tplidx = $pdf->importPage($i);
            $pdf->useTemplate($tplidx);
        }

        if ($to_file) {
            $pdf->Output($output_file, 'F');
            return;
        }

        return $pdf->Output($output_file, 'D');
    }

    /**
     * ham tao cac so 0 phia truoc EX input:987 => 000987
     * @param type $aNumber :   So nhap vao
     * @param type $intPart : tong so ky tu cua so can dinh dang (cac so 0 them vao + so nhap vao)
     * @param type $intPart1 :
     * @return string
     * EX leading_zeroleft('9553',6,0) => ket qua tra ve 009553
     */
    public static function leading_zeroleft($aNumber, $intPart, $intPart1)
    {

        //list($i,$d)= split('[.]',$aNumber);
        $temp = "";
        $i = "";
        $d = "";
        $temp = explode(".", $aNumber);
        //$aNumber = isset($aNumber) ? $aNumber : 0;
        $i = $temp[0];
        $d = isset($temp[1]) ? $temp[1] : 0;
        $aNumber = $i;
        $len = strlen($aNumber);

        if ($len > 0) {

            if ($len >= $intPart)
                $formattedNumber = $aNumber;
            else {
                $formattedNumber = $aNumber;
                while ($len < $intPart) {
                    $formattedNumber = "0" . $formattedNumber;
                    $len++;
                }
            }

            $aNumber1 = $d;
            $len1 = strlen($aNumber1);
            if ($len1 >= $intPart1)
                $formattedNumber1 = $aNumber1;
            else {
                $formattedNumber1 = $aNumber1;
                while ($len1 < $intPart1) {
                    $formattedNumber1 = $formattedNumber1 . "0";
                    $len1++;
                }
            }

        }//ket thuc if xac dinh = 0
        else  $formattedNumber = "";

        if ($intPart1 == 0) {
            return $formattedNumber;
        } else
            return $formattedNumber . "." . $formattedNumber1;

    }

    /**
     * Hàm lấy ngày cuối cùng của tháng
     * @param type $month
     * @param type $year
     * @return null
     */
    function lastday($month, $year)
    {
        try {
            if ($month != '' && $year != '') {
                $result = strtotime("{$year}-{$month}-01");
                $result = strtotime('-1 second', strtotime('+1 month', $result));
                return date('d', $result);
            }
        } catch (Exception $exc) {
            return NULL;
        }
    }

    /**
     * In dữ liệu và ngắt xử lý (phục vụ debug)
     *
     * @param mixed $data
     * @param string $f hàm in dữ liệu cần dùng (print_r, var_dump, ...)
     */
    public static function dd($data, $f = 'print_r')
    {
        call_user_func($f, $data);
        exit();
    }

    /**
     * Khai bao ham get so la ma tu stt
     * @param type $so
     * @return string
     * @abstract chi tao den 20, can su dung hon thi bo sung vao dum
     * @author nchien
     */
    public static function getRomanNum($stt)
    {

        $N_don_vi = array(1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX');
        $N_chuc = array(10 => 'X', 20 => 'XX', 30 => 'XXX', 40 => 'XL', 50 => 'L', 60 => 'LX', 70 => 'LXX', 80 => 'LXXX', 90 => 'XC');
        $N_tram = array(100 => 'C', 200 => 'CC', 300 => 'CCC', 400 => 'CD', 500 => 'D', 600 => 'DC', 700 => 'DCC', 800 => 'DCCC', 900 => 'CM');
        $N_nghin = array(1000 => 'M', 2000 => 'MM', 3000 => 'MMM');


        //---tao bang so la ma chi co 4 chu so;
        if (($stt % 1000) > 0) {
            $sotram = round(($stt % 10000));
            $songan = round(($stt - $sotram) / 1000, 0) * 1000;
        } else {
            $songan = $stt;
            $sotram = 0;
        }

        if (($sotram % 100) > 0) {
            $sochuc = round($sotram % 100);
            $sotram = round(($sotram - $sochuc) / 100, 0) * 100;

        } else {
            $sochuc = 0;
        }

        if (($sochuc % 10) > 0) {

            $sodonvi = round($sochuc % 10);
            $sochuc = round(($sochuc - $sodonvi) / 10, 0) * 10;

        } else {
            $sodonvi = 0;
        }

        $str_nginh = isset($N_nghin[$songan]) ? $N_nghin[$songan] : '';
        $str_tram = isset($N_tram[$sotram]) ? $N_tram[$sotram] : '';
        $str_chuc = isset($N_chuc[$sochuc]) ? $N_chuc[$sochuc] : '';
        $str_donvi = isset($N_don_vi[$sodonvi]) ? $N_don_vi[$sodonvi] : '';

        return $str_nginh . $str_tram . $str_chuc . $str_donvi;
    }// end function getRomanNum

    public static function in_dau_cham($sodaucham)
    {

        $cham = " ";
        if ($sodaucham > 0) {
            $cham = str_repeat('. ', $sodaucham);;
        }
        return $cham;
    }

    /**
     *
     * @param string path or full path
     * @return boolean
     */
    public static function createRecursePath($path)
    {
        if (is_dir($path)) {
            return true;
        }
        if (is_file($path)) {
            $path = dirname($path);
        }
        $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
        $return = Util::createRecursePath($prev_path);
        return ($return && is_writable($prev_path)) ? @mkdir($path) : false;
    }

    /**
     * Function name        :    stripInput
     * Purpose              :    Tao chuoi //n toan, thay the ma HTML thanh ma code...
     * Create date          :    08/04/2011
     * @param string $text :    Chuoi can thay the
     * @return string       :    Tra ve chuoi da thay the
     */
    public static function toASCIIChar($text)
    {
        if (!is_array($text)) {
            $text = trim($text);
        }
        $search = array("–", "’");
        $replace = array("-", "'");

        $text = str_replace($search, $replace, $text);

        return $text;
    }

    /**
     * @param type $str
     * @return type
     * @author nchien - 15/08/2017
     * @abstract Khai bao ham thuc hien upper ky tu nguoi dung nhap vao
     */
    public static function upperString($str)
    {
        $str = str_replace("’", "'", $str);
        return mb_strtoupper($str, "UTF-8");
    }// end function upperString

    /**
     * @param type $str
     * @return type
     * @author ldhuynh - 25/12/2017
     * @abstract Khai bao ham thuc hien lower ky tu nguoi dung nhap vao
     */
    public static function lowerString($str)
    {
        $str = str_replace("’", "'", $str);
        return mb_strtolower($str, "UTF-8");
    }// end function lowerString

    /**
     * @return type
     * @author Ngô Quốc Thanh - 10/05/2018
     * @abstract Hàm lấy ngày hiện tại theo định dạng chung
     */
    public static function getDate()
    {
        return date('d' . config('constants.__FORMATDATE_SEP') . 'm' . config('constants.__FORMATDATE_SEP') . 'Y');

    }

    /**
     * @return type
     * @author Ngô Quốc Thanh - 10/05/2018
     * @abstract Hàm lấy ngày giờ hiện tại theo định dạng chung
     */
    public static function getDateTime()
    {
        //date('Y-m-d H:i:s')
        return date('Y' . config('constants.__FORMATDATE_SEP') . 'm' . config('constants.__FORMATDATE_SEP') . 'd H:i:s');

    }

    public static function callAPI($method, $url, $data)
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
//        echo $url;die;
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><br><br>";
            echo "<h3 style='text-align:center;color:green;'>DỮ LIỆU HỆ THỐNG QUÁ TẢI.</h3>";
            echo "<h4 style='text-align:center;color:green;'>Vui lòng đóng trình duyệt và đăng nhập lại.</h4><br>";
            exit;
        }
        curl_close($curl);
        return $result;
    }

    /**
     * Hàm tạo ra 1 chuỗi ngẫu nhiên
     * @param int $length (chiều dài chuỗi sẽ được tạo)
     * @param boolean $upper (đánh dấu xem chuỗi trả về có cần in hoa không)
     * @param boolean $duplicate (đánh dấu xem chuỗi trả về được phép lặp lại ký tự đã có không)
     *
     * @return string $result;
     */
    public function generateRandomCode($length = 5, $upper = true, $duplicate = false)
    {
        $characters = '1234567890abcdefghijklmnopqrstuvwxyz';
        $result = '';

        for ($i = 0; $i < $length; $i++) {
            $tmp = substr($characters, mt_rand(0, strlen($characters) - 1), 1);
            if (!$duplicate && strpos($result, $tmp)) {
                $i--;
                continue;
            }
            $result .= $tmp;
        }

        if ($upper) {
            $result = self::upperString($result);
        }

        return $result;
    }

}

