<?php
if (isset (__('images') [0]) && isset (__('images') [1])) {
 $imgs   = __('images') [0];
 $thumbs = __('images') [1];

if (is_array ($imgs)) {
 $slide = $images = '';
 echo ('<div class="imageslider" id="imageslider">');

 foreach ($imgs ['names'] as $key => $name) {
  $images .= _tag ('img', [
   'src'    => $imgs ['url'] . '/' . $name,
   'width'  => ImageInfoClass::imagewidth ($imgs ['path'].$name),
   'height' => ImageInfoClass::imageheight ($imgs ['path'].$name)
  ]) . '<br />';}

 foreach ($thumbs ['names'] as $key => $name) {
  $thmbs .= _tag ('img', [
   'src'    => $thumbs ['url'] . '/' . $name,
   'width'  => ImageInfoClass::imagewidth  ($thumbs ['path'] . $name),
   'height' => ImageInfoClass::imageheight ($thumbs ['path'] . $name)
  ]) . '<br />';}

 echo ('</div>');
?>
<div id="images">
 <?= $images?>
</div>
<div id="thumbnails">
<?php
 echo $thmbs;
 unset ($slide, $images, $imgs, $thumbs, $thmbs);}}
 die ();
?>
</div>
