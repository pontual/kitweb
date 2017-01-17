<?php

function generateRows($target, $labelNamesArray) {
  $out = "";
  foreach ($labelNamesArray as $label => $name) {
    $out .= "<tr><td>$label</td><td><input name='$name' size='60'></td></tr>\n";
  }
  return $out;  
}

function generateForm($target, $labelNamesArray) {
  $out = "<form action='$target' method='POST'>";
  $out .= "<table>\n";
  foreach ($labelNamesArray as $label => $name) {
    $out .= "<tr><td>$label</td><td><input name='$name' size='60'></td></tr>\n";
  }

  $out .= "<tr><td>&nbsp;</td><td><input type='submit'></td></tr>\n";
  $out .= "</table>";
  $out .= "</form>";
  return $out;  
}

function generateEditForm($target, $multipart, $labelValuesArray, $hiddenValues) {
  if ($multipart) {
    $out = "<form action='$target' method='POST' enctype='multipart/form-data'>";
  } else {
    $out = "<form action='$target' method='POST'>";
  }

  // output hidden values
  foreach ($hiddenValues as $name => $value) {
    $out .= "<input type='hidden' name='$name' value='$value'>";
  }
  
  $out .= "<table>\n";
  foreach ($labelValuesArray as $label => $values) {
    if ($label === "fileLink") {
      $out .= "<tr><td>{$values['name']}</td><td><input type='file' name='{$values['value']}'></td></tr>";
    } else {
      $out .= "<tr><td>$label</td><td><input name='{$values['name']}' value='{$values['value']}' size='60'></td></tr>\n";
    }
  }

  $out .= "<tr><td>&nbsp;</td><td><input type='submit'></td></tr>\n";
  $out .= "</table>";
  $out .= "</form>";
  return $out;
}

function printPairRow($label, $value) {
  print("
<tr>
  <td>$label</td>
  <td>$value</td>
</tr>");
}

function printListItem($tableName, $id, $label, $value) {
  print("
<tr>
  <td><a href='{$tableName}_edit_form.php?id=$id'>Editar</a></td>
  <td>$label</td>
  <td>$value</td>
  <td><a href='{$tableName}_delete_confirm.php?id=$id''>Excluir</a></td>
</tr>");
}


// Smart Resize Image for thumbnails
// https://github.com/Nimrod007/PHP_image_resize/blob/master/smart_resize_image.function.php

// Copyright © 2008 Maxim Chernyak

// Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the Software), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

// The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED AS IS, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

/**
 * easy image resize function
 * @param  $file - file name to resize
 * @param  $string - The image data, as a string
 * @param  $width - new image width
 * @param  $height - new image height
 * @param  $proportional - keep image proportional, default is no
 * @param  $output - name of the new file (include path if needed)
 * @param  $delete_original - if true the original image will be deleted
 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
 * @param  $quality - enter 1-100 (100 is best quality) default is 100
 * @param  $grayscale - if true, image will be grayscale (default is false)
 * @return boolean|resource
 */
function smart_resize_image($file,
                            $string             = null,
                            $width              = 0, 
                            $height             = 0, 
                            $proportional       = false, 
                            $output             = 'file', 
                            $delete_original    = true, 
                            $use_linux_commands = false,
                            $quality            = 100,
                            $grayscale          = false
) {
  
  if ( $height <= 0 && $width <= 0 ) return false;
  if ( $file === null && $string === null ) return false;

  # Setting defaults and meta
  $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
  $image                        = '';
  $final_width                  = 0;
  $final_height                 = 0;
  list($width_old, $height_old) = $info;
  $cropHeight = $cropWidth = 0;

  # Calculating proportionality
  if ($proportional) {
    if      ($width  == 0)  $factor = $height/$height_old;
    elseif  ($height == 0)  $factor = $width/$width_old;
    else                    $factor = min( $width / $width_old, $height / $height_old );

    $final_width  = round( $width_old * $factor );
    $final_height = round( $height_old * $factor );
  }
  else {
    $final_width = ( $width <= 0 ) ? $width_old : $width;
    $final_height = ( $height <= 0 ) ? $height_old : $height;
	$widthX = $width_old / $width;
	$heightX = $height_old / $height;
	
	$x = min($widthX, $heightX);
	$cropWidth = ($width_old - $width * $x) / 2;
	$cropHeight = ($height_old - $height * $x) / 2;
  }

  # Loading image to memory according to type
  switch ( $info[2] ) {
    case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
    case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
    case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
    default: return false;
  }
  
  # Making the image grayscale, if needed
  if ($grayscale) {
    imagefilter($image, IMG_FILTER_GRAYSCALE);
  }    
  
  # This is the resizing/resampling/transparency-preserving magic
  $image_resized = imagecreatetruecolor( $final_width, $final_height );
  if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
    $transparency = imagecolortransparent($image);
    $palletsize = imagecolorstotal($image);

    if ($transparency >= 0 && $transparency < $palletsize) {
      $transparent_color  = imagecolorsforindex($image, $transparency);
      $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
      imagefill($image_resized, 0, 0, $transparency);
      imagecolortransparent($image_resized, $transparency);
    }
    elseif ($info[2] == IMAGETYPE_PNG) {
      imagealphablending($image_resized, false);
      $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
      imagefill($image_resized, 0, 0, $color);
      imagesavealpha($image_resized, true);
    }
  }
  imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
  
  
  # Taking care of original, if needed
  if ( $delete_original ) {
    if ( $use_linux_commands ) exec('rm '.$file);
    else @unlink($file);
  }

  # Preparing a method of providing result
  switch ( strtolower($output) ) {
    case 'browser':
      $mime = image_type_to_mime_type($info[2]);
      header("Content-type: $mime");
      $output = NULL;
      break;
    case 'file':
      $output = $file;
      break;
    case 'return':
      return $image_resized;
      break;
    default:
      break;
  }
  
  # Writing image according to type to the output destination and image quality
  switch ( $info[2] ) {
    case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
    case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
    case IMAGETYPE_PNG:
      $quality = 9 - (int)((0.9*$quality)/10.0);
      imagepng($image_resized, $output, $quality);
      break;
    default: return false;
  }

  return true;
}

// http://stackoverflow.com/questions/3371697/replacing-accented-characters-php

function normalizeChars($s) {
    $replace = array(
        'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
        'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
        'Þ'=>'B',
        'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
        'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
        'Ğ'=>'G',
        'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
        'Ł'=>'L',
        'Ñ'=>'N', 'Ń'=>'N',
        'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
        'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
        'Ț'=>'T',
        'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
        'Ý'=>'Y',
        'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
        'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
        'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
        'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
        'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'D', 'ð'=>'d',
        'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
        'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
        'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
        'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
        'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
        'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
        'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
        'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
        'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
        'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
        'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
        'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
        'ק'=>'q',
        'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
        'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
        'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
        'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
        'в'=>'v', 'ו'=>'v', 'В'=>'v',
        'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
        'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
        'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
    );
    return strtolower(strtr($s, $replace));
}

?>
