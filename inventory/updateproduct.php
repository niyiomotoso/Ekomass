<?php
include("db.php");
$proname=$_POST['proname'];
$price=$_POST['price'];
$qty=$_POST['qty']; 
$category=$_POST['category'];
$description=$_POST['description'];
$application=$_POST['application'];
$tag=$_POST['tag'];
$value=$_POST['value'];
$kwd=$_POST['kwd'];
$datasheet=$_POST['datasheet'];
$formerpic=$_POST['formerpic'];
$ind=$_POST['ind'];


 
$imagename=$_FILES["myimage"]["name"]; 
//Insert the image name and image content in image_table

if($_POST)
{
// $_FILES["file"]["error"] is HTTP File Upload variables $_FILES["file"] "file" is the name of input field you have in form tag.

if ($_FILES["myimage"]["error"] > 0)
{
// if there is error in file uploading
$insert_image="UPDATE  inventory SET item='$proname', price='$price', qtyleft='$qty',description='$description',category='$category', application='".$application."', datasheet='".$datasheet."', value='".$value."', kwd='$kwd' WHERE ind ='$ind' ";
if(query($insert_image))
echo "done";
}
else
{


$fileData = pathinfo(basename($_FILES["myimage"]["name"]));
$fileName = uniqid() . '.' . $fileData['extension'];
$filepath = ('images/' .$fileName);
while(file_exists($filepath))
{
    $fileName = uniqid() . '.' . $fileData['extension'];
    $filepath = ('images/'.$fileName);
}
  //move_uploaded_file function will upload your image.  if you want to resize image before uploading see this link http://b2atutorials.blogspot.com/2013/06/how-to-upload-and-resize-image-for.html
if(move_uploaded_file($_FILES["myimage"]["tmp_name"], $filepath))
{
// If file has uploaded successfully, store its name in data base

	unlink($formerpic);
	smart_resize_image($filepath,
                              $string             = null,
                              $width              = 500, 
                              $height             = 500, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
                              $quality            = 100,
                              $grayscale          = false
  	);
  	//exit();
	$insert_image="UPDATE  inventory SET item='$proname', price='$price', qtyleft='$qty',description='$description',category='$category',imagename='$filepath', application='".$application."', datasheet='".$datasheet."', value='".$value."', kwd='$kwd' WHERE ind ='$ind' ";


if(query($insert_image))

{
echo "Stored in: " . "images/" . $_FILES["myimage"]["name"];
}
else
{
echo 'File name not stored in database';
}
}


}
}


function smart_resize_image($file,
                              $string             = null,
                              $width            , 
                              $height            , 
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

//mysql_query("INSERT INTO inventory () VALUES (')");
//header("location: tableedit.php#page=addpro");
?>