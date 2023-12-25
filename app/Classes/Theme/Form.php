<?php


namespace App\Classes\Theme;


class Form
{
    public static function getHTML($id, $data, $id_col = NULL, $col_title = NULL, $custom_col = false, $edit_col = '', $delete_col = '', $select_col = false, $col_width = NULL, $hide_cols = NULL, $col_option = NULL, $offset = 0, $post_val = NULL, $no_data_msg = NULL, $stt_col = true)
    {
        $list = '<table class="table table-bordered table-hover table-checkable" id="' . $id . '">';
        $route_name = $id . '.' . $edit_col;
        $index = 0;

        if (!empty($data)) {
            foreach ($data as $k => $v) {
                if ($index == 0) {
                    //tao header
                    $list .= '<thead><tr>';

                    if ($stt_col) {
                        $list .= "<th class='text-center w-50px'>".__('stt')."</th>";
                    }

                    foreach ($v->getOriginal() as $lk => $lv) {
                        if (isset($hide_cols[$lk])) {
                            continue;
                        }

                        $title = __($lk);
                        if (!$title) {
                            $title = "&nbsp;";
                        } else {
                            $title = $title;
                        }

                        if ($col_width && isset($col_width[$lk])) {
                            $list .= "<th class='text-center w-".$col_width[$lk]."'>".$title."</th>";
                        }else{
                            $list .= "<th class='text-center'>".$title."</th>";
                        }
                    }

                    if (($edit_col != '') || ($delete_col != '')) {
                        $list .= "<th class='text-center w-100px'>".__('thaotac')."</th>";
                    }

                    $list .= "</tr></thead>";
                }

                //them dong
                $col = 0;
                $list .= '<tbody><tr>';
                $row = Array();
                if($stt_col){
                    $list .= "<td class='text-center font-weight-bold'>".($offset + $index + 1)."</td>";//stt
                    $col++;
                }
                $lastColValue = '';
                $idCol = [];

                foreach ($v->getOriginal() as $lk => $lv) {

                    if (is_array($id_col) && in_array($lk, $id_col)) {
                        $idCol = [$lk => $lv];
                    }

                    if (isset($hide_cols[$lk])) {
                        continue;
                    }
                    $class = '';
                    $span = '';
                    $options = '';
                    if(isset($col_option[$lk])){
                        if ($col_option[$lk] == 'num' && is_numeric($lv)) {
                            $class .= ' text-right';
                        }

                        if ($col_option[$lk]  == 'date') {
                            if (!is_null($lv)) {
                                @$lv = date('d-m-Y', $lv);
                            } else {
                                $lv = "";
                            }
                        }

                        if ($col_option[$lk]  == 'datetime') {
                            if (!is_null($lv)) {
                                @$lv = date('d-m-Y H:i', $lv);
                            } else {
                                $lv = "";
                            }
                        }

                        if ($col_option[$lk] == 'status') {
                            if(!is_null($lv)){
                                if($lv == 0){
                                    $class .= 'label label-lg font-weight-bold label-light-danger label-inline';
                                    $lv = 'Không';
                                    $span = '<span class="'.$class.'">'.$lv.'</span>';
                                }
                                if($lv == 1){
                                    $class .= 'label label-lg font-weight-bold label-light-success label-inline';
                                    $lv = 'Sử dụng';
                                    $span = '<span class="'.$class.'">'.$lv.'</span>';
                                }
                            }else{
                                $lv = "";
                            }
                        }
                    }
                    if($span != ''){
                        $list .= "<td>".$span."</td>";
                    }else{
                        $list .= "<td class='".$class."'>".$lv."</td>";
                    }

                    $col++;
                }
//                if (isset($row[$col - 1])) {
//                    $row[$col - 1]['html'] .= UIHelper::Hidden('h_' . $name . '[]', 'h_' . $name . '_' . $index, $lastColValue);
//                    $row[$col - 1]['class'] .= ' ' . $name . '_row ';
//                }
//                if (is_bool($custom_col)) {
//                    if ($custom_col) {
//                        $row[$col] = Array('html' => UIHelper::Image('img_detail_' . $name . '_' . $index, 'img_detail_' . $name . '_' . $index, __HOST_NAME . __TEMPLATE . 'images/icondetail.png', 'Chi tiết', "onclick='goToDetailList(\"$name\",$index)'"), 'class' => 'center pointer');
//                        $col++;
//                    }
//                } else if (is_array($custom_col)) {
//                    foreach ($custom_col as $cck => $ccv) {
//                        if (isset($ccv['detail'])) {
//                            if (isset($ccv['show']) && $ccv['show'] !== true)
//                                continue;
//                            $row[$col] = Array('html' => UIHelper::Image('img_detail_' . $name . '_' . $index, 'img_detail_' . $name . '_' . $index, __HOST_NAME . __TEMPLATE . 'images/icondetail.png', 'Chi tiết', "onclick='goToDetailList(\"$name\",$index)'"), 'class' => 'center pointer');
//                            $col++;
//                        } else {
//                            if (isset($ccv['show']) && $ccv['show'] !== true)
//                                continue;
//                            $r = Array();
//
//                            if (isset($ccv['options'])) {
//                                $ccv['options'] = str_replace('#i', $index, $ccv['options']);
//                            }
//                            if (isset($ccv['db'])) {
//                                $rname = $name . '_' . $ccv['name'];
//                                $rid = $name . '_' . $ccv['name'] . '_' . $index;
//                            } else {
//                                $rname = $ccv['input_type'] . '_' . $name . '_' . $ccv['name'];
//                                $rid = $ccv['input_type'] . '_' . $name . '_' . $ccv['name'] . '_' . $index;
//                            }
//                            //if ($ccv['input_type'] != 'img') $rname .= '[]';
//
//                            $hname = 'h_' . $name . '_' . $ccv['name'] . '[]';
//                            $hid = 'h_' . $name . '_' . $ccv['name'] . '_' . $index;
//
//                            //tao tabname phim enter
//                            if (!isset($ccv['options'])) {
//                                $ccv['options'] = Array();
//                            }
//
//                            if (!isset($ccv['next_column'])) {
//                                if (is_array($ccv['options'])) {
//                                    $ccv['options']['tabname'] = $ccv['name'] . '_' . $name;
//                                } else {
//                                    $ccv['options'] .= 'tabname="' . $ccv['name'] . '_' . $name . '" ';
//                                }
//                            } else {
//                                if (is_array($ccv['options'])) {
//                                    $ccv['options']['tabname'] = $name;
//                                } else {
//                                    $ccv['options'] .= 'tabname="' . $name . '" ';
//                                }
//                            }
//
//                            if (isset($v['disable_' . $ccv['name']]) && $v['disable_' . $ccv['name']] == true) {
//                                $r['html'] = '&nbsp;';
//                                $r['html'] .= UIHelper::Hidden($rname, NULL, '');
//                            } else {
//                                $val = isset($v['value_' . $ccv['name']]) ? $v['value_' . $ccv['name']] : @$ccv['value'];
//                                if (!is_null($val1 = self::getPOST($name, $rname, $lastColValue, $post_val))) {
//                                    $val = $val1;
//                                }
//                                switch ($ccv['input_type']) {
//                                    case 'txt':
//                                        if (isset($ccv['db'])) {
//                                            $input = new CInput($DBHelper->getDbInfo($ccv['db'])->getAlias(), $ccv['db'],
//                                                $rname . '[]', $rid, NULL, '', @$ccv['options'], Array('txt'), true, NULL, isset($ccv['int_group']) ? $ccv['int_group'] : true);
//                                            $input->setFixValue($val);
//
//                                            $r['html'] = $input->getHTML();
//                                        } else {
//
//                                            $r['html'] = UIHelper::TextBox($rname . '[]', $rid, $val, isset($ccv['maxlength']) ? $ccv['maxlength'] : NULL, @$ccv['options']);
//                                            $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        }
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'date':
//                                        if (isset($ccv['db'])) {
//                                            // print_r($ccv['options']['class']);
//                                            $class_date = isset($ccv['options']['class']) ? $ccv['options']['class'] : 'date';
//                                            $ccv['options']['class'] = $class_date;
//
//                                            $input = new CInput($DBHelper->getDbInfo($ccv['db'])->getAlias(), $ccv['db'],
//                                                $rname . '[]', $rid, NULL, '', @$ccv['options'], Array('txt'), true, NULL, isset($ccv['int_group']) ? $ccv['int_group'] : true);
//                                            $input->setFixValue($val);
//
//                                            $r['html'] = $input->getHTML();
//                                        } else {
//                                            $class_date = isset($ccv['options']['class']) ? $ccv['options']['class'] : 'date';
//                                            $ccv['options']['class'] = $class_date;
//                                            $r['html'] = UIHelper::TextBox($rname . '[]', $rid, $val, isset($ccv['maxlength']) ? $ccv['maxlength'] : NULL, @$ccv['options']);
//                                            $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        }
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'datetime':
//                                        if (isset($ccv['db'])) {
//                                            $input = new CInput($DBHelper->getDbInfo($ccv['db'])->getAlias(), $ccv['db'],
//                                                $rname . '[]', $rid, NULL, '', @$ccv['options'], Array('txt'), true, NULL, isset($ccv['int_group']) ? $ccv['int_group'] : true);
//                                            $input->setFixValue($val);
//
//                                            $r['html'] = $input->getHTML();
//                                        } else {
//
//                                            $r['html'] = UIHelper::TextBox($rname . '[]', $rid, $val, isset($ccv['maxlength']) ? $ccv['maxlength'] : NULL, Array("class" => 'datetime'));
//                                            $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        }
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'cmb':
//                                        $r['html'] = UIHelper::ComboBox($rname . '[]', $rid, @$ccv['data'], $val, @$ccv['options']);
//                                        $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'cmba':
//                                        $r['html'] = UIHelper::ComboBoxSelectAll($rname . '[]', $rid, @$ccv['data'], $val, @$ccv['options']);
//                                        $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'rd':
//                                        $r['html'] = UIHelper::RadioBox($rname . '[]', Array(Array('id' => $rid, 'value' => NULL, 'options' => @$ccv['options'], 'text' => '')), $val, @$ccv['sep']);
//                                        $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        if (!isset($ccv['no_check_all']))
//                                            $chkACol[$col] = $rname;
//                                        break;
//                                    case 'chk':
//                                        $r['html'] = UIHelper::CheckBox($rname . '[]', Array(Array('name' => $rname, 'id' => $rid, 'checked' => $val, 'text' => '', 'value' => $val, 'options' => @$ccv['options'])), @$ccv['sep']);
//                                        $r['html'] .= UIHelper::Hidden($hname, $hid, $val);
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        if (!isset($ccv['no_check_all']))
//                                            $chkACol[$col] = $rname;
//                                        break;
//                                    case 'img':
//                                        $r['html'] = UIHelper::Image($rname, $rid, @$ccv['data'], @$ccv['value'], @$ccv['options']);
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'lb':
//                                        $r['html'] = UIHelper::Label($rname . '[]', $rid, $val);
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                    case 'html':
//                                        $r['html'] = $ccv['data'];
//                                        $r['class'] = 'center';
//                                        if (isset($ccv['col_options'])) {
//                                            $r = array_merge($r, $ccv['col_options']);
//                                        }
//                                        break;
//                                }
//                            }
//
//                            $row[$col] = $r;
//                            $col++;
//                        }
//                    }
//                }
                    if (($edit_col != '') || ($delete_col != '')) {
                        $list .= '<td><table><tr>';
                        if ($edit_col) {
                            $list .= '<td class="border-0 pt-0 pb-0">';
                            if(!empty($idCol)){
                                $list .= '<a href="' . route($route_name, $idCol) . '" class="btn btn-sm btn-clean btn-icon" title="Cập nhật">
                                        <i class="la la-edit"></i></a>';
                            }
                            $list .= '</td>';
                        }

                        if ($delete_col) {
                            $list .= '<td class="border-0 pt-0 pb-0 pl-3">';
                            if(!empty($idCol)){
                                $list .= '<form id="'.$id.'_del_'.$index.'" method="post" onclick="return confirm(\'Are you sure?\');" class="pull-left"
                                            action="'.route($route_name, $idCol).'">';
                                $list .= csrf_field();
                                $list .= '<input type="hidden" name="_method" value="DELETE"/>';
                                $list .= '<a id="delete" class="btn btn-sm btn-clean btn-icon" title="Xóa"><i class="la la-trash"></i></a>';
                            }
                            $list .= '</form></td>';
                        }
                        $list .= '</tr></table></td>';
                        $col++;
                    }
//                if ($select_col) {
//                    $row[$col] = Array('html' => UIHelper::CheckBox('chk_' . $name . '_all', Array(Array('id' => 'chk_' . $name . '_all_' . $index, 'text' => ''))), 'class' => 'center');
//                    $col++;
//                }
//                $list->addRow($row);

                $index++;
            }
        }



        $list .= '</tr></tbody></table>';
        return $list;

    }
}
