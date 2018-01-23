<?php
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

do {
 $item = $ar->pull();
 $this->required->add ($item->value, gs_r ($item->value) ?? post_ ($item->value));}
while (!$ar->isEmpty()); unset ($ar);

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

do {
 $key = $keys_additional->pull();
 $this->additional->add ($key, __('session')->getCookie ('required')->item ($key) ?? gs_r ($key));}
while (!$keys_additional->isEmpty());

$insert = new ArrayClass();
$insert->append ($this->required->inputArray(), ['additional' => $this->additional->json()]);
unset ($this->require);

/*
$this->additional = new ArrayClass ([
 'description'                 => gs_a ('description') ?? post_ ( 'description'),
 'altaddress'                  => gs_a ('altaddress') ?? post_ ( 'altaddress'),
 'countryorigin'               => gs_a ('countryorigin') ?? post_ ( 'countryorigin'),
 'countryassembly'             => gs_a ('countryassembly') ?? post_ ( 'countryassembly'),
 'fueltype_'                   => gs_a ('fueltype_') ?? post_ ( 'fueltype_'),
 'enginesize'                  => gs_a ('enginesize') ?? post_ ( 'enginesize'),
 'aspirationtype_'             => gs_a ('aspirationtype_') ?? post_ ( 'aspirationtype_'),
 'topspeed'                    => gs_a ('topspeed') ?? post_ ( 'topspeed'),
 'topspeed_'                   => gs_a ('topspeed_') ?? post_ ( 'topspeed_'),
 'acceleration'                => gs_a ('acceleration') ?? post_ ( 'acceleration'),
 'acceleration_'               => gs_a ('acceleration_') ?? post_ ( 'acceleration_'),
 'power'                       => gs_a ('power') ?? post_ ( 'power'),
 'power_'                      => gs_a ('power_') ?? post_ ( 'power_'),
 'transmission_type'           => gs_a ('transmission_type') ?? post_ ( 'transmission_type'),
 'transmissiongears'           => gs_a ('transmissiongears') ?? post_ ( 'transmissiongears'),
 'tirewheelsize'               => gs_a ('tirewheelsize') ?? post_ ( 'tirewheelsize'),
 'drivetype'                   => gs_a ('drivetype') ?? post_ ( 'drivetype'),
 'city_consumption'            => gs_a ('city_consumption') ?? post_ ( 'city_consumption'),
 'consumption_city'            => gs_a ('consumption_city') ?? post_ ( 'consumption_city'),
 'highway_consumption'         => gs_a ('highway_consumption') ?? post_ ( 'highway_consumption'),
 'consumption_highway'         => gs_a ('consumption_highway') ?? post_ ( 'consumption_highway'),
 'combined_consumption'        => gs_a ('combined_consumption') ?? post_ ( 'combined_consumption'),
 'consumption_combined'        => gs_a ('consumption_combined') ?? post_ ( 'consumption_combined'),
 'displacement'                => gs_a ('displacement') ?? post_ ( 'displacement'),
 'displacement_'               => gs_a ('displacement_') ?? post_ ( 'displacement_'),
 'co2emissions'                => gs_a ('co2emissions') ?? post_ ( 'co2emissions'),
 'curbweight'                  => gs_a ('curbweight') ?? post_ ( 'curbweight'),
 'weight_'                     => gs_a ('weight_') ?? post_ ( 'weight_'),
 'towingcapacity'              => gs_a ('towingcapacity') ?? post_ ( 'towingcapacity'),
 'capacity_towing'             => gs_a ('capacity_towing') ?? post_ ( 'capacity_towing'),
 'cargoallseatsfolded'         => gs_a ('cargoallseatsfolded') ?? post_ ( 'cargoallseatsfolded'),
 'width'                       => gs_a ('width') ?? post_ ( 'width'),
 'width_'                      => gs_a ('width_') ?? post_ ( 'width_'),
 'height'                      => gs_a ('height') ?? post_ ( 'height'),
 'height_'                     => gs_a ('height_') ?? post_ ( 'height_'),
 'length'                      => gs_a ('length') ?? post_ ( 'length'),
 'length_'                     => gs_a ('length_') ?? post_ ( 'length_'),
 'audio_totalnumberofspeakers' => gs_a ('audio_totalnumberofspeakers') ?? post_ ( 'audio_totalnumberofspeakers'),
 'seatingscapacity'            => gs_a ('seatingscapacity') ?? post_ ( 'seatingscapacity'),
 'doors_'                      => gs_a ('doors_') ?? post_ ( 'doors_')
]);*/

/*
// checkboxes
$this->additional->append ([
 'headairbags'                            => gs_a ('headairbags') ?? post_ ( 'headairbags'),
 'hipairbags'                             => gs_a ('hipairbags') ?? post_ ( 'hipairbags'),
 'passengerairbagdeactivation'            => gs_a ('passengerairbagdeactivation') ?? post_ ( 'passengerairbagdeactivation'),
 'sideairbags'                            => gs_a ('sideairbags') ?? post_ ( 'sideairbags'),
 'trunkspace'                             => gs_a ('trunkspace') ?? post_ ( 'trunkspace'),
 'sidecurtainairbagrolloversensor'        => gs_a ('sidecurtainairbagrolloversensor') ?? post_ ( 'sidecurtainairbagrolloversensor'),
 'postcollisionsafetysystem'              => gs_a ('postcollisionsafetysystem') ?? post_ ( 'postcollisionsafetysystem'),
 'tirepressuremonitoringsystem'           => gs_a ('tirepressuremonitoringsystem') ?? post_ ( 'tirepressuremonitoringsystem'),
 'bluetooth'                              => gs_a ('bluetooth') ?? post_ ( 'bluetooth'),
 'audio_cdmp3playback'                    => gs_a ('audio_cdmp3playback') ?? post_ ( 'audio_cdmp3playback'),
 'audio_cdplayer'                         => gs_a ('audio_cdplayer') ?? post_ ( 'audio_cdplayer'),
 'audio_auxaudioinputs'                   => gs_a ('audio_auxaudioinputs') ?? post_ ( 'audio_auxaudioinputs'),
 'audio_usbinputs'                        => gs_a ('audio_usbinputs') ?? post_ ( 'audio_usbinputs'),
 'audio_digitalaudioinput'                => gs_a ('audio_digitalaudioinput') ?? post_ ( 'audio_digitalaudioinput'),
 'audio_radio'                            => gs_a ('audio_radio') ?? post_ ( 'audio_radio'),
 'audio_usbconnection'                    => gs_a ('audio_usbconnection') ?? post_ ( 'audio_usbconnection'),
 'driverseat_heightadjustable'            => gs_a ('driverseat_heightadjustable') ?? post_ ( 'driverseat_heightadjustable'),
 'sunshade'                               => gs_a ('sunshade') ?? post_ ( 'sunshade'),
 'cargonettrunkrear'                      => gs_a ('cargonettrunkrear') ?? post_ ( 'cargonettrunkrear'),
 'allweatherfloormats'                    => gs_a ('allweatherfloormats') ?? post_ ( 'allweatherfloormats'),
 'cargonetside2nets'                      => gs_a ('cargonetside2nets') ?? post_ ( 'cargonetside2nets'),
 'cargotray'                              => gs_a ('cargotray') ?? post_ ( 'cargotray'),
 'leathershiftknob'                       => gs_a ('leathershiftknob') ?? post_ ( 'leathershiftknob'),
 'tweeterkit'                             => gs_a ('tweeterkit') ?? post_ ( 'tweeterkit'),
 'metalpedalpadsetatsti'                  => gs_a ('metalpedalpadsetatsti') ?? post_ ( 'metalpedalpadsetatsti'),
 'autodimmingmirrorwcompass'              => gs_a ('autodimmingmirrorwcompass') ?? post_ ( 'autodimmingmirrorwcompass'),
 'autodimmingmirrorwcompassandhomelink'   => gs_a ('autodimmingmirrorwcompassandhomelink') ?? post_ ( 'autodimmingmirrorwcompassandhomelink'),
 'audiocontrolsonsteeringwheel'           => gs_a ('audiocontrolsonsteeringwheel') ?? post_ ( 'audiocontrolsonsteeringwheel'),
 'cruisecontrolsonsteeringwheel'          => gs_a ('cruisecontrolsonsteeringwheel') ?? post_ ( 'cruisecontrolsonsteeringwheel'),
 'phonecontrolsonsteeringwheel'           => gs_a ('phonecontrolsonsteeringwheel') ?? post_ ( 'phonecontrolsonsteeringwheel'),
 'steeringwheeladjustments'               => gs_a ('steeringwheeladjustments') ?? post_ ( 'steeringwheeladjustments'),
 'transmissioncontrolsonsteeringwheel'    => gs_a ('transmissioncontrolsonsteeringwheel') ?? post_ ( 'transmissioncontrolsonsteeringwheel'),
 'numberofpassengerseatmanualadjustments' => gs_a ('numberofpassengerseatmanualadjustments') ?? post_ ( 'numberofpassengerseatmanualadjustments'),
 'adjustableseatheadrest'                 => gs_a ('adjustableseatheadrest') ?? post_ ( 'adjustableseatheadrest'),
 'seatwhiplashprotection'                 => gs_a ('seatwhiplashprotection') ?? post_ ( 'seatwhiplashprotection'),
 'adjustable2ndrowheadrests'              => gs_a ('adjustable2ndrowheadrests') ?? post_ ( 'adjustable2ndrowheadrests'),
 'folding2ndrow'                          => gs_a ('folding2ndrow') ?? post_ ( 'folding2ndrow'),
 '_2ndrowcenterarmrest'                   => gs_a ('_2ndrowcenterarmrest') ?? post_ ( '_2ndrowcenterarmrest'),
 '_1strowupholstery'                      => gs_a ('_1strowupholstery') ?? post_ ( '_1strowupholstery'),
 'cupholderslocation'                     => gs_a ('cupholderslocation') ?? post_ ( 'cupholderslocation'),
 '_2ndrowcenterseatbelt'                  => gs_a ('_2ndrowcenterseatbelt') ?? post_ ( '_2ndrowcenterseatbelt'),
 'doorpocketslocation'                    => gs_a ('doordoorpocketslocations_') ?? post_ ( 'doorpocketslocation'),
 'powerwindows'                           => gs_a ('powerwindows') ?? post_ ( 'powerwindows'),
 'externaltemperaturegauge'               => gs_a ('externaltemperaturegauge') ?? post_ ( 'externaltemperaturegauge'),
 'tachometer'                             => gs_a ('tachometer') ?? post_ ( 'tachometer'),
 'clock'                                  => gs_a ('clock') ?? post_ ( 'clock'),
 'tirepressuremonitoringsystem'           => gs_a ('tirepressuremonitoringsystem') ?? post_ ( 'tirepressuremonitoringsystem'),
 'tripcomputer'                           => gs_a ('tripcomputer') ?? post_ ( 'tripcomputer'),
 'airfiltration'                          => gs_a ('airfiltration') ?? post_ ( 'airfiltration'),
 'frontairconditioning'                   => gs_a ('frontairconditioning') ?? post_ ( 'frontairconditioning'),
 'frontairconditioningzones'              => gs_a ('frontairconditioningzones') ?? post_ ( 'frontairconditioningzones'),
 'poweroutlets'                           => gs_a ('poweroutlets') ?? post_ ( 'poweroutlets'),
 'centerconsole'                          => gs_a ('centerconsole') ?? post_ ( 'centerconsole'),
 'overheadconsole'                        => gs_a ('overheadconsole') ?? post_ ( 'overheadconsole'),
 'seatbackstorage'                        => gs_a ('seatbackstorage') ?? post_ ( 'seatbackstorage'),
 'intermittentfrontwipers'                => gs_a ('intermittentfrontwipers') ?? post_ ( 'intermittentfrontwipers'),
 'onetouchwindows'                        => gs_a ('onetouchwindows') ?? post_ ( 'onetouchwindows'),
 'daytimerunninglights'                   => gs_a ('daytimerunninglights') ?? post_ ( 'daytimerunninglights'),
 'headlightsautodelay'                    => gs_a ('headlightsautodelay') ?? post_ ( 'headlightsautodelay'),
 'headlightsdusksensor'                   => gs_a ('headlightsdusksensor') ?? post_ ( 'headlightsdusksensor'),
 '_1strowvanitymirrors'                   => gs_a ('_1strowvanitymirrors') ?? post_ ( '_1strowvanitymirrors'),
 'exteriormirroradjustment'               => gs_a ('exteriormirroradjustment') ?? post_ ( 'exteriormirroradjustment'),
 'antilockbrakingsystem'                  => gs_a ('antilockbrakingsystem') ?? post_ ( 'antilockbrakingsystem'),
 'brakingassist'                          => gs_a ('brakingassist') ?? post_ ( 'brakingassist'),
 'frontstabilizerbar'                     => gs_a ('frontstabilizerbar') ?? post_ ( 'frontstabilizerbar'),
 'frontsuspensionclassification'          => gs_a ('frontsuspensionclassification') ?? post_ ( 'frontsuspensionclassification'),
 'independentsuspension'                  => gs_a ('independentsuspension') ?? post_ ( 'independentsuspension'),
 'rearstabilizerbar'                      => gs_a ('rearstabilizerbar') ?? post_ ( 'rearstabilizerbar'),
 'rearsuspensionclassification'           => gs_a ('rearsuspensionclassification') ?? post_ ( 'rearsuspensionclassification'),
 'tailpipecover'                          => gs_a ('tailpipecover') ?? post_ ( 'tailpipecover'),
 'wheellockkitsteelwheels'                => gs_a ('wheellockkitsteelwheels') ?? post_ ( 'wheellockkitsteelwheels'),
 'rearbumperapplique'                     => gs_a ('rearbumperapplique') ?? post_ ( 'rearbumperapplique'),
 'splashguards'                           => gs_a ('splashguards') ?? post_ ( 'splashguards'),
 'autodimmingmirrorwapproachlighting'     => gs_a ('autodimmingmirrorwapproachlighting') ?? post_ ( 'autodimmingmirrorwapproachlighting'),
 'bodysidemolding'                        => gs_a ('bodysidemolding') ?? post_ ( 'bodysidemolding'),
 'bodysidemoldingkit'                     => gs_a ('bodysidemoldingkit') ?? post_ ( 'bodysidemoldingkit'),
 'foglampkitlegacy'                       => gs_a ('foglampkitlegacy') ?? post_ ( 'foglampkitlegacy'),
 'cargotiedowns'                          => gs_a ('cargotiedowns') ?? post_ ( 'cargotiedowns'),
 'remoteenginestarterkeystart'            => gs_a ('remoteenginestarterkeystart') ?? post_ ( 'remoteenginestarterkeystart')
]);*/

__('session')->setCookie ('required', $this->required);
__('session')->setCookie ('additional', $this->additional);
__('session')->setCookie ('errors', $this->errors);

dump (get_defined_vars());
