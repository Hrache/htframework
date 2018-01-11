<?php
die (print_r (__('request')->getPosts(), true));

lib_load ('validation');
$page     = __('page');
$database = __('database');
$request  = __('request');
$account  = __('account');

function gs_r ($index): string {
	return (string) (__('session')->getCookie ($index));
}

// required fields
if (!($this->required instanceof ArrayClass))	{
	$this->required = new ArrayClass();}

$ar = new ArrayClass ([
 AcsAdvertisementsJsonModel::buyorsell,
 AcsAdvertisementsJsonModel::advtype,
 AcsAdvertisementsJsonModel::vehicletype,
 AcsAdvertisementsJsonModel::measure,
 AcsAdvertisementsJsonModel::currency,
 AcsAdvertisementsJsonModel::distance,
 AcsAdvertisementsJsonModel::carbrand,
 AcsAdvertisementsJsonModel::carmodel,
 AcsAdvertisementsJsonModel::carmodelman,
 AcsAdvertisementsJsonModel::carcondition,
 AcsAdvertisementsJsonModel::carprice,
 AcsAdvertisementsJsonModel::bodytype,
 AcsAdvertisementsJsonModel::releaseyear,
 AcsAdvertisementsJsonModel::country,
 AcsAdvertisementsJsonModel::state,
 AcsAdvertisementsJsonModel::cityorprovince,
 AcsAdvertisementsJsonModel::mainaddress,]);

while (!$ar->isEmpty()) {
 $item = $ar->pull();
 $this->required->add ($item->value, gs_r ($item->value) ?? post_ ($item->value));} unset ($ar);

$this->required->add (AcsAdvertisementsJsonModel::accountid, $account->id);
dump ($this->required);
$this->errors = AcsAdvertisementsJsonModel::validate (AcsAdvertisementsJsonModel::rules, $this->required);

// TODO: validation for the database content comparison

// additional.not-required.images
if (boolval (get_ ('images'))) {
 lib_import ('uploads', 'image');
 $newFoldername = UploadsClass::uniqueName ($account->name);
 @mkdir (Img_uploads . $newFoldername);
 $uploads = new UploadsClass ($request->getFiles() ['images'], new UploadsSettingsClass (7, 60000, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP, IMAGETYPE_GIF, IMAGETYPE_WBMP]), Img_uploads . $newFoldername);
 $request->setFiles();
 $uploads->setWebPath (ImgURL . $newFoldername);
 $imageTools = new ImageToolsClass ($uploads->getSavePath());
 $imageTools->multipleResize (800, 0, 70, true);
 $imageTools->multipleConvert (IMAGETYPE_JPEG);

 foreach ($temp ['names'] as $ind => $name) {
  $currentFilepath = $temp ['path'] . $name;

  if ($uploads->getSettings()->getMaxFileSize() < FileInfoClass::filesize ($currentFilepath)) {
   unlink ($currentFilepath);
   unset ($temp ['names'][$ind]);}}

 $newFoldername = UploadsClass::uniqueName ($account->name . '_thumbnails');
 @mkdir ($uploads->getSavePath() . $newFoldername);
 $imageTools = new ImageToolsClass ($uploads->getSavePath(), $uploads->getSavePath() . $newFoldername . ds);
 $imageTools->multipleResize (160, 0, 50, false);
 $this->additional->add ('images');
 $this->additional->add (['images', 0], pathAndURL ($uploads->getSavePath(), $uploads->getWebPath()));
 $this->additional->add (['images', 1], pathAndURL ($uploads->getSavePath() . $newFoldername . ds, $uploads->getWebPath() . '/' . $newFoldername));
 unset ($imageTools, $newFoldername, $uploads);
 __('images', $this->additional->item ('images'));
 unset ($newFoldername);}

$this->additional->add ('datecreated', __('session')->getCookie ('required')->item ('datecreated') ?? date ('Y-m-d H:i:s'));

// additional.not-required.text
$keys_additional = new ArrayClass ([
 'datecreated', 'description', 'altaddress', 'countryorigin', 'countryassembly', 'fueltype_',
 'enginesize', 'aspirationtype_', 'topspeed', 'topspeed_', 'acceleration', 'acceleration_',
 'power', 'power_', 'transmission_type', 'transmissiongears', 'tirewheelsize', 'drivetype',
 'city_consumption', 'consumption_city', 'highway_consumption', 'consumption_highway', 'combined_consumption',
 'consumption_combined', 'displacement', 'displacement_', 'co2emissions', 'curbweight', 'weight_', 'towingcapacity',
 'capacity_towing', 'cargoallseatsfolded', 'width', 'width_', 'height', 'height_', 'length', 'length_',
 'audio_totalnumberofspeakers', 'seatingscapacity', 'doors_',
 'headairbags', 'hipairbags', 'passengerairbagdeactivation', 'sideairbags', 'trunkspace',
 'sidecurtainairbagrolloversensor', 'postcollisionsafetysystem', 'tirepressuremonitoringsystem',
 'bluetooth', 'audio_cdmp3playback', 'audio_cdplayer', 'audio_auxaudioinputs', 'audio_usbinputs',
 'audio_digitalaudioinput', 'audio_radio', 'audio_usbconnection', 'driverseat_heightadjustable',
 'sunshade', 'cargonettrunkrear', 'allweatherfloormats', 'cargonetside2nets', 'cargotray', 'leathershiftknob',
 'tweeterkit', 'metalpedalpadsetatsti', 'autodimmingmirrorwcompass', 'autodimmingmirrorwcompassandhomelink',
 'audiocontrolsonsteeringwheel', 'cruisecontrolsonsteeringwheel', 'phonecontrolsonsteeringwheel',
 'steeringwheeladjustments', 'transmissioncontrolsonsteeringwheel', 'numberofpassengerseatmanualadjustments',
 'adjustableseatheadrest', 'seatwhiplashprotection', 'adjustable2ndrowheadrests', 'folding2ndrow', '_2ndrowcenterarmrest',
 '_1strowupholstery', 'cupholderslocation', '_2ndrowcenterseatbelt', 'doorpocketslocation', 'powerwindows',
 'externaltemperaturegauge', 'tachometer', 'clock', 'tirepressuremonitoringsystem', 'tripcomputer', 'airfiltration',
 'frontairconditioning', 'frontairconditioningzones', 'poweroutlets', 'centerconsole', 'overheadconsole', 'seatbackstorage',
 'intermittentfrontwipers', 'onetouchwindows', 'daytimerunninglights', 'headlightsautodelay', 'headlightsdusksensor',
 '_1strowvanitymirrors', 'exteriormirroradjustment', 'antilockbrakingsystem', 'brakingassist', 'frontstabilizerbar',
 'frontsuspensionclassification', 'independentsuspension', 'rearstabilizerbar', 'rearsuspensionclassification',
 'tailpipecover', 'wheellockkitsteelwheels', 'rearbumperapplique', 'splashguards', 'autodimmingmirrorwapproachlighting',
 'bodysidemolding', 'bodysidemoldingkit', 'foglampkitlegacy', 'cargotiedowns', 'remoteenginestarterkeystart',]);

while (!$keys_additional->isEmpty()) {
 $key = $keys_additional->pull();
 $this->additional->add ($key, __('session')->getCookie ('required')->item ($key) ?? gs_r ($key));}

$insert = new ArrayClass();
$insert->append ($this->required->inputArray(), ['additional' => $this->additional->json()]);
unset ($this->require);

__('session')->setCookie ('required', $this->required);
__('session')->setCookie ('additional', $this->additional);
__('session')->setCookie ('errors', $this->errors);

dump (get_defined_vars());
